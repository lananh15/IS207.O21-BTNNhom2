<?php
    class NhanVien{
        protected $ma,$ten,$songay,$luongngay;
        public function Gan($ma,$ten,$songay,$luongngay){
            $this->ma=$ma;
            $this->ten=$ten;
            $this->songay=$songay;
            $this->luongngay=$luongngay;
        }
        public function InNhanVien(){
            echo "<br>Mã nhân viên: $this->ma";
            echo "<br>Tên nhân viên: $this->ten";
            echo "<br>Số ngày làm việc: $this->songay";
            echo "<br>Lương ngày: $this->luongngay";
        }
        public function TinhLuong(){
            return $this->luongngay*$this->songay;
        }
    }
    class nhanvienQL extends NhanVien{
        private $phucap=2000;
        public function InNhanVien(){
            parent::InNhanVien();
            echo "<br>Phụ cấp: $this->phucap";
        }
        public function TinhLuong(){
            return parent::TinhLuong()+$this->phucap;
        }
    }   
?>