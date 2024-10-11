<?php

namespace App\Http\Register\Controllers;

use App\Domain\Register\Services\CategoryService;
use App\Http\Common\Controllers\Controller;
use App\Http\Register\Requests\CategoryRequest;
use Exception;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index() {
        $rows = CategoryService::get();
        return view('components.register.category.category-index', ['rows' => $rows]);
    }

    public function new() {
        $types = CategoryService::listTypes();
        $categories = CategoryService::list();
        return view('components.register.category.category-form', ['route' => route('register.categories.insert'), 'categories' => $categories, 'types' => $types]);
    }

    public function edit($code) {
        $types = CategoryService::listTypes();
        $model = CategoryService::find($code);
        if ($model) {
            $categories = CategoryService::list();
            return view('components.register.category.category-form', ['route' => route('register.categories.update', $code), 'categories' => $categories, 'types' => $types, 'data' => $model]);
        }
        return redirect()->back();
    }

    public function insert(CategoryRequest $request) {
        $data = $request->all();
        DB::beginTransaction();
        try {
            CategoryService::insert($data);
            DB::commit();
            return redirect(route('register.categories'))->with('success', __('strings.insert_success'));
        } catch (Exception $err) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', __('strings.insert_error', ['error' => $err->getMessage()]));
        }
    }

    public function update(CategoryRequest $request, $code) {
        $data = $request->all();
        DB::beginTransaction();
        try {
            CategoryService::update($data, $code);
            DB::commit();
            return redirect(route('register.categories'))->with('success', __('strings.update_success'));
        } catch (Exception $err) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', __('strings.update_error', ['error' => $err->getMessage()]));
        }
    }

    public function delete($code) {
        DB::beginTransaction();
        try {
            CategoryService::delete($code);
            DB::commit();
            return redirect(route('register.categories'))->with('success', __('strings.delete_success'));
        } catch (Exception $err) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', __('strings.delete_error', ['error' => $err->getMessage()]));
        }
    }
}
