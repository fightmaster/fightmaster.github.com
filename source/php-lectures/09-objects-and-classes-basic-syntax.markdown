---
layout: page
title: "Объекты и классы в PHP. Основы синтаксиса"
date: 2013-03-28 04:00
comments: false
sharing: true
footer: true
sidebar: true
tags: [php,lectures,oop]
lecture: true
---
### Краткое содержание лекции

[Теоретические задания](09-objects-and-classes-basic-syntax-theoretical-tasks.html) |
[Практические задания](09-objects-and-classes-basic-syntax-practical-tasks.html)

Именем класса может быть любое слово, которое не входит в список **зарезервированных** слов PHP, начинающееся с буквы или символа подчеркивания и за которым следует любое количество букв, цифр или символов подчеркивания.

```php
<?php
class Publication
{

}

//bad practice
$publication = new Publication;
//best practice
$publication = new Publication();
?>
```

**В контексте класса можно создать новый объект через new self и new parent.**

```php
<?php
class Publication
{
    static public function getInstance()
    {
        return new self();
        //return new static();
        //return new parent();
    }
}
?>
```

```php
<?php
class Publication
{
    //bad practice
    var $title = 'Title';
    //best practice
    public $text = 'Text of the publication';
}
?>
```

```php
<?php
$publication = new Publication();
echo $publication->title . \PHP_EOL;
echo $publication->text . \PHP_EOL;
?>
```

```php
<?php
class Publication
{
    public $title = 'Title';
    protected $text = 'Text of the publication';
    private $views = 0;
}
?>
```

```php
<?php
$publication = new Publication();
echo $publication->title . \PHP_EOL;
// FATAL ERROR
echo $publication->text . \PHP_EOL;
// FATAL ERROR
echo $publication->views . \PHP_EOL;
?>
```

```php
<?php
class Publication
{
    public $title = 'Title';
    protected $text = 'Text of the publication';
    private $_views = 0;

    //bad practice
    function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getViews()
    {
        return $this->_views;
    }

    public function setViews($views)
    {
        $this->_views = $views;
    }
}
?>
```

```php
<?php
$publication = new Publication();
echo $publication->getTitle() . \PHP_EOL;
echo $publication->getText() . \PHP_EOL;
echo $publication->getViews() . \PHP_EOL;
?>
```

**Что необходимо изменить в классе Publication?**

```php
<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class Publication
{
	/**
	 * @var string
	 */
	private $title = 'Title';

	/**
	 * @var string
	 */
	private $text = 'Text of the publication';

	/**
	 * @var integer
	 */
	private $views = 0;

    /**
     * @return string
     */
	public function getTitle()
	{
		return $this->title;
	}

    /**
     * @param string $title
     */
	public function setTitle($title)
	{
		$this->title = $title;
	}

    /**
     * @return string
     */
	public function getText()
	{
        return $this->text;
	}

    /**
     * @param string $text
     */
	public function setText($text)
	{
		$this->text = $text;
	}

    /**
     * @return integer
     */
	public function getViews()
	{
		return $this->views;
	}

    /**
     * @param integer $views
     */
	public function setViews($views)
	{
		$this->views = $views;
	}
}
?>
```

**Как правильно добавить константу? Чем следующий пример плох?**

```php
<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class Publication
{
    /**
     * @var string
     */
    private $title = 'Title';

    /**
     * @var string
     */
    private $text = 'Text of the publication';

    /**
     * @var integer
     */
    private $views = 0;

    //bad practice
    const author = 'fightmaster';

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return integer
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * @param integer $views
     */
    public function setViews($views)
    {
        $this->views = $views;
    }
}
?>
```

```php
<?php
echo Publication::author . \PHP_EOL;
echo $publication::author . \PHP_EOL;
// FATAL ERROR
echo $publication->author . \PHP_EOL;
?>
```

**Добавим конструктор с "тупым" комментарием**

```php
<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class Publication
{
    const AUTHOR = 'fightmaster';

    /**
     * @var string
     */
    private $title = 'Title';

    /**
     * @var string
     */
    private $text = 'Text of the publication';

    /**
     * @var integer
     */
    private $views = 0;

    /**
     * \DateTime
     */
    private $creationDate;

    /**
     * Constructor
     *
     * @todo remove stupid comment
     */
    public function __constructor()
    {
        $this->creationDate = new \DateTime('now');
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return integer
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * @param integer $views
     */
    public function setViews($views)
    {
        $this->views = $views;
    }
}
?>
```

**Изменение технического задания**

 * В дополнение к публикации вносится Новость
 * Отличие новости от публикации в том, что автор не является константой.

```php
<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class News extends Publication
{
    /**
     * @var string
     */
    private $author;

    //такая запись конструктора в дочернем объекте эквивалентна ее отсутствию
    public function __constructor()
    {
        parent::__constructor();
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }
}
?>
```

```php
<?php
$news = new News();
$news->setAuthor('admin');
echo $news->getAuthor() . \PHP_EOL;
?>
```

