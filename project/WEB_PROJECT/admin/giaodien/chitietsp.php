<html>
<body>
    <table id="ctsp">
    <tr>
    <th class='col_1'>Mã sản phẩm
    <form method="post">
    <select name="id">
            <option  value="all">Tất cả</option> 
            <?php 
            require_once 'connect.php';
            $re=mysqli_query($con,"SELECT * FROM sanpham group by Id_sp");
            while($row1 = mysqli_fetch_array($re)){
                echo '<option value="'.$row1['ID_sp'].'">'.$row1['ID_sp'].'</option>';
            }?>
    </select> 
    <input type="submit" name="loai" value="Lọc">
    </form></th>
    <th class='col_2_1'>Tên sản phẩm</th>
    <th class='col_2'>Size 
    <form method="post">
    <select name="idsz">
            <option  value="all">Tất cả</option> 
            <?php 
            $re1=mysqli_query($con,"SELECT * FROM size ");
            while($row2 = mysqli_fetch_array($re1)){
                echo '<option value="'.$row2['Ma_size'].'">'.$row2['Ten_size'].'</option>';
            }?>
    </select> 
    <input type="submit" name="theloai" value="Lọc">
    </form></th>
    
    <th class='col_3'>Thể loại
    <form method="post">
    <select name="idtl">
            <option  value="all">Tất cả</option> 
            <?php 
            $re1=mysqli_query($con,"SELECT * FROM chitietsanpham,sanpham,theloai where sanpham.ID_sp=chitietsanpham.ID_sp and
            sanpham.Id_theloai=theloai.Idtheloai group by Id_theloai");
            while($row2 = mysqli_fetch_array($re1)){
                echo '<option value="'.$row2['Id_theloai'].'">'.$row2['Id_theloai'].'</option>';
            }?>
    </select> 
    <input type="submit" name="tloai" value="Lọc">
    </form>
    </th>
    
    <th class='col_4'>Số lượng</th>
    <th class='col_5'>Hiển thị</th>
    </tr>
    <?php
    if(isset($_POST['loai'])){
        if($_POST['id']=='all'){
            $result =mysqli_query($con,"SELECT * FROM chitietsanpham,sanpham,theloai,size where sanpham.ID_sp=chitietsanpham.ID_sp and
            sanpham.Id_theloai=theloai.Idtheloai and size.Ma_size=chitietsanpham.Ma_size");  
        while($row = mysqli_fetch_array($result)){
            echo '<tr>
                <td class="col_1"> '.$row['ID_sp'].'   </td>
                <td class="col_2_1">'.$row['Tensp'].'</td>
                <td class="col_2"> '.$row['Ten_size'].' </td>
                <td class="col_3">'.$row['Id_theloai'].'</td>
                <td class="col_4"> '.$row['Soluong'].'
                <a href="index.php?act='.$row['Ma_size'].'&idg='.$row['ID_sp'].'"><img src="../image/tru.png" style="float:right;" ></a>
                <a href="index.php?act='.$row['Ma_size'].'&idt='.$row['ID_sp'].'"><img src="../image/cong.png style="float:right;"" ></a>
                </td>';
                
            
                if($row['Soluong'] <= 0){
                    $sp=$row['ID_sp'];
                    $size=$row['Ma_size'];
                    mysqli_query($con,"UPDATE chitietsanpham set Tinhtrang=0 where ID_sp='$sp' and Ma_size='$size'");
                    if($row['Tinhtrang'] == 0 ){
                        echo '<td>Không hiển Thị</a></td>';
                    }
                    else{
                        echo '<td><a href="index.php?act='.$row['Ma_size'].'&idht='.$row['ID_sp'].'">Hiển Thị</a></td>';
                    }
                }
                else{
                    if($row['Tinhtrang'] == 0 ){
                        echo '<td><a href="index.php?act='.$row['Ma_size'].'&idht='.$row['ID_sp'].'">Không hiển Thị</a></td>';
                    }
                    else{
                        echo '<td><a href="index.php?act='.$row['Ma_size'].'&idht='.$row['ID_sp'].'">Hiển Thị</a></td>';
                    }
                }
            echo '</tr>';
            }
            //header("location:index.php?id=dm101&act=dm");
        }
        else{
            $idsp=$_POST['id'];
            $result =mysqli_query($con,"SELECT * FROM chitietsanpham,sanpham,theloai,size where sanpham.ID_sp=chitietsanpham.ID_sp and
            sanpham.Id_theloai=theloai.Idtheloai and size.Ma_size=chitietsanpham.Ma_size and chitietsanpham.ID_sp='$idsp'");
            while($row = mysqli_fetch_array($result)){ 
                echo '<tr>
                <td class="col_1"> '.$row['ID_sp'].'   </td>
                    <td class="col_2_1">'.$row['Tensp'].'</td>
                <td class="col_2"> '.$row['Ten_size'].' </td>
                <td class="col_3">'.$row['Id_theloai'].'</td>
                <td class="col_4"> '.$row['Soluong'].'
                <a href="index.php?act='.$row['Ma_size'].'&idg='.$row['ID_sp'].'"><img src="../image/tru.png" ></a>
                <a href="index.php?act='.$row['Ma_size'].'&idt='.$row['ID_sp'].'"><img src="../image/cong.png" ></a>
                </td>';
                if($row['Soluong'] <= 0){
                    $sp=$row['ID_sp'];
                    $size=$row['Ma_size'];
                    mysqli_query($con,"UPDATE chitietsanpham set Tinhtrang=0 where ID_sp='$sp' and Ma_size='$size'");
                    if($row['Tinhtrang'] == 0 ){
                        echo '<td class="col_5">Không hiển Thị</a></td>';
                    }
                    else{
                        echo '<td class="col_5"><a href="index.php?act='.$row['Ma_size'].'&idht='.$row['ID_sp'].'">Hiển Thị</a></td>';
                    }
                }
                else{
                    if($row['Tinhtrang'] == 0 ){
                        echo '<td class="col_5"><a href="index.php?act='.$row['Ma_size'].'&idht='.$row['ID_sp'].'">Không hiển Thị</a></td>';
                    }
                    else{
                        echo '<td class="col_5"><a href="index.php?act='.$row['Ma_size'].'&idht='.$row['ID_sp'].'">Hiển Thị</a></td>';
                    }
                }
            echo '</tr>';
            }
            //header("location:index.php?id=dm101&act=dm");
        }
        mysqli_close($con);
    echo '</table>';
    }
    else if(isset($_POST['theloai'])){
        if($_POST['idsz']=='all'){
            $result =mysqli_query($con,"SELECT * FROM chitietsanpham,sanpham,theloai,size where sanpham.ID_sp=chitietsanpham.ID_sp and
            sanpham.Id_theloai=theloai.Idtheloai and size.Ma_size=chitietsanpham.Ma_size");
            while($row = mysqli_fetch_array($result)){ 
            echo '<tr>
                <td class="col_1"> '.$row['ID_sp'].'   </td>
                    <td class="col_2_1">'.$row['Tensp'].'</td>
                <td class="col_2"> '.$row['Ten_size'].' </td>
                <td class="col_3">'.$row['Id_theloai'].'</td>
                <td class="col_4"> '.$row['Soluong'].'
                <a href="index.php?act='.$row['Ma_size'].'&idg='.$row['ID_sp'].'"><img src="../image/tru.png" ></a>
                <a href="index.php?act='.$row['Ma_size'].'&idt='.$row['ID_sp'].'"><img src="../image/cong.png" ></a>
                </td>';
                if($row['Soluong'] <= 0){
                    $sp=$row['ID_sp'];
                    $size=$row['Ma_size'];
                    mysqli_query($con,"UPDATE chitietsanpham set Tinhtrang=0 where ID_sp='$sp' and Ma_size='$size'");
                    if($row['Tinhtrang'] == 0 ){
                        echo '<td class="col_5">Không hiển Thị</a></td>';
                    }
                    else{
                        echo '<td class="col_5"><a href="index.php?act='.$row['Ma_size'].'&idht='.$row['ID_sp'].'">Hiển Thị</a></td>';
                    }
                }
                else{
                    if($row['Tinhtrang'] == 0 ){
                        echo '<td class="col_5"><a href="index.php?act='.$row['Ma_size'].'&idht='.$row['ID_sp'].'">Không hiển Thị</a></td>';
                    }
                    else{
                        echo '<td class="col_5"><a href="index.php?act='.$row['Ma_size'].'&idht='.$row['ID_sp'].'">Hiển Thị</a></td>';
                    }
                }
            echo '</tr>';
            }
            //header("location:index.php?id=dm101&act=dm");
        }
        else{
            $idsize=$_POST['idsz'];
            
            $sql="SELECT * FROM chitietsanpham,sanpham,theloai,size where sanpham.ID_sp=chitietsanpham.ID_sp and
            sanpham.Id_theloai=theloai.Idtheloai and size.Ma_size=chitietsanpham.Ma_size and chitietsanpham.Ma_size='$idsize'";
            $result =mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($result)){ 
                echo '<tr>
                <td class="col_1"> '.$row['ID_sp'].'   </td>
                <td class="col_2_1">'.$row['Tensp'].'</td>
                <td class="col_2"> '.$row['Ten_size'].' </td>
                <td class="col_3">'.$row['Id_theloai'].'</td>
                <td class="col_4"> '.$row['Soluong'].'
                <a href="index.php?act='.$row['Ma_size'].'&idg='.$row['ID_sp'].'"><img src="../image/tru.png" ></a>
                <a href="index.php?act='.$row['Ma_size'].'&idt='.$row['ID_sp'].'"><img src="../image/cong.png" ></a>
                </td>';
                if($row['Soluong'] <= 0){
                    $sp=$row['ID_sp'];
                    $size=$row['Ma_size'];
                    mysqli_query($con,"UPDATE chitietsanpham set Tinhtrang=0 where ID_sp='$sp' and Ma_size='$size'");
                    if($row['Tinhtrang'] == 0 ){
                        echo '<td class="col_5">Không hiển Thị</a></td>';
                    }
                    else{
                        echo '<td class="col_5"><a href="index.php?act='.$row['Ma_size'].'&idht='.$row['ID_sp'].'">Hiển Thị</a></td>';
                    }
                }
                else{
                    if($row['Tinhtrang'] == 0 ){
                        echo '<td class="col_5"><a href="index.php?act='.$row['Ma_size'].'&idht='.$row['ID_sp'].'">Không hiển Thị</a></td>';
                    }
                    else{
                        echo '<td class="col_5"><a href="index.php?act='.$row['Ma_size'].'&idht='.$row['ID_sp'].'">Hiển Thị</a></td>';
                    }
                }
            echo '</tr>';
            }  
        }
        mysqli_close($con);
    echo '</table>';
    }
    else if(isset($_POST['tloai'])){
        if($_POST['idtl']=='all'){
            $result =mysqli_query($con,"SELECT * FROM chitietsanpham,sanpham,theloai,size where sanpham.ID_sp=chitietsanpham.ID_sp and
            sanpham.Id_theloai=theloai.Idtheloai and size.Ma_size=chitietsanpham.Ma_size");
            while($row = mysqli_fetch_array($result)){ 
            echo '<tr>
                <td class="col_1"> '.$row['ID_sp'].'   </td>
                    <td class="col_2_1">'.$row['Tensp'].'</td>
                <td class="col_2"> '.$row['Ten_size'].' </td>
                <td class="col_3">'.$row['Id_theloai'].'</td>
                <td class="col_4"> '.$row['Soluong'].'
                <a href="index.php?act='.$row['Ma_size'].'&idg='.$row['ID_sp'].'"><img src="../image/tru.png" ></a>
                <a href="index.php?act='.$row['Ma_size'].'&idt='.$row['ID_sp'].'"><img src="../image/cong.png" ></a>
                </td>';
                if($row['Soluong'] <= 0){
                    $sp=$row['ID_sp'];
                    $size=$row['Ma_size'];
                    mysqli_query($con,"UPDATE chitietsanpham set Tinhtrang=0 where ID_sp='$sp' and Ma_size='$size'");
                    if($row['Tinhtrang'] == 0 ){
                        echo '<td class="col_5">Không hiển Thị</a></td>';
                    }
                    else{
                        echo '<td class="col_5"><a href="index.php?act='.$row['Ma_size'].'&idht='.$row['ID_sp'].'">Hiển Thị</a></td>';
                    }
                }
                else{
                    if($row['Tinhtrang'] == 0 ){
                        echo '<td class="col_5"><a href="index.php?act='.$row['Ma_size'].'&idht='.$row['ID_sp'].'">Không hiển Thị</a></td>';
                    }
                    else{
                        echo '<td class="col_5"><a href="index.php?act='.$row['Ma_size'].'&idht='.$row['ID_sp'].'">Hiển Thị</a></td>';
                    }
                }
            echo '</tr>';
            } 
        }
        else{
            $idtl=$_POST['idtl'];
            $sql="SELECT * FROM chitietsanpham,sanpham,theloai,size where sanpham.ID_sp=chitietsanpham.ID_sp and
            sanpham.Id_theloai=theloai.Idtheloai and Id_theloai='$idtl' and size.Ma_size=chitietsanpham.Ma_size";
            $result =mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($result)){ 
                echo '<tr>
                <td class="col_1"> '.$row['ID_sp'].'   </td>
                    <td class="col_2_1">'.$row['Tensp'].'</td>
                <td class="col_2"> '.$row['Ten_size'].' </td>
                <td class="col_3">'.$row['Id_theloai'].'</td>
                <td class="col_4"> '.$row['Soluong'].'
                <a href="index.php?act='.$row['Ma_size'].'&idg='.$row['ID_sp'].'"><img src="../image/tru.png" ></a>
                <a href="index.php?act='.$row['Ma_size'].'&idt='.$row['ID_sp'].'"><img src="../image/cong.png" ></a>
                </td>';
               if($row['Soluong'] <= 0){
                    $sp=$row['ID_sp'];
                    $size=$row['Ma_size'];
                    mysqli_query($con,"UPDATE chitietsanpham set Tinhtrang=0 where ID_sp='$sp' and Ma_size='$size'");
                    if($row['Tinhtrang'] == 0 ){
                        echo '<td class="col_5">Không hiển Thị</a></td>';
                    }
                    else{
                        echo '<td class="col_5"><a href="index.php?act='.$row['Ma_size'].'&idht='.$row['ID_sp'].'">Hiển Thị</a></td>';
                    }
                }
                else{
                    if($row['Tinhtrang'] == 0 ){
                        echo '<td class="col_5"><a href="index.php?act='.$row['Ma_size'].'&idht='.$row['ID_sp'].'">Không hiển Thị</a></td>';
                    }
                    else{
                        echo '<td class="col_5"><a href="index.php?act='.$row['Ma_size'].'&idht='.$row['ID_sp'].'">Hiển Thị</a></td>';
                    }
                }
            echo '</tr>';
            }  
        }
        mysqli_close($con);
        echo '</table>';
    }
    else {
        $result =mysqli_query($con,"SELECT * FROM chitietsanpham,sanpham,theloai,size where sanpham.ID_sp=chitietsanpham.ID_sp and
            sanpham.Id_theloai=theloai.Idtheloai and size.Ma_size=chitietsanpham.Ma_size");
        while($row = mysqli_fetch_array($result)){ 
            echo '<tr>
            <td class="col_1"> '.$row['ID_sp'].'   </td>
                <td class="col_2_1">'.$row['Tensp'].'</td>
            <td class="col_2"> '.$row['Ten_size'].' </td>
            <td class="col_3">'.$row['Id_theloai'].'</td> 
            <td class="col_4"> '.$row['Soluong'].'
                <a href="index.php?act='.$row['Ma_size'].'&idg='.$row['ID_sp'].'"><img src="../image/tru.png" ></a>
                <a href="index.php?act='.$row['Ma_size'].'&idt='.$row['ID_sp'].'"><img src="../image/cong.png" ></a>
                </td>';
                if($row['Soluong'] <= 0){
                    $sp=$row['ID_sp'];
                    $size=$row['Ma_size'];
                    mysqli_query($con,"UPDATE chitietsanpham set Tinhtrang=0 where ID_sp='$sp' and Ma_size='$size'");
                    if($row['Tinhtrang'] == 0 ){
                        echo '<td class="col_5">Không hiển Thị</a></td>';
                    }
                    else{
                        echo '<td class="col_5"><a href="index.php?act='.$row['Ma_size'].'&idht='.$row['ID_sp'].'">Hiển Thị</a></td>';
                    }
                }
                else{
                    if($row['Tinhtrang'] == 0 ){
                        echo '<td class="col_5"><a href="index.php?act='.$row['Ma_size'].'&idht='.$row['ID_sp'].'">Không hiển Thị</a></td>';
                    }
                    else{
                        echo '<td class="col_5"><a href="index.php?act='.$row['Ma_size'].'&idht='.$row['ID_sp'].'">Hiển Thị</a></td>';
                    }
                }
        echo '</tr>';
        }
        mysqli_close($con);
        echo '</table>';
    }
    ?>
</body>
</html>

    