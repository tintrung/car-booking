<?php

namespace App\Repositories;

use App\Models\Users as UsersModel;

class UserRepository extends ModelAbstract implements ModelInterface
{
    /**
     * Instantiate model
     *
     * @param UsersModel $user
     */
    public function __construct(UsersModel $user)
    {
        parent::__construct($user);
    }
}
