<?php
/**
 * 评论管理
 */

// 载入脚本
// ========================================

require '../functions.php';

// 访问控制
// ========================================

// 获取登录用户信息
xiu_get_current_user();

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Comments &laquo; Admin</title>
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
      <div class="page-title">
        <h1>所有评论</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong> 发生XXX错误
      </div> -->
      <div class="page-action">
        <!-- show when multiple checked -->
        <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
        <ul class="pagination pagination-sm pull-right"></ul>
      </div>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center" width="40"><input type="checkbox"></th>
            <th>作者</th>
            <th width="500">评论</th>
            <th>评论在</th>
            <th>提交于</th>
            <th>状态</th>
            <th class="text-center" width="140">操作</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>

  <?php $current_page = 'comments'; ?>
  <?php include 'inc/sidebar.php'; ?>

  <script src="/static/assets/vendors/jquery/jquery.js"></script>
  <script src="/static/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <!-- 载入模板引擎库 -->
  <script src="/static/assets/vendors/jsrender/jsrender.js"></script>
  <!-- 载入具有分页结果的模板 -->
  <script src="/static/assets/vendors/twbs-pagination/jquery.twbsPagination.js"></script>
  <!-- 套模板 -->
  <script id="comment_tmpl" type="text/x-jsrender">
      {{if success}}
      {{for data}}
      <tr class="{{: status === 'held' ? 'warning' : status === 'rejected' ? 'danger' : ''}}" data-id="{{: id }}">
        <td class="text-center"><input type="checkbox"></td>
        <td>{{: author }}</td>
        <td>{{: content }}</td>
        <td>{{: post_title }}》</td>
        <td>{{: created}}</td>
        <td>{{: status === 'held' ? '待审' : status === 'rejected' ? '拒绝' : '准许'}}</td>
        <td class="text-center">
          {{if status === 'held'}}
          <a href="javascript:;" class="btn btn-info btn-xs">批准</a>
          <a href="javascript:;" class="btn btn-info btn-xs">拒绝</a>
          {{/if}}
          <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
        </td>
      </tr>
      {{/for}}
      {{else}}
      <tr>
        <td colspan="7">{{: message}}</td>
      </tr>
      {{/if}}
  </script>
  <!-- 添加了脚本 -->
  <script>
    $(function () {
      var $alert = $('.alert')
      var $tbody = $('tbody');
      var $tmpl = $('#comment_tmpl');
      var $pagination = $('.pagination');
      var size = 30;

      // 页面加载完成过后，发送异步请求获取评论数据
      $.get('/admin/comment-list.php', {p: 1, s: size},
      function (res) {
        console.log(res)
        console.log(res.total_count,'total');

        // 通过模板引擎渲染数据
        var html = $tmpl.render(res);

        // 设置到页面中
        $tbody.html(html);
        // 分页组件
        $pagination.twbsPagination({
          totalPages: Math.ceil(res.total_count / size),
          onPageClick: function (event, page) {
            console.log(page);
          }
        })

      })
    })
  
  </script>
  <script>NProgress.done()</script>
</body>
</html>
