<?php $pagina = 'Cadastro de Usuário'; 
  include('permissao.php'); 
  require_once 'Classes/Conexao.php'; 
  require_once 'Classes/Usuario.php';
  include ('funcao.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include("titulo.php"); ?>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <?php include("menu.php"); ?>
          </div>
        </div>

         <!-- top navigation -->
        <div class="top_nav">
          <?php include("topo.php"); ?>
        </div>
        <!-- /top navigation -->

       

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
           
                <div class="x_panel">
              <div class="x_title">
                <h2><?php echo $pagina; ?> <small> </small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Settings 1</a>
                      </li>
                      <li><a href="#">Settings 2</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <div class="row">

                <?php
                      
                      if (isset($_POST['Cadastra'])) {
                      
                        $nome = $_POST['Nome'];
                        $login = $_POST['Login'];
                        $senha = $_POST['Senha'];
                        $fone = $_POST['Fone'];
                        $permissao = $_POST['Permissao'];
                        
                        //Se o usário não digitar nada nos campos 
                        if ($login=='' || $senha=='') {
                          //mensagem de aviso do preenchimento
                          
                          echo '<div class="alert alert-danger">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <strong>Ops.! Preencha os campos Obrigatórios</strong>
                              </div>';
                        //Se ele digitar os campos acima.
                        } else {
                          
                          $usuario = new Usuario();
                          $usuario->setNome($nome);
                          $usuario->setLogin($login);
                          $usuario->setSenha($senha);
                          $usuario->setFone($fone);
                          $usuario->setPermissao($permissao);
                                              
                            if ($usuario->cadastro()) {
                              //inserindo no log
                              //include ('funcao.php');
                              //atividadesistema($login, $pagina, $pagina);
                              //insereFinanceiro(); 
                              
                              echo "<script>alert('Sucesso na operação!');top.location.href='lis_usuario.php';</script>"; 
                            }else {
                              echo "<script>alert('Erro na operação!');top.location.href='lis_usuario.php';</script>"; 
                            }
                        

                        }
                      } else {
                        
                      }
                      

                    ?>



                  <?php
                        abreForm('', 'POST', 'multipart/form-data');
                        
                        input('Nome do Usuário:', 'text', 'Nome', 'col-md-12 col-sm-12 col-xs-12 form-group');
                        input('Login:', 'text', 'Login', 'col-md-6 col-sm-12 col-xs-12 form-group');
                        input('Senha:', 'text', 'Senha', 'col-md-6 col-sm-12 col-xs-12 form-group');
                        input('Fone','text', 'Fone', 'col-md-6 col-sm-12 col-xs-12 form-group');
                        selectPermissao('Permissão no Sistema:', 'select', 'Permissao', 'col-md-6 col-sm-12 col-xs-12 form-group');
                        botao('submit', 'Cadastra', 'btn btn-success');
                      fechaform('');
                      ?>
                </div>

              </div>
            </div>
             
          <!-- /top tiles -->

          
         
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include('rodape.php'); ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
  </body>
</html>