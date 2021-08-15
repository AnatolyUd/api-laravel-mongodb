<?php

namespace Tests\Feature;

use Tests\TestCase;

class PersonsTest extends TestCase
{
 //   use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_load_persons()
    {
        $response = $this->post('/api/v1/persons');

        $response
            ->assertStatus(201)
            ->assertJsonStructure(['count']);
    }


}
