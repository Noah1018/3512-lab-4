<?php  
/* add your PHP code here */
require_once('config.inc.php');




                   
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
        <form class="ui form" method="post" >
          <h3 class="ui dividing header">Filters</h3>

          <div class="field">
            <label>Find painting: </label>
            <input type="text" placeholder="enter search string" name="search" />
          </div>   
          <button class="small ui orange button" type="submit">
              <i class="filter icon"></i> Filter 
          </button>    
        </form>
    </section>
    

    <section class="twelve wide column">
      <?php
         /* add your PHP code here */

      ?>
    </section>  
    
</main>    
<footer class="ui black inverted segment">
  <div class="ui container">&copy; 2021 Fundamentals of Web Development</div>
</footer>
</body>
</html>