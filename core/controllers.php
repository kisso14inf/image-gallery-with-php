<?php
/**
 * controllers.php: Az egyes útvonalakat (route) lekezelő függvények.
 * Minden függvénynek egy tömböt kell visszaadnia, aminek az első eleme a nézet (view)  neve.
 * Második eleme egy assoc tömb, amiben minden kulcs-érték párnak szerepelnie kell, amit a nézet használni fog.
 * return ["viewname", ['key1' => 'value1', 'key2' => 'value2', ...]];
 */
 
/**
 * notFoundController()
 *
 * @return void
 */
function notFoundController() {
    return [
        '404',
        [
            'title' => 'The page you are lookgin for is not found.'
        ]
    ];
}
/**
 * homeController()
 *
 * @return void
 */
function homeController() {
    /**
     * Query string változók: $_GET[]
     * PHP 7 új operátora: null coalescing operator
     * A ternary operátor (felt ? true : false) és az isset() fv. együttes használatát helyettesíti.
     * A null coalescing operator az első (bal oldali) operandusát adja vissza, ha az létezik és nem null, különben a másodikat (jobb oldalit)
     * Az isset() fv. igazat ad vissza, ha a paraméterül adott változó létezik és nem null (gyakran használatos a $_GET-ben levő változók ellenőrzésére).
     * Tehát az
     *   isset($_GET["size"]) ? $pageSize = $_GET["size"] : $pageSize = 10;
     * helyettesíthető ezzel:
     *   $pageSize = $_GET["size"] ??  10;
     * ami lényegesen tömörebb...
     */
    $size = $_GET["size"] ?? 10;    // $size: lapozási oldalméret
    $page = $_GET["page"] ?? 1;     // $page: oldalszám
 
    // $connection: Adatbázis kapcsolat
    global $config;
    $connection = getConnection($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
 
    // $total: a képek számának meghatározása
    $total = getTotal($connection);
 
    // $offset: eltolás kiszámítása
    $offset = ($page - 1) * $size;
 
    // $content: egy oldalnyi kép
    $content = getPhotosPaginated($connection, $size, $offset);
    
    /**
    * $lastPage - az utolsó oldal sorszáma
    */
    $lastPage = $total % $size == 0 ? intdiv($total, $size) : intdiv($total, $size)+1;

    return [
        'home',
        [
            'title' => 'Home page',
            'content' => $content,
            'total' => $total,
            'size' => $size,
            'page' => $page,
            'lastPage' => $lastPage
        ]
    ];
}
