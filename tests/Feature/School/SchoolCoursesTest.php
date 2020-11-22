<?php

namespace Tests\Feature\School;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SchoolCoursesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSchoolCoursesIndex()
    {
        //$response = $this->get('/api/school/courses');
        $this->json('GET','/api/school/courses', [], ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure(['success','data','message']);
        //$response->assertStatus(200);
    }
}
