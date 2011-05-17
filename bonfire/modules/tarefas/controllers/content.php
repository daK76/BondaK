<?php if(!defined('BASEPATH'))	exit('No direct script access allowed');

class Content extends Admin_Controller {

	public function __construct() {
		parent::__construct();

		Template::set('toolbar_title', 'Lista de Tarefas');

		$this -> load -> model('Tarefas_model', 'tarefas_model', true);
	}
	
	public function index()
	  {
	      if ($this->input->post('submit') == 'Nova Tarefa')
	      {
	          if ($this->criar_tarefa($_POST))
	          {
	              Template::set_message('Nova Tarefa guardada com sucesso.', 'success');
	          }
	          else
	          {
	              Template::set_message('Ocorreu um erro ao criar a tarefa.', 'error');
	          }
	      }
		  
		  Template::set('items', $this->tarefas_model->order_by('tarefa_id','desc')->find_all_by('completa',0));
		  
			if ($this->input->post('submit') == 'Nova Tarefa')
			{
				Template::set('items_c',$this->tarefas_model->find_all_by('completa',1));
			}
	
	      Template::render();
	  }
	
	  //--------------------------------------------------------------------
	
	  private function criar_tarefa($vars)
	  {
	      $this->form_validation->set_rules('titulo', 'TITULO', 'required|trim|strip_tags|max_length[55]|xss_clean');
	      $this->form_validation->set_rules('descritivo', 'DESCRITIVO DA TAREFA', 'required|trim|strip_tags|max_length[255]|xss_clean');
	
	      if ($this->form_validation->run() !== false)
	      {
	          $data = array(
	              'titulo'   => $vars['titulo'],
	              'descritivo'   => $vars['descritivo']
	          );
	
	          return $this->tarefas_model->insert($data);
	      }
	
	      return false;
	  }

		public function completar()
		{
		  $id = $this->uri->segment(5);
		  
		  $this->tarefas_model->update($id, array('completa' => '1'));
		  echo 'true';
		  die();
		}

  //--------------------------------------------------------------------

}
