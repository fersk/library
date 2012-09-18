<?php
/**
 * @author		Jesse Boyer <contact@jream.com>
 * @copyright	Copyright (C), 2011-12 Jesse Boyer
 * @license		GNU General Public License 3 (http://www.gnu.org/licenses/)
 *				Refer to the LICENSE file distributed within the package.
 *
 * @link		http://jream.com
 *
 */
namespace jream\Database;
class Error
{

	/**
	* __construct 
	*/
	public function __construct()
	{
		/**
		* I dont believe this will work right now:
		*/
		parent::__construct();
	}
	
	/**
	* save - Logs an error record in the database
	*
	* @param integer $code Up to 3 digit error code
	* @param string $title (Optional)
	* @param string $description (Optional)
	*
	* @return integer $errorid
	*/
	public function save($code, $title = null, $description = null)
	{
		$errorid = $this->db->insert('error', 
			array('code' => $code, 'title' => $title, 'description' => $description));
		return $errorid;
	}
	
	/**
	* createTable - Creates the error table if one doesn't exist
	*/
	public function createTable()
	{
		$this->db->exec("
			CREATE TABLE IF NOT EXISTS `error` (
				`errorid` int(11) unsigned NOT NULL AUTO_INCREMENT,
				`code` tinyint(3) unsigned NOT NULL DEFAULT '0',
				`title` varchar(255) CHARACTER SET latin1 NOT NULL,
				`description` text CHARACTER SET latin1 NOT NULL,
				`date_added` datetime NOT NULL,
				PRIMARY KEY (`errorid`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		");
	}

}