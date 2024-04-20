<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="tinhluong.css"/>
    <script>
        function validateLuong(input) {
            const inputValue = input.value.replace(/[^0-9]/g, '');
            input.value = inputValue;
            const valueLength = input.value.length;
            input.setSelectionRange(valueLength, valueLength);
        }
        function validateTen(input){
            input.value = input.value.replace(/[^a-zA-Z]/g, '');
        }
    </script>
</head>

<body>
    <div>
        <table>
            <form method="get" action="#">
                <tr>
                    <td>Mã nhân viên</td>
                    <td>
                        <input class="input" type="input" name="manv" 
                            value="<?php if(isset($_GET['submit']) && isset($_GET['submit'])=="Lương tháng") echo $_GET['manv']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Tên nhân viên</td>
                    <td>
                        <input class="input" type="input" name="tennv"
                            value="<?php if(isset($_GET['submit']) && isset($_GET['submit'])=="Lương tháng") echo $_GET['tennv']; ?>" oninput="validateTen(this)">
                    </td>
                </tr>
                <tr>
                    <td>Số ngày làm việc</td>
                    <td>
                        <input class="input" type="number" name="songay" step="1" min="1" max="31"
                            value="<?php if(isset($_GET['submit']) && isset($_GET['submit'])=="Lương tháng") echo $_GET['songay']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Lương ngày</td>
                    <td>
                        <input class="input" type="input" name="luongngay"
                            value="<?php if(isset($_GET['submit']) && isset($_GET['submit'])=="Lương tháng") echo $_GET['luongngay']; ?>" oninput="validateLuong(this)">
                    </td>
                </tr>
                <tr>
                    <td>Nhân viên quản lý</td>
                    <td>
                        <input type="checkbox" name="check" 
                            <?php if(isset($_GET['submit']) && isset($_GET['submit'])=="Lương tháng" && isset($_GET['check'])) echo "checked"; ?>>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input id="submit-btn" type="submit" name="submit" value="Lương tháng">
                    </td>
                </tr>
            </form>
        </table>
    </div>
    <div id="in">
    <?php
        include 'nhanvien.php';
        if(isset($_GET['submit']) && $_GET['submit']=="Lương tháng"){
            $ma=$_GET['manv'];
            $ten=$_GET['tennv'];
            $songay=$_GET['songay'];
            $luongngay=$_GET['luongngay'];
            if(isset($_GET['check']))
                $nv=new nhanvienQL();
            else    
                $nv= new NhanVien();
            $nv->Gan($ma,$ten,$songay,$luongngay);
            echo $nv->InNhanVien();
            $luong=$nv->TinhLuong();
            echo "<br>Lương: $luong";
        }
    ?>
    </div>
    
</body>

</html>