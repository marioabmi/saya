<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Model_personas extends CI_Model { 

 public function municipios()
    {
        $this->db->order_by('municipio','asc');
        $municipio = $this->db->get('municipios');
        if($municipio->num_rows()>0)
        {
            return $municipio->result();
        }
    }
     public function nacionalidad()
    {
        $this->db->order_by('nacionalidad','asc');
        $nacionalidad = $this->db->get('nacionalidades');
        if($nacionalidad->num_rows()>0)
        {
            return $nacionalidad->result();
        }
    }
         public function profesiones()
    {
        $this->db->order_by('profesion','asc');
        $profesion = $this->db->get('profesiones');
        if($profesion->num_rows()>0)
        {
            return $profesion->result();
        }
    }
    public function agregar_personas($nombres,$sexo, 
                     $apellidos, $direccion, $id_municipios,$telefono,$dui,
                    $id_profesiones, $id_nacionalidades, $imagen)
    {
  
$this->db->insert('personas',array(
            'nombres'                =>  $nombres,
            'sexo'                   =>  $sexo,
            'apellidos'              =>  $apellidos,
            'direccion'              =>  $direccion,
            'id_municipios'          =>  $id_municipios,
            'telefono'               =>  $telefono,
            'dui'                    =>  $dui,
            'id_profesiones'         =>  $id_profesiones,
            'id_nacionalidades'      =>  $id_nacionalidades,
            'foto'                 =>  $imagen
           
             
        ));
    }
    public function personas()
    {    
        $query = $this->db->query('SELECT personas.id_personas, personas.nombres,
personas.direccion,
personas.telefono,
personas.foto,
municipios.municipio,
profesiones.profesion
FROM personas
Inner Join municipios on municipios.id_municipios = personas.id_municipios
Inner Join profesiones on profesiones.id_profesiones = personas.id_profesiones');
        return $query->result();
    }

 }