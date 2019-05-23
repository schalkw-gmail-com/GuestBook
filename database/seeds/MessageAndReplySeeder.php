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
            'content' => "Is it better to buy a vehicle which is 4x4 or a 4x2 with a diff-lock fitted. ",
            'title' =>'4x4 or 4x2 + diff-lock ?'
        ]);
        $message->user()->associate($user->id);
        $message->save();

        $reply = \App\MessageReplies::create([
            'content' => "Your best option is always a 4x4 vehicle. The only thing the diff-lock does is to lock the differential, which cause both wheels to turn at the same speed. This is beneficial but should not be needed (situation depending) if you have a 4x4 which constantly pulls / drives with all 4 wheels. Thus if you have a option go for a 4x4.",
            'message_id' => $message->id
        ]);
        $reply->user()->associate($admin);
        $message->replies()->save($reply);

        $message = \App\Message::create([
            'content' => "Can the tow all be used for recoveries? ",
            'title' =>'Tow Ball recoveries ?'
        ]);
        $message->user()->associate($user->id);
        $message->save();

        $message = \App\Message::create([
            'content' => "I need to buy new tyres for my vehicle. I have a lot of money to spend and was thinking of fitting a brand new set of Mud-Terrain tyres. I look how they look and they are made for mud. This is my daily driver and I work in Cape Town CBD.",
            'title' =>'Mud-Terrain or All-Terrain tyres'
        ]);
        $message->user()->associate($user->id);
        $message->save();

        $user = \App\User::findOrFail(3);
        $message = \App\Message::create([
            'content' => "I have a Hilux 2.8 and want to swap this motor out for a Lexus V8 5.0, which I can get for next to nothing. Can this be done?",
            'title' =>'Lexus V8 Swap'
        ]);
        $message->user()->associate($user->id);
        $message->save();
    }
}
