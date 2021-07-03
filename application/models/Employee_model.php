<?php
class Employee_model extends CI_Model {

        public $dni;
        public $name;
        public $lastname;

        // Habilita la clase database mediante el objeto $this->db:
        public function __construct() {
                $this->load->database();
        }

        public function get_all_entries() {
                $query = $this->db->get('employee');
                return $query->result();
        }

        public function get_entry($id) {
                $query = $this->db->get_where('employee', array('dni' => $id));
                return $query->result();
        }

        public function insert_entry() {
                $this->dni = $this->input->post('dni');
                $this->name = $this->input->post('name');
                $this->lastname = $this->input->post('lastname');

                $this->db->insert('employee', $this);
        }

        public function update_entry($dni) {

                $this->dni = $this->input->post('dni');
                $this->name = $this->input->post('name');
                $this->lastname = $this->input->post('lastname');

                $this->db->set('name', $this->name);
                $this->db->set('lastname', $this->lastname);
                $this->db->where('dni', $dni);
                $this->db->update('employee');
        }

        public function delete_entry($dni) {
                $this->name  = $this->input->post('name');
                $this->lastname  = $this->input->post('lastname');

                $this->db->where('dni', $dni);
                $this->db->delete('employee');
                
        }
}
?>
