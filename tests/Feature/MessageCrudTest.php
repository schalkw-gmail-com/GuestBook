<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Faker;
use App\Message;
use DatabaseMigrations;
use \App\User;

class MessageCrudTest extends TestCase
{

    public $user = '';

    //can we access /messages
    public function test_can_we_reach_the_message_uri()
    {
        $response = $this->get('/messages');
        $response->assertStatus(403);
    }

    //can a logged in user  access /messages
    public function test_can_a_logged_in_user_reach_the_message_uri()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $this->user = $user;
        $response = $this->get('/messages');
        $response->assertSuccessful();
    }

    // C - Create
    public function test_a_guest_can_not_create_a_message(){
        $message = factory(\App\Message::class)->make();
        $data = array(
            'title'=>$message->title
        );
        $result = $this->post(route('messages.store'), $data)->assertStatus(403);
    }

    // C - Create
    public function test_can_a_user_create_a_message(){

        $user = User::get()->random();
        $this->be($user);

        $message = factory(\App\Message::class)->create();
        $data = array(
            'title'=>$message->title,
            'content'=>$message->content
        );
        $message->user()->associate($user);
        $message->save();

        $result = $this->get(route('messages.show',['id'=>$message->id]))->assertStatus(200);
    }

    // R - read / view
    public function test_can_we_view_a_message(){

        $user = User::get()->random();
        $this->be($user);
        $message = Message::findOrFail(1);
        $result = $this->get(route('messages.show',['id'=>$message->id]))->assertStatus(200);
    }

    // U - update
    public function test_can_we_edit_a_message(){

        $user = User::get()->random();
        $this->be($user);

        $message = factory(\App\Message::class)->create();
        $data = array(
            'title'=>$message->title,
            'content'=>$message->content
        );
        $message->user()->associate($user);
        $message->save();

        $data = [
            'content' => 'update my conent'
        ];
        $result = $this->put(route('messages.update',$message->id), $data);
    }

    // D - delete
    public function test_can_we_delete_a_message(){
        $user = User::get()->random();
        $this->be($user);

        $message = factory(\App\Message::class)->create();
        $data = array(
            'title'=>$message->title,
            'content'=>$message->content
        );
        $message->user()->associate($user);
        $message->save();
        $result = $this->delete(route('messages.destroy',$message->id))->assertStatus(302);

    }
}
