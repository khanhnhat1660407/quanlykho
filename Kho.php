<?php

namespace ChiTiet;
require_once "May.php";

class Kho
{
    private $maKho;
    private $listMay = array();

    public function nhapThongTinKho()
    {
        do{
            $this->maKho = readline("Ma Kho: ");
            if($this->maKho === "")
            {
                echo "Cho no cai ten di Anh!\n";
            }
        }while($this->maKho === "");
        $this->NhapDSMay();
    }

    public function nhapDSMay()
    {
        $soLuong = 0;

        do {
            $soLuong = readline("Nhap so luong may co trong kho " . $this->maKho . ": ");
            if(!validateInput($soLuong, ['type'=>"bigger", 'values' => [0]]))
            {
                echo "Vui long nhap vao so nguyen(lon hon 0) di A Nam! \n";
            }
        } while (!validateInput($soLuong, ['type'=>"bigger", 'values' => [0]]));


        for ($i = 0; $i < $soLuong; $i++) {
            $temp = new May();

            echo "Nhap thong tin may thu " . ($i == 0 ? 'nhat' : $i+1 ). "\n";
            $temp->nhapthongTin();

            array_push($this->listMay, $temp);
        }
    }

    public function xuatThongTinKho()
    {
        echo "Ma kho: " . $this->maKho . "\n";
        echo "{Danh sach May trong kho}:\n";
        echo "____________________________________________________________\n";
        foreach ($this->listMay as $may) {
            $may->xuatThongTin(0);
        }
        echo "____________________________________________________________\n";

    }

    public function tinhKhoiLuongMay()
    {
        $tongKL = 0;
        foreach ($this->listMay as $may) {
            $tongKL += $may->getKhoiLuong();
        }
        return $tongKL;
    }

    public function tinhTongGiaTien()
    {
        $tongTien = 0;
        foreach ($this->listMay as $may) {
            $tongTien += $may->getGiaTien();
        }
        return $tongTien;
    }
    public function timMayTheoMa($ma)
    {
        $maytimduoc = null;
        foreach ($this->listMay as $may) {
            if($may->getMa() == $ma)
            {
                $maytimduoc[] = $may;
            }
        }
        return $maytimduoc;
    }
}



