<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Notification;

class SendNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notifications to Android App';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $notification = Notification::create([
            'title' => 'Title Number 1',
            'body' => 'Message Number 1',
            'img' => 0
        ]);

        $SERVER_API_KEY = 'AAAAPUCdCsE:APA91bHKoNKTB-ZI8WN6QCWuB540KMBvEDl1JSvtjWIvdEsCwwwL2frnIZCAXpmF85891BiC4Ts6-funDiRMJLFFflWB4UmjJ_Z2v3AkoS4UpSa73_1ejkR7_0JfFGqS70uwEkBTwmPx';

        $token = 'fdmQTGz3QyuDZ9PMY-6Q8C:APA91bGP5zF8XocGqljBNtV3IaqVfbw2a13f0lFx4Mfb-utcdpUoGp5RhEVXNSmTv_bIu7yi4UxTfvFUmuskKIrvFxhLGjOPssgVZvBHDhDjOk00gJOm2idP2FITkJH6gMN5F7yQ52nQ';
    
        $data = [
    
            "registration_ids" => [
                $token
            ],
    
            "notification" => [
    
                "title" => $request->title,
    
                "body" => $request->message,
    
                "sound"=> "default" // required for sound on ios
    
            ],
    
        ];
    
        $dataString = json_encode($data);
    
        $headers = [
    
            'Authorization: key=' . $SERVER_API_KEY,
    
            'Content-Type: application/json',
    
        ];
    
        $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    
        curl_setopt($ch, CURLOPT_POST, true);
    
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
    
        $response = curl_exec($ch);
    }
}
