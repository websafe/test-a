Quickstart for PHP Markdown developers
======================================

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
    "require-dev": {

    },
    "autoload": {
        "psr-0": {
            "Michelf\\Markdown\\Parser\\": "src/library",
            "MichelfTest\\": "src/tests"
        }
    }
}
~~~~


And run composer:

~~~~
composer -v update --dev
~~~~



Running PHPUnit tests
---------------------

