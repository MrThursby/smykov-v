<?php

namespace Database\Seeders;

use App\Models\Blog\BlogCategory;
use App\Models\Blog\BlogPost;
use App\Models\Navigation\NavigationMenu;
use App\Models\Page;
use App\Models\School\SchoolCourse;
use App\Models\School\SchoolFork;
use App\Models\School\SchoolLesson;
use App\Models\School\SchoolPurchase;
use App\Models\School\SchoolSection;
use App\Models\User;
use Illuminate\Database\Seeder;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create my account
        User::factory()->create([
            'first_name' => 'Jack',
            'last_name' => 'Thursby',
            'name' => 'JackThursby',
            'phone' => '89000154079',
            'email' => 'smykov.03@gmail.com'
        ]);
        // Create +99 accounts
        User::factory()->times(99)->create();
        // Create 10 pages with 100 marks and 100 comments
        Page::factory()->times(10)
            ->hasMarks(10)
            ->hasComments(10)
            ->create();
        // Create 10 blog's categories
        BlogCategory::factory()->times(10)->create();
        // Create 10 blog's posts with 100 marks and 100 comments
        BlogPost::factory()
            ->times(10)
            ->hasMarks(10)
            ->hasComments(10)
            ->create();
        // Create 10 menus and 100 menu's items
        NavigationMenu::factory()
            ->times(10)
            ->hasItems(10)
            ->create();
        // CREATE SCHOOL!!!
        SchoolCourse::factory()
            ->times(10)
            ->hasForks(3)
            ->hasReviews(10)
            ->hasComments(10)
            ->hasMarks(10)
            ->create();
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 3; $j >= 1; $j--) {
                SchoolSection::factory()
                    ->times(3)
                    ->create(['course_id' => $i, 'fork_id' => $i * 3 + 1 - $j]);
                SchoolPurchase::factory()
                    ->create(['course_id' => $i, 'fork_id' => $i * 3 + 1 - $j]);
            }
            for ($k = 9; $k >= 4; $k--) {
                SchoolLesson::factory()
                    ->times(5)
                    ->hasHomeworks(1)
                    ->hasComments(10)
                    ->hasMarks(10)
                    ->create(['section_id' => $i * 9 + 1 - $k]);
            }
            for ($k = 3; $k >= 1; $k--) {
                SchoolLesson::factory()
                    ->times(5)
                    ->hasComments(10)
                    ->hasMarks(10)
                    ->create(['section_id' => $i * 9 + 1 - $k]);
            }
        }
        SchoolCourse::factory()
            ->times(10)
            ->hasSections(10)
            ->hasPurchases(10)
            ->hasReviews(10)
            ->hasComments(10)
            ->hasMarks(10)
            ->create(['use_fork' => 0, 'single_price' => 20000]);
        for ($n = 11; $n <= 20; $n++) {
            SchoolLesson::factory()
                ->times(6)
                ->hasComments(10)
                ->hasHomeworks(10)
                ->hasMarks(10)
                ->create(['section_id' => $n]);
            SchoolLesson::factory()
                ->times(4)
                ->hasComments(10)
                ->hasMarks(10)
                ->create(['section_id' => $n]);
        }
    }
}
