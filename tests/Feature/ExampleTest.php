<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function i_can_login(): void
    {
        $response = $this->get(route('book'));

        $response->assertStatus(200);
    }
}
