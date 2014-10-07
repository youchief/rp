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
                <li><?php echo $this->Html->link(__('Coupons'), array('controller'=>'coupons', 'action'=>'part_index'))?></li>    
                <li><?php echo $this->Html->link(__('Logout'), array('controller'=>'users', 'action'=>'logout'))?></li>    
             </ul>
              
        </div><!--/.navbar-collapse -->
    </div>
</header>