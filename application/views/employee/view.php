
<div class="span9" id="content">
    <div class="row-fluid">

<?php
switch ($category) {
	case 'search_project':
	case 'project_list':?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php if($category=='search_project'){?>
            <h4>Project Search</h4>
            Your search is: <?php echo $search;
        	}else if($category=='project_list'){?>
        		<h4>Project List</h4>
            All Your Project.
        	<?php }

        	
            ?>
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
        <div class="row-fluid">
            <div class="block">
    	        <div class="navbar navbar-inner block-header">
			        <div class="muted pull-left">Search</div>
               </div>
			        <div class="block-content collapse in">
			        	<form id="mainform" action="">
			        		<?php if($project!=NULL):?>
							<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								<tr>
									<th class="table-header-repeat line-left"><a href="">Project Name</a></th>
									<th class="table-header-repeat line-left"><a href="">URL</a></th>
									<th class="table-header-repeat line-left"><a href="">Status</a></th>
									<th class="table-header-repeat line-left"><a href="">Completion</a></th>
									<th class="table-header-options line-left"><a href="">Options</a></th>
								</tr>
								
								<?php 
								// && $project['teamleader'] as $team
									foreach ($project as $row) {
										echo '<tr>';
										echo '<td>'.$row->name.'</td>';
										echo '<td>'.$row->url.'</td>';
										echo '<td>'.$row->status.'</td>';
										echo '<td>'.$row->completion.'</td>';
										echo '<td class="options-width">';
										echo '<a href="editProject/'.$row->id.'" title="Edit" class="icon-1 info-tooltip"></a>
											<a href="deleteProject/'.$row->id.'" title="Delete" class="icon-2 info-tooltip"></a>
											<a href="detailsProject/'.$row->id.'" title="Details" class="icon-5 info-tooltip"></a>
										</td>';
										echo "</tr>";
										echo "</tr>";
			                                                               
									}
								
								endif;
								?>
								
							</table>
						</form>
			       	</div>	
			</div>
		</div>
	
	<?php break;
	case 'task':?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h4>Task</h4>
            All Task List
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
        <div class="row-fluid">
            <div class="block">
    	        <div class="navbar navbar-inner block-header">
			        <div class="muted pull-left">Task</div>
               </div>
			        <div class="block-content collapse in">
			        	<form id="mainform" action="">
			        		<?php if($task!=NULL):?>
							<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								<tr>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Task</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Project</a></th>
									<th class="table-header-repeat line-left"><a href="">generator</a></th>
									<th class="table-header-repeat line-left"><a href="">Status</a></th>
									<th class="table-header-options line-left"><a href="">Options</a></th>

								</tr>
								
								<?php 
									foreach ($task as $row) {
										echo '<tr>';
										echo '<td>'.$row->task.'</td>';
										echo '<td>'.$row->project_name.'</td>';
										echo '<td>'.$row->teamleader_name.'</td>';
										echo '<td>'.$row->status.'</td>';
										echo '<td class="options-width">';
										echo '<a href="editProject/'.$row->id.'" title="Edit" class="icon-1 info-tooltip"></a>
											<a href="deleteProject/'.$row->id.'" title="Delete" class="icon-2 info-tooltip"></a>
											<a href="detailsProject/'.$row->id.'" title="Details" class="icon-5 info-tooltip"></a>
										</td>';
										echo "</tr>";
			                                                               
									}
								
								endif;
								?>
								
							</table>
						</form>
			       	</div>	
			</div>
		</div><?php
	break;
	case 'ticket':?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h4>Ticket</h4>
            All Ticket List
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
        <div class="row-fluid">
            <div class="block">
    	        <div class="navbar navbar-inner block-header">
			        <div class="muted pull-left">Ticket</div>
               </div>
			        <div class="block-content collapse in">
			        	<form id="mainform" action="">
			        		<?php if($ticket!=NULL):?>
							<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								<tr>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Problem</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Project</a></th>
									<th class="table-header-repeat line-left"><a href="">Status</a></th>
									<th class="table-header-options line-left"><a href="">Options</a></th>

								</tr>
								
								<?php 
									foreach ($ticket as $row) {
										echo '<tr>';
										echo '<td>'.$row->problem.'</td>';
										echo '<td>'.$row->project.'</td>';
										echo '<td>'.$row->status.'</td>';
										echo '<td class="options-width">';
										echo '<a href="deleteTicket/'.$row->id.'" title="Delete" class="icon-2 info-tooltip"></a>
											<a href="detailsTicket/'.$row->id.'" title="Details" class="icon-5 info-tooltip"></a>
										</td>';
										echo "</tr>";
			                                                               
									}
								
								endif;
								?>
								
							</table>
						</form>
			       	</div>	
			</div>
		</div><?php
	break;
	case 'note':?>

		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h4>Note</h4>
            All Note List
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
        <div class="row-fluid">
            <div class="block">
    	        <div class="navbar navbar-inner block-header">
			        <div class="muted pull-left">Ticket</div>
               </div>
			        <div class="block-content collapse in">
			        	<form id="mainform" action="">
			        		<?php if($note!=NULL):?>
							<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								<tr>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Title</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Note</a></th>
									<th class="table-header-repeat line-left"><a href="">Project</a></th>
									<th class="table-header-options line-left"><a href="">Options</a></th>

								</tr>
								
								<?php 
									foreach ($note as $row) {
										echo '<tr>';
										echo '<td>'.$row->title.'</td>';
										echo '<td>'.$row->body.'</td>';
										echo '<td>'.$row->name.'</td>';
										echo '<td class="options-width">';
										echo '<a href="editNote/'.$row->id.'" title="Edit" class="icon-1 info-tooltip"></a>
											<a href="deleteNote/'.$row->id.'" title="Delete" class="icon-2 info-tooltip"></a>
											<a href="detailsNote/'.$row->id.'" title="Details" class="icon-5 info-tooltip"></a>
										</td>';
										echo "</tr>";
			                                                               
									}
								
								endif;
								?>
								
							</table>
						</form>
			       	</div>	
			</div>
		</div><?php
	break;
	case 'profile':?>

		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h4>Profile</h4>
            Your Profile
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
        <div class="row-fluid">
            <div class="block">
    	        <div class="navbar navbar-inner block-header">
			        <div class="muted pull-left">Profile</div>
               </div>
			        <div class="block-content collapse in">
			        	<?php
                        $atrributes = array(
                                        'name'      =>'profile'
                                    );
                        echo form_open('employee/profile',$atrributes).'<br>'; 
                        $data = array(
                                'type'      => 'text',
                                'name'        => 'Phone',
                                'placeholder' => 'Phone',
                                'class'     => 'inp-form',
                                'required' => 'required'

                            );
                        echo form_input($data).'<br>';
                         $data = array(
                                'type'      => 'text',
                                'name'        => 'Address',
                                'placeholder' => 'Address',
                                'class'     => 'inp-form',
                                'required' => 'required'

                            );
                        echo form_input($data).'<br>';
                        echo 'Your Projects:'?>
                        	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								<tr>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Title</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Note</a></th>
									<th class="table-header-repeat line-left"><a href="">Project</a></th>
									

								</tr>
								
								<?php 
									foreach ($project as $row) {
										echo '<tr>';
										echo '<td>'.$row->name.'</td>';
										echo '<td>'.$row->name.'</td>';
										echo '<td>'.$row->name.'</td>';
										echo "</tr>";
			                                                               
									}
								
								?>
								
							</table>
                        <?php
							
                       echo form_close();
                    ?>
			       	</div>	
			</div>
		</div><?php
	break;
	default:
		
	break;
}
?>

	</div>
</div>