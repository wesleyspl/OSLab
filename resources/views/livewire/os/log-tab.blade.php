<div>
    <div class="timeline mt-2">
        <div class="time-label">
            <span class="bg-lightblue">10 Feb. 2014</span>
        </div>
        <div>
            <i class="fas fa-money-bill  bg-danger"></i>
            <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> 11:20:55 01/11/2023 </span>
                <h3 class="timeline-header no-border">
                    <b>Despesa </b> R$ 120,00
                    <a href="" class="mt-0 float-right btn btn-default btn-xs">
                        <i class="fas fa-eye"></i>
                        <span class="d-none d-sm-inline">visualizar</span>
                    </a>
                </h3>
            </div>
        </div>
        <div>
            <i class="fas fa-money-bill  bg-green"></i>
            <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> 11:20:55 01/11/2023 </span>
                <h3 class="timeline-header no-border">
                    <b>Pagamento Recebido</b> R$ 120,00
                    <a href="" class="mt-0 float-right btn btn-default btn-xs">
                        <i class="fas fa-eye"></i>
                        <span class="d-none d-sm-inline">visualizar</span>
                    </a>
                </h3>
            </div>
        </div>
        <div>
            <i class="fas fa-user bg-green"></i>
            <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> 11:20:55 01/11/2023 </span>
                <h3 class="timeline-header no-border">
                    <b>Alteração no status:</b>
                   <span class="badge bg-warning">Orçamento</span>
                    <a class="mt-0 float-right btn btn-warning btn-xs" data-toggle="collapse" href="#observacoes-log-div"   aria-expanded="true" aria-controls="observacoes" >
                        Adicionar Comentário
                        <i id="obervacoes-log-icon" class="fa-solid fa-caret-right"></i>
                    </a>
                    <div id="observacoes-log-div" class="collapse timeline-body">
                        {!! html()->textarea('observacoes')->class('form-control mb-2')->placeholder('Observações (opcional)') !!}
                    </div>
                </h3>
            </div>
        </div>

        <div class="time-label">
            <span class="bg-lightblue">3 Jan. 2014</span>
        </div>


        <div>
            <i class="fas fa-plus bg-lightblue"></i>
            <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> 11:20:55 01/11/2023 </span>
                <h3 class="timeline-header no-border">
                    <b>Abertura de OS</b>
                </h3>
            </div>
        </div>
    </div>
    <script>
         document.addEventListener('livewire:load', function () {
             $('#observacoes-log-div').on('show.bs.collapse', function () {
                 $('#obervacoes-log-icon').removeClass('fa-caret-right').addClass('fa-caret-down');
             })
             $('#observacoes-log-div').on('hidden.bs.collapse', function () {
                 $('#obervacoes-log-icon').removeClass('fa-caret-down').addClass('fa-caret-right');
             })
        });
    </script>
</div>