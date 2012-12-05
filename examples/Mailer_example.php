<?php
/**
 * mailer_example.php
 *
 * This is file with example for mailer class
 *
 * @category examples
 * @copyright 2012
 * @author Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with mailer class
 */
require_once(dirname(__FILE__) . '/../classes/Mailer.php');

/**
 * Create body of our letter
 */
$body = 'This is body of our letter.';

/**
 * Send email
 */
new Mailer($body);
?>