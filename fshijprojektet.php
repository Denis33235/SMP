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
        <?php
        if (isset($_GET['pid'])) {
            $pid = $_GET['pid'];
            $sql = "SELECT projektiid,emri,pershkrimi,datafillimit,datambarimit FROM projektet WHERE projektiid=$pid";
            $result = mysqli_query($dbconn, $sql);
            $projekti = mysqli_fetch_assoc($result);
            $projektiid = $projekti['projektiid'];
            $emri = $projekti['emri'];
            $pershkrimi = $projekti['pershkrimi'];
            $datafillimit = $projekti['datafillimit'];
            $datambarimit = $projekti['datambarimit'];
        }
        if (isset($_POST['fshij'])) {
            fshijProjektin($_POST['projektiid']);
            header("Location: projektet.php");
        }
        ?>
        <form id="projektet" method="POST">
            <legend>Forma për fshirjen e projekteve</legend>
            <input type="hidden" id="projektiid" name="projektiid" value="<?php if (!empty($projektiid)) echo $projektiid; ?>">
            <fieldset>
                <label>Emri: </label>
                <input disabled type="text" id="emri" name="emri" value="<?php if (!empty($emri)) echo $emri; ?>">
            </fieldset>
            <fieldset>
                <label>Pershkrimi: </label>
                <input disabled type="textarea" id="pershkrimi" name="pershkrimi" value="<?php if (!empty($pershkrimi)) echo $pershkrimi; ?>">
            </fieldset>
            <fieldset>
                <label>Data e Fillimit: </label>
                <input disabled type="date" id="datafillimit" name="datafillimit" value="<?php if (!empty($datafillimit)) echo $datafillimit; ?>">
            </fieldset>
            <fieldset>
                <label>Data e Mbarimit: </label>
                <input disabled type="date" id="datambarimit" name="datambarimit" value="<?php if (!empty($datambarimit)) echo $datambarimit; ?>">
            </fieldset>
            <input type="submit" name="fshij" id="fshij" value="Fshij">
        </form>

    </section>
</main>
<?php include "inc/footer.php"; ?>