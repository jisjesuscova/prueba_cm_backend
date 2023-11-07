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
        $notification_quantity = Notification::select('id', 'title', 'body', 'img', 'created_at')->count();

        $notification = Notification::create([
            'title' => 'Title Number '.$notification_quantity,
            'body' => 'Message Number '.$notification_quantity,
            'img' => 0
        ]);

        $SERVER_API_KEY = env('FIREBASE_API_KEY');

        $token = env('FIREBASE_APP_TOKEN');
    
        $data = [
    
            "registration_ids" => [
                $token
            ],
    
            "notification" => [
    
                "title" => 'Title Number '.$notification_quantity,
    
                "body" => 'Message Number '.$notification_quantity,
    
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

        print_r($response);
    }
}
