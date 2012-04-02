<?php
/**
 * @author		Jesse Boyer <contact@jream.com>
 * @copyright	Copyright (C), 2011-12 Jesse Boyer
 * @license		GNU General Public License 3 (http://www.gnu.org/licenses/)
 *				Refer to the LICENSE file distributed within the package.
 *
 * @link		http://jream.com
 * @category	Form
 */
namespace jream\Form;
class Format
{

	/**
	 * call - Run any PHP function to format
	 * 
	 * @param string $call
	 * @param string $param
	 * 
	 * @return string
	 * 
	 * @throws Exception Upon invalid function
	 */
	public function call($call, $param)
	{
		if (!function_exists())
		throw new Exception(__CLASS__ . ": Invalid formatting: $call (Invalid Function)");
		
		else
		return call_user_func($call, $param);
	}
	
}