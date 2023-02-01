<?php

// untuk melakukan crud, dibutuhkan beberapa fungsi 
// CREATE, READ, UPDATE, DELETE

// membuat, melihat, merubah, menghapus

$file = "./data.json";
$json = file_get_contents($file);
$datanya = json_decode($json,true);

var_dump($datanya);


function membuat(string $nama,string $hoby){
    global $datanya, $file;
    $id = count($datanya) + 1;
        
    $val = array(
        "id" => $id,
        "nama" => $nama,
        "hoby" => $hoby
    );   
    $fo = fopen($file,'w');
    array_push($datanya, $val);
    $jdf = json_encode($datanya);
    fwrite($fo, $jdf);
    fclose($fo);
    echo "data berhasil ditambahkan!";
}


function melihat(){
    global $datanya;

    try {
        if (count($datanya) > 0) {
            echo "DATA\n";
            foreach ($datanya as $dt) {
                echo "--------------------\n";
                echo "| No   : ".$dt["id"] ."\n";
                echo "| Nama : ".$dt["nama"] ."\n";
                echo "| Hoby : ".$dt["hoby"] ."\n";
                echo "--------------------\n";
            }        
        }else{
            echo "--------------------\n";
           echo "Data Kosong, Masukan data awal \n";
           echo "--------------------\n";

        }
        
    } catch (\Throwable $th) {
        echo "Data Tidak Ditemukan Kak!";
    }
    
}
    

// melihat();

function merubah($id,$jenis,$val){
    global $datanya,$file;
    // 
        try {
            if (!count($datanya) > 0) {
                    echo "Data Tidak Ditemukan!\n";
                    echo "--------------------\n";
        } else {
            if (array_key_exists($jenis, $datanya[$id])) {
                $fo = fopen($file,'w');

                $datanya[$id][$jenis] = $val;
                // menulis
                $jdf = json_encode($datanya);
                fwrite($fo, $jdf);
                fclose($fo);
                echo "--------------------\n";
                echo "Berhasil diubah \n";
                echo "--------------------\n";
            } else {
                echo "--------------------\n";
                echo "Data Gagal diubah, Periksa kembali! \n";
                echo "--------------------\n";
            }
        }   
        } catch (Exception $e) {
            echo "Data Tidak Ditemukan \n";
            echo "--------------------\n";
        }
        
}


function menghapus($id){
    global $datanya,$file;
    // stream file
    if (array_key_exists($id-1,$datanya)) {
     $fo = fopen($file,'w');

        unset($datanya[$id-1]);
        $jdf = json_encode($datanya);
        fwrite($fo, $jdf);
        fclose($fo);
        echo "data berhasil di hapus \n";
        echo "--------------------\n";

    }else{
        echo "Gagal di hapus,Periksa Kembali \n";
        echo "--------------------\n";
    }
}

// var_dump($datanya);
// membuat interface

