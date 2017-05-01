(function( $ ) {
    
    var $html = $( document.documentElement ),
        $document = $( document ),
        $window = $( window ),
        
        $aplApplicatorGoCtNav = $( '.apl--applicator--go-content-nav' ),
        $aplApplicatorGoStartNav = $( '.apl--applicator--go-start-nav' ),
        $aplApplicatorMainSearch = $( '.apl--applicator--main-search' ),
        $aplApplicatorSubNav = $( '.apl--applicator--sub-nav' ),
        $aplApplicatorMainMenu = $( '.apl--applicator--main-menu' );
    
    
    
    
    
    // ------------------------- Go to Content Nav
    function initGoContentNav( $cp ) {
        
        if ( ! $aplApplicatorGoCtNav.length ) {
			return;
		}
        
        $cp.addClass( 'go-content-nav-func' );
        
        var $goCtNaviA = $( '#go-ct-navi---a' ),
            
            goCtNavActCss = 'go-content-nav--active',
            goCtNavInactCss = 'go-content-nav--inactive',
            aplGoCtNavActCss = 'apl--go-content-nav--active',
            aplGoCtNavInactCss = 'apl--go-content-nav--inactive';
        
        function goCtNavActivate() {
            $cp
                .addClass( goCtNavActCss )
                .removeClass( goCtNavInactCss );
            $html
                .addClass( aplGoCtNavActCss )
                .removeClass( aplGoCtNavInactCss );
        }
        
        function goCtNavDeactivate() {
            $cp
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
        } );

        // Focus Out > Deactivate
        $goCtNaviA.on( 'focusout.applicator', function() {
            goCtNavDeactivate();
        } );
        
    } // Go to Content Nav
    initGoContentNav( $( '#go-content-nav' ) );
    
    
    
    
    
    // ------------------------- Go to Start Nav
    function initGoStartNav( $cp ) {
        
        if ( ! $aplApplicatorGoStartNav.length ) {
			return;
		}
        
        $cp.addClass( 'go-start-nav-func' );
        
        var $goStartNaviA = $( '#go-start-navi---a' ),
            
            goStartNavActCss = 'go-start-nav--active',
            goStartNavInactCss = 'go-start-nav--inactive',
            
            aplgoStartNavActCss = 'apl--go-start-nav--active',
            aplgoStartNavInactCss = 'apl--go-start-nav--inactive',
            
            $goStartNavArrowIco = aplDataGoStartNav.goStartNavArrowIco,
            
            $colophonHeight = $('#colophon').height(),
            bodyOffsetCriteriaHeight,
            bodyOffsetSliceHeight,
            bodyOffsetMostHeight;
        
        function goStartNavActivate() {
            $cp
                .addClass( goStartNavActCss )
                .removeClass( goStartNavInactCss );
            $html
                .addClass( aplgoStartNavActCss )
                .removeClass( aplgoStartNavInactCss );
        }
        
        function goStartNavDeactivate() {
            $cp
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
            }, 320, 'linear', function() {
                location.hash = target;
            } );

            return false;
        } );
        
        // Add Icon to Button
        $goStartNaviAL = $goStartNaviA.find( '.go-start-navi---a_l' );
        $goStartNaviAL.append( $goStartNavArrowIco );
    } // Go to Start Nav
    
    initGoStartNav( $( '#go-start-nav' ) );
    
    
    
    
    
    // Main Menu | Main Nav - Main Header Aside
    function initMainMenu( $cp ) {
        
        if ( ! $aplApplicatorMainMenu.length ) {
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
            if ( $cp.hasClass( mainMenuActCss ) && ( ! $( e.target ).closest( $mainMenuCtrl ).length && ! $( e.target ).closest( $mainMenuCtCr ).length ) ) {
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
    
    
    
    
    
    // Main Search
    ( function() {
        
        if ( ! $aplApplicatorMainSearch.length ) {
			return;
		}
        
        var mainSearchFuncCss = 'main-search-func';
        
        $( '#masthead' )
            .find( $( '.main-header---cr' ) )
                .children( '.search-cp:first' )
                    .attr( 'id', mainSearchFuncCss )
                    .addClass( mainSearchFuncCss );
    }() );
    
    function initMainSearch( $cp ) {
        
        if ( ! $aplApplicatorMainSearch.length ) {
			return;
		}
        
        var mainSearchCtrlMu,
            mainSearchCtrlHmu,
            mainSearchCtrlCtMu,
            mainSearchTogObjMu,
            mainSearchTogBtnMu,
            mainSearchTogBtnLmu,
            mainSearchTogBtnLwordMu,
            
            mainSearchActCss = 'main-search--active',
            mainSearchInactCss = 'main-search--inactive',
            aplmainSearchActCss = 'apl--main-search--active',
            aplmainSearchInactCss = 'apl--main-search--inactive',
            
            mainSearchInputEmpCss = 'main-search-input--empty',
            mainSearchInputPopCss = 'main-search-input--populated',
            
            $mainSearchTogCtrlSearchIco = $( aplDataArbitNav.mainSearchTogCtrlSearchIco ),
            $mainSearchTogCtrlDismissIco = $( aplDataArbitNav.mainSearchTogCtrlDismissIco ),
            
            $mainSearchSearchIco = $( aplDataArbitNav.mainSearchSearchIco ),
            $mainSearchDismissIco = $( aplDataArbitNav.mainSearchDismissIco ),
            
            $mainSearchCtrlH = aplDataArbitNav.mainSearchCtrlH,
            $mainSearchShowL = aplDataArbitNav.mainSearchShowL,
            $mainSearchHideL = aplDataArbitNav.mainSearchHideL,
            
            $mainSearchCtrl,
            
            $mainSearchTogBtn,
            $mainSearchTogBtnL,
            $mainSearchTogBtnLword,
            
            $arbitNavSubmitAxnBl,
            $arbitNavResetAxnBl,
            
            $mainSearchInput,
            $mainSearchResetBtn;
        
        // Build Markup
        ( function() {
            
            mainSearchTogBtnLwordMu = $( '<span />', {
                'class': 'word show-hide-main-search---word',
                'text': $mainSearchHideL
            } );
            
            mainSearchTogBtnLmu = $( '<span />', {
                'class': 'b_l main-search-tog---b_l'
            } )
                .append( mainSearchTogBtnLwordMu )
                .append( $mainSearchTogCtrlDismissIco );
            
            // Button
            mainSearchTogBtnMu = $( '<button />', {
                'id' : 'main-search-tog---b',
                'class': 'b main-search-tog---b',
                'title': $mainSearchHideL
            } ).append( mainSearchTogBtnLmu );
            
            // Object
            mainSearchTogObjMu = $( '<div />', {
                'class': 'obj toggle main-search-toggle',
                'data-name': 'Search Toggle'
            } ).append( mainSearchTogBtnMu );
            
            // Containers
            mainSearchCtrlMu = $( '<div />', {
                'class': 'ctrl main-search-ctrl',
                'data-name': 'Search Control'
            } ).append( $( '<div />', {
                'class': 'cr main-search-ctrl---cr'
            } ) );
            
            mainSearchCtrlHmu = $( '<div />', {
                'class': 'h main-search-ctrl---h'
            } ).append( $( '<span />', {
                'class': 'h_l main-search-ctrl---h_l',
                'text': $mainSearchCtrlH
            } ) );
            
            mainSearchCtrlCtMu = $( '<div />', {
                'class': 'ct main-search-ctrl---ct'
            } ).append( $( '<div />', {
                'class': 'ct_cr main-search-ctrl---ct_cr'
            } ) );
            
            $cp
            .find( $( '.search---hr_cr' ) )
                .append( mainSearchCtrlMu )
            .find( $( '.main-search-ctrl---cr' ) )
                .append( mainSearchCtrlHmu )
                .append( mainSearchCtrlCtMu )
            .find( $( '.main-search-ctrl---ct_cr' ) )
                .append( mainSearchTogObjMu );
            
        }() );
        
        $mainSearchCtrl = $cp.find( '.main-search-ctrl' );
        
        $mainSearchCtCr = $cp.find( '.search---ct' );
        $mainSearchTogBtn = $( '#main-search-tog---b' );
        $mainSearchTogBtnL = $mainSearchTogBtn.find( $( '.main-search-tog---b_l' ) );
        $mainSearchTogBtnLword = $mainSearchTogBtn.find( $( '.show-hide-main-search---word' ) );
        
        $mainSearchInput = $cp.find( '.search-term-crt-inp--input-text' );
        $mainSearchResetBtn = $cp.find( '.search-reset-axn---b' );
        
        // Activate
        function mainSearchActivate() {
            $cp
                .addClass( mainSearchActCss )
                .removeClass( mainSearchInactCss );
            $html
                .addClass( aplmainSearchActCss )
                .removeClass( aplmainSearchInactCss );
            
            $mainSearchTogBtn.attr( {
                 'aria-expanded': 'true',
                 'title': $mainSearchHideL
            } );
            
            $mainSearchTogBtnLword.text( $mainSearchHideL );
            $mainSearchTogBtnL.append( $mainSearchTogCtrlDismissIco );
            $mainSearchTogCtrlSearchIco.remove();
            
            // Focus on input and select content if any
            $mainSearchInput.focus().select();
        }
        
        // Deactivate
        function mainSearchDeactivate() {
            $cp
                .addClass( mainSearchInactCss )
                .removeClass( mainSearchActCss );
            $html
                .addClass( aplmainSearchInactCss )
                .removeClass( aplmainSearchActCss );
            
            $mainSearchTogBtn.attr( {
                 'aria-expanded': 'false',
                 'title': $mainSearchShowL
            } );
            
            $mainSearchTogBtnLword.text( $mainSearchShowL );
            $mainSearchTogBtnL.append( $mainSearchTogCtrlSearchIco );
            $mainSearchTogCtrlDismissIco.remove();
        }
        
        // Initialize
        mainSearchDeactivate();
        
        // Toggle
        function mainSearchToggle() {
            if ( $cp.hasClass( mainSearchActCss ) ) {
                mainSearchDeactivate();
            } else if ( $cp.hasClass( mainSearchInactCss ) ) {
                mainSearchActivate();
            }
        }
        
        // Input Status
        function mainSearchInputStatus() {
            
            // Empty Input
            if ( $mainSearchInput.val() == '' ) {
                $cp.addClass( mainSearchInputEmpCss );
                $cp.removeClass( mainSearchInputPopCss );
            }

            // Populated Input (as displayed by default in the input in Search Results page)
            if ( ! $mainSearchInput.val() == '' ) {
                $cp.addClass( mainSearchInputPopCss );
                $cp.removeClass( mainSearchInputEmpCss );
            }
        }
        
        // Initialize
        mainSearchInputStatus();
        
        // Clicks
        ( function() {
            
            $mainSearchTogBtn.on( 'click.applicator', function( e ) {
                var _this = $( this );
                e.preventDefault();
                
                $window.scrollTop( _this.position().top );
                mainSearchToggle();
            } );
            
            $mainSearchResetBtn.on( 'click.applicator', function( e ) {
                var _this = $( this );
                e.preventDefault();
                
                $window.scrollTop( _this.position().top );
                $mainSearchInput.val( '' ).focus();
                mainSearchInputStatus();
            } );
            
        }() );
        
        // Upon entering content in input
        $mainSearchInput.on( 'keypress.applicator input.applicator', function() {
            mainSearchInputStatus();
        } );
        
        // Deactivate upon interaction outside specified elements
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            if ( $cp.hasClass( mainSearchActCss ) && ( ! $( e.target ).closest( $mainSearchCtrl ).length && ! $( e.target ).closest( $mainSearchCtCr ).length ) ) {
                mainSearchDeactivate();
            }
        } );

        // Deactivate upon presseing ESC Key
        $window.load( function () {
            $( document ).on( 'keyup.applicator', function ( e ) {
                if ( $cp.hasClass( mainSearchActCss ) && e.keyCode == 27 ) {
                    mainSearchDeactivate();
                }
            } );
        } );
        
        // Add Icons to Buttons
        $mainSearchFormAxns = $cp.find( '.search-form-axns' );
        $mainSearchBL = $mainSearchFormAxns.find( '.search-submit-axn---b_l' );
        $mainSearchResetBL = $mainSearchFormAxns.find( '.search-reset-axn---b_l' );
        $mainSearchBL.append( $mainSearchSearchIco );
        $mainSearchResetBL.append( $mainSearchDismissIco );
        
    } // Main Search | Search

    initMainSearch( $( '#main-search-func' ) );
    
    
    
    
    
    // Sub-Nav | Main Menu, Widget Menu
    function initSubNav( $cp ) {
        
        if ( ! $aplApplicatorSubNav.length ) {
			return;
		}
        
        var subNavTogObjMu,
            subNavTogBtnMu,
            subNavTogBtnLmu,
            subNavTogBtnLwordMu,
            
            subNavActCss = 'sub-nav--active',
            subNavInactCss = 'sub-nav--inactive',
            aplSubNavActCss = 'apl--sub-nav--active',
            aplSubNavInactCss = 'apl--sub-nav--inactive',
            
            $navParentItems = $( '.page_item, .menu-item' ),
            $subNavParentItems = $( '.page_item_has_children, .menu-item-has-children' ),
            $subNavGrp = $( '.page_item_has_children > .children, .menu-item-has-children > .sub-menu' ),
            
            $subNavParent,
            
            $subNavTog,
            $subNavTogBtn,
            $subNavTogBtnL,
            $subNavTogBtnLword,
            
            $subNavTogBtnIco = $( aplDataSubNav.subNavTogBtnIco ),
            
            $subNavTogBtnShowL = aplDataSubNav.subNavTogBtnShowL,
            $subNavTogBtnHideL = aplDataSubNav.subNavTogBtnHideL;
        
        if ( $cp.has( $subNavParentItems ) ) {
            $cp.addClass( 'sub-nav-func' );
        }
        
        // Build Markup
        ( function() {
            
            subNavTogBtnLwordMu = $( '<span />', {
                'class': 'word show-hide-sub-nav---word',
                'text': $subNavTogBtnHideL
            } );
            
            subNavTogBtnLmu = $( '<span />', {
                'class': 'b_l sub-nav-tog---b_l'
            } )
                .append( subNavTogBtnLwordMu )
                .clone().append( $subNavTogBtnIco );
            
            // Button
            subNavTogBtnMu = $( '<button />', {
                'class': 'b sub-nav-tog---b',
                'title': $subNavTogBtnHideL
            } ).append( subNavTogBtnLmu );
            
            // Object
            subNavTogObjMu = $( '<div />', {
                'class': 'obj toggle sub-nav-toggle',
                'data-name': 'Sub-Nav Toggle'
            } ).append( subNavTogBtnMu );
            
            $cp
            .find( $subNavGrp )
                .before( subNavTogObjMu );
            
        }() );
        
        $subNavTog = $cp.find( '.sub-nav-tog---b' );
        $subNavShowHideWord = '.show-hide-sub-nav---word';
        
        // Activate
        function subNavActivate() {
            var _this = $( this );
            $subNavParent = _this.closest( $subNavParentItems );
            
            $subNavParent
                .addClass( subNavActCss )
                .removeClass( subNavInactCss );
            $html
                .addClass( aplSubNavActCss )
                .removeClass( aplSubNavInactCss );
            
            _this.attr( {
                 'aria-expanded': 'true',
                 'title': $subNavTogBtnHideL
            } );
            
            _this.find( $subNavShowHideWord ).text( $subNavTogBtnHideL );
        }
        
        // Deactivate
        function subNavDeactivate() {
            var _this = $( this );
            $subNavParent = _this.closest( $subNavParentItems );
            
            $subNavParent
                .addClass( subNavInactCss )
                .removeClass( subNavActCss );
            $html
                .addClass( aplSubNavInactCss )
                .removeClass( aplSubNavActCss );
            
            _this.attr( {
                 'aria-expanded': 'false',
                 'title': $subNavTogBtnShowL
            } );
            
            _this.find( $subNavShowHideWord ).text( $subNavTogBtnShowL );
        }
        
        // Deactivate all Sub-Nav
        function subNavAllDeactivate() {
            var _this = $( this );
            
            $cp.find( $subNavParentItems ).each( function() {
                var _this = $( this );
                $subNavParentItems
                    .addClass( subNavInactCss )
                    .removeClass( subNavActCss );
                $html
                    .addClass( aplSubNavInactCss )
                    .removeClass( aplSubNavActCss );
                
                $subNavTog.attr( {
                    'aria-expanded': 'false',
                    'title': $subNavTogBtnShowL
                } );
                
                _this.find( $subNavShowHideWord ).text( $subNavTogBtnShowL );
            } );
        }
        
        // Initiate
        subNavAllDeactivate();
        
        // Toggle
        function subNavToggle() {
            var _this = $( this );
            
            $subNavParent = _this.closest( $subNavParentItems );
            
            if ( $subNavParent.hasClass( subNavActCss ) ) {
                
                $subNavParent
                    .addClass( subNavInactCss )
                    .removeClass( subNavActCss );
                $html
                    .addClass( aplSubNavInactCss )
                    .removeClass( aplSubNavActCss );

                _this.attr( {
                     'aria-expanded': 'false',
                     'title': $subNavTogBtnShowL
                } );
                
            } else if ( $subNavParent.hasClass( subNavInactCss ) ) {
                
                $subNavParent
                    .addClass( subNavActCss )
                    .removeClass( subNavInactCss );
                $html
                    .addClass( aplSubNavActCss )
                    .removeClass( aplSubNavInactCss );

                _this.attr( {
                     'aria-expanded': 'true',
                     'title': $subNavTogBtnHideL
                } );
                
            }
        }
        
        // Click
        ( function() {
            $subNavTog.on( 'click.applicator', function( e ) {
                var _this = $( this );
                e.preventDefault();
                $subNavParent = _this.closest( $subNavParentItems );
                
                if ( $subNavParent.hasClass( subNavInactCss ) ) {
                    subNavActivate.apply( this );
                } else if ( $subNavParent.hasClass( subNavActCss ) ) {
                    subNavDeactivate.apply( this );
                }
                
                // Deactivate Siblings
                _this.closest( $subNavParentItems ).siblings()
                    .addClass( subNavInactCss )
                    .removeClass( subNavActCss );
            } );
        }() );
        
        // Deactivate upon interaction outside specified elements
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            if ( $html.hasClass( aplSubNavActCss ) && ! $( e.target ).closest( $subNavParentItems ).length && ! $( e.target ).is( 'a' ).length ) {
                subNavAllDeactivate();
            }
        } );
    }
    
    initSubNav( $( '#main-nav' ) );
    initSubNav( $( '.widget_nav_menu' ) );
    initSubNav( $( '.widget_pages' ) );

})( jQuery );