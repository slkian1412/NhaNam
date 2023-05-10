<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_register(): void
    {
        $response = $this->get(route('book'));

        $response->assertStatus(200);
        $response->assertViewIs('book.index')->assertViewHas('books');
        $books = $response->viewData('books');
        $this->assertCount(12, $books);
        $this->assertInstanceOf(Book::class, $books->first());

    }
}
