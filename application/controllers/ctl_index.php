<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ctl_index extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		
		$data['home'] = strtolower(__CLASS__).'/';
		$this->load->vars($data);
	}
	
	
	/**
	 * index function.
	 * Very basic example: juste draw some data
	 */
	function index()
	{
			if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' );
		 $rol= $this->model_usuario->rol(); 
           $data['usuario']=$_SESSION['my_usuario'];
		$this->load->view('login_header');
		$this->load->view('login_saya');
		$this->load->view('login_footer');


		
	}

}