<?php
class Employee_model extends CI_Model {

/*        public $title;
        public $content;
        public $date;
 */
        public $dni;
        public $name;
        public $lastname;
        public $email;
        public $password;

        // makes the database class available through $this->db object:
        public function __construct() {
                $this->load->database();
        }

        public function get_last_ten_entries()
        {
                $query = $this->db->get('employee');
                return $query->result();
        }

        public function insert_entry()
        {
                $this->title    = $_POST['title']; // please read the below note
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->insert('entries', $this);
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('entries', $this, array('id' => $_POST['id']));
        }

}
?>
