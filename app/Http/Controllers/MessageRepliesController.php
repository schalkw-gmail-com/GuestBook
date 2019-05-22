<?php

namespace App\Http\Controllers;

use App\Message;
use App\MessageReplies;
use Illuminate\Http\Request;

class MessageRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $replies = MessageReplies::all();
        return view('replies.index')->with('replies', $replies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('replies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'reply' => 'required|min:1|max:255',
            'message_id' => 'required|integer'
        ]);

        $reply = new MessageReplies();
        $reply->reply = $request->reply;

        $message = Message::findOrFail($request->message_id);
        $message->replies()->save($reply);

            //dd($reply);
            //dd($message);
        return redirect()->route('messages.show',$message->id);

/*

        $this->validate($request, [
            'content' => "required|min:15",
            'question_id' => 'required|integer'
        ]);
        $answer = new Answer();
        $answer->content = $request->content;


        $question = Question::findOrFail($request->question_id);
        $question->answers()->save($answer);
        return redirect()->route('questions.show', $question->id);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reply = MessageReplies::findOrFail($id);
        return view('replies.show')->with('reply', $reply);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reply = MessageReplies::findOrFail($id);
        return view('replies.edit')->with('reply', $reply);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reply = MessageReplies::find($request->id);
        $reply->update($request->only('reply'));
        return view('replies.show')->with('reply', $reply);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, MessageReplies $reply)
    {
        dd('eee');
        $reply = MessageReplies::findOrFail($request->id);
        $reply->delete();
        return redirect()->route('replies');
    }
}
