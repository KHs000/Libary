<?php

  $h_dir = $_SERVER["DOCUMENT_ROOT"]."inc/";
  //$h_dir = $_SERVER["DOCUMENT_ROOT"]."/inc/";
  include_once( $h_dir.'database.academico.inc.php' );

  session_start();
  $matricula = isset($_SESSION["matricula"]) ? $_SESSION["matricula"] : "";

  // dados recebidos
  $senha_antiga = isset($_POST["senha_antiga"]) ? trim($_POST["senha_antiga"]) : "";
  $senha = isset($_POST["senha"]) ? trim($_POST["senha"]) : "";
  $confirma_senha = isset($_POST["confirma_senha"]) ? $_POST["confirma_senha"] : "";
  $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";

  // retorna dados do aluno logado
  $sql  = "SELECT * FROM aluno ";
  $sql .= " WHERE alu_matricula = '".$matricula."'";

  $aluno = new TDatabase_Academico_Aluno();
  $rst = $aluno->query($sql);
  $info_aluno = $aluno->fetch($rst);

  // parтmetros a serem enviados pela url
  $param = "";

  // verifica se senha antiga foi digitada
  if ( $senha_antiga != "" ) {

    // A senha antiga estс correta
    if ($senha_antiga == $info['alu_senha']) {
      //
      // Verficaчуo da senha
      //

      // verifica se apenas o primeiro campo de senha foi preenchido
      if ( ($senha != "") AND  ($confirma_senha == "") ) {

        $param .= "?senha=noconfirm"; 

      // verifica se os dois campos de senha foram preenchidos
      } else if ( ($senha != "") and ($confirma_senha != "") ) {

          // A confirmaчуo da senha e a senha sуo iguais
          if ($senha == $confirma_senha) {
            $aluno->alu_matricula = $matricula;
            $aluno->alu_senha = $senha;
            $aluno->update();
            $param .= "?senha=ok";
          } else {
            // A confirmaчуo da senha e a senha nуo sуo iguais
            $param .= "?senha=difsenhas";
          }

      }
      //
      // Fim da verficaчуo da senha
      //

      //
      // Verficaчуo do e-mail
      //
      
      // executa se o campo do e-mail nуo estiver vazio
      if ( $email != "" ) {

        // aluno alterou campo e-mail 
        if ( $email != $info['alu_email'] ) {

          $aluno->alu_matricula = $matricula;
          $aluno->alu_email = $email;
          $aluno->update();

          if( $param == "" ) {
          $param .= "?email=ok";
          } else {
          $param .= "&email=ok";
          } 

      // aluno nуo alterou campo e-mail  
        } else {

          if( $param == "" ) {
          $param .= "?email=mantem";
          } else {
          $param .= "&email=mantem";
          }

        }

      } 
      //
      // Fim da verficaчуo do e-mail
      //

    // senha antiga incorreta
    } else {
      $param .= "?senha=oldinc";
    }

  // senha antiga nуo foi digitada
  } else {
      $param .= "?senha=noold";
  }

  header("Location: alterar_dados.php".$param);

?>