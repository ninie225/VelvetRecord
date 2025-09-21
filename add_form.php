<?php
include "connect.php";

$sql = "SELECT artist_id, artist_name FROM artist ORDER BY artist_name";

$requete = $dbco->prepare($sql);
$requete->execute();
$tableau = $requete->fetchAll();

include "header.php";

?>
<div class="container">
    <h1 class="my-3 fw-bold">Ajouter un vinyle</h1>
    <form action="add_script.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter the title" required>
        </div>
        <div class="row mb-3">
            <label for="artist" class="form-label">Artist</label>
            <select name="artist" id="artist" class="form-select" required>
                <?php foreach($tableau as $artist) { ?>
                    <option value="<?=$artist['artist_id']?>"><?=$artist['artist_name']?></option>
                <?php } ?>
            </select>
        </div>
        <div class="row mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" name="year" id="year" class="form-control" placeholder="Enter year" required>
        </div>
        <div class="row mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" name="genre" id="genre" class="form-control" placeholder="Enter genre (Rock, Pop, Prog...)" required>
        </div>
        <div class="row mb-3">
            <label for="label" class="form-label">Label</label>
            <input type="text" name="label" id="label" class="form-control" placeholder="Enter label (EMI, Warner, PolyGram, Univers sale...)" required>
        </div>
        <div class="row mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>
        <div class="row mb-3">
            <label for="picture" class="form-label">Picture</label>
            <input type="file" name="picture" id="picture" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="index.php" class="btn btn-primary">Retour</a>

    </form>
</div>

<?php include "footer.php"; ?>