<?php


namespace App\Http\Middleware;


use Closure;
use Firebase\JWT\JWT;
use App\Models\Auth as User;

class JWTAuth
{
    protected $data = [
        'success' => false,
        'message' => 'Error Response',
        'response' => 400,
        'data' => []
    ];

    public function handle($request, Closure $next)
    {
        if ($request->has('token'))
        {
            $email = JWT::decode($request->token, env('SECRET_KEY'), ['HS256']);

            $user = User::where('email', $email)->first();

            if (!$user)
            {
                return $this->notAuth();
            }

        } else {

           return $this->notAuth();

        }

        return $next($request);
    }

    private function notAuth()
    {
        $this->data['message'] = 'You are not authenticated';
        return response()->json($this->data, 400);
    }
}