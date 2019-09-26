<?php

namespace ChiTiet;
require_once "ChiTiet.php";

class  ChiTietDon extends ChiTiet
{
    private $giaTien;
    private $khoiLuong;

    public function nhapThongTin()
    {
        parent::nhapThongTin();

        do {
            $this->khoiLuong = readline("Khoi luong: ");

            if (!is_numeric($this->khoiLuong) || ($this->khoiLuong + 0) <= 0) {
                echo "Nhap so (lon hon 0) thoi A Nam oi!\n";
            }

        } while (!is_numeric($this->khoiLuong) || ($this->khoiLuong + 0) <= 0);

        do {
            $this->giaTien = readline("Gia tien: ");

            if (!is_numeric($this->giaTien) || ($this->giaTien + 0) <= 0) {
                echo "Nhap so (lon hon 0) thoi A Nam oi!\n";
            }

        } while  (!is_numeric($this->giaTien) || ($this->giaTien + 0) <= 0);
    }


    public function xuatThongTin($level)
    {
        $tab_string = $this->makeLevelTab($level);
        echo $tab_string . "[CTD]\n";
        parent::xuatThongTin($level);
        echo "\n";
        echo $tab_string . "Khoi Luong: " . $this->khoiLuong . "(kg)\n" ;
        echo $tab_string . "Gia: " . $this->giaTien . "$\n";

    }


    public function getGiaTien()
    {
        return $this->giaTien;
    }

    public function getKhoiLuong()
    {
        return $this->khoiLuong;
    }

}



