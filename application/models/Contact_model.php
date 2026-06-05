<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert_contact($data) {
        // Dynamically add missing columns if they do not exist in the database table
        if (!$this->db->field_exists('linkedin_id', 'contact_form')) {
            $this->load->dbforge();
            $this->dbforge->add_column('contact_form', [
                'linkedin_id' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'null' => TRUE,
                    'default' => NULL
                ]
            ]);
        }

        if (!$this->db->field_exists('interested', 'contact_form')) {
            $this->load->dbforge();
            $this->dbforge->add_column('contact_form', [
                'interested' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'null' => TRUE,
                    'default' => NULL
                ]
            ]);
        }

        $this->db->insert('contact_form', $data);
        return $this->db->affected_rows() > 0;
    }

    public function get_all_contacts() {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('contact_form')->result();
    }
}
