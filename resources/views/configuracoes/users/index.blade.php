@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <h1>Configuração de Permissões</h1>
@stop

@section('content')
<div class="col-md-12">  
    <div class="card">
      <div class="card-header">
        <div class="row"></div>
          {{-- <a href="{{ route('configuracoes.roles.index') }}">
              <button type="button"  class="btn  btn-default"> Voltar</button>
          </a>
          <a href="{{ route('configuracoes.users.create') }}">
            <button type="button"  class="btn  btn-primary">Criar Permissão</button>
          </a> --}}
      </div>
      <!-- /.card-header -->      
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Usuário</th>         
              <th>Setor</th>
              <th>Departamento</th>
              <th style="width: 40px"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name}}</td>
                <td>{{ $user->setor->name ?? ''}}</td>      
                <td>{{ $user->departamento->departamento ?? '' }}</td>                                               
                <td>
                  <div class="btn-group">                                        
                    <a href="{{ route('configuracoes.users.edit', $user->id) }}" title="Editar" class="btn btn-left btn-info"><i class="fas fa-edit"></i></a>
                    <button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#modal-excluir_{{ $user->id }}"><i class="fas fa-trash"></i></button>                                    
                  </div>
                  <div class="modal fade" id="modal-excluir_{{ $user->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Realmente deseja Excluir?</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p><b>Nome:</b> {{ $user->name}}</p>                                                   
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>                          
                            {!! Form::open(['route' => ['configuracoes.users.destroy', $user->id], 'method' => 'delete']) !!}                            
                            <input type="submit" class="btn btn-danger delete-permission" value="Excluir Usuário">                           
                          </form>

                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->  
                </td>
              </tr>
                
            @endforeach      
          </tbody>
        </table>
      </div>
      
      <!-- /.card-body -->
      <div class="card-footer clearfix">
       
          {{-- {{$pacientes->appends(['busca' => $busca])->links() }}	 --}}
          {{-- {{$users->links() }}	 --}}

      </div>
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
                      body: '{{Session::get("mensagem")}}'
            })
      @endif
    </script>
@stop