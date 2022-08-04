<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos_model extends CI_Model {
 //

    public function create($entry, $return_id = FALSE)
    {
        try {
            $this->db->insert('proyectos', $entry);
            return ($return_id) ? $this->db->insert_id() : TRUE;
        }

        catch(Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function logic_delete($id)
    {
        $this->db->set('status', 0, FALSE);
        $this->db->where('idProyecto', $id);
        $this->db->update('proyectos'); 

        return ($this->db->affected_rows() == 1)? TRUE : FALSE;
    }

     public function delete_by_id($id)
    {
        $cmd = "DELETE FROM proyectos where id_usaurio = ".$id;

        $query = $this->db->query($cmd);
        return (TRUE) ? TRUE : NULL;
    }

    public function get_all()
    {
        $cmd = "SELECT * FROM proyectos";

        $query = $this->db->query($cmd);
        return ($query->num_rows() >= 1) ? $query->result() : NULL;
    }
 

     public function get_by_id($id)
    {
        $cmd = "SELECT * FROM proyectos where idProyecto = ".$id;

        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

    public function update_by_id($entry, $id)
    {
        try {
            $this->db->set($entry);
            $this->db->where('idProyecto', $id);
            $this->db->update('proyectos');

            return ($id) ? TRUE : NULL;
        }

        catch(Exception $e) {
            return $e->getMessage();
        }
    }

}

/* End of file Proyectos_model.php */
/* Location: ./application/controllers/Proyectos_model.php */
