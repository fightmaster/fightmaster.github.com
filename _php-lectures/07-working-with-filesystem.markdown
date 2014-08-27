---
layout: page
title: "Работа с файловой системой"
date: 2013-02-28 03:00
comments: false
sharing: true
footer: true
sidebar: true
tags: [php,lectures,array]
lecture: true
---
### Краткое содержание лекции

[Теоретические задания](07-working-with-filesystem-theoretical-tasks.html) |
[Практические задания](07-working-with-filesystem-practical-tasks.html)

#### Константы

 * ```DIRECTORY_SEPARATOR```
 * ```__LINE__```
 * ```__FILE__```
 * ```__DIR__```


#### Работа с директорией

 * ```int filesize ( string $filename )```
 * ```bool is_dir ( string $filename )```
 * ```string filetype ( string $filename )```
 * ```resource opendir ( string $path [, resource $context ] )```
 * ```readdir```
 * ```closedir```

```php
<?php
$dir = "/etc/php5/";
if (is_dir($dir)) {
    if ($handle = opendir($dir)) {
        while (false !== ($entry = readdir($handle))) {
            printf('файл: %s : тип: %s' . \PHP_EOL, $entry, filetype($dir . $entry));
        }
        closedir($handle);
    }
}
?>
```

 * ```while (false !== ($entry = readdir($handle))) {```
 * ```while ($entry = readdir($handle)) {```
 * ```while (($entry = readdir($handle)) !== false) {```

 * ```void rewinddir ([ resource $dir_handle ] )```
 * ```Directory dir ( string $directory [, resource $context ] )```

```php
<?php
Directory {
public string $path ;
public resource $handle ;
public void close ([ resource $dir_handle ] )
public string read ([ resource $dir_handle ] )
public void rewind ([ resource $dir_handle ] )
}
?>
```

```php
<?php
$dir = dir("/etc/php5/");
if ($dir) {
    while (false !== ($entry = $dir->read())) {
        printf('файл: %s : тип: %s' . \PHP_EOL, $entry, filetype($dir->path . $entry));
    }
    $dir->close();
}
?>
```

 * ```array scandir ( string $directory [, int $sorting_order = SCANDIR_SORT_ASCENDING [, resource $context ]] )```
 * ```string getcwd ( void )```
 * ```bool chdir ( string $directory )```
 * ```bool chroot ( string $directory )```
 * ```bool mkdir ( string $pathname [, int $mode = 0777 [, bool $recursive = false [, resource $context ]]] )```
 * ```bool rmdir ( string $dirname [, resource $context ] )```

```php
<?php
mkdir("/tmp/new_folder/test", 0700, true);
?>
```

#### Работа с файлами

 * ```string file_get_contents ( string $filename [, bool $use_include_path = false [, resource $context [, int $offset = -1 [, int $maxlen ]]]] )```
 * ```int file_put_contents ( string $filename , mixed $data [, int $flags = 0 [, resource $context ]] )```

```php
<?php
$file = '/tmp/numbers.txt';
for ($i = 0; $i < 10; $i++) {
    file_put_contents($file, $i . \PHP_EOL, FILE_APPEND | LOCK_EX);
}

echo file_get_contents($file);
?>
```

 * ```resource fopen ( string $filename , string $mode [, bool $use_include_path = false [, resource $context ]] )```
 * ```string fread ( resource $handle , int $length )```
 * ```int fwrite ( resource $handle , string $string [, int $length ] )``` / fputs
 * ```bool fclose ( resource $handle )```
 * ```bool rewind ( resource $handle )```
 * ```string fgets ( resource $handle [, int $length ] )```
 * ```array fgetcsv ( resource $handle [, int $length = 0 [, string $delimiter = ',' [, string $enclosure = '"' [, string $escape = '\\' ]]]] )```
 * ```int fputcsv ( resource $handle , array $fields [, string $delimiter = ',' [, string $enclosure = '"' ]] )```

```php
<?php
$filename = "/tmp/text.txt";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);
?>
```

```php
<?php
$filename = "/tmp/text.txt";
$handle = fopen($filename, "a");
rewind($handle);
$contents = fwrite($handle, 'Новая строка');
fclose($handle);
?>
```

* ```int fpassthru ( resource $handle )```

