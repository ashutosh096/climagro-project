<?php

class Adminmodel extends CI_Model
{
	public function loginadmin($username, $password)
	{
		$breakpass = md5($password);
		$q = $this->db->where(array('email' => $username, 'password' => $breakpass))->get('tbl_admin');

		if ($q->num_rows()) {
			return $q->row();
		} else {
			return false;
		}
	}

	public function companyprofile($cid)
	{
		$query = $this->db->select('*')
			->where('id', $cid)
			->get('tbl_company');
		return $query->row();
	}



	public function updatecompany($profiledata)
	{

		$compname	=	$profiledata['companyname'];
		$compemail	=	$profiledata['companyemail'];
		$compphone	=	$profiledata['companyphone'];
		$compphone2	=	$profiledata['companyphone2'];
		$compaddr	=	$profiledata['companyaddress'];
		// $city	=	$profiledata['city'];
		// $googlemap	=	$profiledata['googlemap'];
		$comptitle	=	$profiledata['companytitle'];
		$facebook	=	$profiledata['facebook'];
		$twitter	=	$profiledata['twitter'];
		$linkedin	=	$profiledata['linkedin'];
		$instagram	=	$profiledata['instagram'];
		if ($profiledata['logo'] != '') {
			$complogo	=	$profiledata['logo'];
		} else {

			$complogo	=	$profiledata['oldimage'];
		}
		$compdata = array('comp_name' => $compname, 'comp_mobile' => $compphone, 'comp_mobile2' => $compphone2, 'comp_email' => $compemail, 'comp_address' => $compaddr, 'comp_title' => $comptitle, 'status' => 'Active', 'date' => 'NOW()', 'comp_logo' => $complogo, 'facebook' => $facebook,'twitter' => $twitter,'linkedin' => $linkedin, 'insta' => $instagram,);
		$this->db->where("id", "1");
		$update = $this->db->update('tbl_company', $compdata);
		if ($update) {
			return true;
		} else {
			return false;
		}
	}

	public function productlist($id, $column, $table, $oby = '', $condition = '')
	{
		if ($id > 0) {
			$sliderdata	= $this->db->select('*')->where($column, $id)->get($table);
			return $sliderdata->row();
		} else {
			$this->db->order_by($oby, 'DESC');
			if ($condition != '') {
			} else {
				$sliderlist = $this->db->select("*")->get($table);
			}
			return $sliderlist->result();
		}
	}