**А что нужно изменить в объекте Publication?**

 * Оставить как есть
 * Добавить методы ```getAuthor;``` и ```setAuthor($author);``` с поведением по умолчанию.

```php
<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class Publication
{
    const AUTHOR = 'fightmaster';

    /**
     * @var string
     */
    private $title = 'Title';

    /**
     * @var string
     */
    private $text = 'Text of the publication';

    /**
     * @var integer
     */
    private $views = 0;

    /**
     * \DateTime
     */
    private $creationDate;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return integer
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * @param integer $views
     */
    public function setViews($views)
    {
        $this->views = $views;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        //return static::AUTHOR;
        return self::AUTHOR;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
    }
}
?>
```

```php
<?php
$publication = new Publication();
$publication->setAuthor('admin');
echo $publication->getAuthor() . \PHP_EOL;
?>
```

**Изменение технического задания**

 * Необходимо добавить аттрибут slug

```php
<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class Publication
{
    const AUTHOR = 'fightmaster';

    /**
     * @var string
     */
    private $title = 'Title';

    /**
     * @var string
     */
    private $text = 'Text of the publication';

    /**
     * @var integer
     */
    private $views = 0;

    /**
     * \DateTime
     */
    private $creationDate;

    /**
     * @var string
     */
    private $slug;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
        $this->generateSlug();
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return integer
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * @param integer $views
     */
    public function setViews($views)
    {
        $this->views = $views;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        //return static::AUTHOR;
        return self::AUTHOR;
    }

    /**
     * @param string $author
     * @throws \Exception
     */
    public function setAuthor($author)
    {
        throw \Exception(
            sprintf('Unable sets author to the publication "%s".', $this->getTitle())
        );
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Generates slug based on Title
     */
    private function generateSlug()
    {
        $this->slug = strtolower(str_replace(' ', '-', $this->getTitle()));
    }
}
?>
```

```php
<?php
$publication = new Publication();
$publication->setTitle('Test slug');
echo $publication->getSlug() . \PHP_EOL;
?>
```

**Создадим интерфейс SignedInterface**

```php
<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
interface SignedInterface
{
    /**
     * @return string
     */
    function getAuthor();

    /**
     * @param string $author
     */
    function setAuthor($author);
}
?>
```

**Кто его будет имплементировать?**

```php
<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class Publication implements SignedInterface
{
    const AUTHOR = 'fightmaster';

    /**
     * @var string
     */
    private $title = 'Title';

    /**
     * @var string
     */
    private $text = 'Text of the publication';

    /**
     * @var integer
     */
    private $views = 0;

    /**
     * \DateTime
     */
    private $creationDate;

    /**
     * @var string
     */
    private $slug;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
        $this->generateSlug();
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return integer
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * @param integer $views
     */
    public function setViews($views)
    {
        $this->views = $views;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        //return static::AUTHOR;
        return self::AUTHOR;
    }

    /**
     * @param string $author
     * @throws \Exception
     */
    public function setAuthor($author)
    {
        throw \Exception(
            sprintf('Unable sets author to the publication "%s".', $this->getTitle())
        );
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Generates slug based on Title
     */
    private function generateSlug()
    {
        $this->slug = strtolower(str_replace(' ', '-', $this->getTitle()));
    }
}
?>
```

```php
<?php
$publication = new Publication();
$news = new News();
if ($publication instanceof SignedInterface && $news instanceof SignedInterface) {
    echo 'Классы реализовывают SignedInterface' . PHP_EOL;
}
?>
```

**Изменение технического задания**

 * Необходимо добавить вид публикации Статьи.
 * Запретить инстанцирование Публикации
 * Добавить возможность комментирования новостей
 * Иметь возможность хранить общее количество просмотров для всех статей и новостей.

**Класс может быть объявлен, как абстрактный и не содержать абстрактных методов**

**Если класс имеет абстрактные методы, он обязан быть объялен как абстрактный**

```php
<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
abstract class Publication implements SignedInterface
{
    const AUTHOR = 'fightmaster';

    /**
     * @var string
     */
    private $title = 'Title';

    /**
     * @var string
     */
    private $text = 'Text of the publication';

    /**
     * @var integer
     */
    private $views = 0;

    /**
     * \DateTime
     */
    private $creationDate;

    /**
     * @var string
     */
    private $slug;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
        $this->generateSlug();
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return integer
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * @param integer $views
     */
    public function setViews($views)
    {
        $this->views = $views;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        //return static::AUTHOR;
        return self::AUTHOR;
    }

    /**
     * @param string $author
     * @throws \Exception
     */
    public function setAuthor($author)
    {
        throw \Exception(
            sprintf('Unable sets author to the publication "%s".', $this->getTitle())
        );
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Generates slug based on Title
     */
    private function generateSlug()
    {
        $this->slug = strtolower(str_replace(' ', '-', $this->getTitle()));
    }
}
?>
```

**Добавим абстрактный метод ```getType()```**

