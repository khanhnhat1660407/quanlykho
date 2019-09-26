<?php
namespace ChiTiet;
require_once "ValidateInput.php";

abstract class ChiTiet
{
    protected $maCT;

    protected function nhapThongTin()
    {
        do{
            $this->maCT = readline("Nhap Ma: ");
            if($this->maCT === "")
            {
                echo "Khong nhap ma lat sao tim ra A Nam?\n";
            }
        }while($this->maCT === "");
    }

    public function xuatThongTin($level)
    {
        $tab_string = $this->makeLevelTab($level);
        echo $tab_string . "Ma: " . $this->maCT;
    }


    public function GetMa()
    {
        return $this->maCT;
    }

    abstract protected function getGiaTien();

    abstract protected function getKhoiLuong();


    ///Việt hóa dỡ nên e dùng in lịch nha a 
    protected function makeLevelTab($level)
    {
        $tab_string = "";
        for ($i = 0; $i < $level; $i++) {
            $tab_string .= "\t";
        }
        return $tab_string;
    }




}





