<?php

namespace Tests\Feature\School;

use App\Models\Role;
use App\Models\School\SchoolCourse;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class SchoolPurchasesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPurchasesIndex()
    {
        $user = User::find(2);
        $response = $this->actingAs($user, 'api')
            ->json('GET','/api/profile/purchases',[],['Accept' => 'application/json']);
        $response->assertStatus(200);
        $response->assertJsonStructure(['success','data','message']);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPurchasesStore()
    {
        $user = User::find(3);

        $course = SchoolCourse::find(rand(11,20));

        $purchase = [
            'course_id' => $course->id,
            'fork_id' => $course->forks->first() != null ? $course->forks->first()->id : null
        ];
        $response = $this->actingAs($user, 'api')
            ->json('POST','/api/profile/purchases',$purchase,['Accept' => 'application/json']);
        $response->assertStatus(200);
        $response->assertJsonStructure(['success','data','message']);
    }
}
