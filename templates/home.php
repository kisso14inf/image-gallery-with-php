<main class="container">
    <!--ctrl + ü az egysoros komment html-ben -->
    <!-- Lapméretváltó -->
    <div class="row">
        <form action="">
            <div class="form-group">

                <label for="size" >Page size:</label>
                <select name="size" id="size" class="form-control">

                    <?php foreach($possiblePageSize as $pagesize):?>

                        <option <?=$size== $pagesize? "selected": ""?>><?=$pagesize?></option>

                    <?php endforeach?>
                </select>

            </div>
            <div class="form-group">
                <button class="btn btn-primary">Küldés</button>
            </div>
        </form>
        <div>
            <hr>
            <!-- lapozósáv -->
            <?php require "pagination.php"?>
            <!--képek megjelenítése  -->
            <?php foreach ($content as $picture):?>
                <img src="<?=$picture['thumbnail']?>" alt="">
            <?php endforeach ?> 
             <!-- lapozósáv -->
            <?php require "pagination.php"?>

        </div>
        

    </div>


</main>