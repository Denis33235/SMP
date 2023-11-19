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
        <!-- <h3 class="title">Lista e anatareve</h3> -->

        <?php
     if (isset($_GET['aid'])) {
        $antari=merrAnetarId($_GET['aid']);
        $antariid=$antari['antariid'];
        $emri=$antari['emri'];
        $mbiemri=$antari['mbiemri'];
        $datalindjes=$antari['datalindjes'];
        $nrpersonal=$antari['nrpersonal'];
        $telefoni=$antari['telefoni'];
        $email=$antari['email'];
        $fjalekalimi=$antari['fjalekalimi'];
    }
        if (isset($_POST['ruaj'])) {
            $antariid = $_SESSION['antariid'];
           modifikoProfilin($antariid,$_POST['emri'],$_POST['mbiemri'],$_POST['datalindjes'],$_POST['telefoni'],
            $_POST['email'],$_POST['fjalekalimi']);
        }
        ?>
        <form id="regjistrohu" method="POST">
            <legend>Ndrysho te dhenat e tua</legend>
            <fieldset>
            <input type="hidden" id="antariid" name="antariid">
                <label>Emri: </label>
                <input type="text" id="emri" name="emri" value='<?php if(!empty($emri)) echo $emri; ?>'>
            </fieldset>
            <fieldset>
                <label>Mbiemri: </label>
                <input type="text" id="mbiemri" name="mbiemri" value='<?php if(!empty($mbiemri)) echo $mbiemri; ?>'>
            </fieldset>
            <fieldset>
                <label>Data e lindjes: </label>
                <input type="date" id="datalindjes" name="datalindjes" value='<?php if(!empty($datalindjes)) echo $datalindjes; ?>'>
            </fieldset>
            <fieldset>
                <label>Numri Personal: </label>
                <input disabled type="text" id="numripersonal" name="numripersonal" value='<?php if(!empty($nrpersonal)) echo $nrpersonal; ?>'> 
            </fieldset>
            <fieldset>
                <label>Telefoni: </label>
                <input type="text" id="telefoni" name="telefoni" value='<?php if(!empty($telefoni)) echo $telefoni; ?>'>
            </fieldset>
            <fieldset>
                <label>Email: </label>
                <input type="email" id="email" name="email" value='<?php if(!empty($email)) echo $email; ?>'>
            </fieldset>
            <fieldset>
                <label>Fjalekalimi: </label>
                <input type="password" id="fjalekalimi" name="fjalekalimi" value='<?php if(!empty($fjalekalimi)) echo $fjalekalimi; ?>'>
            </fieldset>
            <input type="submit" name="ruaj" id="ruaj" value="Ruaj">
        </form>

    </section>
</main>
<?php include "inc/footer.php"; ?>