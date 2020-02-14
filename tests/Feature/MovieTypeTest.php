<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MovieTypeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAListOfMovieTypes()
    {
        $response = $this->get('/api/movietypes');

        $response->assertStatus(200)
            ->assertJsonStructure(
                [
                    "current_page",
                    "data",
                    "from",
                    "last_page",
                    "last_page_url",
                    "next_page_url",
                    "path",
                    "per_page",
                    "prev_page_url",
                    "to",
                    "total"
                    ]
            );
    }
}
