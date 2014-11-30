<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="../" class="navbar-brand">
                Budget
            </a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar">
                </span>
                <span class="icon-bar">
                </span>
                <span class="icon-bar">
                </span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/accounts">
                        Accounts
                    </a>
                </li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php echo $data['user']['name']; ?> 
                        <span class="caret">
                        </span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="/members/settings">
                                Settings
                            </a>
                        </li>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="#">
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>