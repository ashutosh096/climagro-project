<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('email');
        $this->load->model('Contact_model'); // Assuming you have a model to save contact data
    }

    public function index() {
        $this->load->view('fornt/contactpage');
        // Your view file
    }

    public function submit() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('comment', 'Message', 'required');
        $this->form_validation->set_rules('interested', 'Interest', 'trim'); // Add this line

    
        if ($this->form_validation->run() == FALSE) {
            redirect('contact-us');
        } else {
            $data = [
                'name' => $this->input->post('name', TRUE),
                'email' => $this->input->post('email', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'title' => $this->input->post('title', TRUE), 
                'subject' => $this->input->post('subject', TRUE),
                'interested' => $this->input->post('interested', TRUE), // Make sure form uses name="interested"  // changed from course to subject
                'message' => $this->input->post('comment', TRUE),
                'created' => date("Y-m-d H:i:s")
            ];
    
            $this->Contact_model->insert_contact($data);
    
            $config = array(
                'protocol'  => 'smtp',
                'smtp_host' => 'smtp.office365.com',
                'smtp_port' => 587,
                'smtp_user' => 'akshat@ehmconsultancy.co.in',
                'smtp_pass' => 'N%661829788191ut',  // your app password
                'smtp_crypto' => 'tls',
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'wordwrap'  => TRUE,
                'newline'   => "\r\n"
            );
            $this->load->library('email', $config);
    
            $this->email->from('akshat@ehmconsultancy.co.in', $data['name']);
            $this->email->to('akshatsan23@gmail.com'); 
            $this->email->subject('New Contact Form Submission: ' . $data['subject']);
            $this->email->message(
                "You have received a new message:<br><br>" .
                "Name: " . $data['name'] . "<br>" .
                "Email: " . $data['email'] . "<br>" .
                "Phone: " . $data['phone'] . "<br>" .
                "Subject: " . $data['subject'] . "<br>" .
                "Message: " . nl2br($data['message']) . "<br><br>" .
                "Submitted on: " . $data['created']
            );
    
            if ($this->email->send()) {
                $this->session->set_flashdata('success', 'Your message has been sent successfully!');
            } else {
                log_message('error', $this->email->print_debugger());
                $this->session->set_flashdata('error', 'Unable to send email. Please try again later.');
            }
    
            redirect('contactpage');
        }
    }
    
    public function pageConsulting() {
        // Set validation rules
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('comment', 'Message', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $response = [
                'status' => 'error',
                'message' => validation_errors()
            ];
            redirect('contact-us');
        } else {
            // Validation passed
            $data = [
                'name' => $this->input->post('name', TRUE),
                'email' => $this->input->post('email', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'course' => $this->input->post('subject', TRUE),
                'message' => $this->input->post('comment', TRUE),
                'interested' => $this->input->post('interested', TRUE),
                'created' => date("d-m-y")
            ];

            // Insert data into the database or perform any necessary action
            $this->Contact_model->insert_contact($data);

            // Send success response
            $response = [
                'status' => 'success',
                'message' => 'Your message has been sent successfully!'
            ];
        }
        $this->session->set_flashdata('success', 'Your message has been sent successfully!');
        redirect('contact-us');
        // Return response in JSON format
        json_encode($response);
    }
}
