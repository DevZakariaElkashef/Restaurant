<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMe;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactMeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getRandomWord($len = 10) {
        $word = array_merge(range('a', 'z'), range('A', 'Z'));
        shuffle($word);
        return substr(implode($word), 0, $len);
    }

    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        $randWOrd = $this->getRandomWord();

        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->message,
            'tag' => $randWOrd
        ]);

        

        Mail::to($request->email)->send(new ContactMe($data));

        return response()->json(['message' => 'Message Sent']);
    }
}
