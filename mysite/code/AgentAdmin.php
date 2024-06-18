<?php

class AgentAdmin extends ModelAdmin {

	private static $menu_title = 'Agent';

	private static $url_segment = 'agent';

	private static $managed_models = [
		'AgentData'
	];

	private static $menu_icon = 'mysite/icons/agent.png';
}
