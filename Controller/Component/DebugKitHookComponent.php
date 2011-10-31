<?php
class DebugKitHookComponent extends Component {
    public function startup(&$Controller) {
        if ($Controller->Quickapps->isAdmin()) {
            $Controller->Toolbar = $Controller->Components->load('DebugKit.Toolbar', array('enabled' => true));
            $Controller->Toolbar->startup($Controller);
            $Controller->Toolbar->initialize($Controller);
        }
    }
}
