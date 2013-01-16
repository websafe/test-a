websafe-michelf-markdown-parser-psr
===================================

`websafe-michelf-markdown-parser-psr` is a PSR-0 compliant version of
[Michel Fortin]'s **[PHP Markdown]** library ([branch: extra]), enhanced with
a [PHPUnit] test suite, composer.json and more.

 + Current build status: [![Build Status](https://travis-ci.org/websafe/test-a.png?branch=master)](https://travis-ci.org/websafe/test-a/)
 + Current build based on [Michel Fortin]'s **[PHP Markdown]** [branch: extra]
   commit:




Table of content
--------------------------------------------------------------------------------

 1. [Features](#features)
 2. [Quickstart](#quickstart)
 3. [Milestones](#milestones)




Features
--------------------------------------------------------------------------------

 + [PSR-0] compliant - the migration process from [Michel Fortin]'s
   [PHP Markdown] [branch: extra] to a PSR-0 compliant library is done by
   a buildscript (not a part of this repo) in an fully automated way.
 + [PHPUnit] test suite for Markdown parsers. Easy creation of test cases
   without PHPUnit knowledge.
 + [Composer] ready/compliant package - `composer.json` shipped.
 + Fixed PHP code with [Fabien Potencier]'s [PHP-CS-Fixer].
 + [PHP_CodeSniffer] reports for [Michel Fortin] and the
   [PHP Markdown community].
 + [Continuous integration] with [Travis CI]. See project's [Build History].
 + Very handy `build.xml` for [Ant].




Quickstart
--------------------------------------------------------------------------------

Create a project directory:


~~~~
mkdir my-markdown-test
cd my-markdown-test
~~~~


Now create a `composer.json` file in project's root, with this content:


~~~~ json
{
    "name": "my/markdown-test",
    "type": "library",
    "description": "My Markdown test",
    "require": {
        "php": ">=5.3.0",
        "websafe/test-a": "*"
    },
    "minimum-stability": "dev",
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/websafe/test-a.git",
            "reference": "origin/master"
        }
    ]
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
//
require 'vendor/autoload.php';
//
$mp = new Michelf\Markdown\Parser\ExtraParser();
//
echo $mp->transform("Hello!\n======\nIs it me you're looking for?");
~~~~


will return:


~~~~ html
<h1>Hello!</h1>

<p>Is it me you're looking for?</p>

~~~~


Easy?




Quickstart for developers and Markdown hackers ;)
--------------------------------------------------------------------------------

Clone this repos master branch:

~~~~
git clone https://github.com/websafe/test-a.git
cd test-a
~~~~


Now create a `composer.json` file:


~~~~
ant setup-dev-env
~~~~

Now You should have all required tools and dependecies installed in `vendor/`,
accessible via `vendor/bin/*`, or better [Ant].



~~~~
ant phpdoc
~~~~

PHP Documentation is created in `doc/phpdoc/`.


Now run some tests:

~~~~
ant phpunit
~~~~


You think any of the dependencies may have changed? Update Your dev environment

~~~~
ant update-dev-env
~~~~

this will update Composer and all dependencies and recreate missing dirs.






Milestones
--------------------------------------------------------------------------------


### 0.0

 + [PSR-0] autoloader interoperability.
 + [Composer] ready.
 + PhpDocumentor
 + Handy [Ant] `build.xml`.
 + Easy extendable [PHPUnit] test suite.
 + [Continuous integration] with [Travis CI].


### 0.1

 + PSR-1


### 0.2

 + PSR-2




[Michel Fortin]: http://michelf.ca/
[PHP Markdown]: https://github.com/michelf/php-markdown/
[branch: extra]: https://github.com/michelf/php-markdown/tree/extra
[PSR-0]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
[PSR-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
[PSR-2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[Continuous integration]: http://en.wikipedia.org/wiki/Continuous_integration
[Travis CI]: https://travis-ci.org/
[Build History]: https://travis-ci.org/websafe/test-a/builds
[PHP Markdown community]: https://github.com/michelf/php-markdown/issues?state=open
[Fabien Potencier]: http://fabien.potencier.org/
[PHP-CS-Fixer]: https://github.com/fabpot/PHP-CS-Fixer
[Sebastian Bergmann]: http://sebastian-bergmann.de/
[PHPUnit]: https://github.com/sebastianbergmann/phpunit
[Composer]: http://getcomposer.org/
[PHP_CodeSniffer]: https://github.com/squizlabs/PHP_CodeSniffer


--------------------------------------------------------------------------------


Below is the original PHP Markdown README.md


--------------------------------------------------------------------------------

