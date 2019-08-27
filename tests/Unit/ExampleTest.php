<?php

namespace Tests\Unit;

use App\Http\Controllers\EventController;
use App\Http\Controllers\properties_request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $event = new EventController();
        $result  = $event->delete(12);
        dd($result);
        $this->assertTrue(true);
    }
}
