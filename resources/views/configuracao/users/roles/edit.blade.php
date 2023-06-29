@extends('adminlte::page')

@section('title', 'Editando Perfis')

@section('content_header')
    <h1>Editando Perfis</h1>
@stop

@section('content')

<div class="row justify-content-md-center">
    <div class="col-md-10 ">
        <!-- general form elements -->
        <div class="card">
          <!-- /.card-header -->
          <!-- form start -->
          <div class="card-body">
            @include('adminlte::partials.form-alert')
            {!! html()->form('put', route('configuracao.roles.update', $role->id))->open() !!}
            <div class="form-group">
                <label for="name">Nome do Perfil</label>
                {!! html()->text('name', $role->name)->class('form-control')->placeholder('nome_perfil') !!}
                <i>Os nomes não podem conter espaços e obrigatoriamente tem que ser em caixa baixa. <b>Exemplo:</b> nome_teste, criar_usuario</i>
            </div>
            <div class="form-group">
                <label for="description">Descrição do Perfil</label>
                {!! html()->text('description', $role->description)->class('form-control')->placeholder('nome perfil') !!}
            </div>
          </div>
          {{-- Minimal with icon only --}}
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </div>
      <!-- /.card -->
      {!! html()->form()->close() !!}
      </div>
</div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
@stop