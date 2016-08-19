<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends MY_Model{
	function __construct(){        
        parent::__construct();
    }
 
 	function add($option){
        $this->db->set('email', $option['email']);
        $this->db->set('password', $option['password']);
        $this->db->set('created', 'NOW()', false);
        $this->db->insert('user');
        $result = $this->db->insert_id();
        return $result;
    }

    function gets(){
        return $this->db->query("SELECT * FROM user")->result();
    }

    function getByEmail($option){
    	$result = $this->db->get_where('user', array('email'=>$option['email']))->row();
    	var_dump($this->db->last_query());
    	return $result;
    }
}
?>