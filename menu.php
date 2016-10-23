
            <div class="navbar nav_title" style="border: 0;">
              <a href="painel.php" class="site_title"><i class="fa fa-paw"></i> <span>ATOM | Sistemas</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bem-vindo,</span>
                <h2><?php echo $login;?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3><?php echo $permissao;?></h3>
                <ul class="nav side-menu">
                  <li><a href="painel.php"><i class="fa fa-home"></i> PAINEL<span class="label label-success pull-right">Beta 1.0</span></a>
                  </li>
                  <li><a><i class="fa fa-edit"></i>SECRETARIA<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a>Cadastro<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="cad_aluno.php">Aluno</a>
                            </li>
                            <li class="sub_menu"><a href="cad_matricula.php">Matricula</a>
                            </li>
                            <li><a href="cad_turma.php">Turma</a>
                            </li>
                            </li>
                            <li><a href="cad_usuario.php">Usuários</a>
                            </li>
                            <li><a href="cad_sala.php">Salas</a>
                            </li>
                            <li><a href="cad_unidade.php">Unidades</a>
                            </li>
                          </ul>
                        </li>
                        <li><a>Listar<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="lis_aluno.php">Alunos</a>
                            </li>
                            <li><a href="lis_matricula.php">Matriculados<span class="label label-success pull-right">2016</span></a>
                            </li>
                            <li><a href="lis_turma.php">Turmas</a>
                            </li>
                            </li>
                            <li><a href="lis_usuario.php">Usuários</a>
                            </li>
                            <li><a href="lis_sala.php">Salas</a>
                            </li>
                            <li><a href="lis_serie.php">Série</a>
                            </li>
                            <li><a href="lis_unidade.php">Unidades</a>
                            </li>
                          </ul>
                        </li>
                        <li><a>Declarações<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Aluno</a>
                            </li>
                            <li><a href="#level2_1">Turma</a>
                            </li>
                            <li><a href="#level2_2">Professor</a>
                            </li>
                          </ul>
                        </li>
                    </ul>
                  </li> 
                                   
                  <li><a><i class="fa fa-th-large"></i>ALMOXARIFADO<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a>Cadastro<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Aluno</a>
                            </li>
                            <li><a href="#level2_1">Turma</a>
                            </li>
                            <li><a href="#level2_2">Professor</a>
                            </li>
                          </ul>
                        </li>
                        <li><a>Listagem<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Aluno</a>
                            </li>
                            <li><a href="#level2_1">Turma</a>
                            </li>
                            <li><a href="#level2_2">Professor</a>
                            </li>
                          </ul>
                        </li>
                        <li><a>Declarações<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Aluno</a>
                            </li>
                            <li><a href="#level2_1">Turma</a>
                            </li>
                            <li><a href="#level2_2">Professor</a>
                            </li>
                          </ul>
                        </li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-support"></i>SUPORTE<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="form.html">Contato</a></li>
                        <li><a href="form.html">Remoto</a></li>
                    </ul>
                  </li>  

                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->