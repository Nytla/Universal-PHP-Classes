<?php
/**
 * AutoloadClass_example.php
 *
 * This is file with example for autoload class
 *
 * @category	examples
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with AutoloadClass class
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
//print StringWork::RemoveNoneASCIIFromString($string);

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
 * Set variable with url
 */
$url = 'http://graph.facebook.com/btaylor';

/**
 * Print data (CURL)
 */
//print_r(StringWork::getJSONDataFromURLCURL($url));

/**
 * Print user name (CURL)
 */
//print_r(StringWork::getJSONDataFromURLCURL($url) -> name);

/**
 * Print data (file_get_contents)
 */
//print_r(StringWork::getJSONDataFromURL($url));

/**
 * Print user name (file_get_contents)
 */
//print_r(StringWork::getJSONDataFromURL($url) -> name);

/**
 * Set key
 */
$key = 'password';

/**
 * Set login
 */
$password = 'my_example_pass';

/**
 * Set variable with flag (1 = decrypt, 0 = encrypt)
 */
$flag = 0;

/**
 * Encrypt password
 */
//print StringWork::encryptOrDecrypt($key, $password, $flag);

/**
 * Decrypt password
 */
print StringWork::encryptOrDecrypt($key, StringWork::encryptOrDecrypt($key, $password, $flag), 1);