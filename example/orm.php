<?php
/**
 * @author		Jesse Boyer <contact@jream.com>
 * @copyright	Copyright (C), 2011-12 Jesse Boyer
 * @license		GNU General Public License 3 (http://www.gnu.org/licenses/)
 *				Refer to the LICENSE file distributed within the package.
 *
 * @link		http://jream.com
 */
require_once '../jream/orm.php';

require 'orm/user.php';
jream\ORM::$user = 'root';
jream\ORM::$name = 'cliplemon';

// Insert 1
$user = new User();
$user->name = 'jesse';
$user->save();

// Update Many
$user->find("*");
$user->result[0]['name'] = 'Todd';
$user->result[1]['name'] = 'Ben';
$user->save();

// Update 1
$user->find("Itemid = 1");
$user->name = 'Dogs';
$user->save();

// Delete 1
$user->find("itemid = 2");
$item->delete();

// Delete Many
$user->find("*");
$user->delete();










