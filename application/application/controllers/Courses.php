<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Courses extends CI_Controller
{

	var $data;
	var $newur;
	function __construct()
	{
		parent::__construct();
		$this->load->model("Publicmodel", "p");
		if (sizeof($_GET) > 0) {
			redirect(base_url());
		}
		if ($this->uri->segment(2)) {
			$this->newur = $this->uri->segment(2);
		} else {
			$this->newur = $this->uri->segment(1);
		}
		$this->data['geodata'] = $this->p->getalldata("tbl_geocode");
		$this->data['allmeta'] = $this->p->allmetacontent($this->newur);
		$this->data['companydata'] = $this->p->getalldata("tbl_company");
		$this->data['coursecat'] = $this->p->productlist(0, "id", "tbl_course_category", 'services_short');
	}


	public function index()
	{
		$caturl = $this->uri->segment(2);
		$detail = $this->p->singledetail($caturl, "cat_url", "tbl_course_category", 'services_short');

		if ($detail) {
			$this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_course_category", 'services_short');
			$this->data['courseDetail'] = $detail;
			$courseList = $this->p->getloopdata($detail->id, 'parent_id', 'tbl_pages', 'page_short');

			$this->data['courseList'] = $courseList;
		} else {
			redirect(base_url('notfound'));
		}

		$this->load->view('front/frontpage', $this->data);
	}

	public function pages()
	{
		$this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_course_category", 'services_short');
		$pageurl = $this->uri->segment(2);
		$detail = $this->p->singledetail($pageurl, "page_url", "tbl_pages");
		$catdetail = $this->p->singledetail($detail->parent_id, "id", "tbl_course_category", 'services_short');
		if ($detail) {
			$this->data['courseDetail'] = $detail;
			$this->data['catdetail'] = $catdetail;
			$courseList = $this->p->getloopdata($detail->parent_id, 'parent_id', 'tbl_pages', 'page_short');
			$this->data['courseList'] = $courseList;
		} else {
			redirect(base_url('notfound'));
		}
		$this->load->view('front/contentpages', $this->data);
	}
}
