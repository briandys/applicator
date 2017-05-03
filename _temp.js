// Main Menu | Main Nav - Main Header Aside
    function initMainMenu( $cp ) {
        
        if ( ! $aplApplicatorMainMenu.length ) {
			return;
		}
        
        if ( ! $mainHrAsEnabled.length ) {
			return;
		}
        
        $cp.addClass( 'main-menu-func' );
        
        var mainMenuCtrlMu,
            mainMenuCtrlHmu,
            mainMenuCtrlCtMu,
            mainMenuTogObjMu,
            mainMenuTogBtnMu,
            mainMenuTogBtnLmu,
            mainMenuTogBtnLwordMu,
            
            mainMenuActCss = 'main-menu--active',
            mainMenuInactCss = 'main-menu--inactive',
            aplMainMenuActCss = 'apl--main-menu--active',
            aplMainMenuInactCss = 'apl--main-menu--inactive',
            
            $mainMenuTogBtnHideIco = $( aplDataMainMenu.mainMenuHideIco ),
            $mainMenuTogBtnShowIco = $( aplDataMainMenu.mainMenuShowIco ),
            
            $mainMenuCtrlH = aplDataMainMenu.mainMenuCtrlH,
            $mainMenuShowL = aplDataMainMenu.mainMenuShowL,
            $mainMenuHideL = aplDataMainMenu.mainMenuHideL,
            
            $mainMenuCtrl,
            $mainMenuTogBtn,
            $mainMenuTogBtnL,
            $mainMenuTogBtnLword;
        
        // Build Markup
        ( function() {
            
            mainMenuTogBtnLwordMu = $( '<span />', {
                'class': 'word show-hide-main-menu---word',
                'text': $mainMenuHideL
            } );
            
            mainMenuTogBtnLmu = $( '<span />', {
                'class': 'b_l main-menu-tog---b_l'
            } )
                .append( mainMenuTogBtnLwordMu )
                .append( $mainMenuTogBtnHideIco );
            
            // Button
            mainMenuTogBtnMu = $( '<button />', {
                'id' : 'main-menu-tog---b',
                'class': 'b main-menu-tog---b',
                'title': $mainMenuHideL
            } ).append( mainMenuTogBtnLmu );
            
            // Object
            mainMenuTogObjMu = $( '<div />', {
                'class': 'obj toggle main-menu-toggle',
                'data-name': 'Main Menu Toggle'
            } ).append( mainMenuTogBtnMu );
            
            // Containers
            mainMenuCtrlMu = $( '<div />', {
                'class': 'ctrl main-menu-ctrl',
                'data-name': 'Main Menu Control'
            } ).append( $( '<div />', {
                'class': 'cr main-menu-ctrl---cr'
            } ) );
            
            mainMenuCtrlHmu = $( '<div />', {
                'class': 'h main-menu-ctrl---h'
            } ).append( $( '<span />', {
                'class': 'h_l main-menu-ctrl---h_l',
                'text': $mainMenuCtrlH
            } ) );
            
            mainMenuCtrlCtMu = $( '<div />', {
                'class': 'ct main-menu-ctrl---ct'
            } ).append( $( '<div />', {
                'class': 'ct_cr main-menu-ctrl---ct_cr'
            } ) );
            
            $cp
            .find( $( '.mn-mha---hr_cr' ) )
                .append( mainMenuCtrlMu )
            .find( $( '.main-menu-ctrl---cr' ) )
                .append( mainMenuCtrlHmu )
                .append( mainMenuCtrlCtMu )
            .find( $( '.main-menu-ctrl---ct_cr' ) )
                .append( mainMenuTogObjMu );
        }() );
        
        $mainMenuCtrl = $cp.find( '.main-menu-ctrl' );
        $mainMenuCtrlCtCr = $mainMenuCtrl.find( '.main-menu-ctrl---ct_cr' );
        
        $mainMenuCtCr = $cp.find( '.mn-mha---ct_cr' );
        $mainMenuTogBtn = $( '#main-menu-tog---b' );
        $mainMenuTogBtnL = $mainMenuTogBtn.find( $( '.main-menu-tog---b_l' ) );
        $mainMenuTogBtnLword = $mainMenuTogBtn.find( $( '.show-hide-main-menu---word' ) );
        
        // Activate
        function mainMenuActivate() {
            $cp
                .addClass( mainMenuActCss )
                .removeClass( mainMenuInactCss );
            $html
                .addClass( aplMainMenuActCss )
                .removeClass( aplMainMenuInactCss );
            
            $mainMenuTogBtn.attr( {
                 'aria-expanded': 'true',
                 'title': $mainMenuHideL
            } );
            
            $mainMenuTogBtnLword.text( $mainMenuHideL );
            $mainMenuTogBtnL.append( $mainMenuTogBtnHideIco );
            $mainMenuTogBtnShowIco.remove();
        }
        
        // Deactivate
        function mainMenuDeactivate() {
            $cp
                .addClass( mainMenuInactCss )
                .removeClass( mainMenuActCss );
            $html
                .addClass( aplMainMenuInactCss )
                .removeClass( aplMainMenuActCss );
            
            $mainMenuTogBtn.attr( {
                 'aria-expanded': 'false',
                 'title': $mainMenuShowL
            } );
            
            $mainMenuTogBtnLword.text( $mainMenuShowL );
            $mainMenuTogBtnL.append( $mainMenuTogBtnShowIco );
            $mainMenuTogBtnHideIco.remove();
        }
        
        // Initialize
        mainMenuDeactivate();
        
        // Toggle
        function mainMenuToggle() {
            if ( $cp.hasClass( mainMenuActCss ) ) {
                mainMenuDeactivate();
            } else if ( $cp.hasClass( mainMenuInactCss ) ) {
                mainMenuActivate();
            }
        }
        
        // Click
        ( function() {
            $mainMenuTogBtn.on( 'click.applicator', function( e ) {
                var _this = $( this );
                e.preventDefault();
                mainMenuToggle();
                $window.scrollTop( _this.position().top );
            } );
        }() );
        
        // Deactivate upon interaction outside specified elements
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            if ( $cp.hasClass( mainMenuActCss ) && ( ! $( e.target ).closest( $mainMenuCtrlCtCr ).length && ! $( e.target ).closest( $mainMenuCtCr ).length ) ) {
                mainMenuDeactivate();
            }
        } );

        // Deactivate upon presseing ESC Key
        $window.load( function () {
            $( document ).on( 'keyup.applicator', function ( e ) {
                if ( $cp.hasClass( mainMenuActCss ) && e.keyCode == 27 ) {
                    mainMenuDeactivate();
                }
            } );
        } );
        
    } // Main Menu | Main Nav - Main Header Aside

    initMainMenu( $( '#main-nav--main-header-aside' ) );