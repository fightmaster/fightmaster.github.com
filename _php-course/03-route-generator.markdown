---
layout: page
title: "Генератор роутинга"
date: 2014-02-02 21:44
comments: false
sharing: true
footer: true
sidebar: true
tags: [php,course,route generator,symfony]
---
##### Описание

Потенциально роутинг для рест апи может выглядеть так.

```yaml
fightmaster_admin_api_district_cget:
    path: /districts.{_format}
    defaults: { _controller: FightmasterAdminBundle:Api\District:cget, _format: json }
    requirements:
        _method: GET
    options:
        expose: true

fightmaster_admin_api_district_get:
    path: /district/{id}.{_format}
    defaults: { _controller: FightmasterAdminBundle:Api\District:get, _format: json }
    requirements:
        _method: GET
       id: \d+
    options:
        expose: true

fightmaster_admin_api_district_post:
    path: /district.{_format}
    defaults: { _controller: FightmasterAdminBundle:Api\District:post, _format: json }
    requirements:
        _method: POST
    options:
        expose: true

fightmaster_admin_api_district_cpost:
    path: /district.{_format}
    defaults: { _controller: FightmasterAdminBundle:Api\District:cpost, _format: json }
    requirements:
        _method: POST
    options:
        expose: true

fightmaster_admin_api_district_put:
    path: /district/{id}.{_format}
    defaults: { _controller: FightmasterAdminBundle:Api\District:put, _format: json }
    requirements:
        _method: PUT
       id: \d+
    options:
        expose: true

fightmaster_admin_api_district_patch:
    path: /district/{id}.{_format}
    defaults: { _controller: FightmasterAdminBundle:Api\District:patch, _format: json }
    requirements:
        _method: [PATCH,POST]
       id: \d+
    options:
        expose: true

fightmaster_admin_api_district_delete:
    path: /district/{id}.{_format}
    defaults: { _controller: FightmasterAdminBundle:Api\District:delete, _format: json }
    requirements:
        _method: DELETE
       id: \d+
    options:
        expose: true
```

А теперь внмательно посмотрите, что надо сделать, чтобы создать роутинг для аналогичного ресурса? Скопировать?

##### Аналоги
Symfony поставляет из коробки несколько генераторов, [SensioGeneratorBundle](https://github.com/sensiolabs/SensioGeneratorBundle). Но они слишком общие, нет чего-то точечного.
Меня не устраивает CRUD стандартный, как и многих других разработчиков, а части какие-то сгенерировать нельзя.
Можно перенастроить шаблоны для всей генерации, но это не решает проблему, доставляет больше неудобств.

##### Целевая аудитория
Аудитория зависит от поставленных и выполненных задач. Есть потенциальная возможность внедрить это в сам фреймворк.

##### Задачи
Необходимо генерировать файлы для роутинга. Как ни странно, такая простая на первый взгляд задача может вырасти в нечто большее.
Для начала нужно сделать рабочий прототип, его код может быть будет меньше 50 строк.

##### Подводные камни
При написании консольных команд, главное не впасть в plain code:
[GenerateControllerCommand.php](https://github.com/sensiolabs/SensioGeneratorBundle/blob/master/Command/GenerateControllerCommand.php),
[ControllerGenerator.php](https://github.com/sensiolabs/SensioGeneratorBundle/blob/master/Generator/ControllerGenerator.php).

##### Дополнительные задачи

 1. Возможность легко и просто настраивать шаблон для генерации
 2. Команда валидации файлов роутинга
 3. Интерактивный режим команды
 4. Можно создать свой crud генератор, более настраиваемый, чем от сенсиолабс
