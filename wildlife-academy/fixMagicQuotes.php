<?php

/*
 * Strips all slashes from an array or a string
 * @param mixed A string or array from which to strip slashes
 * @param mixex A value matching the first argument with slashes stripped
 */
function stripSlashesDeep($value)
{
	$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
	return $value;
}

// Globally Strip Slashes to fix 'magic_quotes' if enabled
if ( get_magic_quotes_gpc() )
{
	$_GET = stripSlashesDeep( $_GET );
	$_POST = stripSlashesDeep( $_POST );
	$_COOKIE = stripSlashesDeep( $_COOKIE );
	$_REQUEST = stripSlashesDeep( $_REQUEST );
}

?>