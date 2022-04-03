<?php

  function loadPageInfos($page){
    if(!isset($page) || empty($page)){
      exit();
    }

    $pageContents["title"] = $page;
    $pageContents["lang"] = "fr";

    return $pageContents;
  }

  // // chemin d'accès à votre fichier JSON
  // $file = 'file.json';
  // // mettre le contenu du fichier dans une variable
  // $data = file_get_contents($file);
  // // décoder le flux JSON
  // $obj = json_decode($data);
  // // accéder à l'élément approprié
  // echo $obj[0]->name;

  // "list" : {"#","Nom","Prénom","Addresse mail", "Téléphone", "Adresse"},

  function searchPageJson($page){
    // $file = './pageData.json';
    $data = file_get_contents("pageData.json");
    $obj = json_decode($data);

    // print_r($obj);

    foreach($obj as $key => $value) {
      if($value->page == $page){
        return $value;
      }
    }
  }


  function loadPageContent($page){

    if(!isset($page) || empty($page)){
      exit();
    }

    // $backofficePage = ["#","Nom","Prénom","Addresse mail", "Téléphone", "Adresse"];

    if($page == "backoffice"){
      $pageData = searchPageJson("Backoffice");
      if(!empty($pageData)){
        // print_r($pageData);
<<<<<<< HEAD
        echo "Title: ".$pageData->page."<br>
              Modify button: ".$pageData->modifyButton."<br>
              Delete button: ".$pageData->deleteButton."<br>";
        foreach ($pageData->list as $key) {
          echo $key;
        }
=======
      echo "Title: ".$pageData->page."<br>
            Modify button: ".$pageData->modifyButton."<br>
            Delete button: ".$pageData->deleteButton."<br>";
      foreach ($pageData->list as $key) {
        echo $key;
      }
>>>>>>> bf8070e880aa412433831ea581c0ef90b0a5a1e9
      }
    }

  }



?>
