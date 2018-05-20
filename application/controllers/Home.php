<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('Car_manu_model','manu');
		$this->load->model('Car_model','car');
		$data['manu'] = $this->manu->get_manu();
		$data['cars'] = $this->car->get_model();
		$this->load->helper('url');
		$this->load->view('inventory', $data);
		$this->load->view('addmanufacture');
		$this->load->view('addmodel', $data);
		$this->load->view('carmodel');
		
	}
	public function addmanufacture(){
		$this->load->model('Car_manu_model','car');
		$this->car->insert_manu();
		echo site_url('home/addmanufacturer');;
	}
	public function addmodel(){
		$this->load->model('Car_model','car');
		$this->car->insert_model();
	}
	public function cardetail(){
		$this->load->model('Car_model','car');
		$data['cars'] =  $this->car->getCardetails();
		$this->load->view('cardetail',$data);
	}
}
