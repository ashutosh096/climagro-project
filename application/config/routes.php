<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//$route['api/files'] = 'filelist';

$route['default_controller'] = 'Welcome';
$route['course-category/(:any)'] = 'Courses/index';
$route['404_override'] = 'welcome/notfound';
$route['translate_uri_dashes'] = FALSE;
//$route['([^/]+)/?'] = 'pages/slug_on_the_fly/$1';
$route['about-us'] = 'Welcome/about/';

$route['services'] = 'Welcome/sercies/';
$route['contact-us'] = 'Welcome/contact/';
$route['contact/submit'] = 'Welcome/submit';
$route['solutions'] = 'Welcome/solutions/';
$route['agri'] = 'Welcome/agri/';
$route['resource'] = 'Welcome/resource/';
$route['our-team'] = 'Welcome/team/';
$route['our-journey'] = 'Welcome/journey/';
$route['offering'] = 'Welcome/offering/';
$route['technologies'] = 'Welcome/technologies/';
$route['portfolio'] = 'Welcome/portfolio/';
$route['news'] = 'Welcome/news/';
$route['articles'] = 'Welcome/article/';
$route['mail'] = 'contact/submit';

$route['news/(:any)'] = 'news/pages/$1';             // News detail
$route['news/(:any)/(:any)'] = 'errors/error_404';   // Prevent deeper URLs

$route['api/files'] = 'Welcome/list_files';
$route['email/subscribe']['post'] = 'Welcome/subscribe';
$route['subscribe'] = 'Welcome/subscribe'; // Handle cleaner URL

// Admin subscriber management routes
$route['administrator/managesubscribers'] = 'Administrator/managesubscribers';
$route['administrator/exportsubscribers'] = 'Administrator/exportsubscribers';

// Admin contact form management routes
$route['administrator/managecontacts'] = 'Administrator/managecontacts';
$route['administrator/exportcontacts'] = 'Administrator/exportcontacts';


$route['climatedata']                  = 'Welcome/climate';
$route['climatedata/(:any)']          = 'Welcome/climate/$1';
$route['climatedata/(:any)/(:any)']   = 'Welcome/climate/$1/$2';


$route['blogs'] = 'Welcome/blog';
// $route['blogs/(:any)'] = 'Welcome/blog_detail/$1';

require_once( BASEPATH .'database/DB'. '.php' );
$db =& DB();
$query = $db->get('tbl_pages' );
$result = $query->result();
foreach( $result as $row )
{
    $route['services/'.$row->page_url ]                  = "Courses/pages/";
    $route['services/'.$row->page_url.'/:any' ]           = 'error404';
}


// Fetch all blog posts
$query = $db->get('tbl_blog' );
$result = $query->result();

foreach ($result as $row) {
    $route['blogs/' . $row->page_url] = 'Blogs/pages';
    
    $route['blogs/' . $row->page_url . '/:any'] = 'error404';
}


// Fetch all news posts
$query = $db->get('tbl_news' );
$result = $query->result();

foreach ($result as $row) {
    $route['news/' . $row->page_url] = 'News/pages';
    
    $route['news/' . $row->page_url . '/:any'] = 'error405';
}
