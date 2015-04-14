<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_consejo extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
			session_start(); 
 
		$this->load->model('model_menu');
        $this->load->model('model_empleado');
		$this->load->model('model_consejo'); 
		$data['home'] = strtolower(__CLASS__).'/';
		$this->load->vars($data);
	}


	function index()
	{
		if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
		$data['usuario']=$_SESSION['my_usuario']; 
		
		$this->load->view('header',$data);
		$this->load->view('form/frmconsejo');
		$this->load->view('footer');


		
	}
    function agregar_periodo()
	{

		if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
		$data['usuario']=$_SESSION['my_usuario']; 
        $estados = $this->model_consejo->periodo();
      


if($this->input->post('post') && $this->input->post('post')==1)
        {   

            $this->form_validation->set_rules('fecha_inicio', 'Inicio',              'required|trim|xss_clean');
            $this->form_validation->set_rules('fecha_fin', 'Fin',             'required|trim|xss_clean');
            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
            $this->form_validation->set_message('numeric','El Campo <b>%s</b> Solo Acepta Números');
            if ($this->form_validation->run() == TRUE)
            {      
        //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
     
                $fecha_inicio = $this->input->post('fecha_inicio');
                $fecha_fin    = $this->input->post('fecha_fin');
                $estado       = 1;
                $this->model_consejo->agregar_periodo($fecha_inicio,$fecha_fin, $estado);
            redirect('Crud_consejo'); 
        }
                }


    $this->load->view('header',$data);
        $this->load->view('form/a_periodo');
        $this->load->view('footer');
		
	}

function agregar_consejo()
    {

        if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
        $data['usuario']=$_SESSION['my_usuario']; 
        $data['cargo'] = $this->model_empleado->cargo();
        $data['personas'] = $this->model_empleado->personas();
      


if($this->input->post('post') && $this->input->post('post')==1)
        {   

            $this->form_validation->set_rules('fecha_inicio', 'Inicio',              'required|trim|xss_clean');
            $this->form_validation->set_rules('fecha_fin', 'Fin',             'required|trim|xss_clean');
            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
            $this->form_validation->set_message('numeric','El Campo <b>%s</b> Solo Acepta Números');
            if ($this->form_validation->run() == TRUE)
            {      
        //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
     
                $fecha_inicio = $this->input->post('fecha_inicio');
                $fecha_fin    = $this->input->post('fecha_fin');
                $estado       = 1;
                $this->model_consejo->agregar_periodo($fecha_inicio,$fecha_fin, $estado);
            redirect('Crud_consejo'); 
        }
                }


    $this->load->view('header',$data);
        $this->load->view('form/a_consejo');
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
	