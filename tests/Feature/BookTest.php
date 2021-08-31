<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Book;
use App\Http\Controllers\BooksController;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;
     
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

    /** @test */

    public function validate_title()
    {
        //  $this->withoutExceptionHandling();
         $response =  $this->post('/api/books',[
               'title'=>'',
               'author'=>'henok',

           ]);
           $response->assertSessionHasErrors('title');
    }
      
     /** @test */

    public function validate_author()
    {
        //  $this->withoutExceptionHandling();
         $response =  $this->post('/api/books',[
               'title'=>'test tilte',
               'author'=>'',

           ]);
           $response->assertSessionHasErrors('author');
    }

      /** @test */

      public function update_book()
      {
           $this->withoutExceptionHandling();
           $response = $this->post('/api/books',[
                 'title'=>'test tilte',
                 'author'=>'test author',
  
             ]);
             $book = Book::first();
            $response = $this->patch('/api/books/'.$book->id,[
                'title'=>'New tilte',
                'author'=>'New author',
            ]);
            $this->assertEquals('New tilte', Book::first()->title);
            $this->assertEquals('New author', Book::first()->author);
      }
}
