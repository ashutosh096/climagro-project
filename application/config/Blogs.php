<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blogs extends CI_Controller
{
    var $data;
    var $newur;

    function __construct()
    {
        parent::__construct();
        $this->load->model("Publicmodel", "p");

        // Handle URI segment
        $this->newur = $this->uri->segment(2) ? $this->uri->segment(2) : $this->uri->segment(1);

        // Set common data
        $this->data['geodata'] = $this->p->getalldata("tbl_geocode");
        $this->data['allmeta'] = $this->p->allmetacontent($this->newur);
        $this->data['companydata'] = $this->p->getalldata("tbl_company");
        $this->data['coursecat'] = $this->p->productlist(0, "id", "tbl_blog_category", 'services_short');
    }

    public function index()
    {
        // Fetch category by cat_url
        $caturl = $this->uri->segment(2);
        $detail = $this->p->singledetail($caturl, "cat_url", "tbl_blog_category", 'services_short');

        if ($detail) {
            // Fetch all blogs within the category
            $this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_blog_category", 'services_short');
            $this->data['courseDetail'] = $detail;
            $courseList = $this->p->getloopdata($detail->id, 'parent_id', 'tbl_blog', 'page_short');
            $this->data['courseList'] = $courseList;
        } else {
            redirect(base_url('notfound'));
        }

        // Load the view for the blogs in this category
        $this->load->view('front/blogs', $this->data);
    }

    public function pages()
    {
        
        $this->data['coursecatlist']=$this->p->productlist(0, "id", "tbl_course_category", 'services_short');
		$pageurl = $this->uri->segment(2);
		$detail=$this->p->singledetail($pageurl, "page_url", "tbl_blog");
		$catdetail=$this->p->singledetail($detail->parent_id, "id", "tbl_course_category", 'services_short');
		if($detail)
		{
			$this->data['courseDetail'] = $detail;
			$this->data['catdetail'] = $catdetail;
			$courseList = $this->p->getloopdata($detail->parent_id, 'parent_id', 'tbl_blog', 'page_short');
			$this->data['courseList']=$courseList;
		}else {
            redirect(base_url('notfound'));
        }

        // Load the view for the single blog post detail
        $this->load->view('front/blogdetail', $this->data);
    }
}
