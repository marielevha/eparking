<?php

namespace App\Jobs;

use App\Mail\ConfirmMail;
use App\Mail\ResetPasswordMail;
use App\Mail\VerificationCodeMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var array
     */
    private $data;
    /**
     * @var string
     */
    private $type;

    /**
     * SendMailJob constructor.
     * @param array $data
     * @param string $type
     */
    public function __construct(array $data, string $type)
    {
        $this->data = $data;
        $this->type = $type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        switch ($this->type) {
            case 'confirm_email' : {
                Mail::send(new ConfirmMail($this->data));
                break;
            }
            case 'reset_password' : {
                Mail::send(new ResetPasswordMail($this->data));
                break;
            }
            case 'verification_code' : {
                Mail::send(new VerificationCodeMail($this->data));
                break;
            }
        }
    }
}
