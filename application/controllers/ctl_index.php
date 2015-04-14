<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ctl_index extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
			session_start(); 
		$this->load->model('model_acceso'); 
		$this->load->model('model_menu'); 
		$data['home'] = strtolower(__CLASS__).'/';
		$this->load->vars($data);
	}
	
	
	/**
	 * index function.
	 * Very basic example: juste draw some data
	 */
	function index()
	{
		
		$this->load->view('login_header');
		$this->load->view('login_saya');
		$this->load->view('login_footer');


		
	}

	function loguear(){ 
		$data=array(); 
		$this->form_validation->set_rules('usuario', 'usuario', 'trim|required|xss_clean'); 
		$this->form_validation->set_rules('clave', 'clave', 'trim|required|xss_clean|md5'); 
		if( $this->form_validation->run() === FALSE ){ 
			$data['type']   =false; 
			$data['message']=validation_errors(); 
		}else{ 
			$usuario=$this->model_acceso->comprobar( $_POST ); 
			if( $usuario==false ){ 
				$data['type']   =false; 
				$data['message']='Acceso denegado.'; 
			}else{ 
				$data['type']   =true; 
				$data['message']='Acceso concedido.'; 
				$_SESSION['my_usuario']=$usuario; 
			} 
		} 
		$this->output->set_content_type('application/json')->set_output( json_encode( $data ) ); 
	}

	function principal(){
if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
		$data['usuario']=$_SESSION['my_usuario']; 
		$this->load->view('header',$data);
				$this->load->view('footer');

	} 
 
 
 
	function salir(){ 
		unset($_SESSION['my_usuario']); 
		redirect( 'ctl_index', 'refresh' ); 
	} 
 
}


