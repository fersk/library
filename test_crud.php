<?php
/**
 * @author		Jesse Boyer <contact@jream.com>
 * @copyright	Copyright (C), 2011-12 Jesse Boyer
 * @license		GNU General Public License 3 (http://www.gnu.org/licenses/)
 *				Refer to the LICENSE file distributed within the package.
 *
 * @link		http://jream.com
 */
require_once 'jream/Autoload.php';

new jream\Autoload('jream/');

$db = array(
	'type' => 'mysql'
	,'host' => 'localhost'
	,'name' => 'jream_test'
	,'user' => 'root'
	,'pass' => ''
);


$db = new jream\Database($db);
$crud = new jream\Crud($db);
$crud->load('user');