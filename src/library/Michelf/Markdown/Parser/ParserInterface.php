<?php
/**
 * Parser Interface Class.
 *
 * @package Michelf_Markdown_Parser
 * @author Michel Fortin, <http://michelf.com/>
 * @copyright 2004-2013 Michel Fortin, <http://michelf.com/>
 * @link http://michelf.com/projects/php-markdown/
 */
namespace Michelf\Markdown\Parser;

/**
 * Parser Interface.
 *
 * @package Michelf_Markdown_Parser
 * @author Michel Fortin, <http://michelf.com/>
 * @copyright 2004-2013 Michel Fortin, <http://michelf.com/>
 * @link http://michelf.com/projects/php-markdown/
 */
interface ParserInterface
{

    /**
     * Return transformed input $text
     *
     * @param string $text
     */
    public function transform ($text);
}
