<?php

header( "Content-Type: text/html; charset=UTF-8" );

//define("CSERVIDOR", "mysql01.onestorsoftwares.hospedagemdesites.ws" );
//define("CUSUARIO" , "onestorsoftwares" );
//define("CDATABASE", "onestorsoftwares" );
//define("CPASSWORD", "Ad4mAnt1" );

define("CSERVIDOR", "localhost");
define("CUSUARIO" , "root");
define("CDATABASE", "acad");
define("CPASSWORD", "");

//
// Classe ...
//
class TDatabase {
  //
  // variáveis
  //
  protected $conexao;          // Número da conexão
  protected $last_id;          // Id (auto incrementativo) do último registro inserido
  protected $affected_rows;    // Quantidade de linhas afetadas pelo último comando: INSERT, UPDATE ou DELETE
  protected $bd_nome;          // Nome do banco de dados selecionado
  protected $serv;             // Servidor
  protected $user;         // Usuário
  protected $pswd;           // Senha
//  protected $sql;           // Query
  protected $tabela;
  protected $arr_fld;
  protected $arr_val;

  // Construtor
  // Chamado quando se instancia um objeto da classe
  // Realiza a conexão ao banco de dados
  // Recebe como parâmetros o servidor, o usuário, a senha e o nome do banco de dados
  public function __construct() {
    // mensagem de erro
    static $msg;
    
    $this->serv = CSERVIDOR;
    $this->user = CUSUARIO;
    $this->bd_nome = CDATABASE;
    $this->pswd = CPASSWORD;
    $this->conexao = @mysql_connect( $this->serv, $this->user, $this->pswd );
    
    $this->last_id = 0;
    $this->affected_rows = 0;
    // executado caso a conexão não seja bem sucedida
    if( !$this->conexao ) {

      $msg  = "Falha na conexão ao banco de dados. \n<br>";
      $msg .= "SERVER: ".$this->serv ."\n<br>";
      $msg .= "USER: ".$this->user ."\n<br>";
      $msg .= "Mensagem de erro: ".@mysql_error()."\n<br>";

      // chama o método erro() desta classe 
      // imprimirá uma mensagem de erro
      $this->erro( $msg ); 

    }

    $this->clear();

    // chama o método selectdb() da classe
    $this->selectdb();

  }

  // Seleciona o banco de dados
  // Chamado pelo construtor
  public function selectdb() {
    
    // $selecao -> retorno da função mysql_select_db()
    // $msg -> mensagem de erro
    static $selecao, $msg;

    $selecao = @mysql_select_db( $this->bd_nome );
    
    // executado caso a seleção do banco de dados falhe
    if( !$selecao ) {

      $msg = "Falha ao selecionar banco de dados. \n<br>";
      $msg.= "DATABASE: ".$this->bd_nome."\n<br>";
      $msg.= "Mensagem de erro: ".@mysql_error()."\n<br>";
      // chama o método erro() desta classe 
      // imprimirá uma mensagem de erro
      $this->erro( $msg );

    }

  }

  //
  //
  //
  protected function clear() {
    $this->arr_fld = array();
    $this->arr_val = array();
  }

  //
  //
  //
  protected function addField($AValue) {
//    if ($this->str_fld != "") $this->str_fld .= ",";
//    $this->str_fld .= $AValue;
    array_push($this->arr_fld, $AValue);
  }

  //
  //
  //
  protected function addValue($AValue) {
//    if ($this->str_val != "") $this->str_val .= ",";
//    $this->str_val .= $AValue;
    array_push($this->arr_val, $AValue);
  }

