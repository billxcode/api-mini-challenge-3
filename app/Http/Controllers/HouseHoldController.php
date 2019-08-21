<?php


namespace App\Http\Controllers;


use App\Models\HouseHold;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use App\Models\Auth as User;

class HouseHoldController extends Controller
{
    protected $user;

    public function __construct(Request $request)
    {
        $this->middleware('jwt.auth');
        $this->data['success'] = true;
        $this->data['response'] = 200;
        $this->data['message'] = 'Success retrieve list household';


        $token = $request->token;
        $jwt = JWT::decode($token, env('SECRET_KEY'), ['HS256']);
        $this->user = User::where('email', $jwt)->first();
    }

    public function getDetailHouseHold($id)
    {
        $this->data['data'] = HouseHold::find($id);
        return response()->json($this->data, 200);
    }

    public function getListHouseHold()
    {
        $this->data['data'] = HouseHold::all();
        return response()->json($this->data, 200);
    }

    public function storeProfileHouseHold(Request $request)
    {
        $data = $request->all();

        if ($request->has('photo')) {
            $img = $request->file('photo');
            $name = md5(Date('Y-m-d h:s:i')).'.'.$img->extension();
            $img->move('photo/', $name);
            $data['photo'] = $name;
        }

        $data['auth_id'] = $this->user->id;

        HouseHold::create($data);

        return $data;

    }
}