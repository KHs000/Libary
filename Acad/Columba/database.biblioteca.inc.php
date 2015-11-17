<?php
$h_dir = $_SERVER["DOCUMENT_ROOT"]."inc/";
include_once( $h_dir.'database.inc.php' );

//
// TDatabase_Acervo
//
class TDatabase_Acervo extends TDatabase {
  //
  // campos de dados
  //
  var $liv_id;
  var $classe;
  var $autor;
  var $titulo;
  var $assunto;
  var $editora;
  var $ano_publicacao;
  
  //
  // construtor
  //
  public function __construct() {
    // inicialização da classe parente
    parent::__construct();
    // inicialização dos campos de dados
    $this->tabela = "acervo";
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
    $this->liv_id = 0;
    $this->classe = "";
    $this->autor = "";
    $this->titulo = "";
    $this->assunto = "";
    $this->editora = "";
    $this->ano_publicacao = "";
  }
  
  //
  // adicionaCampos
  // Adiciona os campos e valores que serão utilizados nas instruções.
  //
  protected function adicionaCampos() {
    // liv_id
    if ($this->liv_id > 0) {
      $this->addKeyField("liv_id", $this->liv_id);
    }
  // classe
    if ($this->classe != "") {
      $this->addField("classe", "'".$this->classe ."'");
    }
    // autor
    if ($this->autor != "") {
      $this->addField("autor", "'".$this->autor ."'");
    }
    // titulo
    if ($this->titulo != "") {
      $this->addField("titulo", "'".$this->titulo ."'");
    }
    // assunto
    if ($this->assunto != "") {
      $this->addField("assunto", "'".$this->assunto ."'");
    }
    // editora
    if ($this->editora != "") {
      $this->addField("editora", "'".$this->editora ."'");
    }
    // ano_publicacao
    if ($this->ano_publicacao != "") {
      $this->addField("ano_publicacao", "'".$this->ano_publicacao ."'");
    }
  }
  
  //
  // insert()
  // Insere registros na tabela.
  //
  public function insert() {

    // inserção
    $this->adicionaCampos();
    parent::insert();
    if ($this->result) $this->clear();

    // retorno
    return $this->result;

  }


  //
  // update()
  // Atualiza o registro na tabela.
  //  
  public function update() {

    // alteração
    $this->adicionaCampos();
    parent::update();
    if ($this->result) $this->clear();

    // retorno
    return $this->result;

  }
  
  //
  // delete()
  // Exclui o registro na tabela.
  //
  public function delete() {

    // exclusão
    $this->adicionaCampos();
    parent::delete();
    if ($this->result) $this->clear();

    // retorno
    return $this->result;

  }
  
  //
  // fim da classe
  //
}

//
// TDatabase_Aluno_Biblioteca
//
class TDatabase_Aluno_Biblioteca extends TDatabase {
  //
  // campos de dados
  //
  //var $alu_id;
  var $alu_matricula;
  var $multas;
  var $livros;
  var $historico;
  
  //
  // construtor
  //
  public function __construct() {
    // inicialização da classe parente
    parent::__construct();
    // inicialização dos campos de dados
    $this->tabela = "aluno_biblioteca";
    $this->autoIncKey = False;
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
    $this->multas = "";
    $this->livros = "";
    $this->historico = "";
  }
  
  //
  // adicionaCampos
  // Adiciona os campos e valores que serão utilizados nas instruções.
  //
  protected function adicionaCampos() {
    // alu_matricula
    if ($this->alu_matricula != "") {
      $this->addKeyField("alu_matricula", "'".$this->alu_matricula ."'");
    }
    // multas
    if ($this->multas != "") {
      $this->addField("multas", "'".$this->multas ."'");
    }
    // livros
    if ($this->livros != "") {
      $this->addField("livros", "'".$this->livros ."'");
    }
    // historico
    if ($this->historico != "") {
      $this->addField("historico", "'".$this->historico ."'");
    }
  }
  
  //
  // insert()
  // Insere registros na tabela.
  //
  public function insert() {

    // inserção
    $this->adicionaCampos();
    parent::insert();
    if ($this->result) $this->clear();

    // retorno
    return $this->result;

  }


  //
  // update()
  // Atualiza o registro na tabela.
  //  
  public function update() {

    // alteração
    $this->adicionaCampos();
    parent::update();
    if ($this->result) $this->clear();

    // retorno
    return $this->result;

  }
  
