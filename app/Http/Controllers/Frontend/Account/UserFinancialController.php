<?php

namespace App\Http\Controllers\Frontend\Account;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Auth;
use Session;

class UserFinancialController extends Controller
{
    public function __construct()
    {
        $this->client = new Client([
            'base_uri'    => env('APP_URL') . '/api/v1/',
            'http_errors' => false,
            'verify'      => false,
        ]);
    }

    public function inputForm()
    {
        $user = Auth::user();
        if (Auth::check() === false) {
            return redirect()->route('login');
        }

        $response = $this->client->get('profile?', [
            'headers' => [
                'Authorization' => 'Bearer '.$user->access_token,
                'Accept' => 'application/json',
            ],
        ]);
        $profile = json_decode((string) $response->getBody(), true)['data'];

        // financial-data
        $responseFinancial = $this->client->get('finansial?', [
            'headers' => [
                'Authorization' => 'Bearer '.$user->access_token,
                'Accept' => 'application/json',
            ],
        ]);
        $finansials = json_decode((string) $responseFinancial->getBody(), true)['data'];

        return view('financial.form', [
            'profile' => $profile, 
            'finansials' => $finansials,
            'user' => $user
        ]);
    }
}
