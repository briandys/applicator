(function( $ ) {
    
    var $html = $( document.documentElement ),
        $document = $( document ),
        $window = $( window ),
        
        $aplApplicatorGoCtNav = $html.closest( '.apl--applicator--go-content-nav' ),
        $aplApplicatorGoStartNav = $html.closest( '.apl--applicator--go-start-nav' ),
        $aplApplicatorMainSearch = $html.closest( '.apl--applicator--main-search' ),
        $aplApplicatorSubNav = $html.closest( '.apl--applicator--sub-nav' ),
        $aplApplicatorMainMenu = $html.closest( '.apl--applicator--main-menu' ),
        $mainHrAsEnabled = $html.closest( '.main-header-aside--enabled' ),
        
        mainSearchFuncCss = 'main-search-func',
        
        funcCss = 'func';
    
    
    
    
    
    // ------------------------- Go to Content Nav
    function initGoContentNav( $cp ) {
        
        if ( ! $aplApplicatorGoCtNav.length ) {
			return;
		}
        
        $cp
            .addClass( 'go-content-nav-func' )
            .addClass( funcCss );
        
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
        
        $cp
            .addClass( 'go-start-nav-func' )
            .addClass( funcCss );
        
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
            bodyOffsetSliceHeight = document.body.offsetHeight / 1.5;
            bodyOffsetMostHeight = document.body.offsetHeight - bodyOffsetSliceHeight;
            
            if ( ( window.innerHeight ) <= ( bodyOffsetCriteriaHeight ) ) {

                // http://stackoverflow.com/a/40370876
                $window.scroll( function( e ) {
                    if ( ( ( window.innerHeight + window.pageYOffset ) >= ( bodyOffsetMostHeight ) ) && ( ! window.pageYOffset == 0 ) ) {
                        goStartNavActivate();
                    } else if ( ( ( window.innerHeight + window.pageYOffset ) < ( bodyOffsetMostHeight ) ) || ( window.pageYOffset == 0 ) ) {
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
        
        if ( ! $mainHrAsEnabled.length ) {
			return;
		}
        
        $cp
            .addClass( 'main-menu-func' )
            .addClass( funcCss );
        
        var mainMenuTogObjMu,
            mainMenuTogBtnMu,
            mainMenuTogBtnLmu,
            mainMenuTogBtnLwordMu,
            
            mainMenuActCss = 'main-menu--active',
            mainMenuInactCss = 'main-menu--inactive',
            aplMainMenuActCss = 'apl--main-menu--active',
            aplMainMenuInactCss = 'apl--main-menu--inactive',
            
            $mainMenuTogBtnHideIco = $( aplDataMainMenu.mainMenuHideIco ),
            $mainMenuTogBtnShowIco = $( aplDataMainMenu.mainMenuShowIco ),
            
            $mainMenuShowL = aplDataMainMenu.mainMenuShowL,
            $mainMenuHideL = aplDataMainMenu.mainMenuHideL,
            
            $mainHrAsH,
            $mainHrAsCt,
            
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
            
            $mainHrAsH = $cp.find( $( '.main-hr-as---h' ) );
            $mainHrAsH.after( mainMenuTogObjMu );
        }() );
        
        $mainHrAsCt = $cp.find( '.main-hr-as---ct' );
        
        $mainMenuTog = $cp.find( '.main-menu-toggle' );
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
            if ( $cp.hasClass( mainMenuActCss ) && ( ! $( e.target ).closest( $mainMenuTog ).length ) && ( ! $( e.target ).closest( $mainHrAsCt ).length ) ) {
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

    initMainMenu( $( '#main-header-aside' ) );
    
    
    
    
    
    // Main Search
    ( function() {
        
        if ( ! $aplApplicatorMainSearch.length ) {
			return;
		}
        
        $( '#masthead' )
            .find( $( '.main-header---cr' ) )
                .children( '.search-cp:first' )
                    .attr( 'id', mainSearchFuncCss );
    }() );
    
    function initMainSearch( $cp ) {
        
        if ( ! $aplApplicatorMainSearch.length ) {
			return;
		}
        
        $cp
            .addClass( mainSearchFuncCss )
            .addClass( funcCss );
        
        var mainSearchTogObjMu,
            mainSearchTogBtnMu,
            mainSearchTogBtnLmu,
            mainSearchTogBtnLwordMu,
            
            mainSearchActCss = 'main-search--active',
            mainSearchInactCss = 'main-search--inactive',
            aplmainSearchActCss = 'apl--main-search--active',
            aplmainSearchInactCss = 'apl--main-search--inactive',
            
            mainSearchInputEmpCss = 'main-search-input--empty',
            mainSearchInputPopCss = 'main-search-input--populated',
            
            $mainSearchTogSearchIco = $( aplDataArbitNav.mainSearchTogCtrlSearchIco ),
            $mainSearchTogDismissIco = $( aplDataArbitNav.mainSearchTogDismissIco ),
            
            $mainSearchSearchIco = $( aplDataArbitNav.mainSearchSearchIco ),
            $mainSearchDismissIco = $( aplDataArbitNav.mainSearchDismissIco ),
            
            $mainSearchShowL = aplDataArbitNav.mainSearchShowL,
            $mainSearchHideL = aplDataArbitNav.mainSearchHideL,
            
            $mainSearchH,
            $mainSearchCt,
            
            $mainSearchTog,
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
                .append( $mainSearchTogDismissIco );
            
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
            
        }() );
        
        $mainSearchCt = $cp.find( '.search---ct' );
        
        $mainSearchH = $cp.find( $( '.search---h' ) );
        $mainSearchH.after( mainSearchTogObjMu );
        
        $mainSearchTog = $cp.find( '.main-search-toggle' );
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
            $mainSearchTogBtnL.append( $mainSearchTogDismissIco );
            $mainSearchTogSearchIco.remove();
            
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
            $mainSearchTogBtnL.append( $mainSearchTogSearchIco );
            $mainSearchTogDismissIco.remove();
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
            if ( $cp.hasClass( mainSearchActCss ) && ( ! $( e.target ).closest( $mainSearchTog ).length && ! $( e.target ).closest( $mainSearchCt ).length ) ) {
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
            $cp
                .addClass( 'sub-nav-func' )
                .addClass( funcCss );
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
        
        // Deactivate Siblings
        function siblingsDeactivate() {
            var _this = $( this );
            _this.closest( $subNavParentItems ).siblings()
                .addClass( subNavInactCss )
                .removeClass( subNavActCss );
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
                
                // siblingsDeactivate.apply( this );
            } );
        }() );
        
        /*
        // Deactivate upon interaction outside specified elements
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            if ( $html.hasClass( aplSubNavActCss ) && ! $( e.target ).closest( $subNavParentItems ).length && ! $( e.target ).is( 'a' ).length ) {
                subNavAllDeactivate();
            }
        } );
        */
    }
    
    initSubNav( $( '#main-nav' ) );
    initSubNav( $( '.widget_nav_menu' ) );
    initSubNav( $( '.widget_pages' ) );

})( jQuery );