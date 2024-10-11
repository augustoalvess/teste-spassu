<?php

namespace App\Http\Register\Controllers;

use App\Domain\Register\Services\AutorService;
use App\Http\Common\Controllers\Controller;
use App\Http\Register\Requests\AutorRequest;
use Exception;
use Illuminate\Support\Facades\DB;

class AutorController extends Controller
{
    public function index() {
        $rows = AutorService::get();
        return view('components.register.autores.autores-index', [
            'rows' => $rows
        ]);
    }

    public function new() {
        return view('components.register.autores.autores-form', [
            'route' => route('autores.insert')
        ]);
    }

    public function edit($code) {
        $model = AutorService::find($code);
        if ($model) {
            return view('components.register.autores.autores-form', [
                'route' => route('autores.update', $code), 
                'data' => $model
            ]);
        }
        return redirect()->back();
    }

    public function insert(AutorRequest $request) {
        $data = $request->all();
        DB::beginTransaction();
        try {
            AutorService::insert($data);
            DB::commit();
            return redirect(route('autores'))->with('success', __('strings.insert_success'));
        } catch (Exception $err) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', __('strings.insert_error', ['error' => $err->getMessage()]));
        }
    }

    public function update(AutorRequest $request, $code) {
        $data = $request->all();
        DB::beginTransaction();
        try {
            AutorService::update($data, $code);
            DB::commit();
            return redirect(route('autores'))->with('success', __('strings.update_success'));
        } catch (Exception $err) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', __('strings.update_error', ['error' => $err->getMessage()]));
        }
    }

    public function delete($code) {
        DB::beginTransaction();
        try {
            AutorService::delete($code);
            DB::commit();
            return redirect(route('autores'))->with('success', __('strings.delete_success'));
        } catch (Exception $err) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', __('strings.delete_error', ['error' => $err->getMessage()]));
        }
    }
}
