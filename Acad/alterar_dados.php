<?php

  $h_dir = $_SERVER["DOCUMENT_ROOT"]."inc/";
  //$h_dir = $_SERVER["DOCUMENT_ROOT"]."/inc/";
  include_once( $h_dir.'database.academico.inc.php' );
    
  session_start();

  // não há usuário logado
  if ( empty($_SESSION) ) {
    header("Location: login.php");
  }

  $matricula = isset($_SESSION["matricula"]) ? $_SESSION["matricula"] : "";
  
  $sql  = "SELECT * FROM aluno ";
  $sql .= " WHERE alu_matricula = '".$matricula."'";
  
  $aluno = new TDatabase_Academico_Aluno();
  $rst = $aluno->query( $sql );
  $info = $aluno->fetch($rst);
  
  // dados recebidos pela URL
  $senha = "";
  $email = "";
  if ( isset($_GET['senha']) ) {
    $senha = $_GET['senha'];
  }
  if ( isset($_GET['email']) ) {
    $email = $_GET['email'];
  }
  
  echo "<!DOCTYPE HTML>
  <html>
  <head>
    <meta http-equiv='content-type' content='text/html' />
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <link rel='stylesheet' href='../visual2.css'/>
    <link rel='stylesheet' href='acad.css' />
    <link rel='stylesheet' href='alterar_dados.css' />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <title>Sistema Acadêmico</title>
   
    <script type='text/javascript'>
  
    function verificaAlteracaoDados() {
      var senha = '".$senha."';
      var email = '".$email."';

      if ( ( senha == 'ok' ) || ( email == 'ok' ) ) {
      
        document.getElementById('info_senha').innerHTML = 'Dados alterados com sucesso!';
        document.getElementById('info_senha').style.color = 'green';
      
      } else {

        document.getElementById('info_senha').style.color = 'red';

        if ( (senha == 'noold') || (senha == 'oldinc') ) {
          
          document.getElementById('info_senha').innerHTML = 'Digite a senha antiga para alterar seus dados.';
        
        } else if (senha == 'difsenhas') {
        
            document.getElementById('info_senha').innerHTML = 'As senhas digitadas não correspondem.';
            
        } else if (senha == 'noconfirm') {
        
            document.getElementById('info_senha').innerHTML = 'Favor confirmar a senha.';
        
        }
        
      }
      
    } // fim da função
    
    function limpa() {
      document.getElementById('campo_email').value = '';
    }
  
    </script>
   
  </head>
   
  <body onload='verificaAlteracaoDados()'>
      
      <div id='header'>   <!-- Cabeçalho -->        
           <a href='login.php'><img alt='Sistema Acadêmico' src='http://i.imgur.com/lp5bycZ.png'/><span id='title'>SISTEMA ACADÊMICO</span></a>
      </div>              <!--Fim do Cabeçalho -->
      
      <div id='container'> <!-- O conteudo da página -->
          <div id='content'>
          <div id='blank'></div> 
          <h1>Alterar dados</h1>
          
          <form action='altera.php' method='post' enctype='multipart/form-data'>
            <div class='dados'>
                <div>
                  <span class='info' id='info_senha'></span>
                </div>
                
                <div>
                  <span id='txt_nome' class='texto_campo'>Nome</span>
                  <br>
                  <input type='text' class='campo' id='campo_nome' name='nome' value='".$info['alu_nome']."' disabled />
                </div>
                
                <div>
                  <span id='txt_curso' class='texto_campo'>Curso</span>
                  <br>
                  <input type='text' class='campo' id='campo_curso' name='curso' value='".$info['alu_curso']."' disabled />
                </div>
                
                <div>
                  <span id='txt_turma' class='texto_campo'>Turma</span>
                  <br>
                  <input type='text' class='campo' id='campo_turma' name='turma' value='".$info['alu_turma']."' disabled />
                </div>
                
                <div>
                  <span id='txt_matricula' class='texto_campo'>Matrícula</span>
                  <br>
                  <input type='text' class='campo' id='campo_matricula' name='matricula' value='".$info['alu_matricula']."' disabled />
                </div>
        
                <div>
                  <span id='txt_senha_antiga' class='texto_campo'>Senha</span>
                  <br>
                  <input type='password' class='campo' id='campo_senha_antiga' name='senha_antiga' autofocus />
                </div>        
        
                <div>
                  <span id='txt_senha' class='texto_campo'>Nova senha</span>
                  <br>
                  <input type='password' class='campo' id='campo_senha' name='senha' />
                </div>
                
                <div>
                  <span id='txt_confirma_senha' class='texto_campo'>Confirmar senha</span>
                  <br>
                  <input type='password' class='campo' id='campo_confirma_senha' name='confirma_senha' />
                </div>
                
                <div>
                  <span id='email' class='texto_campo'>E-mail</span>
                  <br>
                  <input type='text' class='campo' id='campo_email' name='email' value='".$info['alu_email']."' onfocus=\"limpa()\" />
                </div>
        
                <div>
                  <input type='submit' value='Alterar' class='button' />
                </div>

                <div class='redirdiv'>
                  <!-- link para página principal do sistema acadêmico -->
                  <a href='menu.php' class='redir'>Voltar</a>
                </div>
          
          </div>
          </form>
          
          </div>
          
          <div class='footer'>  
             <div id='left'>
                  <a href='logout.php'>SAIR</a>
             </div>
             <div id='center'>
                  <span>© 2015 On Est Or Softwares</span>
             </div>        
          </div>
      </div>  <!-- Fim do conteudo da página -->
     
  </body>
  </html>";

?>