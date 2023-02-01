<?php

class Fruit
{
    private $name;
    private $color;

    function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }
    function get_name()
    {
        return $this->name;
    }
    function get_color()
    {
        return $this->color;
    }
}
$fru = ["mangga", "pisang", "Nanas", "Apel", "Jeruk"];
$Warn = ["Merah", "Hijau", "Kuning", "Orange"];
// $targetBuah = "Jeruk";
// $targetWarna = "Kuning";
function gamble($buah = "Jeruk", $warna = "Kuning")
{
    global $fru, $Warn;
    $targetBuah = strtolower($buah);
    $targetWarna = strtolower($warna);
    $cocok = false;
    $c = 1;


    echo "Target Buah $targetBuah, dengan Warna $targetWarna.\n";

    while (!$cocok) {
        $RanFr = strtolower($fru[array_rand($fru)]);
        $RanWr = strtolower($Warn[array_rand($Warn)]);
        $Buah[$c] = new Fruit($RanFr, $RanWr);
        if ($Buah[$c]->get_name() == $targetBuah and $Buah[$c]->get_color() == $targetWarna) {
            echo ("Nama buah : " . ucfirst($Buah[$c]->get_name()) . "\n");
            echo ("Warna : " . ucfirst($Buah[$c]->get_color()) . "\n");
            echo "Berhasil!\n";
            echo "Percobaan sebanyak $c kali \n";
            $cocok = true;
        } else {
            echo ("Nama buah : " . ucfirst($Buah[$c]->get_name()) . "\n");
            echo ("Warna : " . ucfirst($Buah[$c]->get_color()) . "\n");
            echo ("Buah ke $c, GAGAL!,  Mengulangi\n");
            echo "---------------------------" . "\n";
            $c++;
            if ($c > 150) {
                echo "Buah tidak ditemukan !\n";
                break;
            }
        }
    }
}

gamble("Mangga", "Hijau");
