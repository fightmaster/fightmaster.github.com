---
layout: post
title: "Unit Tests. Data provider без головной боли"
date: 2013-10-05 01:00
comments: true
categories: [unit tests,data provider,clean code,code review,php]
---
Недавно текущий проект перевалил за 1500 юнит тестов. Захотелось подвести какой-то итог. И сегодня не будет какого-то рецепта: "А делайте так - получите счастье". Посмотрим на примерах, как можно сделать что-то иначе. Внимание, очень много странных букв под php синтаксисом.
<!-- more -->
Мы с вами не на пробежке, разогреваться нам не надо, начнем сразу с кода. Примеры вымышленные, и я буду использовать аббревиатуру uut (Unit Under Test).

### isPositiveNumber($number)

```php
<?php
public function isPositiveNumber($number)
{
    return ($number > 0)
}
?>
```

Тест мог бы выглядеть так:

```php
<?php
/**
 * @test
 */
public function isPositiveNumber()
{
    $result = $this->uut->isPositiveNumber(1);
    $this->assertTrue($result);

    $result = $this->uut->isPositiveNumber(0);
    $this->assertFalse($result);

    $result = $this->uut->isPositiveNumber(-1);
    $this->assertFalse($result);
}
?>
```

Или так:

```php
<?php
/**
 * @test
 */
public function isPositiveNumberTrueScenario()
{
    $result = $this->uut->isPositiveNumber(1);
    $this->assertTrue($result);
}

/**
 * @test
 */
public function isPositiveNumberFalseScenario()
{
    $result = $this->uut->isPositiveNumber(0);
    $this->assertFalse($result);

    $result = $this->uut->isPositiveNumber(-1);
    $this->assertFalse($result);
}
?>
```

