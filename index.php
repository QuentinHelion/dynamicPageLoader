<?php
  include("generator.php");
  $pageInfos = loadPageInfos("page");
?>
<!DOCTYPE html>
<html lang="<?=$pageInfos["lang"] ?>" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $pageInfos["title"] ?></title>
  </head>
  <body>
    <?= loadPageContent("backoffice");  ?>
  </body>
</html>
