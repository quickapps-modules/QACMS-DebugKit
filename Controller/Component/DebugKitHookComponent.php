<?php
class DebugKitHookComponent extends Component {
    public function startup(&$Controller) {
        if ($Controller->Quickapps->isAdmin() ||
            count(array_intersect((array)Configure::read('Modules.DebugKit.settings.roles'), $Controller->Quickapps->userRoles()))
        ) {
            Configure::write('debug', 2);
            $Controller->Toolbar = $Controller->Components->load('DebugKit.Toolbar', array('enabled' => true));
            $Controller->Toolbar->startup($Controller);
            $Controller->Toolbar->initialize($Controller);
        }
    }
}