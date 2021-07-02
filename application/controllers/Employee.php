<?php

class Employee extends CI_Controller {

  // calls the constructor of its parent class CI_Controller:

  public function __construct() {
    parent::__construct();
    $this->load->model('employee_model');
  }

  public function index() {
    $this->employee_model->get_last_ten_entries();
    // $data['employees'] = $this->employe_model->get_last_ten_entries();
  }

  public function comments($comment, $num) {
    echo "esto seria el metodo comments: " . $comment . " - " . $num;
  }

}