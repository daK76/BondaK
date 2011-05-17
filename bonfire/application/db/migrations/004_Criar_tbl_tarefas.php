<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Criar_tbl_tarefas extends Migration {


	public function up()
  {
      $this->dbforge->add_field('tarefa_id INT(10) NOT NULL AUTO_INCREMENT');
      $this->dbforge->add_field('titulo VARCHAR(55) NOT NULL');
      $this->dbforge->add_field('descritivo VARCHAR(255) NOT NULL');
      $this->dbforge->add_field('completa TINYINT(1) DEFAULT 0 NOT NULL');
      $this->dbforge->add_key('tarefa_id', true);
      $this->dbforge->create_table('tarefas');
  }

  //--------------------------------------------------------------------

  public function down()
  {
      $this->dbforge->drop_table('tarefas');
  }
	//--------------------------------------------------------------------
	
}