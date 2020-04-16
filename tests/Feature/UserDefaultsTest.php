<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserDefaultsTest extends TestCase
{
    use RefreshDatabase ;

    /** @test */
    public function default_value_of_personal_info_is_created_on_user_save(){
        // given: ( the environment )
        $user = new User(['name' => 'john', 'email' => 'matt@doe.com']);
        //when: user save
        $user->save();
        // then:  app should assign defaults value of personal info
        $this->assertEquals($user->personalInfo->full_name,'john');
    }

    // TODO: write tests for all default values needed for user.
}
