<?php 

$config = array(

	'adminlogin'	=> array(
							array(
									'field'  => 'email',
									'label'  => '',
									'rules'  => 'required|trim|alpha',
									'errors' => array('required'=>'Username is required', 'alpha'=>'Use only alpha in username!')
							),
							array(
									'field'  => 'password',
									'label'  => '',
									'rules' => 'required',
									'errors' => array('required'=>'Please fill your password')
							)
						),

			'resetadminpassword'	=>	array(
								array(
									'field'=>'currentpassword',
									'label'=>'',
									'rules'=>'required|trim',
									'errors'=>array(
														'required'=>"Current Password is required"
													)
								),

								array(
									'field'=>'newpassword',
									'label'=>'',
									'rules'=>'required|trim',
									'errors'=>array(
														'required'=>"New password is required",
													)
								),

								array(
									'field'=>'confirmpassword',
									'label'=>'',
									'rules'=>'required|trim|matches[newpassword]',
									'errors'=>array(
														'required'=>"Confirm password is required",
														'matches'=>'Confirm pasword do not match'
													)
								),
			)
			,
				'companyprofile'	=> array(
							array(
									'field'  => 'companyname',
									'label'  => '',
									'rules'  => 'required|trim',
									'errors' => array('required'=>'Company name is required')
							),
							array(
									'field'  => 'companyemail',
									'label'  => '',
									'rules' => 'required|valid_email|trim',
									'errors' => array('required'=>'Company email is required', 'valid_email'=>'Please enter proper email!')
							),
							array(
									'field'  => 'companyphone',
									'label'  => '',
									'rules' => 'required|trim',
									'errors' => array('required'=>'Company phone is required')
							),
							array(
									'field'  => 'companyaddress',
									'label'  => '',
									'rules' => 'required|trim',
									'errors' => array('required'=>'Company address is required')
							),
							array(
									'field'  => 'companytitle',
									'label'  => '',
									'rules' => 'required|trim',
									'errors' => array('required'=>'Company title is required')
							)
						),

	'slidervalidation'	=> array(
							array(
									'field'  => 'slidertitle',
									'label'  => '',
									'rules'  => 'trim',
									'errors' => array('required'=>'Slider name is required')
							)
						),

	'servicevalidation'	=> array(
							array(
									'field'  => 'servicetitle',
									'label'  => '',
									'rules'  => 'required|trim',
									'errors' => array('required'=>'Title is required')
							)
						),

	'profileupdate' => array(

									array(
											'field'=>'name',
											'label'=>'',
											'rules'=>'required|trim',
											'errors'=>array('required'=>'Name is required')
											),

									array(
										'field'=>'mobile',
										'label'=>'',
										'rules'=>'required|trim|numeric|exact_length[8]',
										'errors'=>array(
														'required'=>'Mobile number is required',
														'numeric'=>'Please enter valid number',
														'exact_length'=>'Please enter 8 digit mobile number'
														)
										)
								),

	'seoupdate' => array(

									array(
											'field'=>'seourl',
											'label'=>'',
											'rules'=>'required|trim',
											'errors'=>array(
													'required'=>'Page URL is required')
											),
								),
	'enquiry' => array(

									array(
											'field'=>'name',
											'label'=>'',
											'rules'=>'required|trim',
											'errors'=>array(
													'required'=>'Name is required.')
											),
									array(
											'field'=>'email',
											'label'=>'',
											'rules'=>'required|trim|valid_email',
											'errors'=>array(
													'required'=>'Email is required.',
													'valid_email'=>'Please enter valid email id.')
											),
									array(
											'field'=>'phone',
											'label'=>'',
											'rules'=>'required|trim|exact_length[10]|numeric',
											'errors'=>array(
													'required'=>'Mobile number is required.',
													'numeric'=>'Please enter valid mobile number.',
													'exact_length'=>'Mobile number should be 10 digit.')
											),
									array(
											'field'=>'course',
											'label'=>'',
											'rules'=>'required|trim',
											'errors'=>array(
													'required'=>'Please select course is required.')
											),
									array(
											'field'=>'message',
											'label'=>'',
											'rules'=>'required|trim',
											'errors'=>array(
													'required'=>'Please enter your quiry.')
											)
									
								),

	'franchise' => array(

									array(
											'field'=>'name',
											'label'=>'',
											'rules'=>'required|trim',
											'errors'=>array(
													'required'=>'Name is required.')
											),
									array(
											'field'=>'email',
											'label'=>'',
											'rules'=>'required|trim|valid_email',
											'errors'=>array(
													'required'=>'Email is required.',
													'valid_email'=>'Please enter valid email id.')
											),
									array(
											'field'=>'phone',
											'label'=>'',
											'rules'=>'required|trim|exact_length[10]|numeric',
											'errors'=>array(
													'required'=>'Mobile number is required.',
													'numeric'=>'Please enter valid mobile number.',
													'exact_length'=>'Mobile number should be 10 digit.')
											),
									array(
											'field'=>'state',
											'label'=>'',
											'rules'=>'required|trim',
											'errors'=>array(
													'required'=>'State is required.')
											),
									array(
											'field'=>'distic',
											'label'=>'',
											'rules'=>'required|trim',
											'errors'=>array(
													'required'=>'Distic is required.')
											),
									array(
											'field'=>'place',
											'label'=>'',
											'rules'=>'required|trim',
											'errors'=>array(
													'required'=>'Place is required.')
											),
									array(
											'field'=>'message',
											'label'=>'',
											'rules'=>'required|trim',
											'errors'=>array(
													'required'=>'Please enter your quiry.')
											)
									
								)
								

);

?>