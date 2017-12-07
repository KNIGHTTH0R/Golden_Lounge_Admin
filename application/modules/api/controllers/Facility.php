<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Demo Controller with Swagger annotations
 * Reference: https://github.com/zircote/swagger-php/
 */

/**
 * [IMPORTANT] 
 * 	To allow API access without API Key ("X-API-KEY" from HTTP Header), 
 * 	remember to add routes from /application/modules/api/config/rest.php like this:
 * 		$config['auth_override_class_method']['dummy']['*'] = 'none';
 */
class Facility extends API_Controller {

	/**
	 * @SWG\Get(
	 * 	path="/facility",
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Sample result",
	 * 		@SWG\Schema(type="array", @SWG\Items(ref="#/definitions/FacilityItem"))
	 * 	)
	 * )
	 */
	public function index_get() {
		$this->load->model('facility_model', 'facilities');
		$data = $this->facilities
		->get_all();
		$this->response($data);
	}

	/**
	 * @SWG\Get(
	 * 	path="/facility/id/{id}",
	 * 	@SWG\Parameter(
	 * 		in="path",
	 * 		name="id",
	 * 		description="Facility ID",
	 * 		required=true,
	 * 		type="integer"
	 * 	),
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Sample result",
	 * 		@SWG\Schema(ref="#/definitions/FacilityItem")
	 * 	)
	 * )
	 */
	public function id_get($id)
	{
		$this->load->model('facility_model', 'facilities');
		$data = $this->facilities
		->get($id);
		$this->response($data);
	}


	/**
	 * @SWG\Post(
	 * 	path="/facility/add",
	 * 	@SWG\Parameter(
	 * 		in="body",
	 * 		name="body",
	 * 		description="Facility Detail",
	 * 		required=true,
	 * 		@SWG\Schema(ref="#/definitions/FacilityAdd")
	 * 	),
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Sample result",
	 * 	)
	 * )
	 */
	public function index_post()
	{
		$this->load->model('facility_model', 'facilities');
		$data = elements(array('id', 'name', 'type'), $this->post());

		// proceed to update user
		$updated = $this->facilities->insert($data);

		// result
		($updated) ? $this->success($this->ion_auth->messages()) : $this->error($this->ion_auth->errors());
	}


	/**
	 * @SWG\Put(
	 * 	path="/facility/update/{id}",
	 * 	@SWG\Parameter(
	 * 		in="path",
	 * 		name="id",
	 * 		required=true,
	 * 		type="integer"
	 * 	),
	 * 	@SWG\Parameter(
	 * 		in="body",
	 * 		name="body",
	 * 		description="User info",
	 * 		required=true,
	 * 		@SWG\Schema(ref="#/definitions/FacilityUpdate")
	 * 	),
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Successful operation"
	 * 	)
	 * )
	 */
	public function id_put($id)
	{
		print_r('ssdsdsds');

		$this->load->model('facility_model', 'facilities');
		$data = elements(array('id', 'name', 'type'), $this->post());
		print_r($data);
		$this->facilities->update($id, $data);
	}


}