  //
  // delete()
  // Exclui o registro na tabela.
  //
  public function delete() {

    // exclusão
    $this->adicionaCampos();
    parent::delete();
    if ($this->result) $this->clear();

    // retorno
    return $this->result;

  }
  
  //
  // fim da classe
  //
}

//
// TDatabase_Constantes_Biblioteca
//
class TDatabase_Constantes_Biblioteca extends TDatabase {
  //
  // campos de dados
  //
  var $const_id;
  var $limite_livros;
  var $multa;
  
  //
  // construtor
  //
  public function __construct() {
    // inicialização da classe parente
    parent::__construct();
    // inicialização dos campos de dados
    $this->tabela = "constantes_biblioteca";
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
    $this->const_id = 0;
    $this->limite_livros = 0;
    $this->multa = 0.0;
  }
  
  //
  // adicionaCampos
  // Adiciona os campos e valores que serão utilizados nas instruções.
  //
  protected function adicionaCampos() {
    // const_id
    if ($this->const_id > 0) {
      $this->addKeyField("const_id", $this->const_id);
    }
    // limite_livros
    if ($this->limite_livros > 0) {
      $this->addField("limite_livros", "'".$this->limite_livros ."'");
    }
    // multa
    if ($this->multa > 0.0) {
      $this->addField("multa", "'".$this->multa ."'");
    }
  }
  
  //
  // insert()
  // Insere registros na tabela.
  //
  public function insert() {

    // inserção
    $this->adicionaCampos();
    parent::insert();
    if ($this->result) $this->clear();

    // retorno
    return $this->result;

  }


  //
  // update()
  // Atualiza o registro na tabela.
  //  
  public function update() {

    // alteração
    $this->adicionaCampos();
    parent::update();
    if ($this->result) $this->clear();

    // retorno
    return $this->result;

  }
  
  //
  // delete()
  // Exclui o registro na tabela.
  //
  public function delete() {

    // exclusão
    $this->adicionaCampos();
    parent::delete();
    if ($this->result) $this->clear();

    // retorno
    return $this->result;

  }
  
  //
  // fim da classe
  //
}


//
// TDatabase_Emprestimo
//
class TDatabase_Emprestimo extends TDatabase {
  //
  // campos de dados
  //
  var $emp_id;
  var $alu_matricula;
  var $liv_id;
  var $data_saida;
  var $data_entrega;
  
  //
  // construtor
  //
  public function __construct() {
    // inicialização da classe parente
    parent::__construct();
    // inicialização dos campos de dados
    $this->tabela = "emprestimo";
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
    $this->emp_id = 0;
    $this->alu_matricula = "";
    $this->liv_id = 0;
    $this->data_saida = "";
    $this->data_entrega = "";
  }
  
  //
  // adicionaCampos
  // Adiciona os campos e valores que serão utilizados nas instruções.
  //
  protected function adicionaCampos() {
    // emp_id
    if ($this->emp_id > 0) {
      $this->addKeyField("emp_id", $this->emp_id);
    }
    // alu_matricula
    if ($this->alu_matricula != "") {
      $this->addField("alu_matricula", "'".$this->alu_matricula ."'");
    }
    // liv_id
    if ($this->liv_id > 0) {
      $this->addField("liv_id", $this->liv_id);
    }
    // data_saida
    if ($this->data_saida != "") {
      $this->addField("data_saida", "'".$this->data_saida ."'");
    }
    // data_entrega
    if ($this->data_entrega != "") {
      $this->addField("data_entrega", "'".$this->data_entrega ."'");
    }
  }
  
  //
  // insert()
  // Insere registros na tabela.
  //
  public function insert() {

    // inserção
    $this->adicionaCampos();
    parent::insert();
    if ($this->result) $this->clear();

    // retorno
    return $this->result;

  }


  //
  // update()
  // Atualiza o registro na tabela.
  //  
  public function update() {

    // alteração
    $this->adicionaCampos();
    parent::update();
    if ($this->result) $this->clear();

    // retorno
    return $this->result;

  }
  
  //
  // delete()
  // Exclui o registro na tabela.
  //
  public function delete() {

    // exclusão
    $this->adicionaCampos();
    parent::delete();
    if ($this->result) $this->clear();

    // retorno
    return $this->result;

  }
  
