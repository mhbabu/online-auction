<?php

namespace App\Modules\Product\Controllers\Frontend;

use App\DataTables\Backend\Product\ProductBidingDataTable;
use App\Libraries\CommonFunction;
use App\Http\Controllers\Controller;
use App\Libraries\Encryption;
use App\Modules\Product\Models\Biding;
use App\Modules\Product\Models\Product;
use App\Modules\Product\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    /**
     * @param $productId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
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

        return view("Product::frontend.product.index",$data);
    }

    public function categoryWiseProduct($categoryId){
        $decodedCategoryId = Encryption::decodeId($categoryId);
        $data['category'] = ProductCategory::find($decodedCategoryId);
        if($decodedCategoryId == 1)
           $data['products'] = CommonFunction::productInfo()
                ->leftJoin('bidings','bidings.product_id','=','products.id')
                ->leftJoin('users','users.id','=','bidings.user_id')
                ->where('products.category_id', $decodedCategoryId)
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
        else
        $data['products'] = CommonFunction::productInfo()
            ->select('products.*', 'product_categories.id as product_category_id', 'product_categories.name as product_category_name', 'photos.path as photo_path')
            ->where('products.category_id', $decodedCategoryId)
            ->where('products.sold_status', 0)
            ->orderBy('products.id', 'desc')
            ->groupBy('products.id')
            ->paginate(20);

        return view("Product::frontend.product.category-product",$data);
    }



    public function productDetail($slug)
    {
        $data['product'] = CommonFunction::getSingleProductInfo($slug);
        $data['productPhotos'] = CommonFunction::getSingleProductPhotos($data['product']->id);
        $data['maxBidingPrice'] = Biding::leftJoin('users','users.id','=','bidings.user_id')
           ->where('bidings.product_id', $data['product']->id)
           ->first([
               DB::raw('MAX(price) as price'),
               'users.name as user_name'
           ]);

        return view("Product::frontend.product.product-detail", $data);
    }

    public function storeBid(Request $request, $productId){

        $targetBiding = Biding::selectRaw('max(price) as price')->where('product_id', $productId)->first();
        $productPrice = Product::find($productId);
        $price = $targetBiding->price ?? $productPrice->price;

        if(!($request->input('biding_price') > $price))
            return redirect()->back()->with('error',"Your bidding price should be more than $price Tk !");

        $biding = new Biding();
        $biding->product_id = $productId;
        $biding->user_id = auth()->user()->id;
        $biding->price = $request->input('biding_price');
        $biding->biding_date = Carbon::now()->format('Y-m-d H:i:s');
        $biding->save();
        return redirect()->back()->with('success','Your have bidden successfully!');
    }


    public function customerBiddingPrice(ProductBidingDataTable $dataTable){
        return $dataTable->render("Product::backend.bidings.index");
    }


}
