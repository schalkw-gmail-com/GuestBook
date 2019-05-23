<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Auth;
use DB;

class MessagesController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::where(['user_id'=>Auth::user()->id])->get();
        return view('messages.index')->with('messages', $messages);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('messages.create');
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
            'content' => 'required|min:1',
            'title' => 'required|min:1|max:255'
        ]);

        //$message = Message::created($data);
        $message = Message::make($data);

        $message->user()->associate(Auth::id());
        $message->save();

        return redirect()->route('messages.show',$message->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::findOrFail($id);
       // $e = $message->replies();
       // dd($e);
      //  dd($message);
        return view('messages.show')->with('message', $message);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $message = Message::findOrFail($id);
        return view('messages.edit')->with('message', $message);
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
        $message = Message::findOrFail($request->id);

        $data = $request->validate([
            'content' => 'required|min:1',
            'title' => 'required|min:1|max:255'
        ]);

        $message->update($data);
        $message->save();
        return view('messages.show')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Message $message)
    {
        $message = Message::findOrFail($message->id);
        $message->delete();
        return redirect()->route('messages.index');
    }
}