```php
<?php
// открываем файл в бинарном режиме
$name = 'ok.png';
$fp = fopen($name, 'rb');

// отправляем нужные заголовки
header("Content-Type: image/png");
header("Content-Length: " . filesize($name));

// скидываем картинку и останавливаем выполнение скрипта
fpassthru($fp);
exit;
?>
```

 * ```int readfile ( string $filename [, bool $use_include_path = false [, resource $context ]] )``` 
 * ```array file ( string $filename [, int $flags = 0 [, resource $context ]] )```

 * ```bool copy ( string $source , string $dest [, resource $context ] )```
 * ```bool rename ( string $oldname , string $newname [, resource $context ] )```
 * ```bool unlink ( string $filename [, resource $context ] )```
 * ```void delete ( void )```
 * ```string dirname ( string $path )```
 * ```bool file_exists ( string $filename )```


 * ```string tempnam ( string $dir , string $prefix )```
 * ```resource tmpfile ( void )```
 * ```string realpath ( string $path )```
 * ```string basename ( string $path [, string $suffix ] )```

```php
<?php
chdir('/home/fightmaster/');
echo realpath('./../../etc/nginx'); //etc/nginx
?>
```

#### Самостоятельно при желании

 * chgrp — Изменяет группу владельцев файла
 * chmod — Изменяет режим доступа к файлу
 * chown — Изменяет владельца файла
 * clearstatcache — Очищает кэш состояния файлов
 * disk_free_space — Возвращает размер доступного пространства в каталоге или в файловой системе
 * disk_total_space — Возвращает общий размер каталога или раздела файловой системы
 * diskfreespace — Псевдоним disk_free_space
 * feof — Проверяет, достигнут ли конец файла
 * fflush — Сбрасывает буфер вывода в файл
 * fgetc — Считывает символ из файла
 * fgetss — Прочитать строку из файла и отбросить HTML-теги
 * fileatime — Возвращает время последнего доступа к файлу
 * filectime — Возвращает время изменения индексного дескриптора файла
 * filegroup — Получает идентификатор группы файла
 * fileinode — Возвращает индексный дескриптор файла
 * filemtime — Возвращает время последнего изменения файла
 * fileowner — Возвращает идентификатор владельца файла
 * fileperms — Возвращает информацию о правах на файл
 * flock — Портируемая консультативная блокировка файлов
 * fnmatch — Проверяет совпадение имени файла с шаблоном
 * fscanf — Обрабатывает данные из файла в соответствии с форматом
 * fseek — Устанавливает смещение в файловом указателе 
 * fstat — Получает информацию о файле используя открыты й файловый указатель
 * ftell — Сообщает текущую позицию чтения/записи файла 
 * ftruncate — Урезает файл до указанной длинны
 * move_uploaded_file — Перемещает загруженный файл в новое место

 * glob — Находит файловые пути, совпадающие с шаблоном
 * is_dir — Определяет, является ли имя файла директорией
 * is_executable — Определяет, является ли файл исполняемым
 * is_file — Определяет, является ли файл обычным файлом
 * is_link — Определяет, является ли файл символической ссылкой
 * is_readable — Определяет существование файла и доступен ли он для чтения
 * is_uploaded_file — Определяет, был ли файл загружен при помощи HTTP POST
 * is_writable — Определяет, доступен ли файл для записи
 * is_writeable — Псевдоним is_writable

 * lchgrp — Изменяет группу, которой принадлежит символическая ссылка
 * lchown — Изменяет владельца символической ссылки
 * link — Создаёт жёсткую ссылку
 * linkinfo — Возвращает информацию о ссылке
 * lstat — Возвращает информацию о файле или символической ссылке
 * symlink — Создаёт символическую ссылку
 * readlink — Возвращает файл, на который указывает символическая ссылка

 * parse_ini_file — Обрабатывает конфигурационный файл
 * parse_ini_string — Разбирает строку конфигурации
 * pathinfo — Возвращает информацию о пути к файлу
 * pclose — Закрывает файловый указатель процесса
 * popen — Открывает файловый указатель процесса
 * realpath_cache_get — Получает записи из кэша реального пути
 * realpath_cache_size — Получает размер кэша реального пути
 * set_file_buffer — Псевдоним stream_set_write_buffer
 * stat — Возвращает информацию о файле
 * touch — Устанавливает время доступа и модификации файла
 * umask — Изменяет текущую umask