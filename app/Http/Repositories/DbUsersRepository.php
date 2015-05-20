<?php

namespace App\Http\Repositories;

use App\User;

/**
 * Created by PhpStorm.
 * User: kade
 * Date: 5/19/15
 * Time: 3:44 PM
 */
class DbUsersRepository {

    /**
     * @var \App\User
     */
    private $user;

    /**
     * @param \App\User $user
     */
    function __construct(User $user) {
        $this->user = $user;
    }

    public function getAll() {
        return $this->user->all();
    }

    public function find($id) {
        return $this->user->find($id);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    public function store($request) {
        return $this->user->fill($request->all())->save();
    }
}
