<?php

namespace App\tests\Http\Repositories;

use \App\Http\Repositories\DbUsersRepository;
use \App\tests\Http\ProjectTestCase;

class DbUsersRepositoryTest extends ProjectTestCase {
    public function testConstruct()
    {
        $instance = new DbUsersRepository($this->user);

        $this->assertInstanceOf('App\Http\Repositories\DbUsersRepository', $instance);
    }
}
