<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\EmailData;

class SendEMailToCx extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-e-mail-to-cx';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this will send the email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users=User::all();
        foreach($users as $user)
        {
            if(!empty($user))
            {
                $data = [];
                $data[] = [
                        'subject' => "master",
                        'message' => "mail",
                        'email' => $user->email,
                        'created_at' => now(),
                    ];
                EmailData::insert($data);
                $this->info('job runned successfullly');
            }
       }
    }
}
