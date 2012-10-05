<!doctype html>
<html>
<head>
    <title>JREAM Library Example</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<div id="wrap">
<header><h1>jream\Input</h1></header>
<div id="content">
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
			->post('age')
			->validate('digit');

	$input->submit();
	echo "Success\n";
} catch (Exception $e) {
	print_r($input->fetchErrors());
}

try {
	$input = new jream\Input($mimic);
	$input	->post('name')
			->validate('matchany', array('JeSSe', 'Joey', 'jenny'), false) // case-insensitive
			//->validate('matchany', array('JeSSe', 'Joey', 'jenny')) // case-sensitive
	
			->post('age')
			->validate('digit');

	$input->submit();
	echo "Success\n";
} catch (Exception $e) {
	print_r($input->fetchErrors());
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
	print_r($input->fetchErrors());
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
	print_r($input->fetchErrors());
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
} catch (Exception $e) {
	print_r($input->fetchErrors());
}

?>



</div>
<!-- end:Wrap -->

<footer>
	(C) 2011 - 2012 Jesse Boyer &lt;http://jream.com&gt;
</footer>

</body>
</html>