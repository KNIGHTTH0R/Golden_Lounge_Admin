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
class mealcycle extends API_Controller {

	/**
	 * @SWG\Get(
	 * 	path="/mealcycle",
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Sample result",
	 * 		@SWG\Schema(type="array", @SWG\Items(ref="#/definitions/MealItem"))
	 * 	)
	 * )
	 */
	public function index_get() {
		$this->load->model('meal_cycle_model', 'meal_cycles');
		$data = $this->meal_cycles
		->get_all();
		$this->response($data);
	}





}
