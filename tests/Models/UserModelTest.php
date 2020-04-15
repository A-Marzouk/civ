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
        // given: ( the environment )
        $user = User::create(['name' => 'john', 'email' => 'john@d2oe.com']);

        //when: user updates the activity:

        $user->updateLastActivity();
        $start  = new Carbon(Carbon::now()->toDateTimeString());
        $end    = new Carbon($user->last_activity);
        $totalDuration = $end->diffInSeconds($start);

        // then:  totalDuration between last activity and now should be 0 seconds.
        $this->assertEquals($totalDuration,'0');
    }
}
