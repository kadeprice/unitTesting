<?php

namespace App\tests\Http;

use \App\Http\Models\User;
use \Illuminate\Foundation\Testing\TestCase;
use Illuminate\Support\Facades\DB;

class ProjectTestCase extends TestCase {

    /**
     * @var User $user
     */
    protected $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = User::create(
            ['name' => 'John Doe', 'email' => 'john@email.com']
        );

        $this->user = User::create(
            ['name' => 'Jane Doe', 'email' => 'jane@email.com']
        );

        $this->user = User::create(
            ['name' => 'Dan Doe', 'email' => 'dan@email.com']
        );
    }

    /**
     *
     */
    public function tearDown()
    {
//        $this->user->delete();
        DB::table('users')->truncate();
        parent::tearDown();
    }

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		$app = require __DIR__.'/../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}
}
