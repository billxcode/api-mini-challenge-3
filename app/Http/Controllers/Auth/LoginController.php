<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\Auth;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = $request;

        $auth = Auth::where('email', $user['email'])->first();

        if (Hash::check($user['password'], $auth->password))
        {
            $token = JWT::encode($user['email'], env('SECRET_KEY'), 'HS256');

            $this->data['success'] = true;
            $this->data['response'] = 200;
            $this->data['message'] = 'Success Login';
            $this->data['data'] = [
                'token' => $token
            ];

            return response()->json($this->data, 200);
        }

        $this->data['message'] = 'Failed Login';

        return response()->json($this->data, 400);

    }

}