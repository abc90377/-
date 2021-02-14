<?php
if(!empty($_GET['error'])){
    if ($_GET['error']=="empty") {
        echo "<script>alert('錯誤:欄位不得為空')</script>";
    }elseif ($_GET['error']=="daywrong") {
        echo "<script>alert('錯誤:下檔日不得比上映日早')</script>";
    }
}
$m=$Movie->find($_GET['movie']);

?>
<h3 class="col-12 text-center">編輯電影</h3>

<form action="api/editmovie.php" enctype="multipart/form-data" method="post">
<table >
    <tr>
        <td>片名</td>
        <td><input type="text" name="name" id="name" value="<?=$m['name'];?>"></td>
    </tr>
    <tr>
        <td>海報</td>
        <td><input type="file" name="poster" id="poster"></td>
    </tr>
    <tr>
        <td>上映日</td>
        <td><input type="date" name="onday" id="onday"  value="<?=$m['onday'];?>"></td>
    </tr>
    <tr>
        <td>下檔日</td>
        <td><input type="date" name="offday" id="offday"   value="<?=$m['offday'];?>"></td>
    </tr>
    <tr>
        <td>主演</td>
        <td id="starTd" >
            
                <?php
                $stars=explode(",",$m['star']);
                foreach ($stars as  $key=>$star) {
                ?>
                <div id="star<?=$key;?>" >
                <input class="mb-2" type="text" name="star[]" value="<?=$star;?>">
                <input type="button" onclick="delstar('#star<?=$key;?>')"  value="刪除">
            </div>
                <?php
                }

                ?>
            
            <input type="button" onclick="addstar()" value="更多主演">
        
            
    
    </td>
    </tr>
    <tr>
        <td>簡介</td>
        <td><textarea name="inform" id="inform" cols="30" rows="10"  ><?=$m['inform'];?></textarea></td>
    </tr>
</table>
<div class="d-flex justify-content-center">
    <input type="hidden" name="id" value="<?=$_GET['movie'];?>">
<input  class="btn btn-primary m-3"type="submit" value="修改">
<input  class="btn btn-primary m-3"type="reset" value="重置"></div>
</form>
<script>
    s=1;
    function addstar(){
        s++;
        a=`<div  id="star${s}"><input type="text"  class="mb-2" name="star[]">
        <input type="button" onclick="delstar('#star${s}')"  value="刪除"></div>`;
        $("#starTd").append(a);

    }
    function delstar(star,btn){
        $(star).remove();
        
    }
</script>