<?php
class Phanso
{
    private $tu,$mau;
    public function __construct($t,$m)
    {
       
        $this->tu=$t;
        $this->mau=$m;
    }
    private function nhapphanso($t, $m)
    {
        $this->tu=$t;
        $this->mau=$m;
    }
    public function cong ($ps)
    {
        $tumoi=$this->tu*$ps->mau + $this->mau* $ps->tu;
        $maumoi=$this->mau*$ps->mau;
        return new Phanso($tumoi,$maumoi);
    }
    public function tru ($ps)
    {
        $tumoi=$this->tu*$ps->mau - $this->mau* $ps->tu;
        $maumoi=$this->mau*$ps->mau;
        return new Phanso($tumoi,$maumoi);
    }
    public function nhan ($ps)
    {
        $tumoi=$this->tu* $ps->tu;
        $maumoi=$this->mau*$ps->mau;
        return new Phanso($tumoi,$maumoi);
    }
    public function chia ($ps)
    {
        $tumoi=$this->tu*$ps->mau;
        $maumoi=$this->mau*$ps->tu;
        return new Phanso($tumoi,$maumoi);
    }
    private function UCLN($a,$b)
    {
        while ($b!=0)
        {
            $temp=$b;
            $b=$a%$b;
            $a=$temp;
        }
        return $a;
    }
    public function getTu()
    {
        return $this->tu;
    }
    public function getMau()
    {
        return $this->mau;
    }
    public function dongianphanso()
    {
        $ucln= $this->UCLN($this->tu,$this->mau);
        $tumoi= $this->tu/$ucln;
        $maumoi=$this->mau/$ucln;
        return new Phanso($tumoi,$maumoi);
    }
    public function __toString()
    {
        if($this->tu==0) 
            return "0";
        else if ($this->mau==1) return $this->tu;
        else return $this->tu.'/'.$this->mau;
    }
}
?>