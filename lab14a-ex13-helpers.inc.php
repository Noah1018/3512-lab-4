<?php

/*
 Outputs all the passed-in artists
*/
function outputArtists($results) {

}

/*
 Outputs all the passed-in paintings
*/
function outputPaintings($results) {

}

/*
 Displays a single painting
*/
function outputSingleArtist($row) {
   echo "<li>";
   echo '<a href="' . $_SERVER["SCRIPT_NAME"] . '?id=' . $row['ArtistID'] . '">';
   echo $row['LastName'] . '</a>';
   echo "</li>";
}

/*
 Displays a single painting
*/
function outputSinglePainting($row) {
   echo '<div class="item">';
   echo '<div class="image">';
   echo '<img  src="images/art/works/square-medium/' . $row['ImageFileName'] .'.jpg">';
   echo '</div>';
   echo '<div class="content">';
   echo '<h4 class="header">';
   echo $row['Title']; 
   echo '</h4>';
   echo '<p class="description">';
   echo $row['Excerpt'];
   echo '</p>';
   echo '</div>';  
   echo '</div>';  
}

?>