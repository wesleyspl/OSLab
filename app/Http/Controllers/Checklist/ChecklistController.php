<?php

namespace App\Http\Controllers\Checklist;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checklist\StoreUpdateChecklistRequest;
use App\Models\Checklist\Checklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChecklistController extends Controller
{
    function __construct()
    {
        // ACL DE PERMISSÕES
        $this->middleware('permission:checklist', ['only'=> 'index']);
        $this->middleware('permission:checklist_create', ['only'=> ['create', 'store']]);
        $this->middleware('permission:checklist_show', ['only'=> 'show']);
        $this->middleware('permission:checklist_edit', ['only'=> ['edit', 'update']]);
        $this->middleware('permission:checklist_destroy', ['only'=> 'destroy']);

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checklists = Checklist::paginate(100);
        return view('checklist.index', compact('checklists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('checklist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateChecklistRequest $request)
    {
        // dd($request->input());
        try {
            $checklist = new Checklist();
            $checklist->name = $request->checklist_name;
            $checklist->categoria_id = $request->categoria_id;
            $checklist->descricao = $request->descricao;
            $checklist->user_id = Auth::id();
            $checklist->checklist = $request->checklist;
            $checklist->save();
            return redirect()->route('checklist.index')
            ->with('success', 'Checklist cadastrado com sucesso.');
        } catch (\Throwable $th) {
            throw $th;

        }
    }




    /**
     * Display the specified resource.
     */
    public function show(Checklist $checklist)
    {
        return view('checklist.show', compact('checklist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checklist $checklist)
    {
        return view('checklist.edit', compact('checklist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateChecklistRequest $request, Checklist $checklist)
    {
        try {
            $checklist->name = $request->checklist_name;
            $checklist->categoria_id = $request->categoria_id;
            $checklist->descricao = $request->descricao;
            $checklist->user_id = Auth::id();
            $checklist->checklist = $request->checklist;
            $checklist->save();
            return redirect()->route('checklist.index')
            ->with('success', 'Checklist Atualizado com sucesso.');
        } catch (\Throwable $th) {
            throw $th;

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checklist $checklist)
    {
        try {
            $checklist->delete();
            return redirect()->route('checklist.index')
                ->with('success', 'Checklist excluído com sucesso.');

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}