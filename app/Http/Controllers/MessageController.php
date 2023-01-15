<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{

    public function index(){
        $messages=Message::where(function($query){
            $query->where('from',request('from'));
            $query->where('to',request('to'));
        })->orWhere(function($query){
            $query->where('to',request('from'));
            $query->where('from',request('to'));
        })->get();
        return response()->json([
            'messages'=>$messages->load('from','to')
        ],200);
    }

    public function store(){
        $validated = request()->validate([
            'from'=>'required',
            'to'=>'required',
            'text'=>'required'
        ]);

        $message = Message::create($validated);
        MessageSent::dispatch($message);

        return response()->json([
            'message'=>$message->load('from')
        ],201);
    }

    //
}


