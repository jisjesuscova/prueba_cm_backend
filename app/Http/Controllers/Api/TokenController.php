<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TokenController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $token = Token::create([
            'token' => $request->token
        ]);

        return response()->json([
            'success' => true,
            'data' => $token
        ], 200);
    }
}
