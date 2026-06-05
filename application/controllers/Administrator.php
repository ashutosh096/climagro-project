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

	public function managesubscribers()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}

		$this->load->library('pagination');
		$this->load->model('Subscribermodel');

		// Pagination Config
		$config = array();
		$config["base_url"] = base_url() . "administrator/managesubscribers";
		$config["total_rows"] = $this->db->count_all("subscribers");
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;

		// Styling for Pagination (Dark Theme Compatible)
		$config['full_tag_open'] = '<div class="pagination-wrapper"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '<i class="fas fa-chevron-left"></i>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '<i class="fas fa-chevron-right"></i>';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		// Fetch Data (Newest First)
		$this->db->order_by('id', 'DESC');
		$this->db->limit($config["per_page"], $page);
		$data['subscribers'] = $this->db->get('subscribers')->result();
		
		$data['links'] = $this->pagination->create_links();
		$data['total_count'] = $config["total_rows"];
		$data['offset'] = $page; // To calculate SR No correctly across pages

		$data['title'] = "Manage Email Subscribers";
		$this->load->view("admin-template/manage-subscribers", $data);
	}

	public function exportsubscribers()
	{
		// Get all subscribers
		$this->load->model('Subscribermodel');
		$subscribers = $this->db->get('subscribers')->result_array();
		
		// Set headers for Excel download
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="email_subscribers_' . date('Y-m-d_H-i-s') . '.xls"');
		header('Pragma: no-cache');
		header('Expires: 0');
		
		// Output Excel content
		echo '<table border="1">';
		echo '<thead>';
		echo '<tr>';
		echo '<th style="background-color: #025B5F; color: white; font-weight: bold; padding: 10px;">Sr. No.</th>';
		echo '<th style="background-color: #025B5F; color: white; font-weight: bold; padding: 10px;">Email Address</th>';
		echo '<th style="background-color: #025B5F; color: white; font-weight: bold; padding: 10px;">Subscribed Date</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		
		if (!empty($subscribers)) {
			$sr = 1;
			foreach ($subscribers as $subscriber) {
				echo '<tr>';
				echo '<td style="padding: 8px;">' . $sr++ . '</td>';
				echo '<td style="padding: 8px;">' . htmlspecialchars($subscriber['email']) . '</td>';
				echo '<td style="padding: 8px;">' . (isset($subscriber['created_at']) ? $subscriber['created_at'] : 'N/A') . '</td>';
				echo '</tr>';
			}
		} else {
			echo '<tr><td colspan="3" style="text-align: center; padding: 20px;">No subscribers found</td></tr>';
		}
		
		echo '</tbody>';
		echo '</table>';
		exit;
	}

	public function managecontacts()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		
		$data['contacts'] = $this->db->where('subject !=', 'Report Gateway Download')->order_by('created_at', 'DESC')->get('contact_form')->result();
		$data['total_count'] = count($data['contacts']);
		$data['title'] = "Manage Contact Form Submissions";
		$this->load->view("admin-template/manage-contacts", $data);
	}

	public function exportcontacts()
	{
		$contacts = $this->db->where('subject !=', 'Report Gateway Download')->order_by('created_at', 'DESC')->get('contact_form')->result_array();
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="contact_submissions_' . date('Y-m-d_H-i-s') . '.xls"');
		header('Pragma: no-cache');
		header('Expires: 0');
		
		echo '<table border="1">';
		echo '<thead>';
		echo '<tr>';
		echo '<th style="background-color: #025B5F; color: white; font-weight: bold; padding: 10px;">Sr. No.</th>';
		echo '<th style="background-color: #025B5F; color: white; font-weight: bold; padding: 10px;">Name</th>';
		echo '<th style="background-color: #025B5F; color: white; font-weight: bold; padding: 10px;">Email</th>';
		echo '<th style="background-color: #025B5F; color: white; font-weight: bold; padding: 10px;">Phone</th>';
		echo '<th style="background-color: #025B5F; color: white; font-weight: bold; padding: 10px;">Title</th>';
		echo '<th style="background-color: #025B5F; color: white; font-weight: bold; padding: 10px;">Interest</th>';
		echo '<th style="background-color: #025B5F; color: white; font-weight: bold; padding: 10px;">Message</th>';
		echo '<th style="background-color: #025B5F; color: white; font-weight: bold; padding: 10px;">Submitted On</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		
		if (!empty($contacts)) {
			$sr = 1;
			foreach ($contacts as $contact) {
				echo '<tr>';
				echo '<td style="padding: 8px;">' . $sr++ . '</td>';
				echo '<td style="padding: 8px;">' . htmlspecialchars($contact['name'] ?? '') . '</td>';
				echo '<td style="padding: 8px;">' . htmlspecialchars($contact['email'] ?? '') . '</td>';
				echo '<td style="padding: 8px;">' . htmlspecialchars($contact['phone'] ?? '') . '</td>';
				echo '<td style="padding: 8px;">' . htmlspecialchars($contact['title'] ?? '') . '</td>';
				echo '<td style="padding: 8px;">' . htmlspecialchars($contact['interested'] ?? '') . '</td>';
				echo '<td style="padding: 8px;">' . htmlspecialchars($contact['message'] ?? '') . '</td>';
				echo '<td style="padding: 8px;">' . htmlspecialchars($contact['created'] ?? '') . '</td>';
				echo '</tr>';
			}
		} else {
			echo '<tr><td colspan="8" style="text-align: center; padding: 20px;">No contact submissions found</td></tr>';
		}
		
		echo '</tbody>';
		echo '</table>';
		exit;
	}

	public function managereportdownloads()
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}
		
		$data['contacts'] = $this->db->where('subject', 'Report Gateway Download')->order_by('created_at', 'DESC')->get('contact_form')->result();
		$data['total_count'] = count($data['contacts']);
		$data['title'] = "Manage Report Downloads";
		$this->load->view("admin-template/manage-reportdownloads", $data);
	}

	public function exportreportdownloads()
	{
		$contacts = $this->db->where('subject', 'Report Gateway Download')->order_by('created_at', 'DESC')->get('contact_form')->result_array();
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="report_downloads_' . date('Y-m-d_H-i-s') . '.xls"');
		header('Pragma: no-cache');
		header('Expires: 0');
		
		echo '<table border="1">';
		echo '<thead>';
		echo '<tr>';
		echo '<th style="background-color: #025B5F; color: white; font-weight: bold; padding: 10px;">Sr. No.</th>';
		echo '<th style="background-color: #025B5F; color: white; font-weight: bold; padding: 10px;">Name</th>';
		echo '<th style="background-color: #025B5F; color: white; font-weight: bold; padding: 10px;">Email</th>';
		echo '<th style="background-color: #025B5F; color: white; font-weight: bold; padding: 10px;">Phone</th>';
		echo '<th style="background-color: #025B5F; color: white; font-weight: bold; padding: 10px;">Title</th>';
		echo '<th style="background-color: #025B5F; color: white; font-weight: bold; padding: 10px;">Interest</th>';
		echo '<th style="background-color: #025B5F; color: white; font-weight: bold; padding: 10px;">Message</th>';
		echo '<th style="background-color: #025B5F; color: white; font-weight: bold; padding: 10px;">Submitted On</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		
		if (!empty($contacts)) {
			$sr = 1;
			foreach ($contacts as $contact) {
				echo '<tr>';
				echo '<td style="padding: 8px;">' . $sr++ . '</td>';
				echo '<td style="padding: 8px;">' . htmlspecialchars($contact['name'] ?? '') . '</td>';
				echo '<td style="padding: 8px;">' . htmlspecialchars($contact['email'] ?? '') . '</td>';
				echo '<td style="padding: 8px;">' . htmlspecialchars($contact['phone'] ?? '') . '</td>';
				echo '<td style="padding: 8px;">' . htmlspecialchars($contact['title'] ?? '') . '</td>';
				echo '<td style="padding: 8px;">' . htmlspecialchars($contact['interested'] ?? '') . '</td>';
				echo '<td style="padding: 8px;">' . htmlspecialchars($contact['message'] ?? '') . '</td>';
				echo '<td style="padding: 8px;">' . htmlspecialchars($contact['created'] ?? '') . '</td>';
				echo '</tr>';
			}
		} else {
			echo '<tr><td colspan="8" style="text-align: center; padding: 20px;">No report downloads found</td></tr>';
		}
		
		echo '</tbody>';
		echo '</table>';
		exit;
	}

	public function adminlogout()
	{
		$this->session->unset_userdata("user_id");
		return redirect("adminlogin");
	}

	public function manageclimintellio(): void
	{
		if ($this->usertype == 'seo') {
			redirect('administrator/manageseo');
		}

		// Fetch all requests
		$data['requests'] = $this->db->order_by('id', 'DESC')->get('tbl_climintellio_requests')->result();
		$data['title'] = "Manage Climintellio Requests";
		$this->load->view("admin-template/manage-climintellio", $data);
	}

	public function delete_climintellio(string $id): void
	{
		if ($this->adminmodel->delete_climintellio_request($id)) {
			$this->session->set_flashdata("deleteslider", "Request deleted successfully");
			$this->session->set_flashdata("deleteclass", "alert-success");
		} else {
			$this->session->set_flashdata("deleteslider", "Failed to delete request");
			$this->session->set_flashdata("deleteclass", "alert-danger");
		}
		redirect("administrator/manageclimintellio");
	}
	public function setup_climintellio_db()
	{
		$sql = "CREATE TABLE IF NOT EXISTS tbl_climintellio_requests (
			id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			request_type VARCHAR(100) DEFAULT NULL,
			location_method VARCHAR(100) DEFAULT NULL,
			hazards TEXT DEFAULT NULL,
			admin_level VARCHAR(100) DEFAULT NULL,
			country VARCHAR(100) DEFAULT 'India',
			states TEXT DEFAULT NULL,
			districts TEXT DEFAULT NULL,
			variables TEXT DEFAULT NULL,
			metrics TEXT DEFAULT NULL,
			coverage_type VARCHAR(100) DEFAULT NULL,
			hist_year_start INT(5) DEFAULT NULL,
			hist_year_end INT(5) DEFAULT NULL,
			future_year_start INT(5) DEFAULT NULL,
			future_year_end INT(5) DEFAULT NULL,
			scenarios TEXT DEFAULT NULL,
			format VARCHAR(50) DEFAULT NULL,
			user_name VARCHAR(255) DEFAULT NULL,
			user_email VARCHAR(255) DEFAULT NULL,
			user_org_type VARCHAR(100) DEFAULT NULL,
			submitted_at DATETIME DEFAULT CURRENT_TIMESTAMP
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

		if ($this->db->query($sql)) {
			echo "<h1>Success</h1><p>Table 'tbl_climintellio_requests' created/verified successfully.</p>";
			echo "<p><a href='".base_url('administrator/dashboard')."'>Go to Dashboard</a></p>";
		} else {
			echo "<h1>Error</h1><p>Could not create table.</p>";
			echo "<pre>"; print_r($this->db->error()); echo "</pre>";
		}
	}
}
