<?php include "inc/header.php"; ?>
<main class="container page">
    <article id="maininfo">
        <h2 class="title">SMP Projekti Pershkrimi</h2>
        <p>
            Sistemi për menaxhimin e projekteve mundëson një kompanie menaxhimin e punëve nga punëtorët e saj për
            projektet që ajo ka. Sistemi ofron menaxhimin e stafit: shtimin, modifikimin fshirjen, paraqitjen e
            stafit, menaxhimin e projekteve: shtimin, modifikimin fshirjen, paraqitjen e projekteve dhe menaxhimin e
            punëve ë bën stafi në kuadër të projekteve.
        </p>
    </article>
    <?php include "inc/sidebar.php"; ?>
    <section id="content" class="box">
        <section class="projektet">
            <h3 class="title">Projekti</h3>
            <?php
            if (isset($_GET['projektiid'])) {
                $projektiid = $_GET['projektiid'];
                $projekti = merrProjektin($projektiid);
                $emri = $projekti['emri'];
                $pershkrimi = $projekti['pershkrimi'];
                $kohzgjatja = $projekti['datafillimit'] . ' - ' . $projekti['datambarimit'];
                if ($projekti) {
                    echo "<div class='projekti'>";
                    $imagePath = "images/project{$projektiid}.jpg";
                    if (file_exists($imagePath)) {
                        echo "<img src='$imagePath' alt='Projekti $projektiid' class='projekti-img'>";
                    }

                    echo "<h1 class='projekti-title'>{$emri}</h1>";
                    echo "<p class='projekti-date'>Sa ka Zgjatur Projekti : <span>{$kohzgjatja}</span></p>";
                    echo "<p class='projekti-info'>{$pershkrimi}</p>";
                    echo "</div>";
                    echo "<a href='index.php'>Ktheu mbrapa</a>";
                } else {
                    echo "Projekti nuk u gjet";
                }
            }
            ?>

        </section>


    </section>
</main>
<?php include "inc/footer.php"; ?>