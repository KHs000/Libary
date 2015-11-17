<?php

  session_start();
  
  // remove todas as variáveis em $_SESSION
  session_unset();
  // destrói sessão
  session_destroy();
  
  // carrega página de logout
  echo "<!DOCTYPE HTML>
  <html>
  <head>
  
  <meta http-equiv='content-type' content='text/html' />
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <link rel='stylesheet' href='../visual2.css'/>
  <link rel='stylesheet' href='acad.css' />
  <link rel='stylesheet' href='logout.css' />
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
  <title>Sistema Acadêmico</title>
  
  </head>
 
  <body>
    
    <div id='header'>   <!-- Cabeçalho -->        
         <a href='login.php'><img alt='Sistema Acadêmico' src='http://i.imgur.com/lp5bycZ.png'/><span id='title'>SISTEMA ACADÊMICO</span></a>
    </div>              <!--Fim do Cabeçalho -->
    
    <div id='container'> <!-- O conteudo da página -->
        <div id='content'>
        <div id='blank'></div>         
        
        <div class='logout'>
			<h2>Logout efetuado com sucesso!</h2>
			<p><a href='login.php' class='redir'>Clique aqui</a> para retornar à página inicial.</p>
        </div>

        </div>
        <div class='footer'>  
           <!--
           <div id='left'>
                <a href='about.htm'>Sobre</a>
           </div> 
           -->
           <div id='center'>
                <span>© 2015 On Est Or Softwares</span>
           </div>        
        </div>
    </div>  <!-- Fim do conteudo da página -->
     
    
  </body>
  </html>";
  
?>