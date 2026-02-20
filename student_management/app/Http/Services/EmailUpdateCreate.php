<?php



namespace App\Http\Services;

use App\Models\EmailData;

class EmailUpdateCreate
{
    public static function createEmailRecord($email, $subject, $message)
    {
        return EmailData::create([
            'email' => $email,
            'subject' => $subject,
            'message' => $message,
            'created_at' => now(),
        ]);
    }

    public static function updateEmailRecord($id, $email, $subject, $message)
    {
        $emailData = EmailData::find($id);
        if ($emailData) {
            $emailData->update([
                'email' => $email,
                'subject' => $subject,
                'message' => $message,
            ]);
        }
        return $emailData;
    }
}