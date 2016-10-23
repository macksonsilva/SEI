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
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <img src="images/logo_mine_login.png">
           <form action="" method="POST">
              <h1>Área de Restrita</h1>
              <div>
                <input name="login" type="text" class="form-control" placeholder="Login" required="" />
              </div>
              <div>
                <input name="senha" type="password" class="form-control" placeholder="Senha" required="" />
              </div>
              <div>
                <button name="entrar" type="submit" class="btn btn-primary hidden-xs">Entrar</button>
                
                <a class="reset_pass" href="#">Lost your password?</a>

                        <?php 
                        
                                if (isset($_POST['entrar'])) {
                                  $login = $_POST['login'];
                                  $senha = $_POST['senha'];

                                  include('conexao.php');

                                  $usuario = $con->prepare("SELECT * FROM usuario WHERE usu_login=:usu_login AND usu_senha=:usu_senha;");
                                  $usuario->bindParam(':usu_login', $login, PDO::PARAM_STR);
                                  $usuario->bindParam(':usu_senha', $senha, PDO::PARAM_STR);
                                  $usuario->execute();
                                  $usuario->rowCount();

                                  if ($usuario->rowCount()==0) {
                                    echo '<div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <strong>Ops.! Acesso Negado</strong>
                                        </div>';
                                  } else {


                                    $usuarios = $con->prepare("SELECT * FROM usuario WHERE usu_login=:usu_login AND usu_senha=:usu_senha;");
                                    $usuarios->bindParam(':usu_login', $login, PDO::PARAM_STR);
                                    $usuarios->bindParam(':usu_senha', $senha, PDO::PARAM_STR);
                                    $usuarios->execute();

                                    while ($linha=$usuarios->fetch(PDO::FETCH_ASSOC)) {
                                          $permissao = $linha['usu_permissao'];
                                          $nome = $linha['usu_nome'];
                                    }
                                    session_start();
                                    $_SESSION['permissao'] = $permissao;
                                    $_SESSION['nome'] = $nome;
                                    $_SESSION['login'] = $login;
                                    $_SESSION['senha'] = $senha;
                                    
                                    header("Location: painel.php");
                                  }
                                  



                                } else {
                                  # code...
                                }
                                



                      ?>



              </div>

              <div class="clearfix"></div>

              <div class="separator">
                
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1> ATOM | Sistemas</h1>
                  <p>©2016 Todos os direitos reservados. Desenvolvido por: atomam.com.br</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
