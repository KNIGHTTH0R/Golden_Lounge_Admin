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
class Meal extends API_Controller {

	/**
	 * @SWG\Get(
	 * 	path="/meal",
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Sample result",
	 * 		@SWG\Schema(type="array", @SWG\Items(ref="#/definitions/MealItem"))
	 * 	)
	 * )
	 */
	public function index_get() {
		$this->load->model('meal_model', 'meals');
		$data = $this->meals
		->get_all();
		$this->response($data);
	}


	/**
	 * @SWG\Get(
	 * 	path="/meal/id/{id}",
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
	 * 		@SWG\Schema(ref="#/definitions/MealItem")
	 * 	)
	 * )
	 */
	public function id_get($id)
	{
		$this->load->model('meal_model', 'meals');
		$data = $this->meals
		->get($id);
		$this->response($data);
	}


	/**
	 * @SWG\Get(
	 * 	path="/meal/type_id/{id}",
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
	 * 		@SWG\Schema(ref="#/definitions/MealItem")
	 * 	)
	 * )
	 */
	public function type_id_get($id)
	{
		$this->load->model('meal_model', 'meals');
		$data = $this->meals
		->get_many_by(["type=$id"]);
		$this->response($data);
	}



}
