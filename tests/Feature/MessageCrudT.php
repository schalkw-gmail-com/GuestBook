<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Faker;
use App\Message;
use DatabaseMigrations;

class MessageCrudTest extends TestCase
{
    //can we access /messages
    public function test_can_we_reach_the_message_uri()
    {
        $response = $this->get('/messages');
        $response->assertStatus(200);
    }

    // C - Create
    public function test_can_we_create_a_message(){
        $message = factory(\App\Message::class)->make();
        $data = array(
            'title'=>$message->title
        );
        $result = $this->post(route('messages.store'), $data)->assertStatus(302);
    }

    // R - read / view
    public function test_can_we_view_a_message(){
        $message = factory(\App\Message::class)->create();
        $result = $this->get(route('messages.show',['id'=>$message->id]))->assertStatus(200);
    }

    // U - update
    public function test_can_we_edit_a_message(){

        $message = factory(\App\Message::class)->create();
        $data = [
            'message' => 'update my name'
        ];

        $result = $this->put(route('messages.update',$message->id), $data)
            ->assertStatus(405);
    }

    // D - delete
    public function test_can_we_delete_a_message(){
        $message = factory(Message::class)->create();
        $result = $this->delete(route('messages.destroy',$message->id))->assertStatus(302);

    }
}
