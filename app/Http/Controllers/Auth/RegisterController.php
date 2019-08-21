<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\Auth;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use App\Models\Auth as User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = $request;

        $user = User::where('email', $validator['email'])->first();

        if (empty($user))
        {
            $this->data['message'] = 'Email is already register';
            return response()->json($this->data, 400);
        }

        $validator['password'] = Hash::make($validator['password']);

        $user = User::create($validator);

        $jwt = JWT::encode($user->email, env('SECRET_KEY'));

        $this->data['success'] = true;
        $this->data['response'] = 200;
        $this->data['message'] = 'Success Register';
        $this->data['data'] = [
            'token' => $jwt
        ];

        return reponse()->json($this->data, 200);
    }
}