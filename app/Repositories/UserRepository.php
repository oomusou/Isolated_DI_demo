<?php

namespace App\Repositories;

use App\User;

class UserRepository
{

    /**
     * @var User
     */
    protected $user;

    /**
     * UserRepository constructor.
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->all();
    }
}