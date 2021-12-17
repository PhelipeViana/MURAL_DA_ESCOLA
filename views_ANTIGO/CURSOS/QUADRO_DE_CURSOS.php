 <div class="card">
  <div class="card-header card-header-primary">
    <h4 class="card-title">CURSOS</h4>
    <p class="card-category"><?=date('d/m/y')?></p>
  </div>
  <div class="card-body table-responsive">
    <table class="table table-hover">
      <thead class="text-warning">
        <th>CURSO</th>
        <th>STATUS</th>
        <th>CONCLUSÃO</th>
      </thead>
      <tbody>
        <tr>
          <td>FISIOLOGIA COMPLETA</td>
          <td>NÃO MATRICULADO</td>
          <td>
            <a href="#">SOLICITAR LIBERAÇÃO</a>
          </td>
        </tr>
        <tr>
          <td>
            <a href="?pagina=CURSOS&id=1">
              FISIOLOGIA
            </a>
          </td>
          <td>CONCLUIDO</td>
          <td>
            <div class="progress">
              <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">100%</div>
            </div>
          </td>
        </tr>
        <tr>
          <td>

            <a href="?pagina=CURSOS&id=2">
             MICROBIOLOGIA
            </a>
          </td>
          <td>MATRICULADO</td>
          <td>
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
            </div>
          </td>
        </tr>
        <tr>
          <td>CALCULO I</td>
          <td>TRANCADO</td>
          <td>
            <div class="progress">
              <div class="progress-bar bg-danger" role="progressbar" style="width: 58%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">58%</div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>