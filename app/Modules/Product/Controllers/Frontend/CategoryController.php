<?php

namespace App\Modules\Product\Controllers\Frontend;
use App\Libraries\CommonFunction;
use App\Libraries\Encryption;
use App\Modules\Product\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    /**
     * @param $categoryId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request,$categoryId)
    {
        $decodedCategoryId = Encryption::decodeId($categoryId);
        $data['category'] = ProductCategory::find($decodedCategoryId);
        $data['categoryProducts'] = CommonFunction::productInfo()->where('product_categories.id', $decodedCategoryId)
            ->select('products.*', 'product_categories.id as product_category_id', 'product_categories.name as product_category_name', 'photos.path as photo_path')
            ->orderBy('products.id', 'desc')
            ->groupBy('products.id')
            ->paginate(16);

        if ($request->ajax()) {
            $view = view("Product::frontend.category.load-more",$data)->render();
            return response()->json(['html'=>$view]);
        }

        return view("Product::frontend.category.index",$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productCategories()
    {
        $data['productCategories'] = ProductCategory::join('products',function($join){
            $join->on('products.category_id','=','product_categories.id');
            $join->where('products.status',1);
            $join->where('products.is_archive',0);
        })
        ->where('product_categories.status',1)
        ->where('product_categories.is_archive',0)
        ->groupBy('product_categories.id')
        ->get([
            DB::raw("COUNT(*) as total_products"),
            'product_categories.id as product_category_id',
            'product_categories.name as product_category_name',
        ]);

        return view("Product::frontend.category.product-category",$data);
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
    public function update(Request $request,$id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
    }
}
