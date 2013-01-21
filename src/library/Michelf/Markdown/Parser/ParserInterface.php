<?php
/**
 * @package Michelf_Markdown_Parser
 * @author Michel Fortin, <http://michelf.com/>
 * @copyright 2004-2013 Michel Fortin, <http://michelf.com/>
 * @link http://michelf.com/projects/php-markdown/
 */
namespace Michelf\Markdown\Parser;

/**
 * @package Michelf_Markdown_Parser
 * @author Michel Fortin, <http://michelf.com/>
 * @copyright 2004-2013 Michel Fortin, <http://michelf.com/>
 * @link http://michelf.com/projects/php-markdown/
 */
interface ParserInterface
{
    public function transform($text);
}
