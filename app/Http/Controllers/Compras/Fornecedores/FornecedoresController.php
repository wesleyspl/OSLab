<?php

namespace App\Http\Controllers\Compras\Fornecedores;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fornecedores\FornecedoresRequest;
use App\Models\Compras\Fornecedores\Fornecedores;
use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function index(Request $request)
    {    
        $fornecedores  = Fornecedores::paginate(10); // Paginate the results
        $data['request'] = $request;
        $data['fornecedores'] = $fornecedores;
        
        return view('compras.fornecedores.index', $data);
    }

    public function create(){
        return view('compras.fornecedores.create');
    }

    public function store(FornecedoresRequest $request)
    {
        try {
            $fornecedores = new Fornecedores();
            $fornecedores->registro = $request->registro;
            if (strlen($request->registro) > 14) { // definido que é um CNPJ
                $fornecedores->pessoa_juridica = 1;
            }
            $fornecedores->name = $request->nome;
            $fornecedores->email = $request->email;
            $fornecedores->celular = $request->celular;
            $fornecedores->telefone = $request->telefone;
            $fornecedores->password = $request->password;
            $fornecedores->cep = $request->cep;
            $fornecedores->logradouro = $request->logradouro;
            $fornecedores->numero = $request->numero;
            $fornecedores->bairro = $request->bairro;
            $fornecedores->cidade = $request->cidade;
            $fornecedores->uf = $request->uf;
            $fornecedores->complemento = $request->complemento;
            $fornecedores->save();

            return redirect()->route('fornecedor.index')
            ->with('success', 'fornecedor cadastrado com sucesso.');
        } catch (\Throwable $th) {
            throw $th;
        }

    }

}
