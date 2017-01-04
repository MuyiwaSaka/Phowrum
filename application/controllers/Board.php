<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller {

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
	public function index()
	{
		$this->load->helper("url");
		$container["featuredposts"] = [["id"=>456,"title"=>"This is the title","slug" => "This is the slug text"]];
		$container["boardlinks"] = [
			["boardname"=>"Politics","id"=>787], ["boardname"=>"Sports","id"=>345],["boardname"=>"Programming","id"=>7897]
			];
		$this->load->view('board',$container );
	}
	
}
