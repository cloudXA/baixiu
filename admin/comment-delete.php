<?php 
/**
 * 删除评论
 */
require '../functions.php';

// 设置响应类型json
header('Content-Type: application/json');

if (empty($_GET['id'])) {
    exit(json_encode(array(
        'success' => false,
        'message' => '缺少必要参数'
    )));
}

// 拼接sql并执行
$affected_rows = xiu_execute(sprintf('delete from comments where id in (%s)', $_GET['id']));

// 输出结果
echo json_encode(array(
    'success' => $affected_rows > 0
));
?>