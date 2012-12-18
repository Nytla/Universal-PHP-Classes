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
require_once(dirname(__FILE__) . '/../classes/Mailer.php');

/**
 * Create copy of Mailer object
 */
$object = new Mailer();

/**
 * Set variable of our letter
 */
$to_email = 'example@mail.com';

$from_email = 'john@mail.com';

$from_name = 'John';

$suject = 'This is test subject.';

$body = '
<html>
	<head>
  		<title>Birthday Reminders for August</title>
	</head>
	<body>
		<p>Here are the birthdays upcoming in August!</p>
		<table>
			<tr>
				<th>Person</th><th>Day</th><th>Month</th><th>Year</th>
			</tr>
			<tr>
				<td>Joe</td>
				<td>3rd</td>
				<td>August</td>
				<td>1970</td>
			</tr>
		</table>
	</body>
</html>
';

/**
 * Sent email
 */
//$object -> sentEmail($body);

if ($object -> emailSent($to_email, $from_email, $from_name, $suject, $body)) {
	echo 'Email was sent.';
} else {
	echo 'Email does not sent.';
}
?>