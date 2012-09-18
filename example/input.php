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

/** 
* Drop a pre so the output is readable
*/
echo '<pre>';

/**
* Positive Case
*/
$mimic = array(
	'name' => 'Jesse'
	,'age' => 27
);
	
try {
	$input = new jream\Input($mimic);
	$input	->post('name')
			->format('ifeq', array('Jesse', 'life'))
/*			
			// ->validate('len', array(1,6))
			// ->validate('minlen', 1)
			// ->validate('maxlen', 5)
			// ->validate('match', 'dog')*/
// /?
			->validate('matchany', array(1,2,3,4))
			->validate('greaterthan', 5)
			->validate('lessthan', 4)
			->post('age')
			->validate('digit');

	$input->submit();
	print_r($input->fetch());
} catch (Exception $e) {
	echo $e->getMessage();
}

try {
	$input = new jream\Input($mimic);
	$input	->post('name')
			->validate('matchany', array('JeSSe', 'Joey', 'jenny'), false) // case-insensitive
			//->validate('matchany', array('JeSSe', 'Joey', 'jenny')) // case-sensitive
	
			->post('age')
			->validate('digit');

	$input->submit();
	print_r($input->fetch());
} catch (Exception $e) {
	echo $e->getMessage();
}

echo '<hr />';

/**
* Negative Cases
*/
try {
	$input = new jream\Input(array('name' => 'Jesse', 'age' => 25));
	$input	->post('name')
			->validate('minlength', 5)
			
			->post('age')
			->validate('greaterthan', 24);

	$input->submit();
} catch (Exception $e) {
	echo $e->getMessage() . '<br />';
}

try {
	$input = new jream\Input(array('name' => 'Jesse', 'age' => 25, 'gender' => 'm'));
	$input	->post('name')
			->validate('maxlength', 4)
			->error('This is a custom error message')
			
			->post('age')
			->validate('agemin', 12)
			
			->post('gender')
			->validate('eq', 'f');
			
	$input->submit();
} catch (Exception $e) {
	echo $e->getMessage() . '<br />';
}


echo '<hr />';

// For some JS money money money...
try {
	$input = new jream\Input(array('name' => 'Jesse', 'age' => 25, 'gender' => 'm'));
	$input	->post('name')
			->validate('maxlength', 4)
			->error('This is a custom error message')
			
			->post('age')
			->validate('eq', 12)
			
			->post('gender')
			->validate('eq', 'f');
			
	$input->submit();
} catch (jream\Exception $e) {
	$z = $e->fetchArray();
}