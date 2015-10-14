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
                <div class="muted pull-left">Search</div>
               </div>
            <div class="block-content collapse in">
                <div class="span4">
                    <?php  

                        switch ($type) {
                            case 'project':
                                $link="company/search";
                                break;
                            case 'employee':
                                $link="company/search_employee";
                                break;
                            case 'teamleader':
                                $link = "company/Search_teamleader";
                            default:
                                //echo 'wrong';
                                # code...
                                break;
                        }
                    $link?>
                	<?php
		            	$atrributes = array(
										'name'		=>'login_form'
									);
						echo form_open($link,$atrributes); 
                		$data = array(
				              	'type'		=> 'text',
				              	'name'        => 'search',
				              	'placeholder' => 'Search',
				              	'class'		=> 'inp-form',
				              	'required' => 'required'

				            );
			            echo form_input($data);

			            $data = array(
								'type'		=> 'submit',
								'name'		=> 'Submit',
								'value'		=> 'Search',								
				              	'class'		=> 'form-submit'
				            );
				            echo form_submit($data);
			           echo form_close();
				            
				    ?>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
</div>