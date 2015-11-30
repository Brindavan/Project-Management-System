

<?php
//echo $from;
switch ($from) {
	case 'project_list':
	case 'project_search':
	case 'create_project':
		//echo 'project';
		?>
		<div class="span9" id="content">
    	<div class="row-fluid">
        <div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Great</h4>
            You can create New Project here.
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
                <div class="muted pull-left">New Project</div>
               </div>
            <div class="block-content collapse in">
                <div class="span4">
                	<?php
                		$atrributes = array(
							'name'		=>'login_form'
						);
						echo form_open('company/create_project',$atrributes);

						echo '<table border="0" cellpadding="0" cellspacing="0">';
						echo '<tr>';
							echo '<th></th>';
							echo '<td>';
							$data = array(
				              	'type'		=> 'text',
				              	'name'        => 'project_name',
				              	'placeholder' => 'Project Name',
				              	'class'		=> 'login-inp inputClass',
				              	'required' => 'required',
				              	'style'		=>'height: 30px;',
				            );
				            echo form_input($data);
			            echo '</td>';
						echo '</tr>';

						echo '<tr>';
							echo '<th></th>';
							echo '<td>';
							$data = array(
				              	'type'		=> 'date',
				              	'name'        => 'completion_date',
				              	'placeholder' => 'Completion Date',
				              	'class'		=> 'login-inp',
				              	'required' => 'required',
				              	'style'		=>'height: 30px;',

				            );
				            echo '<p>completion date</p>';
				            echo form_input($data);
			            echo '</td>';
						echo '</tr>';

						echo '<tr>';
							echo '<th></th>';
							echo '<td>';
							$data = array(
				              	'type'		=> 'text',
				              	'name'        => 'location',
				              	'placeholder' => 'url',
				              	'class'		=> 'login-inp',
				              	'required' => 'required',
				              	'style'		=>'height: 30px;',

				            );
				            echo form_input($data);

			            echo '</td>';
						echo '</tr>';


						echo '<tr>';
							echo '<th></th>';
							echo '<td>';
							$option = array();
							$option['name'] = "Select Team Leader";
							if(empty($teamleader)!=1){							
								foreach ($teamleader as $row) {
									//echo $row->name;
									$option[$row->name] 		= $row->name;	
								}
								echo form_dropdown('teamleader',$option, 'name');
							}
							else{
								echo 'You add can <strong>Teamleader</strong> first<br><br>';
							}
												
			            echo '</td>';
						echo '</tr>';

						echo '<tr>';
							echo '<th></th>';
							echo '<td>';
							
			            $data = array(
								'type'		=> 'submit',
								'name'		=> 'Submit',
								'value'		=> 'Create',								
				              	'class'		=> 'form-submit'
				            );
			            if(empty($teamleader)!=1)
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
	
	case 'employee_list':
	case 'employee_search':
		?>
		<div class="span9" id="content">
    	<div class="row-fluid">
        <div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Great</h4>
            You can create New Employee here.
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
	                <div class="muted pull-left">New Employee</div>
	               </div>
	            <div class="block-content collapse in">
	                <div class="span4">
	                	<?php
	                		$atrributes = array(
								'name'		=>'login_form'
							);
							echo form_open('company/add_Employee',$atrributes);

							echo '<table border="0" cellpadding="0" cellspacing="0">';
							echo '<tr>';
								echo '<th></th>';
								echo '<td>';
								$data = array(
					              	'type'		=> 'text',
					              	'name'        => 'employee_name',
					              	'placeholder' => 'Employee Full Name',
					              	'class'		=> 'login-inp',
					              	'required' => 'required',
					              	'style'		=>'height: 30px;',
					            );
					            echo form_input($data);
				            echo '</td>';
							echo '</tr>';

							echo '<tr>';
								echo '<th></th>';
								echo '<td>';
								$data = array(
					              	'type'		=> 'text',
					              	'name'        => 'address',
					              	'placeholder' => 'Address',
					              	'class'		=> 'login-inp',
					              	'required' => 'required',
					              	'style'		=>'height: 30px;',

					            );
					            echo form_input($data);
				            echo '</td>';
							echo '</tr>';

							echo '<tr>';
								echo '<th></th>';
								echo '<td>';
								$data = array(
					              	'type'		=> 'text',
					              	'name'        => 'phone',
					              	'placeholder' => 'Phone Number',
					              	'class'		=> 'login-inp',
					              	'required' => 'required',
					              	'style'		=>'height: 30px;',

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
									'value'		=> 'Create',								
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
	
	case 'teamleader_list':
	case 'teamleader_search':
				
		?>
		<div class="span9" id="content">
    	<div class="row-fluid">
        <div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Great</h4>
            You can create New Employee here.
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
                <div class="muted pull-left">New Employee</div>
               </div>
            <div class="block-content collapse in">
                <div class="span4">
                	<?php
                		$atrributes = array(
							'name'		=>'login_form'
						);
						echo form_open('company/add_Teamleader',$atrributes);

						echo '<table border="0" cellpadding="0" cellspacing="0">';
						echo '<tr>';
							echo '<th></th>';
							echo '<td>';
							$data = array(
				              	'type'		=> 'text',
				              	'name'        => 'teamleader_name',
				              	'placeholder' => 'Teamleader Full Name',
				              	'class'		=> 'login-inp',
				              	'required' => 'required',
				              	'style'		=>'height: 30px;',
				            );
				            echo form_input($data);
			            echo '</td>';
						echo '</tr>';

						echo '<tr>';
							echo '<th></th>';
							echo '<td>';
							$data = array(
				              	'type'		=> 'text',
				              	'name'        => 'address',
				              	'placeholder' => 'Address',
				              	'class'		=> 'login-inp',
				              	'required' => 'required',
				              	'style'		=>'height: 30px;',

				            );
				            echo form_input($data);
			            echo '</td>';
						echo '</tr>';

						echo '<tr>';
							echo '<th></th>';
							echo '<td>';
							$data = array(
				              	'type'		=> 'text',
				              	'name'        => 'phone',
				              	'placeholder' => 'Phone Number',
				              	'class'		=> 'login-inp',
				              	'required' => 'required',
				              	'style'		=>'height: 30px;',

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
								'value'		=> 'Create',								
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

	case 'view_note':
	
				?>
		<div class="span9" id="content">
    		<div class="row-fluid">
        <div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Great</h4>
            You can create New Employee here.
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
                <div class="muted pull-left">New Note</div>
               </div>
            <div class="block-content collapse in">
                <div class="span4">
                	<?php
                		$atrributes = array(
							'name'		=>'login_form'
						);
						echo form_open('company/add_note',$atrributes);

						echo '<table border="0" cellpadding="0" cellspacing="0">';
						echo '<tr>';
							echo '<th></th>';
							echo '<td>';
							$data = array(
								
				              	'type'		=> 'text',
				              	'name'        => 'title',
				              	'placeholder' => 'Note Title',
				              	'class'		=> 'login-inp',
				              	'required' => 'required',
				              	'style'		=>'height: 30px; width:350px',		              	
				            );
				            echo form_input($data);
			            echo '</td>';
						echo '</tr>';

						echo '<tr>';
							echo '<th></th>';
							echo '<td>';
							$data = array(
				              	
				              	'rows'		=> '5',
				              	'cols'		=> '80',
				              	'name'        => 'body',
				              	'placeholder' => 'Note',
				              	'class'		=> 'login-inp',
				              	'required' => 'required',
				              	'style'		=> 'width:auto;'
				              	

				            );
				            echo form_textarea($data);
			            echo '</td>';
						echo '</tr>';



						echo '<tr>';
							echo '<th></th>';
							echo '<td>';
							if(empty($project_list)!=1){
								$option = array();
								$option['name'] = "Select Project";
								foreach ($project_list as $row) {
									//echo $row->name;
									$option[$row->name] 		= $row->name;	
								}
								echo form_dropdown('project_list',$option, 'name');
							}
							else{
								echo 'You can create <strong>Project</strong> first.<br><br>';
							}
			            echo '</td>';
						echo '</tr>';


						echo '<tr>';
							echo '<th></th>';
							echo '<td>';
							
			            $data = array(
								'type'		=> 'submit',
								'name'		=> 'Submit',
								'value'		=> 'Create',								
				              	'class'		=> 'form-submit',
				              	'style'		=> 'margin-top:2px;',
				            );
			            	if(empty($project_list)!=1)
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
	default:
	# code...
	break;
}
?>