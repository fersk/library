<?php
/**
 * @author		Jesse Boyer <contact@jream.com>
 * @copyright	Copyright (C), 2011-12 Jesse Boyer
 * @license		GNU General Public License 3 (http://www.gnu.org/licenses/)
 *				Refer to the LICENSE file distributed within the package.
 *
 * @link		http://jream.com

 --------------- 
 PROTOTYPE CLASS
 DONT USE
 ---------------
 
	CREATE TABLE IF NOT EXISTS `cache` (
	  `cacheid` varchar(40) NOT NULL,
	  `data` text NOT NULL,
	  `time` int(11) unsigned NOT NULL,
	  PRIMARY KEY (`cacheid`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;

	$cache = new jream\Cache();
	$cacheData = $cache->exists(sha1($query));
	
	if ($cacheData == false || time() > $cacheData['time'])
	{
		$result = 'cached data';
		$cache->save(sha1($query), json_encode($result));
	}
	else
	{
		$result = $cacheData['data'];
	}
	
 */
namespace jream\Database;
class Cache
{
	/**
	*	__construct
	*	*/
	public function __construct($expires = 50)
	{
		$this->_expires = $expires;
		/**
		* Get the database connection
		*/
		$db = \jream\Registry::get('db');

		if ($db == false)
		throw new \jream\Exception('Database not found');
		
		$this->db = $db;		
	}
	
	/**
	*	exists - Checks if a cache record exists
	*
	*	@param string $key The key to look for
	*
	*	@return integer|boolean The time cache was saved or false
	*/
	public function exists($cacheid)
	{
		/**
		* Keep the keys uniform
		*/
		$result = $this->db->select("SELECT * FROM cache WHERE cacheid = :cacheid", array("cacheid" => $cacheid));

		if (!empty($result))
		return $result[0];
		
		else
		return false;
	}
	
	/**
	*	submit - Adds/Updates a record if the set time has elapsed
	*/
	public function save($cacheid, $data)
	{
		$this->db->insertUpdate("cache", array("cacheid" => $cacheid, "data" => $data, "time" => time() + $this->_expires));
	}

}