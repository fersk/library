#### JREAM Library
* * *

# jream/Registry

An internal registry to save and fetch anything at any location.

### Set

	$data = new stdClass();
	jream\Registry::set('data', $data);
	jream\Registry::set('color', 'red');

### Fetch

	$data = jream\Registry::fetch('data');
	$color = jream\Registry::fetch('color');


* * *
Copyright (C), 2011-12 Jesse Boyer (http://jream.com) GNU General Public License 3 (http://www.gnu.org/licenses/)
