<?php
//echo $type;
	switch ($type) {
		case 'Project':
			$name = "Project";

		break;

		case 'Employee':
			$name = "Employee";
		break;

		case 'Teamleader':
			$name = "Teamleader";
		break;

		case 'Note':
			$name = "Note";
		break;
		
		default:
			# code...
			break;
	}
?>

<div class="span9" id="content">
    <div class="row-fluid">
        <div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Great</h4>
            You can easily edit <?php echo $name;?>
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
                <div class="muted pull-left"><?php echo $name;?></div>
               </div>
            <div class="block-content collapse in">
                <div class="span4">
            		<?php 
            			switch ($type) {
            				case 'Project':
            					foreach ($project as $row) {		
			                		$atrributes = array(
										'name'		=>'login_form'
									);
									echo form_open('company/update_project',$atrributes);
									echo '<table border="0" cellpadding="0" cellspacing="0">';
													
								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									$data = array(
						              	'type'			=> 'hidden',
						              	'name'     	 	=> 'id',
						              	'value' 		=> $row->id,
						              	'class'			=> 'login-in',
						              	'style'			=>'height: 30px;',
						            );
						            echo form_input($data);
					            echo '</td>';
								echo '</tr>';
			
								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									$data = array(
						              	'type'			=> 'text',
						              	'name'        	=> 'name',
						              	'placeholder'	=> 'Project Name',
						              	'value' 		=> $row->name,
						              	'class'			=> 'login-inp',
						              	'style'			=>'height: 30px;',
						            );
						            echo form_input($data);
					            echo '</td>';
								echo '</tr>';

								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									$data = array(
						              	'type'			=> 'text',
						              	'name'        	=> 'start_date',
							            'placeholder'	=> 'Start Date',
						              	'value' 		=> $row->start_date,
						              	'class'			=> 'login-inp',
						              	'style'			=>'height: 30px;',

						            );
						           	echo '<p style="margin: 0px 0px 0px 0px;">Start Date</p>';
						            echo form_input($data);
						            echo '</td>';
								echo '</tr>';

								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									$data = array(
						              	'type'			=> 'text',
						              	'name'        	=> 'finish_date',
							            'placeholder'	=> 'Finish Date',
						              	'value' 		=> $row->finish_date,
						              	'class'			=> 'login-inp',
						              	'style'			=>'height: 30px;',

						            );
						           	echo '<p style="margin: 0px 0px 0px 0px;">Finish Date</p>';
						            echo form_input($data);
					            echo '</td>';
								echo '</tr>';

								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									$data = array(
						              	'type'			=> 'text',
						              	'name'        	=> 'actual_finish_date',
							            'placeholder'	=> 'Actual Finish Date',
						              	'value' 		=> $row->actual_finish_date,
						              	'class'			=> 'login-inp',
						              	'style'			=>'height: 30px;',

						            );
						           	echo '<p style="margin: 0px 0px 0px 0px;">Finishded Date</p>';
						            echo form_input($data);
					            echo '</td>';
								echo '</tr>';

								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									$data = array(
						              	'type'			=> 'text',
						              	'name'        	=> 'url',
							            'placeholder'	=> 'URL',
						              	'value' 		=> $row->url,
						              	'class'			=> 'login-inp',
						              	'style'			=>'height: 30px;',
						            );
						            echo form_input($data);
					            echo '</td>';
								echo '</tr>';

								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									$data = array(
						              	'type'			=> 'text',
						              	'name'      	=> 'status',
							            'placeholder'	=> 'Status',
						              	'value' 		=> $row->status,
						              	'class'			=> 'login-inp',
						              	'style'			=>'height: 30px;',
						            );
						            echo form_input($data);
					            echo '</td>';
								echo '</tr>';


								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									$data = array(
						              	'type'			=> 'text',
						              	'name'       	=> 'completion',
						              	'placeholder'	=> 'Completion',
						              	'value' 		=> $row->completion,
						              	'class'			=> 'login-inp',
						              	'style'			=>'height: 30px;',
						            );
						            echo form_input($data);
					            echo '</td>';
								echo '</tr>';


								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									
					            $data = array(
										'type'		=> 'submit',
										'name'		=> 'Submit',
										'value'		=> 'Update',								
						              	'class'		=> 'form-submit',
						              	'style'		=> 'margin-top:2px;',
						            );
						            echo form_submit($data);
					            echo '</td>';
								echo '</tr>';


								echo '</table>'; 
								echo form_close();
							}
            				break;
            				case 'Employee':
            					foreach ($employee as $row) {		
			                		$atrributes = array(
										'name'		=>'login_form'
									);
									echo form_open('company/update_employee',$atrributes);
									echo '<table border="0" cellpadding="0" cellspacing="0">';
													
								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									$data = array(
						              	'type'			=> 'hidden',
						              	'name'     	 	=> 'id',
						              	'value' 		=> $row->id,
						              	'class'			=> 'login-in',
						              	'style'			=>'height: 30px;',
						            );
						            echo form_input($data);
					            echo '</td>';
								echo '</tr>';
			
								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									$data = array(
						              	'type'			=> 'text',
						              	'name'        	=> 'name',
						              	'placeholder'	=> 'Name',
						              	'value' 		=> $row->name,
						              	'class'			=> 'login-inp',
						              	'style'			=>'height: 30px;',
						            );
						            echo form_input($data);
					            echo '</td>';
								echo '</tr>';

								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									$data = array(
						              	'type'			=> 'text',
						              	'name'        	=> 'address',
							            'placeholder'	=> 'Address',
						              	'value' 		=> $row->address,
						              	'class'			=> 'login-inp',
						              	'style'			=>'height: 30px;',

						            );
						           	echo '<p style="margin: 0px 0px 0px 0px;">Start Date</p>';
						            echo form_input($data);
						            echo '</td>';
								echo '</tr>';

								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									$data = array(
						              	'type'			=> 'text',
						              	'name'        	=> 'phone',
							            'placeholder'	=> 'Phone',
						              	'value' 		=> $row->phone,
						              	'class'			=> 'login-inp',
						              	'style'			=>'height: 30px;',

						            );
						           	echo '<p style="margin: 0px 0px 0px 0px;">Finish Date</p>';
						            echo form_input($data);
					            echo '</td>';
								echo '</tr>';

								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									
					            $data = array(
										'type'		=> 'submit',
										'name'		=> 'Submit',
										'value'		=> 'Update',								
						              	'class'		=> 'form-submit',
						              	'style'		=> 'margin-top:2px;',
						            );
						            echo form_submit($data);
					            echo '</td>';
								echo '</tr>';


								echo '</table>'; 
								echo form_close();
							}
            				break;
            				case 'Teamleader':
            					foreach ($teamleader as $row) {		
			                		$atrributes = array(
										'name'		=>'login_form'
									);
									echo form_open('company/update_teamleader',$atrributes);
									echo '<table border="0" cellpadding="0" cellspacing="0">';
													
								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									$data = array(
						              	'type'			=> 'hidden',
						              	'name'     	 	=> 'id',
						              	'value' 		=> $row->id,
						              	'class'			=> 'login-in',
						              	'style'			=>'height: 30px;',
						            );
						            echo form_input($data);
					            echo '</td>';
								echo '</tr>';
			
								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									$data = array(
						              	'type'			=> 'text',
						              	'name'        	=> 'name',
						              	'placeholder'	=> 'Name',
						              	'value' 		=> $row->name,
						              	'class'			=> 'login-inp',
						              	'style'			=>'height: 30px;',
						            );
						            echo form_input($data);
					            echo '</td>';
								echo '</tr>';

								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									$data = array(
						              	'type'			=> 'text',
						              	'name'        	=> 'address',
							            'placeholder'	=> 'Address',
						              	'value' 		=> $row->address,
						              	'class'			=> 'login-inp',
						              	'style'			=>'height: 30px;',

						            );
						           	echo '<p style="margin: 0px 0px 0px 0px;">Start Date</p>';
						            echo form_input($data);
						            echo '</td>';
								echo '</tr>';

								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									$data = array(
						              	'type'			=> 'text',
						              	'name'        	=> 'phone',
							            'placeholder'	=> 'Phone',
						              	'value' 		=> $row->phone,
						              	'class'			=> 'login-inp',
						              	'style'			=>'height: 30px;',

						            );
						           	echo '<p style="margin: 0px 0px 0px 0px;">Finish Date</p>';
						            echo form_input($data);
					            echo '</td>';
								echo '</tr>';

								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
									
					            $data = array(
										'type'		=> 'submit',
										'name'		=> 'Submit',
										'value'		=> 'Update',								
						              	'class'		=> 'form-submit',
						              	'style'		=> 'margin-top:2px;',
						            );
						            echo form_submit($data);
					            echo '</td>';
								echo '</tr>';


								echo '</table>'; 
								echo form_close();
							}
            				break;
            				case 'Note':
            					//echo $type;
            					foreach ($note as $row) {
            						$atrributes = array(
										'name'		=>'login_form'
									);
									echo form_open('company/update_note',$atrributes);
									echo '<table border="0" cellpadding="0" cellspacing="0">';

									echo '<tr>';
										echo '<th></th>';
										echo '<td>';
										$data = array(
							              	'type'			=> 'hidden',
							              	'name'     	 	=> 'id',
							              	'value' 		=> $row->id,
							              	'class'			=> 'login-in',
							              	'style'			=>'height: 30px;',
							            );
							            echo form_input($data);
						            echo '</td>';
									echo '</tr>';

									echo '<tr>';
										echo '<th></th>';
										echo '<td>';
										$data = array(
							              	'type'			=> 'text',
							              	'name'        	=> 'title',
							              	'placeholder'	=> 'Title',
							              	'value' 		=> $row->title,
							              	'class'			=> 'login-inp',
							              	'style'			=>'height: 30px;',
							            );
							            echo form_input($data);
						            echo '</td>';
									echo '</tr>';

									echo '<tr>';
										echo '<th></th>';
										echo '<td>';
										$data = array(
							              	
							              	'rows'			=> '5',
							              	'cols'			=> '80',
							              	'name'        	=> 'body',
							              	'placeholder' 	=> 'Note',
							              	'value'			=>$row->body,
							              	'class'			=> 'login-inp',
							              	'style'			=> 'width:auto;'
							              	

							            );
							            echo form_textarea($data);
						            echo '</td>';
									echo '</tr>';

									echo '<tr>';
										echo '<th></th>';
										echo '<td>';
										$option = array();
										foreach ($current_project as $row) {
											$current = $row->name;
										}

										$option[$current] = $current;
										foreach ($project_list as $row) {
											//echo $row->name;
											$option[$row->name] 		= $row->name;	
										}
										
										
									echo form_dropdown('project_list',$option, $current);
					            echo '</td>';
								echo '</tr>';

								echo '<tr>';
									echo '<th></th>';
									echo '<td>';
								    $data = array(
										'type'		=> 'submit',
										'name'		=> 'Submit',
										'value'		=> 'Update',								
						              	'class'		=> 'form-submit',
						              	'style'		=> 'margin-top:2px;',
						            );
						        	echo form_submit($data);
					            echo '</td>';
								echo '</tr>';


								echo '</table>';
								echo form_close();
            					}
            				break;
            				default:
            					# code...
            					//echo 'default';
            				break;
            			}
            		?>    
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
</div>
		