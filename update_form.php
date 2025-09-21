<?php
include "connect.php";

$id=$_GET["disc_id"];

//On récupère le disque avec son artiste
$sql = "SELECT * FROM artist JOIN disc ON artist.artist_id=disc.artist_id  WHERE disc.disc_id = ?";

$requete = $dbco->prepare($sql);
$requete->execute(array($id));

$disc = $requete->fetch();


//On récupère la liste de tous les artistes
$sql2 = "SELECT * FROM artist";

$requete2 = $dbco->prepare($sql2);
$requete2->execute();

$artists = $requete2->fetchAll();

include "header.php";

?>

<div class="container">
    <h1 class="my-3 fw-bold">Détails</h1>
    <form class="mb-3" action="update_script.php" method="post" enctype="multipart/form-data">

        <input type="hidden" name="disc_id" value="<?= $disc['disc_id'] ?>">

        <div class="row mb-3">
            <div class="col-6">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="<?= $disc['disc_title'] ?>">
            </div>
            <div class="col-6">
                <label for="artist" class="form-label">Artist</label>
                <select name="artist" id="artist" class="form-control">

                    <?php foreach ($artists as $artist) { ?>

                        <?php if ($artist['artist_id'] === $disc['artist_id']) { ?>
                            <option value="<?= $artist['artist_id'] ?>" selected><?= $artist['artist_name'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $artist['artist_id'] ?>"><?= $artist['artist_name'] ?></option>
                        <?php } ?>

                    <?php } ?>

                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <label for="year" class="form-label">Year</label>
                <input type="text" name="year" id="year" class="form-control" value="<?= $disc["disc_year"] ?>">
            </div>
            <div class="col-6">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" name="genre" id="genre" class="form-control" value="<?= $disc["disc_genre"] ?>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <label for="label" class="form-label">Label</label>
                <input type="text" name="label" id="label" class="form-control" value="<?= $disc["disc_label"] ?>">
            </div>
            <div class="col-6">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" class="form-control" value="<?= $disc["disc_price"] ?>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <label for="picture" class="form-label">Picture</label>
                <input type="file" name="picture" id="picture" class="form-control">
                <img src="jaquettes/<?= $disc['disc_picture'] ?>" class="img-fluid" alt="Jaquette">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
        <a href="index.php" class="btn btn-primary">Retour</a>

    </form>
</div>

<?php include "footer.php"; ?>