<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MessageReplyCrudT extends TestCase
{
    //can we access /messagereplies
    public function test_can_we_reach_the_message_replies_uri()
    {
        $response = $this->get('/messagereplies');
        $response->assertStatus(200);
    }
    // C - Create
    public function test_can_we_create_a_reply(){
        $reply = factory(\App\MessageReplies::class)->make();
        $data = array(
            'reply'=>$reply->reply
        );
        $result = $this->post(route('replies.store'), $data)->assertStatus(302);
    }

    // R - read / view
    public function test_can_we_view_a_reply(){
        $reply = factory(\App\MessageReplies::class)->create();
        $result = $this->get(route('replies.show',['id'=>$reply->id]))->assertStatus(200);
    }

    // U - update
    public function test_can_we_edit_a_reply(){

        $reply = factory(\App\MessageReplies::class)->create();
        $data = [
            'message' => 'update my name'
        ];

        $result = $this->put(route('replies.update',$reply->id), $data)
            ->assertStatus(405);
    }

    // D - delete
    public function test_can_we_delete_a_reply(){
        $reply = factory(\App\MessageReplies::class)->create();
        $result = $this->delete(route('replies.destroy',$reply->id))->assertStatus(302);

    }
}
