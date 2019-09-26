<?php

namespace ChiTiet;
require_once "ChiTietPhuc.php";

class  May extends ChiTiet
{
    private $listCT = array();

    public function nhapThongTin()
    {
        $soLuong = 0;
        $loai = -1;


        parent::nhapThongTin();
        do {
            $soLuong = readline("Nhap so luong CT co trong May '" . $this->maCT . "': ");
            if(!validateInput($soLuong, ['type'=>"bigger", 'values' => [0]]))
            {
                echo "Vui long nhap vao so nguyen(lon hon 0) di A Nam! \n";
            }

        } while (!validateInput($soLuong, ['type'=>"bigger", 'values' => [0]]));


        for ($i = 0; $i < $soLuong; $i++) {

            echo "Nhap CT thu " . ($i == 0 ? "nhat \n" : ($i + 1) . " cua " . $this->maCT . ":\n");

            //Validate number of type
            do {
                $loai = readline("Chon loai ct: [1 - CTD] || [2 - CTP]: ");
                if (!validateInput($loai, ['type'=>"options", 'values' => [1,2]]))
                {
                    echo "Loai khong hop le!\n";
                }
            } while (!validateInput($loai, ['type'=>"options", 'values' => [1,2]]));

            //case: choose CTD
            if ($loai == 1) {
                $ctd = new ChiTietDon();
                $ctd->nhapThongTin();
                array_push($this->listCT, $ctd);
            } else {
                $ctp = new ChiTietPhuc();
                $ctp->nhapThongTin();
                array_push($this->listCT, $ctp);
            }
        }
    }


    public function xuatThongTin($level)
    {
        $tab_string = $this->makeLevelTab($level);
        echo  $tab_string . "[MAY]\n";
        parent:: xuatThongTin($level);
        echo "\n";
        echo $tab_string . "Tong khoi luong:" . $this->getKhoiLuong() . "\n";
        echo $tab_string . "Tong tien:" . $this->getGiaTien(). "\n";
        echo $tab_string . "{Bao gom}:\n";

        /**
         * tang level
         */
        $level++;
        $tab_string = $this->makeLevelTab($level);
        echo $tab_string . "=============\n";

        foreach ($this->listCT as $chiTiet) {
            $chiTiet->xuatThongTin($level);
            echo $tab_string . "=============\n";
        }
    }

    public function getGiaTien()
    {
        $giaTien = 0;
        foreach ($this->listCT as $chiTiet) {
            $giaTien += $chiTiet->getGiaTien();
        }
        return $giaTien;
    }

    public function getKhoiLuong()
    {
        $khoiLuong = 0;
        foreach ($this->listCT as $chiTiet) {
            $khoiLuong += $chiTiet->getKhoiLuong();
        }
        return $khoiLuong;
    }

}

