<div>
    <label for="">Chọn thời gian thống kê: </label></br>
    <label for="">Chọn thời điểm bắt đầu: </label>
    <input type="date" id="timebatdau">
    <label for="">Chọn thời điểm kết thúc: </label>
    <input type="date" id="timeketthuc">
    <input type="submit" value="gửi" id="submit">
</div>
<div>
        <table class="bangthongke" border="2">
            
        </table>
</div>
<script>
    document.getElementById("submit").onclick = function(){
        //ngay bat dau tk
        datestart = new Date ($('#timebatdau').val());
        var ngay = datestart.getDate();
            if(ngay < 10) ngay = '0'+ngay;
            var thang = datestart.getMonth()+1;
            if(thang < 10) thang = '0'+thang;
            var nam = datestart.getFullYear();
            dst = [nam,thang,ngay].join('-');
            
        //ngay ket thuc tk
        dateend = new Date ($('#timeketthuc').val());
            ngay = dateend.getDate();
            if(ngay < 10) ngay = '0'+ngay;
            thang = dateend.getMonth()+1;
            if(thang < 10) thang = '0'+thang;
            nam = dateend.getFullYear();
            dend = [nam,thang,ngay].join('-');

            $('.bangthongke').load('../thongke/laydulieutk.php',{
                kieuthongke: 'thongketatca',datestart: dst,dateend: dend
            })
        }
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