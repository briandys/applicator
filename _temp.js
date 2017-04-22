// Main Navigation - Main Header Aside Control
        $applicator_l10n['mainMenuCtrlH'] = __( 'Main Navigation - Main Header Aside Control', 'applicator' );
        $applicator_l10n['mainMenuShowL'] = __( 'Show Main Navigation - Main Header Aside', 'applicator' );
        $applicator_l10n['mainMenuHideL'] = __( 'Hide Main Navigation - Main Header Aside', 'applicator' );
        $applicator_l10n['mainMenuShowIco'] = applicator_get_svg( array( 'icon' => 'burger--icon' ) );
        $applicator_l10n['mainMenuHideIco'] = applicator_get_svg( array( 'icon' => 'dismiss--icon' ) );
        wp_localize_script( 'apl-snapons-applicator-script-global', 'aplDatamainMenuTogL', $applicator_l10n );