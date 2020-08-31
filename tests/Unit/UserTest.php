<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class UserTest extends TestCase
{

    /** @test */

   public function a_user_has_projects(){

       $user = factory(User::class)->create();

       $this->assertInstanceOf(Collection::class, $user->projects);
   }
}
