<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribermodel extends CI_Model {
  public function insert_email(string $email): bool {
    // Prevent duplicates
    if ($this->db->where('email', $email)->count_all_results('subscribers') > 0) {
      return false;
    }
    return $this->db->insert('subscribers', ['email' => $email]);
  }
}
