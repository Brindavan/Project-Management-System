
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

	case 'project_details':?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h4>Project Details</h4>
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
			        <div class="muted pull-left">Project Details:<?php ?></div>
               </div>
			        <div class="block-content collapse in">
			        	<form id="mainform" action="">
			        		Team Members and no. of task
			        		<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								<tr>
									<th class="table-header-repeat line-left"><a href="">Team Member</a></th>
									<th class="table-header-repeat line-left"><a href="">No of task</a></th>
									<th class="table-header-repeat line-left"><a href="">Work Percentage</a></th>
									<th class="table-header-repeat line-left"><a href="">Complete Work Percentage</a></th>
									<th class="table-header-repeat line-left"><a href="">Remaing Work Percentage</a></th>
								</tr>
								<?php 
									$total=0;
									for($i=0;$i<count($task);$i++)
										$total+= $task[$i];
								//echo count($task);
								?>

								<?php 
								// && $project['teamleader'] as $team
									foreach ($employee as $index => $row) {
										echo '<tr>';
										if($row->name == $this->session->session_data['username'])
											echo '<td>'.$row->name.' (YOU)</td>';
										else
											echo '<td>'.$row->name.'</td>';
										echo '<td>'.$task[$index].'</td>';
										echo '<td>'.number_format(($task[$index]/$total*100),2,'.','').'%</td>';
										echo '<td>'.number_format(($task_complete[$index]/$task[$index]*100),2,'.','').'%</td>';
										echo '<td>'.number_format((($task[$index]-$task_complete[$index])/$task[$index]*100),2,'.','').'%</td>';
										echo "</tr>";
									}
								
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
			        	<div id="mainform" action="">
			        		<?php if($task!=NULL):
			        		echo form_open('employee/update_task');?>
							<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								<tr>
									<th class="table-header-repeat line-left "><a href="">Option</a></th>
									<th class="table-header-repeat line-left "><a href="">Task</a></th>
									<th class="table-header-repeat line-left "><a href="">Project</a></th>
									<th class="table-header-repeat line-left"><a href="">generator</a></th>
									<th class="table-header-repeat line-left"><a href="">Status</a></th>
								</tr>
								
								<?php 
									foreach ($task as $row) {
										echo '<tr>';
										if($row->status == "complete")
											echo '<td><input type="checkbox" name="tasks[]" value="'.$row->id.'" checked></td>';
										else
											echo '<td><input type="checkbox" name="tasks[]" value="'.$row->id.'" ></td>';
										echo '<td>'.$row->task.'</td>';
										echo '<td>'.$row->project_name.'</td>';
										echo '<td>'.$row->teamleader_name.'</td>';
										echo '<td>'.$row->status.'</td>';
										echo "</tr>";                                
									}
								
								endif;
								?>
							</table>
							<?php 
								
								echo form_submit('submit', 'Update Task');
								echo form_close();
							?>
						</div>
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
										echo '<a href="editTicket/'.$row->id.'" title="Delete" class="icon-1 info-tooltip"></a>
											<a href="deleteTicket/'.$row->id.'" title="Delete" class="icon-2 info-tooltip"></a>';
											if($row->status == "open")
												echo '<a href="changeTicketStatus/'.$row->id.'" title="Close this ticket" class="icon-5 info-tooltip"></a>';
											else if($row->status == "close")
												echo '<a href="changeTicketStatus/'.$row->id.'" title="Open this ticket" class="icon-5 info-tooltip"></a>'; 
										echo '</td>';
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
			        	<div class="profile">
			        		<?php 
			        			foreach ($company as $row) {
			        				$company = $row->name;
			        			}
			        			foreach ($personal as $row) {
			        				$address = $row->address;
			        				$phone = $row->phone;
			        			}
			        			foreach ($total_project as $row) {
			        				$total_project = $row->total;
			        			}
			        			foreach ($total_task as $row) {
			        				$total_task = $row->total;
			        			}
			        			foreach ($complete_task as $row) {
			        				$complete_task = $row->total;
			        			}
			        			$ongoing_task = $total_task - $complete_task;
			        			foreach ($total_ticket as $row) {
			        				$total_ticket = $row->total;
			        			}
			        			foreach ($total_ticket_solved as $row) {
			        				$total_ticket_solved = $row->total;
			        			}
			        			foreach ($note as $row) {
			        				$total_note = $row->total;
			        			}
			        		?>
				        	<table class="table table-striped">
							  	<tr>
							    	<th>Company</th>
							    	<td><?php echo strtoupper($company); ?></td>
							    </tr>
							    <tr>
							    	<th>Name</th>
							    	<td><?php echo strtoupper($this->session->session_data['username']); ?></td>
							    </tr>
							    <tr>
							    	<th>Address</th>
							    	<td><?php echo strtoupper($address); ?></td>
							    </tr>
							    <tr>
							    	<th>Phone</th>
							    	<td><?php echo $phone; ?></td>
							    </tr>
							    <tr>
							    	<th>No. of Project</th>
							    	<td><?php echo $total_project; ?></td>
							    </tr>
							    <tr>
							    	<th>Project(s)</th>
							    	<td><?php foreach ($project as $row) {
							    		echo $row->name.',';
							    	}?></td>
							    </tr>
							    <tr>
							    	<th>No. of Task</th>
							    	<td><?php echo $total_task; ?></td>
							    </tr>
							    <tr>
							    	<th>No. of Task(Complete)</th>
							    	<td><?php echo $complete_task; ?></td>
							    </tr>
							    <tr>
							    	<th>No. of Task(Remaning)</th>
							    	<td><?php echo $ongoing_task; ?></td>
							    </tr>
							    <tr>
							    	<th>Team Leader(s)</th>
							    	<td><?php foreach ($teamleader as $row) {
							    		echo $row->name.',';
							    	}?></td>
							    </tr>
							    <tr>
							    	<th>Ticket Generated</th>
							    	<td><?php echo $total_ticket; ?></td>
							    </tr>
							    <tr>
							    	<th>Ticket Solved</th>
							    	<td><?php echo $total_ticket_solved; ?></td>
							    </tr>
							    <tr>
							    	<th>Total Note Received</th>
							    	<td><?php echo $total_note; ?></td>
							    </tr>
							</table>
						</div>
			       	</div>	
			</div>
		</div><?php
	break;
	
	case 'view_ticket':?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h4>Ticket</h4>
            All Tickets Excepts Yours'
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
			        	<div id="mainform" action="">
			        		<?php if($ticket!=NULL): ?>
							<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								<tr>
									<th class="table-header-repeat line-left "><a href="">Probelm</a></th>
									<th class="table-header-repeat line-left "><a href="">Issuer</a></th>
									<th class="table-header-repeat line-left "><a href="">Project</a></th>
									<th class="table-header-repeat line-left"><a href="">Option</a></th>
								</tr>
								
								<?php 
									foreach ($ticket as $row) {
										echo '<tr>';
										echo '<td>'.$row->problem.'</td>';
										echo '<td>'.$row->name.'</td>';
										echo '<td>'.$row->project.'</td>';
										echo '<td class="options-width">';
										echo '<a href="detailsOtherTicket/'.$row->id.'" title="Details" class="icon-5 info-tooltip"></a></td>';
										echo "</tr>";                                
									}
								
								endif;
								?>
							</table>
						</div>
			       	</div>	
			</div>
		</div><?php
	break;


	case 'details_ticket_others':?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h4>Ticket</h4>
            All Tickets Excepts Yours'
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
			        	<div id="mainform" action="">
							<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								<tr>
									<th class="table-header-repeat line-left "><a href="">Probelm</a></th>
									<th class="table-header-repeat line-left "><a href="">Issuer</a></th>
									<th class="table-header-repeat line-left "><a href="">status</a></th>
								</tr>
								
								<?php 
									foreach ($ticket as $row) {
										$id = $row->id;
										echo '<tr>';
										echo '<td>'.$row->problem.'</td>';
										echo '<td>'.$row->name.'</td>';
										echo '<td>'.$row->status.'</td>';
										echo "</tr>";                                
									}
								?>
							</table>
							<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								<?php 
									foreach ($ticket_solution as $row) :?> 
										<tr>
											<th>Solver: <?php echo $row->name; ?><br><?php echo anchor('employee/editComment/'.$id,'edit'); ?></th><br>

										</tr>
										<tr>
											<td>Solution: <?php echo $row->solution; ?></td>
										</tr>
									<?php endforeach; ?>
								</table>
									<div class="span4">
		                				<?php if($comment =="enable"): 
				                			$atrributes = array(
												'name'		=>'login_form',
											);
											echo form_open('employee/add_comment',$atrributes);
											echo form_hidden('id', $id);
											echo '<tr>';
											echo '<th></th>';
											echo '<td>';
											$data = array(
												'rows'			=> '5',
								              	'cols'			=> '80',
								              	'name'        	=> 'solution',
								              	'placeholder' 	=> 'Your Solution',
								              	'class'			=> 'login-inp',
								              	'required'	 	=> 'required',
								              	'style'			=> 'width:auto;'
								            );
								            echo form_textarea($data);
								            echo '</td>';
											echo '</tr>';

											echo '<th></th>';
											echo '<td>';
										    $data = array(
													'type'		=> 'submit',
													'name'		=> 'Submit',
													'value'		=> 'Create',								
									              	'class'		=> 'form-submit',
									              	'style'		=> 'margin-top:2px;',
									            );
									            echo form_submit($data);
								            echo '</td>';
											echo '</tr>';

											echo form_close();
							           	?>
				                	</div>
										<?php endif; ?>
							</table>
						</div>
			       	</div>	
			</div>
		</div><?php
	break;

	case 'edit_comment':?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h4>Ticket</h4>
            All Tickets Excepts Yours'
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
			        	<div id="mainform" action="">
							<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								<tr>
									<th class="table-header-repeat line-left "><a href="">Probelm</a></th>
									<th class="table-header-repeat line-left "><a href="">Issuer</a></th>
									<th class="table-header-repeat line-left "><a href="">status</a></th>
								</tr>
								
								<?php 
									foreach ($ticket as $row) {
										$id = $row->id;
										echo '<tr>';
										echo '<td>'.$row->problem.'</td>';
										echo '<td>'.$row->name.'</td>';
										echo '<td>'.$row->status.'</td>';
										echo "</tr>";                                
									}
								?>
							</table>
							<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
										<tr>
											<th>Solution</th><br>

										</tr>
										<tr>
											<td>
											<?php 
													echo form_open('employee/updateComment','Updateform');
													//echo '<td>';
													foreach ($comment as $row) {
														$solution = $row->solution;
													}
													$data = array(
														'rows'			=> '5',
										              	'cols'			=> '80',
										              	'name'        	=> 'solution',
										              	'value'			=> $solution,
										              	'placeholder' 	=> 'Your Solution',
										              	'class'			=> 'login-inp',
										              	'required'	 	=> 'required',
										              	'style'			=> 'width:auto;'
										            );
										            echo form_textarea($data);
										            echo '<br>';
													 $data = array(
													'type'		=> 'submit',
													'name'		=> 'Submit',
													'value'		=> 'Update',								
									              	'class'		=> 'form-submit',
									              	'style'		=> 'margin-top:2px;',
									            );
									            echo form_submit($data);	
													echo form_close();
											?></td>
										</tr>
									
								</table>
						
						</div>
			       	</div>	
			</div>
		</div><?php
	break;


	case 'edit_ticket':?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h4>Ticket</h4>
            You can edit your ticket.
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
			        	<div id="mainform" action="">
							<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
								   <div class="span4">
		                	<?php
		                		foreach ($ticket as $row) {
		                			$ticket_id = $row->id;
		                			$project_id = $row->project_id;
		                			$project_name = $row->project;
		                			$problem = $row->problem;
		                			$status = $row->status;
		                		}
		                		//var_dump($project);
		                		$atrributes = array(
									'name'		=>'login_form'
								);
								echo form_open('employee/update_ticket',$atrributes);
								echo form_hidden('ticket_id', $ticket_id);								
								echo '<table border="0" cellpadding="0" cellspacing="0">';
								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									$data = array(
										'rows'			=> '5',
						              	'cols'			=> '80',
						              	'name'        	=> 'problem',
						              	'value'			=> $problem,
						              	'placeholder' 	=> 'Your Problem',
						              	'class'			=> 'login-inp',
						              	'required'	 	=> 'required',
						              	'style'			=> 'width:auto;'
						            );
						            echo form_textarea($data);
					            echo '</td>';
								echo '</tr>';

								
								echo '<tr>';
								echo '<th></th>';
								echo '<td>';
								$option = array();
								$option[$project_name] = $project_name;
								foreach ($project as $row) {
									if($row->id != $project_id)
										$option[$row->name] 		= $row->name;	
								}
								
									
								echo form_dropdown('project',$option, $project_name);
					            echo '</td>';
								echo '</tr>';
			    
							    echo '<tr>';
								echo '<th></th>';
								echo '<td>';
							    $data = array(
										'type'		=> 'submit',
										'name'		=> 'Submit',
										'value'		=> 'Update Ticket',								
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
							</table>
							
						</div>
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