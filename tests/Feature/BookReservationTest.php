<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookReservationTest extends TestCase
{
    /** @test */
    public function a_book_can_be_add_to_library()
    {
         $this->withoutExceptionHandling();
         $response =  $this->post('/api/books',[
               'title'=>'test book',
               'author'=>'henok',

           ]);
           $response->assertOk();
           $this->assertCount(1,Book::all());
    }
}
