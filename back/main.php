<form action="api/addmovie.php" enctype="multipart/form-data" method="post">
<table >
    <tr>
        <td>片名</td>
        <td><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <td>海報</td>
        <td><input type="file" name="poster" id="poster"></td>
    </tr>
    <tr>
        <td>上映日</td>
        <td><input type="date" name="onday" id="onday"></td>
    </tr>
    <tr>
        <td>下檔日</td>
        <td><input type="date" name="offday" id="offday"></td>
    </tr>
    <tr>
        <td>主演</td>
        <td><input type="text" name="star" id="star"></td>
    </tr>
    <tr>
        <td>簡介</td>
        <td><textarea name="inform" id="inform" cols="30" rows="10"></textarea></td>
    </tr>
</table>
</form>