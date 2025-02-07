@extends('adminlte::page')

@section('title', 'Fornecedores')

@section('content_header')
    <h1><i class="fa-solid fa-users "></i> Fornecedores</h1>
@stop

@section('content')
<div class="">
    <div class="card">
        <div class="card-header">
            <a href="{{ url()->previous() }}">
                <button type="button"  class="btn btn-sm btn-default">
                    <i class="fa-solid fa-chevron-left"></i>
                    Voltar
                </button>
            </a>
            @can('fornecedor_create')
            <a href="{{ route('fornecedor.create') }}">
                <button type="button"  class="btn btn-sm btn-oslab">
                    <i class="fa-solid fa-plus"></i>
                    Criar Fornecedor
                </button>
            </a>
            @endcan
            <button class="btn btn-sm bg-lightblue float-right" type="button" data-toggle="collapse" data-target="#collapseFornecedor" aria-expanded="false" aria-controls="collapseFornecedor">
                <i class="fa-solid fa-filter"></i>
                Filtros
            </button>
            <div class="collapse @if (count($request->all()) > 0) show @endif" id="collapseFornecedor">
                <hr>
                {{ html()->form('get', route('fornecedor.index'))->open() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2 ">
                            <label for="busca">Fornecedor / email / Celular / Telefone</label>
                            {!! html()->text('busca', $request->busca)->class('form-control form-control-sm')->placeholder('Buscar por Fornecedor, Email, Celular, ou telefone') !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-2 ">
                            <label for="tipo">Tipo de Fornecedor</label>
                            {!! html()->select('tipo', ['1' => 'Pessoa Jurídica', '0' => 'Pessoa Física'], $request->tipo)->class('form-control form-control-sm')->placeholder('Todos') !!}
                        </div>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <div class="form-group text-right mb-2">
                            <button type="submit"  class="btn bg-lightblue btn-sm">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                Buscar
                            </button>
                            @if (count($request->all()) > 0)
                            <a href="{{ route('fornecedor.index') }}">
                                <button type="button"  class="btn bg-gray btn-sm">
                                    <i class="fa-solid fa-xmark"></i>
                                    Limpar
                                </button>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                {!! html()->form()->close() !!}
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body pt-2 table-responsive">
            @include('compras.fornecedores.partials.fornecedor-table', ['fornecedoresTable' => $fornecedores,  'edit' => true, 'show'=> true,  'destroy' => true])
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $fornecedores->appends($request->all())->links() }}
        </div>
    </div>
    {{-- Modal Excluir --}}
    @can('fornecedor_destroy')
        @include('adminlte::partials.modal.modal-excluir')
    @endcan
    {{-- // Modal Excluir --}}
</div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
@stop