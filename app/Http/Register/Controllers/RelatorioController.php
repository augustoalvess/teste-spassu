<?php

namespace App\Http\Register\Controllers;

use App\Domain\Register\Services\RelatorioService;
use App\Domain\Register\Services\ReportService;
use App\Http\Common\Controllers\Controller;
use App\Http\Register\Requests\RelatorioRequest;
use Exception;

class RelatorioController extends Controller
{
    public function index() {
        $formats = ReportService::getFormats();
        return view('components.register.relatorio-form', [
            'route' => route('relatorio.generate'), 
            'formats' => $formats
        ]);
    }

    public function generate(RelatorioRequest $request) {
        $data = $request->all();
        try {
            RelatorioService::generate($data);
            return redirect(route('relatorio'))->with('success', __('strings.generate_success'));
        } catch (Exception $err) {
            return redirect()->back()->withInput()->with('error', __('strings.generate_error', ['error' => $err->getMessage()]));
        }
    }
}
