<?php
declare(strict_types=1);

defined('BASEPATH') or exit('No direct script access allowed');
class Welcome extends CI_Controller
{
	var $data;
	public function __construct()
	{
		parent::__construct();

		// don’t redirect when we’re in list_files()
		$current_method = $this->router->method;
		if ($current_method !== 'list_files' && sizeof($_GET) > 0) {
			redirect(base_url());
		}

		// the rest of your setup
		$this->load->model("Publicmodel", "p");
		$this->data['allmeta']     = $this->p->allmetacontent($this->uri->segment(1));
		$this->data['geodata']     = $this->p->getalldata("tbl_geocode");
		$this->data['companydata'] = $this->p->getalldata("tbl_company");
		$this->data['coursecat']   = $this->p->productlist(0, "id", "tbl_course_category", 'services_short');
	}


	public function index(): void

	{
		$this->data['sliderlist'] = $this->p->productlist(0, "id", "tbl_slider", 'slide_short');
		$this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_course_category", 'services_short');
		$this->data['courselist'] = $this->p->productlist(0, "id", "tbl_pages", 'page_short');
		$this->data['servicelist'] = $this->p->productlist(0, "id", "tbl_services");
		$this->data['technologieslist'] = $this->p->productlist(0, "id", "tbl_technologies");
		$this->data['teamlist'] = $this->p->getloopdata(1, "teamtype", "tbl_team", 'serialnum');
		$this->data['testimonial'] = $this->p->productlist(0, "id", "tbl_testimonial", 'services_short');
		$this->data['faq'] = $this->p->productlist(0, "id", "tbl_faq", 'services_short');
		// $this->data['worklist']=$this->p->productlist(0, "id", "tbl_testimonial", 'services_short');
		// $this->data['aluminilist']=$this->p->getloopdata(0, "teamtype", "tbl_team", 'serialnum');
		// $this->data['video'] = $this->p->youtubeVideo();
		$this->load->view('front/frontpage.php', $this->data);
	}

	public function team(): void
	{
		$this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_course_category", 'services_short');
		$this->data['teamlist'] = $this->p->getloopdata(1, "teamtype", "tbl_team", 'serialnum');
		$this->data['aluminilist']=$this->p->getloopdata(0, "teamtype", "tbl_team", 'serialnum');
		$this->load->view('front/teampage', $this->data);
	}

	// public function work()
	// {
	// 	$this->data['coursecatlist']=$this->p->productlist(0, "id", "tbl_course_category", 'services_short');
	// 	$this->data['workcat']=$this->p->getloopdata(1, "work", "tbl_work_category", 'services_short');
	// 	$this->data['worklist']=$this->p->productlist(0, "id", "tbl_work", 'services_short');
	// 	$this->load->view('front/studentwork', $this->data);
	// }

	public function portfolio(): void
	{
		$this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_course_category", 'services_short');
		$this->data['workcat'] = $this->p->getloopdata(1, "work", "tbl_work_category", 'services_short');
		$this->data['worklist'] = $this->p->productlist(0, "id", "tbl_work", 'services_short');
		$this->load->view('front/portfolio', $this->data);
	}

	public function tutorial(): void
	{
		$this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_course_category", 'services_short');
		$this->data['workcat'] = $this->p->getloopdata(1, "tutorial", "tbl_work_category", 'services_short');
		$this->data['worklist'] = $this->p->productlist(0, "id", "tbl_tutorial", 'services_short');
		$this->load->view('front/tutorials', $this->data);
	}

	public function testimonials(): void
	{
		$this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_course_category", 'services_short');
		$this->data['worklist'] = $this->p->productlist(0, "id", "tbl_testimonial", 'services_short');
		$this->load->view('front/testimonials', $this->data);
	}



	public function about(): void
	{
		$this->data['servicelist'] = $this->p->productlist(0, "id", "tbl_services");
		$this->data['teamlist'] = $this->p->getloopdata(1, "teamtype", "tbl_team", 'serialnum');
		$this->data['aluminilist'] = $this->p->getloopdata(0, "teamtype", "tbl_team", 'serialnum');
		$this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_course_category", 'services_short');
		$this->load->view('front/aboutpage', $this->data);
	}

