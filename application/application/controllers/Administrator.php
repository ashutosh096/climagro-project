<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Administrator extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("user_id")) {
			return redirect("adminlogin");
		}
		$this->usertype = $this->session->userdata("user_id")->u_type;
		$this->load->model("admin-model/adminmodel");
	}

	public function index()
	{
		redirect('administrator/dashboard');
	}

	public function dashboard()
	{
		$data['title'] = "Dashboard";
		$data['slider'] = $this->adminmodel->productlist(0, 0, "tbl_slider");
		$data['service'] = $this->adminmodel->productlist(0, 0, "tbl_services");
		$data['package'] = $this->adminmodel->productlist(0, 0, "tbl_pages");
		$this->load->view("admin-template/dashboard", $data);
	}

	public function companyprofile()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$compDtl = $this->adminmodel->companyprofile('1');
		$data['profiledetail'] = $compDtl;
		$data['title'] = "Company Profile Setting";
		$this->load->view("admin-template/profile", $data);
	}


	public function updateprofile()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$compDtl = $this->adminmodel->companyprofile('1');
		$data['profiledetail'] = $compDtl;
		$saveImg = "";
		$newName =	rand(1, date("Ymd")) . $_FILES['companylogo']['name'];
		$config = array(
			'upload_path'		=>	 './assest/uploadfile/',
			'allowed_types'		=>	 "gif|jpg|png|jpeg",
			'file_name'			=>	 $newName,
			//'encrypt_name'		=>	 TRUE,
			'remove_spaces'		=>   TRUE
		);

		if ($_FILES['companylogo']['name'] != '') {
			$this->load->library("upload", $config);
			$this->upload->do_upload("companylogo");
			$uploaded = $this->upload->data();
			$saveImg = $uploaded['file_name'];
			if ($_POST['oldimage'] != '' && read_file('./assest/uploadfile/' . $_POST['oldimage'])) {
				unlink('./assest/uploadfile/' . $_POST['oldimage']);
			}
		} else {
			$saveImg = $_POST['oldimage'];
		}

		$_POST['logo'] = $saveImg;

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		if ($this->form_validation->run("companyprofile") == FALSE) {
			$data['title'] = "Company Profile Setting";
			$this->load->view("admin-template/profile", $data);
		} else {

			$this->load->model('admin-model/adminmodel');
			$checkUpdate = $this->adminmodel->updatecompany($_POST);
			if ($checkUpdate) {
				$data['title'] = "Company Profile Setting";
				$this->session->unset_userdata("errprofile");
				$this->session->set_userdata("sucprofile", "Profile updated successfully!");

				redirect('administrator/companyprofile');
			} else {
				$data['title'] = "Company Profile Setting";
				$this->session->unset_userdata("sucprofile");
				$this->session->set_userdata("errprofile", "Sorry profile is not updated!");

				redirect('administrator/companyprofile');
			}
		}
	}

	public function manageslider()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['sliderlist']	=	$this->adminmodel->productlist(0, "id", "tbl_slider", 'slide_short');
		$data['title']		=	"Manage Slider";
		$this->load->view("admin-template/manage-slider", $data);
	}

	public function sliderform()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$editid = $this->uri->segment(3);
		if (isset($editid)) {
			$data['title'] = "Edit Slider";
			$sliderdata = $this->adminmodel->productlist($editid, "id", "tbl_slider");
			if ($sliderdata) {
				$data["sliderdata"]	=	$sliderdata;
			} else {
				redirect("administrator/manageslider");
			}
		} else {
			$data['title'] = "Add Slider";
		}
		$this->load->view("admin-template/add-slider", $data);
	}

	public function addslider()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add Slider";
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		if ($this->form_validation->run("slidervalidation") == FALSE) {
			$this->load->view("admin-template/add-slider", $data);
		} else {

			$removeimage = $this->input->post('removeimage');

			if (read_file('./assest/uploadfile/sliders/' . $removeimage) && $removeimage != '') {
				unlink('./assest/uploadfile/sliders/' . $removeimage);
			}

			$saveImg = "";
			$newName =	rand(1, date("Ymd")) . $_FILES['sliderimage']['name'];
			$config = array(
				'upload_path'		=>	 './assest/uploadfile/sliders/',
				'allowed_types'		=>	 "gif|jpg|png|jpeg",
				'file_name'			=>	 $newName,
				//'encrypt_name'		=>	 TRUE,
				'remove_spaces'		=>   TRUE,
			);

			if ($_FILES['sliderimage']['name'] != '') {
				$this->load->library("upload", $config);

				if (!$this->upload->do_upload("sliderimage")) {

					$data['uploaderror'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					$this->load->view("admin-template/add-slider", $data);
				} else {
					$uploaded = $this->upload->data();
					$saveImg = $uploaded['file_name'];
				}
			} else {
				$saveImg = $_POST['oldimage'];
			}
			$_POST['sliderimage'] = $saveImg;

			if ($this->adminmodel->addslider($_POST)) {
				$this->session->set_flashdata("deleteslider", "Your slider addedd successfully!");
				$this->session->set_flashdata("deleteclass", "alert-success");
				redirect("administrator/manageslider", $data);
			} else {
				$this->session->set_flashdata("deleteslider", "Sorry something went wrong!");
				$this->session->set_flashdata("deleteclass", "alert-danger");
				redirect("administrator/manageslider");
			}
		}
	}





	public function editslider()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$editid = $this->uri->segment(3);

		$sliderdata = $this->adminmodel->productlist($editid, "id", "tbl_slider");
		if ($sliderdata) {
			$data["sliderdata"]	=	$sliderdata;
		}


		$data['title'] = "Edit Slider";
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		if ($this->form_validation->run("slidervalidation") == FALSE) {
			$this->load->view("admin-template/add-slider", $data);
		} else {

			$removeimage = $this->input->post('removeimage');

			if (read_file('./assest/uploadfile/sliders/' . $removeimage) && $removeimage != '') {
				unlink('./assest/uploadfile/sliders/' . $removeimage);
			}

			$saveImg = "";
			$newName =	rand(1, date("Ymd")) . $_FILES['sliderimage']['name'];
			$config = array(
				'upload_path'		=>	 './assest/uploadfile/sliders/',
				'allowed_types'		=>	 "gif|jpg|png|jpeg",
				'file_name'			=>	 $newName,
				//'encrypt_name'		=>	 TRUE,
				'remove_spaces'		=>   TRUE,
			);

			if ($_FILES['sliderimage']['name'] != '') {
				$this->load->library("upload", $config);

				if (!$this->upload->do_upload("sliderimage")) {
					$data['uploaderror'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					$this->load->view("admin-template/add-slider", $data);
				} else {
					if (read_file('./assest/uploadfile/sliders/' . $_POST['oldimage']) && $_POST['oldimage'] != '') {
						unlink('./assest/uploadfile/sliders/' . $_POST['oldimage']);
					}

					$uploaded = $this->upload->data();
					$saveImg = $uploaded['file_name'];
				}
			} else {
				$saveImg = $_POST['oldimage'];
			}
			$_POST['sliderimage'] = $saveImg;

			if ($this->adminmodel->editslider($editid, $_POST)) {
				$this->session->set_flashdata("deleteslider", "Your slider has been updated!");
				$this->session->set_flashdata("deleteclass", "alert-success");
				redirect("administrator/manageslider");
			} else {
				$this->session->set_flashdata("deleteslider", "Sorry something went wrong try again!");
				$this->session->set_flashdata("deleteclass", "alert-danger");
				redirect("administrator/manageslider");
			}
		}
	}


	public function deleteproduct($id, $column, $table, $deleteimage, $method)
	{


		if ($this->adminmodel->deleteproduct($id, $column, $table)) {
			//'./assest/uploadfile/sliders/'.
			$file = read_file("./" . str_replace('-', '/', $deleteimage));
			if ($file) {
				unlink('./' . str_replace('-', '/', $deleteimage));
			}
			$this->session->set_flashdata("deleteslider", "Item has been removed");
			$this->session->set_flashdata("deleteclass", "alert-success");
		} else {
			$this->session->set_flashdata("deleteslider", "Your delete request has been failed please try again!");
			$this->session->set_flashdata("deleteclass", "alert-danger");
		}

		redirect("administrator/" . $method);
	}

	public function productstatus($id, $column, $table, $status, $method)
	{

		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}

		if ($this->adminmodel->productstatus($id, $column, $table, $status)) {
			$this->session->set_flashdata("deleteslider", "Status has been updated");
			$this->session->set_flashdata("deleteclass", "alert-success");
		} else {
			$this->session->set_flashdata("deleteslider", "Sorry something went wrong try again!");
			$this->session->set_flashdata("deleteclass", "alert-danger");
		}
		redirect("administrator/" . $method);
	}


	public function manageservices()
	{

		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['servicelist'] =	$this->adminmodel->productlist(0, 'id', 'tbl_services');
		$data['title'] = "Manage Services";
		$this->load->view("admin-template/manage-services", $data);
	}

	public function serviceform()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add Services";
		$editid = $this->uri->segment(3);

		$data['servicedata']	=	$this->adminmodel->productlist($editid, 'id', 'tbl_services');
		$this->load->view("admin-template/add-services", $data);
	}

	public function addservices()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add Services";
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run("servicevalidation") == FALSE) {
			$this->load->view("admin-template/add-services", $data);
		} else {

			$removeimage = $this->input->post('removeimage');

			if (read_file('./assest/uploadfile/webimages/' . $removeimage) && $removeimage != '') {
				unlink('./assest/uploadfile/webimages/' . $removeimage);
			}

			$saveImg = "";
			$newName =	rand(1, date("Ymd")) . $_FILES['serviceimage']['name'];
			$config = array(
				'upload_path'		=>	 './assest/uploadfile/webimages/',
				'allowed_types'		=>	 "gif|jpg|png|jpeg",
				'file_name'			=>	 $newName,
				//'encrypt_name'		=>	 TRUE,
				'remove_spaces'		=>   TRUE,
			);

			if ($_FILES['serviceimage']['name'] != '') {
				$this->load->library("upload", $config);

				if (!$this->upload->do_upload("serviceimage")) {
					$data['uploaderror'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					$this->load->view("admin-template/add-services", $data);
				} else {
					if (read_file('./assest/uploadfile/webimages/' . $_POST['oldimage']) && $_POST['oldimage'] != '') {
						unlink('./assest/uploadfile/webimages/' . $_POST['oldimage']);
					}
					$uploaded = $this->upload->data();
					$saveImg = $uploaded['file_name'];
				}
			} else {
				$saveImg = $_POST['oldimage'];
			}
			$_POST['serviceimage'] = $saveImg;

			if ($this->adminmodel->addservice($_POST)) {
				$this->session->set_flashdata("deleteslider", "Service has been updated or created");
				$this->session->set_flashdata("deleteclass", "alert-success");
				redirect("administrator/manageservices");
			}
		}
	}

	// manage technologies

	public function managetechnologies()
	{

		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['servicelist'] =	$this->adminmodel->productlist(0, 'id', 'tbl_technologies');
		$data['title'] = "Manage Technologies";
		$this->load->view("admin-template/manage-technologies", $data);
	}

	public function technologiesform()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add technologies";
		$editid = $this->uri->segment(3);

		$data['servicedata']	=	$this->adminmodel->productlist($editid, 'id', 'tbl_technologies');
		$this->load->view("admin-template/add-technologies", $data);
	}

	public function addtech()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add Services";
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run("servicevalidation") == FALSE) {
			$this->load->view("admin-template/add-technologies", $data);
		} else {

			$removeimage = $this->input->post('removeimage');

			if (read_file('./assest/uploadfile/webimages/' . $removeimage) && $removeimage != '') {
				unlink('./assest/uploadfile/webimages/' . $removeimage);
			}

			$saveImg = "";
			$newName =	rand(1, date("Ymd")) . $_FILES['serviceimage']['name'];
			$config = array(
				'upload_path'		=>	 './assest/uploadfile/webimages/',
				'allowed_types'		=>	 "gif|jpg|png|jpeg",
				'file_name'			=>	 $newName,
				//'encrypt_name'		=>	 TRUE,
				'remove_spaces'		=>   TRUE,
			);

			if ($_FILES['serviceimage']['name'] != '') {
				$this->load->library("upload", $config);

				if (!$this->upload->do_upload("serviceimage")) {
					$data['uploaderror'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					$this->load->view("admin-template/add-technologies", $data);
				} else {
					if (read_file('./assest/uploadfile/webimages/' . $_POST['oldimage']) && $_POST['oldimage'] != '') {
						unlink('./assest/uploadfile/webimages/' . $_POST['oldimage']);
					}
					$uploaded = $this->upload->data();
					$saveImg = $uploaded['file_name'];
				}
			} else {
				$saveImg = $_POST['oldimage'];
			}
			$_POST['serviceimage'] = $saveImg;

			if ($this->adminmodel->addtechnologies($_POST)) {
				$this->session->set_flashdata("deleteslider", "Service has been updated or created");
				$this->session->set_flashdata("deleteclass", "alert-success");
				redirect("administrator/managetechnologies");
			}
		}
	}


	public function managecoursecategory()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['servicelist'] =	$this->adminmodel->productlist(0, 'id', 'tbl_course_category', 'services_short');
		$data['title'] = "Manage Course Category";
		$this->load->view("admin-template/manage-coursecategory", $data);
	}

	public function manageblogcategory()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['servicelist'] =	$this->adminmodel->productlist(0, 'id', 'tbl_blog_category', 'services_short');
		$data['title'] = "Manage Course Category";
		$this->load->view("admin-template/manage-blogcategory", $data);
	}


	public function coursecatform()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add Course Category";
		$editid = $this->uri->segment(3);
		$data['servicedata']	=	$this->adminmodel->productlist($editid, 'id', 'tbl_course_category');
		$this->load->view("admin-template/add-course-category", $data);
	}
	public function blogcatform()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add blog Category";
		$editid = $this->uri->segment(3);
		$data['servicedata']	=	$this->adminmodel->productlist($editid, 'id', 'tbl_blog_category');
		$this->load->view("admin-template/add-blog-category", $data);
	}


	public function addcoursecat()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add Course Category";

		$removeimage = $this->input->post('removeimage');

		if (read_file('./assest/uploadfile/webimages/' . $removeimage) && $removeimage != '') {
			unlink('./assest/uploadfile/webimages/' . $removeimage);
		}

		$saveImg = "";
		$newName =	rand(1, date("Ymd")) . $_FILES['serviceimage']['name'];
		$config = array(
			'upload_path'		=>	 './assest/uploadfile/webimages/',
			'allowed_types'		=>	 "gif|jpg|png|jpeg",
			'file_name'			=>	 $newName,
			//'encrypt_name'		=>	 TRUE,
			'remove_spaces'		=>   TRUE,
		);

		if ($_FILES['serviceimage']['name'] != '') {
			$this->load->library("upload", $config);

			if (!$this->upload->do_upload("serviceimage")) {
				$data['uploaderror'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
				$this->load->view("admin-template/add-course-category", $data);
			} else {
				if (read_file('./assest/uploadfile/webimages/' . $_POST['oldimage']) && $_POST['oldimage'] != '') {
					unlink('./assest/uploadfile/webimages/' . $_POST['oldimage']);
				}
				$uploaded = $this->upload->data();
				$saveImg = $uploaded['file_name'];
			}
		} else {
			$saveImg = $_POST['oldimage'];
		}
		$_POST['workimage'] = $saveImg;

		if ($this->adminmodel->addcoursecat($_POST)) {
			$this->session->set_flashdata("deleteslider", "Category successfully changed or create!");
			$this->session->set_flashdata("deleteclass", "alert-success");
			redirect("administrator/managecoursecategory");
		} else {
			$this->session->set_flashdata("deleteslider", "This category already registred!");
			$this->session->set_flashdata("deleteclass", "alert-danger");
			$this->load->view("admin-template/add-course-category", $data);
		}
	}



	public function managecourse()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['pagelist'] =	$this->adminmodel->productlist(0, 'id', 'tbl_pages', 'page_short');
		$data['catlist'] =	$this->adminmodel->productlist(0, 'id', 'tbl_course_category', 'services_short');
		$data['title'] = "Manage Services";
		$this->load->view("admin-template/manage-course", $data);
	}

	public function courseform()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add Course";
		$editid = $this->uri->segment(3);
		$data['servicedata'] = $this->adminmodel->productlist($editid, 'id', 'tbl_pages');
		$data['servicelist'] = $this->adminmodel->productlist('0', 'id', 'tbl_course_category');
		$this->load->view("admin-template/add-course", $data);
	}

	public function addcourse()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add Course";
		$data['servicelist']	=	$this->adminmodel->productlist('0', 'id', 'tbl_course_category');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run("servicevalidation") == FALSE) {
			$this->load->view("admin-template/add-course", $data);
		} else {

			$removeimage = $this->input->post('removeimage');

			if (read_file('./assest/uploadfile/webimages/' . $removeimage) && $removeimage != '') {
				unlink('./assest/uploadfile/webimages/' . $removeimage);
			}

			$saveImg = "";
			$newName =	rand(1, date("Ymd")) . $_FILES['serviceimage']['name'];
			$config = array(
				'upload_path'		=>	 './assest/uploadfile/webimages/',
				'allowed_types'		=>	 "gif|jpg|png|jpeg",
				'file_name'			=>	 $newName,
				//'encrypt_name'		=>	 TRUE,
				'remove_spaces'		=>   TRUE,
			);

			if ($_FILES['serviceimage']['name'] != '') {
				$this->load->library("upload", $config);

				if (!$this->upload->do_upload("serviceimage")) {
					$data['uploaderror'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					$this->load->view("admin-template/add-services", $data);
				} else {
					if (read_file('./assest/uploadfile/webimages/' . $_POST['oldimage']) && $_POST['oldimage'] != '') {
						unlink('./assest/uploadfile/webimages/' . $_POST['oldimage']);
					}
					$uploaded = $this->upload->data();
					$saveImg = $uploaded['file_name'];
				}
			} else {
				$saveImg = $_POST['oldimage'];
			}
			$_POST['serviceimage'] = $saveImg;

			if ($this->adminmodel->addcourse($_POST)) {
				$this->session->set_flashdata("deleteslider", "Service has been updated or created");
				$this->session->set_flashdata("deleteclass", "alert-success");
				redirect("administrator/managecourse");
			}
		}
	}



	public function manageblog()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['pagelist'] =	$this->adminmodel->productlist(0, 'id', 'tbl_blog', 'page_short');
		$data['catlist'] =	$this->adminmodel->productlist(0, 'id', 'tbl_blog_category', 'services_short');
		$data['title'] = "Manage Blog";
		$this->load->view("admin-template/manage-blog", $data);
	}

	public function blogform()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add blog";
		$editid = $this->uri->segment(3);
		$data['servicedata'] = $this->adminmodel->productlist($editid, 'id', 'tbl_blog');
		$data['servicelist'] = $this->adminmodel->productlist('0', 'id', 'tbl_blog_category');
		$this->load->view("admin-template/add-blog", $data);
	}
	


	public function addblog()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add blog";
		$data['servicelist']	=	$this->adminmodel->productlist('0', 'id', 'tbl_blog_category');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run("servicevalidation") == FALSE) {
			$this->load->view("admin-template/add-blog", $data);
		} else {

			$removeimage = $this->input->post('removeimage');

			if (read_file('./assest/uploadfile/blogimages/' . $removeimage) && $removeimage != '') {
				unlink('./assest/uploadfile/blogimages/' . $removeimage);
			}

			$saveImg = "";
			$newName =	rand(1, date("Ymd")) . $_FILES['serviceimage']['name'];
			$config = array(
				'upload_path'		=>	 './assest/uploadfile/blogimages/',
				'allowed_types'		=>	 "gif|jpg|png|jpeg",
				'file_name'			=>	 $newName,
				//'encrypt_name'		=>	 TRUE,
				'remove_spaces'		=>   TRUE,
			);

			if ($_FILES['serviceimage']['name'] != '') {
				$this->load->library("upload", $config);

				if (!$this->upload->do_upload("serviceimage")) {
					$data['uploaderror'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					$this->load->view("admin-template/add-blog", $data);
				} else {
					if (read_file('./assest/uploadfile/blogimages/' . $_POST['oldimage']) && $_POST['oldimage'] != '') {
						unlink('./assest/uploadfile/blogimages/' . $_POST['oldimage']);
					}
					$uploaded = $this->upload->data();
					$saveImg = $uploaded['file_name'];
				}
			} else {
				$saveImg = $_POST['oldimage'];
			}
			$_POST['serviceimage'] = $saveImg;

			if ($this->adminmodel->addblog($_POST)) {
				$this->session->set_flashdata("deleteslider", "Service has been updated or created");
				$this->session->set_flashdata("deleteclass", "alert-success");
				redirect("administrator/manageblog");
			}
		}
	}
	
	public function managenews()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['pagelist'] =	$this->adminmodel->productlist(0, 'id', 'tbl_news', 'page_short');
		$data['catlist'] =	$this->adminmodel->productlist(0, 'id', 'tbl_news_category', 'services_short');
		$data['title'] = "Manage Blog";
		$this->load->view("admin-template/manage-news", $data);
	}
	
		public function newsform()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add Blog";
		$editid = $this->uri->segment(3);
		$data['servicedata'] = $this->adminmodel->productlist($editid, 'id', 'tbl_news');
		$data['servicelist'] = $this->adminmodel->productlist('0', 'id', 'tbl_news_category');
		$this->load->view("admin-template/add-news", $data);
	}

	public function addnews()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add News";
		$data['servicelist']	=	$this->adminmodel->productlist('0', 'id', 'tbl_news_category');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run("servicevalidation") == FALSE) {
			$this->load->view("admin-template/add-news", $data);
		} else {

			$removeimage = $this->input->post('removeimage');

			if (read_file('./assest/uploadfile/newsimages/' . $removeimage) && $removeimage != '') {
				unlink('./assest/uploadfile/newsimages/' . $removeimage);
			}

			$saveImg = "";
			$newName =	rand(1, date("Ymd")) . $_FILES['serviceimage']['name'];
			$config = array(
				'upload_path'		=>	 './assest/uploadfile/newsimages/',
				'allowed_types'		=>	 "gif|jpg|png|jpeg",
				'file_name'			=>	 $newName,
				//'encrypt_name'		=>	 TRUE,
				'remove_spaces'		=>   TRUE,
			);

			if ($_FILES['serviceimage']['name'] != '') {
				$this->load->library("upload", $config);

				if (!$this->upload->do_upload("serviceimage")) {
					$data['uploaderror'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					$this->load->view("admin-template/add-news", $data);
				} else {
					if (read_file('./assest/uploadfile/newsimages/' . $_POST['oldimage']) && $_POST['oldimage'] != '') {
						unlink('./assest/uploadfile/newsimages/' . $_POST['oldimage']);
					}
					$uploaded = $this->upload->data();
					$saveImg = $uploaded['file_name'];
				}
			} else {
				$saveImg = $_POST['oldimage'];
			}
			$_POST['serviceimage'] = $saveImg;

			if ($this->adminmodel->addnews($_POST)) {
				$this->session->set_flashdata("deleteslider", "Service has been updated or created");
				$this->session->set_flashdata("deleteclass", "alert-success");
				redirect("administrator/managenews");
			}
		}
	}
	
	
		public function managearticle()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['pagelist'] =	$this->adminmodel->productlist(0, 'id', 'tbl_article', 'page_short');
		$data['catlist'] =	$this->adminmodel->productlist(0, 'id', 'tbl_article_category', 'services_short');
		$data['title'] = "Manage article";
		$this->load->view("admin-template/manage-article", $data);
	}
	
		public function articleform()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add Blog";
		$editid = $this->uri->segment(3);
		$data['servicedata'] = $this->adminmodel->productlist($editid, 'id', 'tbl_article');
		$data['servicelist'] = $this->adminmodel->productlist('0', 'id', 'tbl_article_category');
		$this->load->view("admin-template/add-article", $data);
	}

	public function addarticle()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add News";
		$data['servicelist']	=	$this->adminmodel->productlist('0', 'id', 'tbl_article_category');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run("servicevalidation") == FALSE) {
			$this->load->view("admin-template/add-article", $data);
		} else {

			$removeimage = $this->input->post('removeimage');

			if (read_file('./assest/uploadfile/articleimages/' . $removeimage) && $removeimage != '') {
				unlink('./assest/uploadfile/articleimages/' . $removeimage);
			}

			$saveImg = "";
			$newName =	rand(1, date("Ymd")) . $_FILES['serviceimage']['name'];
			$config = array(
				'upload_path'		=>	 './assest/uploadfile/articleimages/',
				'allowed_types'		=>	 "gif|jpg|png|jpeg",
				'file_name'			=>	 $newName,
				//'encrypt_name'		=>	 TRUE,
				'remove_spaces'		=>   TRUE,
			);

			if ($_FILES['serviceimage']['name'] != '') {
				$this->load->library("upload", $config);

				if (!$this->upload->do_upload("serviceimage")) {
					$data['uploaderror'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					$this->load->view("admin-template/add-article", $data);
				} else {
					if (read_file('./assest/uploadfile/articleimages/' . $_POST['oldimage']) && $_POST['oldimage'] != '') {
						unlink('./assest/uploadfile/articleimages/' . $_POST['oldimage']);
					}
					$uploaded = $this->upload->data();
					$saveImg = $uploaded['file_name'];
				}
			} else {
				$saveImg = $_POST['oldimage'];
			}
			$_POST['serviceimage'] = $saveImg;

			if ($this->adminmodel->addarticle($_POST)) {
				$this->session->set_flashdata("deleteslider", "article has been updated or created");
				$this->session->set_flashdata("deleteclass", "alert-success");
				redirect("administrator/managearticle");
			}
		}
	}
	

	public function manageworkcategory()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}

		$data['servicelist'] =	$this->adminmodel->productlist(0, 'id', 'tbl_work_category', 'services_short');
		$data['title'] = "Manage Work Category";
		$this->load->view("admin-template/manage-workcategory", $data);
	}


	public function workcatform()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add Work Category";
		$editid = $this->uri->segment(3);

		$data['servicedata']	=	$this->adminmodel->productlist($editid, 'id', 'tbl_work_category');
		$this->load->view("admin-template/add-work-category", $data);
	}



	public function addworkcat()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add Work Category";

		if ($this->adminmodel->addworkcat($_POST)) {
			$this->session->set_flashdata("deleteslider", "Category successfully changed or create!");
			$this->session->set_flashdata("deleteclass", "alert-success");
			redirect("administrator/manageworkcategory");
		} else {
			$this->session->set_flashdata("deleteslider", "This category already registred!");
			$this->session->set_flashdata("deleteclass", "alert-danger");
			$this->load->view("admin-template/add-work-category", $data);
		}
	}


	public function manageworks()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['pagelist'] =	$this->adminmodel->productlist(0, 'id', 'tbl_work');
		$data['title'] = "Manage Works";
		$this->load->view("admin-template/manage-works", $data);
	}


	public function manageofficework()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['pagelist'] =	$this->adminmodel->productlist(0, 'id', 'tbl_office_work');
		$data['title'] = "Office Works";
		$this->load->view("admin-template/manage-officeworks", $data);
	}

	public function officeworksform()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add Office Work";
		$editid = $this->uri->segment(3);

		$data['workdata']	=	$this->adminmodel->productlist($editid, 'id', 'tbl_office_work');
		$this->load->view("admin-template/add-officework", $data);
	}

	public function addofficeworks()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add Office work";

		$removeimage = $this->input->post('removeimage');

		if (read_file('./assest/uploadfile/webimages/' . $removeimage) && $removeimage != '') {
			unlink('./assest/uploadfile/webimages/' . $removeimage);
		}

		$saveImg = "";
		$newName =	rand(1, date("Ymd")) . $_FILES['serviceimage']['name'];
		$config = array(
			'upload_path'		=>	 './assest/uploadfile/webimages/',
			'allowed_types'		=>	 "gif|jpg|png|jpeg",
			'file_name'			=>	 $newName,
			//'encrypt_name'		=>	 TRUE,
			'remove_spaces'		=>   TRUE,
		);

		if ($_FILES['serviceimage']['name'] != '') {
			$this->load->library("upload", $config);

			if (!$this->upload->do_upload("serviceimage")) {
				$data['uploaderror'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
				$this->load->view("admin-template/add-officework", $data);
			} else {
				if (read_file('./assest/uploadfile/webimages/' . $_POST['oldimage']) && $_POST['oldimage'] != '') {
					unlink('./assest/uploadfile/webimages/' . $_POST['oldimage']);
				}
				$uploaded = $this->upload->data();
				$saveImg = $uploaded['file_name'];
			}
		} else {
			$saveImg = $_POST['oldimage'];
		}
		$_POST['workimage'] = $saveImg;

		if ($this->adminmodel->addofficework($_POST)) {
			$this->session->set_flashdata("deleteslider", "Work has been updated or created");
			$this->session->set_flashdata("deleteclass", "alert-success");
			redirect("administrator/manageofficework");
		}
	}



	public function worksform()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add Work";
		$editid = $this->uri->segment(3);
		//productlist('0', 'id', ' tbl_work_category');
		$data['workdata']	=	$this->adminmodel->productlist($editid, 'id', 'tbl_work');
		$data['worklist']	=	$this->adminmodel->getloopdata(1, "work", "tbl_work_category", 'services_short');
		$this->load->view("admin-template/add-work", $data);
	}

	public function addworks()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add work";
		$data['worklist'] = $this->adminmodel->getloopdata(1, "work", "tbl_work_category", 'services_short');
		$removeimage = $this->input->post('removeimage');
		if (read_file('./assest/uploadfile/webimages/' . $removeimage) && $removeimage != '') {
			unlink('./assest/uploadfile/webimages/' . $removeimage);
		}

		$saveImg = "";
		$newName =	rand(1, date("Ymd")) . $_FILES['serviceimage']['name'];
		$config = array(
			'upload_path'		=>	 './assest/uploadfile/webimages/',
			'allowed_types'		=>	 "gif|jpg|png|jpeg",
			'file_name'			=>	 $newName,
			//'encrypt_name'		=>	 TRUE,
			'remove_spaces'		=>   TRUE,
		);

		if ($_FILES['serviceimage']['name'] != '') {
			$this->load->library("upload", $config);

			if (!$this->upload->do_upload("serviceimage")) {
				$data['uploaderror'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
				$this->load->view("admin-template/add-work", $data);
			} else {
				if (read_file('./assest/uploadfile/webimages/' . $_POST['oldimage']) && $_POST['oldimage'] != '') {
					unlink('./assest/uploadfile/webimages/' . $_POST['oldimage']);
				}
				$uploaded = $this->upload->data();
				$saveImg = $uploaded['file_name'];
			}
		} else {
			$saveImg = $_POST['oldimage'];
		}
		$_POST['workimage'] = $saveImg;

		if ($this->adminmodel->addwork($_POST)) {
			$this->session->set_flashdata("deleteslider", "Work has been updated or created");
			$this->session->set_flashdata("deleteclass", "alert-success");
			redirect("administrator/manageworks");
		}
	}

	public function manageteam()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['pagelist'] =	$this->adminmodel->productlist(0, 'id', 'tbl_team');
		$data['title'] = "Manage Team";
		$this->load->view("admin-template/manage-team", $data);
	}

	public function manageLead()
	{
		$data['enquery'] =	$this->adminmodel->getEnquery();
		$data['title'] = "Manage Enquery | Gmac Animation";
		$this->load->view("admin-template/manage-lead", $data);
	}

	public function teamform()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add Work";
		$editid = $this->uri->segment(3);
		$data['workdata'] = $this->adminmodel->productlist($editid, 'id', 'tbl_team');
		$this->load->view("admin-template/add-team", $data);
	}

	public function addteam()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add Team";
		$removeimage = $this->input->post('removeimage');
		if (read_file('./assest/uploadfile/webimages/' . $removeimage) && $removeimage != '') {
			unlink('./assest/uploadfile/webimages/' . $removeimage);
		}
		$saveImg = "";
		$newName =	rand(1, date("Ymd")) . $_FILES['serviceimage']['name'];
		$config = array(
			'upload_path'	=> './assest/uploadfile/webimages/',
			'allowed_types'	=> "gif|jpg|png|jpeg",
			'file_name'		=> $newName,
			'remove_spaces'	=> TRUE,
		);

		if ($_FILES['serviceimage']['name'] != '') {
			$this->load->library("upload", $config);
			if (!$this->upload->do_upload("serviceimage")) {
				$data['uploaderror'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
				$this->load->view("admin-template/add-work", $data);
			} else {
				if (
					read_file('./assest/uploadfile/webimages/' . $_POST['oldimage'])
					&& $_POST['oldimage'] != ''
				) {
					unlink('./assest/uploadfile/webimages/' . $_POST['oldimage']);
				}
				$uploaded = $this->upload->data();
				$saveImg = $uploaded['file_name'];
			}
		} else {
			$saveImg = str_replace(' ', '', $_POST['oldimage']);
		}
		$_POST['workimage'] = $saveImg;
		if ($this->adminmodel->addteam($_POST)) {
			$this->session->set_flashdata("deleteslider", "Team has been updated or created");
			$this->session->set_flashdata("deleteclass", "alert-success");
			redirect("administrator/manageteam");
		}
	}

	public function managetutorial()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['pagelist'] =	$this->adminmodel->productlist(0, 'id', 'tbl_tutorial');
		$data['title'] = "Manage Works";
		$this->load->view("admin-template/manage-tutorial", $data);
	}

	public function tutorialform()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add Work";
		$editid = $this->uri->segment(3);
		$data['workdata'] =	$this->adminmodel->productlist($editid, 'id', 'tbl_tutorial');
		$data['worklist'] =	$this->adminmodel->getloopdata(1, "tutorial", "tbl_work_category", 'services_short');
		$this->load->view("admin-template/add-tutorial", $data);
	}

	public function addtutorial()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add Tutorial";
		$data['worklist'] = $this->adminmodel->getloopdata(1, "tutorial", "tbl_work_category", 'services_short');
		if ($this->adminmodel->addtutorial($_POST)) {
			$this->session->set_flashdata("deleteslider", "Work has been updated or created");
			$this->session->set_flashdata("deleteclass", "alert-success");
			redirect("administrator/managetutorial");
		}
	}

	public function managetestimonial()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['pagelist'] =	$this->adminmodel->productlist(0, 'id', 'tbl_testimonial');
		$data['title'] = "Manage Testimonial";
		$this->load->view("admin-template/manage-testimonial", $data);
	}

	public function testimonialform()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add Testimonial";
		$editid = $this->uri->segment(3);
		$data['workdata'] = $this->adminmodel->productlist($editid, 'id', 'tbl_testimonial');
		$this->load->view("admin-template/add-testimonial", $data);
	}

	public function addtestimonial()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add Testimonial";
		$removeimage = $this->input->post('removeimage');

		if (read_file('./assest/uploadfile/testimonial/' . $removeimage) && $removeimage != '') {
			unlink('./assest/uploadfile/testimonial/' . $removeimage);
		}

		$saveImg = "";
		$newName =	rand(1, date("Ymd")) . $_FILES['image']['name'];
		$config = array(
			'upload_path'		=>	 './assest/uploadfile/testimonial/',
			'allowed_types'		=>	 "gif|jpg|png|jpeg",
			'file_name'			=>	 $newName,
			//'encrypt_name'		=>	 TRUE,
			'remove_spaces'		=>   TRUE,
		);

		if ($_FILES['image']['name'] != '') {
			$this->load->library("upload", $config);

			if (!$this->upload->do_upload("image")) {
				$data['uploaderror'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
				$this->load->view("admin-template/add-testimonial", $data);
			} else {
				if (read_file('./assest/uploadfile/testimonial/' . $_POST['oldimage']) && $_POST['oldimage'] != '') {
					unlink('./assest/uploadfile/testimonial/' . $_POST['oldimage']);
				}
				$uploaded = $this->upload->data();
				$saveImg = $uploaded['file_name'];
			}
		} else {
			$saveImg = $_POST['oldimage'];
		}
		$_POST['testimonialImage'] = $saveImg;
		if ($this->adminmodel->addtestimonial($_POST)) {
			$this->session->set_flashdata("deleteslider", "Work has been updated or created");
			$this->session->set_flashdata("deleteclass", "alert-success");
			redirect("administrator/managetestimonial");
		}
	}

	public function managefaq()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['pagelist'] =	$this->adminmodel->productlist(0, 'id', 'tbl_faq');
		$data['title'] = "Manage faq";
		$this->load->view("admin-template/manage-faq", $data);
	}

	public function faqform()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add faq";
		$editid = $this->uri->segment(3);
		$data['workdata'] = $this->adminmodel->productlist($editid, 'id', 'tbl_faq');
		$this->load->view("admin-template/add-faq", $data);
	}

	public function addfaq()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add faq";
		$removeimage = $this->input->post('removeimage');

		if (read_file('./assest/uploadfile/faq/' . $removeimage) && $removeimage != '') {
			unlink('./assest/uploadfile/faq/' . $removeimage);
		}

		$saveImg = "";
		$newName =	rand(1, date("Ymd")) . $_FILES['image']['name'];
		$config = array(
			'upload_path'		=>	 './assest/uploadfile/faq/',
			'allowed_types'		=>	 "gif|jpg|png|jpeg",
			'file_name'			=>	 $newName,
			//'encrypt_name'		=>	 TRUE,
			'remove_spaces'		=>   TRUE,
		);

		if ($_FILES['image']['name'] != '') {
			$this->load->library("upload", $config);

			if (!$this->upload->do_upload("image")) {
				$data['uploaderror'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
				$this->load->view("admin-template/add-faq", $data);
			} else {
				if (read_file('./assest/uploadfile/faq/' . $_POST['oldimage']) && $_POST['oldimage'] != '') {
					unlink('./assest/uploadfile/faq/' . $_POST['oldimage']);
				}
				$uploaded = $this->upload->data();
				$saveImg = $uploaded['file_name'];
			}
		} else {
			$saveImg = $_POST['oldimage'];
		}
		$_POST['testimonialImage'] = $saveImg;
		if ($this->adminmodel->addfaq($_POST)) {
			$this->session->set_flashdata("deleteslider", "Work has been updated or created");
			$this->session->set_flashdata("deleteclass", "alert-success");
			redirect("administrator/managefaq");
		}
	}

	public function managegeocode()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		$data['title'] = "Add GEO Code";
		$editid = $this->uri->segment(3);
		if ($this->input->post('metacontent')) {
			$updateGEO = $this->adminmodel->updategeocode($this->input->post());
			if ($updateGEO) {
				$this->session->set_flashdata('class', 'alert-success');
				$this->session->set_flashdata('msg', 'Your meta has been updated!');
			} else {
				$this->set_flashdata('class', 'alert-danger');
				$this->set_flashdata('msg', 'Sorry something went wrong!');
			}
			redirect('administrator/managegeocode');
		}
		$data['geodata'] = $this->adminmodel->productlist(1, 'id', 'tbl_geocode');
		$this->load->view("admin-template/manage-geocode", $data);
	}

	public function manageseo()
	{
		$data['seolist'] = $this->adminmodel->productlist(0, 'id', 'tbl_seo_url');
		$data['title'] = "Manage SEO";
		$this->load->view("admin-template/manage-seo", $data);
	}

	public function seoform()
	{
		$data['title'] = "Add Work";
		$editid = $this->uri->segment(3);
		$data['workdata'] = $this->adminmodel->productlist($editid, 'id', 'tbl_seo_url');
		$this->load->view("admin-template/add-seo", $data);
	}

	public function addseo()
	{
		$data['title'] = "Add SEO";
		$editid = $this->uri->segment(3);
		$data['workdata'] = $this->adminmodel->productlist($editid, 'id', 'tbl_seo_url');
		if (!$this->form_validation->run('seoupdate')) {
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			$this->load->view("admin-template/add-seo", $data);
		} else {
			if ($this->adminmodel->addseo($_POST)) {
				$this->session->set_flashdata("deleteslider", "SEO successfully updated!");
				$this->session->set_flashdata("deleteclass", "alert-success");
				redirect("administrator/manageseo");
			} else {
				$this->session->set_flashdata("deleteslider", "This url already registred!");
				$this->session->set_flashdata("deleteclass", "alert-danger");
				$this->load->view("admin-template/add-seo", $data);
			}
		}
	}

	public function adminlogout()
	{
		$this->session->unset_userdata("user_id");
		return redirect("adminlogin");
	}
}
