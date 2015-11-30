
<div class="span9" id="content">
	<div class="row-fluid">
		<?php
		switch ($category) {
			case 'search_project':
			case 'project_list':?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php 
						if($category=='search_project'){
							$breadcrumb = 'Search Project';
							?>
		            		<h4>Project Search</h4>
		            		Your search is: <?php echo $search;
		        		}
		        		else if($category=='project_list'){
		        			$breadcrumb = 'Project List';
		        			?>
		        			<h4>Project</h4>
		            		All Your Project.
		        	<?php 
		        	} ?>
		        </div>
		    	<div class="navbar">
		        	<div class="navbar-inner">
		                <ul class="breadcrumb">
		                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
		                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
		                    <li class="active">
		                        Dashboard
		                    </li>
		                    <span class="divider">/</span>	
		                    <li class="active"><?php echo $breadcrumb;?></li>
		               
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
													<a href="Projectdetails/'.$row->id.'" title="Details" class="icon-5 info-tooltip"></a>
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
			<?php 
			break;
			case 'employee_list':
			case 'teamleader_list': 
				if($category=="teamleader_list"){
					$breadcrumb = 'TeamLeader List';
					$name = "Teamleader";
				}
				else{
					$breadcrumb = 'Employee List';
					$name = "Employee";
				}
				//echo $name;
				?>

				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php if($category=='employee_list'){?>
		            <h4>Employee List</h4>
		            	All your Employees.
		            <?php
		        	}else if($category=='teamleader_list'){?>
		        		<h4>Team Leader List</h4>
		            All your Teamleaders.
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
		                   	<span class="divider">/</span>	
		                    <li class="active"><?php echo $breadcrumb;?></li>
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
												echo '<a href="edit'.$name.'/'.$row->id.'" title="Edit" class="icon-1 info-tooltip"></a>
													<a href="delete'.$name.'/'.$row->id.'" title="Delete" class="icon-2 info-tooltip"></a>
													<a href="'.$name.'details/'.$row->id.'" title="Details" class="icon-5 info-tooltip"></a>';
												if($category=="employee_list"){
													echo '<a href="upgrade'.$name.'/'.$row->id.'" title="Upgrade to TeamLeader" class="icon-3 info-tooltip"></a>';
												}	
												else if($category == "teamleader_list"){
													echo '<a href="degrade'.$name.'/'.$row->id.'" title="Degrade to Employee" class="icon-3 info-tooltip"></a>';
												}											
												
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

			case 'search_employee':
			case 'search_teamleader':
				if($category=="search_teamleader"){
					$breadcrumb = 'search Teamleader';
					$name = "Teamleader";
				}
				else{
					$breadcrumb = 'search Employee';
					$name = "Employee";
				}
				?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<h4>Employee</h4>
		            Your Search Employee.
		        </div>
		    	<div class="navbar">
		        	<div class="navbar-inner">
		                <ul class="breadcrumb">
		                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
		                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
		                    <li class="active">
		                        Dashboard
		                    </li>
		                    <span class="divider">/</span>	
		                    <li class="active"><?php echo $breadcrumb;?></li>
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
												echo $name;		
												echo '<td>'.$row->name.'</td>';
												echo '<td>'.$row->address.'</td>';
												echo '<td>'.$row->phone.'</td>';
												echo '<td class="options-width">';
												echo '<a href="edit'.$name.'/'.$row->id.'" title="Edit" class="icon-1 info-tooltip"></a>
													<a href="delete'.$name.'/'.$row->id.'" title="Delete" class="icon-2 info-tooltip"></a>
													<a href="details'.$name.'/'.$row->id.'" title="Details" class="icon-5 info-tooltip"></a>
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
		                    <span class="divider">/</span>	
		                    <li class="active">Task</li>
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
											<th class="table-header-repeat line-left"><a href="">Assign to</a></th>
										</tr>
										
										<?php 
											foreach ($task as $row) {
												echo '<tr>';
												echo '<td>'.$row->task.'</td>';
												echo '<td>'.$row->project.'</td>';
												echo '<td>'.$row->generator.'</td>';
												echo '<td>'.$row->status.'</td>';
												echo '<td>'.$row->assign.'</td>';
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
		                    <span class="divider">/</span>	
		                    <li class="active">Ticket</li>
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
												echo '<td>'.$row->issuer.'</td>';
												echo '<td>'.$row->project.'</td>';
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
		                     <span class="divider">/</span>	
		                    <li class="active">Note</li>
		                </ul>
		        	</div>
		    	</div>
		        <div class="row-fluid">
		            <div class="block">
		    	        <div class="navbar navbar-inner block-header">
					        <div class="muted pull-left">Note</div>
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
												echo '<td>'.substr($row->body,0,60).'...</td>';
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

			case 'project_report':
				?>
		    	<div class="navbar">
		        	<div class="navbar-inner">
		                <ul class="breadcrumb">
		                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
		                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
		                    <li class="active">
		                        Dashboard
		                    </li>
		                     <span class="divider">/</span>	
		                    <li class="active"><a href = "<?php echo base_url('index.php/company/project_list/');?>" >Project</a></li>
		                    <span class="divider">/</span>	
		                    <li class="active">Report</li>
		                </ul>
		        	</div>
		    	</div>
		        <div class="row-fluid">
		            <div class="block">
		    	        <div class="navbar navbar-inner block-header">
					        <div class="muted pull-left"><?php foreach ($project as $key){ echo strtoupper($key->name);} {
					        	# code...
					        }?></div>
		               </div>
					        <div class="block-content collapse in">
					        	
					        		<?php if($project!=NULL):?>
									<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
										<tr>
											
											<th class="table-header-repeat line-left"><a href="">Status</a></th>
											<th class="table-header-repeat line-left"><a href="">Completion</a></th>
											<th class="table-header-repeat line-left"><a href="">Team Leader</a></th>
										</tr>
										
										<?php 
											foreach ($project as $index => $row) {
												echo '<tr>';
												
												echo '<td>'.$row->status.'</td>';
												echo '<td>'.$row->completion.'</td>';
												echo '<td>'.$teamleader[$index]->name.'</td>';
												echo "</tr>";
											}
										
										endif;
										?>
										
									</table>
									<?php
										$employee_name = array();
										foreach ($employee as $emp) {
											array_push($employee_name, $emp->name);
											//echo $contribution[$i++];
										}
										$count = count($employee_name);
									?>
									<script type="text/javascript">
								      google.load("visualization", "1", {packages:["corechart"]});
								      google.setOnLoadCallback(drawChart);
								      function drawChart() {
								        var project = google.visualization.arrayToDataTable([
								          ['label Title', 'Label value'],
										  <?php
											for($i=0;$i<$count;$i++){?>
											['<?php echo $employee_name[$i] ?>',<?php echo $contribution[$i] ?>],
											<?php } ?>
								        ]);

								        var options_project = {
								          title: 'Report'
								        };

								        var chart = new google.visualization.PieChart(document.getElementById('piechart_project'));

								        chart.draw(project, options_project);
								      }
								    </script>
									<div id="piechart_project" style="width: 900px; height: 500px;  border: 2px solid black;"></div>
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
								    <div id="columnchart_material" style="margin-top:5px; width: 900px; height: 500px;"></div>
						</div>	
					</div>
				</div>
				<?php
			break;

			case 'employee_report':?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<h4>Employee Report</h4>
		            
		        </div>
		    	<div class="navbar">
		        	<div class="navbar-inner">
		                <ul class="breadcrumb">
		                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
		                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
		                    <li class="active">
		                        Dashboard
		                    </li>
		                     <span class="divider">/</span>	
		                    <li class="active"><a href = "<?php echo base_url('index.php/company/employee_list/');?>" >Employee</a></li>
		                    <span class="divider">/</span>	
		                    <li class="active">Report</li>
		                </ul>
		        	</div>
		    	</div>
		        <div class="row-fluid">
		            <div class="block">
		    	        <div class="navbar navbar-inner block-header">
					        <div class="muted pull-left"><?php foreach ($employee as $row) echo strtoupper($row->name);?></div>
		               </div>
					        <div class="block-content collapse in">
					        	
					        		<?php if($project!=NULL):?>
									<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
										<tr>
											<th class="table-header-repeat line-left minwidth-1"><a href="">Project</a></th>
											<th class="table-header-repeat line-left minwidth-1"><a href="">Status</a></th>
											<th class="table-header-repeat line-left"><a href="">URL</a></th>
										</tr>
										
										<?php 
											foreach ($project as $row) {
												echo '<tr>';
												echo '<td>'.$row->name.'</td>';
												echo '<td>'.$row->status.'</td>';
												echo '<td>'.$row->url.'</td>';
												echo "</tr>";
					                                                               
											}
										
										endif;
										?>
										
									</table>
									<?php if($task!=NULL):?>
									<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
										<tr>
											<th class="table-header-repeat line-left minwidth-1"><a href="">Task</a></th>
											<th class="table-header-repeat line-left minwidth-1"><a href="">Project</a></th>
											<th class="table-header-repeat line-left"><a href="">Status</a></th>
										</tr>
										
										<?php 
											foreach ($task as $row) {
												echo '<tr>';
												echo '<td>'.$row->task.'</td>';
												echo '<td>'.$row->name.'</td>';
												echo '<td>'.$row->status.'</td>';
												echo "</tr>";
					                                                               
											}
										
										endif;
										?>
										
									</table>

									</table>
									<?php if($ticket!=NULL):?>
									<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
										<tr>
											<th class="table-header-repeat line-left minwidth-1"><a href="">Probelm</a></th>
											<th class="table-header-repeat line-left minwidth-1"><a href="">Project</a></th>
											<th class="table-header-repeat line-left"><a href="">Status</a></th>
										</tr>
										
										<?php 
											foreach ($ticket as $row) {
												echo '<tr>';
												echo '<td>'.substr($row->problem, 0,60).'</td>';
												echo '<td>'.$row->name.'</td>';
												echo '<td>'.$row->status.'</td>';
												echo "</tr>";
					                                                               
											}
										
										endif;
										?>
										
									</table>
								
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
		                        Profile
		                    </li>
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
					        		<table class="table table-striped">
					        			<?php foreach ($personal as $row) {
					        					$address = $row->address;
					        					$phone = $row->phone;
					        				}
					        				foreach ($total_project as $row) {
					        					$total_project = $row->total;
					        				}
					        				foreach ($total_employee as $row) {
					        					$total_employee = $row->total;
					        				}
					        				foreach ($total_teamleader as $row) {
					        					$total_teamleader = $row->total;
					        				}
					        				foreach ($total_ticket as $row) {
					        					$total_ticket = $row->total;
					        				}
					        				foreach ($complete_project as $row) {
					        					$total_complete_project = $row->total;
					        				}
					        				$total_ongoing_project = $total_project - $total_complete_project;
					        				foreach ($total_task as $row) {
					        					$total_task = $row->total;
					        				}
					        				foreach ($total_finished_task as $row) {
					        					$complete_task = $row->total;
					        				}
					        				$ongoing_task = $total_task - $complete_task;
					        				foreach ($total_note as $row) {
					        					$total_note = $row->total;
					        				}
					        			?>
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
									    	<th>No. of Complete Project</th>
									    	<td><?php echo $total_complete_project; ?></td>
									    </tr>
									     <tr>
									    	<th>No. of Ongoing Project</th>
									    	<td><?php echo $total_ongoing_project; ?></td>
									    </tr>
									    <tr>
									    	<th>Project(s)</th>
									    	<td><?php foreach ($project as $row) {echo $row->name.',';}?></td>
									    </tr>
									    <tr>
									    	<th>No. of Employee</th>
									    	<td><?php echo $total_employee; ?></td>
									    </tr>
									    <tr>
									    	<th>No. of Teamleader</th>
									    	<td><?php echo $total_teamleader; ?></td>
									    </tr>
									    <tr>
									    	<th>No. of Ticket</th>
									    	<td><?php echo $total_ticket; ?></td>
									    </tr>
									    <tr>
									    	<th>No. of Note</th>
									    	<td><?php echo $total_note; ?></td>
									    </tr>
									    <tr>
									    	<th>Total Task(Remaning)</th>
									    	<td><?php echo $total_task; ?></td>
									    </tr>
									    <tr>
									    	<th>Total Complete Task</th>
									    	<td><?php echo $complete_task; ?></td>
									    </tr>
									    <tr>
									    	<th>Total Ongoing Task</th>
									    	<td><?php echo $ongoing_task; ?></td>
									    </tr>
									    
									</table>
								</div>
					       	</div>	
					</div>
				</div><?php
			break;
		}
		?>

	</div>
</div>