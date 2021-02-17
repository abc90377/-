<?php
// print_r($_POST);
if(empty($_POST['seat'])){
    to("?do=book");
    }

?>
<div class=" d-flex justify-content-center book">
<div class=" col-6 wrap bg-dark flex-wrap text-white p-3 m-3 d-flex justify-content-center bg-dark rounded rounded-lg">
<h3 class="col-12 text-center mb-1">輸入訂票人資料</h3>
<hr class="col-12">
<table>
    <tr >
    <td>電話:</td>
        <td><input type="text" name="" id="phone"></td>

    </tr>
    <tr >
    <td>確認電話</td>
        <td><input type="text" name="" id="phonechk"></td>

    </tr>
    <tr >
    <td>電子信箱</td>
        <td><input type="email" name="" id="email"></td>

    </tr>
</table>
<div class="col-12 m-3 text-center">
<input type="button" onclick="bookchk()" class=" btn btn-success "value="確定訂票" >
</div>
</div>
</div>
<script>
function bookchk() {
    phone=$("#phone").val()
    phonechk=$("#phonechk").val()
    email=$("#email").val()
    movie="<?=$_POST['movie'];?>"
    seat="<?=$_POST['seat'];?>"
    day="<?=$_POST['day'];?>"
    session="<?=$_POST['session'];?>"
    if (phone==""||phonechk==""||email=="") {
        alert("資料不可為空!");
    }else if(phone!=phonechk){
        alert("電話錯誤!");
    }else{
        $.post('api/book.php',{phone,email,movie,seat,day,session},function(re){
            location.href=`?do=booksus&id=${re}`;
            // console.log(re)
        })

    }
}
</script>