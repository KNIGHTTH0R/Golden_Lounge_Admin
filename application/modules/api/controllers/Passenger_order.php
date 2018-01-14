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
class Passenger_order extends API_Controller {

	/**
	 * @SWG\Get(
	 * 	path="/passenger_order",
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Sample result",
	 * 		@SWG\Schema(type="array", @SWG\Items(ref="#/definitions/FacilityItem"))
	 * 	)
	 * )
	 */
	public function index_get() {
		$this->load->model('passenger_order_model', 'passenger_order');
		$data = $this->passenger_order->get_all();
		$this->response($data);
	}

	/**
	 * @SWG\Get(
	 * 	path="/passenger_order/id/{id}",
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
	 * 		@SWG\Schema(ref="#/definitions/PassengerOrdeItem")
	 * 	)
	 * )
	 */
	public function id_get($id)
	{
		$this->load->model('passenger_order_model', 'passenger_order');
		$data = $this->passenger_order->get($id);
		$this->response($data);
	}

	/**
	 * @SWG\Post(
	 * 	path="/passenger_order/add",
	 * 	@SWG\Parameter(
	 * 		in="body",
	 * 		name="body",
	 * 		description="Facility Detail",
	 * 		required=true,
	 * 		@SWG\Schema(ref="#/definitions/PassengerOrderAdd")
	 * 	),
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Sample result",
	 * 	)
	 * )
	 */
	public function index_post()
	{
		$this->load->model('passenger_order_model', 'passenger_order');
		$data = elements(array('name', 'passenger_order', 'time'), $this->post());
		$updated = $this->passenger_order->insert($data);
		$this->response($updated);
	}

}








