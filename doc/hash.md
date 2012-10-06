#### JREAM Library
* * *

# jream/Hash

It just encrypts a data.

### Create a Hash

	/** Hash something */
    $password = jream\Hash::create('tiger192,4', 'fishing_pole');

	/** Use an encryption key (Recommended) */
    jream\Hash::create('sha256', 'secret_password', 'H@$H_K3Y);
    

This will hash a string with any of the built in PHP hashing algorithms you want to use. It's great for hashing database passwords.



* * *
Copyright (C), 2011-12 Jesse Boyer (http://jream.com) GNU General Public License 3 (http://www.gnu.org/licenses/)
