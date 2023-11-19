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
        <h3 class="title">Lista e Projekteve</h3>
        <a href="shtoprojekte.php" class="shto-link">Shto</a>
        <table id="members">
            <tr>
                <th>Emri i Projektit</th>
                <th>Pershkrimi</th>
                <th>Data e fillimit</th>
                <th>Data e mbarimit</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $result = merrProjektet();
            if ($result) {
                $i = 0;
                while ($projektet = mysqli_fetch_assoc($result)) {
                    $projektiid = $projektet['projektiid'];
                    if ($i % 2 == 0) {
                        echo "<tr>";
                    } else {
                        echo "<tr class='alt'>";
                    }
                    echo "<td>" . $projektet['emri'] . "</td>";
                    echo "<td>" . $projektet['pershkrimi'] . "</td>";
                    echo "<td>" . $projektet['datafillimit'] . "</td>";
                    echo "<td>" . $projektet['datambarimit'] . "</td>";
                    echo "<td><a href='modifikoprojektet.php?pid=$projektiid'>Edit</a></td>";
                    echo "<td><a href='fshijprojektet.php?pid=$projektiid'>Delete</a></td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>

    </section>
</main>
<?php include "inc/footer.php"; ?>