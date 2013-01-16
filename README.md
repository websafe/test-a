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
