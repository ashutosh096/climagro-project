<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

    public function subscribe()
    {
        // 1) Decode JSON payload
        $payload = json_decode($this->input->raw_input_stream, true);
        $email   = isset($payload['email']) ? trim($payload['email']) : '';

        // 2) Simple PHP validation
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->output
                        ->set_status_header(400)
                        ->set_content_type('application/json')
                        ->set_output(json_encode([
                            'success' => false,
                            'error'   => 'Invalid email address'
                        ]));
        }

        // 3) Load your model and insert
        $this->load->model('Subscribermodel');
        $ok = $this->Subscribermodel->insert_email($email);

        // 4) Send JSON response
        if ($ok) {
            $resp = ['success' => true];
            $status = 200;
        } else {
            $resp = [
                'success' => false,
                'error'   => 'Already subscribed or DB error'
            ];
            // if you want to differentiate duplicates vs errors,
            // you can grab $this->db->error() inside insert_email()
            $status = 409; // conflict
        }

        return $this->output
                    ->set_status_header($status)
                    ->set_content_type('application/json')
                    ->set_output(json_encode($resp));
    }
}
