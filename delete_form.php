<?php
include "connect.php";

$discID = $_GET["disc_id"];

$sql= "SELECT * from artist JOIN disc
    ON artist.artist_id=disc.artist_id
    WHERE disc.disc_id=?";

$requete= $dbco->prepare($sql);
$requete->execute(array($discID));
$tableau=$requete->fetch();

include "header.php";

?>

<div class="container">
    <h1>Formulaire de suppression</h1>
    <p class="fw-bold text-danger">Voulez-vous vraiment supprimer ce disque ?</p>

    <form action="delete_script.php" method="post" class="mb-3">

        <input type="hidden" name="disc_id" value="<?= $discID ?>">

        <div class="row mb-3">
            <div class="col-6">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="<?= $tableau['disc_title'] ?>" disabled>
            </div>
            <div class="col-6">
                <label for="artist" class="form-label">Artist</label>
                <input type="text" name="artist" id="artist" class="form-control" value="<?= $tableau["artist_name"] ?>" disabled>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <label for="year" class="form-label">Year</label>
                <input type="text" name="year" id="year" class="form-control" value="<?= $tableau["disc_year"] ?>" disabled>
            </div>
            <div class="col-6">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" name="genre" id="genre" class="form-control" value="<?= $tableau["disc_genre"] ?>" disabled>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <label for="label" class="form-label">Label</label>
                <input type="text" name="label" id="label" class="form-control" value="<?= $tableau["disc_label"] ?>" disabled>
            </div>
            <div class="col-6">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" class="form-control" value="<?= $tableau["disc_price"] ?>" disabled>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <label for="pic" class="form-label">Picture</label>
                <img src="jaquettes/<?= $tableau['disc_picture'] ?>" class="img-fluid" alt="Jaquette">
            </div>
        </div>

        <button type="submit" class="btn btn-danger">Accepter</button>
        <a href="details.php?$disc_id=<?= $discID ?>" class="btn btn-primary">Retour</a>

</div>

<?php include "footer.php"; ?>