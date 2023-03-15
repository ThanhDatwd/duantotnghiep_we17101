<?php

namespace App\Jobs;

use App\Mail\SendVerifyCodeMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class send_email implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     * 
     */
    public $message;
    public $email;
    public function __construct($message="",$email)
    {
        $this->message=$message;
        $this->email=$email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mail=new SendVerifyCodeMail($this->message);
        Mail:: to($this->email )->queue($mail);
    }
}
