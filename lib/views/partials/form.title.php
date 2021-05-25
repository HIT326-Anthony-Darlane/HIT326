<label for='aTitle'>Title:</label>
<input type='text' name='title' value='
<?php
global $all_articles;
if($all_articles){
  echo $all_articles['title'];
}
else{
  echo "";
}

?>'/>
