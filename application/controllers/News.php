<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{
    var $data;
    var $newur;

    function __construct()
    {
        parent::__construct();
        $this->load->model("Publicmodel", "p");

        $this->newur = $this->uri->segment(2) ? $this->uri->segment(2) : $this->uri->segment(1);

        $this->data['geodata'] = $this->p->getalldata("tbl_geocode");
        $this->data['allmeta'] = $this->p->allmetacontent($this->newur);
        $this->data['companydata'] = $this->p->getalldata("tbl_company");
        $this->data['coursecat'] = $this->p->productlist(0, "id", "tbl_news_category", 'services_short');
    }

    public function index()
    {
        $caturl = $this->uri->segment(2);
        $detail = $this->p->singledetail($caturl, "cat_url", "tbl_news_category", 'services_short');

        if ($detail) {
            $this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_news_category", 'services_short');
            $this->data['courseDetail'] = $detail;
            $courseList = $this->p->getloopdata($detail->id, 'parent_id', 'tbl_news', 'page_short');
            $this->data['courseList'] = $courseList;
        } else {
            redirect(base_url('notfound'));
        }

        $this->load->view('front/news', $this->data);
    }

    public function pages($slug = '')
    {
        $lang = $this->input->get('lang') ?? 'en'; // ✅ Get language from query param

        $this->data['lang'] = $lang; // ✅ Pass language to view
        $this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_news_category", 'services_short');

        $detail = $this->p->singledetail($slug, "page_url", "tbl_news");

        if ($detail) {
            $this->data['courseDetail'] = $detail;

            $catdetail = $this->p->singledetail($detail->parent_id, "id", "tbl_news_category", 'services_short');
            $this->data['catdetail'] = $catdetail;

            $courseList = $this->p->getloopdata($detail->parent_id, 'parent_id', 'tbl_news', 'page_short');
            $this->data['courseList'] = $courseList;
        } else {
            redirect(base_url('notfound'));
        }

        $this->load->view('front/newsdetail', $this->data);
    }

}
