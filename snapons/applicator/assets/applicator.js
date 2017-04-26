(function( $ ) {
    
    var $html = $( document.documentElement ),
        $document = $( document ),
        $window = $( window ),
        
        aplApplicatorGoCtNavCss = 'apl--applicator--go-content-nav',
        aplApplicatorGoStartNavCss = 'apl--applicator--go-start-nav',
        aplApplicatorGoStartNavCss = 'apl--applicator--go-start-nav',
        aplApplicatorMainMenuCss = 'apl--applicator--main-menu',
        aplApplicatorArbitNavCss = 'apl--applicator--arbitrary-nav';
    
    
    
    
    
    // ------------------------- Go to Content Nav
    function initGoContent( cp ) {
        
        if ( ! aplApplicatorGoCtNavCss.length ) {
			return;
		}
        
        var $goCtNaviA = $( '#go-ct-navi---a' ),
            
            goCtNavActCss = 'go-content-nav--active',
            goCtNavInactCss = 'go-content-nav--inactive',
            aplGoCtNavActCss = 'apl--go-content-nav--active',
            aplGoCtNavInactCss = 'apl--go-content-nav--inactive';
        
        function goCtNavActivate() {
            cp
                .addClass( goCtNavActCss )
                .removeClass( goCtNavInactCss );
            $html
                .addClass( aplGoCtNavActCss )
                .removeClass( aplGoCtNavInactCss );
        }
        
        function goCtNavDeactivate() {
            cp
                .addClass( goCtNavInactCss )
                .removeClass( goCtNavActCss );
            $html
                .addClass( aplGoCtNavInactCss )
                .removeClass( aplGoCtNavActCss );
        }
        
        // Initiate
        goCtNavDeactivate();
        
        // Focus In > Activate
        $goCtNaviA.on( 'focusin.applicator', function() {
            goCtNavActivate();
            console.log( 'goCtNavActivate' );
        } );

        // Focus Out > Deactivate
        $goCtNaviA.on( 'focusout.applicator', function() {
            goCtNavDeactivate();
            console.log( 'goCtNavDeactivate' );
        } );
        
    } // Go to Content Nav
    initGoContent( $( '#go-content-nav' ) );
    
    
    
    
    
    // ------------------------- Go to Start Nav
    function initGoStart( cp ) {
        
        if ( ! aplApplicatorGoStartNavCss.length ) {
			return;
		}
        
        var $goStartNaviA = $( '#go-start-navi---a' ),
            
            goStartNavActCss = 'go-start-nav--active',
            goStartNavInactCss = 'go-start-nav--inactive',
            
            aplgoStartNavActCss = 'apl--go-start-nav--active',
            aplgoStartNavInactCss = 'apl--go-start-nav--inactive',
            
            $colophonHeight = $('#colophon').height(),
            bodyOffsetCriteriaHeight,
            bodyOffsetSliceHeight,
            bodyOffsetMostHeight;
        
        function goStartNavActivate() {
            cp
                .addClass( goStartNavActCss )
                .removeClass( goStartNavInactCss );
            $html
                .addClass( aplgoStartNavActCss )
                .removeClass( aplgoStartNavInactCss );
        }
        
        function goStartNavDeactivate() {
            cp
                .addClass( goStartNavInactCss )
                .removeClass( goStartNavActCss );
            $html
                .addClass( aplgoStartNavInactCss )
                .removeClass( aplgoStartNavActCss );
        }
        
        // Initiate
        goStartNavDeactivate();
        
        ( function() {
            bodyOffsetCriteriaHeight = document.body.offsetHeight / 2;
            bodyOffsetSliceHeight = document.body.offsetHeight / 2;
            bodyOffsetMostHeight = document.body.offsetHeight - bodyOffsetSliceHeight;
            
            if ( ( window.innerHeight ) <= ( bodyOffsetCriteriaHeight ) ) {

                // http://stackoverflow.com/a/40370876
                $window.scroll( function( e ) {
                    if ( ( window.innerHeight + window.pageYOffset ) >= ( bodyOffsetMostHeight ) ) {
                        goStartNavActivate();
                    } else {
                        goStartNavDeactivate();
                    }
                } );
            }
        } () );
        
    
        // Smooth Scroll to #start
        $goStartNaviA.bind( 'click.applicator', function( e ) {

            e.preventDefault();
            
            var target = $( this ).attr( "href" );

            $( 'html, body' ).stop().animate( {
                scrollTop: $( target ).offset().top
            }, 600, 'linear', function() {
                location.hash = target;
            } );

            return false;
        } );
    } // Go to Start Nav
    
    initGoStart( $( '#go-start-nav' ) );
    
    
    
    
    
    // Main Menu | Main Nav - Main Header Aside
    function initMainMenu( cp ) {
        
        if ( ! aplApplicatorMainMenuCss.length ) {
			return;
		}
        
        cp.addClass( 'main-menu' );
        
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
            
            $mainMenuTogBtnHideIco = $( aplDataMainMenuTogL.mainMenuHideIco ),
            $mainMenuTogBtnShowIco = $( aplDataMainMenuTogL.mainMenuShowIco ),
            
            $mainMenuTogBtn,
            $mainMenuTogBtnL,
            $mainMenuTogBtnLword;
        
        // Build Markup
        ( function() {
            
            mainMenuTogBtnLwordMu = $( '<span />', {
                'class': 'word show-hide-main-menu---word',
                'text': aplDataMainMenuTogL.mainMenuHideL
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
                'title': aplDataMainMenuTogL.mainMenuHideL
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
                'text': aplDataMainMenuTogL.mainMenuCtrlH
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
                .append( mainMenuCtrlHmu )
                .append( mainMenuCtrlCtMu )
            .find( $( '.main-menu-ctrl---ct_cr' ) )
                .append( mainMenuTogObjMu );
            
            console.log( 'main-menu-ctrl abcdefghij' );
            
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
                .addClass( aplMainMenuActCss )
                .removeClass( aplMainMenuInactCss );
            
            $mainMenuTogBtn.attr( {
                 'aria-expanded': 'true',
                 'title': aplDataMainMenuTogL.mainMenuHideL
            } );
            
            $mainMenuTogBtnLword.text( aplDataMainMenuTogL.mainMenuHideL );
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
                .addClass( aplMainMenuInactCss )
                .removeClass( aplMainMenuActCss );
            
            $mainMenuTogBtn.attr( {
                 'aria-expanded': 'false',
                 'title': aplDataMainMenuTogL.mainMenuShowL
            } );
            
            $mainMenuTogBtnLword.text( aplDataMainMenuTogL.mainMenuShowL );
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
        
        // Click
        ( function() {
            $mainMenuTogBtn.on( 'click.applicator', function( e ) {
                e.preventDefault();
                mainMenuToggle();
                console.log( '$mainMenuTogBtn toggle' );
            } );
        }() );
        
        // Deactivate upon interaction outside specified elements
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            var _this = $( this );
            if ( cp.hasClass( mainMenuActCss ) && ( ! $( e.target ).closest( '.main-menu-ctrl' ).length && ! $( e.target ).closest( $mainMenuCtCr ).length ) ) {
                mainMenuDeactivate();
                console.log( 'Outside click' );
            }
        } );

        // Deactivate upon presseing ESC Key
        $window.load( function () {
            $( document ).on( 'keyup.applicator', function ( e ) {
                if ( cp.hasClass( mainMenuActCss ) && e.keyCode == 27 ) {
                    mainMenuDeactivate();
                    console.log( 'ESC' );
                }
            } );
        } );
        
    } // Main Menu | Main Nav - Main Header Aside

    initMainMenu( $( '#main-nav--main-header-aside' ) );
    
    
    
    
    
    // Arbitrary Nav | Search
    ( function() {
        
        if ( ! aplApplicatorArbitNavCss.length ) {
			return;
		}
        
        var arbitNavCss = 'arbitrary-nav';
        
        $( '#masthead' )
            .find( $( '.main-header---cr' ) )
                .children( '.search---cp:first' )
                    .attr( 'id', arbitNavCss )
                    .addClass( arbitNavCss );
        console.log( 'Arbirary Nav Created' );
    }() );
    
    function initArbitNav( cp ) {
        
        if ( ! aplApplicatorArbitNavCss.length ) {
			return;
		}
        
        console.log( 'Arbirary Nav Created' );
        
        var arbitNavCtrlMu,
            arbitNavCtrlHmu,
            arbitNavCtrlCtMu,
            arbitNavTogObjMu,
            arbitNavTogBtnMu,
            arbitNavTogBtnLmu,
            arbitNavTogBtnLwordMu,
            
            arbitNavActCss = 'arbitrary-nav--active',
            arbitNavInactCss = 'arbitrary-nav--inactive',
            aplArbitNavActCss = 'apl--arbitrary-nav--active',
            aplArbitNavInactCss = 'apl--arbitrary-nav--inactive',
            
            $arbitNavTogCtrlSearchIco = $( aplDataArbitNav.arbitNavTogCtrlSearchIco ),
            $arbitNavTogCtrlDismissIco = $( aplDataArbitNav.arbitNavTogCtrlDismissIco ),
            
            $arbitNavSearchIco = $( aplDataArbitNav.arbitNavSearchIco ),
            $arbitNavDismissIco = $( aplDataArbitNav.arbitNavDismissIco ),
            
            $arbitNavTogBtn,
            $arbitNavTogBtnL,
            $arbitNavTogBtnLword,
            
            $arbitNavSubmitAxnBl,
            $arbitNavResetAxnBl;
        
        // Build Markup
        ( function() {
            
            arbitNavTogBtnLwordMu = $( '<span />', {
                'class': 'word show-hide-arbitrary-nav---word',
                'text': aplDataArbitNav.arbitNavHideL
            } );
            
            arbitNavTogBtnLmu = $( '<span />', {
                'class': 'b_l arbitrary-nav-tog---b_l'
            } )
                .append( arbitNavTogBtnLwordMu )
                .append( $arbitNavTogCtrlDismissIco );
            
            // Button
            arbitNavTogBtnMu = $( '<button />', {
                'id' : 'arbitrary-nav-tog---b',
                'class': 'b arbitrary-nav-tog---b',
                'title': aplDataArbitNav.arbitNavHideL
            } ).append( arbitNavTogBtnLmu );
            
            // Object
            arbitNavTogObjMu = $( '<div />', {
                'class': 'obj toggle arbitrary-nav-toggle',
                'data-name': 'Arbitrary Navigation Toggle'
            } ).append( arbitNavTogBtnMu );
            
            // Containers
            arbitNavCtrlMu = $( '<div />', {
                'class': 'ctrl arbitrary-nav-ctrl',
                'data-name': 'Arbitrary Navigation Control'
            } ).append( $( '<div />', {
                'class': 'cr arbitrary-nav-ctrl---cr'
            } ) );
            
            arbitNavCtrlHmu = $( '<div />', {
                'class': 'h arbitrary-nav-ctrl---h'
            } ).append( $( '<span />', {
                'class': 'h_l arbitrary-nav-ctrl---h_l',
                'text': aplDataArbitNav.arbitNavCtrlH
            } ) );
            
            arbitNavCtrlCtMu = $( '<div />', {
                'class': 'ct arbitrary-nav-ctrl---ct'
            } ).append( $( '<div />', {
                'class': 'ct_cr arbitrary-nav-ctrl---ct_cr'
            } ) );
            
            cp
            .find( $( '.search---hr_cr' ) )
                .append( arbitNavCtrlMu )
            .find( $( '.arbitrary-nav-ctrl---cr' ) )
                .append( arbitNavCtrlHmu )
                .append( arbitNavCtrlCtMu )
            .find( $( '.arbitrary-nav-ctrl---ct_cr' ) )
                .append( arbitNavTogObjMu );
            
            console.log( 'arbitrary-nav-ctrl a' );
            
        }() );
        
        $arbitNavCtCr = cp.find( '.search---ct' );
        $arbitNavTogBtn = $( '#arbitrary-nav-tog---b' );
        $arbitNavTogBtnL = $arbitNavTogBtn.find( $( '.arbitrary-nav-tog---b_l' ) );
        $arbitNavTogBtnLword = $arbitNavTogBtn.find( $( '.show-hide-arbitrary-nav---word' ) );
        
        // Activate
        function arbitNavActivate() {
            cp
                .addClass( arbitNavActCss )
                .removeClass( arbitNavInactCss );
            $html
                .addClass( aplArbitNavActCss )
                .removeClass( aplArbitNavInactCss );
            
            $arbitNavTogBtn.attr( {
                 'aria-expanded': 'true',
                 'title': aplDataArbitNav.arbitNavHideL
            } );
            
            $arbitNavTogBtnLword.text( aplDataArbitNav.arbitNavHideL );
            $arbitNavTogBtnL.append( $arbitNavTogCtrlDismissIco );
            $arbitNavTogCtrlSearchIco.remove();
            console.log( 'activate' );
        }
        
        // Deactivate
        function arbitNavDeactivate() {
            cp
                .addClass( arbitNavInactCss )
                .removeClass( arbitNavActCss );
            $html
                .addClass( aplArbitNavInactCss )
                .removeClass( aplArbitNavActCss );
            
            $arbitNavTogBtn.attr( {
                 'aria-expanded': 'false',
                 'title': aplDataArbitNav.arbitNavShowL
            } );
            
            $arbitNavTogBtnLword.text( aplDataArbitNav.arbitNavShowL );
            $arbitNavTogBtnL.append( $arbitNavTogCtrlSearchIco );
            $arbitNavTogCtrlDismissIco.remove();
            console.log( 'deactivate' );
        }
        
        // Initialize
        arbitNavDeactivate();// Toggle
        
        // Toggle
        function arbitNavToggle() {
            if ( cp.hasClass( arbitNavActCss ) ) {
                arbitNavDeactivate();
            } else if ( cp.hasClass( arbitNavInactCss ) ) {
                arbitNavActivate();
            }
        }
        
        // Click
        ( function() {
            $arbitNavTogBtn.on( 'click.applicator', function( e ) {
                e.preventDefault();
                arbitNavToggle();
                console.log( '$arbitNavTogBtn toggle' );
            } );
        }() );
        
        // Deactivate upon interaction outside specified elements
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            if ( cp.hasClass( arbitNavActCss ) && ( ! $( e.target ).closest( '.arbitrary-nav-ctrl' ).length && ! $( e.target ).closest( $arbitNavCtCr ).length ) ) {
                arbitNavDeactivate();
                console.log( 'Outside click' );
            }
        } );

        // Deactivate upon presseing ESC Key
        $window.load( function () {
            $( document ).on( 'keyup.applicator', function ( e ) {
                if ( cp.hasClass( arbitNavActCss ) && e.keyCode == 27 ) {
                    arbitNavDeactivate();
                    console.log( 'ESC' );
                }
            } );
        } );
        
        // Add Icons to Buttons
        $arbitNavSearchFormAxns = cp.find( '.search-form-axns' );
        $arbitNavSearchBl = $arbitNavSearchFormAxns.find( '.search-submit-axn---b_l' );
        $arbitNavResetBl = $arbitNavSearchFormAxns.find( '.search-reset-axn---b_l' );
        $arbitNavSearchBl.append( $arbitNavSearchIco );
        $arbitNavResetBl.append( $arbitNavDismissIco );
        
    } // Arbitrary Nav | Search

    initArbitNav( $( '#arbitrary-nav' ) );
    
    
    
    
    
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
    
    
    /* ------------------------- Search
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
    */
    

})( jQuery );