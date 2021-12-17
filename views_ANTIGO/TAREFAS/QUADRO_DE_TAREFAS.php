    <div class="card">
      <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
          <div class="nav-tabs-wrapper">
       
            <!-- INCIO LISTA TAREFAS -->
            <ul class="nav nav-tabs" data-tabs="tabs">
              <li class="nav-item">
                <a class="nav-link active" href="#<?=$var?>tarefas_pendentes" data-toggle="tab">
                  <i class="material-icons">pending_actions</i> PENDENTES
                  <div class="ripple-container"></div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#<?=$var?>tarefas_realizadas" data-toggle="tab">
                  <i class="material-icons">check_circle</i>FEITOS
                  <div class="ripple-container"></div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#<?=$var?>tarefas_corrigidas" data-toggle="tab">
                  <i class="material-icons">done_all</i> CORRIGIDO
                  <div class="ripple-container"></div>
                </a>
              </li>
            </ul>
            <!-- FIM LISTA TAREFAS -->
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="tab-content">
         <!-- CORPO TAREFAS PENDENTES -->
         <div class="tab-pane active" id="<?=$var?>tarefas_pendentes">
          <table class="table">
            <tbody>
              <tr>
               <td>
                MICROBIOLOGIA TESTE 4
              </td>
              <td class="td-actions text-right">
                <button type="button" rel="tooltip" title="Fazer" class="btn btn-primary btn-link btn-sm">
                  <i class="material-icons">edit</i>
                </button>

              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!--FIM  CORPO TAREFAS PENDENTES -->
      <div class="tab-pane" id="<?=$var?>tarefas_realizadas">
        <table class="table">
          <tbody>
            <tr>
             <td>FISIOLOGIA TESTE 7</td>
             <td class="td-actions text-right">
              <button type="button" rel="tooltip" title="Refazer" class="btn btn-primary btn-link btn-sm">
                <i class="material-icons">edit</i>
              </button>

            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="tab-pane" id="<?=$var?>tarefas_corrigidas">
      <table class="table">
        <tbody>

          <tr>
            <td>GRAMÁTICA INSTRUMENTAL</td>
            <td class="td-actions text-right">
              <button type="button" rel="tooltip" title="VER CORREÇÃO" class="btn btn-danger btn-link btn-sm">
                <i class="material-icons">remove_red_eye</i>
              </button>
            </td>
          </tr>
          <tr>
            <td>MATEMÁTICA INSTRUMENTAL</td>
            <td class="td-actions text-right">
              <button type="button" rel="tooltip" title="VER CORREÇÃO" class="btn btn-danger btn-link btn-sm">
                <i class="material-icons">remove_red_eye</i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>