<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  // El primer metodo en ejecutarse:
  public function index() {
    $this->load->model('employee_model');
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('dni', 'DNI', 'required');

    // Datos que son pasados al view:
    $data['add_title'] = "Nuevo empleado";
    $data['form_attributes'] = array('class' => 'forms', 'id' => 'add-form');
    $data['input_extra'] = array('name'=>'dni', 'id'=>'dni', 'placeholder'=>'DNI empleado');
    $data['display_title'] = "Lista de empleados";
    $data['employees'] = $this->employee_model->get_last_ten_entries();

    if($this->form_validation->run() === FALSE) {
      // loads the view for employee:
      $this->load->view('employee_view', $data);

    } else
      $this->load->view('employee_view', $data);
  }
}