<?php
require_once 'config.inc.php';
require_once 'lab14a-test03-helpers.inc.php';  
require_once 'lab14a-db-classes.inc.php';

// Create a connection
$conn = DatabaseHelper::createConnection();

$galleryDB = new GalleryDB($conn);
$galleries = $galleryDB->getAll();

$paintings = [];
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $paintSql = 'select * from Paintings where ArtistId=?';
    $paintings = DatabaseHelper::runQuery($conn, $paintSql, Array($_GET['id']))->fetchAll();
} else {
  $paintDB = new PaintingDB($conn);
  $paintings = $paintDB->getTop20();
}
try {
$conn = DatabaseHelper::createConnection(array(DBCONNSTRING,
DBUSER, DBPASS));
$artSql = "SELECT ArtistID,FirstName,LastName FROM Artists
ORDER BY LastName";
$artists = DatabaseHelper::runQuery($conn,$artSql,null);
if (isset($_GET['id']) && $_GET['id'] > 0) {
$paintSql = 'select * from Paintings where ArtistId=?';
$paintings = DatabaseHelper::runQuery($conn, $paintSql,
Array($_GET['id']));
} else {
$paintResults = null;
}
} catch (Exception $e) { die( $e->getMessage() ); }
?>
<!DOCTYPE html>
<html lang=en>
<head>
    <title>Lab 14</title>
    <meta charset=utf-8>
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet">
</head>
<body >
    
<main class="ui segment doubling stackable grid container">

    <section class="four wide column">
        <form class="ui form" method="get" action="<?=$_SERVER['REQUEST_URI']?>">
          <h3 class="ui dividing header">Filters</h3>

          <div class="field">
            <label>Museum</label>
            <select class="ui fluid dropdown" name="museum">
                <option value='0'>Select Museum</option>  
              <?php  
              foreach ($galleries as $gallery) {
              echo "<option value='{$gallery['GalleryID']}'>{$gallery['GalleryName']}</option>";
              }
              ?>

            </select>
          </div>   
          <button class="small ui orange button" type="submit">
              <i class="filter icon"></i> Filter 
          </button>    

        </form>
    </section>
    

    <section class="twelve wide column">
        <h1 class="ui header">Paintings</h1>
        <ul class="ui divided items" id="paintingsList">
            
          
        <?php  
    foreach ($paintings as $painting) {
      $imgFileNameWithJPG = $painting['ImageFileName'] . ".jpg";

      echo "<li class='item'>
              <a class='ui small image' href='single-painting.php?id={$painting['PaintingID']}'>
              <img src='images/art/works/square-medium/{$imgFileNameWithJPG}'>
            


              </a>
              <div class='content'>
                  <a class='header' href='single-painting.php?id={$painting['PaintingID']}'>{$painting['Title']}</a>
                  <div class='meta'><span class='cinema'>{$painting['Artist']}</span></div>        
                  <div class='description'>
                      <p>{$painting['Excerpt']}</p>
                  </div>
                  <div class='meta'>     
                      <strong>{$painting['YearOfWork']}</strong>        
                  </div>        
              </div>      
            </li>";
  }
  
?>

            



        </ul>        
    </section>  
    
</main>    
<footer class="ui black inverted segment">
  <div class="ui container">&Copy 2019 Fundamentals of Web Development</div>
</footer>
</body>
</html>