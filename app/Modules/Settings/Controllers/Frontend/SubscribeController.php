<?php

namespace App\Modules\Settings\Controllers\Frontend;

use App\Modules\Settings\Models\District;
use App\Modules\Settings\Models\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters',
        ]);

        if ($validator->fails()){
            $data = ['responseCode' => false, 'data' => $validator->errors()];
            return response()->json($data);
        }

        $newsletter = new Newsletter();
        $newsletter->email = $request->input('email');
        $newsletter->ip_address = $request->ip();
        $newsletter->subscribed_at = Carbon::now();
        $newsletter->status = 1;
        $newsletter->save();

        $data = ['responseCode' => true, 'data' => 'You have subscribed successfully'];
        return response()->json($data);
    }

    public function getDistrictsByDivision(Request $request){
        $divisionId = $request->input('division_id');
        $districts = District::where('division_id', $divisionId)
            ->orderBy('name', 'ASC')
            ->pluck('name','id');
        $data = ['responseCode' => 1, 'data' => $districts];
        return response()->json($data);
    }
}
