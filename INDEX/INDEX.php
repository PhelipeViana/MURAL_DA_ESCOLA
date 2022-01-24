<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="INDEX/img/apple-icon.png">
  <link rel="icon" type="image/png" href="INDEX/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    MURAL DA ESCOLA
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="INDEX/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <link href="INDEX/demo/demo.css" rel="stylesheet" />
  <script src="INDEX/js/core/jquery.min.js"></script>
  <script src="INDEX/js/locais.js"></script>
  <script src="INDEX/js/mascara.js"></script>
  <style>
    @media only screen and (max-width: 273px) {


      .rodape {
        margin-top: 150px;
        background-color: blueviolet;
      }

    }

    .logo {
      width: 160px !important;
    }
  </style>
</head>

<body class="offline-doc">
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="#"></a>
      </div>
    </div>
  </nav>

  <div class="page-header clear-filter">
    <div class="page-header-image" style="background-color:blueviolet;"></div>
    <div class="content-center" style="margin-top: -150px;">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand">
          <h1 class="title">
            MURAL DA ESCOLA
          </h1>
          <h3 class="description">Seja bem Vindo</h3>
          <br />
          <a href="#" class="btn btn-primary btn-round btn-lg" id='btn_entrar' style="z-index: 1000;">LOGIN</a>
        </div>
      </div>
    </div>

  </div>
  <div class="rodape">
    <footer class="footer">
      <nav>
        <ul class="grupo">
          <li>
            <a href="#">
              <img src="INDEX/logo_mural/1.png" alt="" class="logo">
            </a>
          </li>
          <li>
            <a href="#">
              <img src="INDEX/logo_mural/2.png" alt="" class="logo">
            </a>
          </li>
          <li>
            <a href="#">
              <img src="INDEX/logo_mural/brasil.jpeg" alt="" class="logo">
            </a>
          </li>
          <li>
            <a href="#">
              <img src="INDEX/logo_mural/4.png" alt="" class="logo">
            </a>
          </li>
          <li>
            <a href="#">
              <img src="INDEX/logo_mural/5.png" alt="" class="logo">
            </a>
          </li>
          <li>
            <a href="#">
              <img src="INDEX/logo_mural/cultura.jpeg" alt="" class="logo">
            </a>
          </li>


        </ul>
      </nav>
    </footer>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">LOGIN</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="text-center">
            <a href="#" data-toggle="modal" data-target="#cadastro">Não tenho cadastro</a>
          </div>
          <form id="form_login">
            <label for="">Login</label>
            <input type="text" class="form-control" id="input_login" value="">
            <label for="">Senha</label>
            <input type="password" class="form-control" id="input_senha" value="">
            <input type="hidden" name="auth" value="1">
        </div>
        <div class="text-center">

          <a href="#" data-toggle="modal" data-target="#modal_senha">Esqueci a senha</a>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">ENTRAR</button>
          </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="cadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">CADASTRO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="text-center text-danger" id="error"></div>
          <form id="form_cadastro">
            <label for="">Nome</label>
            <input type="text" class="form-control" name="nome" required>
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" required id="input_email">
            <label for="">Telefone</label>
            <input type="text" class="form-control mask-phone" name="telefone" required>

            <label for="">Estado</label>
            <select class="form-control" id='estado' name="estado" required></select>
            <label for="">Cidade</label>
            <select class="form-control" id='cidade' name="cidade" required></select>
            <label for="">Sou</label>
            <select class="form-control" name="tipo" required>
              <option value="1">ALUNO(A)</option>
              <option value="2">PROFESSOR(A)</option>
            </select>
            <input type="hidden" name="auth" value="2">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Cadastrar</button>
          </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal_senha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Redefinir Senha</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form id="form_senha">
            <label for="">Email</label>
            <input type="text" class="form-control nv" id="input_email_esqueci" value="" name="email">
            <label for="">Telefone Cadastrado</label>
            <input type="text" class="form-control mask-phone nv" name="telefone" required>
            <label for="">Nova Senha</label>
            <input type="password" class="form-control nv" id="input_senha1" value="" name="senha1">
            <label for="">Digite Novamente</label>
            <input type="password" class="form-control nv" id="input_senha2" value="" name="senha2">
            <input type="hidden" name="auth" value="33">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">ENTRAR</button>
          </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
        </div>
      </div>
    </div>
  </div>


  <script src="INDEX/js/core/popper.min.js"></script>
  <script src="INDEX/js/core/bootstrap-material-design.min.js"></script>
  <script src="INDEX/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="INDEX/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="INDEX/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="INDEX/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="INDEX/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="INDEX/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="INDEX/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="INDEX/js/plugins/jquery.dataTables.min.js"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="INDEX/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="INDEX/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="INDEX/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="INDEX/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="INDEX/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="INDEX/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="INDEX/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="INDEX/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="INDEX/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="INDEX/demo/demo.js"></script>
  <script>
    $("#form_senha").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: "<?= $ENDPOINT ?>",
        data: $(this).serialize(),
        type: 'POST',
        dataType: 'json',
        success: function(response) {
          let status = response.st;
          if (status > 0) {
            alert('Entre com a nova senha!');
            $(".nv").val('');
            window.location.assign('index.php');
          } else {
            alert(response.msg)
            $(".nv").css('color', 'red');
          }

        }
      });
    })
    $("#btn_entrar").click(function(e) {
      $("#login").modal('show')
      // $(this).html('clicou')

    })
    $(document).ready(function() {

      $(".mask-phone").mask("(99) 99999-9999");

      selecionar.cidade("estado", "cidade");
      $("#form_login").submit(function(e) {
        e.preventDefault();
        let login = $("#input_login").val();
        let senha = $("#input_senha").val();

        Login(login, senha)

      });


      $("#form_cadastro").submit(function(e) {
        e.preventDefault();
        $.ajax({
          url: "<?= $ENDPOINT ?>",
          data: $(this).serialize(),
          type: 'POST',
          dataType: 'json',
          success: function(response) {
            let status = response.st;
            let erro = response.error;
            let corpo = "";
            if (status == 0) {
              for (let i = 0; i < erro.length; i++) {
                corpo += `<p>${erro[i]}<p>`;
              }
              $("#error").html(corpo)
            } else if (status == 1) {
              Login(response.login, response.senha);
            } else {
              alert('Ops! Email inválido');
              $("#input_email")
                .focus()
                .css('color', 'red')

            }
          }
        });
      });

      function Login(login, senha) {
        let obj = {
          login: login,
          senha: senha,
          auth: 1
        }
        $.ajax({
          url: "<?= $ENDPOINT ?>",
          data: obj,
          type: 'POST',
          dataType: 'json',
          success: function(response) {
            let status = response.st;
            if (status == 0) {
              alert('Login/senha não confere')
            } else {
              $.post('index.php', {
                token: response.token,
                acesso: response.acesso
              }, function(data, textStatus, xhr) {
                window.location.assign('index.php');
              });

            }


          }
        });
        //console.log(obj)

      }

      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
</body>

</html>