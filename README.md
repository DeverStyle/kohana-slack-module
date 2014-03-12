kohana-slack-module
===================

Kohana Slack module

Copy the module config into your application config, fill it in.

Example usage:

$slack = new Slack();
$slack->notify(array(
	'channel'		=> '#my-awesome-channel',	//optional, has default config
	
	'username'		=> 'My Awesome Bot',		//optional, has default config
	
	'text'			=> 'Hello worl!',
	
	'icon_emoji'	=> ':mouse:',				//optional, has default config
	
));