	public function deleteproduct($id, $column, $table)
	{

		$this->db->delete("tbl_" . $table, array($column => $id));
		$delete =  $this->db->affected_rows();

		if ($delete) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function productstatus($id, $column, $table, $status)
	{

		$query = $this->db->select('*')
			->where($column, $id)
			->get("tbl_" . $table);

		if (count($query->row()) > 0) {
			if ($status == "Active") {
				$status = "Inactive";
			} else {
				$status = "Active";
			}

			$upstatus = array("status" => $status);

			$this->db->where($column, $id);
			$this->db->update("tbl_" . $table, $upstatus);
			return true;
		} else {
			return false;
		}
	}


	public function addslider($slider)
	{
		if ($slider['sliderimage'] != "") {
			$slide_image = $slider['sliderimage'];
		} else {
			$slide_image = $slider['oldimage'];
		}
		$now = date('Y-m-d H:i:s');
		$insertArray	=	array(
			'slide_title' => $slider['slidertitle'],
			'slide_short' => $slider['slide_short'],
			'link' => $slider['sliderlink'],
			'content' => $slider['slidercontent'],
			'slide_image' => $slide_image,
			'status' => 'Active',
			'date' => $now

		);

		$insert = $this->db->insert('tbl_slider', $insertArray);
		if ($insert) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function editslider($editid, $slider)
	{

		$query = $this->db->select("*")->where('id', $editid)->get("tbl_slider");

		if ($query->num_rows() > 0) {
			if ($slider['sliderimage'] != "") {
				$slide_image = $slider['sliderimage'];
			} else {
				$slide_image = $slider['oldimage'];
			}
			$now = date('Y-m-d H:i:s');
			$updateArray	=	array(
				'slide_title' => $slider['slidertitle'],
				'slide_short' => $slider['slide_short'],
				'link' => $slider['sliderlink'],
				'content' => $slider['slidercontent'],
				'slide_image' => $slide_image,
				'status' => 'Active',
				'date' => $now

			);
			$this->db->where('id', $editid);
			$update = $this->db->update("tbl_slider", $updateArray);
			if ($update) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}




	public function addcourse()
	{
		if ($_POST['courseurl'] == '') {
			$url = str_replace(' ', '-', strtolower(trim(preg_replace("/[^a-zA-Z 0-9 -]+/", "", $_POST['servicetitle']))));
		} else {
			$url = str_replace(' ', '-', strtolower(trim(preg_replace("/[^a-zA-Z 0-9 -]+/", "", $_POST['courseurl']))));
		}

		$date = date("Y-m-d H:i:s");
		$servicedata = array(
			'parent_id'	=> $_POST['coursecat'],
			'page_title'	=> $_POST['servicetitle'],
			'slug_title'	=> $_POST['slugtitle'],
			'tagline'	=> $_POST['tagline'],
			'page_url'	=> $url,
			'page_short'	=> $_POST['serialnum'],
			'page_content'	=> $_POST['servicecontent'],
			'course_content'	=> $_POST['coursecontent'],
			'page_image'	=> $_POST['serviceimage'],
			'status'			=> "Active",
			'type'			=> $_POST['type'],
			'date'				=>	$date

		);

		if ($_POST['serviceid'] > 0) {
			$this->db->where('id', $_POST['serviceid']);
			$courseQ = $this->db->update('tbl_pages', $servicedata);
		} else {
			$courseQ = $this->db->insert("tbl_pages", $servicedata);
		}
		if ($courseQ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function addblog()
	{
		if ($_POST['courseurl'] == '') {
			$url = str_replace(' ', '-', strtolower(trim(preg_replace("/[^a-zA-Z 0-9 -]+/", "", $_POST['servicetitle']))));
		} else {
			$url = str_replace(' ', '-', strtolower(trim(preg_replace("/[^a-zA-Z 0-9 -]+/", "", $_POST['courseurl']))));
		}

		$date = date("Y-m-d H:i:s");
		$servicedata = array(
			'parent_id'	=> $_POST['coursecat'],
			'page_title'	=> $_POST['servicetitle'],
			'slug_title'	=> $_POST['slugtitle'],
			'tagline'	=> $_POST['tagline'],
			'page_url'	=> $url,
			'page_short'	=> $_POST['serialnum'],
			'page_content'	=> $_POST['servicecontent'],
			'course_content'	=> $_POST['coursecontent'],
			'page_image'	=> $_POST['serviceimage'],
			'status'			=> "Active",
			'type'			=> $_POST['type'],
			'date'				=>	$date

		);

		if ($_POST['serviceid'] > 0) {
			$this->db->where('id', $_POST['serviceid']);
			$courseQ = $this->db->update('tbl_blog', $servicedata);
		} else {
			$courseQ = $this->db->insert("tbl_blog", $servicedata);
		}
		if ($courseQ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function addnews()
	{
		if ($_POST['courseurl'] == '') {
			$url = str_replace(' ', '-', strtolower(trim(preg_replace("/[^a-zA-Z 0-9 -]+/", "", $_POST['servicetitle']))));
		} else {
			$url = str_replace(' ', '-', strtolower(trim(preg_replace("/[^a-zA-Z 0-9 -]+/", "", $_POST['courseurl']))));
		}

		$date = date("Y-m-d H:i:s");
		$servicedata = array(
			'parent_id'	=> $_POST['coursecat'],
			'page_title'	=> $_POST['servicetitle'],
			'slug_title'	=> $_POST['slugtitle'],
			'tagline'	=> $_POST['tagline'],
			'page_url'	=> $url,
			'page_short'	=> $_POST['serialnum'],
			'page_content'	=> $_POST['servicecontent'],
			'course_content'	=> $_POST['coursecontent'],
			'page_image'	=> $_POST['serviceimage'],
			'status'			=> "Active",
			'type'			=> $_POST['type'],
			'date'				=>	$date

		);

		if ($_POST['serviceid'] > 0) {
			$this->db->where('id', $_POST['serviceid']);
			$courseQ = $this->db->update('tbl_news', $servicedata);
		} else {
			$courseQ = $this->db->insert("tbl_news", $servicedata);
		}
		if ($courseQ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function addwork()
	{
		$date = date("Y-m-d H:i:s");
		$workdata = array(
			'category_id'		=> $_POST['workcat'],
			'work_title'		 => $_POST['worktitle'],
			'services_short'	 => $_POST['serialnum'],
			'student'		    => $_POST['student'],
			'image'			  => $_POST['workimage'],
			'status'			 => "Active",
			'date'			   =>	$date

		);

		if ($_POST['serviceid'] > 0) {
			$this->db->where('id', $_POST['serviceid']);
			$this->db->update('tbl_work', $workdata);
		} else {
			$this->db->insert("tbl_work", $workdata);
		}
		if ($this->db->affected_rows()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function addofficework()
	{
		$date = date("Y-m-d H:i:s");
		$workdata = array(
			'work_category'		=> $_POST['category'],
			'work_title'		 => $_POST['worktitle'],
			'services_short'	 => $_POST['serialnum'],
			'image'			  => $_POST['workimage'],
			'status'			 => "Active",
			'date'			   =>	$date

		);

		if ($_POST['serviceid'] > 0) {
			$this->db->where('id', $_POST['serviceid']);
			$this->db->update('tbl_office_work', $workdata);
		} else {
			$this->db->insert("tbl_office_work", $workdata);
		}
		if ($this->db->affected_rows()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}



	public function addteam()
	{
		$date = date("Y-m-d H:i:s");
		$workdata = array(
			'name'		=> $_POST['name'],
			'designation'		 => $_POST['designation'],
			'content'	 => $_POST['content'],
			'serialnum'		    => $_POST['serialnum'],
			'teamtype'			=> $_POST['teamtype'],
			'facebook'		    => $_POST['facebook'],
			'linkdine'		    => $_POST['linkedine'],
			'google'		    => $_POST['google'],
			'image'			  => $_POST['workimage'],
			'status'			 => "Active",
			'date'			   =>	$date

		);

		if ($_POST['serviceid'] > 0) {
			$this->db->where('id', $_POST['serviceid']);
			$this->db->update('tbl_team', $workdata);
		} else {
			$this->db->insert("tbl_team", $workdata);
		}
		if ($this->db->affected_rows()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}



	public function addservice()
	{

		$date = date("Y-m-d H:i:s");
		$servicedata = array(
			'services_title'	=> $_POST['servicetitle'],
			'services_content'	=> $_POST['servicecontent'],
			'services_image'	=> $_POST['serviceimage'],
			'status'			=> "Active",
			'date'				=>	$date

		);
		if ($_POST['serviceid'] > 0) {
			$this->db->where('id', $_POST['serviceid']);
			$this->db->update('tbl_services', $servicedata);
		} else {
			$this->db->insert("tbl_services", $servicedata);
		}
		if ($this->db->affected_rows()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function addtechnologies()
	{

		$date = date("Y-m-d H:i:s");
		$servicedata = array(
			'services_title'	=> $_POST['servicetitle'],
			'services_content'	=> $_POST['servicecontent'],
			'services_image'	=> $_POST['serviceimage'],
			'status'			=> "Active",
			'date'				=>	$date

		);
		if ($_POST['serviceid'] > 0) {
			$this->db->where('id', $_POST['serviceid']);
			$this->db->update('tbl_technologies', $servicedata);
		} else {
			$this->db->insert("tbl_technologies", $servicedata);
		}
		if ($this->db->affected_rows()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function addcoursecat()
	{

		//$url = str_replace(' ','-',strtolower(trim(preg_replace("/[^a-zA-Z 0-9 -]+/", "", $_POST['servicetitle']))));

		if ($_POST['serviceurl'] == '') {
			$url = str_replace(' ', '-', strtolower(trim(preg_replace("/[^a-zA-Z 0-9 -]+/", "", $_POST['servicetitle']))));
		} else {
			$url = str_replace(' ', '-', strtolower(trim(preg_replace("/[^a-zA-Z 0-9 -]+/", "", $_POST['serviceurl']))));
		}

		$date = date("Y-m-d H:i:s");
		$servicedata = array(
			'services_title'	=> $_POST['servicetitle'],
			'slug_title'	=> $_POST['slugtitle'],
			'tagline'	=> $_POST['tagline'],
			'cat_url'			=> str_replace('--', '-', $url),
			'services_short'	=> $_POST['catnum'],
			'page_content'		=> base64_encode($_POST['servicecontent']),
			'image'				=> $_POST['workimage'],
			'status'			=> "Active",
			'date'				=>	$date

		);
		if ($_POST['serviceid'] > 0) {
			$this->db->where('id', $_POST['serviceid']);
			$this->db->update('tbl_course_category', $servicedata);
			return true;
		} else {
			$checkcat = $this->db->get_where('tbl_course_category', array('services_title' => $_POST['servicetitle']));
			if ($checkcat->num_rows() == 0) {
				$this->db->insert("tbl_course_category", $servicedata);
				return true;
			} else {
				return false;
			}
		}
	}


	public function addworkcat()
	{

		$date = date("Y-m-d H:i:s");
		$servicedata = array(
			'services_title'	=> $_POST['servicetitle'],
			'services_short'	=> $_POST['catnum'],
			'status'			=> "Active",
			'work'				=> $_POST['work'],
			'tutorial'			=> $_POST['tutorial'],
			'portfolio'			=> $_POST['portfolio'],
			'date'				=>	$date

		);
		if ($_POST['serviceid'] > 0) {
			$this->db->where('id', $_POST['serviceid']);
			$this->db->update('tbl_work_category', $servicedata);
			return true;
		} else {
			$checkcat = $this->db->get_where('tbl_work_category', array('services_title' => $_POST['servicetitle']));
			if ($checkcat->num_rows() == 0) {
				$this->db->insert("tbl_work_category", $servicedata);
				return true;
			} else {
				return false;
			}
		}
	}


	public function addtutorial()
	{
		$date = date("Y-m-d H:i:s");
		$workdata = array(
			'category_id'		=> $_POST['workcat'],
			'work_title'		 => $_POST['worktitle'],
			'services_short'	 => $_POST['serialnum'],
			'video'		    => $_POST['video'],
			'status'			 => "Active",
			'date'			   =>	$date

		);

		if ($_POST['serviceid'] > 0) {
			$this->db->where('id', $_POST['serviceid']);
			$this->db->update('tbl_tutorial', $workdata);
		} else {
			$this->db->insert("tbl_tutorial", $workdata);
		}
		if ($this->db->affected_rows()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


	public function addtestimonial()
	{
		$date = date("Y-m-d H:i:s");
		$workdata = array(
			'work_title'		 => $_POST['worktitle'],
			'testimonial'		 => $_POST['testimonial'],
			'services_short'	 => $_POST['serialnum'],
			'image'		   		 => $_POST['testimonialImage'],
			'status'			 => "Active",
			'date'			   	 =>	$date

		);

		if ($_POST['serviceid'] > 0) {
			$this->db->where('id', $_POST['serviceid']);
			$this->db->update('tbl_testimonial', $workdata);
		} else {
			$this->db->insert("tbl_testimonial", $workdata);
		}
		return TRUE;
	}

	public function addfaq()
	{
		$date = date("Y-m-d H:i:s");
		$workdata = array(
			'work_title'		 => $_POST['worktitle'],
			'testimonial'		 => $_POST['faq'],
			'services_short'	 => $_POST['serialnum'],
			'image'		   		 => $_POST['testimonialImage'],
			'status'			 => "Active",
			'date'			   	 =>	$date

		);

		if ($_POST['serviceid'] > 0) {
			$this->db->where('id', $_POST['serviceid']);
			$this->db->update('tbl_faq', $workdata);
		} else {
			$this->db->insert("tbl_faq", $workdata);
		}
		return TRUE;
	}


	public function getloopdata($id, $column, $table, $ord = 'id', $limit = 0, $offset = 0)
	{

		$this->db->order_by($ord, 'ASC');
		$loopdata	=	$this->db->select('*')
			->where($column, $id)
			->limit($limit, $offset)
			->get($table);
		return $loopdata->result();
	}


	public function updategeocode($profiledata)
	{

		$title	=	base64_encode($profiledata['metacontent']);
		$id		=	$profiledata['geoid'];
		$date	=	date('Y-m-d H:m:s');
		$ip		=	$this->input->ip_address();

		$geodata = array('title' => $title, 'date' => $date, 'ip' => $ip);
		$this->db->where("id", $id);
		$update = $this->db->update('tbl_geocode', $geodata);
		if ($update) {
			return true;
		} else {
			return false;
		}
	}

	public function addseo($profiledata)
	{
		$date = date("Y-m-d H:i:s");
		$workdata = array(
			'url'			=> $_POST['seourl'],
			'title'		 	=> base64_encode($_POST['title']),
			'content'	 	=> base64_encode($_POST['content']),
			'description'	=> base64_encode($_POST['description']),
			'status'		=> "Active",
			'ip'			=>	$this->input->ip_address(),
			'date'			=>	date("Y-m-d H:i:s")
		);

		if ($_POST['seoid'] > 0) {
			$checkAgain = $this->db->get_where('tbl_seo_url', array('url' => $_POST['seourl'], 'id !=' => $_POST['seoid']));
			if ($checkAgain->num_rows() == 0) {
				$this->db->where('id', $_POST['seoid']);
				$this->db->update('tbl_seo_url', $workdata);
				return true;
			} else {
				return false;
			}
		} else {
			$checkAgain = $this->db->get_where('tbl_seo_url', array('url' => $_POST['seourl']));
			if ($checkAgain->num_rows() == 0) {
				$this->db->insert("tbl_seo_url", $workdata);
				return true;
			} else {
				return false;
			}
		}
	}

	public function getEnquery()
	{
		$this->db->select('*');
		$this->db->from('tbl_enquiry');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
}
