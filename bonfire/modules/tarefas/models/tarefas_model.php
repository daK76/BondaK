<?php if(!defined('BASEPATH'))	exit('No direct script access allowed');


class Tarefas_model extends MY_Model {

	// Manda o model usar a tbl tarefas
	protected $table = 'tarefas';
	// Indica o id da tabela
	protected $key = 'tarefa_id';
	// Se os deletes sao aparentes
	protected $soft_deletes = true;
	protected $date_format = 'datetime';
	// datas de criacao/edicao magicas
	protected $set_created = false;
	protected $set_modified = false;
	
	/**
	* Assinala a tarefa como concluida
	* @author [Nuno Costa]
	* @param int tarefa_id
	* @return bool
	*/
	public function completar ($id) {
		return ;
	}
		
	}