	public function gmacalumini(): void
	{
		$this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_course_category", 'services_short');
		$totalalumini = $this->p->getloopdata(0, "teamtype", "tbl_team", 'serialnum');
		$this->load->library('pagination');
		$config = [
			'base_url' => base_url('gmac-alumini'),
			'total_rows' => count($totalalumini),
			'per_page' => 9,
			'full_tag_open' => "<ul class='pagination'>",
			'full_tag_close' => "</ul>",
			'next_tag_open' => "<li>",
			'next_tag_close'	=>	'</li>',
			'prev_tag_open' => "<li>",
			'prev_tag_close'	=>	'</li>',
			'last_tag_open' => "<li>",
			'last_tag_close'	=>	'</li>',
			'first_tag_open' => "<li>",
			'first_tag_close'	=>	'</li>',
			'num_tag_open' => "<li>",
			'num_tag_close'	=>	'</li>',
			'cur_tag_open' => "<li class='active'><a href=''>",
			'cur_tag_close'	=>	'</a></li>',
		];
		$this->pagination->initialize($config);
		$this->data['teamlist'] = $this->p->getloopdata(0, "teamtype", "tbl_team", 'serialnum', $config['per_page'], $this->uri->segment(2));
		$this->load->view('front/gmacalumini', $this->data);
	}

	public function contact(): void
	{
		$this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_course_category", 'services_short');
		$this->data['servicelist'] = $this->p->productlist(0, "id", "tbl_services");
		$this->load->view('front/contactpage', $this->data);
	}

	public function blog(): void
	{
		$this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_blog_category", 'services_short');
		$this->data['blog'] = $this->p->productlist(0, "id", "tbl_blog");
		$this->load->view('front/blogs', $this->data);
	}
	
	public function news(): void
	{
		// 1. Get lang from query param or default to 'en'
		$lang = $this->input->get('lang') ?? 'en';

		// 2. Fetch content from DB
		$this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_news_category", 'services_short');
		$this->data['servicelist'] = $this->p->productlist(0, "id", "tbl_news");

		// 3. Store lang to pass to view
		$this->data['lang'] = $lang;

		// 4. Load view with data
		$this->load->view('front/news', $this->data);
	}

	public function article(): void
	{
		$this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_course_category", 'services_short');
		$this->data['servicelist'] = $this->p->productlist(0, "id", "tbl_services");
		$this->load->view('front/articles', $this->data);
	}
	public function franchise(): void
	{
		$this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_course_category", 'services_short');
		$this->data['servicelist'] = $this->p->productlist(0, "id", "tbl_services");
		$this->load->view('front/franchise', $this->data);
	}
	public function technologies(): void
	{
		$this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_course_category", 'services_short');
		$this->data['servicelist'] = $this->p->productlist(0, "id", "tbl_services");
		$this->load->view('front/technologies', $this->data);
	}
	public function solutions(): void
	{
		$this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_course_category", 'services_short');
		$this->data['servicelist'] = $this->p->productlist(0, "id", "tbl_services");
		$this->load->view('front/solutions', $this->data);
	}
	
	public function agri(): void
	{
		$this->load->view('front/agri', $this->data);
	}
	
	public function climintellio_form(): void
	{
		$this->load->view('front/climintellio_form', $this->data);
	}
	
	public function sercies(): void
	{

		$this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_course_category", 'services_short');
		$this->data['servicelist'] = $this->p->productlist(0, "id", "tbl_services");
		$this->load->view('front/servicespage', $this->data);
	}
	public function validation(): void
	{
		$name 	 = $_POST['name'];
		$email 	 = $_POST['email'];
		$phone 	 = $_POST['phone'];
		$course  = $_POST['course'];
		$message = $_POST['message'];
		if ($this->form_validation->run('enquiry') == FALSE) {
			echo validation_errors();
		} else {
			$data = $this->input->post();
			$createdDate = date('Y-m-d H:i:s');
			$saveEnqueryArr = array(
				'name'    => $name,
				'email'   => $email,
				'phone'   => $phone,
				'course'  => $course,
				'message' => $message,
				'created' => $createdDate
			);
			$this->db->insert('tbl_enquiry', $saveEnqueryArr);
			$this->load->library('email');
			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");
			$this->email->from("$email", " $name");
			$this->email->to("info@globalpda.Com");
			$this->email->cc(array("nrjkk1@gmail.com"));
			$this->email->subject("$course : Global Power Data Inquiry");
			$body = $this->load->view('front/inquiryemail', $data, TRUE);
			$this->email->message($body);
			if (!$this->email->send()) {
				echo false;
			} else {
				echo true;
			}
		}
	}

