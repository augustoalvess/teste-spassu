<?php

namespace App\Http\Register\Controllers;

use App\Domain\Register\Services\AssuntoService;
use App\Http\Common\Controllers\Controller;
use App\Http\Register\Requests\AssuntoRequest;
use App\Http\Register\Requests\AutorRequest;
use Exception;
use Illuminate\Support\Facades\DB;

class AssuntoController extends Controller
{
    public function index() {
        $rows = AssuntoService::get();
        return view('components.register.assuntos-index', [
            'rows' => $rows
        ]);
    }

    public function new() {
        return view('components.register.assuntos-form', [
            'route' => route('assuntos.insert')
        ]);
    }

    public function edit($code) {
        $model = AssuntoService::find($code);
        if ($model) {
            return view('components.register.assuntos-form', [
                'route' => route('assuntos.update', $code), 
                'data' => $model
            ]);
        }
        return redirect()->back();
    }

    public function insert(AssuntoRequest $request) {
        $data = $request->all();
        DB::beginTransaction();
        try {
            AssuntoService::insert($data);
            DB::commit();
            return redirect(route('assuntos'))->with('success', __('strings.insert_success'));
        } catch (Exception $err) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', __('strings.insert_error', ['error' => $err->getMessage()]));
        }
    }

    public function update(AutorRequest $request, $code) {
        $data = $request->all();
        DB::beginTransaction();
        try {
            AssuntoService::update($data, $code);
            DB::commit();
            return redirect(route('assuntos'))->with('success', __('strings.update_success'));
        } catch (Exception $err) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', __('strings.update_error', ['error' => $err->getMessage()]));
        }
    }

    public function delete($code) {
        DB::beginTransaction();
        try {
            AssuntoService::delete($code);
            DB::commit();
            return redirect(route('assuntos'))->with('success', __('strings.delete_success'));
        } catch (Exception $err) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', __('strings.delete_error', ['error' => $err->getMessage()]));
        }
    }
}
