<?php

namespace Modules\Inventory\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Inventory\Entities\Product;
use Modules\Inventory\Http\Requests\CreateProductRequest;
use Modules\Inventory\Http\Requests\UpdateProductRequest;
use Modules\Inventory\Repositories\ProductRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Suscriptions\Entities\Status;

class ProductController extends AdminBaseController
{
    /**
     * @var ProductRepository
     */
    private $product;
    public $status;

    public function __construct(ProductRepository $product, Status $status)
    {
        parent::__construct();

        $this->product = $product;
        $this->status = $status;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = $this->product->paginate(20);
        return view('inventary::admin.products.index', compact('products'));

        //$products = $this->product->all();

       // return view('inventory::admin.products.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $statuses = $this->status->lists();
        return view('inventory::admin.products.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateProductRequest $request
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {

        try {
            $this->product->create($request->all());

            return redirect()->route('admin.inventory.product.index')
                ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('inventary::products.title.products')]));
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()
                ->withError(trans('core::core.messages.resource error', ['name' => trans('inventary::products.title.products')]))->withInput($request->all());
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        $statuses=$this->status_>lists();
        return view('inventory::admin.products.edit', compact('product','statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Product $product
     * @param  UpdateProductRequest $request
     * @return Response
     */
    public function update(Product $product, UpdateProductRequest $request)
    {
        try{
            if(isset($request['options'])){
                $options=(array)$request['options'];
            }else{$options = array();}
            isset($request->mainimage) ? $options["mainimage"] = saveImage($request['mainimage'], "assets/inventory/product/" . $product->id . ".jpg") : false;
            $request['options'] = json_encode($options);
            $this->product->update($product, $request->all());
            return redirect()->route('admin.inventory.product.index')
                ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('inventory::products.title.products')]));
        }catch (\Exception $e){
            \Log::error($e);
            return redirect()->back()
                ->withError(trans('core::core.messages.resource error', ['name' => trans('inventory::products.title.products')]))->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return Response
     */
    public function destroy(Product $product)
    {
        try{
            $this->product->destroy($product);
            return redirect()->route('admin.inventory.product.index')
                ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('inventory::products.title.products')]));
        }catch (\Exception $e){
            \Log::error($e);
            return redirect()->back()
                ->withError(trans('core::core.messages.resource error', ['name' => trans('inventory::products.title.products')]));
        }
    }

}
