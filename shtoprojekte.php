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
                if (isset($_POST['ruaj'])){
                shtoProjekt($_POST['emri'],$_POST['pershkrimi'],$_POST['datafillimit'],$_POST['datambarimit']);
            }
                ?>
            <form id="projektet" method="POST">
            <legend>Forma për shtimin e projekteve</legend>
            <fieldset>
                <label>Emri: </label>
                <input type="text" id="emri" name="emri">
            </fieldset>
            <fieldset>
                <label>Pershkrimi: </label>
                <input type="textarea" id="pershkrimi" name="pershkrimi">
            </fieldset>
            <fieldset>
                <label>Data e Fillimit: </label>
                <input type="date" id="datafillimit" name="datafillimit">
            </fieldset>
            <fieldset>
                <label>Data e Mbarimit: </label>
                <input type="date" id="datambarimit" name="datambarimit">
            </fieldset>
            <input type="submit" name="ruaj" id="ruaj" value="Ruaj">
        </form>

        </section>
    </main>
<?php include "inc/footer.php"; ?>