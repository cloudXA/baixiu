<?php 
    header("Content-type:text/html;charset=utf-8"); 
    require '../config.php';
    // 后台页面
    // 启动会话
    session_start();
    // 访问控制

    if (empty($_SESSION['is_logged_in'])) {
      // 代表没有登陆过
      // 跳转到登录页面
      header('Location: /admin/login.php');
      exit;
    }
    // 查询文章总数
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if (!$connection) {
      die('<h1>Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_errno() . '</h1>');
    }
    // 查询posts
    if ($result = mysqli_query($connection, 'select count(1) from posts')) {
      $post_count = mysqli_fetch_row($result)[0];
      mysqli_free_result($result);
    }
    // mysqli_close($connection);

    // 查询drafted
    if ($result = mysqli_query($connection, 'select count(1) from posts where status = \'drafted\'')) {
      $drafted = mysqli_fetch_row($result)[0];
      mysqli_free_result($result);
    }
    mysqli_close($connection);

    
    
 
    


?>



<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Dashboard &laquo; Admin</title>
  <link rel="stylesheet" href="/static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/static/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/static/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/static/assets/css/admin.css">
  <script src="/static/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <nav class="navbar">
      <button class="btn btn-default navbar-btn fa fa-bars"></button>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php"><i class="fa fa-user"></i>个人中心</a></li>
        <li><a href="login.php"><i class="fa fa-sign-out"></i>退出</a></li>
      </ul>
    </nav>
    <div class="container-fluid">
      <div class="jumbotron text-center">
        <h1>One Belt, One Road</h1>
        <p>Thoughts, stories and ideas.</p>
        <p><a class="btn btn-primary btn-lg" href="post-add.php" role="button">写文章</a></p>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">站点内容统计：</h3>
            </div>
            <ul class="list-group">
              <li class="list-group-item"><strong><?php echo isset($post_count) ? $post_count : '查询失败'; ?></strong>篇文章（<strong><?php echo isset($post_count) ? $drafted : '查询失败'; ?></strong>篇草稿）</li>
              <li class="list-group-item"><strong>6</strong>个分类</li>
              <li class="list-group-item"><strong>5</strong>条评论（<strong>1</strong>条待审核）</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
      </div>
    </div>
  </div>

  <?php $current_page = 'index'; ?>
  <?php include 'inc/siderbar.php'; ?>

  <script src="/static/assets/vendors/jquery/jquery.js"></script>
  <script src="/static/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
</body>
</html>
