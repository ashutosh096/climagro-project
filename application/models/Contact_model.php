<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert_contact($data) {
        // Insert contact data into your database
        // $this->db->insert('tbl_enquiry', $data);
        $this->db->insert('contact_form', $data);
        return $this->db->affected_rows() > 0;
    }

    public function get_all_contacts() {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('contact_form')->result();
    }
}
