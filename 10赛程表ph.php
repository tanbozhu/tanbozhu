
<?php

if (isset($_POST['name'])){
    $id = $_POST['name'];
    echo "收到的值是: $id <br>";
    myfun();
}
function myfun() {
    $host = 'localhost';
    $username = 'root';
    $password = '19891989';
    $database = 'tantan';
    $connect = mysqli_connect($host, $username, $password, $database);
    //要输出变量需要用双引号""且空格
    echo "<p>数据库$database 连接成功</p>";
    // 设置编码，防止中文乱码
    // mysqli_query($connect , "set names utf8");
    // $id = $_POST['name'];
    $sql = "SELECT * FROM saicheng";
    $result = mysqli_query( $connect, $sql );
    echo '<h1 align="center">谭谭系统测试1.0</h1>';
    echo '<p align="center"><img align="center" src="表头.jpg" alt="文件路径出错" width="800"></p>';
    echo '<table border="1" cellpadding="5" cellspacing="0" align="center" >
    <th>日期</th><th>单元</th><th>时间</th><th>场次</th>
    <th>项目</th><th>组别</th><th>赛次</th><th>人数</th>
    <th>组数</th><th>晋级</th><th>备注</th>
    </tr>';
    while($row = mysqli_fetch_array($result, MYSQLI_NUM))
    {
        echo "<tr>".
            //"<td align='center'> {$row[0]}</td> ".
            "<td align='left'>{$row[1]} </td> ".
            "<td align='left'>{$row[2]} </td> ".
            "<td align='center'>{$row[3]} </td> ".
            "<td align='center'>{$row[4]} </td> ".
            "<td align='center'>{$row[5]} </td> ".
            "<td align='center'>{$row[6]} </td> ".
            "<td align='center'>{$row[7]} </td> ".
            "<td align='center'>{$row[8]} </td> ".
            "<td align='center'>{$row[9]} </td> ".
            "<td align='center'{$row[10]} </td> ".
            "<td align='center'>{$row[11]} </td> ".
            "</tr>";
    }
    echo '</table>';
    // 获取查询结果行数
    $num_rows = mysqli_num_rows($result);
    echo '<br>查询数据 ' . $num_rows . ' 条<br>';
    // 关闭数据库连接
    mysqli_close($connect);
}
?>


</body>
</html>
