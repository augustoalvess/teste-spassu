<?php

namespace App\Http\Register\Controllers;

use Illuminate\Http\Request;
use App\Domain\Register\Services\RelatorioService;
use App\Http\Common\Controllers\Controller;
use Exception;
use PDF;

class RelatorioController extends Controller
{
    public function index() {
        return view('components.register.relatorios.relatorio-form', [
            'route' => route('relatorio.generate')
        ]);
    }

    public function generate(Request $request) {
        try {
            $data = $request->all();
            $return = RelatorioService::generate($data);

            $pdf = PDF::loadView("components.register.relatorios.relatorio", ['data' => $return]);
            return $pdf->setPaper('a4', 'landscape')->stream('relatoriomensal.pdf');
        } catch (Exception $err) {
            return redirect()->back()->withInput()->with('error', __('strings.generate_error', ['error' => $err->getMessage()]));
        }
    }
}
