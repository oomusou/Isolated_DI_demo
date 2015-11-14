<?php

use App\Http\Controllers\UserController;
use App\Repositories\UserRepository;
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

    public function setUp()
    {
        parent::setUp();
        $this->mock = $this->initMock(UserRepository::class);
        $this->target = $this->app->make(UserController::class);
    }

    public function tearDown()
    {
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
        //$expected = new Collection([1, 2, 3]);

        $expected = new Collection([
            ['name' => 'oomusou', 'email' => 'oomusou@gmail.com'],
            ['name' => 'sam',     'email' => 'sam@gmail.com'],
            ['name' => 'sunny',   'email' => 'sunny@gmail.com'],
        ]);
        $this->mock->shouldReceive('getAll')
            ->once()
            ->withAnyArgs()
            ->andReturn($expected);

        // act
        /** @var View $view */
        $view = $this->target->index();
        $actual = $view->users;

        // assert
        $this->assertEquals($expected, $actual);
    }
}
