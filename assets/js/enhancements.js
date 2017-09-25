(function( $ ) {
    
    var $html = $( document.documentElement ),
        $document = $( document ),
        $window = $( window ),
        $body = $( document.body ),
        
        // Functionalities
        $aplApplicatorGoCtNav = $html.closest( '.applicator--go-content-nav' ),
        $aplApplicatorGoStartNav = $html.closest( '.applicator--go-start-nav' ),
        $aplApplicatorMainSearch = $html.closest( '.applicator--main-search' ),
        $aplApplicatorSubNav = $html.closest( '.applicator--sub-nav' ),
        $aplApplicatorMainMenu = $html.closest( '.applicator--main-menu' ),
        $aplApplicatorEasyAccessNav = $html.closest( '.applicator--easy-access-nav' ),
        
        $mainHrAsEnabled = $html.closest( '.main-header-aside--enabled' ),
        
        showHideTxtCss = 'show-hide---txt',
        
        funcTerm = 'func',
        
        tabKeyActCss = 'tab-key--active',
        tabKeyInactCss = 'tab-key--inactive',
        
        $page = $( '#page' ),
        pageHeight = $page.height(),
        
        $webProductContainer = $page.find( '.wbp---cr' ),
        $webProductCopyright = $( '#web-product-copyright' ),
        copyrightHeight = $webProductCopyright.height(),
        pageShortCss = 'page--short',
        pageLongCss = 'page--long',
        
        $goContentNav = $( '#go-content-nav' ),
        
        $aplWildcard = $( '#applicator-wildcard' ),
        $aplWildcardCr = $aplWildcard.find( '.applicator-wildcard---cr' ),
        overlayTerm = 'overlay',
        overlayMu;
        
    
    
    
    
    
    /*------------------------- Overlay -------------------------*/
    function overlayActivate( funcName ) {
        
        overlayMu = $( '<div />', {
            'class': overlayTerm + ' ' + overlayTerm + '--' + funcName,
            'role' : 'presentation'
        } );
        
        $aplWildcardCr.append( overlayMu );
        
    };
    
    
    
    
    
    // ------------------------- Go to Content Nav
    function initGoContentNav( $cp ) {
        
        if ( ! $aplApplicatorGoCtNav.length ) {
			return;
		}
        
        funcName = 'go-content-nav-func';
        
        $cp
            .addClass( funcName )
            .addClass( funcTerm );
        
        overlayActivate( funcName );
        
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
        

        // Deactivate upon presseing ESC Key
        $window.load( function() {
            $document.on( 'keyup.applicator', function ( e ) {
                if ( $cp.hasClass( goCtNavActCss ) && e.keyCode == 27 ) {
                    goCtNavDeactivate();
                }
            } );
        } );
        
    } // Go to Content Nav
    initGoContentNav( $( '#go-content-nav' ) );
    
    
    
    
    
    // ------------------------- Go to Start Nav
    function initGoStartNav( $cp ) {
        
        if ( ! $aplApplicatorGoStartNav.length ) {
			return;
		}
        
        funcName = 'go-start-nav-func';
        
        $cp
            .addClass( funcName )
            .addClass( funcTerm );
        
        var $goStartNaviA = $( '#go-start-navi---a' ),
            
            goStartNavActCss = 'go-start-nav--active',
            goStartNavInactCss = 'go-start-nav--inactive',
            
            aplgoStartNavActCss = 'apl--go-start-nav--active',
            aplgoStartNavInactCss = 'apl--go-start-nav--inactive',
            
            $goStartNavArrowIco = aplDataGoStartNav.goStartNavArrowIco,
            
            $colophonHeight = $('#main-footer').height(),
            bodyOffsetCriteriaHeight,
            bodyOffsetHeight;
        
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
            bodyOffsetHeight = document.body.offsetHeight;
            
            if ( ( window.innerHeight ) <= ( bodyOffsetCriteriaHeight ) ) {

                // http://stackoverflow.com/a/40370876
                $window.scroll( function( e ) {
                    
                    if ( ( ( window.innerHeight + window.pageYOffset ) >= ( bodyOffsetHeight / 4 ) ) && ( ! window.pageYOffset == 0 ) ) {
                        goStartNavActivate();
                    } else if ( ( ( window.innerHeight + window.pageYOffset ) < ( bodyOffsetHeight / 4 ) ) || ( window.pageYOffset == 0 ) ) {
                        goStartNavDeactivate();
                    }
                    
                } );
            }
        }() );
        
    
        // Smooth Scroll to #start
        $goStartNaviA.bind( 'click.applicator', function( e ) {

            e.preventDefault();
            
            var target = $( this ).attr( "href" );

            $( 'html, body' ).stop().animate( {
                scrollTop: $( target ).offset().top
            }, 1000, 'easeInOutCirc', function() {
                location.hash = target;
            } );
            
            return false;
        } );
        
        // Add Icon to Button
        $goStartNaviAL = $goStartNaviA.find( '.go-start-navi---a_l' );
        $goStartNaviAL.append( $goStartNavArrowIco );
    }
    
    initGoStartNav( $( '#go-start-nav' ) );
    
    
    
    
    
    /*------------------------ Main Menu ------------------------*/
    function initMainMenu( $cp ) {
        
        if ( ! $aplApplicatorMainMenu.length ) {
			return;
		}
        
        if ( ! $mainHrAsEnabled.length ) {
			return;
		}
        
        funcName = 'main-menu-func';
        
        $cp
            .addClass( funcName )
            .addClass( funcTerm );
            
        overlayActivate( funcName );
        
        var mainMenuTogObjMu,
            mainMenuTogBtnMu,
            mainMenuTogBtnLmu,
            mainMenuTogBtnLTxtMu,
            
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
            $mainMenuTogBtnLTxt,
            
            $mainHrAsCtCr;
        
        // Markup
        ( function() {
            
            mainMenuTogBtnLTxtMu = $( '<span />', {
                'class': 'txt ' + showHideTxtCss,
                'text': $mainMenuHideL
            } );
            
            mainMenuTogBtnLmu = $( '<span />', {
                'class': 'b_l main-menu-tog---b_l'
            } )
                .append( mainMenuTogBtnLTxtMu )
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
                'data-name': 'Main Menu Toggle OBJ'
            } ).append( mainMenuTogBtnMu );
            
            $mainHrAsH = $cp.find( $( '.main-hr-aside---h' ) );
            $mainHrAsH.after( mainMenuTogObjMu );
        }() );
        
        $mainHrAsCt = $cp.find( '.main-hr-aside---ct' );
        
        $mainMenuTog = $cp.find( '.main-menu-toggle' );
        $mainMenuTogBtn = $( '#main-menu-tog---b' );
        $mainMenuTogBtnL = $mainMenuTogBtn.find( $( '.main-menu-tog---b_l' ) );
        $mainMenuTogBtnLTxt = $mainMenuTogBtn.find( $( '.show-hide---txt' ) );
        
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
            
            $mainMenuTogBtnLTxt.text( $mainMenuHideL );
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
            
            $mainMenuTogBtnLTxt.text( $mainMenuShowL );
            $mainMenuTogBtnL.append( $mainMenuTogBtnShowIco );
            $mainMenuTogBtnHideIco.remove();
        }
        
        // Initialize
        mainMenuDeactivate();
        
        function mainMenuResetScroll() {
            $mainHrAsCtCr = $cp.find( '.main-hr-aside---ct_cr' );
            
            $mainHrAsCtCr.scrollTop(0);
        }
        
        // Toggle
        function mainMenuToggle() {
            if ( $cp.hasClass( mainMenuInactCss ) ) {
                mainMenuActivate();
                mainMenuResetScroll();
            }
            else if ( $cp.hasClass( mainMenuActCss ) ) {
                mainMenuDeactivate();
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
        
        // For Calendar links
        // $mainMenuTogBtn.click();
        
        // Deactivate upon interaction outside specified elements
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            if ( $cp.hasClass( mainMenuActCss ) && ( ! $( e.target ).closest( $mainMenuTog ).length ) && ( ! $( e.target ).closest( $mainHrAsCt ).length ) ) {
                mainMenuDeactivate();
            }
        } );

        // Deactivate upon presseing ESC Key
        $window.load( function() {
            $document.on( 'keyup.applicator', function ( e ) {
                if ( $cp.hasClass( mainMenuActCss ) && e.keyCode == 27 ) {
                    mainMenuDeactivate();
                }
            } );
        } );
        
    } // Main Menu

    initMainMenu( $( '#main-header-aside' ) );
    
    
    
    
    
    /*------------------------ Main Search ------------------------*/
    ( function() {
        
        if ( ! $aplApplicatorMainSearch.length ) {
			return;
		}
        
        $( '#main-actions' )
            .find( $( '.main-actions---ct_cr' ) )
                .children( '.search:first' )
                    .attr( 'id', 'main-search-func' );
    }() );
    
    function initMainSearch( $cp ) {
        
        if ( ! $aplApplicatorMainSearch.length ) {
			return;
		}
        
        funcName = 'main-search-func';
        
        $cp
            .addClass( funcName )
            .addClass( funcTerm );
        
        var mainSearchTogObjMu,
            mainSearchTogBtnMu,
            mainSearchTogBtnLmu,
            mainSearchTogBtnLTxtMu,
            
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
            $mainSearchTogBtnLTxt,
            
            $arbitNavSubmitAxnBl,
            $arbitNavResetAxnBl,
            
            $mainSearchInput,
            $mainSearchResetBtn;
        
        // Build Markup
        ( function() {
            
            mainSearchTogBtnLTxtMu = $( '<span />', {
                'class': 'txt ' + showHideTxtCss,
                'text': $mainSearchHideL
            } );
            
            mainSearchTogBtnLmu = $( '<span />', {
                'class': 'b_l main-search-tog---b_l'
            } )
                .append( mainSearchTogBtnLTxtMu )
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
                'data-name': 'Main Search Toggle OBJ'
            } ).append( mainSearchTogBtnMu );
            
        }() );
        
        $mainSearchCt = $cp.find( '.search---ct' );
        
        $mainSearchH = $cp.find( $( '.search---h' ) );
        $mainSearchH.after( mainSearchTogObjMu );
        
        $mainSearchTog = $cp.find( '.main-search-toggle' );
        $mainSearchTogBtn = $( '#main-search-tog---b' );
        $mainSearchTogBtnL = $mainSearchTogBtn.find( $( '.main-search-tog---b_l' ) );
        $mainSearchTogBtnLTxt = $mainSearchTogBtn.find( $( '.show-hide---txt' ) );
        
        $mainSearchInput = $cp.find( '.search-term-crt-search---input-text' );
        $mainSearchResetBtn = $cp.find( '.search-form-reset-axn---b' );
        
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
            
            $mainSearchTogBtnLTxt.text( $mainSearchHideL );
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
            
            $mainSearchTogBtnLTxt.text( $mainSearchShowL );
            $mainSearchTogBtnL.append( $mainSearchTogSearchIco );
            $mainSearchTogDismissIco.remove();
        }
        
        // Initialize
        mainSearchDeactivate();
        
        // Toggle
        function mainSearchToggle() {
            if ( $cp.hasClass( mainSearchInactCss ) ) {
                mainSearchActivate();
            }
            else if ( $cp.hasClass( mainSearchActCss ) ) {
                mainSearchDeactivate();
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
        $window.load( function() {
            $document.on( 'keyup.applicator', function ( e ) {
                if ( $cp.hasClass( mainSearchActCss ) && e.keyCode == 27 ) {
                    mainSearchDeactivate();
                }
            } );
        } );
        
        // Add Icons to Buttons
        $mainSearchFormAxns = $cp.find( '.search-form-axns' );
        $mainSearchBL = $mainSearchFormAxns.find( '.search-form-search-axn---b_l' );
        $mainSearchResetBL = $mainSearchFormAxns.find( '.search-form-reset-axn---b_l' );
        $mainSearchBL.append( $mainSearchSearchIco );
        $mainSearchResetBL.append( $mainSearchDismissIco );
        
    }
    initMainSearch( $( '#main-search-func' ) );
    
    
    
    
    
    // Sub-Nav | Main Menu, Widget Menu
    function initSubNav( $cp ) {
        
        if ( ! $aplApplicatorSubNav.length ) {
			return;
		}
        
        var subNavTogObjMu,
            subNavTogBtnMu,
            subNavTogBtnLmu,
            subNavTogBtnLTxtMu,
            
            subNavActCss = 'sub-nav--active',
            subNavInactCss = 'sub-nav--inactive',
            
            subNavPrevActCss = 'sub-nav--previous--active',
            subNavPrevInactCss = 'sub-nav--previous--inactive',
            
            subNavIbCss = 'sub-nav--inbound',
            subNavObLeftCss = 'sub-nav--outbound-left',
            subNavObRightCss = 'sub-nav--outbound-right',
            subNavObTopCss = 'sub-nav--outbound-top',
            subNavObBottomCss = 'sub-nav--outbound-bottom',
            
            navHoverActiveCss = 'nav-hover--active',
            navHoverInactiveCss = 'nav-hover--inactive',
            aplSubNavActCss = 'apl--sub-nav--active',
            aplSubNavInactCss = 'apl--sub-nav--inactive',
            
            $navParentItems = $( '.page_item, .menu-item' ),
            
            $mainNavItem = $cp.find( $navParentItems ),
            
            $subNavParentItems = $( '.page_item_has_children, .menu-item-has-children' ),
            $subNavGrp = $( '.page_item_has_children > .children, .menu-item-has-children > .sub-menu' ),
            
            $subNavParent,
            
            $subNavTog,
            $subNavTogBtn,
            $subNavTogBtnL,
            $subNavTogBtnLTxt,
            
            $subNavTogBtnIco = $( aplDataSubNav.subNavTogBtnIco ),
            
            $subNavTogBtnShowL = aplDataSubNav.subNavTogBtnShowL,
            $subNavTogBtnHideL = aplDataSubNav.subNavTogBtnHideL;
        
        if ( $cp.has( $subNavParentItems ) ) {
            $cp
                .addClass( 'sub-nav-func' )
                .addClass( funcTerm );
        }
        
        // Build Markup
        ( function() {
            
            subNavTogBtnLTxtMu = $( '<span />', {
                'class': 'txt ' + showHideTxtCss,
                'text': $subNavTogBtnHideL
            } );
            
            subNavTogBtnLmu = $( '<span />', {
                'class': 'b_l sub-nav-tog---b_l'
            } )
                .append( subNavTogBtnLTxtMu )
                .clone().append( $subNavTogBtnIco );
            
            // Button
            subNavTogBtnMu = $( '<button />', {
                'class': 'b sub-nav-tog---b',
                'title': $subNavTogBtnHideL
            } ).append( subNavTogBtnLmu );
            
            // Object
            subNavTogObjMu = $( '<div />', {
                'class': 'obj toggle sub-nav-toggle',
                'data-name': 'Sub-Nav Toggle OBJ'
            } ).append( subNavTogBtnMu );
            
            $cp
            .find( $subNavGrp )
                .before( subNavTogObjMu );
            
        }() );
        
        $subNavTogBtn = $cp.find( '.sub-nav-tog---b' );
        $subNavShowHideTxt = '.show-hide---txt';
        
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
            
            _this.find( $subNavShowHideTxt ).text( $subNavTogBtnHideL );
        }
        
        // Activate
        function navHoverActivate() {
            var _this = $( this );
            _this.closest( $navParentItems )
                .addClass( navHoverActiveCss )
                .removeClass( navHoverInactiveCss );
        }
        
        // Deactivate
        function navHoverDeactivate() {
            var _this = $( this );
            _this.closest( $navParentItems )
                .addClass( navHoverInactiveCss )
                .removeClass( navHoverActiveCss );
        }
        
        $cp.find( $subNavParentItems ).each( function() {
            $subNavParentItems.addClass( subNavIbCss );
        } );
        
        // Detect Element Bounds
        function subNavItemDetectBounds() {
            var _this = $( this ),
                subNavOffset,
                subNavLeftOffset,
                subNavTopOffset,
                containerWidth,
                elemWidth;
            
            $subNavParent = _this.closest( $subNavParentItems );
            
            $elem = $subNavParent.find( $subNavGrp );
            subNavOffset = $elem.offset();
            subNavLeftOffset = subNavOffset.left;
            subNavTopOffset = subNavOffset.top;
            containerWidth = $body.width();
            containerHeight = $window.height();
            elemWidth = $elem.width();
            elemHeight = $elem.height();
            
            // If outbound left
            if ( subNavLeftOffset < 0 ) {
                $subNavParent.addClass( subNavObLeftCss );
                $subNavParent.removeClass( subNavIbCss );
            }
            
            // If oubound right
            if ( ( elemWidth > containerWidth ) || ( parseInt( elemWidth, 10 ) + parseInt( subNavLeftOffset, 10 ) ) > containerWidth ) {
                $subNavParent.addClass( subNavObRightCss );
                $subNavParent.removeClass( subNavIbCss );
            }
            
            // If outbound top
            if ( subNavTopOffset < 0 ) {
                $subNavParent.addClass( subNavObTopCss );
                $subNavParent.removeClass( subNavIbCss );
            }
            
            // If outbound bottom
            if ( ( elemHeight > containerHeight ) || ( parseInt( elemHeight, 10 ) + parseInt( subNavTopOffset, 10 ) ) > containerHeight ) {
                $subNavParent.addClass( subNavObBottomCss );
                $subNavParent.removeClass( subNavIbCss );
            }
        }
        
        // Deactivate on HTML level
        function htmlSubNavDeactivate() {
            if ( ! $subNavParentItems.hasClass( subNavActCss ) ) {
                $html
                    .addClass( aplSubNavInactCss )
                    .removeClass( aplSubNavActCss );
            }
        }
        
        // Deactivate
        function subNavDeactivate() {
            var _this = $( this );
            $subNavParent = _this.closest( $subNavParentItems );
            
            $subNavParent
                .addClass( subNavInactCss )
                .removeClass( subNavActCss );
            
            htmlSubNavDeactivate();
            
            _this.attr( {
                 'aria-expanded': 'false',
                 'title': $subNavTogBtnShowL
            } );
            
            _this.find( $subNavShowHideTxt ).text( $subNavTogBtnShowL );
            
            $subNavParent
                .addClass( subNavIbCss )
                .removeClass( subNavObLeftCss )
                .removeClass( subNavObRightCss )
                .removeClass( subNavObTopCss )
                .removeClass( subNavObBottomCss );
        }
        
        // Deactivate all Sub-Nav
        function subNavAllDeactivate() {
            
            $cp.find( $subNavParentItems ).each( function() {
                var _this = $( this );
                $subNavParentItems
                    .addClass( subNavInactCss )
                    .removeClass( subNavActCss );
                
                htmlSubNavDeactivate();
                
                $subNavTogBtn.attr( {
                    'aria-expanded': 'false',
                    'title': $subNavTogBtnShowL
                } );
                
                _this.find( $subNavShowHideTxt ).text( $subNavTogBtnShowL );
            } );
            
            
            
            $cp.find( $navParentItems ).each( function() {
                var _this = $( this );
                _this
                    .addClass( subNavPrevInactCss )
                    .removeClass( subNavPrevActCss );
            } );
        }
        
        // Initiate
        subNavAllDeactivate();
        
        // Deactivate Siblings
        function siblingsDeactivate() {
            var _this = $( this );
            _this.closest( $subNavParentItems ).siblings()
                .addClass( subNavInactCss )
                .removeClass( subNavActCss );
        }
        
        // Deactivate Sub Nav Siblings
        function subNavsiblingsDeactivate() {
            var _this = $( this );
            $navParent = _this.closest( $navParentItems );
            
            _this.closest( $navParent ).nextAll()
                .addClass( subNavPrevActCss )
                .removeClass( subNavPrevInactCss );
        }
        
        // Activate Sub Nav Siblings
        function subNavsiblingsActivate() {
            var _this = $( this );
            $navParent = _this.closest( $navParentItems );
            
            _this.closest( $navParent ).nextAll()
                .addClass( subNavPrevInactCss )
                .removeClass( subNavPrevActCss );
        }
        
        // Click
        ( function() {
            $subNavTogBtn.on( 'click.applicator', function( e ) {
                var _this = $( this );
                e.preventDefault();
                $subNavParent = _this.closest( $subNavParentItems );
                
                if ( $subNavParent.hasClass( subNavInactCss ) ) {
                    subNavActivate.apply( this );
                    subNavItemDetectBounds.apply( this );
                    subNavsiblingsDeactivate.apply( this );
                }
                
                else if ( $subNavParent.hasClass( subNavActCss ) ) {
                    subNavDeactivate.apply( this );
                    subNavsiblingsActivate.apply( this );
                }
                
                if ( $cp.hasClass( 'easy-access-nav-func' ) ) {
                    siblingsDeactivate.apply( this );
                }
                
                siblingsDeactivate.apply( this );
            } );
        }() );
        
        // Hover
        ( function() {
            
            $( $mainNavItem ).hover( function () {
                navHoverActivate.apply( this );
            }, function() {
                navHoverDeactivate.apply( this );
            } );
        }() );
        
        
        // Deactivate upon interaction outside specified elements
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            if ( $html.hasClass( aplSubNavActCss ) && ! $( e.target ).closest( $subNavParentItems ).length && ! $( e.target ).is( 'a' ).length ) {
                subNavAllDeactivate();
            }
        } );
        
        
        // Deactivate upon presseing ESC Key
        $window.load( function() {
            $document.on( 'keyup.applicator', function ( e ) {
                if ( $html.hasClass( aplSubNavActCss ) && e.keyCode == 27 ) {
                    subNavAllDeactivate();
                }
            } );
        } );
        
    }
    
    initSubNav( $( '#main-nav' ) );
    initSubNav( $( '.widget_nav_menu' ) );
    initSubNav( $( '.widget_pages' ) );
    
    
    
    
    
    // ------------------------- Easy Access Nav | Main Menu
    function initEasyAccessNav( $cp ) {
        
        if ( ! $aplApplicatorEasyAccessNav.length ) {
			return;
		}
        
        $cp
            .addClass( 'easy-access-nav-func' )
            .addClass( funcTerm );
    }
    initEasyAccessNav( $( '#main-nav' ) );
    
    
    
    
    
    // ------------------------- Form Validation
    ( function() {
        
        var forms = $( '#commentform' );
        
        for ( var i = 0; i < forms.length; i++ ) {
            forms[i].noValidate = true;

            forms[i].addEventListener( 'submit', function( event ) {

                //Prevent submission if checkValidity on the form returns false.
                if ( ! event.target.checkValidity() ) {
                    event.preventDefault();

                    //$('#commentform :input:visible[required="required"]').each( function () {
                    $('#commentform :input:visible').each( function () {
                        
                        var _this = $( this );

                        _this.closest( '.cr' )
                            .find( '.validity-note' ).remove();

                        if ( this.validity.valid ) {
                            
                            _this.closest( '.cp' )
                                .addClass( 'creation--valid' )
                                .removeClass( 'creation--invalid' )
                            
                        }
                        
                        if ( ! this.validity.valid ) {

                            var validityNoteTerm = 'validity-note';

                            validityNoteContainerGenericElementLabelL = $( '<div />', {
                                'class': 'l '+ validityNoteTerm +'---l',
                                'html': '<p>' + this.validationMessage + '</p>'
                            } );

                            validityNoteContainerGenericElementLabel = $( '<div />', {
                                'class': 'g_l '+ validityNoteTerm +'---g_l'
                            } ).append( validityNoteContainerGenericElementLabelL );

                            validityNoteContainerGenericElement = $( '<div />', {
                                'class': 'g '+ validityNoteTerm +'---g'
                            } ).append( validityNoteContainerGenericElementLabel );

                            validityNoteContainer = $( '<div />', {
                                'class': 'cr '+ validityNoteTerm +'---cr'
                            } ).append( validityNoteContainerGenericElement );

                            validityNote = $( '<div />', {
                                'class': 'obj note '+ validityNoteTerm +'',
                                'data-name': 'Validity Note OBJ'
                            } ).append( validityNoteContainer );

                            _this.focus();

                            _this.closest( '.cp' )
                                .addClass( 'creation--invalid' )
                                .removeClass( 'creation--valid' )
                                .find( '.cr' )
                                .append( validityNote );

                            return false;
                        }
                    } );

                    return;
                }
            }, false);
        }
    } )();
    
    
    
    
    
    /*------------------------ DOM Ready ------------------------*/
    $document.ready( function() {
		
        
        // Remove DOM Unready CSS
        $html
            .addClass( 'dom--ready' )
            .removeClass( 'dom--unready' );
        
        
        // Alias for WP Admin Bar
        if ( $body.hasClass( 'admin-bar' ) ) {
            $( '#wpadminbar' ).addClass( 'wpadminbar' );
        }
        
        
        // Initialize Tab Key CSS
        $html
            .addClass( tabKeyInactCss )
            .removeClass( tabKeyActCss );
        
        
        // No Tab Key
        $document.on( 'keydown.applicator', function ( e ) {
            var keyCode = e.keyCode || e.which; 

            if ( $html.hasClass( tabKeyInactCss ) && keyCode == 9 ) {

                $html
                    .addClass( tabKeyActCss )
                    .removeClass( tabKeyInactCss );
              }
        } );

        
        // Tab Key - Deactivate upon any interaction
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {

            if ( $html.hasClass( tabKeyActCss ) ) {
                $html
                    .addClass( tabKeyInactCss )
                    .removeClass( tabKeyActCss );
            }
        } );
        
        
        // Data Format
        ( function() {

            // Variables
            var dataFormatCss = '.data-format',
                dataFormatTerm = 'data-format',
                dataFormatPrefixCss = 'data-format--',

                dataFormatImage = dataFormatPrefixCss + 'img',
                dataFormatIframe = dataFormatPrefixCss + 'iframe',

                postContent = '.post-content---ct_cr > *',
                postContentCtCrCss = '.post-content---ct_cr',

                postContentP = '.post-content---ct_cr > p',
                alignedTerm = 'aligned',

                commentContent = '.comment-content---ct_cr > *',

                dataFormatBlockCpMu,
                dataFormatInlineCpMu;

            // Block Markup
            dataFormatBlockCpMu = $( '<div />', {
                'class': dataFormatTerm
            } );

            // Inline Markup
            dataFormatInlineCpMu = $( '<span />', {
                'class': dataFormatTerm
            } );


            // ------------ <pre>
            $( postContentCtCrCss + ' ' + '> *:has( pre )' ).each(function() {
                var $this = $( this ),
                    $pre = $this.find( 'pre' );

                $pre.wrap( dataFormatBlockCpMu )
                    .closest( dataFormatCss )
                        .addClass( dataFormatPrefixCss + 'pre' );
            });

            $( postContentCtCrCss + ' ' + '> pre' ).each(function() {
                var $this = $( this );
                $this.wrap( dataFormatBlockCpMu )
                    .closest( dataFormatCss )
                        .addClass( dataFormatPrefixCss + 'pre' );
            });


            // ------------ <img>
            $( postContent + ':has( img )' )
                .addClass( dataFormatTerm + ' ' + dataFormatImage );

            $( postContent + ':has( img.alignnone )' )
                .addClass( dataFormatTerm + ' ' + dataFormatImage + ' ' + dataFormatImage + '--not-' + alignedTerm );

            $( postContent + ':has( img.alignleft )' )
                .addClass( dataFormatTerm + ' ' + dataFormatImage + ' ' + dataFormatImage + '--left-' + alignedTerm );

            $( postContent + ':has( img.alignright )' )
                .addClass( dataFormatTerm + ' ' + dataFormatImage + ' ' + dataFormatImage + '--right-' + alignedTerm );

            $( postContent + ':has( img.aligncenter )' )
                .addClass( dataFormatTerm + ' ' + dataFormatImage + ' ' + dataFormatImage + '--center-' + alignedTerm );

            $( postContentCtCrCss + ' ' + '> img' ).each(function() {
                var $this = $( this );
                $this.wrap( dataFormatInlineCpMu )
                    .closest( dataFormatCss )
                        .addClass( dataFormatPrefixCss + 'img' );
            });


            // ------------ <code>
            $( postContentCtCrCss + ' ' + '> *:has( code )' ).each(function() {
                var $this = $( this ),
                    $code = $this.find( 'code' );

                $code.wrap( dataFormatInlineCpMu )
                    .closest( dataFormatCss )
                        .addClass( dataFormatPrefixCss + 'code' );
            });

            $( postContentCtCrCss + ' ' + '> code' ).each(function() {
                var $this = $( this );
                $this.wrap( dataFormatInlineCpMu )
                    .closest( dataFormatCss )
                        .addClass( dataFormatPrefixCss + 'code' );
            });


            // ------------ <table>
            $( postContentCtCrCss + ' ' + '> *:has( table )' ).each(function() {
                var $this = $( this ),
                    $table = $this.find( 'table' );

                $table.wrap( dataFormatBlockCpMu )
                    .closest( dataFormatCss )
                        .addClass( dataFormatPrefixCss + 'table' );
            });

            $( postContentCtCrCss + ' ' + '> table' ).each(function() {
                var $this = $( this );
                $this.wrap( dataFormatBlockCpMu )
                    .closest( dataFormatCss )
                        .addClass( dataFormatPrefixCss + 'table' );
            });


            // ------------ <iframe>
            $( postContentCtCrCss + ' ' + '> *:has( iframe )' ).each(function() {
                var $this = $( this );

                $this.addClass( dataFormatTerm + ' ' + dataFormatPrefixCss + 'iframe' );
            });

            $( postContentCtCrCss + ' ' + '> iframe' ).each(function() {
                var $this = $( this );
                $this.wrap( dataFormatInlineCpMu )
                    .closest( dataFormatCss )
                        .addClass( dataFormatPrefixCss + 'iframe' );
            });


            // ------------ Wrap text nodes in <span>
            // https://stackoverflow.com/a/18727318
            $( '.data-format' )
            .contents()
            .filter( function() {

                // Get only the text nodes
                return this.nodeType === 3;
            } )
            .wrap( '<span class="span"></span>' );

            /*

            $( '.post-content iframe' ).each(function() {
                var $this = $( this );
                $this.wrap( dataFormatBlockCpMu )
                    .closest( dataFormatCss )
                        .addClass( dataFormatPrefixCss + 'iframe' );
            });

            $( '.post-content embed' ).each(function() {
                var $this = $( this );
                $this.wrap( dataFormatBlockCpMu )
                    .closest( dataFormatCss )
                        .addClass( dataFormatPrefixCss + 'embed' );
            });
            */

         } )();
    } );
    
    
    
        
    
    /*------------------------ DOM Ready and Images Loaded ------------------------*/
    $window.load( function() {
        
        // Page Length
        ( function() {

            if ( $webProductCopyright.css( 'display' ) == 'none' ) {
                return;
            }

            function pageHeightCSS() {

                if ( ( pageHeight ) <= ( window.innerHeight ) ) {

                    $html
                        .addClass( pageShortCss )
                        .removeClass( pageLongCss );

                    $webProductContainer.css( 'padding-bottom', copyrightHeight + 'px' );
                }
                else {

                    $html
                        .addClass( pageLongCss )
                        .removeClass( pageShortCss );

                    $webProductContainer.css( 'padding-bottom', '' ).removeAttr( 'style' );
                }
            }
            pageHeightCSS();


            // Debounce
            var pageHeightDebounce = debounce( function () {
                pageHeightCSS();
            }, applicatorDebounceTimeout );

            window.addEventListener( 'resize', pageHeightDebounce );
        }() );
    } );

})( jQuery );