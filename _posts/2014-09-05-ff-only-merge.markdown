---
layout: post
title: "GIT: ff-only merge"
date: 2014-09-05 09:00
comments: true
categories: [git, merge]
---
Если что-то мне не нравится при использовании github/bitbucket, как тулзу для код ревью, это **merge** commit.
[Fabien Potencier](https://github.com/fabpot) пошутил на конференции, что раньше он был главным контрибьютером, а теперь главным мерж коммитером.

<!-- more -->

Не хочется вдаваться в детали [a-successful-git-branching-model](http://nvie.com/posts/a-successful-git-branching-model/),
но там советуют использовать всегда ```--no-ff``` c **merge** commit.

В моем окружении пришли к выводу, что пользы нет никакой. После длительного совещания решили на новом проекте использовать только ```ff-only```.
В этом случае не создается merge commit, но накладывается ограничение на ветку, она всегда должна быть актуальной.
То есть вам всегда нужно делать rebase, даже если нет конфликтов.

В итоге merge PR всегда представлял нечто такое:

```bash
git fetch amazing-developer
git checkout -b TICKET-1001 --track amazing-developer/TICKET-1001
git rebase develop
git push amazing-developer TICKET-1001 -f
git checkout develop
git merge --ff-only amazing-developer/TICKET-1001
git branch -D TICKET-1001
git push amazing-developer :TICKET-1001
```

Есть у меня подозрения, что на гитхабе четвертая строка не нужна, но у битбакета с этим проблемы. Поэтому админ вынужден иметь write доступ на форки.

И так вот мы работали почти год, никаких проблем не возникало при применении такой политики. Неделю назад я решил написать простой bash script.

{% gist fightmaster/4b95a298c8d0d17b1cdc ff-only-merge.bash %}

Он делает за вас рутиный ввод команд в консоли, но не отменяет работу головой.