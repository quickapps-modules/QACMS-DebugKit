<?php
class DebugKitHookComponent extends Component {
	public function __construct($request = null, $response = null) {
		if (!QuickApps::is('user.admin') &&
            !count(array_intersect((array)Configure::read('Modules.DebugKit.settings.roles'), QuickApps::userRoles()))
        ) {
			Configure::write('debug', 0);
		}
	}

    public function startup(Controller $Controller) {
        if (QuickApps::is('user.admin') ||
            count(array_intersect((array)Configure::read('Modules.DebugKit.settings.roles'), QuickApps::userRoles()))
        ) {
            $Controller->Toolbar = $Controller->Components->load('DebugKit.Toolbar', array('enabled' => true));
            $Controller->Toolbar->startup($Controller);
            $Controller->Toolbar->initialize($Controller);
        }
    }
}