<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MessageCrudTest extends TestCase
{

    //can we access /messages
    public function test_can_we_reach_the_message_uri()
    {
        $response = $this->get('/messages');
        $response->assertStatus(200);
    }

    // C - Create
    public function can_we_create_a_message(){
    }

    // R - read / view
    public function can_we_view_a_message(){
    }

    // U - update
    public function can_we_edit_a_message(){
    }

    // D - delete
    public function can_we_delete_a_message(){
    }
}
