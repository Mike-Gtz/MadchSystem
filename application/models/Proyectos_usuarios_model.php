<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos_usuarios_model extends CI_Model {
 

    public function create($entry, $return_id = FALSE)
    {
        try {
            $this->db->insert('proyectos_usuarios', $entry);
            return ($return_id) ? $this->db->insert_id() : TRUE;
        }

        catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function get($entry)
    {
        $this->db->where($entry);
        $query = $this->db->get('proyectos_usuarios');

        return ($query->num_rows() >= 1) ? TRUE : FALSE;
    }

     public function delete_by_id($id)
    {
        $cmd = "DELETE FROM proyectos_usuarios where idEquipo = ".$id;

        $query = $this->db->query($cmd);
        return (TRUE) ? TRUE : NULL;
    }

    public function get_all_proyecto($id)
    {
        $cmd = "SELECT * FROM proyectos_usuarios inner join usuarios on usuarios.idUsuario=proyectos_usuarios.idUsuario where idProyecto=".$id;

        $query = $this->db->query($cmd);
        return ($query->num_rows() >= 1) ? $query->result() : NULL;
    }


}

/* End of file Proyectos_model.php */
/* Location: ./application/controllers/Proyectos_model.php */
