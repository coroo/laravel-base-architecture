<?php

namespace App\Http\Controllers\Frontend\Account;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Auth;
use Session;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->client = new Client([
            'base_uri'    => env('APP_URL') . '/api/v1/',
            'http_errors' => false,
            'verify'      => false,
        ]);
    }

    public function profileForm()
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

        if(empty($profile['id'])){
            $response = $this->client->post('add-profile?', [
                'headers' => [
                    'Authorization' => 'Bearer '.$user->access_token,
                    'Accept' => 'application/json'
                ],
                'json'    => [
                    'user_id' => $user->id,
                    'kode_nas' => $user->username,
                ],
            ]);
            $newProfile = json_decode((string) $response->getBody(), true)['data'];
        }

        $responseEducation = $this->client->get('educations?', [
            'headers' => [
                'Authorization' => 'Bearer '.$user->access_token,
                'Accept' => 'application/json',
            ],
        ]);
        $educations = json_decode((string) $responseEducation->getBody(), true)['data'];

        $responseFamily = $this->client->get('families?', [
            'headers' => [
                'Authorization' => 'Bearer '.$user->access_token,
                'Accept' => 'application/json',
            ],
        ]);
        $families = json_decode((string) $responseFamily->getBody(), true)['data'];

        $responseJob = $this->client->get('jobs?', [
            'headers' => [
                'Authorization' => 'Bearer '.$user->access_token,
                'Accept' => 'application/json',
            ],
        ]);
        $jobs = json_decode((string) $responseJob->getBody(), true)['data'];

        $responseAchievement = $this->client->get('achievements?', [
            'headers' => [
                'Authorization' => 'Bearer '.$user->access_token,
                'Accept' => 'application/json',
            ],
        ]);
        $achievements = json_decode((string) $responseAchievement->getBody(), true)['data'];
        $profile = $newProfile ?? $profile;

        // master-data
        $responseSyubah = $this->client->get('syubahs?', [
            'headers' => [
                'Authorization' => 'Bearer '.$user->access_token,
                'Accept' => 'application/json',
            ],
        ]);
        $syubahs = json_decode((string) $responseSyubah->getBody(), true)['data'];
        $responseFarah = $this->client->get('farahs?', [
            'headers' => [
                'Authorization' => 'Bearer '.$user->access_token,
                'Accept' => 'application/json',
            ],
        ]);
        $farahs = json_decode((string) $responseFarah->getBody(), true)['data'];

        return view('profile.form', [
            'profile' => $profile, 
            'educations' => $educations, 
            'families' => $families, 
            'jobs' => $jobs, 
            'achievements' => $achievements, 
            'syubahs' => $syubahs, 
            'farahs' => $farahs, 
            'user' => $user
        ]);
    }
}
