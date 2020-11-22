<?php

namespace Tests\Feature\School;

use App\Models\School\SchoolSection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class SchoolSectionsTest extends TestCase
{
    /**
     * A feature test module sections index as admin.
     *
     * @return void
     */
    public function testSectionsIndexAsAdmin()
    {
        $user = User::find(1);
        $response = $this->actingAs($user, 'api')
            ->json('GET','/api/school/sections?course_id=1',[],['Accept' => 'application/json']);
        $response->assertStatus(200);
        $response->assertJsonStructure(['success','data','message']);
    }
    /**
     * A feature test module sections index as user
     *
     * @return void
     */
    public function testSectionsIndexAsUser()
    {
        $user = User::find(2);
        $response = $this->actingAs($user, 'api')
            ->json('GET','/api/school/sections?course_id=1',[],['Accept' => 'application/json']);
        $response->assertStatus(200);
    }
    /**
     * A feature test module sections index as editor.
     *
     * @return void
     */
    public function testSectionsIndexAsEditor()
    {
        $user = User::find(3);
        $response = $this->actingAs($user, 'api')
            ->json('GET','/api/school/sections?course_id=1',[],['Accept' => 'application/json']);
        $response->assertStatus(200);
        $response->assertJsonStructure(['success','data','message']);
    }
    /**
     * A feature test module sections create as admin.
     *
     * @return void
     */
    public function testSectionsStoreAsEditor()
    {
        $user = User::find(3);
        $section = [
            'course_id' => 1,
            'fork_id' => 1,
            'title' => 'New Section created by test'
        ];
        $response = $this->actingAs($user, 'api')
            ->json('POST','/api/school/sections',$section,['Accept' => 'application/json']);
        $response->assertStatus(200);
        $response->assertJsonStructure(['success','data','message']);
    }
}
