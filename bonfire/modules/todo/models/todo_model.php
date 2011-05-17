<?php if(!defined('BASEPATH'))	exit('No direct script access allowed');


class Todo_model extends MY_Model {

  protected $table        = 'todos';
  protected $key          = 'todo_id';
  protected $soft_deletes = true;
  protected $date_format  = 'datetime';
  protected $set_created  = false;
  protected $set_modified = false;
	
	}