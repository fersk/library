#### JREAM Library
* * *

# jream/Autoload
Loads objects only when they are called and needed.

### Using it

A baby could use it.

    require 'library/jream/autoload.php';
	new jream\Autoload('jream/library');
	new jream\Autoload('or/another/folder');

This will iterate a given directory and load each class matching it's file name.



* * *
Copyright (C), 2011-12 Jesse Boyer (http://jream.com) GNU General Public License 3 (http://www.gnu.org/licenses/)
