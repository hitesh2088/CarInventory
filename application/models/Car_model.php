<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Car_model extends CI_Model {

    //public $manu_name;
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
        public function get_model()
        {
            $this->db->select('*,COUNT(model.manu_id) as car_count');
            $this->db->from('model');
            $this->db->join('manufacturer', 'manufacturer.manu_id = model.manu_id');
            $this->db->group_by('model.model_name');
            $query = $this->db->get();
            return $query->result();
        }

        public function insert_model()
        {
            foreach ($_POST['formData'] as $key => $value) {
                $this->$value['name'] = $value['value'];
            }
            //$this->manu_name  = $this->input->post('manu_name');
            $this->db->insert('model', $this);
        }

        public function getCardetails()
        {
                $this->title    = $_POST['model_name'];
                $this->db->select('*');
                $this->db->from('model');
                $this->db->join('manufacturer', 'manufacturer.manu_id = model.manu_id');
                $this->db->where('model_name', $this->title);
                $query = $this->db->get();
                return $query->result();
        }

}