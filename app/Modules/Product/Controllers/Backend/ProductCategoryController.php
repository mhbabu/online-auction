<?php

namespace App\Modules\Product\Controllers\Backend;

use App\DataTables\Backend\Product\ProductCategoryDataTable;
use App\Modules\Product\Models\ProductCategory;
use App\Libraries\Encryption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductCategoryDataTable $dataTable){
        return $dataTable->render("Product::backend.categories.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view("Product::backend.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validate($request, [
            'name' => ['required', Rule::unique('product_categories')->where(function ($query) { $query->where('is_archive', false);})],
            'status' => 'required'
        ]);

        $productCategory = new ProductCategory();
        $productCategory->name = $request->input('name');
        $productCategory->status = $request->input('status');
        $productCategory->save();

        return redirect(route('admin.product.categories.index'))->with('flash_success', 'Product category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $productCategoryId
     * @return \Illuminate\Http\Response
     */
    public function show($productCategoryId)
    {
        $decodedId = Encryption::decodeId($productCategoryId);
        $data['productCategory'] = ProductCategory::find($decodedId);

        return view("Product::backend.categories.view", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $productCategoryId
     * @return \Illuminate\Http\Response
     */
    public function edit($productCategoryId)
    {
        $decodedId = Encryption::decodeId($productCategoryId);
        $data['productCategory'] = ProductCategory::find($decodedId);

        return view("Product::backend.categories.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $ProductCategoryId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productCategoryId)
    {
        $decodedId = Encryption::decodeId($productCategoryId);
        $this->validate($request, [
            'name' => ['required', Rule::unique('product_categories')->ignore($decodedId)->where(function ($query) { $query->where('is_archive', false);})],
            'status' => 'required'
        ]);

        $productCategory = ProductCategory::find($decodedId);
        $productCategory->name = $request->input('name');
        $productCategory->status = $request->input('status');
        $productCategory->save();

        return redirect(route('admin.product.categories.index'))->with('flash_success', 'Product category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $ProductCategoryId
     * @return \Illuminate\Http\Response
     */
    public function delete($productCategoryId)
    {
        $decodedId = Encryption::decodeId($productCategoryId);
        $productCategory = ProductCategory::find($decodedId);
        $productCategory->is_archive = 1;
        $productCategory->deleted_by = auth()->user()->id;
        $productCategory->deleted_at = Carbon::now();
        $productCategory->save();
        session()->flash('flash_success', 'Product category deleted successfully!');
    }
}
