<?php

namespace App\Http\Common\Controllers;

use App\Domain\Common\Models\Person;
use App\Http\Common\Controllers\Controller;
use App\Http\Common\Requests\LoginRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;

class AuthController extends Controller {
    /**
     * Register api
     *
     * @return Response
     */
    public function register(Request $request) {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Erro de validação.', $validator->errors());
        }

        DB::beginTransaction();
        try {
            $user = Auth::user();
            $person_id = DB::table('person')->insertGetId([
                'contract_id' => $user->contract_id,
                'person_type' => isset($input['cnpj']) ? Person::PERSON_TYPE_LEGAL_PERSON : Person::PERSON_TYPE_PHYSICAL_PERSON,
                'cnpj' => $input['cnpj'] ?? null,
                'cpf' => $input['cpf'] ?? null,
                'name' => $input['name']
            ]);
            $userId = DB::table('users')->insertGetId([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'contract_id' => $user->contract_id,
                'person_id' => $person_id,
                'active' => true
            ]);
            DB::commit();

            return $this->sendResponse(['user_id' => $userId], 'Novo usuário registrado com sucesso.');
        } catch (Exception $err) {
            DB::rollback();
            return $this->sendError('Erro ao tentar registrar usuário.', $err->getMessage());
        }
    }

    /**
     * Login api
     *
     * @return Response
     */
    public function login(LoginRequest $request) {
        $clientSecret = $request->header('Client');
        $contract = $this->getClientSecretContract($clientSecret);

        if ($contract && Auth::attempt([
                'contract_id' => $contract->id,
                'email' => $request->email,
                'password' => $request->password,
                'active' => true
            ])) {
            $user = Auth::user();
            $contract = DB::table('contract')->find($user->contract_id);
            $result['token'] = $user->createToken($contract->nome . "/" . $user->name)->accessToken;

            return $this->sendResponse($result, 'Autenticação realizada com sucesso.');
        }

        return $this->sendError('Não autorizado.', ['error' => 'Não autorizado'], 401);
    }

    private function getClientSecretContract($clientSecret) {
        if (!empty($clientSecret)) {
            $client = DB::table('oauth_clients')->where('secret', '=', $clientSecret)->first();
            if (!empty($client)) {
                $personalAccess = DB::table('oauth_personal_access_clients')->where('client_id', '=', $client->id)->first();
                return DB::table('contract')->where('personal_access_client_id', '=', $personalAccess->id)->first();
            }
        }

        return false;
    }
}
