<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\EmailData;

class AddFakeData implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $subject;
    public $email="saisasank@gmail.com";
    public $message;
    public function __construct($subject,$message)
    {
        $this->message=$message;
        $this->subject=$subject;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $data = [];

        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'subject' => $this->subject,
                'message' => $this->message,
                'email' => $this->email,
                'created_at' => now(),
            ];
        }

        EmailData::insert($data);
    }
}
