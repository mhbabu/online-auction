<?php

namespace App\Modules\Home\Controllers\Frontend;

use App\Libraries\CommonFunction;
use App\Modules\Settings\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index()
    {
       $data['liveProducts'] = CommonFunction::productInfo()
        ->leftJoin('bidings','bidings.product_id','=','products.id')
        ->leftJoin('users','users.id','=','bidings.user_id')
        ->where('products.category_id', 1)
        ->where('products.sold_status', 0)
        ->orderBy('products.id', 'desc')
        ->groupBy('products.id')
        ->get([
            'products.*',
            'product_categories.id as product_category_id',
            'product_categories.name as product_category_name',
            'photos.path as photo_path',
             DB::raw('MAX(bidings.price) as biding_price'),
            'users.name as user_name',
            'users.email',
            'users.photo as user_photo'
        ]);

        $data['upComingProducts'] = CommonFunction::productInfo()
            ->select('products.*', 'product_categories.id as product_category_id', 'product_categories.name as product_category_name', 'photos.path as photo_path')
            ->where('products.category_id', 2)
            ->where('products.sold_status', 0)
            ->orderBy('products.id', 'desc')
            ->groupBy('products.id')
            ->paginate(20);

        $data['prebidingProducts'] = CommonFunction::productInfo()
            ->select('products.*', 'product_categories.id as product_category_id', 'product_categories.name as product_category_name', 'photos.path as photo_path')
            ->where('products.category_id', 3)
            ->where('products.sold_status', 0)
            ->orderBy('products.id', 'desc')
            ->groupBy('products.id')
            ->paginate(20);

        $data['sliders'] = Slider::take(5)->orderBy('id','desc')->get();
        CommonFunction::setCompanyInfo();

        return view("Home::frontend.index",$data);
    }


    public function aboutUs(){

        dd("About Us");
    }

    public function contact(){
        return view("Home::frontend.contact");
    }

    public function blogs(){
        dd("Blogs");
    }

    public function wishList()
    {
        return view("Home::frontend.wish-list");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function faqs()
    {
        return view("Home::frontend.faq");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function termCondition()
    {
        return view("Home::frontend.term-condition");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
