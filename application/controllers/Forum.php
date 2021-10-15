<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['url', 'language']);
		$this->load->model('Core_model');		

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}
	public function index()
	{
		$data['nav']="<ul>Hello Hello Hello Oh.</ul>";
		$data['sections'] = $this->Core_model->get_all_sections();
		/*$container["header"]=$this->load->view("template/header",$data,TRUE);

		ob_start();
		$this->load->view("template/footer",true);
		$container["footer"] = ob_get_clean();
		//$container["featuredposts"] = [["id"=>456,"title"=>"This is the title","slug" => "This is the slug text"]];

		$this->load->view('main',$container );
		*/
		$this->load->view("template/header",$data);
	}
}
