---
layout: page
title: "Обертка над git"
date: 2014-02-02 21:44
comments: false
sharing: true
footer: true
sidebar: true
tags: [php,course,git,git-tools]
---
##### Описание
Я хотел давно написать обертку над git, так как иногда встречаешь какие-то библиотеки, они напрямую дергают git.
К сожалению, [git-wrapper](https://github.com/cpliakas/git-wrapper) - уже написали :).

##### Задачи
Но не смотря на наличие библиотеки, задача есть.

Чтобы избежать постоянных merge коммитов, мой воркфлоу таков:

```
$ git fetch developer
$ git merge --ff-only developer/some-branch
```
Но если есть два PR, то так сработает толко для одного. Для другого необходимо делать rebase.

```
$ git fetch developer
$ git checkout -b sme-branch --track developer/some-branch
$ git rebase develop
$ git push developer some-branch -f
$ git checkout develop
$ git merge --ff-only developer/some-branch
```
Чаще всего на 3 шаге нет конфликтов, поэтому, по-хорошему, можно было упросить модераторскую работу.

##### Целевая аудитория
merge коммиты раздражают всех. Поэтому тулза полезна была бы не только мне.

##### Аналоги
После конференции по симфони появился проект [gush](https://github.com/cordoval/gush).
Но он работае более глобально, ксати без реализации этой фичи, и только с гитхабом.

##### Дополнительные задачи
Можно продолжить развивать проект в сторону gush, но стоит ли? Хотя придумать какие-то небольшие задачки можно.
