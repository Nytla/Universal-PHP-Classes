<?php
/**
 * RSSReadandAtomFeeds_example.php
 *
 * This is file with example for RSSReadandAtomFeeds_example class
 *
 * @category	examples
 * @copyright	2013
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with RSSReadandAtomFeeds_example class
 */
require_once(dirname(__FILE__) . '/../classes/RSSReadandAtomFeeds.php');

/**
 * Set variable with RSS url
 */
$feed_url = 'http://feeds.feedburner.com/htmlbook';

/**
 * Create copy of Mailer object
 */
$object = RSSReadandAtomFeeds::getRssFeeds($feed_url);

/**
 * Print RSS url
 */
echo $object -> items[4] -> link . '<br>';

/**
 * Print RSS subject
 */
echo $object -> items[4] -> title . '<br>';

/**
 * Print RSS content
 */
echo $object -> items[4] -> contents . '<br>';
?>