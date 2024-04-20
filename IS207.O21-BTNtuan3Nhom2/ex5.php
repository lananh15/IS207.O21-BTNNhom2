<!DOCTYPE html>
<html>
    <head>
        <title>Ex5</title>
        <link rel="stylesheet" type="text/css" href="ex5.css" />
    </head>
    <body>
        <h3 style="color: blue;">Chương trình cộng, trừ, nhân, chia hai phân số</h3>
        <form method="get" action="#">
            <table>
                <tr>
                    <td id="So">
                        Tử phân số 1 <input type="input" id="tu1" size="20" name="tu1"><br><br>
                        Mẫu phân số 1 <input type="input" id="mau1" size="20" name="mau1"><br><br>
                        Tử phân số 2 <input type="input" id="tu2" size="20" name="tu2"><br><br>
                        Mẫu phân số 2 <input type="input" id="mau2" size="20" name="mau2"><br><br>
                        <input type="Submit" name="Submit" class="button tinh" value="="><br><br>
                        <?php
                        include "phanso.php";
                        $error_message="";// khởi tạo biến lỗi
                        if(isset($_GET['Submit']) && $_GET['Submit'] == '=') {
                            $tu1=$_GET['tu1'];
                            $tu2=$_GET['tu2'];
                            if($_GET['mau1']!=0) $mau1=$_GET['mau1'];
                            else 
                            {
                                $error_message="Mẫu phải khác 0";
                            }
                            if($_GET['mau2']!=0) $mau2=$_GET['mau2'];
                            else 
                            {
                                $error_message="Mẫu phải khác 0";
                            }
                            if(empty($error_message))
                            {
                                $phepTinh=$_GET['option'];
                                $phanso1=new Phanso($tu1,$mau1);
                                $phanso1=$phanso1->dongianphanso();
                                $phanso2=new Phanso($tu2,$mau2);
                                $phanso2=$phanso2->dongianphanso();
                                switch ($phepTinh)
                                {
                                    case '+': $ketqua=$phanso1->cong($phanso2);
                                    echo "Tổng: " .$phanso1. "+".$phanso2." = ".$ketqua. "<br>";
                                        break;
                                    case '-': $ketqua=$phanso1->tru($phanso2);
                                        echo "Hiệu: " .$phanso1. "-".$phanso2." = ".$ketqua. "<br>";
                                        break;    
                                    case '*': $ketqua=$phanso1->nhan($phanso2);
                                        echo "Nhân: " .$phanso1. "*".$phanso2." = ".$ketqua. "<br>";
                                        break;
                                    case '/': $ketqua=$phanso1->chia($phanso2);
                                        echo "Chia: " .$phanso1. "/".$phanso2." = ".$ketqua. "<br>";
                                        break;
                                    default: echo "Vui lòng chọn phép tính!<br>";
                                        break;
                                }
                            }
                        }
                        ?>
                    <td class="fieldset-container">
                        <fieldset >
                            <legend>Phép tính </legend>
                                <input type="radio" id="+" name="option" value="+"> +<br>
                                <input type="radio" id="-" name="option" value="-"> -<br>
                                <input type="radio" id="*" name="option" value="*"> *<br>
                                <input type="radio" id="/" name="option" value="/"> /<br>
                        </fieldset>
                    </td>
                </tr>
            </table>
        </form class="message">
        <!-- form thông báo -->
        <br>
        <br>
        <?php if(!empty($error_message)):?>
            <form id="form-thongbao">
                <td class="thongbao">
                    <fieldset>
                        <legend>Thông báo </legend>
                        <br style="color: red"><?php echo $error_message;?>
                        <br>
                        <br>
                        <button type="button" id="ok">OK</button>
                    </fieldset>
                </td>
            </form>
        <?php endif; ?>
        <script>// sự kiện nhấp ok thì biến mất thông báo
        document.getElementById("ok").addEventListener("click", function(event) {
            event.preventDefault();
            var formthongbao = document.getElementById("form-thongbao");
            formthongbao.style.display = "none";
        });
        </script>
    </body>
</html>
 