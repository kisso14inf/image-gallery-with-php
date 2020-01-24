<?php 

//útvonalak felvétele a $routes tömbbe
route('/', 'homeController');
route('/about', 'aboutController');
route('/image/(?<id>[\d]+)', 'singleImageController');
route('/image/(?<id>[\d]+)/edit', 'singleImageEditController', 'POST');
route('/image/(?<id>[\d]+)/delete', 'singleImageDeleteController', 'POST');

// az útvonal lekérdezése
$uri = $_SERVER["REQUEST_URI"];
$cleaned = explode("?", $uri)[0];
// dispatch() fv. meghívása, ami kiválasztka az adott útvonalhoz tartozó controllert
list($view, $data) = dispatch($cleaned, 'notFoundController');
extract($data);





