<?php
    if(isset($this->session->session_data['user_id'])){
       
?>

<?php
    foreach ($total_employee as $row) {
        $total_employee=$row->total;
    }
    foreach ($total_teamleader as $row) {
        $total_teamleader=$row->total;
    }
    foreach ($total_project as $row) {
        $total_project=$row->total;
    }
    //echo $this->session->sessiondata('user_id');
//var_dump($this->session->session_data);
?>
<div class="span9" id="content">
    <div class="row-fluid">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Welcome</h4>
            You are in your home-page.
        </div>
            <div class="navbar">
                <div class="navbar-inner">
                    <ul class="breadcrumb">
                        <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
                        <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
                        <li class="active">
                            Dashboard
                        </li>
                        <!--
                        <li>
                            <a href="#">Settings</a> <span class="divider">/</span> 
                        </li>
                        <li class="active">Tools</li>
                    -->
                    </ul>
                </div>
            </div>
        </div>

    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Report</div>
                <div class="pull-right"><span class="badge badge-warning"><?php echo $total_project;?></span>
                </div>
            </div>
            <div class="block-content collapse in">
                
                    <?php 
                            if($project == NULL)
                                echo 'Database Empty';
                            else{
                                
                                foreach ($project as $pro) {
                                ?>
                                    <div class="span4">
                                    <h4><?php echo $pro->name ?></h4>
                                    <div class="progress">
                                        <div class="bar" style="width: <?php echo $pro->completion;?>%;"></div>
                                        <div class="progress-bar" style="height:15px; width: 50%;"></div>
                                    </div>
                                    <h5>Completed: <?php echo $pro->completion?>%</h5>
                                    
                                </div>
                                <?php }
                                }
                                
                            
                            ?>
                        
                    
                
            </div>
        </div>
        <!-- /block -->
    </div>
 
    <div class="row-fluid">
        <div class="span6">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Employee</div>
                    <div class="pull-right"><span class="badge badge-info"><?php echo $total_employee;?></span>

                    </div>
                </div>
                <div class="block-content collapse in">
                    <table class="table table-striped">
                        <?php
                            if($employee == NULL)
                                echo 'Database Empty';
                            else
                                {?>
                                    <thead>
                            <tr>

                                <th>#</th>
                                <th>Full Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                       <tbody>

                        <?php 
                            $i=1;
                            foreach ($employee as $emp) {
                            echo '<tr>';
                                echo '<td>'.$i++.'</td>';
                                echo '<td>'.$emp->name.'</td>';
                                echo '<td>'.$emp->address.'</td>';
                                echo '<td>'.$emp->phone.'</td>';
                            echo '</tr>';        
                            }
                        }
                        ?>
                        
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /block -->
        </div>
        <div class="span6">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Team Leader</div>
                    <div class="pull-right"><span class="badge badge-info"><?php echo $total_teamleader;?></span>

                    </div>
                </div>
                <div class="block-content collapse in">
                    <table class="table table-striped">
                        <?php
                            if($teamleader == NULL)
                                echo 'Database Empty';
                            else
                                {?>
                                    <thead>
                            <tr>

                                <th>#</th>
                                <th>Full Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                       <tbody>

                        <?php 
                            $i=1;
                            foreach ($teamleader as $team) {
                            echo '<tr>';
                                echo '<td>'.$i++.'</td>';
                                echo '<td>'.$team->name.'</td>';
                                echo '<td>'.$team->address.'</td>';
                                echo '<td>'.$team->phone.'</td>';
                            echo '</tr>';        
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /block -->
        </div>
    </div>
</div>
<?php
}
else{
        $data['error_message'] = "Please Login First";
        $this->view->load('login/view',$data);
    }
    ?>