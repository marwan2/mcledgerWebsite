<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Hash;
use Auth;
use Mail;

use App\User;
use App\Subscriber;
use App\Email;
use App\EmailBulk;

class ComposeController extends InitController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $emails = Email::all();
        $emailsbulk = EmailBulk::all();

        return view('admin.inbox.index', compact('emails', 'emailsbulk'));
    }

    public function getNew($candidate_id)
    {
    	$candidate = User::whereId($candidate_id)->with('emails')->first();
    	return view('admin.inbox.new', compact('candidate'));
    }

    public function postNew(Request $request)
    {
        $goto_inbox = $request->get('goto_inbox');
        $goto_email = $request->get('goto_email');
        $message = new Email;
        $flash_message = "";

        if(isset($goto_inbox) && $goto_inbox==1)
        {
        	$flash_message .= 'تم إرسال الرسالة بنجاح إلى صندوق رسائل المشترك';
        }

        if(isset($goto_email) && $goto_email==1)
        {
            //send verification mail to user
            $data['subject'] = $request->get('subject');
            $data['body'] = nl2br($request->get('body'));
            $data['user'] = User::findOrFail($request->get('user_id'));
            $data['indentifier'] = Hash::make($data['user']->id);

            if($data['user']->unsubscribed==1) {
                $flash_message .= '<br> بناءا على طلب المشترك ﻻ يمكن إرسال رسائل له حيث أنه قام بإلغاء اشتراكه في خدمة رسائل الموقع';
            } else {
                Mail::send('front.emails.candidates.template',['data'=>$data], function($message) use($data)
                {
                    $message->from(Email::$email_noreply, "Rawaj Co.");
                    $message->subject($data['subject']);
                    $message->to($data['user']->email);
                });

                $flash_message .= '<br> تم إرسال الرسالة بريدية إلى المشترك';
            }
        }

        $requestData = $request->all();
        $requestData['admin_id'] = Auth::id();
        if($message->create($requestData)) {
            //Nothing to do now
        }
        Session::flash('flash_message', $flash_message);
        return redirect('admin/candidates/show/'.$request->get('user_id'));
    }

    public function postReply(Request $request)
    {
        $message_id = $request->get('record_id');

        $model = $request->get('model');
        $model_reply = $request->get('model_reply');
        $model = '\App\\'.$model;
        $model_reply = '\App\\'.$model_reply;

        $message_data = $model::find($message_id);

        if(!$message_data) {
            Session::flash('alert', 'success');
            Session::flash('flash_message', 'فوا لا يوجد محتوى أو حدث خطأ ما');
            return redirect()->back();
        }
        $message_reply = new $model_reply;

        $goto_inbox = $request->get('goto_inbox');
        $goto_email = $request->get('goto_email');

        $flash_message = "";

        $data['subject'] = $request->get('subject');
        $data['body'] = $request->get('body');
        $data['message_data'] = $message_data;

        $user = null;
        if(isset($message_data->user_id)) {
            $user = User::find($message_data->user_id);
        }
        $user = User::whereEmail($message_data->email)->first();

        //Save to user inbox
        if(isset($goto_inbox) && $goto_inbox==1 && $user)
        {
            $user_inbox = new Email;
            $emailData = $request->all();
            $emailData['user_id'] = $user->id;
            $emailData['admin_id'] = Auth::id();

            if($user_inbox->create($emailData)) {
                $flash_message .= 'تم إرسال الرسالة بنجاح إلى صندوق رسائل العضو: '.$user->name.' <br>';                
            }
        }
        if(isset($goto_email) && $goto_email==1)
        {
            Mail::send('front.emails.contact.reply',['data'=>$data], function($message) use($data)
            {
                $message->from(Email::$email_noreply, "Rawaj Co.");
                $message->subject($data['subject']);
                $message->to($data['message_data']->email);
            });
        }

        $flash_message .= '<br> تم إرسال الرد الخاص بك إلى صاحب الرسالة';

        $requestData = $request->all();
        $requestData[$requestData['id_field']] = $message_id;

        //Remove vars that are not fields
        unset($requestData['model']);
        unset($requestData['model_reply']);
        unset($requestData['record_id']);
        unset($requestData['id_field']);

        $requestData['admin_id'] = Auth::id();
        if($message_reply->create($requestData))
        {
            //Set replied to 1
            $message_data->replied = 1;
            $message_data->save();

            Session::flash('alert', 'success');
        }
        Session::flash('flash_message', $flash_message);
        return redirect()->back();
    }

    public function getShow($email_id)
    {
        $email = Email::whereId($email_id)->first();
        $data['subject'] = $email->subject;
        $data['body'] = $email->body;
        $data['user'] = User::findOrFail($email->user_id);
        $data['indentifier'] = Hash::make($data['user']->id);

        return view('admin.inbox.show', compact('data'));
    }

    public function getBulkshow($email_id)
    {
        $email = EmailBulk::whereId($email_id)->first();
        $data['subject'] = $email->subject;
        $data['body'] = $email->body;
        $data['user'] = Auth::user();
        $data['indentifier'] = Hash::make($data['user']->id);

        return view('admin.inbox.show', compact('data'));
    }

    ////////////////

    public function getBulk()
    {
        $filter['user_active'] = [
            'all'=>'الكل',
            '1'=>'المشتركين ذو الحساب المفعل',
            '0'=>'المشتركين ذو الحساب الغير مفعل',
        ];

        $users = Subscriber::whereUnsubscribed(0)->orderBy('name', 'ASC')->get();
        return view('admin.inbox.bulk', compact('filter', 'users'));
    }

    //Save the bulk email statistics in the model EmailBulk
    public function postBulk(Request $request)
    {
        $sending_option = $request->get('sending_option');
        $emailbulk = new EmailBulk;
        $candidates_received = [];

        $goto_email = $request->get('goto_email', 0);
        $subject = $request->get('subject');
        $body = $request->get('body');

        $user_active = $request->get('user_active');
        $awards = $request->get('awards');

        $candidates = new Subscriber;

        if($sending_option==1) //Send to all subscribers
        {
            $candidates = $candidates->where('email','<>','');
        } else { //send to selected candidates
            $candidates = $candidates->whereIn('id', $request->get('custom_users'));
        }
        $candidates = $candidates->whereUnsubscribed(0)->get();

        $message = new Email;
        $flash_message = "";

        foreach($candidates as $candidate)
        {
            if(isset($goto_email) && $goto_email==1)
            {
                //If not a valid email then skip it
                if (!filter_var($candidate->email, FILTER_VALIDATE_EMAIL)) {
                  continue;
                }

                //send verification mail to user
                $data['subject'] = $subject;
                $data['body'] = $body;
                $data['user'] = $candidate;
                $data['indentifier'] = Hash::make($data['user']->id);

                if($data['user']->unsubscribed==1) {
                    $flash_message .= '<br> بناءا على طلب المشترك ﻻ يمكن إرسال رسائل له حيث أنه قام بإلغاء اشتراكه في خدمة رسائل الموقع';
                } else {
                    Mail::send('front.emails.candidates.template',['data'=>$data], function($message) use($data)
                    {
                        $message->from(Email::$email_noreply, "Rawaj");
                        $message->subject($data['subject']);
                        $message->to($data['user']->email);
                    });
                    $flash_message .= 'تم إرسال الرسالة بريدية إلى المشترك '.$candidate->email.'<br>';
                }
            }

            $requestData = $request->all();
            $requestData['admin_id'] = Auth::id();
            if($message->create($requestData))
            {
                $candidates_received[] = ['id'=>$candidate->id, 'name'=>$candidate->name];
            }
        }

        //Save the statistics
        $emailbulk->goto_email = $goto_email;
        //$emailbulk->active_status = $user_active;
        //$emailbulk->award_branches = $awards;
        $emailbulk->subject = $subject;
        $emailbulk->body = $body;
        $emailbulk->candidates_received = serialize($candidates_received);
        if($emailbulk->save()) {
            $flash_message .= '<br><i>Bulk Email statistics saved</i>';
        }

        Session::flash('flash_message', $flash_message);
        return redirect('admin/compose/bulk');
    }
}