<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_contact_form($data)
    {
        $this->db->insert('contact_form', $data);
    }
}