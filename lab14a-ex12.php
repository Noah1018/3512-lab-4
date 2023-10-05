<?php  
/* add your PHP code here */
require_once('config.inc.php');

try {
   $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   


   $people = getPeople($pdo);   
   $pdo = null;
}
catch (PDOException $e) {
   die( $e->getMessage() );
} 

function getPeople($pdo) {
   $sql = "SELECT name, email FROM Editable ";
   $result = $pdo->query($sql);
   return $result->fetchAll(PDO::FETCH_ASSOC); 
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
  <h2 class="is-size-2 has-background-light">Inserting Data</h2>
</header>
<main class="p-3">
   <article class="columns">

      <section class="column is-two-fifths">
         <h3 class="is-size-5 p-1">Existing People</h3>
         <ul class="card list p-1">
         <?php
            /* add your PHP code here */
            foreach( $people as $p ) {
               echo '<li>';
               echo $p['name'] . " (";
               echo $p['email'] . ')';
               echo '</li>';
            }
         ?>
         </ul>
      </section>
      

      <section class="column">
         <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
            <div class="field">       
               <label class="label">Name</label>
               <div class="control">
                  <input class="input" type="text" name="name">
               </div>
            </div>
            <div class="field">
               <label class="label">Email</label>
               <div class="control">
                  <input class="input" type="text" name="email">
               </div>
            </div>   

            <div class="field is-grouped">
               <div class="control">
                  <input type="submit" class="button has-background-info-light" value="Add" />
               </div>
            </div>                     
         </form>
      </section>  
   </article>

    
</main>    
</body>
</html>