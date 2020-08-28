<?php

namespace Tests\Feature;

use App\PersonalInfo;
use App\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserDefaultsTest extends TestCase
{
    use RefreshDatabase ;

    /** @test */
    public function default_value_of_personal_info_is_created_on_user_save(){
        $user = factory(User::class)->create();

        $this->assertInstanceOf(PersonalInfo::class, $user->personalInfo);
        $this->assertNotFalse($user->personalInfo->id);
    }

}
