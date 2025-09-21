<?php

include "connect.php";

$sql = "SELECT * FROM disc 
        JOIN artist 
        ON disc.artist_id=artist.artist_id
        ORDER BY artist.artist_name";

$requete = $dbco->prepare($sql);
$requete->execute();
$tableau = $requete->fetchAll();

include "header.php";

?>

<div class="container">
    <div class="row my-3">
        <h1 class="fw-bold col-10">Liste des disques (<?= count($tableau) ?>)</h1>
        <a href="add_form.php" class="btn btn-primary col-2">Ajouter</a>
    </div>
    <div class="row">
        <?php foreach ($tableau as $disc) { ?>
            <div class="col-6">
                <div class="card mb-3">
                    <div class="row g-0 h-100">
                        <div class="col-5">
                            <img src="jaquettes/<?= $disc['disc_picture'] ?>" class="img-fluid rounded-start h-100 w-100"
                                style="object-fit: cover;" alt="Jaquette">
                        </div>
                        <div class="col-7">
                            <div class="card-body h-100">
                                <h5 class="card-title"><?= $disc['disc_title'] ?></h5>
                                <p class="card-text fw-bold"><?= $disc['artist_name'] ?></p>
                                <p class="card-text">Label : <small class="text-body-secondary"><?= $disc['disc_label'] ?></small></p>
                                <p class="card-text">Year : <small class="text-body-secondary"><?= $disc['disc_year'] ?></small></p>
                                <p class="card-text">Genre : <small class="text-body-secondary"><?= $disc['disc_genre'] ?></small></p>
                                <a href="details.php?disc_id=<?=$disc['disc_id']?>" class="btn btn-primary">Détails</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include "footer.php"; ?>