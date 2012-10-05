<!doctype html>
<html>
<head>
    <title>JREAM Library Example</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<div id="wrap">
<header><h1>jream\Hash</h1></header>
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

echo "<b>Without Salt</b>" . PHP_EOL;

foreach (hash_algos() as $algo)
{
    echo "<pre>";
	echo $algo . ": " . jream\Hash::create($algo, 'password') . PHP_EOL;
    echo "</pre>";
}

echo PHP_EOL;

echo "<b>With Salt</b>" . PHP_EOL;
foreach (hash_algos() as $algo)
{
    echo "<pre>";
	echo $algo . ": " . jream\Hash::create($algo, 'password', 'secret_salted_string!') . PHP_EOL;
    echo "</pre>";
}



//jream\Output::success('hello');
//jream\Output::json('hello');

?>


</div>
<!-- end:Wrap -->

<footer>
	(C) 2011 - 2012 Jesse Boyer &lt;http://jream.com&gt;
</footer>

</body>
</html>