	public function franchisevalidation(): void
	{
		$name 	   	= $_POST['name'];
		$email 	  	= $_POST['email'];
		$phone 	  	= $_POST['phone'];
		$state 	 	= $_POST['state'];
		$distic	 	= $_POST['distic'];
		$place		= $_POST['place'];
		$message 	= $_POST['message'];
		if ($this->form_validation->run('franchise') == FALSE) {
			echo validation_errors();
		} else {
			$data = $this->input->post();
			$this->load->library('email');
			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");
			$this->email->from("$email", " $name");
			$this->email->to("info@globalpda.Com");
			$this->email->cc(array("nrjkk1@gmail.com"));
			$this->email->subject("$distic : Franchise Inquiry");
			$body = $this->load->view('front/franchiesemail', $data, TRUE);
			$this->email->message($body);
			if (!$this->email->send()) {
				echo false;
			} else {
				echo true;
			}
		}
	}

	public function activities(): void
	{
		$this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_course_category", 'services_short');
		$this->data['activielist'] = $this->p->productlist(0, "id", "tbl_office_work", 'services_short', 'work_category=1');
		$this->load->view('front/activities', $this->data);
	}

	public function notfound(): void
	{
		$this->data['coursecatlist'] = $this->p->productlist(0, "id", "tbl_course_category", 'services_short');
		$pageurl = current_url();
		if ($this->uri->segment(1) == 'index.html') {
			redirect(base_url());
		}
		$detail = $this->p->singledetail($pageurl, "old_url", "tbl_redirect");
		if ($detail) {
			if ($detail->new_url != '') {
				redirect($detail->new_url);
			}
		}
		$this->data['whylist'] = $this->p->productlist(0, "id", "tbl_pages", 'page_short');
		$this->load->view('front/notfound', $this->data);
	}

	public function submit(): void
		{
			$this->load->library('form_validation');
			$this->output->set_content_type('application/json');

			// Validation rules
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('phone', 'Phone', 'required');
			$this->form_validation->set_rules('comment', 'Message', 'required');

			if ($this->form_validation->run() == FALSE) {
				echo json_encode([
					'success' => false,
					'message' => validation_errors('<div class="error">', '</div>')
				]);
				return;
			}

			$data = [
				'name' => $this->input->post('name', TRUE),
				'email' => $this->input->post('email', TRUE),
				'phone' => $this->input->post('phone', TRUE),
				'title' => $this->input->post('title', TRUE),
				'subject' => $this->input->post('title', TRUE),
				'interested' => $this->input->post('interested', TRUE),
				'message' => $this->input->post('comment', TRUE),
			];

			// Save to DB
			$this->load->model('Contact_model');
			$success = $this->Contact_model->insert_contact($data);

			if ($success) {
				// Send email via Gmail SMTP
				$email_sent = $this->send_gmail($data);
				
				if ($email_sent) {
					echo json_encode([
						'success' => true,
						'message' => 'Thank you! Your message has been sent successfully.'
					]);
				} else {
					echo json_encode([
						'success' => true, // Still success because DB saved
						'message' => 'Message received! (Email delivery failed)'
					]);
				}
			} else {
				echo json_encode([
					'success' => false,
					'message' => 'Failed to save your message. Please try again.'
				]);
			}
		}

