        <div class="container-fluid">
            <div class="row-fluid">
<div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li class="active">
                            <a href="<?php echo base_url('index.php/Login/index');?>"><i class="icon-chevron-right"></i> Dashboard</a>
                        </li>

                        
                            <?php
                                
                                foreach ($sidebar_menu as $key) {
                                  echo '<li>';

                                        $key_without_space = strtolower( str_replace(" ","-",$key));
                                        
                                        echo anchor('teamleader/'.$key_without_space, $key);

                                        
                                        //echo $key;
                                        //$value = 'company/page/'.strtolower($key_without_space);
                                        //echo anchor($value,$key);
                                    echo '</li>';
                                    # code...
                                }
                            ?>
                                <?php
                                   // $value = 'employee/employee-list';
                                    //echo anchor('company/index/'.$value.'', 'Employee List');
                                ?>
                        </li>
                        
                            
                        <li>
                            <?php echo anchor('company/logout','Logout'); ?>
                            
                        </li>
                        
                    </ul>
                </div>
                
                <!--/span-->