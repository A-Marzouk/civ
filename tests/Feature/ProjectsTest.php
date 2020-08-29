<?php

namespace Tests\Feature;

use App\Project;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

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

        /* Should see in the database and in the browser*/
        $this->assertDatabaseHas('projects', $projectAttributes);
        $this->get('/api/user/projects')->assertSee($projectAttributes['name']);

    }

    /** @test */

    public function a_gust_can_not_control_projects()
    {
        $this->get('/api/user/projects')->assertRedirect('/login');

        $this->post('/api/user/projects')->assertRedirect('/login');

    }

    /** @test */

    public function an_authenticated_user_cannot_retrieve_the_projects_of_others()
    {

        $user = factory(User::class)->create();

        Passport::actingAs($user);

        $project = factory(Project::class)->create(['user_id' => $user->id + 1]);

        $this->get('/api/user/projects')->assertDontSee($project->name);

    }

    /** @test */

    public function an_authenticated_user_cannot_retrieve_single_project_of_others()
    {

        $user = factory(User::class)->create();

        Passport::actingAs($user);

        $project = factory(Project::class)->create(['user_id' => $user->id + 1]);

        $this->get('/api/user/projects/' . $project->id)->assertDontSee($project->name);

    }

    /** @test */

    public function a_project_requires_a_name(){

        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        Passport::actingAs($user);

        $projectAttributes  = factory(Project::class)->raw(['name' => '', 'user_id' => $user->id]);

        try{
            $this->post('/api/user/projects', $projectAttributes);
        }catch (\Exception $e){
            $this->assertArrayHasKey('name', $e->errors());
        }

    }


    /** @test */

    public function a_project_requires_a_description(){

        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        Passport::actingAs($user);

        $projectAttributes  = factory(Project::class)->raw(['description' => '', 'user_id' => $user->id]);

        try{
            $this->post('/api/user/projects', $projectAttributes);
        }catch (\Exception $e){
            $this->assertArrayHasKey('description', $e->errors());
        }

    }



    /** @test */

    public function a_project_requires_a_link(){

        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        Passport::actingAs($user);

        $projectAttributes  = factory(Project::class)->raw(['link' => '', 'user_id' => $user->id]);

        try{
            $this->post('/api/user/projects', $projectAttributes);
        }catch (\Exception $e){
            $this->assertArrayHasKey('link', $e->errors());
        }

    }




    /** @test */

    public function a_project_requires_skills(){

        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        Passport::actingAs($user);

        $projectAttributes  = factory(Project::class)->raw(['skills' => '', 'user_id' => $user->id]);

        try{
            $this->post('/api/user/projects', $projectAttributes);
        }catch (\Exception $e){
            $this->assertArrayHasKey('skills', $e->errors());
        }

    }




    /** @test */

    public function a_project_requires_software(){

        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        Passport::actingAs($user);

        $projectAttributes  = factory(Project::class)->raw(['software' => '', 'user_id' => $user->id]);

        try{
            $this->post('/api/user/projects', $projectAttributes);
        }catch (\Exception $e){
            $this->assertArrayHasKey('software', $e->errors());
        }

    }

}
