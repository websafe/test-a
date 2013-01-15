Quickstart for PHP Markdown users
=================================

Create a project directory:

~~~~
mkdir my-markdown-test
cd my-markdown-test
~~~~


Now create a `composer.json` file:


~~~~
touch composer.json
~~~~


with this content:


~~~~ json
{
	"name": "my/markdown-test",
	"type": "library",
	"description": "My Markdown test",
	"require": {
	    "php": ">=5.3.0"
	},
	"autoload": {
    	    "psr-0": {
    		"Michelf\\Markdown\\Parser\\": "src/library",
    	    }
	}
}
~~~~


And run composer:

~~~~
composer -v update
~~~~


Create a PHP script in your projetc's root:

~~~~
touch my-markdown-test.php
~~~~

with this content:

~~~~ php
<?php
require 'vendor/autoload.php';
use Michelf\Markdown\Parser\Extra as MarkdownParser;
$mp = new MarkdownParser();
echo $mp->transform("This is a test\n==============\n\nBlah blah\n\n");
~~~~

Easy?
