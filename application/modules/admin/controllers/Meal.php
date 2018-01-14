<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class meal extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
	}

	// Frontend User CRUD
	// public function index()
	// {
	// 	$crud = $this->generate_crud('facilities');
	// 	$crud->columns('id','name', 'type');
	// 	// $this->unset_crud_fields('ip_address', 'last_login');
	// 	// $this->generate_image_crud('facilities','image_url','ffdfdf', 'id', 'name');

	// 	// // only webmaster and admin can change member groups
	// 	// if ($crud->getState()=='list' || $this->ion_auth->in_group(array('webmaster', 'admin')))
	// 	// {
	// 	// 	$crud->set_relation_n_n('groups', 'users_groups', 'groups', 'user_id', 'group_id', 'name');
	// 	// }

	// 	// // only webmaster and admin can reset user password
	// 	// if ($this->ion_auth->in_group(array('webmaster', 'admin')))
	// 	// {
	// 	// 	$crud->add_action('Reset Password', '', 'admin/user/reset_password', 'fa fa-repeat');
	// 	// }

	// 	// disable direct create / delete Frontend User
	// 	$crud->unset_add();
	// 	$crud->unset_delete();

	// 	$this->mPageTitle = 'Facility';
	// 	$this->render_crud();
	// }





	public function view_all(){
		$this->load->model('meal_model', 'meals');
		$this->load->model('type_meal_model', 'type_meals');

		$meals = $this->meals->get_all();
		$mealtypes = $this->type_meals->get_all();

		for ($x = 0; $x < count($meals); $x++) {
			for ($j = 0; $j < count($mealtypes); $j++) {
				if($meals[$x]->type == $mealtypes[$j]->id){
					$meals[$x]->type = $mealtypes[$j]->name;
				}
			}
		}; 




		$this->mViewData['meals'] = $meals;
		$this->mPageTitle = 'Meal';
		$this->render('meal/view_all');

	}

	// public function view_all_facilitytype()
	// {

	// 	$this->load->model('facility_type_model', 'facilitytype');

	// 	$this->mViewData['facilities'] = $this->facilitytype->get_all();

	// 	$this->mPageTitle = 'Facility Type';
	// 	$this->render('facility/view_all2');

	// }





	public function create()	{	
		$form = $this->form_builder->create_form();


		$this->load->model('facility_model', 'facilities');

		$this->load->model('meal_model', 'meals');
		$this->load->model('type_meal_model', 'mealtypes');
		$this->load->model('meal_time_serving', 'meal_time_servings');

		$meal_type = $this->mealtypes->get_all();

		$meal_time_serving = $this->meal_time_servings->get_all();

		$mealtype = array();
		$mealtimeserving = array();
		$availability = array('availabile', 'unavailable');

		for ($x = 0; $x < count($meal_type); $x++) {
		    array_push($mealtype,$meal_type[$x]->name);
		}; 

		for ($x = 0; $x < count($meal_time_serving); $x++) {
		    array_push($mealtimeserving,$meal_time_serving[$x]->name);
		}; 

		$availability = array('availabile', 'unavailable');


		if ($form->validate()){

			$meal_type_selected = (int)$this->input->post('type');
			$meal_type_selected = $meal_type_selected+1;
			$meal_type_selected = (string)$meal_type_selected;

			$meal_ttime_serving_selected = (int)$this->input->post('timeserving');
			$meal_ttime_serving_selected = $meal_ttime_serving_selected+1;
			$meal_ttime_serving_selected = (string)$meal_ttime_serving_selected;


			$meal_availability = (int)$this->input->post('availability');

			$meal_name			= $this->input->post('name');
			$meal_ingredient			= $this->input->post('ingredient');


			if($meal_availability == '0'){
				$meal_availability = 'Available';
			}
			else if($meal_availability == '1'){
				$meal_availability = 'Unavailable';
			}

			$datatoupdate = elements(array('name', 'type','status', 'time_serving', 'ingredient'), array('name' => $meal_name, 'type' => $meal_type_selected,'status'=> $meal_availability, 'time_serving'=> $meal_ttime_serving_selected, 'ingredient'=> $meal_ingredient));
			$this->meals->insert($datatoupdate);

			$this->system_message->set_success('Updated');

			// // passed validation
			// $name = $this->input->post('name');
			// $type = substr(implode(', ', $this->input->post('type')), 0);
			// $location = substr(implode(', ', $this->input->post('location')), 0);


			// $data = elements(array('name', 'type', 'location'), array('name' => $name, 'type' => $type, 'location' => $location));
			// $result = $this->facilities->insert($data);

			// $this->system_message->set_success($result);
			// // refresh();
		}

		// get list of Frontend user groups
		$this->mPageTitle = 'Add Meal';
		$this->mViewData['form'] = $form;
		$this->mViewData['mealtype'] = $mealtype;
		$this->mViewData['mealtimeserving'] = $mealtimeserving;
		$this->mViewData['availability'] = $availability;
		$this->render('meal/create');
	}

	// public function editfacility($facilityid)
	// {
	// 	$this->load->model('facility_model', 'facilities');
	// 	$this->load->model('facility_type_model', 'facility_type');


	// 	$form = $this->form_builder->create_form();

	// 	$data = $this->facilities->get($facilityid);

	// 	$facility_type = $this->facility_type->get($data->type);
	// 	$facility_type_all = $this->facility_type->get_all();

	// 	$array = array();

	// 	for ($x = 0; $x < count($facility_type_all); $x++) {
	// 	    array_push($array,$facility_type_all[$x]->facility_type);
	// 	}; 

	// 	$availability = array('availabile', 'unavailable');

	// 	if ($form->validate())
	// 	{
	// 		$facility_type_selected = (int)$this->input->post('type');

	// 		$facility_type_selected = $facility_type_selected+1;

	// 		$facility_type_selected = (string)$facility_type_selected;

	// 		$facility_availability = (int)$this->input->post('availability');

	// 		$facility_name			= $this->input->post('name');

	// 		if($facility_availability == '0'){
	// 			$facility_availability = 'Available';
	// 		}
	// 		else if($facility_availability == '1'){
	// 			$facility_availability = 'Unavailable';
	// 		}

	// 		print_r($facility_availability);
	// 		$datatoupdate = elements(array('name', 'type','status'), array('name' => $facility_name, 'type' => $facility_type_selected,'status'=> $facility_availability));

	// 		$updated = $this->facilities->update($facilityid, $datatoupdate);

	// 		$this->system_message->set_success('Updated');

	// 	}



	// 	// $type = substr(implode(', ', $this->input->post('type')), 0);
		
	// 	$this->mPageTitle = 'Edit Facility';

	// 	$this->mViewData['form'] = $form;
	// 	$this->mViewData['data'] = $data;
	// 	$this->mViewData['facility_type'] = $facility_type;
	// 	$this->mViewData['facility_type_all'] = $facility_type_all;
	// 	$this->mViewData['array'] = $array;
	// 	$this->mViewData['availability'] = $availability;

		
	// 	$this->render('facility/editfacility');
	// }

	public function viewMeal($facilityid){

		$this->load->model('meal_model', 'meals');
		$this->load->model('type_meal_model', 'mealtypes');

		$mealdata = $this->meals->get($facilityid);;
		$mealtypedata = $this->mealtypes->get_all();

		for ($j = 0; $j < count($mealdata); $j++) {
			if($mealdata->type == $mealtypedata[$j]->id){
				$mealdata->type = $mealtypedata[$j]->name;
			}
		}; 

		$this->mViewData['meal'] = $mealdata;

		$this->mPageTitle = 'Meal';
		$this->render('meal/viewmeal');

	}

	public function deletemeal($mealid){

		$this->load->model('meal_model', 'meals');
		$this->meals->delete($mealid);
		$this->view_all();

	}

	// public function doneviewmeal(){

	// 	$this->view_all2();

	// }
	// public function facilitytype(){
	// 	$this->load->model('facility_type_model', 'facilitietypes');
	// 	$this->mViewData['facility_types'] = $this->facilitietypes->get_all();
	// 	$this->mPageTitle = 'Facility Type';
	// 	$this->render('facility/facilitytype');
	// }

	public function editmeal($mealid){

		$form = $this->form_builder->create_form();


		$this->load->model('meal_model', 'meals');
		$this->load->model('type_meal_model', 'mealtypes');
		$this->load->model('meal_time_serving', 'meal_time_servings');




		$mealdata = $this->meals->get($mealid);

		$meal_type = $this->mealtypes->get_all();

		$meal_time_serving = $this->meal_time_servings->get_all();


		$mealtype = array();
		$mealtimeserving = array();
		$availability = array('unavailabile', 'available');

		$selected_type = array($mealdata->type-1);
		$selected_timeserving = array($mealdata->time_serving-1);
		$selected_availability = array($mealdata->status);

		for ($x = 0; $x < count($meal_type); $x++) {
		    array_push($mealtype,$meal_type[$x]->name);
		}; 

		for ($x = 0; $x < count($meal_time_serving); $x++) {
		    array_push($mealtimeserving,$meal_time_serving[$x]->name);
		}; 


		if ($form->validate()){
			$meal_type_selected = (int)$this->input->post('type');
			$meal_type_selected = $meal_type_selected+1;
			$meal_type_selected = (string)$meal_type_selected;

			$meal_ttime_serving_selected = (int)$this->input->post('timeserving');
			$meal_ttime_serving_selected = $meal_ttime_serving_selected+1;
			$meal_ttime_serving_selected = (string)$meal_ttime_serving_selected;


			$meal_availability = (int)$this->input->post('availability');

			$meal_name			= $this->input->post('name');
			$meal_ingredient			= $this->input->post('ingredient');


			// if($meal_availability == '0'){
			// 	$meal_availability = 'Available';
			// }
			// else if($meal_availability == '1'){
			// 	$meal_availability = 'Unavailable';
			// }

			$datatoupdate = elements(array('name', 'type','status', 'time_serving', 'ingredient'), array('name' => $meal_name, 'type' => $meal_type_selected,'status'=> $meal_availability, 'time_serving'=> $meal_ttime_serving_selected, 'ingredient'=> $meal_ingredient));
			$this->meals->update($mealid, $datatoupdate);

			$this->system_message->set_success('Updated');

			header("Refresh:0");


		}


		// $type = substr(implode(', ', $this->input->post('type')), 0);
		
		$this->mPageTitle = 'Edit Meal';

		$this->mViewData['form'] = $form;
		$this->mViewData['meal'] = $mealdata;
		// $this->mViewData['facility_type'] = $facility_type;
		// $this->mViewData['facility_type_all'] = $facility_type_all;
		$this->mViewData['mealtype'] = $mealtype;
		$this->mViewData['mealtimeserving'] = $mealtimeserving;
		$this->mViewData['availability'] = $availability;
		$this->mViewData['selected_type'] = $selected_type;
		$this->mViewData['selected_timeserving'] = $selected_timeserving;
		$this->mViewData['selected_availability'] = $selected_availability;

		$this->render('meal/editmeal');
	}

	function cycle_all(){

		$this->load->model('cycle_model', 'cycles');

		$cycles = $this->cycles->get_all();


		$this->mViewData['cycles'] = $cycles;

		$this->render('meal/cycle_all');
	}



	function view_cycle($cycleid){
		$this->load->model('cycle_model','cycles');
		$cycle = $this->cycles->get($cycleid);
		$this->mViewData['cycle'] = $cycle;

		$this->render('meal/view_cycle');
	}

	function add_cycle(){

		$form = $this->form_builder->create_form();


		$this->load->model('cycle_model','cycles');

		$this->mPageTitle = 'Add New Cycle';

		$this->mViewData['form'] = $form;

		$this->render('meal/add_cycle');
	}

	function meal_on_cycle($cycleid){

		$this->load->model('meal_cycle_model','cycles');

		$this->load->model('meal_model','meals');

		$this->load->model('type_meal_model', 'type_meals');

		$this->load->model('cycle_model', 'cycless');

		$cycle_name = $this->cycless->get($cycleid)->name;
		$cycle_start = $this->cycless->get($cycleid)->start_date;
		$cycle_end = $this->cycless->get($cycleid)->end_date;

		$cycle = $this->cycles->get_many_by(["cycle=$cycleid"]);

		$array_of_meal_id = array();

		for ($x = 0; $x < count($cycle); $x++) {
		    array_push($array_of_meal_id,$cycle[$x]->meal);
		}; 



		$meals = $this->meals->get_many($array_of_meal_id);

		$mealtypes = $this->type_meals->get_all();

		for ($x = 0; $x < count($meals); $x++) {
			for ($j = 0; $j < count($mealtypes); $j++) {
				if($meals[$x]->type == $mealtypes[$j]->id){
					$meals[$x]->type = $mealtypes[$j]->name;
				}
			}
		}; 




		$this->mViewData['meals'] = $meals;
		$this->mViewData['cycleid'] = $cycleid;
		// $this->mPageTitle = 'Meal';




		$this->mPageTitle = 'Cycle '.$cycle_name.' ('.$cycle_start.' - '.$cycle_end.')'  ;

		$this->render('meal/meal_on_cycle');

	}

	function add_to_cycle($cycleid){
			

		$this->load->model('meal_cycle_model','cycles');

		$form = $this->form_builder->create_form();


		$cycle = $this->cycles->get_many_by(["cycle=$cycleid"]);

		$this->load->model('meal_model', 'meals');
		$this->load->model('type_meal_model', 'type_meals');

		$meals = $this->meals->get_all();
		$mealtypes = $this->type_meals->get_all();

		$meal_to_be_display = array();
		$has_meal = false;


		for ($x = 0; $x < count($meals); $x++) {
			$has_meal = false;
			for($j = 0; $j < count($cycle); $j++){
				if($meals[$x]->id == $cycle[$j]->meal){
					$has_meal = true;
				}
			}
			if(!$has_meal){
				array_push($meal_to_be_display, $meals[$x]);
			}
		}; 






		for ($x = 0; $x < count($meals); $x++) {
			for ($j = 0; $j < count($mealtypes); $j++) {
				if($meals[$x]->type == $mealtypes[$j]->id){
					$meals[$x]->type = $mealtypes[$j]->name;
				}
			}
		}; 




		$this->mViewData['meals'] = $meal_to_be_display;
		$this->mViewData['form'] = $form;

		$this->render('meal/add_meal_to_cycle');
	}


}
