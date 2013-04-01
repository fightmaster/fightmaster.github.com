---
layout: page
title: "Основы ООП. Наследование"
date: 2013-04-02 03:00
comments: false
sharing: true
footer: true    
sidebar: true
tags: [php,lectures,array]
lecture: true
---
### Краткое содержание лекции

[Теоретические задания](09-basics-of-oop-inheritance-theoretical-tasks.html) |
[Практические задания](09-basics-of-oop-inheritance-practical-tasks.html)

С наследованием мы частично столкнулись при изучении синтаксиса создания классов.
При условии, что такое наследование вам известно, мы начнем сразу с практики.

Хороший код сразу написать трудно, также трудно учесть всевозможные ситуации, пожалуй, даже неправильно учитывать того, чего не существует.
Пишите код для того, что вам действительно нужно. 

Если у вас есть группа объектов, которые имеют общие свойства, методы, **возможно**, вам стоит прибегнуть к наследованию, что сократит дублирование кода.

Я долго думал над примером, не хотелось что-то мифического. На своей работе я имею дело с печатным производством. На печатной фабрике большая разновидность машин: различные виды печатных станков (printing press, uv press), ламинатор (laminating machine), ксерокс (copier) и так далее.

{% include_code php-lectures/09-basics-of-oop-inheritance/machines/AbstractMachine.php %}
{% include_code php-lectures/09-basics-of-oop-inheritance/machines/PrintingPress.php %}
{% include_code php-lectures/09-basics-of-oop-inheritance/machines/UvPress.php %}
{% include_code php-lectures/09-basics-of-oop-inheritance/machines/LaminatingMachine.php %}
{% include_code php-lectures/09-basics-of-oop-inheritance/machines/Copier.php %}

Мы вынесли общие части связанных объектов в абстрактный класс, а специфические свойства реализовали в классах потомках.
Какие потенциальные ошибки мы при этом допустили? Исправьте код.

Еще часто прибегают к наследованию, когда у вас есть какой-то класс (возможно из другой библиотеки), и вам понадобилось расширить его функционал.

{% include_code php-lectures/09-basics-of-oop-inheritance/users/User.php %}
{% include_code php-lectures/09-basics-of-oop-inheritance/users/AdminUser.php %}

**Наследование** - это не золотая пуля.

Практически все классы, работающие с базой данных, имеют поле ```id```. Но это не означает, что нужно создать базовый класс и наследовать от него все остальные.

{% include_code php-lectures/09-basics-of-oop-inheritance/ids/BasicClass.php %}
{% include_code php-lectures/09-basics-of-oop-inheritance/ids/User.php %}
{% include_code php-lectures/09-basics-of-oop-inheritance/ids/News.php %}

Не стоит также смешивать с полиморфизмом. Машина и велосипед имеют колеса, но наличие колес в данном случае - это не некая общность, которую обязательно следует вынести в общий класс.

{% include_code php-lectures/09-basics-of-oop-inheritance/wheels/Wheel.php %}
{% include_code php-lectures/09-basics-of-oop-inheritance/wheels/Auto.php %}
{% include_code php-lectures/09-basics-of-oop-inheritance/wheels/Bicycle.php %}

