<?php

namespace ChiTiet;


require_once "May.php";

class Kho
{
    private $maKho;
    private $listMay = array();

    public function nhapThongTinKho()
    {
        $this->maKho = readline("Ma Kho: ");
        $inputList = 0;
        $this->NhapDSMay();
    }

    public function nhapDSMay()
    {
        do {
            $numberOfMay = readline("Nhap so luong may co trong kho " . $this->maKho . ":");
            if(!is_numeric($numberOfMay) || !is_int($numberOfMay + 0))
            {
                echo "Vui long nhap vao so nguyen di A Nam! 🤣\n";
            } 
            else if ($numberOfMay <= 0) 
            {
                echo "So luong phai lon hon 0 chu! 🙄\n";
            }
        } while (!is_numeric($numberOfMay) || !is_int($numberOfMay + 0) || $numberOfMay <= 0);


        for ($i = 0; $i < $numberOfMay; $i++) {
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

        foreach ($this->listMay as $may) {
            $may->xuatThongTin(1);
        }
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
}

