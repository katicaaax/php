<?php
include 'domen/SalonLepote.php';
include 'domen/Usluga.php';

if (isset($_GET['salon_lepote']) && $_GET['salon_lepote'] == 'prikaz') {
    echo json_encode(SalonLepote::vratiSvePodatkeIzBaze());
}

if (isset($_GET['usluga']) && $_GET['usluga'] == 'prikaz') {
    echo json_encode(Usluga::vratiSvePodatkeIzBaze());
}

if (isset($_GET['usluga']) && $_GET['usluga'] == 'pretraga') {
    if (isset($_GET['tekst'])) {
        echo json_encode(Usluga::vratiPoNazivu($_GET['tekst']));
    }
}

if (isset($_GET['usluga']) && $_GET['usluga'] == 'sortAsc') {
    echo json_encode(Usluga::sortAsc());
}

if (isset($_GET['usluga']) && $_GET['usluga'] == 'sortDesc') {
    echo json_encode(Usluga::sortDesc());
}

if (isset($_GET['obrisi']) && $_GET['obrisi'] == 'usluga') {
    if (Usluga::obrisi($_GET['id'])){
        echo 'OK';
    }
    else{
        echo 'ERR';
    }
}

if (isset($_GET['obrisi']) && $_GET['obrisi'] == 'salon_lepote') {
    if (SalonLepote::obrisi($_GET['id'])){
        echo 'OK';
    }
    else{
        echo 'ERR';
    }
}


?>