<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use WithFaker;

    /** @test */

    public function an_authenticated_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        Passport::actingAs($user);

        $projectAttributes = [
            'user_id' => $user->id,
            'name' => 'Project 1',
            'description' => 'Project 1 Description',
            'link' => 'https://Project_1.com',
            'skills' => 'php',
            'software' => 'php',
        ];


        $this->post('/api/user/projects', $projectAttributes);

        $this->assertDatabaseHas('projects', $projectAttributes);

    }

    /** @test */

    public function a_gust_can_not_control_projects(){
        $getResponse  = $this->get('/api/user/projects');
        $postResponse = $this->post('/api/user/projects');

        $getResponse->assertRedirect('/login');
        $postResponse->assertRedirect('/login');
    }

}
