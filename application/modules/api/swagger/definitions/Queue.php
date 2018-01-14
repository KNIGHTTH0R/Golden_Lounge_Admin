<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Swagger Definitions
|--------------------------------------------------------------------------
| Example: https://github.com/zircote/swagger-php/tree/master/Examples/petstore.swagger.io/models
*/

// To avoid class naming conflicts when defining Swagger Definitions
namespace MySwaggerDefinitions;

/**
 * @SWG\Definition()
 */
class QueueItem {
	
	/**
	 * @var int
	 * @SWG\Property()
	 */
	public $id;
}

/**
 * @SWG\Definition()
 */
class AddQueue {
	






	/**
	 * @var string
	 * @SWG\Property()
	 */
	public $facility_id;


	/**
	 * @var string
	 * @SWG\Property()
	 */
	public $passenger_id;

	/**
	 * @var string
	 * @SWG\Property()
	 */
	public $time_start;

	/**
	 * @var string
	 * @SWG\Property()
	 */
	public $time_end;
}


