<?php
/**
 * @author      Jesse Boyer <contact@jream.com>
 * @copyright   Copyright (C), 2011-12 Jesse Boyer
 * @license     GNU General Public License 3 (http://www.gnu.org/licenses/)
 *              Refer to the LICENSE file distributed within the package.
 *
 * @link        http://jream.com
 * 
 */
namespace jream\mvc;
class Controller
{

    /** @var object $view Set from the bootstrap */
    public $view;
    
    /** @var string $pathModel Reusable path declared from the bootstrap */
    public $pathModel;
    
    /**
    * __construct - Required
    */
    public function __construct() 
    {
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
	
    /**
     * __call - Error Catcher
     * 
     * @param string $name
     * @param string $arg
     */
    public function __call($name, $arg) {
            die("<div>Controller Error: (Method) <b>$name</b> is not defined</div>");
    }
    
}