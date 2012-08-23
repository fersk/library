<?php
/**
 * @author		Jesse Boyer <contact@jream.com>
 * @copyright	Copyright (C), 2011-12 Jesse Boyer
 * @license		GNU General Public License 3 (http://www.gnu.org/licenses/)
 *				Refer to the LICENSE file distributed within the package.
 *
 * @link		http://jream.com
 *
 * @description	A baby-weight simple ORM
 */
namespace jream;


class ORM
{

	/**
	* @var boolean $_changed Have any properties changed?
	*/
	protected $_changed = array();
	protected $_lastMethod = null;
	protected $db;
	
	/**
	* @var array $result Stores multiple results 
	*/
	public $result = array();
	
	public static $type = 'mysql';
	public static $host = 'localhost';
	public static $name;
	public static $user;
	public static $pass;

	public function __construct()
	{
		$dsn = self::$type . ':dbname=' . self::$name . ';host=' . self::$host;
		$dbh = new \PDO($dsn, self::$user, self::$pass);
	}
	
	public function save()
	{		
		foreach ($_changes as $key => $value) {
		
			if ($this->_lastMethod == 'find')
			{
				// update
			}
			else
			{
				// insert
			}
		}
		// pdo get properties and save
		
		// Empty the array out
		$this->_lastMethod = null;
		$this->_changed = array();
	}
	
	public function delete()
	{
	
	}
	
	public function find()
	{
		$this->_lastMethod = __function__;
		$sth = $this->db->prepare('SELECT * FROM fruit WHERE calories < :calories'));
		$sth->execute(array(':calories' => 150));
		$sth->fetchAll();
		return $this;
	}
	
}