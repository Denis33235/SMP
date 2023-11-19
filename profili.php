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
        <h3 class="user-intro">Te dhenat e juaja </h3>
        <?php
        $antariid = $_SESSION['antariid'];
        $user = userData($antariid);

        echo "<p class='user-info'><span>Emri dhe Mbiemri : </span>" . $user['emri'] . ' ' . $user['mbiemri'] . "</td>";
        echo "<p class='user-info'><span> Data e lindjes : </span>" . $user['datalindjes'] . "</td>";
        echo "<p class='user-info'><span> Numri Personal : </span>" . $user['nrpersonal'] . "</td>";
        echo "<p class='user-info'><span> Email : </span>" . $user['email'] . "</td>";
        echo "<p class='user-info'><span> Numri i Telefonit : </span>" . $user['telefoni'] . "</td>";
        echo "<p class='user-info'><span> Fjalekalimi : </span>" . $user['fjalekalimi'] . "</td>";
        echo "<p class='user-button'><a href='modifikoprofilin.php?aid=$antariid'>Ndrysho te dhenat</a></td>";


        ?>

    </section>
</main>
<?php include "inc/footer.php"; ?>