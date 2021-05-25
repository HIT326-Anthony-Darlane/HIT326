<!--partials are good so you dont repeat yourself :)-->
<label for='aContent'>Content:</label>
<textarea type='text' name='content' rows='10' cols='50'>
<?php
  if($result){
    echo $result['content'];
  }
  else{
    echo "";
  }
?>
</textarea>
