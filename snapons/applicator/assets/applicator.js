(function( $ ) {
    
    var $html = $( document.documentElement ),
        $document = $( document ),
        $window = $( window ),
        
        $aplApplicatorMnMhaMainMenu = $( '.apl--applicator--mn-mha--main-menu' );
    
    
    // Classify the built-in Search
    ( function() {
        $( '#masthead' ).find( $( '.main-header---cr' ) ).children( '.search-cp' ).addClass( 'arbitrary-nav' ).attr( 'id', 'arbitrary-nav' );
    }() );
    
    
    // Main Menu | Main Nav - Main Header Aside
    function initMainMenu( cp ) {
        
        if ( ! $( '.apl--applicator--mn-mha--main-menu' ).length ) {
			return;
		}
        
        var mainMenuCtrlMu,
            mainMenuCtrlHMu,
            mainMenuCtrlCtMu,
            mainMenuTogObjMu,
            mainMenuTogBtnMu,
            mainMenuTogBtnLmu,
            mainMenuTogBtnLwordMu,
            
            mainMenuActCss = 'main-menu--active',
            mainMenuInactCss = 'main-menu--inactive',
            aplmainMenuActCss = 'apl--main-menu--active',
            aplmainMenuInactCss = 'apl--main-menu--inactive',
            
            $mainMenuTogBtnHideIco = $( aplDatamainMenuTogL.mainMenuHideIco ),
            $mainMenuTogBtnShowIco = $( aplDatamainMenuTogL.mainMenuShowIco ),
            
            $mainMenuTogBtn,
            $mainMenuTogBtnL,
            $mainMenuTogBtnLword;
        
        cp.addClass( 'main-menu' );
        
        // Build Markup
        ( function() {
            
            mainMenuTogBtnLwordMu = $( '<span />', {
                'class': 'word show-hide-main-menu---word',
                'text': aplDatamainMenuTogL.mainMenuHideL
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
                'title': aplDatamainMenuTogL.mainMenuHideL
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
            
            mainMenuCtrlHMu = $( '<div />', {
                'class': 'h main-menu-ctrl---h'
            } ).append( $( '<span />', {
                'class': 'h_l main-menu-ctrl---h_l',
                'text': aplDatamainMenuTogL.mainMenuCtrlH
            } ) );
            
            mainMenuCtrlCtMu = $( '<div />', {
                'class': 'ct main-menu-ctrl---ct'
            } ).append( $( '<div />', {
                'class': 'ct_cr main-menu-ctrl---ct_cr'
            } ) );
            
            cp
            .find( $( '.mn-mha---hr_cr' ) )
                .append( mainMenuCtrlMu )
            .find( $( '.main-menu-ctrl---cr' ) )
                .append( mainMenuCtrlHMu )
                .append( mainMenuCtrlCtMu )
            .find( $( '.main-menu-ctrl---ct_cr' ) )
                .append( mainMenuTogObjMu );
            
            console.log( 'main-menu-ctrl abcdefg' );
            
        }() );
        
        $mainMenuCtCr = cp.find( '.mn-mha---ct-cr' );
        $mainMenuTogBtn = $( '#main-menu-tog---b' );
        $mainMenuTogBtnL = $mainMenuTogBtn.find( $( '.main-menu-tog---b_l' ) );
        $mainMenuTogBtnLword = $mainMenuTogBtn.find( $( '.show-hide-main-menu---word' ) );
        
        // Activate
        function mainMenuActivate() {
            cp
                .addClass( mainMenuActCss )
                .removeClass( mainMenuInactCss );
            $html
                .addClass( aplmainMenuActCss )
                .removeClass( aplmainMenuInactCss );
            
            $mainMenuTogBtn.attr( {
                 'aria-expanded': 'true',
                 'title': aplDatamainMenuTogL.mainMenuHideL
            } );
            
            $mainMenuTogBtnLword.text( aplDatamainMenuTogL.mainMenuHideL );
            $mainMenuTogBtnL.append( $mainMenuTogBtnHideIco );
            $mainMenuTogBtnShowIco.remove();
            console.log( 'activate' );
        }
        
        // Deactivate
        function mainMenuDeactivate() {
            cp
                .addClass( mainMenuInactCss )
                .removeClass( mainMenuActCss );
            $html
                .addClass( aplmainMenuInactCss )
                .removeClass( aplmainMenuActCss );
            
            $mainMenuTogBtn.attr( {
                 'aria-expanded': 'false',
                 'title': aplDatamainMenuTogL.mainMenuShowL
            } );
            
            $mainMenuTogBtnLword.text( aplDatamainMenuTogL.mainMenuShowL );
            $mainMenuTogBtnL.append( $mainMenuTogBtnShowIco );
            $mainMenuTogBtnHideIco.remove();
            console.log( 'deactivate' );
        }
        
        // Initialize
        mainMenuDeactivate();
        
        // Toggle
        function mainMenuToggle() {
            if ( cp.hasClass( mainMenuActCss ) ) {
                mainMenuDeactivate();
            } else if ( cp.hasClass( mainMenuInactCss ) ) {
                mainMenuActivate();
            }
        }
        
        ( function() {
            $mainMenuTogBtn.click( function( e ){
                e.preventDefault();
                mainMenuToggle();
                console.log( '$mainMenuTogBtn toggle' );
            } );
        }() );
        
        /* Deactivate upon interaction outside other elements
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            var _this = $( this );
            if ( ( ! $( e.target ).closest( '.main-nav--header-aside--menu-toggle' ).length && ! $( e.target ).closest( $mainMenuCtCr ).length ) && cp.hasClass( mainMenuActCss ) ) {
                mainMenuDeactivate();
            }
        } );


        // Deactivate upon presseing ESC Key
        $window.load( function () {
            $( document ).on( 'keyup.applicator', function ( e ) {
                if ( e.keyCode == 27 && cp.hasClass( mainMenuActCss ) ) {
                    mainMenuDeactivate();
                }
            } );
        } );
        */
        
    } // Main Menu | Main Nav - Main Header Aside

    initMainMenu( $( '#main-nav--main-header-aside' ) );
    
    
    
    
    
    
    
    
    
    
    
    
    
    // ------------------------- Go to Content
    function initGoContent( component ) {
        
        var $goCtNaviA = $( '#go-ct-navi---a' ),
            
            goCtActCss = 'go-content-nav--active',
            goCtInactCss = 'go-content-nav--inactive',
            
            aplGoCtActCss = 'apl--go-content-nav--active',
            aplGoCtInactCss = 'apl--go-content-nav--inactive';
        
        function goCtNaviActivate() {
            component
                .addClass( goCtActCss )
                .removeClass( goCtInactCss );
            $html
                .addClass( aplGoCtActCss )
                .removeClass( aplGoCtInactCss );
        }
        
        function goCtNaviDeactivate() {
            component
                .addClass( goCtInactCss )
                .removeClass( goCtActCss );
            $html
                .addClass( aplGoCtInactCss )
                .removeClass( aplGoCtActCss );
        }
        
        // Initiate
        goCtNaviDeactivate();
        
        // Focus In > Activate
        $goCtNaviA.on( 'focusin.applicator', function () {
            goCtNaviActivate();
        } );

        // Focus Out > Deactivate
        $goCtNaviA.on( 'focusout.applicator', function () {
            goCtNaviDeactivate();
        } );
        
    }
    initGoContent( $( '#go-content-nav' ) );
    
    
    // ------------------------- Sub-Navigation
    function initSubNav( component ) {
        
        if ( ! $html.hasClass( 'applicator--sub-nav' ) ) {
			return;
		}
        
        // Create the markup of Sub-Nav Toggle
        var subnavToggle = $( '<div />', { 'class': 'cp sub-nav-toggle', 'data-name': 'Sub-Nav Toggle' } )
                .append( $( '<div />', { 'class': 'sub-nav-toggle--cr' } ) ),
            
            subnavToggleAction = $( '<button />', { 'class': 'b a sub-nav-toggle--a' } )
                .append( $( '<span />', { 'class': 'sub-nav-toggle--a-l' } ) ),
            
            subnavToggleActionLabel = $( '<span />', { 'class': 'sub-nav-toggle--a--word--l', 'text': applicatorSubnavLabel.subnavShowLabel } ),
            
            subNavActive = 'sub-nav--active',
            subNavInactive = 'sub-nav--inactive',
            
            aplSubNavActiveClass = 'applicator--sub-nav--active',
            aplSubNavInactiveClass = 'applicator--sub-nav--inactive';
        
        
        
        component.find( '.page_item_has_children > a, .menu-item-has-children > a' ).after( subnavToggle );
        
        component.find( '.sub-nav-toggle--cr' ).append( subnavToggleAction );
        
        component.find( '.sub-nav-toggle--a-l' )
            .append( subnavToggleActionLabel )
            .append( ' ' )
            .append( applicatorSubnavLabel.subnavIcon );
        
        
        
        // Set Default State of Sub-Nav Toggle
        component.find( '.page_item_has_children, .menu-item-has-children' ).addClass( subNavInactive );
        $html.addClass( aplSubNavInactiveClass );
        
        
        // Deactivate Sub-Nav
        component.find( '.page_item_has_children, .menu-item-has-children' ).each( function() {
            var _this = $( this );
            if ( _this.hasClass( subNavInactive ) ) {
                _this.find( '.sub-nav-toggle--a' ).attr( 'aria-expanded', 'false' ).attr( 'title', applicatorSubnavLabel.subnavShowLabel );
            }
        } );
        
        
        // Click Toggle Action
        component.find( '.sub-nav-toggle--a' ).click( function( e ) {
            var _this = $( this ),
                subNavLabel = _this.find( '.sub-nav-toggle--a--word--l' );
            
            e.preventDefault();
            
            // The <button> itself
            _this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
            
            subNavLabel.text( subNavLabel.text() === applicatorSubnavLabel.subnavShowLabel ? applicatorSubnavLabel.subnavHideLabel : applicatorSubnavLabel.subnavShowLabel );
            
            _this.attr( 'title', _this.attr( 'title' ) === applicatorSubnavLabel.subnavShowLabel ? applicatorSubnavLabel.subnavHideLabel : applicatorSubnavLabel.subnavShowLabel );
            
            // The Sub-Nav Toggle Component
            _this.closest( '.page_item, .menu-item' )
                .toggleClass( subNavActive )
                .toggleClass( subNavInactive );
            
            // Deactivate Siblings
            _this.closest( '.page_item, .menu-item' ).siblings()
                .addClass( subNavInactive )
                .removeClass( subNavActive );
            
            // Classify in <html>
            if ( _this.closest( '.page_item, .menu-item' ).hasClass( subNavInactive ) ) {
                $html
                    .addClass( aplSubNavInactiveClass )
                    .removeClass( aplSubNavActiveClass );
            } else if ( _this.closest( '.page_item, .menu-item' ).hasClass( subNavActive ) ) {
                $html
                    .addClass( aplSubNavActiveClass )
                    .removeClass( aplSubNavInactiveClass );
            }
        } );
        
    }
    initSubNav( $( '#main-nav' ) );
    initSubNav( $( '.widget_nav_menu' ) );
    initSubNav( $( '.widget_pages' ) );
    
    
    // ------------------------- Search
    function initSearch( component ) {
        
        // Create Markup
        var searchToggle = $( '<div />', { 'class': 'cp search-toggle', 'data-name': 'Search Toggle' } )
                .append( $( '<div />', { 'class': 'search-toggle--cr' } ) ),
            
            searchToggleAction = $( '<button />', { 'class': 'b a search-toggle--a' } )
                .append( $( '<span />', { 'class': 'search-toggle--a-l' } ) ),
            
            searchToggleActionLabel = $( '<span />', { 'class': 'search-toggle--a--word--l', 'text': applicatorSearchLabel.searchShowLabel } ),
            
            searchActiveClass = 'search--active',
            searchInactiveClass = 'search--inactive',
            searchInputEmptyClass = 'search-input--empty',
            
            aplSearchActiveClass = 'apl--search--active',
            aplSearchInactiveClass = 'apl--search--inactive',
            
            $searchComponent = $( '.arbitrary-nav' ),
            $searchInput = component.find( '.search-term--input--text' ),
            $searchForm = component.find( '.search-form' ),
            $searchToggleLabel,
            $searchToggleAction,
            
            $searchSubmit = component.find( '.search-form-submit--a-l' ),
            $searchReset = component.find( '.search-form-reset--a-l' );
        
        // Attach Markup
        component.find( '.search-form' ).before( searchToggle );
        component.find( '.search-toggle--cr' ).append( searchToggleAction );
        
        component.find( '.search-toggle--a-l' )
            .append( searchToggleActionLabel )
            .append( ' ' )
            .append( applicatorSearchLabel.searchIcon )
            .append( applicatorSearchLabel.searchDismissIcon );
        
        $searchSubmit.append( ' ' )
            .append( applicatorSearchLabel.searchIcon );
        
        $searchReset.append( ' ' )
            .append( applicatorSearchLabel.searchDismissIcon );
        
        
        // ------------------------- Set Defaults
        component.addClass( searchInactiveClass );
        
        
        $searchToggleLabel = component.find( '.search-toggle--a--word--l' );
        $searchToggleAction = component.find( '.search-toggle--a' );
        $searchToggleResetAction = component.find( '.search-form-reset--a' );
        
        
        // ------------------------- Search Toggle Status
        function searchStatusToggle() {
            
            // Set defaults for text label and aria-expanded based on Status Class
            if ( $searchComponent.hasClass( searchInactiveClass ) ) {
                $searchToggleAction.attr( 'aria-expanded', 'false' );
                $searchToggleAction.attr( 'title', applicatorSearchLabel.searchShowLabel );
                $searchToggleLabel.text( applicatorSearchLabel.searchShowLabel );
                $html.addClass( aplSearchInactiveClass );
                $html.removeClass( aplSearchActiveClass );
            
            } else if ( $searchComponent.hasClass( searchActiveClass ) ) {
                $searchToggleAction.attr( 'aria-expanded', 'true' );
                $searchToggleAction.attr( 'title', applicatorSearchLabel.searchHideLabel );
                $searchToggleLabel.text( applicatorSearchLabel.searchHideLabel );
                $html.addClass( aplSearchActiveClass );
                $html.removeClass( aplSearchInactiveClass );
            }
        }
        searchStatusToggle();
        
        // ------------------------- Function: Initial State of Input
        function searchInputStatus() {
        
            // Empty Input
            if ( $searchInput.val() == '' ) {
                component.addClass( 'search-input--empty' );
                component.removeClass( 'search-input--populated' );
            }

            // Populated Input (as seen in Search Results page)
            if ( ! $searchInput.val() == '' ) {
                component.addClass( 'search-input--populated' );
                component.removeClass( 'search-input--empty' );
            }
            
        }
        searchInputStatus();
        
        // ------------------------- Toggle Search
        $searchToggleAction.click( function( e ) {
            var _this = $( this );
            
            e.preventDefault();
            
            // Toggle Component Status
            $searchComponent
                .toggleClass( searchActiveClass )
                .toggleClass( searchInactiveClass );
            
            searchStatusToggle();
            
            // Focus on Input
            if ( $searchComponent.hasClass( searchActiveClass ) ) {
                $searchInput.focus();
            }
            
            
        } );
        
        // ------------------------- Reset Action
        $searchToggleResetAction.click( function( e ) {
            var _this = $( this );
            
            e.preventDefault();
            
            // Reset value and focus on Input
            $searchInput.val( '' ).focus();
            
            searchInputStatus();
        } );
        
        // ------------------------- Text Input Detection
        $searchInput.on( 'keypress.applicator input.applicator', function() {
            searchInputStatus();
        } );
        
        
        // ------------------------- Function: Deactivate Search
        function searchDeactivate() {
            $searchComponent
                .addClass( searchInactiveClass )
                .removeClass( searchActiveClass );
            
            $searchToggleAction.attr( 'aria-expanded', 'false' );
            
            $searchToggleLabel.text( applicatorSearchLabel.searchShowLabel );
            
            $html
                .addClass( aplSearchInactiveClass )
                .removeClass( aplSearchActiveClass );
        }
        
        
        // ------------------------- Deactivate Search on click outside the component itself
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            var _this = $( this );
            if ( ! $( e.target ).closest( '.arbitrary-nav' ).length && $searchComponent.hasClass( searchActiveClass ) ) {
                searchDeactivate();
            }
        } );


        // ------------------------- Deactivate Search upon ESC key
        $window.load( function () {
            $( document ).on( 'keyup.applicator', function ( e ) {
                if ( e.keyCode == 27 && $searchComponent.hasClass( searchActiveClass ) ) {
                    searchDeactivate();
                }
            } );
        } );
        
    }
    initSearch( $( '#arbitrary-nav' ) );
    
    
    
    
    
    // ------------------------- Go to Start
    function initGoStart( component ) {
        
        var $goStartNaviA = $( '#go-start-navi---a' ),
            
            goStartActCss = 'go-start-nav--active',
            goStartInactCss = 'go-start-nav--inactive',
            
            aplGoStartActCss = 'apl--go-start-nav--active',
            aplGoStartInactCss = 'apl--go-start-nav--inactive';
        
        function goStartNaviActivate() {
            component
                .addClass( goStartActCss )
                .removeClass( goStartInactCss );
            $html
                .addClass( aplGoStartActCss )
                .removeClass( aplGoStartInactCss );
        }
        
        function goStartNaviDeactivate() {
            component
                .addClass( goStartInactCss )
                .removeClass( goStartActCss );
            $html
                .addClass( aplGoStartInactCss )
                .removeClass( aplGoStartActCss );
        }
        
        // Initiate
        goStartNaviDeactivate();
        
        var $colophonHeight = $('#colophon').height(),
            bodyOffsetCriteriaHeight = document.body.offsetHeight / 2,
            bodyOffsetSliceHeight = document.body.offsetHeight / 2,
            bodyOffsetMostHeight = document.body.offsetHeight - bodyOffsetSliceHeight;
        
        if ( ( window.innerHeight ) <= ( bodyOffsetCriteriaHeight ) ) {
            
            // http://stackoverflow.com/a/40370876
            window.onscroll = function( ev ) {
                if ( ( window.innerHeight + window.pageYOffset ) >= ( bodyOffsetMostHeight ) ) {
                    goStartNaviActivate();
                } else {
                    goStartNaviDeactivate();
                }
            };
            
        }
    
        // Smooth Scroll to #start
        $goStartNaviA.bind( 'click', function( e ) {

            e.preventDefault();
            
            var target = $( this ).attr( "href" );

            $( 'html, body' ).stop().animate( {
                scrollTop: $( target ).offset().top
            }, 600, 'linear', function() {
                location.hash = target;
            } );

            return false;
        } );
        
    }
    initGoStart( $( '#go-start-nav' ) );
    
    
    
    
    
    
    

})( jQuery );