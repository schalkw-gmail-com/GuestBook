<?php

use Illuminate\Database\Seeder;

class MessageAndReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = \App\User::findOrFail(1);
        $user = \App\User::findOrFail(2);

        $message = \App\Message::create([
            'content' => "The is the first message loaded, during the setup of the application. Written by Piet",
            'title' =>'Message number one'
        ]);
        $message->user()->associate($user->id);
        $message->save();

        $reply = \App\MessageReplies::create([
            'content' => "The is the first first reply to the first message. Written by Admin",
            'message_id' => $message->id
        ]);
        $reply->user()->associate($admin);
        $message->replies()->save($reply);

        $message = \App\Message::create([
            'content' => "The is the second message ",
            'title' =>'Message number 2'
        ]);
        $message->user()->associate($user->id);
        $message->save();

        $message = \App\Message::create([
            'content' => "The is the third message ",
            'title' =>'Message number 3'
        ]);
        $message->user()->associate($user->id);
        $message->save();

        $message = \App\Message::create([
            'content' => "The is the forth message ",
            'title' =>'Message number 4'
        ]);
        $message->user()->associate($user->id);
        $message->save();
    }
}
