<?php

namespace Tests\Feature;

use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    use RefreshDatabase ;

    /** @test */
    public function user_can_update_last_activity(){
        $user = factory(User::class)->create();

        $user->updateLastActivity();

        $this->assertEquals($user->last_activity,'1 second before');
    }
}
