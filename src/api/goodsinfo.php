<?php
//引入其他php文件
    include 'connect.php';
//请求传参
$cate = isset($_GET['cate']) ? $_GET['cate'] : '';

//编写sql语句
    $sql = "select * from facialcare where goodsid=$cate";
    // echo($sql);
    //查询前设置编码，放置输出乱码
    $conn->set_charset('utf8');
    //获取查询结果集
    $result = $conn->query($sql);
    // var_dump($result);
    //使用查询结果集(得到json字符串)
    $row = $result->fetch_all(MYSQLI_ASSOC);
    // var_dump($row);
    //释放查询结果集
    $result->close();
 // 格式化数据
    // 关联数组
    $res = array(
        'data'=>$row,
        'status'=>200,
        'msg'=>'success'
    );
    //把结果输出到前台
    echo json_encode($res,JSON_UNESCAPED_UNICODE);

    // 关闭数据库
    $conn->close();
?> 