```php
<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
abstract class Publication implements SignedInterface
{
    const AUTHOR = 'fightmaster';

    /**
     * @var string
     */
    private $title = 'Title';

    /**
     * @var string
     */
    private $text = 'Text of the publication';

    /**
     * @var integer
     */
    private $views = 0;

    /**
     * \DateTime
     */
    private $creationDate;

    /**
     * @var string
     */
    private $slug;

    /**
     * @return string
     */
    abstract public function getType();
    //abstract protected function getType();

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
        $this->generateSlug();
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return integer
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * @param integer $views
     */
    public function setViews($views)
    {
        $this->views = $views;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        //return static::AUTHOR;
        return self::AUTHOR;
    }

    /**
     * @param string $author
     * @throws \Exception
     */
    public function setAuthor($author)
    {
        throw \Exception(
            sprintf('Unable sets author to the publication "%s".', $this->getTitle())
        );
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Generates slug based on Title
     */
    private function generateSlug()
    {
        $this->slug = strtolower(str_replace(' ', '-', $this->getTitle()));
    }
}
?>
```

```php
<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class Article extends Publication
{
    /**
     * @return string
     */
    public function getType()
    {
        return 'article';
    }
}
?>
```

```php
<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class News extends Publication
{
    /**
     * @var string
     */
    private $author;

    /**
     * @return string
     */
    public function getType()
    {
        return 'news';
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }
}
?>
```

 * Создадим класс комментарий
 * Создадим интерфейс Commentable

```php
<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class Comment implements SignedInterface
{
    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $message;

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
}
?>
```


```php
<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
interface Commentable
{
    /**
     * @return Comment[]
     */
    function getComments();

    /**
     * @param Comment $comment
     */
    function addComment(Comment $comment);
}
?>
```

```php
<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class News extends Publication implements Commentable
{
    /**
     * @var string
     */
    private $author;

    /**
     * Comment[]
     */
    private $comments = array();

    /**
     * @return string
     */
    public function getType()
    {
        return 'news';
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return Comment[]
     */
    function getComments()
    {
        return $this->comments;
    }

    /**
     * @param Comment $comment
     */
    function addComment(Comment $comment)
    {
        $this->comments[] = $comment;
    }
}
?>
```

```php
<?php
$comment = new Comment();
$news = new News();
$news->addComment($comment);
var_dump($news->getComments());
?>
```

**Добавим возможность хранить общее количество просмотров для всех статей и новостей.**

 * Добавим приватную статическую переменную
 * Добавим метод ```view```
 * Удалим метод ```setViews```

```php
<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
abstract class Publication implements SignedInterface
{
    const AUTHOR = 'fightmaster';

    private static $allViews = 0;

    /**
     * @var string
     */
    private $title = 'Title';

    /**
     * @var string
     */
    private $text = 'Text of the publication';

    /**
     * @var integer
     */
    private $views = 0;

    /**
     * \DateTime
     */
    private $creationDate;

    /**
     * @var string
     */
    private $slug;

    /**
     * @return string
     */
    abstract public function getType();
    //abstract protected function getType();

    public function view()
    {
        $this->views++;
        self::$allViews++;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
        $this->generateSlug();
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return integer
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * @return integer
     */
    public function getAllViews()
    {
        return self::$allViews;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        //return static::AUTHOR;
        return self::AUTHOR;
    }

    /**
     * @param string $author
     * @throws \Exception
     */
    public function setAuthor($author)
    {
        throw \Exception(
            sprintf('Unable sets author to the publication "%s".', $this->getTitle())
        );
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Generates slug based on Title
     */
    private function generateSlug()
    {
        $this->slug = strtolower(str_replace(' ', '-', $this->getTitle()));
    }
}
?>
```

```php
<?php
$article = new Article();
$comment = new Comment();
$news = new News();
$news->addComment($comment);
$news->view();
$news->view();
$article->view();

echo $news->getType() . ' views ' . $news->getViews() . PHP_EOL;
echo $article->getType() . ' views ' . $article->getViews() . PHP_EOL;
echo 'All views from ' . $news->getType() . ' ' . $news->getAllViews() . PHP_EOL;
echo 'All views from ' . $article->getType() . ' ' . $article->getAllViews() . PHP_EOL;
?>
```

**Что будет, если заменить ```self``` на ```static``` У аттрибута ```allViews```? **

**Ключевое слово ```final```**

```php
<?php
final class News
{

}

//fatal error
class BBCNews extends News
{

}
?>
```

**Резервирование метода**
```php
<?php
abstract class Publication
{
    /**
     * Generates slug based on Title
     */
    final private function generateSlug()
    {
        //code
    }
}
?>
```

#### Namespace

```php
<?php
namespace BBC;

class News
{

}
?>
```

```php
<?php
namespace Lenta;

class News
{
    function strlen($string)
    {
        return \strlen($string);
    }
}
?>
```

```php
<?php
use BBC\News;
use Lenta\News as LentaNews;

$news = new News();
$news = new BBC\News();
$news = new \BBC\News();

$news = new LentaNews();
$news = new BC\News()
?>
```