<?php
session_start();
$dbconn;
function dbConn()
{
    global $dbconn;
    $dbconn = mysqli_connect("localhost", 'root', '', 'smp');
    if (!$dbconn) {
        die("Deshtoi lidhja me DB" . mysqli_error($dbconn));
    }
}
dbConn();
if (isset($_GET['argument']) && $_GET['argument'] == 'dalja') {
    session_destroy();
    echo "index.php";
    exit; // 
}
function login($email, $fjalekalimi)
{
    global $dbconn;
    $sql = "SELECT antariid,emri,mbiemri,datalindjes,nrpersonal,email,telefoni,fjalekalimi,roli FROM antaret ";
    $sql .= " WHERE email='$email' AND fjalekalimi='$fjalekalimi'";
    $result = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $anetariData = mysqli_fetch_assoc($result);
        $_SESSION['antariid'] = $anetariData['antariid'];
        $anetari = array();
        $anetari['antariid'] = $anetariData['antariid'];
        $anetari['emrimbiemri'] = $anetariData['emri'] . " " . $anetariData['mbiemri'];
        $anetari['roli'] = $anetariData['roli'];
        $_SESSION['anetari'] = $anetari;
        header("Location: punet.php");
    } else {
        echo "Nuk ka perdoues me keto shenime ";
    }
}
function punetAntari($antariid)
{
    global $dbconn;
    $sql = "SELECT a.emri,a.mbiemri,a.datalindjes,a.email,pr.emri,p.datetime,p.pershkrimi ";
    $sql .= " FROM punet p INNER JOIN projektet pr ON p.projektiid=pr.projektiid ";
    $sql .= " INNER JOIN antaret a ON p.antariid=a.antariid WHERE p.antariid=$antariid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $punetRecords = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $punetRecords[] = $row;
        }
        return $punetRecords;
    } else {
        echo "Antari nuk u gjet";
        die(mysqli_error($dbconn));
    }
}
/* Funksionet per anetaret */
function regjistroAntarin($emri, $mbiemri, $datalindjes, $numripersonal, $telefoni, $email, $fjalekalimi)
{
    global $dbconn;
    $PersonalNr_check = "SELECT antariid FROM antaret WHERE nrpersonal='$numripersonal'";
    $personalnr_check_result = mysqli_query($dbconn, $PersonalNr_check);
    $existing_number = mysqli_fetch_assoc($personalnr_check_result);

    $email_check_sql = "SELECT antariid FROM antaret WHERE email='$email'";
    $email_check_result = mysqli_query($dbconn, $email_check_sql);
    $existing_email = mysqli_fetch_assoc($email_check_result);

    if ($existing_email || $existing_number) {
        echo "Kto te dhena ekzistojn në bazën e të dhënave. Ju lutemi përdorni një email apo numer personal tjetër.";
        return;
        $sql = "SELECT antariid FROM antaret WHERE emri='$emri' AND mbiemri='$mbiemri' AND datalindjes='$datalindjes' AND nrpersonal='$numripersonal' AND telefoni='$telefoni'";
        $result = mysqli_query($dbconn, $sql);
        $reshti = mysqli_fetch_assoc($result);

        if ($reshti) {
            echo "Ju jeni i regjistruar";
        } else {
            $sql = "INSERT INTO antaret(emri, mbiemri, datalindjes, nrpersonal, telefoni, email, fjalekalimi, roli)";
            $sql .= " VALUES('$emri', '$mbiemri', '$datalindjes', '$numripersonal', '$telefoni', '$email', '$fjalekalimi', 0)";
            $result = mysqli_query($dbconn, $sql);

            if ($result) {
                echo "Regjistrimi u be me sukses kyqyni me kredencialet e juaja tani";
            } else {
                echo 'Deshtoi shtimi i anetarit';
                die(mysqli_error($dbconn));
            }
        }
    }
}
function userData($antariid)
{
    global $dbconn;
    $sql = "SELECT antariid,emri,mbiemri,datalindjes,nrpersonal,email,telefoni,fjalekalimi FROM antaret WHERE antariid=$antariid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        echo "Nuk ka shenime";
    }
}
function modifikoProfilin($antariid, $emri, $mbiemri, $datalindjes, $telefoni, $email, $fjalekalimi)
{
    global $dbconn;
    $sql = "UPDATE antaret SET emri='$emri', mbiemri='$mbiemri',datalindjes='$datalindjes', telefoni='$telefoni' ";
    $sql .= " ,email='$email', fjalekalimi='$fjalekalimi' WHERE antariid=$antariid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        header("Location: profili.php");
        echo "Profiliu modifikua me sukses";
    } else {
        echo 'Deshtoi modifikimi i Profilit';
        die(mysqli_error($dbconn));
    }
}
function merrAnetaret()
{
    global $dbconn;
    $sql = "SELECT antariid,emri,mbiemri,email,telefoni,datalindjes,fjalekalimi FROM antaret ";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return $result;
    } else {
        echo "Nuk ka shenime";
    }
}
function merrAnetarId($antariid)
{
    global $dbconn;
    $sql = "SELECT antariid,emri,mbiemri,datalindjes,nrpersonal,telefoni,email,telefoni,fjalekalimi FROM antaret WHERE antariid=$antariid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        echo "Nuk ka shenime";
    }
}
function shtoAnetar($emri, $mbiemri, $telefoni, $email, $fjalekalimi)
{
    global $dbconn;
    $sql = "INSERT INTO antaret(emri,mbiemri,email,telefoni,fjalekalimi)";
    $sql .= " VALUES ('$emri','$mbiemri','$email','$telefoni','$fjalekalimi')";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        echo "Anetari u shtua me sukses";
    } else {
        echo 'Deshtoi shtimi i anetarit';
        die(mysqli_error($dbconn));
    }
}
function modifikoAnetar($antariid, $emri, $mbiemri, $telefoni, $email, $fjalekalimi)
{
    global $dbconn;
    $sql = "UPDATE antaret SET emri='$emri', mbiemri='$mbiemri', telefoni='$telefoni',";
    $sql .= " email='$email', fjalekalimi='$fjalekalimi' WHERE antariid=$antariid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        echo "Anetari u modifikua me sukses";
    } else {
        echo 'Deshtoi modifikimi i anetarit';
        die(mysqli_error($dbconn));
    }
}
function fshijAnetar($antariid)
{
    global $dbconn;
    $sql = "DELETE FROM antaret  WHERE antariid=$antariid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        echo "Anetari u fshi me sukses";
        header("Location: an
        taret.php");
    } else {
        echo 'Deshtoi fshirja e anetarit';
        die(mysqli_error($dbconn));
    }
}
function merrPunet()
{
    global $dbconn;
    $anetariid = $_SESSION['anetari']['antariid'];
    $sql = "SELECT p.punaid, pr.emri, p.datetime, p.pershkrimi ";
    $sql .= "FROM punet p INNER JOIN projektet pr ON p.projektiid=pr.projektiid";
    if ($_SESSION['anetari']['roli'] != 1) {
        $sql .= " WHERE antariid= $anetariid";
    }
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return $result;
    } else {
        echo "Nuk ka shenime";
    }
}
function merrPuneId($punaid)
{
    global $dbconn;
    $sql = "SELECT p.punaid, pr.projektiid,pr.emripr, p.data, p.pershkrimi ";
    $sql .= "FROM punet p INNER JOIN projektet pr ON p.projektiid=pr.projektiid";
    $sql .= " WHERE punaid=$punaid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        echo "Nuk ka shenime";
    }
}
function shtoPune($projektiid, $datapune, $pershkrimi)
{
    global $dbconn;
    $anetariid = $_SESSION['anetari']['antariid'];
    $sql = "INSERT INTO punet(antariid,projektiid,data,pershkrimi)";
    $sql .= " VALUES ($anetariid,$projektiid,'$datapune','$pershkrimi')";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['mesazhi'] = "Puna u shtua me sukses";
        header("Location: punet.php");
    } else {
        echo 'Deshtoi shtimi i punes';
        die(mysqli_error($dbconn));
    }
}
function modifikoPune($punaid, $projektiid, $datapune, $pershkrimi)
{
    global $dbconn;

    $sql = "UPDATE punet SET projektiid=$projektiid,data='$datapune',pershkrimi='$pershkrimi'";
    $sql .= " WHERE punaid=$punaid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        echo "Puna u modifikua me sukses";
    } else {
        echo 'Deshtoi modifikimi i punes';
        die(mysqli_error($dbconn));
    }
}
function fshijPune($punaid)
{
    global $dbconn;

    $sql = "DELETE FROM punet WHERE punaid=$punaid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        echo "Puna u fshi me sukses";
    } else {
        echo 'Deshtoi fshirja e punes';
        die(mysqli_error($dbconn));
    }
}

