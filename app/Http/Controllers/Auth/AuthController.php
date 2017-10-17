<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest', ['except' => 'getLogout']);
    // }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        try {
            if(! $token = JWTAuth::attempt($credentials)){
                return $this->response->errorUnauthorized();
            }
        } catch (JWTException $exception){
            return $this->response->errorInternal();
        }

        return $this->response->array(compact('token'))->setStatusCode(200);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function index(){
        return User::all();
    }

    public function show()
    {
        var_dump("expression");
        try {
            $user = JWTAuth::parseToken()->toUser();
            
            if(!$user){
                return $this->response->errorNotFound("User not found");
            }
        } catch(\Tymon\JWTAuth\Exceptions\TokenInvalidException $ex){
            return $this->response->error("Token is in valid");
        } catch(\Tymon\JWTAuth\Exceptions\TokenExpiredException $ex){
            return $this->response->error("Token is expired");
        }

        return $this->response->compact('user')->setStatusCode(200);
    }
}
