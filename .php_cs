<?php
use Symfony\CS\FixerInterface;
use Symfony\CS\Finder\DefaultFinder;
use Symfony\CS\Config\Config;

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->in(__DIR__)
;
/**
 * @link https://github.com/fabpot/PHP-CS-Fixer
 */
return Symfony\CS\Config\Config::create()
    ->fixers(array(
	'indentation',
	'linefeed',
	'trailing_spaces',
	'unused_use',
	'php_closing_tag',
	'short_tag',
	'return',
	'visibility',
	'braces',
	'phpdoc_params',
	'eof_ending',
	'extraempty_lines',
	'include',
	'psr0',
	'controls_spaces',
	'elseif'
    ))
    ->finder($finder)
;
