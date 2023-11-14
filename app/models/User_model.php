<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {
    public function getUsers()
    {
        return $this->db->table('webproject')->get_all();
    }
    public function searchUser($id)
    {
        return $this->db->table('webproject')->where('id', $id)->get();
    }
    public function addUser($data)
    {
        return $this->db->table('webproject')->insert($data);
    }
}
?>
