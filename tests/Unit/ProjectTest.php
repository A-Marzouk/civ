<?php

namespace Tests\Unit;

use App\Project;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use WithFaker, RefreshDatabase;


   /** @test */

   public function it_belongs_to_a_user(){
       $user = factory(User::class)->create();
       $project = factory(Project::class)->create(['user_id' => $user->id]);

       $this->assertInstanceOf(User::class, $project->user);
   }

}
