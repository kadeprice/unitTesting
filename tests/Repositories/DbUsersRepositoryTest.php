<?php

namespace App\tests\Http\Repositories;

use \App\Http\Repositories\DbUsersRepository;
use \App\tests\Http\ProjectTestCase;
use Illuminate\Http\Request;

class DbUsersRepositoryTest extends ProjectTestCase {

    public function testConstruct() {
        $instance = new DbUsersRepository($this->user);

        $this->assertInstanceOf('App\Http\Repositories\DbUsersRepository', $instance);
    }

    public function testDbUserRepositoryGetAll() {
        $instance = new DbUsersRepository($this->user);
        $users = $instance->getAll();

        $this->assertCount(3, $users);

        $user = $users->first();

        $this->attributesOfObjectTest($user);

//        $this->assertObjectHasAttribute('email',$user);
    }

    public function testDbUserRepositoryGetUser() {
        $instance = new DbUsersRepository($this->user);

        $user = $instance->getUser(1);

        $this->assertNotEmpty($user->id);
        $this->attributesOfObjectTest($user);
//        $this->assertObjectHasAttribute('email',$user);

    }

    public function testDbUserRepositoryGetUserNotFound() {
        $instance = new DbUsersRepository($this->user);
        $user = $instance->getUser(12365);

        $this->assertEquals('User Not Found', $user['error']);
    }

    public function testDbUserRepositoryStoreSuccess() {
        $request = new Request();
        $request->replace(['name' => 'April Doe', 'email' => 'april@email.com']);

        $instance = new DbUsersRepository($this->user);
        $result = $instance->store($request);

        $this->assertEquals('true', $result['response']);

    }

    public function testDbUserRepositoryStoreFailValidation(){
        $request = new Request();
        $request->replace(['name' => 'John Doe', 'email' => 'not an email']);

        $instance = new DbUsersRepository($this->user);
        $result = $instance->store($request);

        $this->assertEquals('validation', $result['response']);
    }

//    public function testStoreUserFail() {
//        $request = new Request();
//        $request->replace(['name' => 'April Doe', 'email' => 'april@email.com', 'unknown' => 'unknown']);
//
//        $instance = new DbUsersRepository($this->user);
//        $result = $instance->store($request);
//
//        $this->assertEquals('error', $result['response']);
//    }

    public function attributesOfObjectTest($user) {

        $this->assertNotEmpty($user->id);
        $this->assertNotEmpty($user->name);
        $this->assertNotEmpty($user->email);
//
        $this->assertEquals("John Doe", $user->name);
        $this->assertEquals('john@email.com', $user->email);

    }
}
