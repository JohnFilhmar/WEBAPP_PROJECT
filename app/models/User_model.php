<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {
    public function getUserByUsername($username) 
    {
        $data = $this->getUsers();
        foreach($data as $users){
            if($users['username'] == $username){
                return [
                    'id' => $users['id'],
                    'password' => $users['password'],
                    'image' => $users['image'],
                    'email' => $users['email'],
                    'role' => $users['role']
                ];
            }
        }
        return null;
    }

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
    public function updateUser($data, $id)
    {
        return $this->db->table('webproject')->where('id', $id)->update($data);
    }
}
?>
