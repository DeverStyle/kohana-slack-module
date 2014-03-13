<?php defined('SYSPATH') or die('No direct script access.');

class Slack
{
	public function __construct($config = 'slack')
	{
		$this->config = Kohana::$config->load($config);
	}
	
	public function notify($options)
	{
		//default settings
		$settings = array('channel', 'username', 'icon_emoji');
		foreach($settings as $setting):
			if (!array_key_exists($setting, $options)):
				$options[$setting] = (version_compare(Kohana::VERSION, '3.2', '<')) ? $this->config->{$setting} : $this->config->get($setting);
			endif;
		endforeach;
		
		//url to post to
		if (version_compare(Kohana::VERSION, '3.2', '<')):
			$url = $this->config->webhook_url.'?token='.$this->config->token;
		else:
			$url = $this->config->get('webhook_url').'?token='.$this->config->get('token');
		endif;
		
		$data = array('payload' => json_encode($options));
		
		$ch = curl_init($url);
		//set options
		$options = array(
			CURLOPT_POST				=> 1,
			CURLOPT_POSTFIELDS			=> http_build_query($data),
			CURLOPT_TIMEOUT				=> (version_compare(Kohana::VERSION, '3.2', '<')) ? $this->config->timeout : $this->config->get('timeout'),
			CURLOPT_RETURNTRANSFER		=> true
		);
		curl_setopt_array($ch, $options);
		curl_exec($ch);
		
		$code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
		curl_close($ch);
		
		return ($code == 200) ? true : false;
	}
}