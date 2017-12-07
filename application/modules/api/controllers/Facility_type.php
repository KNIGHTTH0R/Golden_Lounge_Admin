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
class Facility_type extends API_Controller {

	/**
	 * @SWG\Get(
	 * 	path="/facility_type",
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Sample result",
	 * 		@SWG\Schema(type="array", @SWG\Items(ref="#/definitions/FacilityItem"))
	 * 	)
	 * )
	 */
	public function index_get() {
		$this->load->model('facility_type_model', 'facility_types');
		$data = $this->facility_types
		->get_all();
		$this->response($data);
	}


	/**
	 * @SWG\Get(
	 * 	path="/facility_type/id/{id}",
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
		$this->load->model('facility_type_model', 'facility_types');
		$data = $this->facility_types
		->get($id);
		$this->response($data);
	}




}
