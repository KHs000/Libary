<?php
$h_dir = $_SERVER['DOCUMENT_ROOT']."inc/";
include_once( $h_dir.'database.inc.php' );

//
// TDatabase_Academico_Admin
//
class TDatabase_Academico_Admin extends TDatabase {
  //
  // campos de dados
  //
  var $adm_id;
  var $usuario;
  var $senha;

  //
  // construtor
  //
  public function __construct() {
    // inicialização da classe parente
    parent::__construct();
    // inicialização dos campos de dados
    $this->tabela = "admin_acad";
    $this->clear();
  }

  //
  // métodos públicos
  //

  //
  // clear
  // Limpa os dados e inicializa as variáveis internas;
  //
  public function clear() {
    // inicializa as variáveis internas
    parent::clear();
    // inicialização dos campos de dados
    $this->adm_id = 0;
    $this->usuario = "";
    $this->senha = "";
  }

  //
  // adicionaCampos
  // Adiciona os campos e valores que serão utilizados nas instruções.
  //
  protected function adicionaCampos() {
    // usuário
    if ($this->usuario != "") {
      $this->addField("usuario");
      $this->addValue("'".$this->usuario ."'");
    }
    // senha
    if ($this->senha != "") {
      $this->addField("senha");
      $this->addValue("'".$this->senha ."'");
    }
  }

  //
  // insert()
  // Insere registros na tabela.
  //
  public function insert() {

  static $result;

    $this->adicionaCampos();

    $result = parent::insert();
    if ($result) $this->clear();

    return $result;

  }

  //
  // update()
  // Atualiza o registro na tabela.
  //  
  public function update() {
    static $str, $i;
    static $sql, $result, $msg;

    $this->adicionaCampos();

    $str = "";
    for ($i = 0; $i < count($this->arr_fld); $i++) {
      if ($str != "") $str .= ",";
      $str .= $this->arr_fld[ $i ] ."=". $this->arr_val[ $i ];
    }
    $sql = "UPDATE ".$this->tabela ." SET ".$str." WHERE adm_id = ".$this->adm_id;

    $result = $this->query( $sql );
    if ($result) $this->clear();

    return $result;

  }
  
  //
  // delete()
  // Exclui o registro na tabela.
  //
  public function delete() {
    static $sql, $result, $msg;
    
    $this->adicionaCampos();

    $sql = "DELETE FROM ".$this->tabela ." WHERE adm_id = ".$this->adm_id;

    $result = $this->query( $sql );
    if ($result) $this->clear();

    return $result;

  }

  //
  // fim da classe
  //
}

//
// TDatabase_Academico_Aluno
//
class TDatabase_Academico_Aluno extends TDatabase {
  //
  // variáveis
  //
  // campos de dados
  //var $alu_id;
  var $alu_matricula;
  var $alu_senha;
  var $alu_nome;
  var $alu_curso;
  var $alu_turma;
  var $alu_foto;
  var $alu_email;

  //
  // construtor
  //
  public function __construct() {
    // inicialização da classe parente
    parent::__construct();
    // inicialização dos campos de dados
    $this->tabela = "aluno";
    $this->clear();
  }

  //
  // clear
  // Limpa os dados e inicializa as variáveis internas;
  //
  public function clear() {
    // inicializa as variáveis internas
    parent::clear();
    // inicialização dos campos de dados
    //$this->alu_id = 0;
    $this->alu_matricula = "";
    $this->alu_senha = "";
    $this->alu_nome = "";
    $this->alu_curso = "";
    $this->alu_turma = "";
    $this->alu_foto = "";
    $this->alu_email = "";
  }

  //
  // adicionaCampos
  // Adiciona os campos e valores que serão utilizados nas instruções.
  //
  protected function adicionaCampos() {
    // matricula
    if ($this->alu_matricula != "") {
      $this->addField("alu_matricula");
      $this->addValue("'".$this->alu_matricula ."'");
    }
    // senha
    if ($this->alu_senha != "") {
      $this->addField("alu_senha");
      $this->addValue("'".$this->alu_senha ."'");
    }
    // nome
    if ($this->alu_nome != "") {
      $this->addField("alu_nome");
      $this->addValue("'".$this->alu_nome ."'");
    }
    // curso
    if ($this->alu_curso != "") {
      $this->addField("alu_curso");
      $this->addValue("'".$this->alu_curso ."'");
    }
    // turma
    if ($this->alu_turma != "") {
      $this->addField("alu_turma");
      $this->addValue("'".$this->alu_turma ."'");
    }
    // foto
    if ($this->alu_foto != "") {
      $this->addField("alu_foto");
      $this->addValue("'".$this->alu_foto ."'");
    }
    // e-mail
    if ($this->alu_email != "") {
      $this->addField("alu_email");
      $this->addValue("'".$this->alu_email ."'");
    }
  }

  //
  // insert()
  // Insere registros na tabela.
  //
  public function insert() {
    static $result;

    $this->adicionaCampos();

    $result = parent::insert();
    if ($result) $this->clear();

    return $result;

  }

  //
  // update()
  // Atualiza o registro na tabela.
  //  
  public function update() {
    static $str, $i;
    static $sql, $result, $msg;

    $this->adicionaCampos();

    $str = "";
    for ($i = 0; $i < count($this->arr_fld); $i++) {
      if ($str != "") $str .= ",";
      $str .= $this->arr_fld[ $i ] ."=". $this->arr_val[ $i ];
    }
    $sql = "UPDATE ".$this->tabela ." SET ".$str." WHERE alu_matricula = '".$this->alu_matricula ."'";

    $result = $this->query( $sql );
    if ($result) $this->clear();

    return $result;

  }
  
  //
  // delete()
  // Exclui o registro na tabela.
  //
  public function delete() {
    static $sql, $result, $msg;
    
    $this->adicionaCampos();

    $sql = "DELETE FROM ".$this->tabela ." WHERE alu_matricula = '".$this->alu_matricula ."'";

    $result = $this->query( $sql );
    if ($result) $this->clear();

    return $result;

  }

  //
  // fim da classe
  //
}

//
// fim de arquivo
//

?>