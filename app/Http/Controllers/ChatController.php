<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use LRedis;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $redis = LRedis::connection();
        $data = ["message" => $request->input('message'), "user" => $request->input('user')];
        $redis->publish('message', json_encode($data));

        return response()->json([]);
    }
}
