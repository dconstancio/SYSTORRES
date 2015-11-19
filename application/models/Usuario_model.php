<?php
class usuario_model extends CI_Model {
	private $salt = 'r4nd0m';
	public $USER_LEVEL_ADMIN = 1;
	public $USER_LEVEL_PM = 2;
	public $USER_LEVEL_DEV = 3;



	public function get($id = false)
	{
		if ($id) $this->db->where('codigo', $id);
		$this->db->order_by('email', 'asc');
		$get = $this->db->get('usuario');
		if($id) return $get->row_array();
		if($get->num_rows > 0) return $get->result_array();
		return array();
	}

	public function create($data)
	{
		$data['senha'] = sha1($data['senha'].$this->salt);
		return $this->db->insert('usuario', $data);
	}

	public function validate($email, $senha)
{

    $this->db->where('email', $email)->where('senha', sha1($senha.$this->salt));
    $get = $this->db->get('usuario');
 
//echo "<pre>"; print_r($get->result_id->num_rows);die;


    if($get->result_id->num_rows > 0) return $get->row_array();
    return array();
}

}

