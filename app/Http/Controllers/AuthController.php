<?php

namespace App\Http\Controllers;
use App\Models\User;
use Error;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Validator;


class AuthController extends  Controller
{

    /**
     * Login
     * @bodyParam email email required The email of the user. Example: ljenkins@example.net
     * @bodyParam password string  required The password of the user. Example: password
     */
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'invalid username or password'], 401);
        }

        return $this->createNewToken($token);

    }
    /**
     * Register đăng kí tài khoản
     * @bodyParam email email required The email of the user. Example: ljenkins@example.net
     *
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|email|max:100|unique:user',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors() , 'success' => false , 'message' => 'Register unsuccessfully'], 400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'User successfully registered',
            'success' => true ,
            'user' => $user
        ], Response::HTTP_UNAUTHORIZED);
    }
    /**
     * logout
     * @authenticated
     */
    public function logout() {
        try{
            auth()->logout();
            return response()->json([
                'success' => true,
                'message' => 'User successfully signed out'
            ]);
        }
        catch (Error|Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sign out error'
            ]);
        }

    }

    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }
    /**
     * get user profile
     * @authenticated
     */
    public function userProfile() {
        return response()->json(auth()->user());
    }

    protected function createNewToken($token){
        return response()->json([
            'token' => $token,
            'user' => auth()->user()

        ]);
    }
    public function changePassWord(Request $request) {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string|min:6',
            'new_password' => 'required|string|confirmed|min:6',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $userId = auth()->user()->id;

        $user = User::where('id', $userId)->update(
            ['password' => bcrypt($request->new_password)]
        );

        return response()->json([
            'message' => 'User successfully changed password',
            'user' => $user,
        ], 201);
    }

}
