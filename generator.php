<?php

  function loadPageInfos($page){
    if(!isset($page) || empty($page)){
      exit();
    }

    $pageContents["title"] = $page;
    $pageContents["lang"] = "fr";

    return $pageContents;
  }

  $contentArray{
    "page" -> "backoffice",
    "content" -> {1,2,3}
  }


  function loadPageContent($page){

    if(!isset($page) || empty($page)){
      exit();
    }

    if($page == "backoffice"){
      
    }

  }



?>
