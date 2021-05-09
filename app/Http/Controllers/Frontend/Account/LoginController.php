<?php

namespace App\Http\Controllers\Frontend\Account;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->client = new Client([
            'base_uri'    => env('APP_URL') . '/api/v1/',
            'http_errors' => false,
            'verify'      => false,
        ]);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginRequest(Request $request)
    {
        $data = [
            'username' => $request->get('username'),
            'password' => $request->get('password'),
        ];

        $response = $this->client->post('login?lang='.$request->locale, [
            'headers' => ['Accept' => 'application/json'],
            'json'    => [
                'username' => $data['username'],
                'password' => $data['password'],
            ],
        ]);

        $remember = $request->get('rememberme');

        if ($remember == '1' || $remember == 'true') {
            $remember = true;
        } else {
            $remember = false;
        }

        $body = json_decode((string) $response->getBody(), true);

        if ($response->getStatusCode() == 400) {
            $msg = [];
            foreach ($body as $validateCode) {
                $msg[] = $validateCode;
            }

            return response()->json(['status' => '400', 'msg' => $msg]);
        } elseif ($response->getStatusCode() == 429) {
            return response()->json([
                'status' => $response->getStatusCode(),
                'msg' => $body['data']['message'],
                'countdown' => $body['data']['countdown']
            ]);
        } elseif ($response->getStatusCode() == 200) {
            if (isset($body['data']['error'])) {
                $msg = $body['data'];

                return response()->json(['status' => '401', 'msg' => $msg]);
            } else {
                if (Auth::attempt(['username' => $data['username'], 'password' => $data['password']], $remember)) {
                    $user = Auth::user();
                    $user->access_token = $body['data']['access_token'];
                    $user->save();

                    // $url = Session::get('url.intended');
                    $url = $body['data']['user_type'] == 'user' ? 'profile-form' : 'admin';

                    // return redirect()->route('profile-form');
                    return response()->json([
                        'status' => '200',
                        'msg'    => 'login_success',
                        'url'    => $url,
                        'user'   => $user,
                    ]);
                }
            }
        }
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        if (Auth::check() === false) {
            return redirect()->route('login');
        }
        $user->access_token = null;
        $user->save();

        Auth::logout();
        Session::flush();

        return redirect()->route('login');
    }
}
