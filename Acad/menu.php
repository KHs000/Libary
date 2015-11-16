<?php

$username = "user";  
$username = strtoupper($username); 

header ('Content-Type: text/html; charset=utf-8'); 
echo '<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="content-type" content="text/html" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="author" content="lolkittens" /> 
    <link rel="stylesheet" href="../visual2.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet" type="text/css">
    <link <link rel="shortcut icon" href="favicon.png" type="image/x-icon" /> 
  <title>On Est Or Project</title>
   
</head>
 
<body> 
    
    <div id="header">   <!-- Cabeçalho -->          
        <a href="login.php"><img alt="Sistema Acadêmico" src="http://i.imgur.com/lp5bycZ.png"/><span id="title">SISTEMA ACADÊMICO</span></a>    
        </div> 
    </div>              <!--Fim do Cabeçalho -->
    
    <div id="container"> <!-- O onteudo da página --> 
        <div id=content>  
        <div id="blank"></div>    
            
        <h1 id="salute">BEM-VINDO, <div style="display:inline;color:navy">'.$username.'</div></h1> 
        <h1 id="opt">Selecione um dos serviços abaixo</h1> 
        
        <div class="menu-trabalhos"> 
            <ul> 
                <li class="opcao-menu-trabalhos"> 
                    <a  href="#" title="AGENDA">AGENDA</a> 
                </li> 
                <li class="opcao-menu-trabalhos">
                        <a  href="Columba/Columba.php" title="BIBLIOTECA">BIBLIOTECA</a>
                </li> 
                <li class="opcao-menu-trabalhos">
                    <a  href="#"  title="RESTAURANTE">RESTAURANTE</a> 
                </li>
                <li class="opcao-menu-trabalhos">
                    <a  href="alterar_dados.php"  title="ALTERAR DADOS">ALTERAR DADOS</a> 
                </li>                
            </ul> 
        </div> 
        
        
        </div>                  
        
        <div class="footer">  
           <div id="left"> 
  <a target="_blank" href="../about.htm">Sobre</a>
           </div>
           <div id="center">   
                <span>© 2015 On Est Or Softwares</span>
           </div>        
        </div>
    </div>  <!-- Fim do conteudo da página -->
     
    
</body>
</html> ';  

?>