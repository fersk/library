<?php
/**
 * @author		Jesse Boyer <contact@jream.com>
 * @copyright	Copyright (C), 2011-12 Jesse Boyer
 * @license		GNU General Public License 3 (http://www.gnu.org/licenses/)
 *				Refer to the LICENSE file distributed within the package.
 *
 * @link		http://jream.com
 */
namespace jream\MVC;
use \jream\Registry;
class Controller
{

	/** @var object $view Set from the bootstrap */
	public $view;
	
	/** @var object $model Set from the bootstrap */
	public $model;
	
	/** @var array $segments The URI segments */
	public $segments;

	/** @var string $pathModel Reusable path declared from the bootstrap */
	public $pathModel;
	
	/**
	* __construct - Required
	*/
	public function __construct() 
	{
		$this->segments = Registry::get('segments');
		$this->view = Registry::get('view');
		$this->model = Registry::get('model');
	}

	/**
	 * 
	 * @param string $model
	 * @return \jream\MVC\model
	 */
	public function loadModel($model)
	{
		$model = $model . '_model';
		require_once($this->pathModel . $model . '.php');
		return new $model;
	}
	
	/**
	* location - Shortcut for a page redirect
	*
	* @param string $url 
	*/
	public function location($url)
	{
		header("location: $url");
		exit(0);
	}
	
}