<?php 
/**
 * 
 * 封装常用函数
 */
require_once '../config.php';

/**
 * 执行一个查询语句，返回查询到的数据（关联数组混合索引数组）
 * @para string $sql 需要执行的查询语句
 * @return array    查询到的数据 （二位数组）
 * 
 */
function xiu_query ($sql) {
    // 建立数据库连接
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$connection) {
        die('<h1>Connection Error (' . mysqli_connect_errno() . ')' .mysqli_connect_errno() . '</h1>');
    }

    // 定义结果数据容器，用于装载查询到的数据
    $data = array();

    // 执行参数中指定的sql语句
    if ($result = mysqli_query($connection, $sql)) {
        while ($row = mysqli_fetch_array($result)) {
        $data[] = $row;
        }

        // 释放结果集
        mysqli_free_result($result);
    }
    // 关闭数据库
    mysqli_close($connection);
    return $data;
    }

?>