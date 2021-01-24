<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php">Delio</a>
</div>
<ul class="nav navbar-top-links navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" id="userdrop" data-toggle="dropdown" href="#">
            <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-messages">
            <li>
                <a href="#">
                    <div>
                        <strong>John Smith</strong>
                        <span class="pull-right text-muted">
                            <em>Yesterday</em>
                        </span>
                    </div>
                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a class="text-center" href="#">
                    <strong>Read All Messages</strong>
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        </ul>
        <!-- /.dropdown-messages -->
    </li>
    </li>
    <!-- /.dropdown -->
    <li class="dropdown">
        <a class="dropdown-toggle" id="userdrop" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw icon"></i>  <i class="fa fa-caret-down icon1"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php echo ucfirst($username); ?></a>
            </li>
            <li class="divider"></li>
            <li><a href="inc/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>