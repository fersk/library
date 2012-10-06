#### JREAM Library
* * *

# jream/Output

Outputs JSON data in a common package. Use it for AJAX responses.

### Plain Output 

	$data = array(
		'first_name' => 'Ben', 
		'last_name' => 'Franklin
	');

	jream\Output::json($data);

### Success

	jream\Output::success($data);

	/** Result: **/
	{
		success: 1
		errorMessage: null,
		data: {
			first_name: 'Ben'
			last_name: 'Franklin'
		}
	}

### Error

	jream\Output::error('There was an error')    

	/** Result: **/
	{
		success: 0
		errorMessage: 'There was an error',
		data: null
	}




* * *
Copyright (C), 2011-12 Jesse Boyer (http://jream.com) GNU General Public License 3 (http://www.gnu.org/licenses/)
