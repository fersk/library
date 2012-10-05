<!doctype html>
<html>
<head>
    <title>JREAM Library Example</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<div id="wrap">
<header><h1>jream\input\Format</h1></header>
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

$format = new jream\input\Format();

echo $format->number_format(500, 2);

echo "<br />";

echo $format->htmlentities('<b>Testing</b>');

echo "<br />";

echo $format->hash('Secret Code', array('sha256', 'secret key is optional'));

echo "<br />";

/**
 * There is a replace method so this isn't really necessary: 
 */
echo $format->str_replace('T', 'Z', 'This is a Test Okay');

echo "<br />";

echo $format->replace('This is my life', array('i', 'X'));

?>

</div>
<!-- end:Wrap -->

<footer>
	(C) 2011 - 2012 Jesse Boyer &lt;http://jream.com&gt;
</footer>

</body>
</html>