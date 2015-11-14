<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    /**
     * @var UserRepository
     *
     */
    protected $userRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->getAll();

        return view('users.index', compact('users'));
    }
}
