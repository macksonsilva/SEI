<?php $pagina = 'Lista Alunos Matriculados'; 
  include('permissao.php'); 
  require_once 'Classes/Conexao.php'; 
  require_once 'Classes/Matricula.php'; 
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
                    <h2><?php echo $pagina; ?> <small>Users</small></h2>
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
                    <p class="text-muted font-13 m-b-30">
                      Informações sobre os usuários dos sistema e suas permissões de acesso.
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                    

                     
                      <thead>
                        <tr>
                          <th>Menu</th>
                          <th>ID - Aluno</th>
                          <th>Série</th>
                          <th>Turma</th>
                          <th>Sala</th>
                          <th>Unidade</th>
                          <th>Responsavel</th>
                          <th>Contato</th>
                          <th>Categoria</th>
                          <th>Status</th>
                          <th>Ano</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                          $matricula = new Matricula();
                          $listaMatricula = $matricula->listaMatriculados();
                          while ($lista=$listaMatricula->fetch(PDO::FETCH_ASSOC)) {
                            
                            if ($lista["mat_status"]  ==  "MATRICULADO") {
                              echo '
                              <tr>
                                <td>
                                    <!-- Single button -->
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Menu<span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu">
                                        <li><a href="#">Alterar</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="imp_declaracao.php?idAluno='.$lista["aluno_alu_id"].'" target="_blank">Declaração</a></li>
                                      </ul>
                                    </div>
                                </td>
                                <td><a href="painel.php"><font color="">'.$lista["aluno_alu_id"].' - '.$lista["alu_nome"].'</font></td></a>
                                <td><font color="">'.$lista["ser_nome"].'</font></td>
                                <td><font color="">'.$lista["tur_nome"].'</font></font></td>
                                <td><font color="">'.$lista["sal_nome"].'</font></td>
                                <td><font color="">'.$lista["uni_nome"].'</font></td>
                                <td><font color="">'.$lista["mat_responsavel"].'</font></td>
                                <td><font color="">'.$lista["mat_resp_contato"].'</font></td>
                                <td><font color="">'.$lista["mat_resp_categoria"].'</font></td>
                                <td><font color="">'.$lista["mat_status"].'</font></td>
                                <td><font color="">'.$lista["mat_ano"].'</font></td>
                              </tr>
                              ';
                            }else{
                              echo '
                              <tr>
                                <td>
                                    <!-- Single button -->
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Menu<span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu">
                                        <li><a href="#">Alterar</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Excluir</a></li>
                                      </ul>
                                    </div>
                                </td>
                                <td><a href="painel.php"><font color="red">'.$lista["aluno_alu_id"].' - '.$lista["alu_nome"].'</font></td></a>
                                <td><font color="red">'.$lista["ser_nome"].'</font></td>
                                <td><font color="red">'.$lista["tur_nome"].'</font></font></td>
                                <td><font color="red">'.$lista["sal_nome"].'</font></td>
                                <td><font color="red">'.$lista["uni_nome"].'</font></td>
                                <td><font color="red">'.$lista["mat_responsavel"].'</font></td>
                                <td><font color="red">'.$lista["mat_resp_contato"].'</font></td>
                                <td><font color="red">'.$lista["mat_resp_categoria"].'</font></td>
                                <td><font color="red">'.$lista["mat_status"].'</font></td>
                                <td><font color="">'.$lista["mat_ano"].'</font></td>
                              </tr>
                              ';
                            }
                          }
                        ?>
                      </tbody>
                    </table>
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