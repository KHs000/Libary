<?php
  
  session_start();
  
  // Verifica se a varíavel $_SESSION não está vazia
  if ( !empty($_SESSION) ) {
    
    // verifica se o usuário é um estudante
    if ($_SESSION["tipo_usuario"] == "est") {
      header('Location: menu.php');
    // verifica se o usuário é um estudante
    } else if ($_SESSION["tipo_usuario"] == "adm") {
      //header('Location: menu.php');
    }
  }

  // dados recebidos pela URL
  $negado = 0;
  if ( isset($_GET["negado"]) ) {
    $negado = $_GET["negado"];
  }
  //
  // Imprime página
  //
  echo "<!DOCTYPE HTML>
  <html>
  <head>
  
  <meta http-equiv='content-type' content='text/html' />
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <link rel='stylesheet' href='../visual2.css'/>
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

    document.getElementById('botoes').innerHTML = \"<input type='submit' value='Entrar' id='entrar' class='button' /><br><center><a href='recuperacao_senha.php' id='recup_senha' class='redir'>Esqueci minha senha</a></center>\";
    document.getElementById('recup_senha').style.zIndex = 1000;
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
        <a href='login.php'><img alt='Sistema Acadêmico' src='http://i.imgur.com/lp5bycZ.png'/><span id='title'>SISTEMA ACADÊMICO</span></a>
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
            <div id='divredir' class='divredir'>
              <a href='recuperacao_senha.php' id='recup_senha' class='redir'>Esqueci minha senha</a>
            </div>
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