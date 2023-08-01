<div>
    <div>
            <label>Lựa chọn kiểu thống kê: </label>
            <select name="" id="phuongthucthongke">
                <option value="">-----------------Lựa chọn---------------</option>
                <option value="tk_banchay">Thống kê sản phẩm bán chạy</option>
                <option value="tk_theoloai">Thống kê sản phẩm theo loại sản phẩm</option>
                <option value="tk_tatca">Thống kê tất cả sản phẩm</option>
            </select>
            <input type="button" value="gửi yêu cầu" id="gyc">
    </div>
    <div class="xulydulieuthongke">

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
        <script>
            document.getElementById("gyc").onclick = function(){
                val = document.getElementById("phuongthucthongke").value;
                if(val == "") alert("bạn chưa chọn kiểu thống kê");
                else{
                    $('.xulydulieuthongke').load('../thongke/xulythongke.php',{
                        kieuthongke: val
                    })
                
                }
            };
        </script>
</div>