/*=========Funskionet per prjektet======== */
function merrProjektiId($antariid)
{
    global $dbconn;
    $sql = "SELECT projektiid,emripr,pershkrimi,datafillimit,datambarimit FROM projektet ";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        echo "Nuk ka shenime";
    }
}
function merrProjektin($projektiid)
{
    global $dbconn;
    $sql = "SELECT * FROM projektet WHERE projektiid=$projektiid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        echo "Nuk u Gjet projekti";
        die(mysqli_error($dbconn));
    }
}
function merrProjektet()
{
    global $dbconn;
    $sql = "SELECT * FROM projektet ";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return $result;
    } else {
        echo "Nuk ka shenime";
    }
}
function shtoProjekt($emri, $pershkrimi, $datafillimit, $datambarimit)
{
    global $dbconn;
    $sql = "INSERT INTO projektet(emripr,pershkrimi,datafillimit,datambarimit) ";
    $sql .= "VALUES ('$emri','$pershkrimi','$datafillimit','$datambarimit')";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        echo "Projekti u shtua me sukses";
    } else {
        echo "Deshtoi shtimi i Projektit";
        die(mysqli_error($dbconn));
    }
}
function modifikoProjekt($projektiid, $emri, $pershkrimi, $datafillimit, $datambarimit)
{
    global $dbconn;
    $sql = "UPDATE projektet SET emripr='$emri', pershkrimi='$pershkrimi', datafillimit='$datafillimit', ";
    $sql .= " datambarimit='$datambarimit' WHERE projektiid=$projektiid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        echo "Projekti u modifikua me sukses";
    } else {
        echo "Deshtoi modifikimi i projektit";
        die(mysqli_error($dbconn));
    }
}
function fshijProjektin($projektiid)
{
    global $dbconn;
    $sql = "DELETE FROM projektet WHERE projektiid=$projektiid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        echo "Projekti u fshi me sukses";
    } else {
        echo "Deshtoi fshirja e Projektit";
        die(mysqli_error($dbconn));
    }
}
