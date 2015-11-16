<?php 

    $h_dir = $_SERVER["DOCUMENT_ROOT"]."inc/";
    //$h_dir = $_SERVER["DOCUMENT_ROOT"]."inc/";
    include_once( $h_dir."database.academico.inc.php" );

    
    $tipo_usuario = isset($_POST["tipo_usuario"]) ? $_POST["tipo_usuario"] : "";
    $usuario = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : "";
    $senha = isset($_POST["senha"]) ? trim($_POST["senha"]) : "";

    // parâmetros a serem enviados pela url
    $param = "";
  
    // retorna dados do aluno logado
    $sql  = "SELECT COUNT(*) aluno as cnt_reg";
    $sql .= " WHERE alu_matricula = '".$usuario."'";
    $sql .= "   AND alu_email = '".$email."'";
    $aluno = new TDatabase_Academico_Aluno();
    $result = $aluno->query($sql);

    if ($rst = $obj->query( $sql )) {
      
      if ($dat = $obj->fetch($rst)) {
        $num = $dat["reg_cnt"];
      }
    }
    
    if ($num == 1) {

      // senha a ser recuperada
      $senha = $dat["alu_senha"];

      //
      // Envia senha por e-mail para o aluno
      //

      // caso recuperação ocorra, e-mail seja enviado
      // o usuário vê uma mensagem indicando o sucesso
        $param.="?recup=ok";

      // página principal do sistema acadêmico para o aluno
      header("Location: recuperacao_senha.php".$param);
    
    } else {
    
      // carrega página de recuperação de novamente
      $param = "?negado=1";
      header("Location: recuperacao_senha.php".$param);
    
    }

?>