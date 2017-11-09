<?php


echo (int)((0.1+0.7)*10);

$var1="ref1";
$$var1="ref2";
echo $var1;
echo $ref1;

$s=true;
echo $s;

echo "<br>";
for($i=0;$i<10;$i++)
{
	if($i%2==0)
		{continue;}
	else
	{
		echo $i;
	}

	echo ("<br>");

}	

$i=10;
while($i>0){

	if($i==5){
		break;
	}
	else{
		echo $i;
	}

	$i--;

}



$s="string1";
$s1="string2";
$s3="string3";

function hello(){

	global $s,$s1;
	
	echo "$s";
	echo $GLOBALS['s1'];
	echo $GLOBALS['s3']="asd";
	
	echo "<br>";

}

function hello1($val=0){

	echo "$val";

}

echo $s3;


HELLo();//case insensitive
hello1("asd");
hello1();
hello1(50);

echo "<br>";

$arrayexamp=array("car"=>"bmw","bus"=>"tata","watch"=>"rolex");

echo print_r($arrayexamp);
echo $arrayexamp['car'];

define("asd", "String constant");
echo "<br>";
$array=array(1,2,3,4);
$array[]=45;
$array['asd']=123;
print_r($array);

echo "<br>";
var_dump($array);
echo asd;

echo "<br>";
sort($array);
print_r($array);


//asort($arrayexamp);
//ksort($arrayexamp);

print_r(array_reverse($arrayexamp));
echo "<br>";
function display_arr($examp){
	reset($examp);//reset to 1st postion
	while(key($examp)!==null){

	echo key($examp)." ".current($examp)."<br>";
	 next($examp);	
		
	}
}


display_arr($arrayexamp);


foreach ($array as $x => $x_value) {
	echo $x.": ".$x_value."<br>";
}

foreach ($array as $value) {
	echo $value."<hr>";
}
echo "<br>";





$stack=array();
array_push($stack, 'lets','go');
var_dump($stack);

array_pop($stack);
var_dump($stack);

$multi=array(
	[
		'car1',
		'car2',
		'car3'

	],	
	[
		4,
		5,
		6
	]
);
echo $multi[0][0].": In stock: ".$multi[0][1].", sold: ".$multi[0][2].".<br>";
echo $multi[1][0].": In stock: ".$multi[1][1].", sold: ".$multi[1][2].".<br>";


echo str_word_count("one two three four \n");
echo strlen("hello world");
echo strrev("string");
$x = 6;

echo $x << 1;

echo strtr('str', 't', "o");

$str=array(
	's' => 't',
	't' => 'o',
	'r' => 'p'
);
echo strtr("str", $str);

echo "\n";
#=========================================================================
$win="winner";

if(!strncasecmp("wasd", "winner",2)){
	echo "same";
}


	echo strpos($win, "I");	

echo strtr($win, 'w', 'a');

$haystack 	= "abcdefg";
$needle 	= 'abc';

if (stripos ($win, "Wi") !== false) {
echo "<hr>Found<hr>";
}


//==========================================================================



$test1 = "asdaASDdasd";
$test2 = "ASD";
if(strpos($test1, $test2)!==false)
{
	printf("<hr>Found the match at %.2f <hr>",strpos($test1, $test2));

}



$data 	= '123 456 789';
$format = '%d %d %d';
var_dump (sscanf ($data, $format));


$name = "Davey john Shafik";
// Simple match
$regex = "/[a-zA-Z\s]/";
if (preg_match($regex, $name)) {
echo "<hr>valid name<hr>";
}
$regex = "/^(\w+)(\s)*(\w*)\s(\w+)/";
$matches = array();
if (preg_match ($regex, $name, $matches)) {
var_dump ($matches);
}

$email="asd@s.com";
$regex="/(\w+)@(\w+)\.com/";
if(preg_match($regex, $email)){
	echo"<hr>email is good<hr>";
}
// Match with subpatterns and capture

#===========================================================================


$string='aaabnbc234';
$mask='abc';
echo strspn($string, $mask,1,4);

$a=0;
str_replace('a','b','alalal',$a);
echo $a;

echo substr_replace("hello world", "reader", 0, 5);

echo "\n".substr_replace("abcd@usg.net", " ", strpos("abcd@usg.net", '@'));

echo number_format("100000.6126",3,"n"," ");
// setlocale(LC_MONETARY, "en_US");
// echo money_format('%.2n', "100000.65as");
echo<<<TEXT
ASDASDASDASDASDASD
asda
TEXT;

echo"<hr>";	

$str = " Hello World! ";
echo "Without trim: " . $str;
echo "<br>";
echo "With trim: " . trim($str);

echo htmlspecialchars($_SERVER["PHP_SELF"]);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="login1.php">
<p>
Please choose all languages you currently know or would like
to learn in the next 12 months.
</p>
<p>
<input type="checkbox" name="languages[]" value="PHP" />
PHP
<input type="checkbox" name="languages[]" value="Perl" />
Perl
<input type="checkbox" name="languages[]" value="Ruby" />
Ruby
<br />
<input type="email" name="email" placeholder="email" />
<hr>
<input type="submit" value="Send" name="poll" />
</p>
</form>
</body>
</html>
