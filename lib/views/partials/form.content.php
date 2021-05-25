<!--partials are good so you dont repeat yourself :)-->
<label for='aContent'>Content:</label>
<textarea type='text' name='content' rows='10' cols='50'>
<?php
global $all_articles;
if($all_articles){
  echo $all_articles['content'];
  }
  else{
    echo "";
  }
?>
</textarea>
