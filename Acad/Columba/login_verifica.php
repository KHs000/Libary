<?php

  $h_dir = $_SERVER["DOCUMENT_ROOT"]."inc/";
  include_once( $h_dir."database.academico.inc.php" );
  
  $tipo_usuario = isset($_POST["tipo_usuario"]) ? $_POST["tipo_usuario"] : "";
  $usuario = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : "";
  $senha = isset($_POST["senha"]) ? trim($_POST["senha"]) : "";

//  // debug
//  echo "tipo de usuario = ".$tipo_usuario."<br>\n";
//  echo "usuario = ".$usuario."<br>\n";
//  echo "senha = ".$senha."<br>\n";

  // inicializações
  $num = 0;
  // parâmetros a serem enviados pela url
  $param = "";

  if ( $tipo_usuario == "est" ) {

    // o tipo de usuário selecionado no login foi "estudante"
    $sql  = "SELECT COUNT(*) as reg_cnt";
    $sql .= "  FROM aluno";
    $sql .= " WHERE alu_matricula = '".$usuario."'";
    $sql .= "   AND alu_senha = '".$senha."'";

    $obj = new TDatabase_Academico_Aluno();
    if ($rst = $obj->query( $sql )) {
      if ($dat = $obj->fetch($rst)) {
        $num = $dat["reg_cnt"];
      }
    }
    $obj->close();

    echo "est,num=".$num."\n";

    if ($num == 1) {
      
      session_start();
      $_SESSION['matricula'] = $usuario;

      // página principal do sistema acadêmico para o aluno
      header("Location: alterar_dados.php");

    } else {

      // carrega página de login novamente
      $param = "?negado=1";
      header("Location: login.php".$param);

    }

  } else if ( $tipo_usuario == "adm" ) {

    // o tipo de usuário selecionado no login foi "administrador"
    $sql  = "SELECT COUNT(*) as reg_cnt";
    $sql .= "  FROM admin_acad";
    $sql .= " WHERE usuario = '".$usuario."'";
    $sql .= "   AND senha = '".$senha."'";

    $obj = new TDatabase_Academico_Admin();
    if ($rst = $obj->query( $sql )) {
      if ($dat = $obj->fetch($rst)) {
        $num = $dat["reg_cnt"];
      }
    }
    $obj->close();

    echo "adm,num=".$num."\n";

    if ($num == 1) {

      session_start();
      $_SESSION['usuario'] = $usuario;

      // página para download dos aplicativos para administrador
      header("Location: http://www.google.com");

    } else {

      // carrega página de login novamente
      $param = "?negado=1";
      header("Location: login.php".$param);

    }

  } // usuario adiministrativo

?>