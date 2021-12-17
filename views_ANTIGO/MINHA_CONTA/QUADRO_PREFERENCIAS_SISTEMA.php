   <div class="card">
    <div class="card-header card-header-primary">
      <h4 class="card-title">PREFERÊNCIAS DO SISTEMA</h4>
      <p class="card-category">Escolha pessoal</p>
    </div>
    <div class="card-body">
     <h1>PRIVACIDADE</h1>
     <table class="table table-hover table-bordered">
      <tbody>
       <tr>
        <td>
          <label for='pref_mostrar_conect' class='<?=$var?>click_privacidade'>MOSTRAR MEU PERFIL PARA USÚARIOS CONECTADO</label>
        </td>
        <td>
         <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" value=""  
            id='pref_mostrar_conect'>
            <span class="form-check-sign">
              <span class="check"></span>
            </span>
          </label>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <label for='pref_mostrar_promo' class='<?=$var?>click_privacidade'>PROMOÇÃO, RECOMENDAÇÕES DE CURSOS</label>
      </td>
      <td>
       <div class="form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="" checked 
          id='pref_mostrar_promo'>
          <span class="form-check-sign">
            <span class="check"></span>
          </span>
        </label>
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <label for='pref_mostrar_not_prof' class='<?=$var?>click_privacidade'>
        ANÚNCIO DOS INSTRUTORES EM QUE ESTOU INSCRITO
      </label>
    </td>
    <td>
     <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" value="" checked 
        id='pref_mostrar_not_prof'>
        <span class="form-check-sign">
          <span class="check"></span>
        </span>
      </label>
    </div>
  </td>
</tr>
</tbody>
</table>
</div>
</div>
<script>
  $(".<?=$var?>click_privacidade")
  .css('cursor','pointer')
</script>