<?php 
    header("Content-type:text/html;charset=utf-8"); 
    // 判断是否是post请求
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (empty($_POST['email']) || empty($_POST['password'])) {
        //没有完整填写表单
        $message = '请完整填写表单';
      } else {
        //完整填写表单
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($email === 'admin@demo.com' && $password === 'cloud') {
          header('Location: /admin/index.php');
          exit;
        } else {
          $message = '邮箱与密码不匹配';
        }
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
