@extends('adminlte::page')

@section('title', 'Criando Perfil')

@section('content_header')
    <h1>Criando Perfil</h1>
@stop

@section('content')

<div class="row justify-content-md-center">
    <div class="col-md-10 ">
        <!-- general form elements -->
        <div class="card">
          
          <!-- /.card-header -->
          <!-- form start -->
          
          <div class="card-body">          
          @if(count($errors) > 0)
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            <ul>
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif        
          {!! Form::open(['route' => ['configuracoes.roles.store']]) !!}
            <div class="form-group">
              <label for="name">Nome da Perfil</label>
              {!! Form::text('name', '', ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'nome_perfil']) !!}              
              <i>Os nomes não podem conter espaços e obrigatoriamente tem que ser em caixa baixa. <b>Exemplo:</b> nome_teste, criar_usuario</i>
            </div>
            <div class="form-group">
              <label for="description">Descrição da Perfil</label>              
              {!! Form::text('description', '', ['id' => 'description','class' => 'form-control', 'placeholder' => 'nome perfil']) !!}              
            </div>
          </div>          
          {{-- Minimal with icon only --}}
          <!-- /.card-body -->          
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>       
        </div>
      <!-- /.card -->
      {!! Form::close() !!}
    
      </div>

</div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
    <script>
        @if(session('success'))
          $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Cadastro realizado com Sucesso!',
                    subtitle: '',
                    autohide: true,
                    delay: 2000,
                    body: '{{Session::get("success")}}'
          })
        @endif
        @if(count($errors) > 0)
          $(document).Toasts('create', {
                  class: 'bg-danger',
                  title: 'Ocorreu um erro',
                  subtitle: '',
                  autohide: true,
                  delay: 2000,
                  body: 'Por favor verifique o formulário'
          })
        @endif
    </script>
    
@stop