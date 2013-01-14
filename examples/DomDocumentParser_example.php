<?php
/**
 * DomDocumentParser_example.php
 *
 * This is file with example for DomDocumentParser_example class
 *
 * @category	examples
 * @copyright	2013
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with DomDocumentParser_example class
 */
require_once(dirname(__FILE__) . '/../classes/DomDocumentParser.php');

/**
 * Create variable with copy of our object
 */
$object = new domDocumentParser();

/**
 * Set address of html site
 */
$html_url = 'http://blueprintcss.org/tests/parts/sample.html';

/**
 * Print our parse html
 */
//echo $object -> parseHTMLPage($html_url);

/**
 * Set address of xml site
 */
//$xml_url = 'www.xml-sitemaps.com/download/www.sitemaps.org/sitemap.xml'; //http://phpclub.ru/faq/PHP5/XML

	$xml = <<< XML
<?xml version="1.0" encoding="utf-8"?>
<books>
 <book>Patterns of Enterprise Application Architecture</book>
 <book>Design Patterns: Elements of Reusable Software Design</book>
 <book>Clean Code</book>
</books>
XML;

/**
 * Print our parse xml
 */
echo $object -> parseXMLPage($xml);
?>