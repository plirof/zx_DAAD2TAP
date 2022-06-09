<?php
/*

220604 - parser_v003 

ToDO:
https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_tooltip

*/
$filename="xx5f1.DSF";
$min_height=500; //min_height:500
$min_width="1100";//,min_width:800
$font_size= 18;//font_size: 18

$debug=false;
$table_var_array=["CTL","VOC","STX","MTX","OTX","LTX","CON","OBJ","PRO0","PRO1","PRO2","PRO3","PRO4","PRO5","PRO6","PRO7","PRO8","PRO9","PRO10"];
$table_description=["Control section","Vocabulary sectio","System Message Text section","Message Text section","Object Text section","Location Text section","Connections section","Object Definition section","PRO0","PRO1","PRO2","PRO3","PRO4","PRO5","PRO6","PRO7","PRO8","PRO9","PRO10"];

for($i = 0; $i <= 18; $i++) {
     
     ${$table_var_array[$i]} = $table_var_array[$i];
     echo " <a href=#${$table_var_array[$i]}>$table_var_array[$i]</a> |";//."<br>";

}
//if ($debug) print_r($table_var_array);




?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-latest.min.js"></script>

 <!--  
 
Changes:
-220214 - Edit-Area test002
-201019 - hidesubmit option


-->
<script language="javascript" type="text/javascript" src="edit_area/edit_area_full.js"></script>



  <script>
<?php

for($i = 0; $i <= 18; $i++) {
     
     //${$table_var_array[$i]} = $table_var_array[$i];
     if ($debug)echo "<BR> $table_var_array[$i] = ". ${$table_var_array[$i]}."<br>";

     echo '
       
		editAreaLoader.init({
		id : "text_entered_'.${$table_var_array[$i]}.'"		// textarea id
		,syntax: "basicsinclair"			// syntax to be uses for highgliting
		,start_highlight: true // to display with highlight mode on start-up
		,allow_resize:"both"
		,toolbar: "search, go_to_line, fullscreen, |, undo, redo, |, select_font,|, change_smooth_selection, highlight, reset_highlight, word_wrap,syntax_selection, |, help"
		,min_height:500
		,min_width:'.$min_width.'
		,font_size: 18

});
     ';


}; //END of for($i = 0; $i <= 19; $i++) {


?>

/*
editAreaLoader.init({
	id : "text_entered_CTL"		// textarea id
	,syntax: "basicsinclair"			// syntax to be uses for highgliting
	,start_highlight: true // to display with highlight mode on start-up
	,allow_resize:"both"
	,toolbar: "search, go_to_line, fullscreen, |, undo, redo, |, select_font,|, change_smooth_selection, highlight, reset_highlight, word_wrap,syntax_selection, |, help"
	,min_height:500
	,min_width:800
	,font_size: 18

});

editAreaLoader.init({
	id : "text_entered_VOC"		// textarea id
	,syntax: "basicsinclair"			// syntax to be uses for highgliting
	,start_highlight: true // to display with highlight mode on start-up
	,allow_resize:"both"
	,toolbar: "search, go_to_line, fullscreen, |, undo, redo, |, select_font,|, change_smooth_selection, highlight, reset_highlight, word_wrap,syntax_selection, |, help"
	,min_height:500
	,min_width:800
	,font_size: 18

});
*/




	


  	function myFunction_CTL (){

   		//document.getElementById('theForm').submit();
   		var x = document.getElementsByName('theForm');
   		editAreaLoader.setValue(editAreaLoader.getValue('text_entered'));
		x[0].submit(); // Form submission
	}
</script>
</head>
<body>

<?php
$myfile = fopen($filename, "r") or die("Unable to open file!");
$contents=fread($myfile,filesize($filename));
//echo $contents;
fclose($myfile);


function get_string_between($string, $start, $end){
	$string = " ".$string;
	$ini = strpos($string,$start);
	if ($ini == 0) return "";
	$ini += strlen($start);   
	$len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}

$fullstring = "this is my [tag]dog[/tag]";
$parsed = get_string_between($fullstring, "[tag]", "[/tag]");

//echo $parsed; // (result = dog)


$CTL=get_string_between($contents, '/CTL', '/VOC');
$VOC=get_string_between($contents, '/VOC', '/STX');
$STX=get_string_between($contents, '/STX', '/MTX');
$MTX=get_string_between($contents, '/MTX', '/OTX');
$OTX=get_string_between($contents, '/OTX', '/LTX');
$LTX=get_string_between($contents, '/LTX', '/CON');
$CON=get_string_between($contents, '/CON', '/OBJ');
$OBJ=get_string_between($contents, '/OBJ', '/PRO 0');

