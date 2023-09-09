<?php
$contents=file_get_contents("/flag/flag.txt");
$lines=explode("\n",$contents);
foreach($lines as $line){
 echo $line.'<br>';
}
?>