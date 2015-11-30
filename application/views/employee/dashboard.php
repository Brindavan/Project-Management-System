
<?php
    //session_start();
    foreach ($total_task as $row) {
        $total_task=$row->total;
    }
    foreach ($total_note as $row) {
        $total_note=$row->total;
    }
    foreach ($total_ticket as $row) {
        $total_ticket = $row->total;
    }
    foreach ($total_project as $row) {
        $total_project=$row->total;
    }
    //echo $this->session->session_data['user_id'];
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
                    <div class="muted pull-left">Note</div>
                    <div class="pull-right"><span class="badge badge-info"><?php echo $total_note;?></span>

                    </div>
                </div>
                <div class="block-content collapse in">
                    <table class="table table-striped">
                        <?php
                            if($note == NULL)
                                echo 'Database Empty';
                            else
                                {?>
                                    <thead>
                            <tr>

                                <th>#</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Project</th>
                            </tr>
                        </thead>
                       <tbody>

                        <?php 
                            $i=1;
                            foreach ($note as $note) {
                            echo '<tr>';
                                echo '<td>'.$i++.'</td>';
                                echo '<td>'.$note->title.'</td>';
                                echo '<td>'.substr($note->body,0,35).'..</td>';
                                echo '<td>'.$note->name.'</td>';
                            echo '</tr>';
                            
                            if($i>3)
                                break;        
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
                    <div class="muted pull-left">Task</div>
                    <div class="pull-right"><span class="badge badge-info"><?php echo $total_task;?></span>

                    </div>
                </div>
                <div class="block-content collapse in">
                    <table class="table table-striped">
                        <?php
                            if($task == NULL)
                                echo 'Database Empty';
                            else
                                {?>
                                    <thead>
                            <tr>

                                <th>#</th>
                                <th>Task</th>
                                <th>Project</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                       <tbody>

                        <?php 
                            $i=1;
                            foreach ($task as $task) {
                            echo '<tr>';
                                echo '<td>'.$i++.'</td>';
                                echo '<td>'.$task->task.'</td>';
                                echo '<td>'.$task->project_name.'</td>';
                                echo '<td>'.$task->status.'</td>';
                            echo '</tr>';
                            if($i>3)
                                break;          
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
    <div class="row-fluid">
        <div class="span12">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Ticket</div>
                    <div class="pull-right"><span class="badge badge-info"><?php echo $total_ticket;?></span></div>
                </div>
                <div class="block-content collapse in">
                    <table class="table table-striped">
                            <?php 
                                $i=1;
                                foreach ($ticket as $row){?>
                                    <div class = "ticket">
                                        <div class = "tickethead">
                                            <tr>
                                                <th>
                                                    <a href="teamleader/ticketDetails/<?php echo $row->id; ?>">
                                                    <h4><?php echo $row->problem;?></h4></a>
                                                    <?php if(strcmp($row->status,"open")==0){ ?>
                                                <div id="open">UnSolved</div>
                                            <?php }else{ ?>
                                                <div id="close" style="color:red;">Solved</div>
                                            <?php } ?>
                                                </th>
                                            </tr>
                                            <div class="clear"></div>

                                            
                                        </div>
                                     
                                    </div>
                                <?php 
                                    $i++;
                                    if($i>3)
                                        break;  
                            } ?>
                    </table>
                </div>
            </div>
            <!-- /block -->
        </div>
    </div>
</div>
           