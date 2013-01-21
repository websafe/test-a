
+ New directory structure:
  + classes in `src/library/Michelf/Markdown/Parser`
  + testsuite in `src/tests/MichelfTest/Markdown/Parser`
+ Classes were extracted into separate files
+ File DocBlock added
+ Namespace renamed to: `Michelf\Markdown\Parser`
+ Class DocBlock added
+ Classes were renamed/removed:
  + `Markdown` => `Michelf\Markdown\Parser\CoreParser`
  + `MarkdownExtra` => removed
  + `_MarkdownExtra_TmpImpl` => `Michelf\Markdown\Parser\ExtraParser`
+ Unused constants removed
+ PHP code was formatted/fixed using PHP-CS-Fixer
+ `.php_cs` for PHP-CS-Fixer
+ `.travis.yml` for Travis CI
+ `build.properties` - configuration for `build.xml`
+ `build.xml` - Apache Ant build file.
+ `composer.json`
+ `packages.json`
+ `phpdoc.dist.xml` -  run `vendor/bin/phpdoc`
+ `phpunit.xml.dist` - run `vendor/bin/phpunit -v --debug`
+ `README.md`
+ `VERSION` - contains Michel Fortins php-markdown commit id on which this
  release is based.
