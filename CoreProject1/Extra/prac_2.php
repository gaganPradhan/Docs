<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<?php


		class newclass{
			function test1(){
				echo "class";
			}
			
			function __construct(){
				echo "object created";
			}


		}
		/**
		* 
		*/
		class secondClass extends newclass
		{
			
					
			function __construct(){
				echo "object created";
			}

			function test(){
				echo "2nd class";
			}
		}

		class foo {
function __construct()
{
echo __METHOD__;
}
function foo()
{
// PHP 4 style constructor
}
}
new foo();
		

		$obj1=new newclass();
		$obj2=new secondClass();
		$obj1->test1();
		$obj2->test1();
		$obj2->test();
	//	$obj3=new  foo();


	?>


</body>
</html>