	private function send_gmail($data)
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_port' => 587,
			'smtp_user' => 'akshatsan23@gmail.com', // Your Gmail address
			'smtp_pass' => '',    // Gmail App Password
			'smtp_crypto' => 'tls',
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'wordwrap'  => TRUE,
			'newline'   => "\r\n"
		];
		
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('', $data['name']);
		$this->email->to(['']); // Where to send notifications
		$this->email->cc($data['email']); // Optional: CC the submitter
		$this->email->subject('New Contact Form Submission');
		
		$message = "You have received a new contact form submission:<br><br>";
		$message .= "<strong>Name:</strong> " . $data['name'] . "<br>";
		$message .= "<strong>Email:</strong> " . $data['email'] . "<br>";
		$message .= "<strong>Phone:</strong> " . $data['phone'] . "<br>";
		$message .= "<strong>Title:</strong> " . $data['title'] . "<br>";
		$message .= "<strong>Interested In :</strong> " . nl2br($data['interested']);
		$message .= "<strong>Message:</strong> " . nl2br($data['message']);
		
		$this->email->message($message);

		if ($this->email->send()) {
			return true;
		} else {
			log_message('error', 'Email Error: ' . $this->email->print_debugger());
			return false;
		}
	}


	public function climate($variable = null, $type = null): void
		{
			// Load dropdown options
			$this->data['paramByVar'] = [
				'temperature'   => ['average', 'hotdays'],
				'precipitation' => ['average', 'wetdays']
			];
			$this->data['locByType'] = [
				'map'        => ['UttarPradesh','MadhyaPradesh','Maharashtra','Haryana'],
				'timeseries' => ['Mathura','Kanpur','Jhansi','Lucknow','UPAvg','Maharashtra']
			];

			// Store selected values for the view to pre-select
			$this->data['selectedVar']  = $variable;
			$this->data['selectedType'] = $type;
			$this->data['selectedParam'] = $this->input->get('param');
			$this->data['selectedLoc']   = $this->input->get('loc');

			// Render a dedicated climate view
			$this->load->view('front/climatedata', $this->data);
		}


	public function list_files()
	{
		$variable = preg_replace('/[^a-z0-9_-]/i','',$this->input->get('variable'));
		$type     = preg_replace('/[^a-z0-9_-]/i','',$this->input->get('type'));
		$location = preg_replace('/[^a-z0-9_-]/i','',$this->input->get('location'));
		if (! $variable || ! $type || ! $location) {
			return $this->_respond(400,['error'=>'Missing/invalid params']);
		}

		// adjust to your actual folder name: "assets" vs "assest"
		$dir = FCPATH . "assest/{$variable}/{$type}/{$location}";
		if (! is_dir($dir)) {
			return $this->_respond(404,['error'=>"Folder not found: {$variable}/{$type}/{$location}"]);
		}

		$files = array_values(array_filter(scandir($dir), function($f) use($dir){
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

	public function subscribe(): void
	{
		// 1. Check method
		if ($this->input->server('REQUEST_METHOD') !== 'POST') {
			$this->output
				->set_status_header(405)
				->set_content_type('application/json')
				->set_output(json_encode(['success' => false, 'message' => 'Method not allowed']));
			return;
		}

		// 2. Get email from POST (standard form data)
		$email = $this->input->post('email', TRUE);
		$email = trim($email);

		// 3. Validate email
		if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->output
				->set_status_header(400)
				->set_content_type('application/json')
				->set_output(json_encode(['success' => false, 'message' => 'Invalid email address']));
			return;
		}

		// 4. Load Model & Insert
		$this->load->model('Subscribermodel');
		
		// Check for duplicate manually if model returns false without distinction, 
		// but checking the model logic: it returns false if exists.
		// Let's rely on the model but handle the message nicely.
		
		// Actually, let's just check existence first for a better error message
		if ($this->db->where('email', $email)->count_all_results('subscribers') > 0) {
			$this->output
				->set_status_header(200) // Return 200 so frontend treats it as 'handled' but with a message
				->set_content_type('application/json')
				->set_output(json_encode(['success' => true, 'message' => 'You are already subscribed!']));
			return;
		}

		$inserted = $this->Subscribermodel->insert_email($email);

		if ($inserted) {
			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode(['success' => true, 'message' => 'Subscribed — check your inbox.']));
		} else {
			$this->output
				->set_status_header(500)
				->set_content_type('application/json')
				->set_output(json_encode(['success' => false, 'message' => 'Database error.']));
		}
	}



	public function submit_climintellio(): void
	{
		if ($this->input->server('REQUEST_METHOD') !== 'POST') {
			$this->output->set_status_header(405)->set_content_type('application/json')->set_output(json_encode(['success' => false, 'message' => 'Method not allowed']));
			return;
		}

		// Validation
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_name', 'Name', 'required|trim');
		$this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|trim');
		$this->form_validation->set_rules('request_type', 'Request Type', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->output->set_status_header(400)->set_content_type('application/json')->set_output(json_encode(['success' => false, 'message' => validation_errors()]));
			return;
		}

		// Prepare Data
		$data = [
			'request_type' => $this->input->post('request_type'),
			'location_method' => $this->input->post('location_method'),
			'hazards' => json_encode($this->input->post('hazards') ?? []),
			'admin_level' => $this->input->post('admin_level'),
			'country' => 'India',
			'states' => json_encode($this->input->post('states') ?? []),
			'districts' => json_encode($this->input->post('districts') ?? []),
			'variables' => json_encode($this->input->post('variables') ?? []),
			'metrics' => $this->input->post('metrics'),
			'coverage_type' => $this->input->post('coverage'),
			'hist_year_start' => $this->input->post('hist_year_start'),
			'hist_year_end' => $this->input->post('hist_year_end'),
			'future_year_start' => $this->input->post('future_year_start'),
			'future_year_end' => $this->input->post('future_year_end'),
			'scenarios' => json_encode($this->input->post('scenarios') ?? []),
			'format' => $this->input->post('format'),
			'user_name' => $this->input->post('user_name'),
			'user_email' => $this->input->post('user_email'),
			'user_org_type' => $this->input->post('user_org_type'),
			'submitted_at' => date('Y-m-d H:i:s')
		];

		// Insert
		if ($this->db->insert('tbl_climintellio_requests', $data)) {
			// Email logic
			$email_sent = $this->send_climintellio_email($data);
			$msg = $email_sent ? 'Request submitted successfully.' : 'Request submitted successfully (Email notification failed).';

			$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode(['success' => true, 'message' => $msg]));
		} else {
			$this->output->set_status_header(500)->set_content_type('application/json')->set_output(json_encode(['success' => false, 'message' => 'Database error.']));
		}
	}

	private function send_climintellio_email(array $data): bool
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_port' => 587,
			'smtp_user' => 'akshatsan23@gmail.com', // Reusing existing config
			'smtp_pass' => '',    // Gmail App Password (needs to be set)
			'smtp_crypto' => 'tls',
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'wordwrap'  => TRUE,
			'newline'   => "\r\n"
		];
		
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('no-reply@climagro.com', 'Climagro System'); // From system
		$this->email->to('akshatsan23@gmail.com'); // Admin email
		$this->email->reply_to($data['user_email'], $data['user_name']);
		$this->email->subject('New Climintellio Data Request from ' . $data['user_name']);
		
		$message = "<h2>New Climintellio Data Request</h2>";
		$message .= "<p><strong>User:</strong> " . htmlspecialchars($data['user_name']) . " (" . htmlspecialchars($data['user_email']) . ")</p>";
		$message .= "<p><strong>Organization Type:</strong> " . htmlspecialchars($data['user_org_type']) . "</p>";
		$message .= "<hr>";
		$message .= "<h3>Request Details:</h3>";
		$message .= "<ul>";
		$message .= "<li><strong>Request Type:</strong> " . htmlspecialchars($data['request_type']) . "</li>";
		$message .= "<li><strong>Location Method:</strong> " . htmlspecialchars($data['location_method']) . "</li>";
		$message .= "<li><strong>Coverage:</strong> " . htmlspecialchars($data['coverage_type']) . "</li>";
		$message .= "<li><strong>Format:</strong> " . htmlspecialchars($data['format']) . "</li>";
		$message .= "</ul>";
		$message .= "<p><em>Log in to the Admin Panel to view full details including hazards, scenarios, and variables.</em></p>";
		
		$this->email->message($message);

		if ($this->email->send()) {
			return true;
		} else {
			// log_message('error', 'Climintellio Email Error: ' . $this->email->print_debugger());
			return false;
		}
	}
}




		



	

    

