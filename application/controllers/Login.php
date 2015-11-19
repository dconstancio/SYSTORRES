<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index()
	{
        // Load View
		$data['page_title']  = "Login";
		
		$data['email'] = '';
		$data['senha'] = '';
		
		$this->template->show('login', $data);
	}

	public function validate()
	{
		$this->load->model('usuario_model');
		$result = $this->usuario_model->validate($this->input->post('email'),$this->input->post('senha'));
		
		
		if($result) {
			$this->session->set_userdata(array(
				'logged' => true,
				'user'  => $result['codigo'],
				'level' => $result['cd_perfil']
				));
			
			redirect('dashboard');
		} else {
        // Load View
			$data['page_title']  = "Login";
			
			$data['email'] = $this->input->post('email');
			$data['senha'] = $this->input->post('senha');
			
			$data['error'] = true;
			
			$this->template->show('login', $data);
		}
	}
	

	public function logout()
	{
		$this->session->unset_userdata('logged');
		
		redirect('login');
	}
}