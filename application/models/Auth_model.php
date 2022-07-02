 <?php
defined('BASEPATH') OR exit('No se permite el acceso directo.');

class Auth_model extends CI_Model{

    public function login($email){
        $this->db->where('email', $email);
        $rs = $this->db->get('usuarios');

        return $rs->num_rows() == 1 ? $rs->row() : NULL;
    }
 

}
?>