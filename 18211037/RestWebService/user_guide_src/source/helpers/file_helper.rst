###########
File Helper
###########

The File Helper file contains functions that assist in working with files.

.. contents:: Page Contents

Loading this Helper
===================

This helper is loaded using the following code::

	$this->load->helper('file');

The following functions are available:

read_file()
===========

.. php:function:: read_file($file)

	:param	string	$file: File path
	:returns:	string or FALSE on failure

Returns the data contained in the file specified in the path.

Example::

	$string = read_file('./path/to/file.php');

The path can be a relative or full server path. Returns FALSE (boolean) on failure.

.. note:: The path is relative to your main site index.php file, NOT your
	controller or view files. CodeIgniter uses a front controller so paths
	are always relative to the main site index.

.. note:: This function is DEPRECATED. Use the native ``file_get_contents()``
	instead.

.. important:: If your server is running an **open_basedir** restriction this
	function might not work if you are trying to access a file above the
	calling script.

write_file()
============

.. php:function:: write_file($path, $data, $mode = 'wb')

	:param	string	$path: File path
	:param	string	$data: Data to write to file
	:param	string	$mode: ``fopen()`` mode
	:returns:	bool

Writes data to the file specified in the path. If the file does not exist then the
function will create it.

Example::

	$data = 'Some file data';
	if ( ! write_file('./path/to/file.php', $data))
	{     
		echo 'Unable to write the file';
	}
	else
	{     
		echo 'File written!';
	}

You can optionally set the write mode via the third parameter::

	write_file('./path/to/file.php', $data, 'r+');

The default mode is 'wb'. Please see the `PHP user guide <http://php.net/fopen>`_
for mode options.

.. note: In order for this function to write data to a file, its permissions must
	be set such that it is writable (666, 777, etc.). If the file does not
	already exist, the directory containing it must be writable.

.. note:: The path is relative to your main site index.php file, NOT your
	controller or view files. CodeIgniter uses a front controller so paths
	are always relative to the main site index.

.. note:: This function acquires an exclusive lock on the file while writing to it.

delete_files()
==============

.. php:function:: delete_files($path, $del_dir = FALSE, $htdocs = FALSE)

	:param	string	$path: Directory path
	:param	bool	$del_dir: Whether to also delete directories
	:param	bool	$htdocs: Whether to skip deleting .htaccess and index page files
	:returns:	bool

Deletes ALL files contained in the supplied path.

Example::

	delete_files('./path/to/directory/');

If the second parameter is set to TRUE, any directories contained within the supplied
root path will be deleted as well.

Example::

	delete_files('./path/to/directory/', TRUE);

.. note:: The files must be writable or owned by the system in order to be deleted.

get_filenames()
===============

.. php:function:: get_filenames($source_dir, $include_path = FALSE)

	:param	string	$source_dir: Directory path
	:param	bool	$include_path: Whether to include the path as part of the filenames
	:returns:	array

Takes a server path as input and returns an array containing the names of all files
contained within it. The file path can optionally be added to the file names by setting
the second parameter to TRUE.

Example::

	$controllers = get_filenames(APPPATH.'controllers/');

get_dir_file_info()
===================

.. php:function:: get_dir_file_info($source_dir, $top_level_only)

	:param	string	$source_dir: Directory path
	:param	bool	$top_level_only: Whether to look only at the specified directory
			(excluding sub-directories)
	:returns:	array

Reads the specified directory and builds an array containing the filenames, filesize,
dates, and permissions. Sub-folders contained within the specified path are only read
if forced by sending the second parameter to FALSE, as this can be an intensive
operation.

Example::

	$models_info = get_dir_file_info(APPPATH.'models/');

get_file_info()
===============

.. php:function: get_file_info($file, $returned_values = array('name', 'server_path', 'size', 'date'))

	:param	string	$file: File path
	:param	array	$returned_values: What type of info to return
	:returns:	array or FALSE on failure

Given a file and path, returns (optionally) the *name*, *path*, *size* and *date modified*
information attributes for a file. Second parameter allows you to explicitly declare what
information you want returned.

Valid ``$returned_values`` options are: `name`, `size`, `date`, `readable`, `writeable`,
`executable` and `fileperms`.

.. note:: The *writable* attribute is checked via PHP's ``is_writeable()`` function, which
	known to have issues on the IIS webserver. Consider using *fileperms* instead,
	which returns information from PHP's ``fileperms()`` function.

get_mime_by_extension()
=======================

.. php:function:: get_mime_by_extension($filename)

	:param	string	$filename: File name
	:returns:	string or FALSE on failure

Translates a filename extension into a MIME type based on *config/mimes.php*.
Returns FALSE if it can't determine the type, or read the MIME config file.

::

	$file = 'somefile.png';
	echo $file.' is has a mime type of '.get_mime_by_extension($file);

.. note:: This is not an accurate way of determining file MIME types, and
	is here strictly for convenience. It should not be used for security
	purposes.

symbolic_permissions()
======================

.. php:function:: symbolic_permissions($perms)

	:param	int	$perms: Permissions
	:returns:	string

Takes numeric permissions (such as is returned by ``fileperms()``) and returns
standard symbolic notation of file permissions.

::

	echo symbolic_permissions(fileperms('./index.php'));  // -rw-r--r--

octal_permissions()
===================

.. php:function:: octal_permissions($perms)

	:param	int	$perms: Permissions
	:returns:	string

Takes numeric permissions (such as is returned by ``fileperms()``) and returns
a three character octal notation of file permissions.

::

	echo octal_permissions(fileperms('./index.php')); // 644