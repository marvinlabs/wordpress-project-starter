WordPress Project Starter
=========================

A basic structure to easily start a WordPress project

## Creating a new project

1. Edit wp-config
    1. Define $app_name, $db_servers
	1. If necessary, define $table_prefix and $web_servers
	1. Generate salt keys from https://api.wordpress.org/secret-key/1.1/salt/
	1. If necessary enter specific code to be run below that configuration info
1. Edit .htaccess
	1. For dev and test servers, copy .htaccess.dev to .htaccess and replace {app_name} by the real app name
	1. For prod server, copy .htaccess.prod to .htaccess
