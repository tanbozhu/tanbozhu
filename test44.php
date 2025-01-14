<?php
$host = 'localhost';
$username = 'root';
$password = '19891989';
$database = 'tantan';
$connect = mysqli_connect($host, $username, $password, $database);
if(! $connect )
{
    die('连接失败: ' . mysqli_error($connect));
}
echo '连接成功';
// 设置编码，防止中文乱码
mysqli_query($connect , "set names utf8");

$sql = 'SELECT * FROM huizong where duiwu = "广东81轮滑星光队"';

mysqli_select_db( $connect, 'tantan' );
$result = mysqli_query( $connect, $sql );
//if(! $result )
//{
//    die('无法读取数据: ' . mysqli_error($connect));
//}
echo '<h2>谭谭系统测试1.0</h2>';
echo '<table border="1"><tr><td>序号</td><td>号码牌</td><td>姓名</td><td>队伍</td><td>生日</td></tr>';
while($row = mysqli_fetch_array($result, MYSQLI_NUM))
{
    echo "<tr><td> {$row[0]}</td> ".
        "<td>{$row[1]} </td> ".
        "<td>{$row[2]} </td> ".
        "<td>{$row[3]} </td> ".
        "<td>{$row[4]} </td> ".
        "</tr>";
}
echo '</table>';


$id = $_POST['id'];
$safe_id = mysqli_real_escape_string($connect, $id);
echo '你要查询的队伍是:<br>';
echo $safe_id ;
echo '<br>';

// SQL查询语句
$sql = "SELECT * FROM huizong WHERE duiwu = '广东81轮滑星光队'";

// 执行查询
mysqli_select_db( $connect, 'tantan' );
$result = mysqli_query($connect, $sql);
//if (!$result) {
//    die('查询失败: ' . mysqli_error($conn));
//}
// 处理查询结果
while ($row = mysqli_fetch_assoc($result)) {
    echo 'ID: ' . $row['id'] . ' - Name: ' . $row['name'] . '<br>';}

// 获取查询结果行数
$num_rows = mysqli_num_rows($result);
echo '查询结果共有 ' . $num_rows . ' 行数据<br>';

// 关闭数据库连接
mysqli_close($connect);
?>