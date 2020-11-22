<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Setup the test environment
     *
     * @return void
     */
    /*public function setUp():void {
        parent::setUp();
        \Artisan::call('migrate:fresh',['-vvv' => true]);
        \Artisan::call('passport:install',['-vvv' => true]);
        \Artisan::call('db:seed',['--class' => 'TestSeeder','-vvv' => true]);
    }*/
}
