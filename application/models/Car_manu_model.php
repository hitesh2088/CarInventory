<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Car_manu_model extends CI_Model {

    public $manu_name;
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
        public function get_manu()
        {
                $query = $this->db->get('manufacturer');
                return $query->result();
        }

        public function insert_manu()
        {
                $this->manu_name  = $this->input->post('manu_name');
                $this->db->insert('manufacturer', $this);
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('entries', $this, array('id' => $_POST['id']));
        }

}