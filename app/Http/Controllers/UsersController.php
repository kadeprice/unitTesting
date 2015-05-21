<?php namespace App\Http\Controllers;

use App\Http\Repositories\DbUsersRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;

class UsersController extends Controller {

    /**
     * @var DbUsersRepository
     */
    private $dbUsersRepository;


    /**
     * @param DbUsersRepository $dbUsersRepository
     */
    function __construct(DbUsersRepository $dbUsersRepository) {
        $this->dbUsersRepository = $dbUsersRepository;
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->dbUsersRepository->getAll();
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request|\Illuminate\Http\Request $request
     * @return Response
     */
	public function store(Request $request)
	{
        $response = $this->dbUsersRepository->store($request);

        switch ($response['response']){
            case "true":
                return "It worked";
                break;
            case "error":
                return $response['error'];
                break;
        }

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return $this->dbUsersRepository->find($id);
	}



}
