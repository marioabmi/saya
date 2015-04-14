<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_empleados extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	
			session_start(); 
 
		$this->load->model('model_menu'); 
			$this->load->model('model_empleado'); 
		$data['home'] = strtolower(__CLASS__).'/';
		$this->load->vars($data);
	}


	function index()
	{
		if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
		$data['usuario']=$_SESSION['my_usuario']; 
		$data['empleado'] = $this->model_empleado->empleado();
		$this->load->view('header',$data);
		$this->load->view('form/frmempleado');
		$this->load->view('footer');


		
	}

	function agregar()
	{

		if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
		$data['usuario']=$_SESSION['my_usuario']; 
        $data['cargo'] = $this->model_empleado->cargo();
        $data['personas'] = $this->model_empleado->personas();
        

if($this->input->post('post') && $this->input->post('post')==1)
        {   

            $this->form_validation->set_rules('id_cargos', 'Cargo',              'required|trim|xss_clean');
            $this->form_validation->set_rules('id_personas', 'Persona',             'required|trim|xss_clean');
            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
            $this->form_validation->set_message('numeric','El Campo <b>%s</b> Solo Acepta Números');
            if ($this->form_validation->run() == TRUE)
            {      
        //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
     
                $id_cargos = $this->input->post('id_cargos');
                $id_personas = $this->input->post('id_personas');
                $this->model_empleado->agregar_empleado($id_personas,$id_cargos);
            redirect('Crud_empleados'); 
        }
                }


		$this->load->view('header',$data);
		$this->load->view('form/a_empleado');
		$this->load->view('footer');

	}

     public function editar($id_personas=0)
    {
         if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
           $data['usuario']=$_SESSION['my_usuario'];
           $data['area'] = $this->crud_model_activo->area();
        //verificamos si existe el id
        $respuesta = $this->crud_model_activo->get_activo($id_activofijo);
        //si nos retorna FALSE le mostramos la pag 404
        if($respuesta==false)
        show_404();
        else
        {
            //Si existe el post para editar
            if($this->input->post('post') && $this->input->post('post')==1)
            {
            $this->form_validation->set_rules('nombre_activo_fijo', 'Nombre Activo', 'required|trim|xss_clean');
            $this->form_validation->set_rules('id_area', 'Area','required|trim|xss_clean');
            $this->form_validation->set_rules('descripcion', 'Descripcion', 'required|trim|xss_clean');
             
            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
            $this->form_validation->set_message('alpha','El Campo <b>%s</b> Solo Acepta caracteres alfabeticos');
                if ($this->form_validation->run() == TRUE)
                {
                $nombre_activo_fijo    = $this->input->post('nombre_activo_fijo');
                $id_area  = $this->input->post('id_area');
                $descripcion = $this->input->post('descripcion');
         
                $this->crud_model_activo->actualizar_activo($id_activofijo,$nombre_activo_fijo,$id_area,$descripcion);
                    //redireccionamos al controlador CRUD
                    redirect('crud_activo');               
                }
            }
            //devolvemos los datos del usuario
            $data['dato'] = $respuesta;
            //cargamos la vista
            $this->load->view('header/header', $data);
            $this->load->view('form/editar_activo',$data);
            $this->load->view('footer');
        }
    }
   

	}
	