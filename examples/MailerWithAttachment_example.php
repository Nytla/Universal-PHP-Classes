<?php
/**
 * mailer_example.php
 *
 * This is file with example for mailer class
 *
 * @category	examples
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with mailer class
 */
require_once(dirname(__FILE__) . '/../classes/MailerWithAttachment.php');

/**
 * Create variable with copy of our object
 */
$object = new MailerWithAttachment();

/**
 * Set variable with email address (to send)
 */
$email_to = 'example@mail.ru';

/**
 * Set variable with email address (from send)
 */
$email_from = 'john@mail.ru';

/**
 * Set variable with name from send email
 */
$name_from = 'John Doe';

/**
 * Set variable with email subject
 */
$suject = 'This is test subject.';

/**
 * Set variable with email body
 */
$body = 'My test body.';

/**
 * Set variable with name of attachment file
 */
//$file = dirname(__FILE__) . 'example.txt';

//$file = 'examples/example.txt';

$file = '../examples/example.html';

/**
 * Send email with attachment
 */
var_dump($object -> emailSent($email_to, $email_from, $name_from, $suject, $body, $file));
?>