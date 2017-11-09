<?php
/*
include('Admin.php');
include('Member.php');


$admin = new Admin(1, 'John');

$member  = new Member(2, 'Dave');

echo $admin -> getId();

echo $admin -> authenticatedFeatures();

*/

use Test\Person;
use Test\staff;
use Test\Business;


$gagan  = new Person("gagan Pradhan");
$staff  = new Staff(["PersonA","PersonB"]);
$GO	 	= new Business($staff);
$GO -> hire(new Person("Gagan Pradhan"));
$GO -> hire($gagan);
var_dump($staff);





// interface





?>
	