$PRO0=get_string_between($contents, '/PRO 0', '/PRO 1');
$PRO1=get_string_between($contents, '/PRO 1', '/PRO 2');
$PRO2=get_string_between($contents, '/PRO 2', '/PRO 3');
$PRO3=get_string_between($contents, '/PRO 3', '/PRO 4');
$PRO4=get_string_between($contents, '/PRO 4', '/PRO 5');
$PRO5=get_string_between($contents, '/PRO 5', '/PRO 6');
$PRO6=get_string_between($contents, '/PRO 6', '/PRO 7');
$PRO7=get_string_between($contents, '/PRO 7', '/PRO 8');
$PRO8=get_string_between($contents, '/PRO 8', '/PRO 9');
$PRO9=get_string_between($contents, '/PRO 9', '/PRO 10');
$PRO10=get_string_between($contents, '/PRO 10', '/END');


for($i = 0; $i <= 7; $i++) {
     ${"variable$i"} = "foo";
}

//$LNK=get_string_between($contents, '/LNK', '/VOC');
//$OBJ=get_string_between($contents, '/OBJ', '/VOC');
//$OBJ=get_string_between($contents, '/OBJ', '/VOC');



?>

	<form action="handle-submit.php" name="theForm" target="emulator_output" id="theForm" method="post" onsubmit="editAreaLoader.getValue('text_entered_CTL')">

<!--
<textarea name="text_entered_CTL" id="text_entered_CTL" wrap="hard" >
/CTL
<?php
echo $CTL;
?>
</textarea>
<BR>

-->



	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris rutrum ante nunc. Proin sit amet sem purus


<?php

for($i = 0; $i <= 18; $i++) {
     
     //${$table_var_array[$i]} = $table_var_array[$i];
     if ($debug)echo "<BR> $table_var_array[$i] = ". ${$table_var_array[$i]}."<br>";

     echo "<div id=$table_var_array[$i]><h3>/$table_var_array[$i]</h3></div>".'

<textarea name="text_entered_'.$table_var_array[$i].'" id="text_entered_'.$table_var_array[$i].'" wrap="hard" >'.
//'/'.$table_var_array[$i].//'<BR>'.
${"$table_var_array[$i]"}
.'</textarea>
<BR>

     ';


}; //END of for($i = 0; $i <= 19; $i++) {

?>





		<!--<div id="div-submit" >----------------------------div-submit -->
		<label for="name">filename:</label> <!--SchoolName -->
		<input type="text" id="schoolname" name="schoolname" size=15>
		<br>
		<button onclick="myFunction_CTL()">Click me CTL</button>
		<br>
		<input type="submit" value="ΥΠΟΒΟΛΗ"> 
		<!--</div>------------------------------------------div-submit -->
	</form>
<pre>
<p class="clickable">

<?php
//echo "$contents";



for($i = 0; $i <= 18; $i++) {
     
     //${$table_var_array[$i]} = $table_var_array[$i];
     //if ($debug)echo "<BR> $table_var_array[$i] = ". ${$table_var_array[$i]}."<br>";

     echo "/$table_var_array[$i]<BR>".${"$table_var_array[$i]"}.
     '<BR>     ';


}; //END of for($i = 0; $i <= 19; $i++) {


?>

</p>
</pre>
<script type="text/javascript">

	function strcmp(a, b)
	{   
	    return (a<b?-1:(a>b?1:0));  
	}

	
  	function search_word (str){
  		console.log(str);
   		//document.getElementById('theForm').submit();
   		//var x = document.getElementsByName('theForm');
   		//editAreaLoader.setValue(editAreaLoader.getValue('text_entered'));
		//x[0].submit(); // Form submission
		if(strcmp(str,"mes 1") ) alert ("AAAAAAAAAAA");
		alert(str);
	}	
</script>

<script type="text/javascript">
    $(".clickable").click(function(e){
         s = window.getSelection();
         var range = s.getRangeAt(0);
         var node = s.anchorNode;
         
         // Find starting point
         while(range.toString().indexOf(' ') != 0) {                 
            range.setStart(node,(range.startOffset -1));
         }
         range.setStart(node, range.startOffset +1);
         
         // Find ending point
         do{
           range.setEnd(node,range.endOffset + 1);

        }while(range.toString().indexOf(' ') == -1 && range.toString().trim() != '');
        
        // Alert result
        var str = range.toString().trim();
        search_word(str);
       });		

</script>
</body>
</html>