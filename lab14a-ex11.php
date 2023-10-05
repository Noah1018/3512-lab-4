<?php  
/* add your PHP code here */
require_once('config.inc.php');

try {

}
catch (PDOException $e) {
   die( $e->getMessage() );
} 


function outputGalleries($galleries) {
   foreach ($galleries as $row) {
      echo "<li >";
      echo "<a href='" . $_SERVER['PHP_SELF'] . "?gallery=" . $row['GalleryID'] . "'>";
      echo $row['GalleryName'];
      echo "</a></li>";
    }
}
function outputPaintings($paintings) {
   echo "<h3 class='is-size-5 has-text-weight-medium'>Paintings</h3>";
   echo "<table class='table'>";
   foreach ($paintings as $row) {
      echo "<tr>";
      $filename = "images/art/works/square-medium/" . $row['ImageFileName'] . '.jpg';
      echo "<td>" . "<img src='" . $filename . "'></td>";
      echo "<td>" . $row['Title'] . "</td>";
      echo "<td>" . $row['YearOfWork'] . "</td>";
      echo "</tr>";
    }
   echo "</table>";
}

                   
?>
<!DOCTYPE html>
<html lang=en>
<head>
    <title>Lab 14a</title>
    <meta charset=utf-8>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css" rel="stylesheet">
</head>
<body >  
<header class="p-3">
  <h2 class="is-size-2 has-background-light">Multiple Queries</h2>
</header>
<main class="p-3">
   <article class="columns">

      <section class="column is-one-third">
         <ul class="ui list">
         <?php
            /* add your PHP code here */
            outputGalleries($galleries);
         ?>
         </ul>
      </section>
      

      <section class="column">
         <?php
            /* add your PHP code here */
            if (isset($paintings) && count($paintings)>0) {
               outputPaintings($paintings);
            }
         ?>
      </section>  
   </article>

    
</main>    
</body>
</html>