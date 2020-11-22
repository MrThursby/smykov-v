<?php

namespace Tests\Feature\School;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SchoolLessonsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLessonsShowAsAdmin()
    {
        $user = User::find(1);
        $response = $this->actingAs($user, 'api')
            ->json('GET','/api/school/lessons/1',[],['Accept' => 'application/json']);
        $response->assertStatus(200);
        $response->assertJsonStructure(['success','data','message']);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLessonsShowAsUser()
    {
        $user = User::find(10);
        $response = $this->actingAs($user, 'api')
            ->json('GET','/api/school/lessons/1',[],['Accept' => 'application/json']);
        $response->assertStatus(200);
        $response->assertJsonStructure(['success','data','message']);
        $response->assertJson([
            'success' => false,
        ]);
    }
}
