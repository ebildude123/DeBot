<?php
// RawEval Module Constants
define( 'AUTH_CHAN', '#tybg' ); // This is so if someone leaves chan, they are logged out

// Cmd Module Constants
define( 'CMD', '@' ); // For the Cmds module, what all commands start with
define( 'CMD_RAW', ';;' ); // What the raw command starts with
define( 'CMD_ERROR', '10(5Error10)' ); // Used for echoing error
define( 'CMD_SUCCESS', '10(3Success10)' ); // Used for echoing success

// Log Module Constants
define( 'LOGS_DEBUG', true ); // For the log module later

// This is a failsafe if your PHP is configured incorrectly.
define( 'TIME_ZONE', 'America/Los_Angeles' );

// General config
$server = array(
	"server" => "irc.gamergalaxy.net",
	"port" => 6667,
	"ssl" => false
);

$ownerNick = "Himeragi";
$numberOfBots = 3;
// Don't edit above this line

$aConfig = array
(
	'TickRate' => 5000,
	'GlobalModules' => array('DynamicTick'),
	'Modules' => array(),
	'Servers' => array
	(
		"main" => $server		
	),
	'Default' => array
	(
		'ident'		=> 'c4c4c4',
		'real'		=> 'ffffff',
		'defBot'	=> false,
		'useThread'	=> true,
		'networks'	=> array
		(
			'main' => array
			(
				'bind' => null,
				'onConnect' => array
				(
					'',
				),
			),
		),
		'Modules'	=> array
		(
			'RawEval',
			'Cmds',
		),
		'onConnect' => array
		(
			""
		),
	),

	'Bots' => array
	(
	),

	'Users' => array
	(
		'*!*@*' => array
		(
			'Level'	=> 5,
			'Pass'	=> 'xxxxxnotworkxxxxx'
		),
	),
	
	"Owner" => $ownerNick
);

$randInfo = new RandomInfo(__DIR__ . "/botnet/names.txt");
for ($i = 0; $i < $numberOfBots; $i++) {
	$aConfig["Bots"][$randInfo->nick()] = array(
		"ident" => $randInfo->ident(),
		"real" => $randInfo->realName(),
		"defBot" => ($i == 0),
		"networks" => array(
			"main" => array(
				"bind" => null,
				"onConnect" => array("")
			)
		),
		"onConnect" => array(
			"JOIN " . AUTH_CHAN
		),
		"Modules" => array(
			"RawEval",
			"Cmds"
		)
	);
}
?>
