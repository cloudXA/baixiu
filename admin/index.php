<?php 
    header("Content-type:text/html;charset=utf-8"); 
    require '../functions.php';
    // 后台页面
    // 启动会话
    session_start();
    // 访问控制

    if (empty($_SESSION['current_logged_in_user_id'])) {
      // 代表没有登陆过
      // 跳转到登录页面
      header('Location: /admin/login.php');
      exit;
    }

    // 文章数
    $post_count = xiu_query('select count(1) from posts')[0][0];
    // 草稿数
    $drafted_count = xiu_query('select count(1) from posts where status = \'drafted\'')[0][0];
    // 分类数组
    $category_count = xiu_query('select count(1) from categories')[0][0];
    // 查询评论总数
    $comment_count = xiu_query('select count(1) from comments')[0][0];
    // 查询审核评论总数
    $held_count = xiu_query('select count(1) from comments where status = \'held\'')[0][0];
 
    


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
              <li class="list-group-item"><strong><?php echo $post_count ?></strong>篇文章（<strong><?php echo $drafted_count ?></strong>篇草稿）</li>
              <li class="list-group-item"><strong><?php echo $category_count ?></strong>个分类</li>
              <li class="list-group-item"><strong><?php echo $comment_count ?></strong>条评论（<strong><?php echo $held_count ?></strong>条待审核）</li>
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
