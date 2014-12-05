<?php echo $this->Html->css('admin-theme');?>

<header class="navbar navbar-inverse ">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Bella vita Vos offres </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
               
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Coupons <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link(__('List'), array('controller'=>'coupons', 'action'=>'index', 'admin'=>true))?></li>
                        <li><?php echo $this->Html->link(__('Add'), array('controller'=>'coupons', 'action'=>'add', 'admin'=>true))?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">People <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link(__('List'), array('controller'=>'people', 'action'=>'index', 'admin'=>true))?></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                
                   <li><?php echo $this->Html->link(__('Logout'), array('controller'=>'users', 'action'=>'logout','admin'=>false))?></li>
            </ul>
        </div><!--/.navbar-collapse -->
    </div>
</header>