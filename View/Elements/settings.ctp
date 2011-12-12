<?php $roles = ClassRegistry::init('Role')->find('list'); ?>
<?php echo $this->Html->useTag('fieldsetstart', __d('user', 'Roles')); ?>
    <?php
        echo  $this->Form->input('Module.settings.roles', 
            array(
                'type' => 'select',
                'multiple' => 'checkbox',
                'options' => $roles,
                'label' => __d('debug_kit', 'Show debug tool bar to selected user roles'),
                'value' => @array_merge((array)Configure::read('Modules.DebugKit.settings.roles'), array(1))
            )
        );
    ?>
<?php echo $this->Html->useTag('fieldsetend'); ?>