  //
  // fim da classe
  //
}

//
// TDatabase_Local_Acervo
//
class TDatabase_Local_Acervo extends TDatabase {
  //
  // campos de dados
  //
  var $liv_id;
  var $estante;
  var $prateleira;
  var $campus;
  
  //
  // construtor
  //
  public function __construct() {
    // inicialização da classe parente
    parent::__construct();
    // inicialização dos campos de dados
    $this->tabela = "local_acervo";
    $this->autoIncKey = False;
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
    $this->liv_id = 0;
    $this->estante = "";
    $this->prateleira = "";
    $this->campus = "";
  }
  
  //
  // adicionaCampos
  // Adiciona os campos e valores que serão utilizados nas instruções.
  //
  protected function adicionaCampos() {
        // liv_id
    if ($this->liv_id != 0) {
      $this->addKeyField("liv_id", "'".$this->liv_id ."'");
    }
    // estante
    if ($this->estante != "") {
      $this->addField("estante", "'".$this->estante ."'");
    }
    // prateleira
    if ($this->prateleira != "") {
      $this->addField("prateleira", "'".$this->prateleira ."'");
    }
    // campus
    if ($this->campus != "") {
      $this->addField("campus", "'".$this->campus ."'");
    }
  }
  
  //
  // insert()
  // Insere registros na tabela.
  //
  public function insert() {

    // inserção
    $this->adicionaCampos();
    parent::insert();
    if ($this->result) $this->clear();

    // retorno
    return $this->result;

  }


  //
  // update()
  // Atualiza o registro na tabela.
  //  
  public function update() {

    // alteração
    $this->adicionaCampos();
    parent::update();
    if ($this->result) $this->clear();

    // retorno
    return $this->result;

  }
  
  //
  // delete()
  // Exclui o registro na tabela.
  //
  public function delete() {

    // exclusão
    $this->adicionaCampos();
    parent::delete();
    if ($this->result) $this->clear();

    // retorno
    return $this->result;

  }
  
  //
  // fim da classe
  //
}

//
// TDatabase_Ocorrencia
//
class TDatabase_Ocorrencia extends TDatabase {
  //
  // campos de dados
  //
  var $ocr_id;
  var $ocr_data;
  var $emp_id;
  var $ocorrencia;
  var $alu_matricula;
  
  //
  // construtor
  //
  public function __construct() {
    // inicialização da classe parente
    parent::__construct();
    // inicialização dos campos de dados
    $this->tabela = "ocorrencias";
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
    $this->ocr_id = 0;
    $this->ocr_data = "";
    $this->emp_id = 0;
    $this->ocorrencia = "";
    $this->alu_matricula = "";
  }
  
  //
  // adicionaCampos
  // Adiciona os campos e valores que serão utilizados nas instruções.
  //
  protected function adicionaCampos() {
    // ocr_id
    if ($this->ocr_id > 0) {
      $this->addKeyField("ocr_id", $this->ocr_id);
    }
    // ocr_data
    if ($this->ocr_data != "") {
      $this->addField("ocr_data", "'".$this->ocr_data ."'");
    }
    // emp_id
    if ($this->emp_id > 0) {
      $this->addField("emp_id", $this->emp_id);
    }
    // ocorrencia
    if ($this->ocorrencia != "") {
      $this->addField("ocorrencia", "'".$this->ocorrencia ."'");
    }
    // alu_matricula
    if ($this->alu_matricula != "") {
      $this->addField("alu_matricula", "'".$this->alu_matricula ."'");
    }
  }
  
  //
  // insert()
  // Insere registros na tabela.
  //
  public function insert() {

    // inserção
    $this->adicionaCampos();
    parent::insert();
    if ($this->result) $this->clear();

    // retorno
    return $this->result;

  }


  //
  // update()
  // Atualiza o registro na tabela.
  //  
  public function update() {

    // alteração
    $this->adicionaCampos();
    parent::update();
    if ($this->result) $this->clear();

    // retorno
    return $this->result;

  }
  
  //
  // delete()
  // Exclui o registro na tabela.
  //
  public function delete() {

    // exclusão
    $this->adicionaCampos();
    parent::delete();
    if ($this->result) $this->clear();

    // retorno
    return $this->result;

  }
  
  //
  // fim da classe
  //
}

//
// fim do arquivo
//

?>