<?php

namespace App\Modules\Product\Controllers\Backend;

use App\DataTables\Backend\Product\ProductDataTable;
use App\Modules\Product\Models\Product;
use App\Modules\Product\Models\ProductCategory;
use App\Libraries\Encryption;
use App\Modules\Product\Models\ProductType;
use App\Modules\Settings\Models\Photo;
use App\Modules\Settings\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    protected $referenceType;
    protected $referenceId;
    protected $photo;
    protected $dimensions;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render("Product::backend.products.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = ProductCategory::where(['is_archive' => false, 'status' => true])->orderBy('name', 'ASC')->pluck('name', 'id');
        $data['types'] = ProductType::where(['is_archive' => false, 'status' => true])->orderBy('name', 'ASC')->pluck('name', 'id');

        return view("Product::backend.products.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', Rule::unique('products')->where(function ($query) use ($request) {
                $query->where([
                'category_id' => $request->input('category_id'),
                'is_archive' => false
                ]);
            })],
            'slug' => ['required', Rule::unique('products')->where(function ($query) use ($request) {
                $query->where([
                    'category_id' => $request->input('category_id'),
                    'is_archive' => false
                ]);
            })],
            'type_id' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'end_time' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $product               = new Product();
        $product->title        = $request->input('title');
        $product->category_id  = $request->input('category_id');
        $product->type_id      = $request->input('type_id');
        $product->slug         = $request->input('slug') ? $request->input('slug') : Str::slug($request->input('title'), '-');
        $product->price        = $request->input('price');
        $product->end_time     = $request->input('end_time');
        $product->description  = $request->input('description');
        $product->status       = $request->input('status');
        $product->save();

        if ($request->hasFile('photo')) {
            $this->referenceType = 'product';
            $this->referenceId   = $product->id;
            $photos              = $request->file('photo');
            $this->dimensions    = [854, 460];
            foreach ($photos as $this->photo)
                Settings::StorePhoto($this->referenceType, $this->referenceId, $this->photo, $this->dimensions);
        }

        return redirect(route('admin.products.index'))->with('flash_success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $productId
     * @return \Illuminate\Http\Response
     */
    public function show($productId)
    {
        $decodedId = Encryption::decodeId($productId);
        $data['product'] = Product::getProductInfo($decodedId);
        $data['photos'] = Photo::where('reference_id', $decodedId)
            ->where('reference_type', 'product')
            ->where('is_archive', 0)
            ->where('status', 1)
            ->get();

        return view("Product::backend.products.view", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $productId
     * @return \Illuminate\Http\Response
     */
    public function edit($productId)
    {
        $decodedId = Encryption::decodeId($productId);
        $data['product'] = Product::find($decodedId);
        $data['photos'] = Photo::where('reference_id', $decodedId)
            ->where('reference_type', 'product')
            ->where('is_archive', 0)
            ->where('status', 1)
            ->get();

        $data['categories'] = ProductCategory::where(['is_archive' => false, 'status' => true])->orderBy('name', 'ASC')->pluck('name', 'id');
        $data['types'] = ProductType::where(['is_archive' => false, 'status' => true])->orderBy('name', 'ASC')->pluck('name', 'id');

        return view("Product::backend.products.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $productId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productId)
    {
        $decodedId = Encryption::decodeId($productId);
        $this->validate($request, [
            'title' => ['required', Rule::unique('products')->ignore($decodedId)->where(function ($query) use ($request) {
                $query->where([
                'category_id' => $request->input('category_id'),
                'is_archive' => false
                ]);
            })],
            'slug' => ['required', Rule::unique('products')->ignore($decodedId)->where(function ($query) use ($request) {
                $query->where([
                    'category_id' => $request->input('category_id'),
                    'is_archive' => false
                ]);
            })],
            'category_id' => 'required',
            'type_id' => 'required',
            'price' => 'required',
            'end_time' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $product               = Product::find($decodedId);
        $product->title        = $request->input('title');
        $product->category_id  = $request->input('category_id');
        $product->type_id      = $request->input('type_id');
        $product->slug         = $request->input('slug') ? $request->input('slug') : Str::slug($request->input('title'), '-');
        $product->price        = $request->input('price');
        $product->description  = $request->input('description');
        $product->status = $request->input('status');
        $product->save();

        if ($request->hasFile('photo')) {
            $this->referenceType = 'product';
            $this->referenceId   = $product->id;
            $photos              = $request->file('photo');
            $this->dimensions    = [854, 460];
            foreach ($photos as $this->photo)
                Settings::StorePhoto($this->referenceType, $this->referenceId, $this->photo, $this->dimensions);
        }

        return redirect(route('admin.products.index'))->with('flash_success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $productId
     * @return \Illuminate\Http\Response
     */
    public function delete($productId)
    {
        $decodedId           = Encryption::decodeId($productId);
        $product             = Product::find($decodedId);
        $product->is_archive = 1;
        $product->deleted_by = auth()->user()->id;
        $product->deleted_at = Carbon::now();
        $product->save();

        Photo::where('reference_type','product')->where('reference_id',$decodedId)->update(['is_archive'=>1]);
        session()->flash('flash_success', 'Product deleted successfully!');
    }
}
