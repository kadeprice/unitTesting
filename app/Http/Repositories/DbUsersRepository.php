<?php

namespace App\Http\Repositories;
use App\Http\Models\User;
use Illuminate\Validation\ValidationServiceProvider;


/**
 * Created by PhpStorm.
 * User: kade
 * Date: 5/19/15
 * Time: 3:44 PM
 */
class DbUsersRepository {

    /**
     * @var \App\Http\Models\User
     */
    private $user;

    /**
     * @param User|\App\Http\Models\User $user
     */
    function __construct(User $user) {
        $this->user = $user;
    }

    public function getAll() {
        return $this->user->all();
    }

    /**
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function find($id) {
        $user = $this->user->find($id);

        if(!$user){
            return ['error' => 'User Not Found'];
        }

        return $user;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    public function store($request) {

        $validate = \Validator::make($request->all(), $this->user->rules);

        if($validate->fails()){
            return ['response' => 'error', 'error' => $validate->errors()->all()];
        }

        if($this->user->create($request->all())){
            return ['response' => 'true'];
        }
    }
}
