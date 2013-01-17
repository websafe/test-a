<?php
/**
 * Michelf Markdown Parser TestSuite
 *
 * Copyright (c) 2012-2013, Thomas Szteliga <ts@websafe.pl>
 * https://websafe.pl/
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 *  + Redistributions of source code must retain the above copyright
 *    notice, this list of conditions and the following disclaimer.
 *  + Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 *  + Neither the name of the <organization> nor the
 *    names of its contributors may be used to endorse or promote products
 *    derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO,
 * THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
 * PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER BE LIABLE
 * FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
 * DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS
 * OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION)
 * HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY
 * OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH
 * DAMAGE.
 *
 * @category Websafe
 * @package MichelfTest_Markdown_Parser
 * @link http://github.com/websafe/websafe-filter-markdown
 * @author Thomas Szteliga <ts@websafe.pl>
 * @copyright Copyright (c) 20012-2013 WEBSAFE.PL, https://websafe.pl/
 * @license http://websafe.pl/license/bsd-3-clause BSD-3-Clause
 */
/**
 */
namespace MichelfTest\Markdown\Parser;

use PHPUnit_Framework_TestCase;
use DirectoryIterator;

/**
 * Abstract test class for all markdown filter variations.
 *
 * @category Websafe
 * @package MichelfTest_Markdown_Parser
 */
abstract class AbstractParserTest extends PHPUnit_Framework_TestCase
{

    /**
     * Retrieve a filter instance.
     *
     * @return \Michelf\Markdown\Parser\CoreParser|\Michelf\Markdown\Parser\ExtraParser
     */
    public function getParserInstance ()
    {
        $parserClass = str_replace('Test', '', get_class($this));

        return new $parserClass();
    }

    /* @formatter:off */
    /**
     * Describe this test.
     */
    public function testClassCanInstantiate ()
    {
        $o = $this->getParserInstance();
        $this->assertArrayHasKey(
            'transform',
            array_flip(get_class_methods($o))
        );
    }
    /**
     * Test some Core features.
     */
    public function testCoreFeatures ()
    {
        $o = $this->getParserInstance();
        $this->assertArrayHasKey(
            'transform',
            array_flip(get_class_methods($o))
        );
        $this->assertEquals("\n", $o->transform(''));
        $this->assertEquals("<p>test</p>\n", $o->transform('test'));
        $this->assertEquals("<h1>test</h1>\n", $o->transform("test\n======"));
        $this->assertEquals(
            "<h1>test</h1>\n\n<p>Blah blah <code>abc</code>.</p>\n",
            $o->transform("test\n======\n\nBlah blah `abc`.")
        );
        $this->assertEquals(
            "<pre><code>&lt;?php\necho 'yoyo';\n?&gt;\n</code></pre>\n",
            $o->transform("	<?php\n\techo 'yoyo';\n\t?>")
        );
    }
    /* @formatter:on */
    /**
     * Run tests on datasets
     */
    public function testDatasets ()
    {
        $datasets = array();
        $directoryIterator = new \DirectoryIterator(__DIR__ . '/testdata');
        foreach ($directoryIterator as $item) {
            if ($item->isDir()) {
                if (! $item->isDot()) {
                    $datasets[] = $item->getFileName();
                }
            }
        }
        //print_r($datasets);
        $testsets = array();
        foreach ($datasets as $dataset) {
            $directoryIterator = new \DirectoryIterator(
                __DIR__ . '/testdata/' . $dataset);
            foreach ($directoryIterator as $item) {
                if ($item->isFile() && ('README.md' != $item->getFilename())) {
                    //if('md' == $item->getExtension())
                    if ('md' ==
                         (pathinfo($item->getFilename(), \PATHINFO_EXTENSION)))
                    {
                        $testsets[] = basename($item->getFilename(), '.md');
                    }
                }
            }
        }
        asort($testsets);
        $tests = array_values($testsets);
        //print_r($tests);

        foreach ($datasets as $dataSet) {

            echo 'Entering test case collection: ' . $dataSet . PHP_EOL;

            foreach ($tests as $testDataId) {
                echo 'Running test : ' . $testDataId . PHP_EOL;
                $markdown = file_get_contents(
                    __DIR__ . '/testdata/' . $dataSet . '/' . $testDataId .
                         '.md');
                $expectedHtml = file_get_contents(
                    __DIR__ . '/testdata/' . $dataSet . '/' . $testDataId .
                         '.html');
                $parser = $this->getParserInstance();
                $this->assertEquals($expectedHtml,
                    $parser->transform($markdown),
                    'Testdata: ' . $dataSet . '/' . $testDataId);
                unset($markdown, $expectedHtml, $parser);
            }
        }
    }
}
