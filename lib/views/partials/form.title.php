<label for='aTitle'>Title:</label>
<input type='text' name='title' value='<?php
if($result){
  echo $result['title'];
}
else{
  echo "";
}

?>'/>
