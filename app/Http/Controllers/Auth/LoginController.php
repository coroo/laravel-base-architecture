<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Auth\LoginResource;
use App\Http\Resources\GeneralResource;
use GuzzleHttp\Client;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Login.
     *
     * User Login to his/her account using email/phone number and password
     *
     * @bodyParam username string required This can be an email or phone number.
     * @bodyParam password string required the password of user account
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        $http = new Client([
            'http_errors' => false,
            'verify'      => false,
        ]);
        App::setLocale($request->lang ?: 'id');

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $user = User::whereUsername($request->username)->first();
        if(empty($user->username)){
            $showError = [
                "error" => "invalid_username",
                "error_description" => __('auth.username_invalid'),
            ];
            return (new GeneralResource($showError))->response()->setStatusCode(200);
        }
        

        try {
            \Log::info("ME HERE");
            // Login in app layer
            $response = $http->post(env('APP_URL').'/oauth/token', [
                'form_params' => [
                    'grant_type'    => 'password',
                    'client_id'     => env('PUBLIC_CLIENT_ID'),
                    'client_secret' => env('PUBLIC_CLIENT_SECRET'),
                    'username'      => $request->username,
                    'password'      => $request->password,
                    'scope'         => '',
                ],
            ]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return catchedError($e);
        }
        $responseBody = json_decode((string) $response->getBody(), true);

        if  (isset($responseBody['error'])) {
            $this->incrementLoginAttempts($request);
        }

        if(isset($user->user_type)){
            if(isset($responseBody['access_token'])){
                $responseBody['user_type'] = $user->user_type;

                // update access token
                $user->access_token = $responseBody['access_token'];
                $user->save();
            }
        }
        
        return (new LoginResource($responseBody))->response()->setStatusCode(200);
    }
}
