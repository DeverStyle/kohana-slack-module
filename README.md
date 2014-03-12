kohana-slack-module
===================

Kohana Slack module


Add the module in bootstrap.php.
```php
'slack'	=> MODPATH.'slack',
```

Copy the module config into your application config folder.

Example usage:
```php
$slack = new Slack();
$slack->notify(array(
	'channel'		=> '#my-awesome-channel',	//optional, has default config
	'username'		=> 'My Awesome Bot',		//optional, has default config
	'text'			=> 'Hello worl!',
	'icon_emoji'	=> ':mouse:',				//optional, has default config
));
```
