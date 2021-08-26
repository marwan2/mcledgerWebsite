<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\JobApplication;

class JobApplicationReceived extends Mailable
{
    use Queueable, SerializesModels;
    public $application;

    public function __construct(JobApplication $application) {
        $this->application = $application;
    }

    public function build() {
        $mail = $this->view('emails.jobs.application_received')->with([
            'application'=>$this->application
        ]);

        if($this->application->cover_letter) {
            $letter_path = url('uploads/'.$this->application->cover_letter);
            $mail = $mail->attach($letter_path);
        }

        if($this->application->cv) {
            $cv_path = url('uploads/'.$this->application->cv);
            $mail = $mail->attach($cv_path);
        }

        return $mail;
    }
}
