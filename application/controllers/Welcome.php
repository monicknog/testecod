<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->Model('Model', '', TRUE);
        $dados['users'] = $this->Model->lista();
            
		$this->load->view('home', $dados);
	}

	public function ajax()
	{
		
		$this->load->Model('Model', '', TRUE);
        $data['data'] = $this->Model->lista();
            
		$this->load->view('home', $data);
	}

	public function ajaxRequestPost()
	{
		$position = $_POST['position'];
		$i=1;
		foreach($position as $k=>$v){
			$sql = "Update sorting_items SET position_order=".$i." WHERE id=".$v;
			$data['data'] = $this->Model->alterarCliente($v,$i);
			$i++;
		}
		exit;
	}
	
}
