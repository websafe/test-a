<?php
/**
 * Michelf Markdown Filter Markdown TestSuite
 *
 * @link http://github.com/websafe/websafe-filter-markdown
 * @author Thomas Szteliga <ts@websafe.pl>
 * @copyright Copyright (c) 20012-2013 WEBSAFE.PL, https://websafe.pl/
 * @license http://websafe.pl/license/bsd-3-clause BSD-3-Clause
 * @package WebsafeTest_Filter_Markdown
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
 * @package WebsafeTest_Filter_Markdown
 */
abstract class AbstractParserTest extends PHPUnit_Framework_TestCase
{

    /**
     * Retrieve a filter instance.
     *
     * @return unknown
     */
    public function getFilterInstance ()
    {
        $filterClass = str_replace('Test', '', get_class($this));

        return new $filterClass();
    }

    /* @formatter:off */
    /**
     * Describe this test.
     */
    public function testClassCanInstantiate ()
    {
        $o = $this->getFilterInstance();
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
        $o = $this->getFilterInstance();
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
            foreach ($tests as $testDataId) {
                $markdown = file_get_contents(
                    __DIR__ . '/testdata/' . $dataSet . '/' . $testDataId .
                         '.md');
                $expectedHtml = file_get_contents(
                    __DIR__ . '/testdata/' . $dataSet . '/' . $testDataId .
                         '.html');
                $parser = $this->getFilterInstance();
                $this->assertEquals($expectedHtml,
                    $parser->transform($markdown),
                    'Testdata: ' . $dataSet . '/' . $testDataId);
                unset($markdown, $expectedHtml, $parser);
            }
        }
    }
}
