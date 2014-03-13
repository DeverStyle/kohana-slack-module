###Kohana Slack module
===================

A Kohana module that can be used to post in a slack channel https://slack.com

Get the submodule from git
```
git submodule add git@github.com:DeverStyle/kohana-slack-module.git modules/slack
```

Add the submodule in bootstrap.php.
```php
'slack'	=> MODPATH.'slack',
```

Copy the module config into your application config folder and fill in with data.

Example usage:
```php
$slack = new Slack();
$slack->notify(array(
	'channel'		=> '#my-awesome-channel',	//optional, has default config
	'username'		=> 'My Awesome Bot',		//optional, has default config
	'text'			=> 'Hello world!',
	'icon_emoji'	=> ':mouse:',				//optional, has default config
));
```