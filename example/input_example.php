<?php
/**
 * @author		Jesse Boyer <contact@jream.com>
 * @copyright	Copyright (C), 2011-12 Jesse Boyer
 * @license		GNU General Public License 3 (http://www.gnu.org/licenses/)
 *				Refer to the LICENSE file distributed within the package.
 *
 * @link		http://jream.com
 */

require_once '../jream/autoload.php';

new jream\Autoload('../jream/');

if (isset($_REQUEST['run']))
{
	echo '<pre>';
	try {
		$input = new jream\Input();
		$input	->post('name')
				->get('hello')
				->request('hideme')
				->post('agree')
				->format('checkbox')
				->post('box')
				->validate('length', array(1,25));
		
		$input->submit();
		
		print_r($input->fetch());
		
	} catch (Exception $e) {
		print_r($input->fetchErrors());
	}
	echo '</pre>';
}

?>

<form action="?run&hello=yes" method="post">
	<input type="text" name="name" value="Jesse" />
	<input type="checkbox" name="agree" />
	<input type="hidden" name="hideme" value="This is a hidden request grabbed!" />
	<input type="text" name="box" />
	<input type="submit" />
</form>