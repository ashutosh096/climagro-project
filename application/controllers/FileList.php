<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileList extends CI_Controller {
  public function index()
  {
    // 1) Grab & sanitize
    $variable = preg_replace('/[^a-z0-9_-]/i','',$this->input->get('variable'));
    $type     = preg_replace('/[^a-z0-9_-]/i','',$this->input->get('type'));
    $location = preg_replace('/[^a-z0-9_-]/i','',$this->input->get('location'));

    if (! $variable || ! $type || ! $location) {
      return $this->_respond(400, ['error'=>'Missing/invalid params']);
    }

    // 2) Build path
    $dir = FCPATH . "asset/{$variable}/{$type}/{$location}";
    if (! is_dir($dir)) {
      return $this->_respond(404, ['error'=>"Folder not found: {$variable}/{$type}/{$location}"]);
    }

    // 3) Scan
    $files = array_values(array_filter(scandir($dir), function($f) use($dir) {
      return is_file("$dir/$f") && preg_match('/\.(jpe?g|png)$/i',$f);
    }));

    return $this->_respond(200, $files);
  }

  private function _respond($status, $payload)
  {
    $this->output
         ->set_status_header($status)
         ->set_content_type('application/json')
         ->set_output(json_encode($payload))
         ->_display();
    exit;
  }
}
