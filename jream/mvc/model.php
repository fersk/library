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
class Model
{

    /**
    * __construct - Include database object if defined
    */
    public function __construct()
    {
    }
    
	/**
	 * __call - Error Catcher
	 * 
	 * @param string $name
	 * @param string $arg
	 */
	public function __call($name, $arg) {
		die("<div>Model Error: (Method) <b>$name</b> is not defined</div>");
	}
}