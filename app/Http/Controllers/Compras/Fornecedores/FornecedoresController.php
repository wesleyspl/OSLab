<?php

namespace App\Http\Controllers\Compras\Fornecedores;

use App\Http\Controllers\Controller;
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

    }
}
