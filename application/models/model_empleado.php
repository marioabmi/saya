<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Model_empleado extends CI_Model { 

     public function cargo()
    {
        $this->db->order_by('masculino','asc');
        $cargos = $this->db->get('cargos');
        if($cargos->num_rows()>0)
        {
            return $cargos->result();
        }
    }
        public function personas()
    {
        $this->db->order_by('nombres','asc');
        $personas = $this->db->get('personas');
        if($personas->num_rows()>0)
        {
            return $personas->result();
        }
    }
    public function agregar_empleado($id_personas,$id_cargos)
    {
  
$this->db->insert('empleados',array(
            'id_personas'         =>  $id_personas,
            'id_cargos'           =>  $id_cargos
        ));
    }
    public function empleado()
    {    
        $query = $this->db->query('SELECT personas.id_personas, personas.nombres,
personas.apellidos,
personas.dui,
cargos.masculino
from empleados
inner join personas On personas.id_personas = empleados.id_personas
inner join cargos   On cargos.id_cargos     = empleados.id_cargos');
        return $query->result();
    }

 }