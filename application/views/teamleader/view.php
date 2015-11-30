
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
										echo '<a href="detailsProject/'.$row->id.'" title="Details" class="icon-5 info-tooltip"></a>
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
	
	case 'employee_list':
		$name = "Employee";
		//echo $name;
		?>

		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h4>Employee List</h4>
            	All your Employees.
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
			        <div class="muted pull-left">Employee</div>
               </div>
			        <div class="block-content collapse in">
			        	<form id="mainform" action="">
			        		<?php if($employee!=NULL):?>
							<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								<tr>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Name</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Address</a></th>
									<th class="table-header-repeat line-left"><a href="">Phone</a></th>
									<th class="table-header-options line-left"><a href="">Options</a></th>
								</tr>
								
								<?php 
									foreach ($employee as $row) {
										echo '<tr>';
										echo '<td>'.$row->name.'</td>';
										echo '<td>'.$row->address.'</td>';
										echo '<td>'.$row->phone.'</td>';
										echo '<td class="options-width">';
										echo '<a href="details'.$name.'/'.$row->id.'" title="Details" class="icon-5 info-tooltip"></a>
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

	case 'search_employee':
		$name = "Employee";
		?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h4>Employee</h4>
            All Employee List
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
			        		<?php if($employee!=NULL):?>
							<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								<tr>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Name</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Address</a></th>
									<th class="table-header-repeat line-left"><a href="">Phone</a></th>
									<th class="table-header-options line-left"><a href="">Options</a></th>
								</tr>
								
								<?php 
									foreach ($employee as $row) {
										echo '<tr>';
										
										echo '<td>'.$row->name.'</td>';
										echo '<td>'.$row->address.'</td>';
										echo '<td>'.$row->phone.'</td>';
										echo '<td class="options-width">';
										echo '<a href="details'.$name.'/'.$row->id.'" title="Details" class="icon-5 info-tooltip"></a>
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
									<th class="table-header-repeat line-left"><a href="">Status</a></th>
									<th class="table-header-repeat line-left"><a href="">Assign to</a></th>
									<th class="table-header-options line-left"><a href="">Options</a></th>
								</tr>
								
								<?php 
									foreach ($task as $row) {
										echo '<tr>';
										echo '<td>'.$row->task.'</td>';
										echo '<td>'.$row->project.'</td>';
										echo '<td>'.$row->status.'</td>';
										echo '<td>'.$row->assign.'</td>';
										echo '<td class="options-width">';
										echo '<a href="editTask/'.$row->id.'" title="Edit" class="icon-1 info-tooltip"></a>
											<a href="deleteTask/'.$row->id.'" title="Delete" class="icon-2 info-tooltip"></a>
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
									<th class="table-header-repeat line-left"><a href="">Issuer</a></th>
									<th class="table-header-options line-left"><a href="">Options</a></th>

								</tr>
								
								<?php 
									foreach ($ticket as $row) {
										echo '<tr>';
										echo '<td>'.$row->problem.'</td>';
										echo '<td>'.$row->project.'</td>';
										echo '<td>'.$row->issuer.'</td>';
										echo '<td class="options-width">';
										echo '<a href="detailsTicket/'.$row->id.'" title="Details" class="icon-5 info-tooltip"></a>
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
								</tr>
								
								<?php 
									foreach ($note as $row) {
										echo '<tr>';
										echo '<td>'.$row->title.'</td>';
										echo '<td>'.$row->body.'</td>';
										echo '<td>'.$row->name.'</td>';
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
	
	case 'assign_employee':?>
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
			        <div class="muted pull-left">Assign Employee to Project</div>
               </div>
			        <div class="block-content collapse in">
			        	<form id="mainform" action="">
			        		<?php if($project_employee!=NULL):?>
							<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								<tr>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Project</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Employee</a></th>
									<th class="table-header-repeat line-left"><a href="">Task</a></th>
									<th class="table-header-options line-left"><a href="">Options</a></th>

								</tr>
								
								<?php 
									foreach ($project_employee as $row) {
										echo '<tr>';
										echo '<td>'.$row->project_name.'</td>';
										echo '<td>'.$row->employee_name.'</td>';
										echo '<td>'.$row->task.'</td>';
										echo '<td class="options-width">';
										echo '<a href="editNote/'.$row->project_id.'" title="Edit" class="icon-1 info-tooltip"></a>
											<a href="deleteNote/'.$row->project_id.'" title="Delete" class="icon-2 info-tooltip"></a>
											<a href="detailsNote/'.$row->project_id.'" title="Details" class="icon-5 info-tooltip"></a>
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

	case 'employee_to_project':?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h4>Assing Employee to Project</h4>
            
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
			        <div class="muted pull-left">Assign Employee to Project</div>
               </div>
			        <div class="block-content collapse in">
			        	<div id="mainform">
			        		<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								<tr>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Project</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Employee</a></th>
									<th class="table-header-options line-left"><a href="">Options</a></th>
								</tr>
								
								<?php
									//var_dump($employee_project); 
									foreach ($employee_project as $row) {
										echo '<tr>';
										echo '<td>'.$row->project_name.'</td>';
										echo '<td>'.$row->employee_name.'</td>';
										echo '<td class="options-width">';
										echo '<a href="deleteEmployeeProject/'.$row->project_id.'" title="Details" class="icon-2 info-tooltip"></a>
										</td>';
										echo "</tr>";
			                                                               
									}
								?>
							</table>
						</div>
				<div class="span4">
                	<?php
                		$atrributes = array(
							'name'		=>'employee_project'
						);
						echo form_open('teamleader/add_employee_project',$atrributes);
							echo '<table border="0" cellpadding="0" cellspacing="0">';
								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
										$option = array();
										$option['name'] = "Select Project";
										if(empty($project)!=1){							
											foreach ($project as $row) {
												//echo $row->name;
												$option[$row->name] 		= $row->name;	
											}
											echo form_dropdown('project',$option, 'name');
										}
										else{
											echo 'You add can <strong>Project</strong> first<br><br>';
										}
									echo '</td>';
					            	
					            	echo '<td style="padding:10px">';
										$option = array();
										$option['name'] = "Select Employee";
										if(empty($employee)!=1){							
											foreach ($employee as $row) {
												//echo $row->name;
												$option[$row->name] 		= $row->name;	
											}
											echo form_dropdown('employee',$option, 'name');
										}
										else{
											echo 'You add can <strong>Employee</strong> first<br><br>';
										}
															
						            echo '</td>';
								echo '</tr>';

								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
										$data = array(
												'type'		=> 'submit',
												'name'		=> 'Submit',
												'value'		=> 'Assign',								
								              	'class'		=> 'form-submit'
								            );
							            if(empty($employee)!=1 && empty($project)!=1)
								            echo form_submit($data);
					            	echo '</td>';
								echo '</tr>';
							echo '</table>'; 
							echo form_close();
		           	?>
                </div>
								
							
			       	</div>	
			</div>
		</div><?php
	break;

	case 'employee_details':?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h4>Assing Employee to Project</h4>
            
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
			        <div class="muted pull-left">Assign Employee to Project</div>
               </div>
			        <div class="block-content collapse in">
			        	<div id="mainform">
			        		<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								<tr>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Project</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Start Date</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Finishing Date</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">URL</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Completeion</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Status</a></th>
								</tr>
								<?php
									//var_dump($employee_project); 
									foreach ($project as $row) {
										echo '<tr>';
										echo '<td>'.$row->name.'</td>';
										echo '<td>'.$row->start_date.'</td>';
										echo '<td>'.$row->finish_date.'</td>';
										echo '<td>'.$row->url.'</td>';
										echo '<td>'.$row->completion.'</td>';
										echo '<td>'.$row->status.'</td>';
										echo "</tr>";
			                                                               
									}
								?>
							</table>

							<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								<tr>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Task</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Status</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Project</a></th>
								</tr>
								<?php
									//var_dump($employee_project); 
									foreach ($task as $row) {
										echo '<tr>';
										echo '<td>'.$row->task.'</td>';
										echo '<td>'.$row->status.'</td>';
										echo '<td>'.$row->name.'</td>';
									}
								?>
							</table>


							<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								<tr>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Problem</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Status</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Project</a></th>
								</tr>
								<?php
									//var_dump($employee_project); 
									foreach ($ticket as $row) {
										echo '<tr>';
										echo '<td>'.$row->problem.'</td>';
										echo '<td>'.$row->status.'</td>';
										echo '<td>'.$row->name.'</td>';
									}
								?>
							</table>
						</div>
				</div>	
			</div>
		</div><?php
	break;

	case 'Project Report':?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h4>Project Report</h4>
            
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
			        <div class="muted pull-left">Project Report</div>
               </div>
			        <div class="block-content collapse in">
			        	<div id="mainform">
			        		<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								<tr>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Project</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Start Date</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Finishing Date</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">URL</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Completeion</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Status</a></th>
								</tr>
								<?php
									//var_dump($employee_project); 
									foreach ($project as $row) {
										$complete = $row->completion;
										echo '<tr>';
										echo '<td>'.$row->name.'</td>';
										echo '<td>'.$row->start_date.'</td>';
										echo '<td>'.$row->finish_date.'</td>';
										echo '<td>'.$row->url.'</td>';
										echo '<td>'.$row->completion.'</td>';
										echo '<td>'.$row->status.'</td>';
										echo "</tr>";
			                                                               
									}
								?>
							</table>
							<script type="text/javascript">
						      google.load("visualization", "1", {packages:["corechart"]});
						      google.setOnLoadCallback(drawChart);
						      function drawChart() {
						        var project = google.visualization.arrayToDataTable([
						          ['label Title', 'Label value'],
								  <?php
								  	$title = array("Completed","Remaining");
								  	$status = array($complete,100-$complete);
									for($i=0;$i<2;$i++){?>
									['<?php echo $title[$i] ?>',<?php echo $status[$i] ?>],
									<?php } ?>
						        ]);

						        var options_project = {
						          title: 'Project Report'
						        };

						        var chart = new google.visualization.PieChart(document.getElementById('piechart_project'));

						        chart.draw(project, options_project);
						      }
						    </script>
							<div id="piechart_project" style="width: 900px; height: 500px;  border: 2px solid black;"></div>
							<?php
								$employee_name = array();
								foreach ($employee as $emp) {
									array_push($employee_name, $emp->name);
									//echo $contribution[$i++];
								}
								$count = count($employee_name);
							?>
							<?php
								$i = 0;
								$name = array();
								for($i=0;$i<count($employee_name);$i++){
									array_push($name, array($employee_name[$i],$ongoing[$i],$finished[$i]));
								}
							?>

						    <script type="text/javascript">
						      google.load("visualization", "1.1", {packages:["bar"]});
						      google.setOnLoadCallback(drawChart);
						      function drawChart() {
						        var data = google.visualization.arrayToDataTable([
						          ['Name', 'ongoing', 'Finished'],
						          <?php for($i=0;$i<count($name);$i++){ ?>
													['<?php echo $name[$i][0]?>',<?php echo $name[$i][1]?>,<?php echo $name[$i][2]?>],
													<?php } ?>
						         ]);

						        var options = {
						          chart: {
						            title: 'Individual Report',
						            subtitle: 'Ongoing Vs. Completed',
						          }
						        };

						        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

						        chart.draw(data, options);
						      }
						    </script>
						    <div id="columnchart_material" style="margin-top:5px; width: 900px; height: 500px; border:2px solid black;"></div>
						    <br><br><br>
						    	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								<tr>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Problem</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Issuer</a></th>
									<th class="table-header-repeat line-left minwidth-1"><a href="">Status</a></th>
								</tr>
								<?php
									//var_dump($employee_project); 
									foreach ($ticket as $row) {
										echo '<tr>';
										echo '<td>'.$row->problem.'</td>';
										echo '<td>'.$row->name.'</td>';
										echo '<td>'.$row->status.'</td>';
									}
								?>
							</table>
						</div>
				</div>	
			</div>
		</div><?php
	break;

	case 'edit_task':
		?>
		<div class="span9" id="content">
    		<div class="row-fluid">
        <div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Great</h4>
            You can create task here.
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
		                <div class="muted pull-left">New Task</div>
		               </div>
		            <div class="block-content collapse in">
		                <div class="span4">
		                	<?php
		                		$atrributes = array(
									'name'		=>'login_form'
								);
								echo form_open('teamleader/update_task',$atrributes);

								foreach ($task as $row) {
									$id = $row->id;
									$task = $row->task;
									$project_name = $row->project;
									$employee_name = $row->assign;
								}

								echo '<table border="0" cellpadding="0" cellspacing="0">';
								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									$data = array(
						              	
						              	'rows'		=> '3',
						              	'cols'		=> '80',
						              	'name'        => 'task',
						              	'placeholder' => 'Task',
						              	'value'		=> $task,
						              	'class'		=> 'login-inp',
						              	'required' => 'required',
						              	'style'		=> 'width:auto;'
						            );
						            echo form_textarea($data);
					            echo '</td>';
								echo '</tr>';
								//var_dump($project);
								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									$option = array();
									$option[$project_name] = $project_name;
									foreach ($project as $row) {
										//echo $row->name;
										if($row->name != $project_name)
											$option[$row->name] = $row->name;	
									}
									
									
								echo form_dropdown('project',$option, $project_name);
					            echo '</td>';
								echo '</tr>';

								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									$option = array();
									$option[$employee_name] = $employee_name;
									foreach ($employee as $row) {
										if($row->name != $employee_name)
											$option[$row->name] = $row->name;	
									}
								echo form_dropdown('employee',$option, $employee_name);
					            echo '</td>';
								echo '</tr>';
							
								$data = array(
						          'id'  => $id,
						        );
								echo form_hidden($data);

								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									
					            $data = array(
										'type'		=> 'submit',
										'name'		=> 'Submit',
										'value'		=> 'Update Task',								
						              	'class'		=> 'form-submit',
						              	'style'		=> 'margin-top:2px;',
						            );
						            echo form_submit($data);
					            echo '</td>';
								echo '</tr>';


								echo '</table>'; 
								echo form_close();
		                	?>
		                </div>
		            </div>
		        </div>
		        <!-- /block -->
		    </div>
		</div>
		<?php
	break;
	case 'ticket_details':?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h4>Ticket Details</h4>
            
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
			        <div class="muted pull-left">Ticket Details</div>
               </div>
			        <div class="block-content collapse in">
			        	<div id="mainform">
			        		<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								<tr>
									<th><?php foreach ($ticket as $row) :
										echo $row->problem;
									?></th>
								</tr>
								<tr><th>
									<?php echo 'By:'.$row->issuer;
									endforeach;?>
								</th></tr>
								<?php foreach ($ticket_details as $tic) {
									echo '<tr>';
										echo '<td>';
											echo $tic->solution;
										echo '</td>';
										echo '<td>';
											echo 'By: '.$tic->name;
										echo '</td>';
										
									echo '</tr>';
								}?>
							</table>
						</div>
				</div>	
			</div>
		</div><?php
	break;


	default:
		# code...
		break;
}
?>

	</div>
</div>