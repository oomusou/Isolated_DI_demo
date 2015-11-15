<?php

use App\Http\Controllers\UserController;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Mockery\Mock;

class UserControllerTest extends TestCase
{
    /**
     * @var UserController
     */
    protected $target;

    /**
     * @var Mock
     */
    protected $mock;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->mock = $this->initMock(UserRepository::class);
        $this->target = $this->app->make(UserController::class);

    }
    /**
     * Clean up the testing environment before the next test.
     *
     * @return void
     */
    public function tearDown()
    {
        $this->target = null;
        $this->mock = null;
        parent::tearDown();
    }

    /**
     * Test UserController@index
     *
     * @group UserController
     * @group UserController0
     */
    public function testIndex()
    {
        // arrange
        $expected = new Collection([
            ['name' => 'oomusou', 'email' => 'oomusou@gmail.com'],
            ['name' => 'sam',     'email' => 'sam@gmail.com'],
            ['name' => 'sunny',   'email' => 'sunny@gmail.com'],
        ]);
        $this->mock->shouldReceive('getAll')
            ->once()
            ->withAnyArgs()
            ->withArgs()
            ->andReturn($expected);

        // act
        /** @var View $view */
        $view = $this->target->index();
        $actual = $view->users;

        // assert
        $this->assertEquals($expected, $actual);
    }
}
