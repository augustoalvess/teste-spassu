<?php

namespace App\Http\Register\Controllers;

use App\Domain\Accountancy\Services\IcmsOriginService;
use App\Domain\Accountancy\Services\MeasureUnitService;
use App\Domain\Register\Models\Category;
use App\Domain\Register\Services\CategoryService;
use App\Domain\Register\Services\ProductService;
use App\Domain\Register\Services\ProviderService;
use App\Http\Common\Controllers\Controller;
use App\Http\Common\Requests\ProductRequest;
use Exception;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index() {
        $rows = ProductService::get();
        return view('components.register.product.product-index', ['rows' => $rows]);
    }

    public function new() {
        $categories = CategoryService::list(['type' => Category::CATEGORY_TYPE_PRODUCT, 'active' => true]);
        $types = ProductService::listTypes();
        $measureunits = MeasureUnitService::list();
        $origins = IcmsOriginService::list();
        $providers = ProviderService::list();
        return view('components.register.product.product-form', ['route' => route('register.products.insert'), 'categories' => $categories, 'types' => $types, 'measureunits' => $measureunits, 'origins' => $origins, 'providers' => $providers]);
    }

    public function edit($code) {
        $model = ProductService::find($code);
        if ($model) {
            $categories = CategoryService::list(['type' => Category::CATEGORY_TYPE_PRODUCT, 'active' => true], ['id' => $model->category_id]);
            $types = ProductService::listTypes();
            $measureunits = MeasureUnitService::list();
            $origins = IcmsOriginService::list();
            $providers = ProviderService::list();
            return view('components.register.product.product-form', ['route' => route('register.products.update', $code), 'categories' => $categories, 'types' => $types, 'measureunits' => $measureunits, 'origins' => $origins, 'providers' => $providers, 'data' => $model]);
        }
        return redirect()->back();
    }

    public function insert(ProductRequest $request) {
        $data = $request->all();
        DB::beginTransaction();
        try {
            ProductService::insert($data);
            DB::commit();
            return redirect(route('register.products'))->with('success', __('strings.insert_success'));
        } catch (Exception $err) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', __('strings.insert_error', ['error' => $err->getMessage()]));
        }
    }

    public function update(ProductRequest $request, $code) {
        $data = $request->all();
        DB::beginTransaction();
        try {
            ProductService::update($data, $code);
            DB::commit();
            return redirect(route('register.products'))->with('success', __('strings.update_success'));
        } catch (Exception $err) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', __('strings.update_error', ['error' => $err->getMessage()]));
        }
    }

    public function delete($code) {
        DB::beginTransaction();
        try {
            ProductService::delete($code);
            DB::commit();
            return redirect(route('register.products'))->with('success', __('strings.delete_success'));
        } catch (Exception $err) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', __('strings.delete_error', ['error' => $err->getMessage()]));
        }
    }
}