Мы пишем и пишем так тесты, пока кто-то не прочитает официальную документацию и не узнает, а что такое Data Providers: [phpunit.de](http://phpunit.de/manual/3.7/en/writing-tests-for-phpunit.html#writing-tests-for-phpunit.data-providers). Чаще всего нам необходимо протестировать метод с разными входными данными и проверить результат. Вот для избежания дублирования тестов и придумали эти провайдеры.

```php
<?php
/**
 * @test
 * @dataProvider isPositiveNumberProvider
 *
 * @param integer $inputData
 * @param boolean $expectedResult
 */
public function isPositiveNumber($inputData, $expectedResult)
{
    $result = $this->uut->isPositiveNumber($inputData);
    $this->assertEquals($expectedResult, $result);
}

/**
 * @return array
 */
public function isPositiveNumberProvider()
{
    return array(
        array(1, true),
        array(0, false),
        array(0, false)
    );
}
?>
```

Кажется мы нашли решение для всего и плодим тесты одни за другим...

### Простота - залог успеха

Написав первую главу, я понял, что не могу придумать адекватный пример для второй. А по ощущениям, я большую часть жизни так писал. Несколько дней искал объяснение этому факту. Пришел к выводу, что наш код со временем стал чище, и такие тесты практически вымерли. 

Отступление... В день выпуска статьи у меня был небольшой митинг с коллегой, который завершился словами: "Если разбить метод на три, как я предложил, то и с тестированием проблем не будет". Не могу утверждать, что мои слова действительно помогут, но они заставили меня еще раз задуматься о необходимости писать тесты.

Беря любой старый пример, я понимаю, что можно было написать по-другому. Или, как я недавно начал говорить, "выпендриться" и написать код мечты. Поэтому придется пойти на откровения дальше, взяв не самый хороший код из жизни. 

### Юнит тесты поздней осенью

Утро, поздняя осень, за окном холодно и темно. Вы приходите на работу в часов эдак семь или раньше. Идете на кухню, наливаете себе кофе, медленно и молчаливо пьете, с коллегой, девушкой, думая о том, что надо бы написать к коду тест.

Когда-то и кто-то что-то написал, дальше всем миром это апгрейдили, апгрейдили, а вчера вам пришлось снова что-то туда добавить. При этом вы были уставший, и вам срать было на этот старый код. Да и сейчас, наверное, особенно отношение не изменилось, просто ночью проснулся профессионализм.

Медленно мысли о "надо написать" перерастают в "как написать". В голове прокручиваются воспоминания о том, а что же делает код. У вас есть некие данные, из которых собирается какая-то сущность. При этом накладывается куча всевозможных "бизнес" ограничений на входную информацию. Что-то вроде сахар не может быть синим, а картошка не может доставлена в ресторан без лука, а помол кофе может быть лишь трех видов, а третий вид поставляется только из Африки. Вроде и валидация, а с другой стороны ничего стандартного не прикрепишь.

В итоге в отведенные два часа из трех вы вчера написали что-то наподобие этому, plain php.

```php
<?php
/**
 * @param Model $model
 * @throws CustomException
 */
protected function checkSomethingRestrictions(Model $model)
{
    $linkedModel = $model->getLinkedModel();
    if ($linkedModel && $model->hasSomething()) {
        throw new CustomException('Failed 1', 1);
    }

    //code - code - code

    if ($model->isEnabled() && $something == false) {
        throw new CustomException('Failed 17', 17);
    }
?>
```

Проснувшись и преодолев чувство стыда за написанное, вы пишите быстренько тест.

```php
<?php
/**
 * @test
 * @dataProvider checkSomethingRestrictionsProvider
 *
 * @param string $modelReference
 * @param string $exceptionMessage
 * @param integer|null $exceptionCode
 */
public function checkSomethingRestrictions($modelReference, $exceptionMessage = null, $exceptionCode = null)
{
    if ($exceptionMessage !== null || $exceptionCode !== null) {
        $this->setExpectedException('CustomException', $exceptionMessage, $exceptionCode);
    }

    $model = $this->referenceRepository->getReference($modelReference);
    $this->uut->checkSomethingRestrictions($model);
}

/**
 * @return array
 */
public function checkSomethingRestrictionsProvider()
{
    return array(
        array('model_1'),
        array('model_2'),
        array('model_3'),
        array('model_4'),
        array('model_5'),
        array('model_6'),
        array('model_7'),
        array('model_8'),
        array('model_9'),
        array('invalid_model_1', 'Failed 1', 1),
        array('invalid_model_2', 'Failed 2', 2),
        array('invalid_model_3', 'Failed 3', 3),
        array('invalid_model_5', 'Failed 5', 5),
        array('invalid_model_4', 'Failed 4', 4),
        array('invalid_model_6', 'Failed 6', 6),
        array('invalid_model_7', 'Failed 7', 7),
        array('invalid_model_8', 'Failed 8', 8),
        array('invalid_model_9', 'Failed 9', 9),
        array('invalid_model_10', 'Failed 10', 10),
        array('invalid_model_11', 'Failed 11', 11),
        array('invalid_model_12', 'Failed 12', 12),
        array('invalid_model_13', 'Failed 13', 13),
        array('invalid_model_14', 'Failed 14', 14),
        array('invalid_model_15', 'Failed 15', 15),
        array('invalid_model_16', 'Failed 16', 16),
        array('invalid_model_17', 'Failed 17', 17)
    );
}
?>
```

Конечно, слово "быстро" не совсем к месту. Создали кучу фикстур для тестирования различных ситуаций и закомитили.

К сожалению, пример попал в 7 или 8 из 10. Имена переменных вымышленные, но размер дата провайдера совершенно реален.

Тут самое время вернуться к статье о [код ревью](fightmaster.github.io/blog/2013/09/25/code-review.html). Система код ревью - это машина будущего, она переносит ваших коллег на полгода вперед, тем самым предоставляя возможность изменить ход событий, избежать тупления над кодом и тестом.

{% blockquote fightmaster http://fightmaster.github.io/blog/2013/09/23/unit-tests.html %}
При написании кода мы стараемся дать сразу понять: что делает метод, что возвращает, что хранит переменная и т.д.. 

При написании теста мы стараемся показать сразу: что тестируем и какую ситуацию описывают входные данные и т.д..
{% endblockquote %}

И правда, а что тестируется в итоге? Вот упадет через полгода код на 15 варианте дата провайдера, и чем мне это поможет? Название какой-то фикстуры (о хорошем тоне именования фикстур в следующей серии) ни о чем нам не скажет. Ну пойдем, откроем ее, а дальше что? А вдруг Петя ее поменял, а за ним Саша. А кто из них был не прав? А вдруг в нашей системе изменились требования, и именно этот тест теперь не должен падать при таких условиях. В обшем ничерта непонятно.

Вторая сторона, это добавить что-то в тест. Мы не знаем куда именно добавлять наш вариант. Все равно куда - не дело. А может наш вариант уже добавлен?

Первое и самое простое, что приходит в голову, оставить просто пояснения, в двух или трех словах выражающие особенность этого кейса.

```php
<?php

/**
 * @return array
 */
public function checkSomethingRestrictionsProvider()
{
    return array(
        // model 1, pass
        array('model_1'),
        // model 2, pass
        array('model_2'),

        // code
        // code

        array('model_7'),
        // model 8, pass
        array('model_8'),
        // model 9, pass
        array('model_9'),
        // model 1, unknown attribute, fail
        array('invalid_model_1', 'Failed 1', 1),
        // model 2, unknown name, fail
        array('invalid_model_2', 'Failed 2', 2),
        // model 3, no assign balck color, fail
        array('invalid_model_3', 'Failed 3', 3),

        // code
        // code

        // model 16, unknown name, fail
        array('invalid_model_16', 'Failed 16', 16),
        // product WITH color specified, fail
        array('invalid_model_17', 'Failed 17', 17)
    );
}
?>
```

Теперь мы хотя бы знаем, что хотели сказать авторы. Поддерживать тест теперь намного проще, порог вхождения в код сокращен.

### Бесконечность параметров

В первых строках этой главы я завис на несколько минут. Все дело в том, что я очень редко вижу методы с большим набором входных параметров. Все знают, что это имеет плачевные последствия, и никто так не пишет нынче. Но почему-то все забывают эти правила при написании тестов. Мне кажется это феномен. Я наблюдал это в других проектах. Да, и где-то в глубине души существует искра надежды, что вы делали также.

Чаще всего в тесте нам нужно сконфигурировать определенную ситуацию. В предыдущей главе это достигалось с помощью фикстур. Часто используются моки или даже сами объекты, последнее конечно неправильно. Но в данных примерах именно они и будут. Так как работа с мок объектами - это целое искуство, и я не хочу все смешивать.

```php
<?php
/**
 * @test
 * @backupGlobals enabled
 * @dataProvider getGlobalsProvider
 * 
 * @param boolean $a
 * @param boolean $b
 * @param array $expectedResult
 */
public function getGlobals($a, $b, $expectedResult)
{
    $GLOBALS['a'] = $a;
    $GLOBALS['b'] = $b;
    $result = $this->uut->getGlobals();
    $this->assertSame($expectedResult, $result);
}

/**
 * @return array
 */
public function getGlobalsProvider()
{
    return array(
        array(true, true, array('a_value' => true, 'b_value' => true)),
        array(true, false, array('a_value' => true, 'b_value' => false)),
        array(false, true, array('a_value' => false, 'b_value' => true)),
        array(false, false, array('a_value' => false, 'b_value' => false)),
    );
}
?>
```

Такой вот незамысловатый пример. Через некоторое время использование дата провайдера таким образом превращается в привычку. И в результате...

```php
<?php
/**
 * @test
 * @dataProvider findBySearchMappingProvider
 *
 * @param string|null $color
 * @param string|null $size
 * @param integer|null $width
 * @param integer|null $length
 * @param integer|null $height
 * @param boolean|null $enabled
 * @param array $expectedReferences
 * @param integer $expectedResultCount
 */
public function findBySearchMapping($color, $size, $width, $length, $height, $enabled, $expectedReferences, $expectedResultCount)
{
    $expectedResults = array();
    foreach ($expectedReferences as $referenceName) {
        $expectedResults[] = $this->referenceRepository->getReference($referenceName);
    }

    $searchMapping = new SearchMapping();
    $searchMapping->setColor($color)
        ->setSize($size)
        ->setWidth($width)
        ->setLength($length)
        ->setHeight($height)
        ->setEnabled($enabled);

    $results = $this->uut->findBySearchMapping($searchMapping);

    $this->assertCount($expectedResultCount, $results);
    $this->assertContainsOnlyInstancesOf('SomeInterface', $results);
    $this->assertEquals($expectedResults, $results);
}

/**
 * @return array
 */
public function findBySearchMappingProvider()
{
    return array(
        array(null, null, null, null, null, null, array('model_1', 'model_2', 'model_3', 'model_4', 'model_5', 'model_6'), 6),
        array('black', null, null, null, null, null, array('model_1'), 1),
        array('red', null, null, null, null, null, array('model_2'), 1),
        array('NOTEXIST', null, null, null, null, null, array(), 0),
        array(null, 'XL', null, null, null, null, array('model_1', 'model_2', 'model_3', 'model_4', 'model_6'), 5),
        array(null, 'M', null, null, null, null, array('model_5'), 1),
        array('black', 'XL', null, null, null, null, array('model_1'), 1),
        array('black', 'M', null, null, null, null, array(), 0),
        array('black', 'XL', 1, 1, 23, null, array(), 0),
        array(null, null, null, null, null, true, array('model_1', 'model_3', 'model_4', 'model_5', 'model_6'), 5),
        array(null, null, null, null, null, false, array('model_2'), 1),
        array(null, null, null, 5, null, null, array('model_3'), 1),
        array(null, null, null, 1000, null, null, array(), 0),
        array(null, null, null, null, 1, null, array('model_1', 'model_6'), 2),
        array(null, null, null, null, 100, null, array(), 0)
    );
}
?>
```

Когда это видишь первый раз на ревью, сначала прощаешь или не придаешь значение. Но команда - это лавина, особенно, если задание в релизе способствует появлению таких провайдеров. Иногда количество параметров достигало до 15. И в какой-то момент понимаешь, что надо брать ситуацию под контроль. Это осознание усиливается, когда в одном PR (Pull Request) несколько таких примеров. Что же делать?

Естественно, сначала оставляем комментарии, что-то вроде такого.

```php
<?php
/**
 * @return array
 */
public function findBySearchMappingProvider()
{
    return array(
        //$color, $size, $width, $length, $height, $enabled, $expectedReferences, $expectedResultCount
        //find all models
        array(null, null, null, null, null, null, array('model_1', 'model_2', 'model_3', 'model_4', 'model_5', 'model_6'), 6),
        //find models by the color
        array('black', null, null, null, null, null, array('model_1'), 1),
        //find models by the color
        array('red', null, null, null, null, null, array('model_2'), 1),
        //trying find models by the non-existent color
        array('NOTEXIST', null, null, null, null, array(), 0),
        //find models by the size
        array(null, 'XL', null, null, null, array('model_1', 'model_2', 'model_3', 'model_4', 'model_6'), 5),
        //find models by the size
        array(null, 'M', null, null, null, array('model_5'), 1),

        // code
        // code
    );
}
?>
```

Так как это минимум умственных и временных затрат для достижения компромисса между программистом и владельцем продукта.

### Не комментируйте плохой код — перепишете его.

Спустя время мы нашли несколько решений. До сих пор у меня нет объяснения, почему они сразу не всплыли. Вспомним цитату выше. Нам нужно всего лишь показать, что мы хотим протестировать. А многочисленные ```null``` лишь говорят о том, что эти значения нас не интересуют для этого теста.

Воспользуемся советом дядюшки Боба.

```php
<?php
/**
 * @return array
 */
public function findBySearchMappingProvider()
{
    return array(
        // find all models
        array(
            array(), 
            array('model_1', 'model_2', 'model_3', 'model_4', 'model_5', 'model_6'),
             6
         ),
        array(
            array('color' => 'black'), 
            array('model_1'), 
            1
        ),
        array(
            array('color' => 'red'),
            array('model_2'),
            1
        ),
        array(
            array('color' => 'NOTEXIST'),
            array(),
            0
        ),
        array(
            array('size' => 'XL'),
            array('model_1', 'model_2', 'model_3', 'model_4', 'model_6'),
            5
        ),
        array(
            array('size' => 'M'),
            array('model_5'),
            1
        ),
        array(
            array('color' => 'black', 'size' => 'XL'),
            array('model_1'),
            1
        ),
        array(
            array('color' => 'black', 'size' => 'M'),
            array(),
            0
        ),
        array(
            array('color' => 'black', 'size' => 'XL', 'width' => 1, 'length' =>, 'height' => 23),
            array(),
            0
        ),
        array(
            array('enabled' => true),
            array('model_1', 'model_3', 'model_4', 'model_5', 'model_6'),
            5
        ),
        array(
            array('enabled' => false),
            array('model_2'),
            1
        ),
        array(
            array('length' => 5),
            array('model_3'),
            1
        ),
        array(
            array('length' => 1000),
            array(),
            0
        ),
        array(
            array('height' => 1),
            array('model_1', 'model_6'),
            2
        ),
        array(
            array('height' => 100),
            array(),
            0
        )
    );
}
?>
```

Вуаля, ассоциативные массивы спасают этот мир. Ключ массива выступает в роли комментария, и необходимость онного чаще всего излишне теперь (хотя НЕ всегда). Осталось теперь поправить сам код теста.

```php
<?php
/**
 * @test
 * @dataProvider findBySearchMappingProvider
 *
 * @param array $dataMapping
 * @param array $expectedReferences
 * @param integer $expectedResultCount
 */
public function findBySearchMapping($mappingData, $expectedReferences, $expectedResultCount)
{
    $expectedResults = array();
    foreach ($expectedReferences as $referenceName) {
        $expectedResults[] = $this->referenceRepository->getReference($referenceName);
    }

    $searchMapping = new SearchMapping();
    $searchMapping->setColor(isset($mappingData['color']) ? $mappingData['color'] : null)
        ->setSize(isset($mappingData['size']) ? $mappingData['size'] : null)
        ->setWidth(isset($mappingData['width']) ? $mappingData['width'] : null)
        ->setLength(isset($mappingData['length']) ? $mappingData['length'] : null)
        ->setHeight(isset($mappingData['heigth']) ? $mappingData['height'] : null)
        ->setEnabled(isset($mappingData['enabled']) ? $mappingData['enabled'] : null);

    $results = $this->uut->findBySearchMapping($searchMapping);

    $this->assertCount($expectedResultCount, $results);
    $this->assertContainsOnlyInstancesOf('SomeInterface', $results);
    $this->assertEquals($expectedResults, $results);
}
?>
```
### Рефакторинг

Но негоже оставлять в таком виде тест, вдруг кто-то решит взять на заметку этот совет. 

Во-первых, блок, получающий ожидаемые объекты, един как минимум для этого тест кейса. Во-вторых, тоже самое можно сказать про создание конфигурируемого объекта. При этом чаще всего это мок объект, и он используется в других тестах. В-третьих, я ненавижу параметр $expectedCounts, тем более когда есть набор ожидаемых объектов.

```php
<?php
/**
 * @test
 * @dataProvider findBySearchMappingProvider
 *
 * @param array $dataMapping
 * @param array $expectedReferences
 */
public function findBySearchMapping(array $mappingData, array $expectedReferences)
{
    $expectedResults = $this->getSomethingByReferences($expectedReferences);
    $searchMapping = $this->getSearchMapping($mappingData);

    $results = $this->uut->findBySearchMapping($searchMapping);

    $this->assertCount(count($expectedResults), $results);
    $this->assertContainsOnlyInstancesOf('SomeInterface', $results);
    $this->assertEquals($expectedResults, $results);
}

/**
 * @return array
 */
public function findBySearchMappingProvider()
{
    return array(
        // find all models
        array(
            array(), 
            array('model_1', 'model_2', 'model_3', 'model_4', 'model_5', 'model_6')
         ),
        array(
            array('color' => 'black'),
            array('model_1')
        ),

        //code

        array(
            array('color' => 'black', 'size' => 'XL', 'width' => 1, 'length' =>, 'height' => 23),
            array()
        ),
        array(
            array('enabled' => true),
            array('model_1', 'model_3', 'model_4', 'model_5', 'model_6')
        ),

        //code
    );
}

/**
 * @param array $references
 * @return SomeInterface[]
 */
private function getSomethingByReferences(array $references)
{

    $models = array();
    foreach ($references as $referenceName) {
        $models[] = $this->referenceRepository->getReference($referenceName);
    }

    return $models;
}

/**
 * @param array $mappingData
 * @return SearchMapping
 */
private function getSearchMapping(array $mappingData)
{
    $searchMapping = new SearchMapping();
    $searchMapping->setColor(isset($mappingData['color']) ? $mappingData['color'] : null)
        ->setSize(isset($mappingData['size']) ? $mappingData['size'] : null)
        ->setWidth(isset($mappingData['width']) ? $mappingData['width'] : null)
        ->setLength(isset($mappingData['length']) ? $mappingData['length'] : null)
        ->setHeight(isset($mappingData['heigth']) ? $mappingData['height'] : null)
        ->setEnabled(isset($mappingData['enabled']) ? $mappingData['enabled'] : null);
}
?>
```

### Заключение

Последний мой PR содержал data provider для сложного поиска c около 70 вариантами. И знаете, он выглядит "удобоваримо". Я придерживаюсь такого правила, если, прокручивая провайдер колесиком мышки, вы все прекрасно понимаете - значит проверка на качество пройдена.