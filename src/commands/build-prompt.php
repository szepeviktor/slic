<?php
/**
 * Handles a request to toggle the build prompt on and off.
 *
 * @var bool    $is_help  Whether we're handling an `help` request on this command or not.
 * @var Closure $args     The argument map closure, as produced by the `args` function.
 * @var string  $cli_name The current name of the `slic` CLI application.
 */

namespace StellarWP\Slic;

if ( $is_help ) {
	$help = <<< HELP
	Activates or deactivates whether or not composer/npm build prompts should be provided.

	USAGE:

		<yellow>{$cli_name} build-prompt (on|off|status)</yellow>

	EXAMPLES:

		<light_cyan>{$cli_name} build-prompt on</light_cyan>
		Turns on prompting for running composer/npm commands in subdirectories.

		<light_cyan>{$cli_name} build-prompt off</light_cyan>
		Turns off prompting for running composer/npm commands in subdirectories.

		<light_cyan>{$cli_name} build-prompt status</light_cyan>
		Gives the current setting for running composer/npm commands in subdirectories.
	HELP;

	echo colorize( $help );
	return;
}

$interactive_args = args( [ 'toggle' ], $args( '...' ), 0 );

slic_handle_build_prompt( $interactive_args );

echo colorize( "\n\nToggle this setting by using: <light_cyan>slic build-prompt [on|off]</light_cyan>\n" );
echo colorize( "- on:  commands will prompt for composer/npm installs.\n" );
echo colorize( "- off: commands will NOT prompt for composer/npm installs.\n" );
