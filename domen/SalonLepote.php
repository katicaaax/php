<?php

class SalonLepote {

    public $salon_lepote_id = 0;
    public $salon_lepote_naziv = '';

    public function getSalon_lepote_id() {
        return $this->salon_lepote_id;
    }

    public function getSalon_lepote_naziv() {
        return $this->salon_lepote_naziv;
    }

    public function setSalon_lepote_id($salon_lepote_id) {
        $this->salon_lepote_id = $salon_lepote_id;
    }

    public function setSalon_lepote_naziv($salon_lepote_naziv) {
        $this->salon_lepote_naziv = $salon_lepote_naziv;
    }

    public static function vratiSvePodatkeIzBaze() {
        include 'konekcija.php';
        $podaciIzBaze = $mysqli->query('SELECT * FROM salon_lepote');
        $salonLepoteNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $salon_lepote = new SalonLepote();
            $salon_lepote->setsalon_lepote_id($red['salon_lepote_id']);
            $salon_lepote->setsalon_lepote_naziv($red['salon_lepote_naziv']);
            array_push($salonLepoteNiz, $salon_lepote);
        }
        return $salonLepoteNiz;
    }

    public function save() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("INSERT INTO salon_lepote (salon_lepote_naziv)
            VALUES ('$this->salon_lepote_naziv')");
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }

    public static function obrisi($salon_lepote_id) {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query('DELETE FROM salon_lepote WHERE salon_lepote_id=' . $salon_lepote_id);
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }

}

?>