websafe-michelf-markdown-parser-psr
================================================================================

`websafe-michelf-markdown-parser-psr` is a [PSR-0] compliant version of
[Michel Fortin]'s **[PHP Markdown]** library ([branch: lib]), automatically
generated by a buildscript, enhanced with a [PHPUnit] test suite, [Composer]
ready, with fixed PHP code and Travis CI integration and more.

<table>
  <caption>Current build status.</caption>
  <tr>
    <th>Branch</th>
    <th>Build status</th>
    <th>Based on commit</th>
  </tr>
  <tr>
    <td><code>master</code></td>
    <td>
        <a href="https://travis-ci.org/websafe/test-a/builds/"
            title="branch master"><img
                src="https://travis-ci.org/websafe/test-a.png?branch=master"
            />
        </a>
    </td>
    <td>
        <a href="https://github.com/michelf/php-markdown/commit/a10d48919913c2b3efdc3637e5494e4e57c04d5e">a10d48919913c2b3efdc3637e5494e4e57c04d5e</a>
    </td>
  </tr>
  <tr>
    <td><code>develop</code></td>
    <td>
        <a href="https://travis-ci.org/websafe/test-a/builds/"
        title="branch develop"><img
            src="https://travis-ci.org/websafe/test-a.png?branch=develop"
        /></a>
    </td>
    <td></td>
  </tr>
</table>



Table of contents
--------------------------------------------------------------------------------

 1. [Features](#features)
 2. [Quickstart](#quickstart)
 5. [Class and namespace hierarchy diagram](#class-and-namespace-hierarchy-diagram)
 6. [Milestones](#milestones)



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

this will update [Composer] with all dependencies and recreate missing dirs.



Class and namespace hierarchy diagram
--------------------------------------------------------------------------------

This diagram was generated using [phpDocumentor2]. You can browse the full
PHP documentation for this library https://docs.websafe.pl/websafe-michelf-markdown-parser-psr/phpdoc/

[![Class hierarchy diagram](https://docs.websafe.pl/websafe-michelf-markdown-parser-psr/phpdoc/classes.svg)](https://docs.websafe.pl/websafe-michelf-markdown-parser-psr/phpdoc/ "PHP documentation")



Milestones
--------------------------------------------------------------------------------


### 0.0.0

 + [PSR-0] autoloader interoperability.
 + [Composer] ready.
 + [phpDocumentor2].
 + Handy [Ant] `build.xml`.
 + Easy extendable [PHPUnit] test suite.
 + [Continuous integration] with [Travis CI].


### 0.0.1

 + xxx


### 0.1.0

 + PSR-1


### 0.2.0

 + PSR-2



--------------------------------------------------------------------------------
[Michel Fortin]: http://michelf.ca/
[PHP Markdown]: https://github.com/michelf/php-markdown/
[branch: lib]: https://github.com/michelf/php-markdown/tree/lib
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
[phpDocumentor2]: http://www.phpdoc.org/
