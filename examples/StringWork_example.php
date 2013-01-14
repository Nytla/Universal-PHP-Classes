<?php
/**
 * StringWork_example.php
 *
 * This is file with example for StringWork class
 *
 * @category	examples
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with StringWork class
 */
require_once(dirname(__FILE__) . '/../classes/StringWork.php');

/**
 * Set length of random string
 */
$string_length = 16;

/**
 * Print random string
 */
//print StringWork::generateRandomString($string_length);

/**
 * Set string with none ACII
 */
$string = 'This is example string with µСЃР°В вЂ“ none ACII.';

/**
 * Remove none ACII from our string
 */
//print StringWork::removeNoneASCIIFromString($string);

/**
 * Set string with example content
 */
$string = 'This is example string with {b}bold text{/b} and {br}paragraph.';

/**
 * Set array with replace symbol(s)
 */
$replace_array = array(
	'{b}' => '<b>',
	'{/b}' => '</b>',
	'{br}' => '<br />'
);

/**
 * Print string whith replace
 */
//print StringWork::parseAndReplaceString($string, $replace_array);

/**
 * Set variable with string (exapmle URL and Email)
 */
$string = 'This is example URL http://www.exapmle.com/ and email exapmle@mail.com.';

/**
 * Print string with clickable URL and Email
 */
//print StringWork::makeURLAndEmailClickable($string);

/**
 * Set variable with long text 
 */
$long_text = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';

/**
 * Set variable with length
 */
$length = 32;

/**
 * Print text which length equals of 32 symbols
 */
//print StringWork::shortenLongText($long_text, $length);

/**
 * Set key
 */
$key = 'password';

/**
 * Set login
 */
$password = 'example_password';

/**
 * Set variable with flag (1 = decrypt, 0 = encrypt)
 */
$flag = 0;

/**
 * Encrypt password
 */
//print StringWork::encryptOrDecryptString($key, $password, $flag);

/**
 * Decrypt password
 */
//print StringWork::encryptOrDecryptString($key, StringWork::encryptOrDecryptString($key, $password, $flag), 1);

/**
 * Create variable with post code states
 */
$post_code_states = 'NY';

/**
 * Print name of states
 */
//echo StringWork::getStatesUSA($post_code_states);

/**
 * Create variable with example string
 */
$string = 'This is example text.';

/**
 * Create vriable with charaset
 */
$charaset = 'UTF-8';

/**
 * Pring text in our charaset
 */
//echo StringWork::setCorrectEncoding($string, $charset);

/**
 * Set variable with string length
 */
$cap = 7;

/**
 * Print generate random string
 */
//echo StringWork::mostCommonWords($long_text, $cap);

/**
 * Set variable with text from
 */
$start = 'dummy';

/**
 * Set variable with text end
 */
$end = 'industry';

/**
 * Print our text from start text and text end
 */
//echo StringWork::extractString($start, $end, $long_text);

/**
 * Print our text with srart text and text end
 */
//echo StringWork::extractString($start, $end, $long_text, true);

/**
 * Create xml string
 */
$xml_string = '
<?xml version="1.0" encoding="utf-8"?>
<feed xmlns="http://www.w3.org/2005/Atom">
    <title>Example Feed</title>
    <subtitle>A subtitle.</subtitle>
    <link href="http://example.org/feed/" rel="self" />
    <link href="http://example.org/" />
    <id>urn:uuid:60a76c80-d399-11d9-b91C-0003939e0af6</id>
    <updated>2003-12-13T18:30:02Z</updated>
</feed>
';

/**
 * Print string in which escape xml crars 
 */
//echo StringWork::escapeXmlChars($xml_string);

/**
 * Print string in which remove all symbols
 */
//echo StringWork::removeAllSymbols($long_text);

/**
 * Print string in which remove top 100 words
 */
echo StringWork::removeTopWords100($long_text);
?>