<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    /**
     * Fetch all data
     *
     * @param App\Repositories\UserRepository $user
     * @return array
     */
    public function all(UserRepository $user)
    {
        try {
            $data = $user->all();
            return response()->json([
                'status' => 'success',
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
            ]);
        }
    }
    
    /**
     * Fetch data by id
     *
     * @param integer $id
     * @param App\Repositories\UserRepository $user
     * @return array
     */
    public function get(int $id, UserRepository $user)
    {
        try {
            $data = $user->get($id);
            return response()->json([
                'status' => 'success',
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
            ]);
        }
    }
}
