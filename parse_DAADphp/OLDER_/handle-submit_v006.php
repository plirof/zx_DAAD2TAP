<?php
//for debugging
//echo $_REQUEST["mytext"];
$output_2_file="";
$table_var_array=["CTL","VOC","STX","MTX","OTX","LTX","CON","OBJ","PRO0","PRO1","PRO2","PRO3","PRO4","PRO5","PRO6","PRO7","PRO8","PRO9","PRO10"];

for($i = 0; $i <= 18; $i++) {
     //echo "<hr>";
     ${$table_var_array[$i]} = $table_var_array[$i];
     //echo " <a href=#${$table_var_array[$i]}>$table_var_array[$i]</a> |";//."<br>";
     $title="\n/${$table_var_array[$i]}\n";
     $main=$_REQUEST["text_entered_${$table_var_array[$i]}"];
     echo "<pre>".$title;
     echo $main; //">$table_var_array[$i]</a> |";//."<br>";

     $output_2_file=$output_2_file.$title.$main;

	 echo "</pre>";//<hr>";
}



echo "<hr>";
echo "<pre>$output_2_file</pre>";
//print_r($_REQUEST);
//var_dump($_REQUEST);


$myfile = fopen("daad-save.txt", "w") or die("Unable to open file!");
$txt = $output_2_file;
fwrite($myfile, $txt);
fclose($myfile);


?>