  //
  // insert()
  // Insere registros na tabela.
  //
  protected function insert() {
    static $fld, $val, $itn;
    static $sql, $result, $msg;

//    $this->montaInstrucao();

    $fld = "";
    foreach ($this->arr_fld as $itn) {
      if ($fld != "") $fld .= ", ";
      $fld .= $itn;
    }
    $val = "";
    foreach ($this->arr_val as $itn) {
      if ($val != "") $val .= ", ";
      $val .= $itn;
    }

    $sql = "INSERT INTO ".$this->tabela." (".$fld.") VALUES (".$val.")";

    $result = $this->query( $sql );
//    if ($result) $this->clear();

    return $result;

  }

  //
  // Propriedades
  //

  // Retorna número da conexão
  public function conexao() {

    return $this->conexao;

  }
  
  // Retorna nome do banco de dados ativo
  public function bd_nome() {

    return $this->bd_nome;

  }

  // Retorna id da última operação INSERT realizada
  public function last_id() {

    return $this->last_id;

  }

  // Retorna quantidade de registros afetados por comandos INSERT, UPDATE ou DELETE
  public function affected_rows() {

    return $this->affected_rows;

  }

  //
  // Propriedades
  //
  
  
  //
  // Querys
  // Recebe uma query completa e executa
  //
  public function query( $cmd ) {
    // $result -> retorno de mysql_query()
    // $cmd_type -> tipo do comando
    // $msg -> mensagem de erro
    static $result, $cmd_type, $msg;
    static $sql;

//    $this->sql = trim( $cmd );
    $sql = trim( $cmd );

    // $cmd_type recebe uma substring de 6 caracteres
    // comando
//    $cmd_type = substr( $this->sql, 0, 6 );
    $cmd_type = substr( $sql, 0, 6 );

    // converte o comando para uppercase
    $cmd_type = strtoupper( $cmd_type );
//    $result = @mysql_query( $this->sql );
    $result = @mysql_query( $sql );

    if ( !$result ) {
      
      $msg = "Falha ao realizar consulta. \n<br>";
      $msg.= "DATABASE: ".$this->bd_nome."\n<br>";
//      $msg.= "Query: ".$this->sql."\n<br>";
      $msg.= "Query: ".$sql."\n<br>";
      $msg = "Mensagem de erro: ".@mysql_error()."\n<br>";
      // chama o método erro() desta classe 
      // imprimirá uma mensagem de erro
      $this->erro( $msg );

    // executado caso o comando seja INSERT
    } else if( $cmd_type == "INSERT" ) {

      // atribui valor retornado à propriedade da classe: $last_id
      // função retorna id gerado pela operação INSERT anterior
      $this->last_id = @mysql_insert_id();

      // atribui valor retornado à propriedade da classe: $affected_rows
      // função retorna número de linhas afetadas pelos comandos INSERT, UPDATE ou DELETE 
      $this->affected_rows = @mysql_affected_rows();

    } else if( ($cmd_type == "UPDATE") or ($cmd_type == "DELETE") ) {

      // atribui valor retornado à propriedade da classe: $affected_rows
      // função retorna número de linhas afetadas pelos comandos INSERT, UPDATE ou DELETE 
      $this->affected_rows = @mysql_affected_rows();

    }

    return $result;

  }

  //
  //
  //
  public function fetch( $result, $modo = MYSQL_ASSOC ) {

    return @mysql_fetch_array( $result, $modo );

  }

  //
  //
  //
  public function free( $result ) {

    @mysql_free_result( $result );

  }

  // Retorna quantidade de campos dos registros 
  // $result -> retorno de comando SELECT
  public function campos( $result ) {

    return @mysql_num_fields( $result );

  }

  // Retorna quantidade de registros 
  // $result -> retorno de comando SELECT
  public function registros( $result ) {

    return @mysql_num_rows( $result );

  }

  //
  // Imprime mensagem de erro,  recebida como parâmetro
  //
  public function erro( $msg ) {

    $msg = trim($msg);
    echo $msg;

  }

  //
  // Encerra conexão atual
  //
  public function close() {

    @mysql_close( $this->conexao );

  }

  //
  // fim classe
  //

}

//
// fim de arquivo
//

?>