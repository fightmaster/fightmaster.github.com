<?php
$bus = new Transport();
$bus->owner = 'School';
$bus->model = 'BMW';
$bus->year = 2013;
$bus->driver = 'Don Dead - scool driver';
$bus->speed = 40;

$airplan = new Transport();
$airplan->owner = 'Airflot';
$airplan->model = 'TU-154';
$airplan->year = 2000;
$airplan->pilot = 'Pilot';
$airplan->co_pilot = 'Co-pilot'
$airplan->speed = 1600;
$airplan->wingspan = 50;

$car = new Transport();
$car->owner = 'Sam Sam';
$car->model = 'bugati';
$car->year = 2010;
$car->speed = 320;
$car->accelerationTo100 = 7;
$car->airbag = true;
