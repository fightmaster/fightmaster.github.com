---
layout: post
title: "Setting up Symfony with Nginx server"
date: 2013-02-12 23:21
comments: true
categories: [nginx,symfony2,ubuntu]
tags: [nginx,symfony2,options,https,ubuntu,access denied, php 5.4]
---
Каждый раз, когда я обновляю систему или nginx, я постоянно мучаюсь с настройкой.
С переходом на ```php 5.4``` я столкнулся с новой проблемой ```access denied```.
Ниже выкладываю рабочий конфиг для ```nginx/1.2.6``` и ```symfony2```;
<!-- more -->

{% include_code nginx/conf.d/project nginx/conf.d/project %}

Полезная ссылка по теме: [http://wiki.nginx.org/Symfony](http://wiki.nginx.org/Symfony)
