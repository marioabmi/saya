<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_personas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	
			session_start(); 
 
		$this->load->model('model_menu'); 
			$this->load->model('model_personas'); 
		$data['home'] = strtolower(__CLASS__).'/';
		$this->load->vars($data);
	}


	function index()
	{
		if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
		$data['usuario']=$_SESSION['my_usuario']; 
		$data['personas'] = $this->model_personas->personas();
		$this->load->view('header',$data);
		$this->load->view('form/frmpersona');
		$this->load->view('footer');


		
	}

	function agregar()
	{

		if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
		$data['usuario']=$_SESSION['my_usuario']; 
		
      if($this->input->post('post') && $this->input->post('post')==1)
        {
            $this->form_validation->set_rules('nombres', 'Campo Nombre',           'required|trim|xss_clean');
            $this->form_validation->set_rules('sexo', 'Campo Genero',   'required|trim|xss_clean');  
            $this->form_validation->set_rules('apellidos', 'Campo Apellidos',   'required|trim|xss_clean');  
            $this->form_validation->set_rules('direccion', 'Campo Sucursal',              'required|trim|xss_clean');
            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
            $this->form_validation->set_message('numeric','El Campo <b>%s</b> Solo Acepta Números');
            if ($this->form_validation->run() == TRUE)
            {
                $prueva = $this->input->post('nombres');
                 $prueva = $this->input->post('sexo');
                 $prueva = $this->input->post('apellidos');
                $prueva = $this->input->post('direccion');
               
               $this->agregar_b($prueva);
 return $prueva;
                }


                }
if($this->input->post('post') && $this->input->post('post')==2)
        {   

        	$this->form_validation->set_rules('nombres', 'Campo Nombre',           'required|trim|xss_clean');
            $this->form_validation->set_rules('sexo', 'Campo Genero',   'required|trim|xss_clean');  
            $this->form_validation->set_rules('apellidos', 'Campo Apellidos',   'required|trim|xss_clean');  
            $this->form_validation->set_rules('direccion', 'Campo Sucursal',              'required|trim|xss_clean');  
            $this->form_validation->set_rules('id_municipios', 'municipio',   'required|trim|xss_clean');  
            $this->form_validation->set_rules('telefono', 'telefono',           'required|trim|xss_clean');
            $this->form_validation->set_rules('dui', 'Dui',   'required|trim|xss_clean');  
            $this->form_validation->set_rules('id_profesiones', 'profesion',              'required|trim|xss_clean');
            $this->form_validation->set_rules('id_nacionalidades', 'nacionalidad',             'required|trim|xss_clean');
            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
            $this->form_validation->set_message('numeric','El Campo <b>%s</b> Solo Acepta Números');
            if ($this->form_validation->run() == TRUE)
            {      
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';
        $this->load->library('upload', $config);
         //SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA 
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());

            $prueva = $this->input->post('nombres');
            $prueva = $this->input->post('sexo');
            $prueva = $this->input->post('apellidos');
            $prueva = $this->input->post('direccion');
            
            $this->agregar_b_($error, $prueva);
              return $prueva;
          
        } else {
        //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
        //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
        	    $nombres = $this->input->post('nombres');
                $sexo = $this->input->post('sexo');
                $apellidos = $this->input->post('apellidos');
                $direccion= $this->input->post('direccion');
                $id_municipios= $this->input->post('id_municipios');
                $telefono = $this->input->post('telefono');
                $dui = $this->input->post('dui');
                $id_profesiones = $this->input->post('id_profesiones');
                $id_nacionalidades = $this->input->post('id_nacionalidades');
                  $file_info = $this->upload->data();
            //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
            //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA
            $this->_create_thumbnail($file_info['file_name']);
            $data = array('upload_data' => $this->upload->data());
            $imagen = $file_info['file_name'];
                $this->model_personas->agregar_personas($nombres,$sexo, 
                $apellidos, $direccion, $id_municipios,$telefono,$dui,
                $id_profesiones, $id_nacionalidades, $imagen);
            redirect('Crud_personas'); 
        }
                            
            
                }


                }


		$this->load->view('header',$data);
		$this->load->view('form/a_personas');
		$this->load->view('footer');

	}
	function agregar_b_($prueva, $error)
	{

		if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
		$data['usuario']=$_SESSION['my_usuario']; 
		$data['municipio'] = $this->model_personas->municipios();
        $data['nacionalidad'] = $this->model_personas->nacionalidad();
         $data['profesiones'] = $this->model_personas->profesiones();
		$this->load->view('header',$data);
		$this->load->view('form/b_personas', $prueva);
		$this->load->view('footer');

	}
    function agregar_b($prueva)
    {

        if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
        $data['usuario']=$_SESSION['my_usuario']; 
        $data['municipio'] = $this->model_personas->municipios();
        $data['nacionalidad'] = $this->model_personas->nacionalidad();
         $data['profesiones'] = $this->model_personas->profesiones();
        $this->load->view('header',$data);
        $this->load->view('form/b_personas', $prueva);
        $this->load->view('footer');

    }
	 function _create_thumbnail($filename){
        $config['image_library'] = 'gd2';
        //CARPETA EN LA QUE ESTÁ LA IMAGEN A REDIMENSIONAR
        $config['source_image'] = 'uploads/'.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        //CARPETA EN LA QUE GUARDAMOS LA MINIATURA
        $config['new_image']='uploads/thumbs/';
        $config['width'] = 150;
        $config['height'] = 150;
        $this->load->library('image_lib', $config); 
        $this->image_lib->resize();
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
	