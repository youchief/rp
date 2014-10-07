<?php echo $this->Html->css('admin-theme');?>
<header class="navbar navbar-inverse ">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Bella Vita - Privilèges</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Editions <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link(__('List'), array('controller'=>'editions', 'action'=>'index', 'admin'=>true))?></li>
                        <li><?php echo $this->Html->link(__('Add'), array('controller'=>'editions', 'action'=>'add', 'admin'=>true))?></li>
                    </ul>
                </li>
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
                        <li><?php echo $this->Html->link(__('Add'), array('controller'=>'people', 'action'=>'add', 'admin'=>true))?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link(__('List'), array('controller'=>'users', 'action'=>'index', 'admin'=>true))?></li>
                        <li><?php echo $this->Html->link(__('Add'), array('controller'=>'users', 'action'=>'add', 'admin'=>true))?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Actions <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link(__('List'), array('controller'=>'actions', 'action'=>'index', 'admin'=>true))?></li>
                        <li><?php echo $this->Html->link(__('Add'), array('controller'=>'actions', 'action'=>'add', 'admin'=>true))?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Groups <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link(__('List'), array('controller'=>'groups', 'action'=>'index', 'admin'=>true))?></li>
                        <li><?php echo $this->Html->link(__('Add'), array('controller'=>'groups', 'action'=>'add', 'admin'=>true))?></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                
                   <li><?php echo $this->Html->link(__('Logout'), array('controller'=>'users', 'action'=>'logout'))?></li>
            </ul>
        </div><!--/.navbar-collapse -->
    </div>
</header>