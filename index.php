<?php
  include("generator.php");
  $pageInfos = loadPageInfos("page");
  if(isset($_GET["page"]) && !empty($_GET["page"])){
    $pageName = htmlspecialchars($_GET["page"]);
  } else {
    $pageName = "error";
  }
?>
<!DOCTYPE html>
<html lang="<?=$pageInfos["lang"] ?>" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $pageInfos["title"] ?></title>
  </head>
  <body>
    <table>


      <?= loadPageContent($pageName);  ?>

    </table>
  </body>
</html>
