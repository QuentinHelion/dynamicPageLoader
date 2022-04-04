<?php

  function loadPageInfos($page){
    if(!isset($page) || empty($page)){
      exit();
    }

    $pageContents["title"] = $page;
    $pageContents["lang"] = "fr";

    return $pageContents;
  }

  function searchPageJson($page){
    $data = file_get_contents("pageData.json");
    $obj = json_decode($data);

    // print_r($obj);

    foreach($obj as $key => $value) {
      if($value->page == $page){
        return $value;
      }
    }
  }

  function dbConnecion(){
    try{
      $db = new PDO('mysql:host=localhost;dbname=easyscooter', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }catch(Exception $e){
      die('Erreur : ' . $e->getMessage()); // Si erreur, afficher le message d'erreur
    }

    return $db;
  }

  function loadPageContent($page){

    if(!isset($page) || empty($page)){
      exit();
    }

    $pageData = searchPageJson($page);
    if(isset($pageData) && !empty($pageData)){
      echo "Title: ".$pageData->page."<br>
            Modify button: ".($pageData->modifyButton ? "Oui" : "Non")."<br>
            Delete button: ".($pageData->deleteButton ? "Oui" : "Non")."<br>";


      $columnList = NULL;
      echo "<tr>";
        foreach ($pageData->list as $key => $value) {
          echo "<th>".$value->title."</th>";
          $columnList = $columnList ? $columnList.','.$value->db : $value->db;
        }

        if($pageData->modifyButton || $pageData->deleteButton){
          echo "<th>Actions</th>";
        }
      echo "</tr>";

      $db = dbConnecion();

      $columnList = "*";

      $s = "SELECT ".$columnList." FROM USERS";
      // echo $s;
      $reqs = $db->prepare($s);
      $reqs->execute();
      $result = $reqs->fetch();

      if(isset($result) && !empty($result)){
        print_r($result);
        echo "<tr>";
          foreach ($result as $key) {
            print_r($key);
            // echo "<td>".$value."</td>";
          }
        echo "</tr>";
      }
    }
  }
?>
