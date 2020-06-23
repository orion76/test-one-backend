<?php
if(preg_match('/^\/json.*/',$_SERVER['REQUEST_URI'])){
    require_once 'backend/public/index.php';
}else{
  require_once 'frontend/dist/index.html';
}
