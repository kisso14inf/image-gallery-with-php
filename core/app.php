<?php


// útvonalak felvétele a $routes tömbbe
/*route('/', 'homeController');
route('/about', 'aboutController');
route('/image/(?<id>[\d]+)', 'singleImageController');
route('/image/(?<id>[\d]+)/edit', 'singleImageEditController', 'POST');
route('/image/(?<id>[\d]+)/delete', 'singleImageDeleteController', 'POST'); */
 
// az utvonal lekérdezése
$uri = $_SERVER["REQUEST_URI"] ?? '/'; //lehet hogy egy nem létező változóra hivatkozunk// '/'- a home-ot jelenti
$cleaned = explode("?", $uri) [0];


//dispatch() fv.meghívása, ami kiválasztja az adott utvonalhoz tartozó controllert

list($view, $data) = dispatch($cleaned, 'notFoundController');
extract($data);




 /*
  * $total - a képek számának meghatározása
  
    $query = "SELECT count(*) AS count FROM photos";
    $result = mysqli_query($connection, $query); //itt futtatjuk le
    $row = mysqli_fetch_assoc($result); //fetch-lehívás assoc
    
    $total = $row['count']; */

    /**
     * $lastpage - az utolso oldal sorszáma
     */
//--------------------------------------------------


