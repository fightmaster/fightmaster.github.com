---
layout: page
title: "Работа с файловой системой"
date: 2013-03-02 23:30
comments: false
sharing: true
footer: true
sidebar: true
tags: [php,lectures]
---
### Практические задания

[Краткое содержание лекции](07-working-with-filesystem.html) |
[Теоретические задания](07-working-with-filesystem-theoretical-tasks.html)

#### Обход директории

##### Условие

Для выполнения следующего задания создайте папку(```/tmp/lecture-task```) или любую другую со следующим содержанием:

```
/tmp/lecture-task/task-01
/tmp/lecture-task/task-01/subtask-01.txt
/tmp/lecture-task/task-01.sql
/tmp/lecture-task/task-01.txt
/tmp/lecture-task/task-01.doc
/tmp/lecture-task/task-01.pdf
/tmp/lecture-task/task-02
/tmp/lecture-task/task-02/subtask-02.txt
/tmp/lecture-task/task-02.sql
/tmp/lecture-task/task-02.txt
/tmp/lecture-task/task-02.doc
/tmp/lecture-task/task-02.pdf
```

где ```task-01``` и ```task-02``` являются директориями. Проще всего это сделать в консоли:

```
mkdir /tmp/lecture-task
mkdir /tmp/lecture-task/task-01
mkdir /tmp/lecture-task/task-02
touch /tmp/lecture-task/task-01/subtask-01.txt
touch /tmp/lecture-task/task-01.sql
touch /tmp/lecture-task/task-01.txt
touch /tmp/lecture-task/task-01.doc
touch /tmp/lecture-task/task-01.pdf
touch /tmp/lecture-task/task-02/subtask-02.txt
touch /tmp/lecture-task/task-02.sql
touch /tmp/lecture-task/task-02.txt
touch /tmp/lecture-task/task-02.doc
touch /tmp/lecture-task/task-02.pdf
```

##### Задания

 * Выведите на экран содержимое папки ```/tmp/lecture-task/```
 * Выведите рекурсивно содержимое папки ```/tmp/lecture-task/``` и всех ее подпапок
 * Выведите материалы к 1 заданию (все что начинается с префикса ```task-01``` или ```subtask-01```)
 * Выведите имена файлов только с расширением ```*.txt```

##### Подсказки

 * Для выполнения 1-2 заданий достаточно знаний текущей лекции, смотрите краткий материал
 * Для выполнения 3-4 заданий вам могут быть полезны регулярные выражения или функции по работе со строками
 * Для закпрепления материала можете решить задачи разными способами

#### Содержимое

Запишите в файл с именем ```Fibonacci.txt``` первые 50 чисел Фибоначчи (каждое число с новой строки). Прочтите каждое 5 число из этого файла и запишите во временный файл. Удостоверьтесь, что после выполнения скрипта временный файл не существует.

#### Латинский алфавит

Запишите в файл заглавные буквы латинского алфавита. Прочтите содержимое файла и выведите на экран только четные буквы.

##### Подсказки

 * Решите задачу с помощью стандартных функций по работе с файлами. Посмотрите внимательно на расширенный список функций
 * Решите задачу с помощью свойств строки
 * Изобретите велосипед
