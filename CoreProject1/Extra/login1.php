<?php 
foreach ($_POST["languages"] as $language) {
switch ($language) {
case "PHP" :
echo "PHP? Awesome! <br />";
break;
case 'Perl':
echo "Perl? Ew. Just Ew. <br />";
break;
case 'Ruby' :
echo "Ruby? Can you say... ’bandwagon?’ <br />";
break;
default:
echo "Unknown language!";
}
}
?>
