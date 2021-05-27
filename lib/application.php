<?php
 function render($layout,$content){
   $content = VIEWS."/{$content}.php";

  if(!empty($layout)){
    require VIEWS."/{$layout}.layout.php";
  }
  else{
    echo "THERE WAS AN ERROR LOADING THIS FUNCTION TO LOAD PAGE";
  }
  exit();
}

function get(){

}

 ?>
