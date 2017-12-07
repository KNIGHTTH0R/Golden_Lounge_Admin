<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class facility extends Admin_Controller {

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

	public function view_all2()
	{

		$this->load->model('facility_model', 'facilities');
		$this->load->model('facility_type_model', 'facilitietypes');

		$facilitydata = $this->facilities->get_all();
		$facilitytypedata = $this->facilitietypes->get_all();

		for ($x = 0; $x < count($facilitydata); $x++) {
			for ($j = 0; $j < count($facilitytypedata); $j++) {
				if($facilitydata[$x]->type == $facilitytypedata[$j]->id){
					$facilitydata[$x]->type = $facilitytypedata[$j]->facility_type;
				}
			}
		}; 


		$this->mViewData['facilities'] = $facilitydata;
		$this->mPageTitle = 'Facility';
		$this->render('facility/view_all2');

	}

	public function view_all_facilitytype()
	{

		$this->load->model('facility_type_model', 'facilitytype');

		$this->mViewData['facilities'] = $this->facilitytype->get_all();

		$this->mPageTitle = 'Facility Type';
		$this->render('facility/view_all2');

	}





	// Create Frontend User
	public function create()
	{

		$this->load->model('facility_model', 'facilities');

		$form = $this->form_builder->create_form();

		if ($form->validate())
		{

			// passed validation
			$name = $this->input->post('name');
			$type = substr(implode(', ', $this->input->post('type')), 0);
			$location = substr(implode(', ', $this->input->post('location')), 0);


			$data = elements(array('name', 'type', 'location'), array('name' => $name, 'type' => $type, 'location' => $location));
			$result = $this->facilities->insert($data);

			$this->system_message->set_success($result);
			// refresh();
		}

		// get list of Frontend user groups
		$this->load->model('facility_type_model', 'facility_types');
		$this->mViewData['facility_types'] = $this->facility_types->get_all();
		$this->load->model('lounge_model', 'lounges');
		$this->mViewData['lounges'] = $this->lounges->get_all();
		$this->mPageTitle = 'Create Facility';
		$this->mViewData['form'] = $form;
		$this->render('facility/create');
	}

	public function editfacility($facilityid)
	{
		$this->load->model('facility_model', 'facilities');
		$this->load->model('facility_type_model', 'facility_type');


		$form = $this->form_builder->create_form();

		$data = $this->facilities->get($facilityid);

		$facility_type = $this->facility_type->get($data->type);
		$facility_type_all = $this->facility_type->get_all();

		$array = array();

		for ($x = 0; $x < count($facility_type_all); $x++) {
		    array_push($array,$facility_type_all[$x]->facility_type);
		}; 

		$availability = array('availabile', 'unavailable');

		if ($form->validate())
		{
			$facility_type_selected = (int)$this->input->post('type');

			$facility_type_selected = $facility_type_selected+1;

			$facility_type_selected = (string)$facility_type_selected;

			$facility_availability = (int)$this->input->post('availability');

			$facility_name			= $this->input->post('name');

			if($facility_availability == '0'){
				$facility_availability = 'Available';
			}
			else if($facility_availability == '1'){
				$facility_availability = 'Unavailable';
			}

			print_r($facility_availability);
			$datatoupdate = elements(array('name', 'type','status'), array('name' => $facility_name, 'type' => $facility_type_selected,'status'=> $facility_availability));

			$updated = $this->facilities->update($facilityid, $datatoupdate);

			$this->system_message->set_success('Updated');

		}



		// $type = substr(implode(', ', $this->input->post('type')), 0);
		
		$this->mPageTitle = 'Edit Facility';

		$this->mViewData['form'] = $form;
		$this->mViewData['data'] = $data;
		$this->mViewData['facility_type'] = $facility_type;
		$this->mViewData['facility_type_all'] = $facility_type_all;
		$this->mViewData['array'] = $array;
		$this->mViewData['availability'] = $availability;

		
		$this->render('facility/editfacility');
	}

	public function viewfacility($facilityid){

		$this->load->model('facility_model', 'facilities');
		$this->load->model('facility_type_model', 'facilitietypes');

		$facilitydata = $this->facilities->get($facilityid);;
		$facilitytypedata = $this->facilitietypes->get_all();

		for ($j = 0; $j < count($facilitytypedata); $j++) {
			if($facilitydata->type == $facilitytypedata[$j]->id){
				$facilitydata->type = $facilitytypedata[$j]->facility_type;
			}
		}; 

		$this->mViewData['facility'] = $facilitydata;

		$this->mPageTitle = 'Facility';
		$this->render('facility/viewfacility');

	}

	public function deletefacility($facilityid){

		$this->load->model('facility_model', 'facilities');
		$this->facilities->delete($facilityid);
		$this->view_all2();

	}

	public function doneviewfacility(){

		$this->view_all2();

	}
	public function facilitytype(){
		$this->load->model('facility_type_model', 'facilitietypes');
		$this->mViewData['facility_types'] = $this->facilitietypes->get_all();
		$this->mPageTitle = 'Facility Type';
		$this->render('facility/facilitytype');
	}

	public function editfacilitytype($facilitytypeid){


		$this->load->model('facility_type_model', 'facilitietypes');
		$this->mViewData['facility_types'] = $this->facilitietypes->get_all();
		$this->mPageTitle = 'Facility Type';
		$this->render('facility/facilitytype');
	}

}
