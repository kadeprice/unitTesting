<?php

namespace App\tests\Http;

use \App\User;
use \Illuminate\Foundation\Testing\TestCase;

class ProjectTestCase extends TestCase {

    /**
     * @var User $user
     */
    protected $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = User::create(
            ['name' => 'John Doe', 'email' => 'test@email.com']
        );
    }

    public function tearDown()
    {
        $this->user->delete();

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
