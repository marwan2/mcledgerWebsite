<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Enquiry;
use App\Settings;
use App\Subscriber;
use App\JoinRequest;
use Mail;

class ActionsController extends Controller
{
    public function postEnquiry(Request $req)
    {
        $sendmail = false;
        $this->validate($req, [
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required',
        ]);

        $form = $req->all();
        $enquiry = Enquiry::create($form);
        $msg = '';

        if($enquiry)
        {
            if($sendmail)
            {
                $view = 'front.mails.enquiry_admin';
                $data = ['enquiry'=>$enquiry];
                $subject = 'New Enquiry from Website';
                $email_to = Settings::fetch('email_to',$this->settings['mail']);
                $name_to = Settings::fetch('email_name',$this->settings['mail']);
    
                Mail::send($view, $data, function($message) use($email_to,$name_to,$subject) {
                    $message->to($email_to, $name_to)
                    ->subject($subject);
                });
            }
            
            $msg = 'Thanks, we have received your message, and will get back to you soon.';  
            if($req->ajax()) {
                return json_encode(['status'=>200, 'message'=>$msg]);
            } else {
                return $this->showOutput($msg);
            }
        } else {
            $msg = 'Sorry, error occured';
            return $this->showOutput($msg, 'danger');
        }
    }

    public function showOutput($message='Done', $type='success', $data=[]) {
        session()->flash('formSent', 1);
        session()->flash('type', $type);
        session()->flash('message', $message);

        return redirect()->to('request-status')->withData($data);
    }

    public function postSubscribe(Request $request)
    {
        $message = new Subscriber;

        $check = Subscriber::whereEmail($request->get('email'))->first();

        if($check->count() > 0) {
            if($check->unsubscribed == 1) {
                $check->unsubscribed = 0;
                if($check->save()) {
                    return $this->showOutput('Thanks, you have subscribed successfully');    
                }
            }
            return $this->showOutput('You are already subscribed!', 'warning');
        }

        $data = $request->only('name', 'email');

        if($message->create($data)) {
            if($request->ajax()) {
                return json_encode(['result'=>'success', 'status'=>200]);
            } else {
                return $this->showOutput('Thanks, you have subscribed successfully');
            }
        }

        if($request->ajax()) {
            return json_encode(['result'=>'error']);
        }
        return $this->showOutput('Error occured', 'danger');
    }

    public function getUnsubscribe(Request $req) {
        $email = $req->get('email');
        if(!$email) {
            return 'Sorry, email not found';
        }

        $subscriber = Subscriber::whereEmail($email)->first();
        if($subscriber->count() > 0) {
            $subscriber->unsubscribed = 1;
            if($subscriber->save()) {
                return 'Thanks, you have unsubscribed successfully from the newsletter';
            }
        }

        return redirect()->to('/');
    }

    public function joinAsAccountant(Request $request) {
         $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
        ]);

        $data = $request->all();

        if($request->has('as') && isset(JoinRequest::$joinAs[$request->get('as')])) {
            $data['join_as'] = $request->get('as');
        }

        $record = JoinRequest::create($data);
        if($record) {
            return $this->showOutput('Thanks, We have successfully received your join request');
        }

        return 'Error occured';
    }
    
    public function clientJoinRequest(Request $request) {
         $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',
            'company_name'=>'required',
            'job_title'=>'required',
        ]);

        $data = $request->all();
        $data['join_as'] = 'client';

        $record = JoinRequest::create($data);
        if($record) {
            return $this->showOutput('Thanks, We have successfully received your request');
        }

        return 'Error occured';
    }

    public function requestStatus() {
        if(!session()->has('formSent')) {
            return redirect()->to('/');
        }

        return view('front.actions.form_status');
    }
}
