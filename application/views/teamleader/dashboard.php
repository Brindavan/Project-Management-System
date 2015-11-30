<?php 
function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}
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
                <div class="pull-right"><span class="badge badge-warning">3</span>
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
                </div>
                <div class="block-content collapse in">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th>Title</th>
                                <th>Body</th>
                            </tr>
                        </thead>
                       <tbody>
                            <?php 
                                $i=1;
                                foreach ($note as $row) {
                                echo '<tr>';
                                    echo '<td>'.$i++.'</td>';
                                    echo '<td>';
                                    echo custom_echo($row->title,20);
                                    echo '</td>';
                                    echo '<td>';
                                    echo custom_echo($row->body,30);
                                    echo '</td>';                                    
                                echo '</tr>';        
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
                    <div class="pull-right"><span class="badge badge-info">3</span>

                    </div>
                </div>
                <div class="block-content collapse in">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Task</th>
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i=1;
                                foreach ($task as $row) {
                                echo '<tr>';
                                    echo '<td>'.$i++.'</td>';
                                    echo '<td>';
                                    echo custom_echo($row->task,30);
                                    echo '</td>';
                                    echo '<td>';
                                    echo $row->status;
                                    echo '</td>';                                    
                                echo '</tr>';        
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
                </div>
                <div class="block-content collapse in">
                            <?php 
                                foreach ($ticket as $row){?>
                                    <div class = "ticket">
                                        <div class = "tickethead">
                                            <a href="teamleader/ticketDetails/<?php echo $row->id; ?>"><h4><?php echo $row->problem;?></h4></a>
                                            <div class="clear"></div>

                                            <?php if(strcmp($row->status,"open")==0){ ?>
                                                <div id="open">Open</div>
                                            <?php }else{ ?>
                                                <div id="close">Close</div>
                                            <?php } ?>
                                        </div>
                                        <div class="author">
                                             By: <?php echo $row->issuer;?>   
                                        </div>
                                    </div>
                                <?php } ?>
                </div>
            </div>
            <!-- /block -->
        </div>
    </div>
</div>
           