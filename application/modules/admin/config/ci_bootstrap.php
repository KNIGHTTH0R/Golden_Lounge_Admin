<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| CI Bootstrap 3 Configuration
| -------------------------------------------------------------------------
| This file lets you define default values to be passed into views 
| when calling MY_Controller's render() function. 
| 
| See example and detailed explanation from:
| 	/application/config/ci_bootstrap_example.php
*/

$config['ci_bootstrap'] = array(

	// Site name
	'site_name' => 'Lounge Management',

	// Default page title prefix
	'page_title_prefix' => '',

	// Default page title
	'page_title' => '',

	// Default meta data
	'meta_data'	=> array(
		'author'		=> '',
		'description'	=> '',
		'keywords'		=> ''
	),
	
	// Default scripts to embed at page head or end
	'scripts' => array(
		'head'	=> array(
			'assets/dist/admin/adminlte.min.js',
			'assets/dist/admin/lib.min.js',
			'assets/dist/admin/app.min.js'
		),
		'foot'	=> array(
		),
	),

	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
			'assets/dist/admin/adminlte.min.css',
			'assets/dist/admin/lib.min.css',
			'assets/dist/admin/app.min.css'
		)
	),

	// Default CSS class for <body> tag
	'body_class' => '',
	
	// Multilingual settings
	'languages' => array(
	),

	// Menu items
	'menu' => array(
		'home' => array(
			'name'		=> 'Dashboard',
			'url'		=> '',
			'icon'		=> 'fa fa-home',
		),


		'facility' => array(
			'name'		=> 'Facility',
			'url'		=> 'facility',
			'icon'		=> 'fa fa-window-maximize',
			'children'  => array(
				// 'View all'			=> 'facility',
				'View all'			=> 'facility/view_all2',
				'Add new facility'		=> 'facility/create',
				// 'List all facility type' => 'facility/facilitytype',
			)
		),

		'meal' => array(
			'name'		=> 'Meal',
			'url'		=> 'util',
			'icon'		=> 'fa fa-cutlery',
			'children'  => array(
				'View All'		=> 'meal/view_all',
				'Add Meal'		=> 'meal/create',
				'Meal Cycle'		=> 'meal/cycle_all',
				'Add New Cycle'		=> 'meal/add_cycle',
			)
		),

		'staff' => array(
			'name'		=> 'Saff',
			'url'		=> 'staff',
			'icon'		=> 'fa fa-users',
			'children'  => array(
				'View All'		=> 'staff/view_all',
				'Add Staff'		=> 'staff/create',
			)
		),
		// 'gsa' => array(
		// 	'name'		=> 'GSA',
		// 	'url'		=> 'gsa',
		// 	'icon'		=> 'fa fa-users',
		// ),

		// 'user' => array(
		// 	'name'		=> 'Staff/Manpower',
		// 	'url'		=> 'user',
		// 	'icon'		=> 'fa fa-users',
		// 	'children'  => array(
		// 		'List'			=> 'user',
		// 		'Create'		=> 'user/create',
		// 		'User Groups'	=> 'user/group',
		// 	)
		// ),



		// 'inventory' => array(
		// 	'name'		=> 'Inventory',
		// 	'url'		=> 'util',
		// 	'icon'		=> 'fa fa-stack-exchange',
		// 	'children'  => array(
		// 		'Database Versions'		=> 'util/list_db',
		// 	)
		// ),
		// 'panel' => array(
		// 	'name'		=> 'Admin Panel',
		// 	'url'		=> 'panel',
		// 	'icon'		=> 'fa fa-cog',
		// 	'children'  => array(
		// 		'Admin Users'			=> 'panel/admin_user',
		// 		'Create Admin User'		=> 'panel/admin_user_create',
		// 		'Admin User Groups'		=> 'panel/admin_user_group',
		// 	)
		// ),
		'logout' => array(
			'name'		=> 'Sign Out',
			'url'		=> 'panel/logout',
			'icon'		=> 'fa fa-sign-out',
		)
	),

	// Login page
	'login_url' => 'admin/login',

	// Restricted pages
	'page_auth' => array(
		'user/create'				=> array('webmaster', 'admin', 'manager'),
		'user/group'				=> array('webmaster', 'admin', 'manager'),
		'panel'						=> array('webmaster'),
		'panel/admin_user'			=> array('webmaster'),
		'panel/admin_user_create'	=> array('webmaster'),
		'panel/admin_user_group'	=> array('webmaster'),
		'util'						=> array('webmaster'),
		'util/list_db'				=> array('webmaster'),
		'util/backup_db'			=> array('webmaster'),
		'util/restore_db'			=> array('webmaster'),
		'util/remove_db'			=> array('webmaster'),
		'facility'					=> array('webmaster', 'admin', 'manager'),
		'gsa'						=> array('webmaster', 'admin', 'manager','awana'),
		'user'						=> array('webmaster', 'admin', 'manager'),
	),

	// AdminLTE settings
	'adminlte' => array(
		'body_class' => array(
			'webmaster'	=> 'skin-red',
			'admin'		=> 'skin-purple',
			'manager'	=> 'skin-black',
			'staff'		=> 'skin-blue',
			'awana'		=> 'skin-blue',
		)
	),

	// Useful links to display at bottom of sidemenu
	'useful_links' => array(
		array(
			'auth'		=> array('webmaster', 'admin', 'manager', 'staff'),
			'name'		=> 'Frontend Website',
			'url'		=> '',
			'target'	=> '_blank',
			'color'		=> 'text-aqua'
		),
		array(
			'auth'		=> array('webmaster', 'admin'),
			'name'		=> 'API Site',
			'url'		=> 'api',
			'target'	=> '_blank',
			'color'		=> 'text-orange'
		),
		array(
			'auth'		=> array('webmaster', 'admin', 'manager', 'staff'),
			'name'		=> 'Github Repo',
			'url'		=> CI_BOOTSTRAP_REPO,
			'target'	=> '_blank',
			'color'		=> 'text-green'
		),
	),

	// Debug tools
	'debug' => array(
		'view_data'	=> FALSE,
		'profiler'	=> FALSE
	),
);

/*
| -------------------------------------------------------------------------
| Override values from /application/config/config.php
| -------------------------------------------------------------------------
*/
$config['sess_cookie_name'] = 'ci_session_admin';