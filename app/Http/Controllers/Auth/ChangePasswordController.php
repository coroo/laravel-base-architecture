<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\GeneralResource;
use App\Rules\MatchOldPassword;
use App\Services\Account\UserProfileService;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * @group Account
 *
 * API for managing account
 */
class ChangePasswordController extends Controller
{
    protected $statusCode = 200;

    public function __construct()
    {
        $this->userProfileService = new UserProfileService();
    }

    public function changePassword(Request $request)
    {
        $messages = [
          'current_password.required' => 'Kata sandi baru harus diisi',
          'new_password.min' => 'Kata sandi baru minimal 8 karakter',
          'new_password.required' => 'Harap isi kata sandi baru Anda',
          'new_confirm_password.required' => 'Harap ulangi kata sandi baru Anda',
          'new_confirm_password.same' => 'Harap ulangi kata sandi baru Anda dengan benar',
        ];

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => 'required|min:8',
            'new_confirm_password' => ['same:new_password'],
        ], $messages);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return (new GeneralResource(['result' => true]))->response()->setStatusCode(200);
    }
}
