
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
     function currency(num) {

    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' VND';
}
     function phanloai(obj,page,sortprice,search){       
        $.ajax({
            type:"post",
            url:"action_.php",
            data: {brand:obj,page:page,sortprice:sortprice,search:search,act:'phanloai'},
            dataType:"html",    
            success:function(data){                    
                data=data.replace(/"/g,'');
                data="<ul class='product-list'>"+data+"</ul>";              
                if(obj==='all'){
                $('#product').html('<div class="product-right"><div class="theloai" data-brand="'+obj+'">All Products >>></div>'+data+"</div>");
                }
                else{
                $('#product').html('<div class="product-right"><div class="theloai" data-brand="'+obj+'">'+obj+' >>></div>'+data+"</div>");   
                }
                //$('#product').html(data+'<div class="theloai" data-brand="'+obj+'"></div>');   
               
            }    
        });
     }
     function phantrang(obj,page,sortprice,search){
     $.ajax({
            type:"post",
            url:"action_.php",
            data:{brand:obj,page:page,sortprice:sortprice,search:search,act:'phantrang'},
            dataType:"html",
            success:function(data){
                data=data.replace(/"/g,'');
                
                if(data===""){}
                else{
                data="<ul class='page-list'>"+data+"</ul>";                              
                $('#page').html(data);}                
           }
        });
    }
    function chitiet(id){
        $.ajax({
            type:"post",
            url:"action_.php",
            data:{id:id,act:'detail'},
            dataType:"html",
            success:function(data){
                data=data.replace(/"/g,'');
                $('#product-detail').html(data);
                $('#product-detail').css("display","block");
            }
        });
    }
    function search(name){
        $.ajax({
           type:"post",
           url:"action_.php",
           data:{name:name,act:"search"},
           dataType:"html",
           success:function(data){              
                data=data.replace(/"/g,'');    
                $('.search-result').html(data);              
            }
        });
    }
    function validate_chitiet(){
        if($('.size-btn-selected').length===0){
            $('.size-validate').css("display","block");
            return false;
        }
    }
    function validate_thanh_toan(){
        if($("#tennguoinhan").val()===""){
            $(".check-name").css("display","block");
            return false;
        }
        else{
            $(".check-name").css("display","none");
        }
        if($("#diachi").val()===""){
            $(".check-address").css("display","block");
            return false;
        }
        else{
            $(".check-address").css("display","none");
        }
        if($("#sdt").val()===""){
            $(".check-sdt").css("display","block");
            return false;          
        }
        else{
            $('.check-sdt').css("display","none");
        }
        var pattern = /[0-9]/;
        const sdt = $("#sdt").val();
        
        if(sdt.match(pattern)){
            if(sdt.length==10 || sdt.length==11){
                $('.check-sdt').css("display","none");               
                return true;
            }
            else{
                $(".check-sdt").css("display","block");             
                return false;
            }
        }
        else{
            $(".check-sdt").css("display","block");
         
                return false;
        }
        
        
    }
    
    function check_phone(phone){
        $.ajax({
            type:"post",
            url:"action_.php",
            dataType:"html",
            data:{
                phone:phone,
                act:'check_phone'
            },
            success:function(data){
                alert(data);
                //if(data===true) return true;
                //return false;
            }
        });
    }
    function update(id,quantity){
        $.ajax({
            type:"post",
            url:"action_.php",
            dataType:"html",
            data:{id:id,quantity:quantity,act:'update-cart'},
            success:function(){
            },
            error:function(){
                alert(id+" "+quantity);
            }
        });
    }
    function down(id,i){
        $.ajax({
            type:"post",
            url:"action_.php",
            data:{id:id,i:i,act:'down'},
            success:function(data){
                 data=data.replace(/"/g,'');
                 $('#detail-cart').html(data);
                //location.reload(true);
            }
        });
    }
    function up(id,i){
        $.ajax({
            type:"post",
            url:"action_.php",
            data:{id:id,i:i,act:'up'},
            success:function(data){
                 data=data.replace(/"/g,'');
                 $('#detail-cart').html(data);
            }
            
        });    
    }
    function delete_from_cart(id,i){
        if(confirm("Xoá sản phẩm này ???")==true){
        $.ajax({
            type:"post",
            url:"action_.php",
            data:{id:id,i:i,act:'delete-from-cart'},
            success:function(data){             
                data=data.replace(/"/g,'');
                $('#detail-cart').html(data);
            }
        });
        }
    }
    function delete_cart(){
        $.ajax({
            type:"post",
            url:"action_.php",
            data:{act:'delete-all-cart'},
            success:function(data){
                data=data.replace(/"/g,'');
                $('#detail-cart').html(data);
            }
        });
    }
    
     $(document).ready(function(){
         phanloai('all',null,null,null);
         phantrang('all',null,null,null);
         $('.brand').click(function(){
             var brand=$(this).data('id');
             phanloai(brand,null,null,null);
             phantrang(brand,null,null,null);
             $('.sort-by-price').val("none");
             $('.searchbar').val("");
             $('.brand').css("color","black");
             $('.brand').css("border-left","none");
             $(this).css("color","red");
             $(this).css("border-left","solid 20px red");    
             
         });
         
        });
       $(document).ready(function(){
            $("body").on("click",".page-index",function(){
                var page=$(this).data('page');
                var brand=$('.theloai').data('brand');
                var sortprice=$('.sort-by-price').val();
                if(sortprice==="none"){
                    phanloai(brand,page,null,null);
                    phantrang(brand,page,null,null);
                }
                else{
                     phanloai(brand,page,sortprice,null);
                     phantrang(brand,page,sortprice,null);
                }});
            $("body").on("change",".sort-by-price",function(){
                var page=1;
                var brand=$('.theloai').data('brand');
                var sortprice=$(this).val();                        
                phanloai(brand,page,sortprice,null);
                phantrang(brand,page,sortprice,null);            
            });
            $("body").on("input",".searchbar",function(){
                var page=1;
                var brand=$('.theloai').data('brand');
                var sortprice=$('.sort-by-price').val();
                var search=$(this).val();
                phanloai(brand,page,sortprice,search);
                phantrang(brand,page,sortprice,search);
            });
            $("body").on("click","#product-info-div",function(){
                var id=$(this).data('id');
                chitiet(id);
                
            });
            $("body").on("click",".close-btn",function(){
                $('#product-detail').css("display","none");
            });
            $("body").on("click",".quantity-down",function(){
               var quantity = $('.quantity-num').val(); 
               if(quantity>=1){
                   quantity--;
               }               
               $('.quantity-num').val(quantity);
               $('.quantity-hidden').val(quantity);
            });
            $("body").on("click",".quantity-up",function(){
               var quantity = $('.quantity-num').val();
               if(quantity<=99){
                   quantity++;
               }
               $('.quantity-num').val(quantity);
               $('.quantity-hidden').val(quantity);
            });
            $("body").on("click",".size-btn",function(){
                $(".size-btn").removeClass("size-btn-selected");
                $(this).addClass("size-btn-selected");
                $('.size-hidden').val($(this).data('size'));
                $('.size-validate').css('display','none');
            });
            $("body").on("keyup",".header__search-input",function(){
                var name = $(this).val();
                if(name!==""){
                    $(".search-result").css("display","block");
                
                search(name);
                }
                else{
                    $(".search-result").css("display","none");  
                }
            });
            $("body").on("click",".info__product",function(){
               var id= $(this).data('id');
               chitiet(id);
            });
            $("body").on("click","#delete-cart",function(){
                if(confirm("Bạn muốn xoá toàn bộ sản phẩm trong giỏ hàng??")){
                    delete_cart();
                }
                else{};
            });
            
       });  
       
        
    </script>
</html>
