<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    private $rules = [
        'name'            => 'required',
        'email'           => 'required|email',
        'password'        => 'required',
        'confirmPassword' => 'required|confirmed:password',
    ];

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Repositories\UserRepository  $user
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, UserRepository $user)
    {
        try {
            $request->validate($this->rules);
            $user->create($request->all());
            return response()->json([
                'status' => 'success',
                'message' => __('users.created'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display all data
     *
     * @param  \App\Repositories\UserRepository  $user
     * @return void
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \App\Repositories\UserRepository  $user
     * @return \Illuminate\Http\Response
     */
    public function get($id, UserRepository $user)
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  \App\Repositories\UserRepository  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, UserRepository $user)
    {
        try {
            $request->validate($this->rules);
            $data = $user->update($id, $request->all());
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Repositories\UserRepository  $user
     * @return \Illuminate\Http\Response
     */
    public function delete($id, UserRepository $user)
    {
        try {
            $user->delete($id);
            return response()->json([
                'status' => 'success',
                'message' => __('users.deleted'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
            ]);
        }
    }
}
