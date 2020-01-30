<main class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img class="mw-100" title="<?= $picture["title"] ?>" src="<?= $picture["url"] ?>">
        </div>
 
        <div class="col-md-6">
 
            <form method="post" action="/image/<?=$picture['id']?>/edit">
                <div class="form-group">
                    <label for="title">Title: </label>
                    <input type="text" id="title" value="<?=$picture['title']?>" class="form-control" placeholder="Enter the title here.">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
 
            <form method="post" action="/image/<?=$picture['id']?>/delete" class="mt-5">
                <div class="form-group">
                    <label for="title">Danger zone</label>
                </div>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
 
        </div>
    </div>
</main>