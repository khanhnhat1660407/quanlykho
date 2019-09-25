<?php

namespace ChiTiet;
require_once "Kho.php";

$continued = 'y';
do{
    $kho = new Kho();
    echo "Nhap thong tin kho:\n";
    $kho->nhapThongTinKho();
    echo "\n\n\n\nThong tin kho vua nhap\n";
    $kho->xuatThongTinKho();
    $continued = readline("Ban co muon tiep tuc [Y/N] (default Y):");
    $continued = ($continued !== 'n' && $continued !== 'N') ? 'Y' : 'N';
}while($continued == 'y' || $continued == 'Y' );
