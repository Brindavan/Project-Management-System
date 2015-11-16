<?php ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Home Page</title>
        <!-- Bootstrap -->
        <link rel="icon" href="<?php echo base_url();?>application/assets/images/logo/favicon.png" type="logo/image/gif">
        
        <link href="<?php echo base_url();?>application/assets/css/company/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo base_url();?>application/assets/css/employee/styles.css" rel="stylesheet" media="screen">
        
        <script src="<?php echo base_url();?>application/assets/js/company/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url();?>application/assets/js/company/jquery-1.9.1.min.js"></script>
        <script src="<?php echo base_url();?>application/assets/js/company/bootstrap.min.js"></script>
        
        <script>
        jQuery.noConflict();

$(document).ready(function(){
    $('.datepicker').datepicker();
    });
</script>

    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <span class="brand" href="#">WELCOME</span>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> 
                                    <i class="icon-user"></i> <?php echo strtoupper($this->session->session_data['username']);?> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="login.html">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="active">
                                <a href="<?php echo base_url('index.php/Login/user/index.php');?>">Dashboard</a>
                            </li>
                           
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Project <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                     <li>
                                        <?php
                                            $value = 'project_list';
                                            echo anchor('employee/'.$value.'', 'Project List');
                                        ?>
                                    </li>
                                    <li class="divider"></li>
                                     <li>
                                        <?php
                                            $value = 'project_search';
                                            echo anchor('employee/'.$value.'', 'Search');
                                        ?>
                                    </li>
                                 
                                </ul>
                            </li>
                           
                             <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Task <b class="caret"></b></a>
                                <ul class="dropdown-menu" id="menu1">
                                     <li>
                                        <?php
                                            $value = 'view_task';
                                            echo anchor('employee/'.$value.'', 'View Task');
                                        ?>
                                </li>
                                  
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Ticket <b class="caret"></b></a>
                                <ul class="dropdown-menu" id="menu1">
                                     <li>
                                        <?php
                                            $value = 'view_ticket';
                                            echo anchor('employee/'.$value.'', 'View Ticket');
                                        ?>
                                </li>
                                  
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Note <b class="caret"></b></a>
                                <ul class="dropdown-menu" id="menu1">
                                     <li>
                                        <?php
                                            $value = 'view_note';
                                            echo anchor('employee/'.$value.'', 'View Note');
                                        ?>
                                    </li>
                                    </ul>
                                <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Settings <b class="caret"></b></a>
                                <ul class="dropdown-menu" id="menu1">
                                    <li>
                                        <?php
                                            $value = 'change_password';
                                            echo anchor('employee/'.$value.'', 'Change Password');
                                        ?>
                                    </li>

                                    <li>
                                        <?php
                                            $value = 'profile';
                                            echo anchor('employee/'.$value.'', 'Profile');
                                        ?>
                                    </li>
                                  
                                </ul>
                            </li>

                            
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
