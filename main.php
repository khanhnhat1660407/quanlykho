<?php

namespace ChiTiet;
require_once "Kho.php";
require_once "ValidateInput.php";

$kho = new Kho();
echo "Nhap thong tin kho de quan ly:\n";
$kho->nhapThongTinKho();
echo "\n";
do {
    $khongThoat = true;
    $luaChon = 0;
    do {
        echo "===============================================================\n";
        echo "Vui long chon chuc nang\n";
        echo "[1] Xuat thong tin kho \n";
        echo "[2] Tinh tong khoi luong may\n";
        echo "[3] Tinh tong gia tien may\n";
        echo "[4] Tim may theo ma\n";
        echo "[5] Thoat\n";
        echo "===============================================================\n";
        $luaChon = readline("[Chon]: ");
        if (!validateInput($luaChon, ["type" => "options", "values" => [1, 2, 3, 4, 5]])) {
            echo "Loai khong hop le!\n";
        }
    } while (!validateInput($luaChon, ["type" => "options", "values" => [1, 2, 3, 4, 5]]));


    $luaChon = (int)$luaChon;
    switch ($luaChon)
    {
        case 1: $kho->xuatThongTinKho(); break;
        case 2: echo "Tong khoi luong may co tong kho: " . $kho->tinhKhoiLuongMay() . "(kg)\n"; break;
        case 3: echo "Tong tien may co trong kho: " . $kho->tinhTongGiaTien() . "$\n"; break;
        case 4:
            do{
                $ma = readline("Nhap Ma: ");
                if($ma === "")
                {
                    echo "Khong nhap sao tim ra A Nam?\n";
                }
            }while($ma === "");
            $list_may_tim_duoc = $kho->timMayTheoMa($ma);
            if($list_may_tim_duoc == null)
            {
                echo "Khong co may ma '" . $ma . "' A Nam oi!\n"; break;
            }
            else
            {
                foreach ($list_may_tim_duoc as $may)
                {
                    $may->xuatThongTin(0);
                }
                break;
            }
        case 5:
            $chon = readline("Ban co that su muon thoat [Y/N](default N): ");
            $khongThoat = ($chon === 'Y' || $chon === 'y') ? false : true; break;
    }

}while($khongThoat);