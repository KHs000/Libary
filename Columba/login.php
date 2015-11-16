<?php
  
  session_start();
  
  // Verifica se a varíavel $_SESSION não está vazia
  if ( !empty($_SESSION) ) {
    
    // Confere se a variável global 'matricula' já foi definida
    // Em caso afirmativo, redireciona para página principal do Sistema Acadêmico
    header('Location: alterar_dados.php');
    
  }

  // dados recebidos pela URL
  $negado = 0;
  if ( isset($_GET['negado']) ) {
    $negado = $_GET['negado'];
  }
  //
  // Imprime página
  //
  echo "<!DOCTYPE HTML>
  <html>
  <head>
  
  <meta http-equiv='content-type' content='text/html' />
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <link rel='stylesheet' href='acad.css' />
  <link rel='stylesheet' href='login.css' />
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
  <title>Sistema Acadêmico</title>
  
  <script type='text/javascript'>
  
  function verificaAcesso() {
    var negado = ".$negado.";
    if (negado == 1) {  
      document.getElementById('info_login').innerHTML = \"Acesso negado.<br>Usuário e/ou senha incorreto(s).\";
      document.getElementById('info_login').style.color = 'red';
    }
  }
  
  function estudante() {
    document.getElementById('txt_usuario').innerHTML = \"Matrícula\";
    document.getElementById('campo_usuario').value = \"\";

    document.getElementById('botoes').innerHTML = \"<input type='submit' value='Entrar' id='entrar' class='button' /><a href='recuperacao_senha.php' class='button'>Esqueci minha senha</a>\";
  }

  function administrador() {
    document.getElementById('txt_usuario').innerHTML = \"Usuário\";
    document.getElementById('campo_usuario').value = \"\";

    document.getElementById('botoes').innerHTML = \"<input type='submit' value='Entrar'id='entrar' class='button'/>\";
    document.getElementById('entrar').style.margin = 'auto';
    document.getElementById('entrar').style.display = 'block';
  }

  </script>

  </head>
 
  <body onload='verificaAcesso()'>
    
    <div id='header'>   <!-- Cabeçalho -->        
         <a id='homelink' href='login.php'><span id='title'>Sistema Acadêmico</span></a>
    </div>              <!--Fim do Cabeçalho -->
    
    <div id='container'> <!-- O conteudo da página -->
        <div id='content'>
        <div id='blank'></div> 
        <h1>Login</h1>
        
        <form action='login_verifica.php' method='post' enctype='multipart/form-data'>
          <div class='login'>
              <div>
          <span class='info' id='info_login'> </span>
        </div>
              <div>
                <span>Entrar como: </span> 
                <select id='tipo_usuario' name='tipo_usuario'>
                  <option value='est' onclick='estudante();'>Estudante</option>
                  <option value='adm' onclick='administrador();'>Administrador</option>
                </select>
              </div>
              
              <div>
                <span id='txt_usuario' class='texto_campo'>Matrícula</span>
                <br>
                <input type='text' class='campo' id='campo_usuario' name='usuario' autofocus required />
              </div>
              
              <div>
                <span id='txt_senha' class='texto_campo'>Senha</span>
                <br>
                <input type='password' class='campo' id='campo_senha' name='senha' required />
              </div>
              
          <div class='botoes' id='botoes'>
            <input type='submit' value='Entrar' id='entrar' class='button' />
            <a href='recuperacao_senha.php' class='button'>Esqueci minha senha</a>
          </div>
        
        </div>
        </form>
        </div>
        <div class='footer'>  
           <div id='center'>
                <span>© 2015 On Est Or Softwares</span>
           </div>        
        </div>
    </div>  <!-- Fim do conteudo da página -->
     
    
  </body>
  </html>";
  
?>