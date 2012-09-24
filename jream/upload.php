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
namespace jream;
class Upload
{

	/** @var string $_name The name of the field to post */
	private $_name;
	
	/** @var string $_name The directory to save to*/
	private $_directory;
	
	/** @var string $_saveAs The name of the file to save as */
	private $_saveAs;
	
	/** @var boolean $_overwrite To overwrite a file if it exists */
	private $_overwrite = true;
		
	/**
	 * __construct - Prepares a file for upload
	 * 
	 * @param string $name The form name value to post
	 * @param string $directory The directory to save to
	 * @param string $required Is this file required
	 * @param string $saveAs (Default: false) Set a name to save it as a custom name (Extension will be automatically added)
	 * 
	 * @return boolean
	 * 
	 * @throws \Exception 
	 */
	public function __construct($name, $directory, $saveAs = false, $overwrite = true)
	{
		/**
		 * Set the class-wide properties 
		 */
		$this->_name = $name;
		$this->_directory = trim($directory, '/') . '/';
		$this->_saveAs = ($saveAs == true) ? $saveAs : $name;
		$this->_overwrite = $overwrite;

		/**
		 * Make sure the pathSave is a directory
		 */
		if (!is_dir($this->_directory)) 
		throw new \Exception("must be a directory: {$this->_directory}");
		
		/**
		 * Get the octal permission of the directory, eg: 0777
		 * Note: This turns the permission into a (string)
		 */
		$writable = substr(sprintf('%o', fileperms($this->_directory)), -4);
		
		if ($writable != "0777") 
		throw new \Exception("directory is not writable: {$this->_directory}");
		  
		if ($overwrite == false && file_exists($this->_directory . $this->_saveAs))
		throw new \Exception("file already exists and cannot be overwritten: {$this->_directory}{$this->_saveAs}");
	}
	
	/**
	 * submit() - This is to be called from the input\Submit() method, so it only tries to save when the form is complete
	 * 
	 * @return boolean
	 */
	public function submit()
	{
        $input = fopen("php://input", "r");
        $temp = tmpfile();
        $size = stream_copy_to_stream($input, $temp);
        fclose($input);
        
        /** Make sure the file uploads completely */
        if ($realSize != $_SERVER["CONTENT_LENGTH"]) 
        throw new \Exception('The file had a problem uploading.');
       
        /** Write to our desired location */
        $target = fopen($this->_directory . $this->_saveAs, 'w');
        fseek($temp, 0, SEEK_SET);
        stream_copy_to_stream($temp, $target);
        fclose($target);
        
		return $this->_saveAs;
	}
	
}