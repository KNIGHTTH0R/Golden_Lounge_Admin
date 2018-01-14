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
class Meetingroom extends API_Controller {

	/**
	 * @SWG\Get(
	 * 	path="/meetingroom",
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Sample result",
	 * 		@SWG\Schema(type="array", @SWG\Items(ref="#/definitions/FacilityItem"))
	 * 	)
	 * )
	 */
	public function index_get() {
		$this->load->model('meetingroom_model', 'meetingroom');
		$data = $this->meetingroom->get_all();
		$this->response($data);
	}

	/**
	 * @SWG\Get(
	 * 	path="/meetingroom/id/{id}",
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
		$this->load->model('meetingroom_model', 'meetingroom');
		$data = $this->meetingroom->get($id);
		$this->response($data);
	}


	/**
	 * @SWG\Post(
	 * 	path="/meetingroom/add",
	 * 	@SWG\Parameter(
	 * 		in="body",
	 * 		name="body",
	 * 		description="Facility Detail",
	 * 		required=true,
	 * 		@SWG\Schema(ref="#/definitions/MeetingroomAdd")
	 * 	),
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Sample result",
	 * 	)
	 * )
	 */
	public function index_post()
	{
		$this->load->model('meetingroom_model', 'meetingroom');
		$data = elements(array('room_name', 'passenger_name', 'time_start', 'time_end', 'remarks'), $this->post());
		$updated = $this->meetingroom->insert($data);
		$this->response($updated);
	}




}
