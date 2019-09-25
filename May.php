<?php

namespace ChiTiet;
require_once "ChiTietPhuc.php";

class  May extends ChiTiet
{
    private $listCT = array();

    public function nhapThongTin()
    {
        $numberOfCT = 0;
        $type = -1;

        parent::nhapThongTin(); 
        
        do {
            $numberOfCT = readline("Nhap so luong CT co trong CT " . $this->maCT . ": ");
            if(!is_numeric($numberOfCT) || !is_int($numberOfCT + 0))
            {
                echo "Vui long nhap vao so nguyen di A Nam! 🤣\n";
            } 
            else if ($numberOfCT <= 0) {
                echo "So luong phai lon hon 0 chu! 🙄\n";
            }
        } while (!is_numeric($numberOfCT) || !is_int($numberOfCT + 0) || $numberOfCT <= 0);



        for ($i = 0; $i < $numberOfCT; $i++) {

            echo "Nhap CT thu " . ($i == 0 ? "nhat \n" : ($i + 1) . " cua " . $this->maCT . ":\n");

            //Validate number of type
            do {
                $type = readline("Chon loai ct: [1 - CTD] || [2 - CTP]: ");
                if (!is_numeric($type) || !is_int($type + 0 ) || $type != 1 && $type != 2) {
                    echo "Loại không hợp lệ 😨!\n";
                }
            } while (!is_numeric($type) || !is_int($type + 0 ) || $type != 1 && $type != 2);

            //case: choose CTD
            if ($type == 1) {
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



