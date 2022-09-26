<?php

namespace App\Modules\Settings\Controllers\Frontend;

use App\Modules\Settings\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function getDistrictByDivission(Request $request){
        $districts = District::where('division_id',$request->input('division_id'))
            ->orderBy('name', 'ASC')
            ->pluck('name','id');
        $data = ['responseCode' => 1, 'data' => $districts];
        return response()->json($data);
    }
}
