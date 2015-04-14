<?php 
 	class Model_menu extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function menu_registro($id_usuario)
    {

  $query = $this->db->query("SELECT usuarios.id_usuario, 
usuarios.usuario, 
gu_opcion.id_opcion, 
gu_opcion.opcion, 
gu_opcion.url 
FROM gu_rol_menu, gu_opcion, gu_rol, usuarios
where usuarios.id_rol = gu_rol.id_rol
and gu_rol_menu.id_opcion = gu_opcion.id_opcion 
and gu_rol_menu.id_rol = gu_rol.id_rol
and usuarios.id_usuario = '$id_usuario' 
and gu_opcion.tipo = '1';");
        return $query->result();

    }
     public function menu_reporte($id_usuario)
    {

  $query = $this->db->query("SELECT usuarios.id_usuario, 
usuarios.usuario, 
gu_opcion.id_opcion, 
gu_opcion.opcion, 
gu_opcion.url 
FROM gu_rol_menu, gu_opcion, gu_rol, usuarios
where usuarios.id_rol = gu_rol.id_rol
and gu_rol_menu.id_opcion = gu_opcion.id_opcion 
and gu_rol_menu.id_rol = gu_rol.id_rol
and usuarios.id_usuario = '$id_usuario' 
and gu_opcion.tipo = '2';");
        return $query->result();

    }

}
