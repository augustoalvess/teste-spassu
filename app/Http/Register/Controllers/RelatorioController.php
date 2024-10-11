<?php

namespace App\Http\Register\Controllers;

use App\Domain\Register\Services\RelatorioService;
use App\Http\Common\Controllers\Controller;
use App\Http\Register\Requests\RelatorioRequest;
use Exception;
use PDF;

class RelatorioController extends Controller
{
    public function index() {

        /**
         Deve ser feito obrigatoriamente um relatório (utilizando o componente de relatórios de sua preferência(Crystal, ReportViewer, etc))
         e a consulta desse relatório deve ser proveniente de uma view criada no banco de dados. 
         Este relatório pode ser simples, mas permita o entendimento dos dados. 
         O relatório deve trazer as informações das 3 tabelas principais agrupando os dados por autor (atenção pois um livro pode ter mais de autor).
         */


        return view('components.register.relatorios.relatorio-form', [
            'route' => route('relatorio.generate')
        ]);
    }

    public function generate(RelatorioRequest $request) {
        try {
            $data = $request->all();
            $return = RelatorioService::generate($data);

            $pdf = PDF::loadView("components.register.relatorios.relatorio", $return);
            return $pdf->setPaper('a4', 'landscape')->stream('relatoriomensal.pdf');
        } catch (Exception $err) {
            return redirect()->back()->withInput()->with('error', __('strings.generate_error', ['error' => $err->getMessage()]));
        }
    }
}
