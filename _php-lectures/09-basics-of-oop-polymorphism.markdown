---
layout: page
title: "Основы ООП. Полиморфизм"
date: 2013-04-04 04:00
comments: false
sharing: true
footer: true    
sidebar: true
tags: [php,lectures,oop,polymorphism]
lecture: true
---
### Краткое содержание лекции

[Теоретические задания](09-basics-of-oop-polymorphism-theoretical-tasks.html) |
[Практические задания](09-basics-of-oop-polymorphism-practical-tasks.html)

В отличие от двух предыдущих лекций, я не буду заставлять вас самостоятельно искать определение полиморфизма.
При подготовке к лекции я убедился, что поиск "полиморфизм php" занятие гибельное.
Поэтому прочтите лучше статьи о "полиморфизм java". Мне понравились следующие: [Полиморфизм в Java](http://strongexperts.narod.ru/ru/articles/archive/java2/2006/apr2006-004/apr2006-004.htm), [Объектно-ориентированное программирование. Полиморфизм](http://echuprina.blogspot.ru/2012/01/blog-post.html).

Но главная суть полиморфизма: "Один интерфейс, множество реализаций". Давайте рассмотрим примеры на php.

Начнем с самого простого. Как я говорил раньше, с php5 появился стандартный интерфейс Countable. Он состоит из 1 метода ```count()```. Этот интерфейс могут имплементировать совершенно разные классы: от объектов коллекций до обычных моделей. 

{% include_code php-lectures/09-basics-of-oop-polymorphism/Collection.php %}
{% include_code php-lectures/09-basics-of-oop-polymorphism/News.php %}

В приведенном выше примере у нас есть классы и есть какой-то интерфейс, и мы обязываем классы их реализовать.
Но к этому вопросу можно подойти и с другой стороны. У нас есть задача для некоего сервиса: есть данные и нужно их отсортировать, при этом желательно иметь несколько реализаций.

Чаще всего, вы встретите следующее ренешение.

{% include_code php-lectures/09-basics-of-oop-polymorphism/sorts/step1/index.php %}
{% include_code php-lectures/09-basics-of-oop-polymorphism/sorts/step1/Service.php %}

Но у этого решения проблема с динамическим выбором алгоритма. А также, алгоритмов сортировки много, а сервис у нас отвечает не только за сортировку.
Несовсем корректно копить столько кода в классе. Привлекательнее вариант с тем, чтобы разнести алгоритмы по классам.

{% include_code php-lectures/09-basics-of-oop-polymorphism/sorts/step2/QuickSort.php %}
{% include_code php-lectures/09-basics-of-oop-polymorphism/sorts/step2/ShellSort.php %}
{% include_code php-lectures/09-basics-of-oop-polymorphism/sorts/step2/Service.php %}
{% include_code php-lectures/09-basics-of-oop-polymorphism/sorts/step2/index.php %}

При таком исполнении не очень понятно, а что стало лучше. Бросается в глаза проблема с наименованием метода в классе сортировок.
Разумно их заменить на просто ```count```.

{% include_code php-lectures/09-basics-of-oop-polymorphism/sorts/step3/QuickSort.php %}
{% include_code php-lectures/09-basics-of-oop-polymorphism/sorts/step3/ShellSort.php %}
{% include_code php-lectures/09-basics-of-oop-polymorphism/sorts/step3/Service.php %}
{% include_code php-lectures/09-basics-of-oop-polymorphism/sorts/step3/index.php %}

Но теперь случилась ситуация, что у нас несколько реализаций одного и того же, при этом наш код имеет только условные договоренности, что метод будет называться ```count```. И возникает естественное желание эту условную договоренность перевести в письменные обязательства.

{% include_code php-lectures/09-basics-of-oop-polymorphism/sorts/step4/SortInterface.php %}
{% include_code php-lectures/09-basics-of-oop-polymorphism/sorts/step4/QuickSort.php %}
{% include_code php-lectures/09-basics-of-oop-polymorphism/sorts/step4/ShellSort.php %}

Теперь осталась одна проблема, рассмотрение которой не совсем входит в текущий курс. 
Данный код тяжело будет протестировать. Так как объект сортировке создается непосредственно в методе ```doSomething```.


{% include_code php-lectures/09-basics-of-oop-polymorphism/sorts/step5/Service.php %}
{% include_code php-lectures/09-basics-of-oop-polymorphism/sorts/step5/index.php %}

Дальше мы не будем производить рефакторинг.

Отмечу еще раз факт, во втором примере мы не создаем еще одну реализацию интерфейса. 
Мы в процессе рефакторинга приходим к тому, что у нас существуют как минимум две разные реализации одного и того же, которые хочется стандартизировать. Стоит обратить внимание на конструктор класса ```Service```. Он принимает не конкретную реализацию, и сам класс работает теперь не с чем-то конкретным. Наш ```Service``` теперь лишь знает о интерфейсе ```SortInterface``` и его интересует лишь только это. Он сможет работать с любым классом, который заключил контракт и обязался выполнять его условия, а значит ```Service``` сможет воспользоваться любым количеством реализаций.

У нас на проекте есть более сложные примеры, где в аналогичной ситуации вынесено несколько методов под интерфейс, и несколько классов его имплементируют. Уместно задать вопрос, а почему тогда не воспользоваться наследованием?

В принципе, вам никто не мешает это сделать. Но, если общие методы говорят вам о преимуществах полезной пищи, при этом один класс говорит о тараканах, другой о человеке, третий о автомобилях, четвертый о войне. В этой ситуации, на мой взгляд, наличие общего родителя лишь введет в заблуждение.