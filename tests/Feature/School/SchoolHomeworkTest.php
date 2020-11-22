<?php

namespace Tests\Feature\School;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SchoolHomeworkTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomeworkIndexAsAdmin()
    {
        $user = User::find(1);
        $response = $this->actingAs($user, 'api')
            ->json('GET','/api/school/homework?lesson_id=1',[],['Accept' => 'application/json']);
        $response->assertStatus(200);
        $response->assertJsonStructure(['success','data','message']);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomeworkIndexAsUser()
    {
        $user = User::find(10);
        $response = $this->actingAs($user, 'api')
            ->json('GET','/api/school/homework?lesson_id=1',[],['Accept' => 'application/json']);
        $response->assertStatus(403);
    }
}
