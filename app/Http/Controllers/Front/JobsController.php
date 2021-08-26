<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\JobApplication;
use App\Country;
use App\Settings;
use App\Helper;
use App\Mail\JobApplicationReceived;
use Mail;

class JobsController extends InitController
{
    public function __construct() {
        parent::__construct();
    }

    public function apply() {
        $countries = Country::orderBy('en_short_name', 'ASC')->pluck('en_short_name', 'en_short_name')->toArray();
        return view('front.jobs.apply', compact('countries'));
    }

    public function saveApplication(Request $req)
    {
        $sendmail = true;

        $validator = Validator::make($req->all(), [
            'job'=>'required',
            'name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',
            'cv'=>'mimes:doc,docx,pdf|max:2048',
            'cover_letter'=>'mimes:doc,docx,pdf|max:2048',
        ]);

        if ($validator->fails()) {
            session()->flash('errors', $validator->errors());
            return redirect('job-application')
                        ->withErrors($validator)
                        ->withInput();
        }

        $form = $req->all();

        if ($req->hasFile('cv')) {
            $form['cv'] = Helper::upload($req, 'cv', false);
        }

        if ($req->hasFile('cover_letter')) {
            $form['cover_letter'] = Helper::upload($req, 'cover_letter', false);
        }

        $job = JobApplication::create($form);
        $msg = '';

        if($job)
        {
            if($sendmail) {
                $subject = 'New Enquiry from Website';
                $email_to = JobApplication::$to_mail;
                Mail::to($email_to)->send(new JobApplicationReceived($job));
            }
            
            $msg = '
            <i class="bx bx-check-circle app_status_icon"></i>
            <div>
                <strong class="stat_head">Application Received</strong> <br>
                Thanks, we have received your application, and will get back to you soon.
            </div>';
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

        return redirect()->to('application-status')->withData($data);
    }

    public function applicationStatus() {
        if(!session()->has('formSent')) {
            return redirect()->to('/');
        }

        return view('front.jobs.status');
    }

}
