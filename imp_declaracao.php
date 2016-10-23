<?php $pagina = 'Lista Alunos Matriculados'; 
  include('permissao.php'); 
  require_once 'Classes/Conexao.php'; 
  require_once 'Classes/Matricula.php'; 
  $idAluno = $_GET['idAluno'];

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

                      <?php
                        include('conexao.php');
                        $idAluno = $_GET['idAluno'];
                          $matricula = $con->prepare("SELECT
                                                        matricula.aluno_alu_id,
                                                        matricula.turma_tur_id,
                                                        matricula.mat_ano,
                                                        matricula.mat_status,
                                                        aluno.alu_id,
                                                        aluno.alu_nome,
                                                        turma.tur_id,
                                                        turma.tur_nome,
                                                        turma.tur_turno,
                                                        turma.tur_ano,
                                                        turma.serie_ser_id,
                                                        serie.ser_id,
                                                        serie.ser_nome,
                                                        sala.sal_id,
                                                        sala.sal_nome,
                                                        turma.sala_sal_id,
                                                        sala.unidade_uni_id,
                                                        unidade.uni_id,
                                                        unidade.uni_nome,
                                                        unidade.uni_endereco,
                                                        unidade.uni_fone,
                                                        unidade.uni_gerente
                                                        FROM
                                                        matricula
                                                        INNER JOIN aluno ON matricula.aluno_alu_id = aluno.alu_id
                                                        INNER JOIN turma ON matricula.turma_tur_id = turma.tur_id
                                                        INNER JOIN serie ON turma.serie_ser_id = serie.ser_id
                                                        INNER JOIN sala ON turma.sala_sal_id = sala.sal_id
                                                        INNER JOIN unidade ON sala.unidade_uni_id = unidade.uni_id
                                                        WHERE matricula.turma_tur_id = turma.tur_id AND matricula.aluno_alu_id = $idAluno;");
                          $matricula->execute();
                            while ($lista=$matricula->fetch(PDO::FETCH_ASSOC)) {
                              $nomeAluno = $lista["alu_nome"];
                              $serie = $lista["ser_nome"];
                              $unidade = $lista["uni_nome"];
                              $uni_endereco = $lista["uni_endereco"];
                              $uni_fone = $lista["uni_fone"];
                              $ano = $lista["mat_ano"];
                            }
                      ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>

            
              <div class="col-md-12">
                
                  <div class="x_title">
                    <h5>Pre-Escolar Infante Tiradentes.</h5>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <section class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h3>
                                          <i class="fa fa-globe"></i> Infante Tiradentes
                                          <small class="pull-right">
                                          </small>
                          </h3>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          Unidade de Ensino:
                          <address>
                                          <strong><?php echo $unidade;?></strong>
                                          <br><?php echo $uni_endereco;?>
                                          
                                      </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          Contato:
                          <address>
                                          <strong>Fone: <?php echo $uni_fone;?></strong>
                                          <br>Email: contato@crechepm.com.br
                                          
                                      </address>
                        </div>
                        
                      </div>
                      <!-- /.row -->
                      <br />
                      <br />
                      <br />
                      <br />

                      <div class="col-xs-12 invoice-header">
                          <h2 align="center"><strong>DECLARAÇÃO</strong></h2>
                      </div>
                      <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-12">
                          
                          
                          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Declaro, para os devidos fins, que o(a) aluno(a) <?php echo $nomeAluno;?>, esta regularmente matriculado(a) na série:<?php echo $serie;?>, da Unidade: <?php echo $unidade;?>, no ano de <?php echo $ano;?>.
                          </p>
                        </div>

                      <!-- /.row -->
                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-6">
                          
                        </div>
                        

                        <!-- /.col -->
                        <div class="col-xs-6">
                          <p class="lead"></p>
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th style="width:50%"><?php 
                                            date_default_timezone_set('America/Manaus');
                                            $date = date('d/m/Y');
                                            echo 'Manaus,'.$date.'.';
                                           ?></th>
                                  <td></td>
                                </tr>
                                <tr>
                                  <th style="width:50%">Assinatura:</th>
                                  <td></td>
                                </tr>
                                <tr>
                                  <th>Carimbo da Instituição:</th>
                                  <td></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->


                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class="col-xs-12">
                          
                          
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

       
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