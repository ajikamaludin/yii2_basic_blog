<?php


use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= '/'.Yii::$app->user->identity->foto_file ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= Yii::$app->user->identity->nama ?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class = "<?= strpos(Url::to(), 'dashboard') ? 'active' : '' ?>">
          <a href="<?= Url::to(['/admin/dashboard']) ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class = "<?= strpos(Url::to(), 'post') ? 'active' : '' ?>">
          <a href="<?= Url::to(['/admin/post']) ?>">
            <i class="fa fa-file-text-o"></i> <span>Posts</span>
          </a>
        </li>

        <li class = "<?= strpos(Url::to(), 'tag') ? 'active' : '' ?>">
          <a href="<?= Url::to(['/admin/tag']) ?>">
            <i class="fa fa-tag"></i> <span>Tags</span>
          </a>
        </li>

        <li class = "<?= strpos(Url::to(), 'project') ? 'active' : '' ?>">
          <a href="<?= Url::to(['/admin/project']) ?>">
            <i class="fa fa-unlock"></i> <span>Projects</span>
          </a>
        </li>

        <li class = "<?= strpos(Url::to(), 'user') ? 'active' : '' ?>">
          <a href="<?= Url::to(['/admin/user']) ?>">
            <i class="fa fa-user"></i> <span>Profiles</span>
            <!-- jangan lupa upload cv -->
          </a>
        </li>

        <li class = "<?= strpos(Url::to(), 'setting') ? 'active' : '' ?>">
          <a href="<?= Url::to(['/admin/setting']) ?>">
            <i class="fa fa-gear"></i> <span>Setting</span>
            <!-- jangan lupa upload cv -->
          </a>
        </li>

        <li class = "">
          <a href="<?= Url::to(['/admin/user/logout']) ?>">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>