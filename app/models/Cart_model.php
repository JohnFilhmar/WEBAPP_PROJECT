<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Cart_model extends Model {
    public function getCart($userId)
    {
        return $this->db->raw("
            SELECT
                p.itemname,
                p.compatibility,
                p.description,
                p.image,
                p.price,
                c.id,
                c.quantity,
                c.total
            FROM
                cart c
            JOIN
                products p ON c.item_id = p.id
            WHERE
                c.user_id = ?", [$userId]);
    }
    public function searchCart($id)
    {
        return $this->db->table('cart')->where('item_id', $id)->get();
    }
    public function searchCartId($id)
    {
        return $this->db->table('cart')->where('id', $id)->get();
    }
    public function deleteCart($id)
    {
        return $this->db->table('cart')->where('id', $id)->delete();
    }
    public function addCart($data)
    {
        return $this->db->table('cart')->insert($data);
    }
    public function updateCart($data, $id)
    {
        return $this->db->table('cart')->where('item_id', $id)->update($data);
    }
}
?>
