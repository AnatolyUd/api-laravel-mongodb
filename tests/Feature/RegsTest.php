<?php

namespace Tests\Feature;

use Tests\TestCase;

class RegsTest extends TestCase
{
 //   use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_load_regs()
    {
        $response = $this->post('/api/v1/regs');

        $response
            ->assertStatus(200)
            ->assertJsonStructure(['count']);
    }


}
