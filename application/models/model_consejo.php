<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Model_consejo extends CI_Model { 

     public function periodo()
    {
        $this->db->order_by('estado','asc');
        $periodo = $this->db->get('periodo_concejo');
        if($periodo->num_rows()>0)
        {
            return $periodo->result();
        }
    }
    public function agregar_periodo($fecha_inicio,$fecha_fin,$estado)
    {
  
$this->db->insert('periodo_concejo',array(
            'fecha_inicio'         =>  $fecha_inicio,
            'fecha_fin'            =>  $fecha_fin,
            'estado'               =>  $estado    
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