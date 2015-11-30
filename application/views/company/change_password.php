<div class="span9" id="content">
    <div class="row-fluid">
        <div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Password</h4>
            You can change your password here.
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
                        <li class="active">Change Password</li>
                    </ul>
            	</div>
        	</div>
    	</div>

    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Password Change</div>
               </div>
            <div class="block-content collapse in">
                <div class="span4">
                    <?php

                        $atrributes = array(
                                        'name'      =>'password_change'
                                    );
                        echo form_open('company/password_change',$atrributes); 
                        $data = array(
                                'type'      => 'password',
                                'name'        => 'oldPassword',
                                'placeholder' => 'Old Password',
                                'class'     => 'inp-form',
                                'required' => 'required'

                            );
                        echo form_input($data);
                         $data = array(
                                'type'      => 'password',
                                'name'        => 'newPassword',
                                'placeholder' => 'New Password',
                                'class'     => 'inp-form',
                                'required' => 'required'

                            );
                        echo form_input($data);
                         $data = array(
                                'type'      => 'password',
                                'name'        => 'ReNewPassword',
                                'placeholder' => 'New Password Once More',
                                'class'     => 'inp-form',
                                'required' => 'required'

                            );
                        echo form_input($data);
                        echo '<br>';
                        $data = array(
                                'type'      => 'submit',
                                'name'      => 'Submit',
                                'value'     => 'Change',                                
                                'class'     => 'form-submit'
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