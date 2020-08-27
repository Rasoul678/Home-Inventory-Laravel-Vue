<?php

namespace Tests\Feature;

use App\Country;
use App\State;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StateTest extends TestCase
{
    use RefreshDatabase;


    /**
     * @test
     */
    public function  it_gets_all_states ()
    {
        factory(State::class, 10)->create([
            'country_id'=>factory(Country::class)->create()
        ]);

        $this->get('/api/states')->assertStatus(200);
    }
}
