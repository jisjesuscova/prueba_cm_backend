<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::select('id', 'title', 'body', 'img', 'created_at')
             ->orderByDesc('id')
             ->paginate(50);

        return response()->json([
            'success' => true,
            'data' => $notifications
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $notification = Notification::create([
                'title' => $request->title,
                'body' => $request->message,
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

            return response()->json([
                'success' => true,
                'data' => $notification
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cashier $cashier)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cashier $cashier)
    {
        //
    }
}
