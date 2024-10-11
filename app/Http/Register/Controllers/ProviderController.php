<?php

namespace App\Http\Register\Controllers;

use App\Domain\Register\Services\ProviderService;
use App\Http\Common\Controllers\Controller;
use App\Http\Common\Requests\PersonRequest;
use Exception;
use Illuminate\Support\Facades\DB;

class ProviderController extends Controller
{
    public function index() {
        $rows = ProviderService::get();
        return view('components.register.provider.provider-index', ['rows' => $rows]);
    }

    public function new() {
        return view('components.register.provider.provider-form', ['route' => route('register.providers.insert')]);
    }

    public function edit($code) {
        $model = ProviderService::find($code);
        if ($model) {
            return view('components.register.provider.provider-form', ['route' => route('register.providers.update', $code), 'data' => $model]);
        }
        return redirect()->back();
    }

    public function insert(PersonRequest $request) {
        $data = $request->all();
        DB::beginTransaction();
        try {
            ProviderService::insert($data);
            DB::commit();
            return redirect(route('register.providers'))->with('success', __('strings.insert_success'));
        } catch (Exception $err) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', __('strings.insert_error', ['error' => $err->getMessage()]));
        }
    }

    public function update(PersonRequest $request, $code) {
        $data = $request->all();
        DB::beginTransaction();
        try {
            ProviderService::update($data, $code);
            DB::commit();
            return redirect(route('register.providers'))->with('success', __('strings.update_success'));
        } catch (Exception $err) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', __('strings.update_error', ['error' => $err->getMessage()]));
        }
    }

    public function delete($code) {
        DB::beginTransaction();
        try {
            ProviderService::delete($code);
            DB::commit();
            return redirect(route('register.providers'))->with('success', __('strings.delete_success'));
        } catch (Exception $err) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', __('strings.delete_error', ['error' => $err->getMessage()]));
        }
    }
}
