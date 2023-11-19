<?php include "inc/header.php";

?>
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
        <h3 class='title'>Te dhenat e antarit dhe punet qe ka kryer</h3>
        <?php
        if (isset($_GET['antariid'])) {
            $antariid = $_GET['antariid'];
            $punetRecords = punetAntari($antariid);
            $data = userData($antariid);

            // Check if any data is found for the provided antariid
            if ($punetRecords) {
                echo "<p> Emri dhe Mbiemri : " . $data['emri'] . ' ' . $data['mbiemri'] . "</p>";
                echo "<p> Data e lindjes : " . $data['datalindjes'] . "</p>";
                echo "<p> Email : " . $data['email'] . "</p>";
                echo "<p> Numri i telefonit : " . $data['telefoni'] . "</p>";
                echo "<p>Punet e kryera : </p>";
                echo "<table id='members'>";
                echo "<tr>";
                echo "<th>Nr</th>";
                echo "<th>Emri i Projektit</th>";
                echo "<th>Data e punes</th>";
                echo "<th>Puna e kryer</th>";
                echo "</tr>";
                $nrProjektit = 1;
                foreach ($punetRecords as $punet) {
                    echo "<tr>";
                    echo "<td>" . $nrProjektit . "</td>";
                    echo "<td>" . $punet['emri'] . "</td>";
                    echo "<td>" . $punet['datetime'] . "</td>";
                    echo "<td>" . $punet['pershkrimi'] . "</td>";
                    echo "</tr>";
                    $nrProjektit++;
                }

                echo "</table>";
            } else {
                $emriMbiemri = $data['emri'] . ' ' . $data['mbiemri'];
                $dataLindjes = $data['datalindjes'];
                $telefoni = $data['telefoni'];
                $email = $data['email'];

                echo "<p> Emri dhe Mbiemri : " . $emriMbiemri . "</p>";
                echo "<p> Data e lindjes : " . $dataLindjes . "</p>";
                echo "<p> Numri i telefonit : " . $telefoni . "</p>";
                echo "<p> Email : " . $email . "</p>";
                echo "<p> Punet e kryera : Antari nuk ka kryer pune ende</p>";
            }
        }
        ?>

        <a href="index.php">Kthehu mbrapa</a>
    </section>
</main>
<?php include "inc/footer.php"; ?>