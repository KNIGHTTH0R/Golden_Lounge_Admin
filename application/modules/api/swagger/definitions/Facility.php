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
class FacilityItem {
	
	/**
	 * @var int
	 * @SWG\Property()
	 */
	public $id;
}

/**
 * @SWG\Definition()
 */
class FacilityAdd {
	


	/**
	 * @var string
	 * @SWG\Property()
	 */
	public $name;

	/**
	 * @var string
	 * @SWG\Property()
	 */
	public $location;

	/**
	 * @var string
	 * @SWG\Property()
	 */
	public $type;
}

