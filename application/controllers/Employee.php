<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {



  public function __construct() {
    parent::__construct();

    $this->load->model('employee_model');
    // Permite crear y validar los formularios:
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->helper('url');

  }

  public function index() {

    // Datos que son pasados al view:
    $data['employees'] = $this->employee_model->get_all_entries();

    // loads the view for employee:
    $this->load->view('employee_view', $data);
  }

  public function create() {

    $this->form_validation->set_rules('dni', 'DNI', 'required');
    $this->form_validation->set_rules('name', 'Nombre', 'required');
    $this->form_validation->set_rules('lastname', 'Apellido', 'required');

    // si no se rellenan todos los campos:
    if($this->form_validation->run() === FALSE) {
      $this->index();

    } else {
      $this->employee_model->insert_entry();
      echo "Datos ingresados con exito!";
      $this->index();
    }
  }

  public function delete($dni) {
    $this->employee_model->delete_entry($dni);
    if($this->db->affected_rows() > 0) {
      echo "Datos eliminados correctamente";
      $this->index();
    }
  }

  public function load_update($dni) {
    $data['employees'] = $this->employee_model->get_entry($dni);
    $this->load->view('employee_update_view', $data);
  }

  public function update($dni) {
    $this->employee_model->update_entry($dni);
    $this->index();
  }
}