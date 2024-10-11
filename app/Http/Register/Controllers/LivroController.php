<?php

namespace App\Http\Register\Controllers;

use App\Domain\Register\Services\AssuntoService;
use App\Domain\Register\Services\AutorService;
use App\Domain\Register\Services\LivroService;
use App\Http\Common\Controllers\Controller;
use App\Http\Register\Requests\LivroRequest;
use Exception;
use Illuminate\Support\Facades\DB;

class LivroController extends Controller
{
    public function index() {
        $rows = LivroService::get();
        return view('components.register.livros-index', [
            'rows' => $rows
        ]);
    }

    public function new() {
        $autores = AutorService::list();
        $assuntos = AssuntoService::list();
        return view('components.register.livros-form', [
            'route' => route('livros.insert'), 
            'autores' => $autores,
            'assuntos' => $assuntos
        ]);
    }

    public function edit($code) {
        $model = LivroService::find($code);
        if ($model) {
            $autores = AutorService::list();
            $assuntos = AssuntoService::list();
            return view('components.register.livros-form', [
                'route' => route('livros.update', $code), 
                'autores' => $autores,
                'assuntos' => $assuntos,
                'data' => $model
            ]);
        }
        return redirect()->back();
    }

    public function insert(LivroRequest $request) {
        $data = $request->all();
        DB::beginTransaction();
        try {
            LivroService::insert($data);
            DB::commit();
            return redirect(route('livros'))->with('success', __('strings.insert_success'));
        } catch (Exception $err) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', __('strings.insert_error', ['error' => $err->getMessage()]));
        }
    }

    public function update(LivroRequest $request, $code) {
        $data = $request->all();
        DB::beginTransaction();
        try {
            LivroService::update($data, $code);
            DB::commit();
            return redirect(route('livros'))->with('success', __('strings.update_success'));
        } catch (Exception $err) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', __('strings.update_error', ['error' => $err->getMessage()]));
        }
    }

    public function delete($code) {
        DB::beginTransaction();
        try {
            LivroService::delete($code);
            DB::commit();
            return redirect(route('livros'))->with('success', __('strings.delete_success'));
        } catch (Exception $err) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', __('strings.delete_error', ['error' => $err->getMessage()]));
        }
    }
}
