<?php


namespace App\Http\Controllers;


use App\Models\HouseHold;
use Illuminate\Http\Request;

class HouseHoldController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
        $this->data['success'] = true;
        $this->data['response'] = 200;
        $this->data['message'] = 'Success retrieve list household';
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
        $data = $request;
    }
}