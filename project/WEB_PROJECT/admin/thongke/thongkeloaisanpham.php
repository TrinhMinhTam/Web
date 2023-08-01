<div>
    <?php 
        include_once "../connect.php";
        $result = $con->query("SELECT * FROM `theloai`");
    ?>
    <div>
            <label for="">lựa chọn thể loại sản phẩm: </label>
            <select name="" id="theloai">
                <option value="">---------Lựa chọn---------</option>
                <?php 
                    while($row = $result->fetch_row()){
                ?>
                <option value="<?=$row[0]?>"><?=$row[1]?></option>
                <?php } ?>
            </select>
    </div>
    <div>
        <label for="thoigianthongke">Lựa chọn thời gian thống kê</label><br>
        <label for="thoidiemdau">Thời điểm đầu</label><input type=date id="timetkstart">
        <label for="thoidiemketthuc">Thời điểm kết thúc</label><input type=date id="timetkend">
        <button class="tk">Thống kê</button>
    </div>
    <div >
        <table class="bangthongke">

        </table>
    </div>
    <script>
     
        $('button.tk').click(function(){
          datestart = new Date ($('#timetkstart').val());

            //ngay bat dau tk
            var ngay = datestart.getDate();
            if(ngay < 10) ngay = '0'+ngay;
            var thang = datestart.getMonth()+1;
            if(thang < 10) thang = '0'+thang;
            var nam = datestart.getFullYear();
            dst = [nam,thang,ngay].join('-');
            
            //ngay ket thuc tk

            dateend = new Date ($('#timetkend').val());
            ngay = dateend.getDate();
            if(ngay < 10) ngay = '0'+ngay;
            thang = dateend.getMonth()+1;
            if(thang < 10) thang = '0'+thang;
            nam = dateend.getFullYear();
            dend = [nam,thang,ngay].join('-');
            //lay the loai
            var tl = $('#theloai').val();
            $('.bangthongke').load('../thongke/laydulieutk.php',{kieuthongke: 'thongketheoloai',theloai: tl,datest: dst,dateend: dend});
        });
        function xulysukien(x){
            switch(x){
                case 'ma':{
                    if(x == 'ma'){
                        $('.bangthongke').load('../thongke/sapxepbang.php',{
                            sapxep: 'ma'
                        })
                    }
                }
                case 'ten':{
                    if(x == 'ten'){
                        $('.bangthongke').load('../thongke/sapxepbang.php',{
                            sapxep: 'ten'
                        })
                    }
                }
                case 'gia':{
                    if(x == 'gia'){
                        $('.bangthongke').load('../thongke/sapxepbang.php',{
                            sapxep: 'gia'
                        })
                    }
                }
            }
    }
    
    </script>
</div>