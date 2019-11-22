<?php 
    header("Content-type:text/html;charset=utf-8"); 
    // 载入配置文件
    require_once '../config.php';

    




    // 判断是否是post请求
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      if (empty($_POST['email']) || empty($_POST['password'])) {
        //没有完整填写表单
        $message = '请完整填写表单';
      } else {
        //完整填写表单
        $email = $_POST['email'];
        $password = $_POST['password'];
        $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        // 建立数据库连接
        if (!$connection) {
          die('<h1>Connect Error (' . mysqli_connect_errno() .') ' . mysqli_connect_error() . '</h1>');
        }

        // 根据邮箱查询用户信息，limit是为了提高查询效率
        $result = mysqli_query($connection, sprintf("select * from users where email = '%s' limit 1", $email));

        if ($result) {
          if ($user = mysqli_fetch_assoc($result)) {
            // 用户存在,密码比对
            if ($user['password'] === $password) {
              header('Location: /admin/index.php');
              exit;
            }
          } 
          $message = '邮箱与密码不匹配';
          // 释放资源
          mysqli_free_result($result);
        } else {
          // 查询失败
          $message = '邮箱与密码不匹配';
        }
        mysqli_close($connection);
      }
    }


?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Sign in &laquo; Admin</title>
  <link rel="stylesheet" href="/static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/static/assets/css/admin.css">
</head>
<body>
  <div class="login">
    <!-- 添加novalidate去掉瀏覽器自動檢測 -->
    <form class="login-wrap" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate >
      <img class="avatar" src="/static/assets/img/default.png">
      <!-- 有错误信息时展示 -->
      <?php if (isset($message)) :?>
      <div class="alert alert-danger">
        <strong>错误！</strong> 用户名或密码错误！
      </div>
      <?php endif; ?>
      <div class="form-group">
        <label for="email" class="sr-only">邮箱</label>
        <!-- 添加了状态保持 -->
        <input id="email" type="email" name = "email" class="form-control" placeholder="邮箱" autofocus value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
      </div>
      <div class="form-group">
        <label for="password" class="sr-only">密码</label>
        <input id="password" type="password" name="password" class="form-control" placeholder="密码">
      </div>
      <button class="btn btn-primary btn-block" href="index.php" type="submit">登 录</button
    </form>
  </div>
</body>
</html>
