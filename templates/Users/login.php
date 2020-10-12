<div class="back">
    <div class="div-center">
        <div class="content">
            
            <?= $this->Html->link($this->Html->image("mujib_logo.png", array("alt" => "alt-tag")),"#", array('class' => 'some-class', 'escape' => false)); ?>
            <h3>Login</h3>
            <?= $this->Form->create(); ?>      
            <table class="table table-responsive table-condensed">
                <tr>                    
                    <td>
                        <div class="form-group">
                            <?= $this->Form->control('username'); ?>
                        </div>
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <?= $this->Form->control('password'); ?>   
                        </div>    
                    </td>
                </tr>
                <tr>
                    <td>
                        <?= $this->Form->button('Submit', ['class' =>'btn btn-primary']); ?>                                
                    </td>
                </tr>
            </table>
            <?= $this->Form->end(); ?>
        </div>
        </span>
    </div>