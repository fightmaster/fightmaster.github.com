---
layout: page
title: "Генератор роутинга"
date: 2014-02-02 21:44
comments: false
sharing: true
footer: true
sidebar: true
tags: [php,course,serialize generator]
---
##### Описание

Если взять serializer, то ему нужны настройки.

```yaml
MyBundle\Resources\config\serializer\ClassName.yml
    Fully\Qualified\ClassName:
        properties:
            some-property:
                expose: true
                type: string
                serialized_name: foo
                since_version: 1.0
                until_version: 2.0
                groups: ['get','patch']
```

Это актуально как и для [opensoft/simple-serializer](https://github.com/opensoft/simple-serializer),
так и [schmittjoh/serializer](https://github.com/schmittjoh/serializer).

##### Аналоги
Неизвестно

##### Целевая аудитория
Как минимум я :)

##### Задачи
Хочется иметь возможности как генерировать целиком объект и его описание, так что-то одно из этого.

##### Подводные камни
Узнаем позже

##### Дополнительные задачи

 1. Возможность легко и просто настраивать шаблон для генерации
 2. Интерактивный режим команды
