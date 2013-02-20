---
layout: page
title: "Работа со строками"
date: 2013-02-21 03:00
comments: true
sharing: true
footer: true
sidebar: true
tags: [php,lectures,array]
lecture: true
---
### Краткое содержание лекции

[Теоретические задания](05-working-with-strings-theoretical-tasks.html) |
[Практические задания](05-working-with-strings-practical-tasks.html)

##### Возможное представление строки:

 * single quoted
 * double quoted
 * heredoc syntax
 * nowdoc syntax (since PHP 5.3.0)

Возможность обращения к символу строки.

#### Функции по работе со строками

Полный список функций доступен в [документации](http://www.php.net/manual/en/ref.strings.php).

##### Функции вывода / ввода данных

 * ```void echo ( string $arg1 [, string $... ] )```
    * конструкция языка, а не функция
    * ```echo $a;```
    * ```echo ($a, $b);``` - невалидно
    * ```echo $a, $b;``` - валидно
    * ```<?=$a;?>```
 * ```int print ( string $arg )```
    * конструкция языка, а не функция
    * только один аргумент
    * возвращает **всегда** 1
 * ```int printf ( string $format [, mixed $args [, mixed $... ]] )```
    * выводит на экран отформатированную строку
    * возвращает длину выведенной строки
 * ```string sprintf ( string $format [, mixed $args [, mixed $... ]] )```
 * ```int fprintf ( resource $handle , string $format [, mixed $args [, mixed $... ]] )```
 * ```int vprintf ( string $format , array $args )```
 * ```string vsprintf ( string $format , array $args )```
 * ```int vfprintf ( resource $handle , string $format , array $args )```
 * ```mixed sscanf ( string $str , string $format [, mixed &$... ] )```

##### lowercase / uppercase

 * ```string strtolower ( string $str )```
 * ```string strtoupper ( string $string )```
 * ```string lcfirst ( string $str )```
 * ```string ucfirst ( string $str )```
 * ```string ucwords ( string $str )```

##### Поиск / замена / "фильтрация" строк
 * strlen
    * ```int strlen ( string $string )```
    * ```strlen(array(2));```
    * возвращает кол-во байтов, а не символов в строке
 * ```int strpos ( string $haystack , mixed $needle [, int $offset = 0 ] )```
 * ```string strstr ( string $haystack , mixed $needle [, bool $before_needle = false ] )``` / ```strchr```
 * ```string strrchr ( string $haystack , mixed $needle )```

 * ```string strtok ( string $str , string $token )```
 * strtr делает замену символов в строке
    * ```string strtr ( string $str , string $from , string $to )```
    * ```string strtr ( string $str , array $replace_pairs )```
 * ```string strrev ( string $string )```

##### Работа с подстроками

 * ```string substr ( string $string , int $start [, int $length ] )```
 * ```mixed substr_replace ( mixed $string , mixed $replacement , mixed $start [, mixed $length ] )```
 * ```int substr_count ( string $haystack , string $needle [, int $offset = 0 [, int $length ]] )```

##### Работа с хешами

 * ```string sha1 ( string $str [, bool $raw_output = false ] )```
 * ```string sha1_file ( string $filename [, bool $raw_output = false ]```
 * ```md5 — Calculate the md5 hash of a string```
 * ```md5_file — Calculates the md5 hash of a given file```

##### "Работа" с символами

 * ```string chr ( int $ascii )```
 * ```int ord ( string $string )```

##### Обработка строк (лишних отступов)

 * ```string trim ( string $str [, string $charlist ] )```
 * ```string ltrim ( string $str [, string $charlist ] )```
 * ```string rtrim ( string $str [, string $charlist ] )``` / chop

##### "Полезное"

 * ```string str_shuffle ( string $str )```
 * ```array str_split ( string $string [, int $split_length = 1 ] )```

##### Функции для обработки html и специальных символов (самостоятельно)

 * strip_tags — Strip HTML and PHP tags from a string
 * addcslashes — Quote string with slashes in a C style
 * addslashes — Quote string with slashes
 * html_entity_decode — Convert all HTML entities to their applicable characters
 * htmlentities — Convert all applicable characters to HTML entities
 * htmlspecialchars_decode — Convert special HTML entities back to characters
 * htmlspecialchars — Convert special characters to HTML entities
 * stripcslashes — Un-quote string quoted with addcslashes
 * stripslashes — Un-quotes a quoted string
 * nl2br — Inserts HTML line breaks before all newlines in a string
 * get_html_translation_table — Returns the translation table used by htmlspecialchars and htmlentities



##### Остальной список (самостоятельно по желанию)

 * bin2hex — Convert binary data into hexadecimal representation
 * chunk_split — Split a string into smaller chunks
 * convert_cyr_string — Convert from one Cyrillic character set to another
 * convert_uudecode — Decode a uuencoded string
 * convert_uuencode — Uuencode a string
 * count_chars — Return information about characters used in a string
 * crypt — One-way string hashing
 * crc32 — Calculates the crc32 polynomial of a string
 * hebrev — Convert logical Hebrew text to visual text
 * hebrevc — Convert logical Hebrew text to visual text with newline conversion
 * hex2bin — Decodes a hexadecimally encoded binary string
 * levenshtein — Calculate Levenshtein distance between two strings
 * localeconv — Get numeric formatting information
 * money_format — Formats a number as a currency string
 * metaphone — Calculate the metaphone key of a string
 * nl_langinfo — Query language and locale information
 * number_format — Format a number with grouped thousands
 * parse_str — Parses the string into variables
 * quoted_printable_decode — Convert a quoted-printable string to an 8 bit string
 * quoted_printable_encode — Convert a 8 bit string to a quoted-printable string
 * quotemeta — Quote meta characters
 * setlocale — Set locale information
 * similar_text — Calculate the similarity between two strings
 * soundex — Calculate the soundex key of a string
 * str_ireplace — Case-insensitive version of str_replace.
 * str_pad — Pad a string to a certain length with another string
 * str_repeat — Repeat a string
 * str_replace — Replace all occurrences of the search string with the replacement string
 * str_rot13 — Perform the rot13 transform on a string
 * str_word_count — Return information about words used in a string
 * strcasecmp — Binary safe case-insensitive string comparison
 * strcmp — Binary safe string comparison
 * strcoll — Locale based string comparison
 * strcspn — Find length of initial segment not matching mask
 * str_getcsv — Parse a CSV string into an array
 * stripos — Find the position of the first occurrence of a case-insensitive substring in a string
 * stristr — Case-insensitive strstr
 * strnatcasecmp — Case insensitive string comparisons using a "natural order" algorithm
 * strnatcmp — String comparisons using a "natural order" algorithm
 * strncasecmp — Binary safe case-insensitive string comparison of the first n characters
 * strncmp — Binary safe string comparison of the first n characters
 * strpbrk — Search a string for any of a set of characters
 * strripos — Find the position of the last occurrence of a case-insensitive substring in a string
 * strrpos — Find the position of the last occurrence of a substring in a string
 * strspn — Finds the length of the initial segment of a string consisting entirely of characters contained within a given mask.
 * substr_compare — Binary safe comparison of two strings from an offset, up to length characters
 * wordwrap — Wraps a string to a given number of characters

