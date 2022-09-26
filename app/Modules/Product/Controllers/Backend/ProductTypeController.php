<?php

namespace App\Modules\Product\Controllers\Backend;

use App\DataTables\Backend\Product\ProductTypeDataTable;
use App\Modules\Product\Models\ProductCategory;
use App\Libraries\Encryption;
use App\Modules\Product\Models\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductTypeDataTable $dataTable){
        return $dataTable->render("Product::backend.types.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view("Product::backend.types.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validate($request, [
            'name' => ['required', Rule::unique('product_types')->where(function ($query) { $query->where('is_archive', false);})],
            'status' => 'required'
        ]);

        $productType = new ProductType();
        $productType->name = $request->input('name');
        $productType->status = $request->input('status');
        $productType->save();

        return redirect(route('admin.product.types.index'))->with('flash_success', 'Product type created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $productTypeId
     * @return \Illuminate\Http\Response
     */
    public function edit($productTypeId)
    {
        $decodedId = Encryption::decodeId($productTypeId);
        $data['productType'] = ProductType::find($decodedId);

        return view("Product::backend.types.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $productCategoryId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productTypeId)
    {
        $decodedId = Encryption::decodeId($productTypeId);
        $this->validate($request, [
            'name' => ['required', Rule::unique('product_types')->ignore($decodedId)->where(function ($query) { $query->where('is_archive', false);})],
            'status' => 'required'
        ]);

        $productCategory = ProductCategory::find($decodedId);
        $productCategory->name = $request->input('name');
        $productCategory->status = $request->input('status');
        $productCategory->save();

        return redirect(route('admin.product.types.index'))->with('flash_success', 'Product type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $productCategoryId
     * @return \Illuminate\Http\Response
     */
    public function delete($productTypeId)
    {
        $decodedId = Encryption::decodeId($productTypeId);
        $productType = ProductType::find($decodedId);
        $productType->is_archive = 1;
        $productType->deleted_by = auth()->user()->id;
        $productType->deleted_at = Carbon::now();
        $productType->save();
        session()->flash('flash_success', 'Product type deleted successfully!');
    }
}
