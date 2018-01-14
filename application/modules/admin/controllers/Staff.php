<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class staff extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
	}

	// Frontend User CRUD
	public function index()
	{
		$crud = $this->generate_crud('facilities');
		$crud->columns('id','name', 'type');
		// $this->unset_crud_fields('ip_address', 'last_login');
		// $this->generate_image_crud('facilities','image_url','ffdfdf', 'id', 'name');

		// // only webmaster and admin can change member groups
		// if ($crud->getState()=='list' || $this->ion_auth->in_group(array('webmaster', 'admin')))
		// {
		// 	$crud->set_relation_n_n('groups', 'users_groups', 'groups', 'user_id', 'group_id', 'name');
		// }

		// // only webmaster and admin can reset user password
		// if ($this->ion_auth->in_group(array('webmaster', 'admin')))
		// {
		// 	$crud->add_action('Reset Password', '', 'admin/user/reset_password', 'fa fa-repeat');
		// }

		// disable direct create / delete Frontend User
		$crud->unset_add();
		$crud->unset_delete();

		$this->mPageTitle = 'Facility';
		$this->render_crud();
	}

	public function view_all()
	{

		$this->load->model('staff_model', 'staffs');

		$staffdata = $this->staffs->get_all();

		// for ($x = 0; $x < count($facilitydata); $x++) {
		// 	for ($j = 0; $j < count($facilitytypedata); $j++) {
		// 		if($facilitydata[$x]->type == $facilitytypedata[$j]->id){
		// 			$facilitydata[$x]->type = $facilitytypedata[$j]->facility_type;
		// 		}
		// 	}
		// }; 


		$this->mViewData['staffs'] = $staffdata;
		$this->mPageTitle = 'Staff and Manpower';
		$this->render('staff/view_all');

	}


	public function editstaff($staffid)
	{
		$this->load->model('staff_model', 'staffs');


		$form = $this->form_builder->create_form();

		$data = $this->staffs->get($staffid);

		// $facility_type = $this->facility_type->get($data->type);
		// $facility_type_all = $this->facility_type->get_all();

		// $array = array();

		// for ($x = 0; $x < count($facility_type_all); $x++) {
		    // array_push($array,$facility_type_all[$x]->facility_type);
		// }; 

		// $availability = array('availabile', 'unavailable');

		if ($form->validate())
		{

			$staff_name			= $this->input->post('name');

			$staff_position = $this->input->post('position');

			$datatoupdate = elements(array('name', 'position'), array('name' => $staff_name, 'position' => $staff_position));

			$updated = $this->staffs->update($staffid, $datatoupdate);

			$this->system_message->set_success($updated);

			header("Refresh:0");



		}



		// $type = substr(implode(', ', $this->input->post('type')), 0);
		
		$this->mPageTitle = 'Edit Staff';

		$this->mViewData['form'] = $form;
		$this->mViewData['data'] = $data;
		// $this->mViewData['facility_type'] = $facility_type;
		// $this->mViewData['facility_type_all'] = $facility_type_all;
		// $this->mViewData['array'] = $array;
		// $this->mViewData['availability'] = $availability;

		
		$this->render('staff/editstaff');
	}

	public function viewstaff($staffid){

		$this->load->model('staff_model', 'staff');

		$staffdata = $this->staff->get($staffid);;

		// for ($j = 0; $j < count($facilitytypedata); $j++) {
			// if($facilitydata->type == $facilitytypedata[$j]->id){
				// $facilitydata->type = $facilitytypedata[$j]->facility_type;
			// }
		// }; 

		$this->mViewData['staff'] = $staffdata;

		$this->mPageTitle = 'Staff';
		$this->render('staff/viewstaff');

	}

	public function deletestaff($staffid){

		$this->load->model('staff_model', 'staffs');
		$this->staffs->delete($staffid);
		$this->view_all();

	}

	public function doneviewstaff(){

		$this->view_all();

	}


}
