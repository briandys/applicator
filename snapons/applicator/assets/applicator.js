(function( $ ) {
    
    var $html = $( document.documentElement ),
        $document = $( document ),
        $window = $( window ),
        
        $aplApplicatorGoCtNav = $( '.apl--applicator--go-content-nav' ),
        $aplApplicatorGoStartNav = $( '.apl--applicator--go-start-nav' ),
        $aplApplicatorArbitNavCss = $( '.apl--applicator--arbitrary-nav' ),
        
        aplApplicatorGoStartNavCss = 'apl--applicator--go-start-nav',
        aplApplicatorMainMenuCss = 'apl--applicator--main-menu',
        
        aplApplicatorSubNavCss = 'apl--applicator--sub-nav';
    
    
    
    
    
    // ------------------------- Go to Content Nav
    function initGoContent( $cp ) {
        
        if ( ! $aplApplicatorGoCtNav.length ) {
			return;
		}
        
        var $goCtNav = $( '#go-content-nav' ),
            $goCtNaviA = $( '#go-ct-navi---a' ),
            
            goCtNavActCss = 'go-content-nav--active',
            goCtNavInactCss = 'go-content-nav--inactive',
            aplGoCtNavActCss = 'apl--go-content-nav--active',
            aplGoCtNavInactCss = 'apl--go-content-nav--inactive';
        
        $goCtNav.addClass( 'func--go-content-nav' );
        
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
    function initGoStart( $cp ) {
        
        if ( ! $aplApplicatorGoStartNav.length ) {
			return;
		}
        
        var $goStartNav = $( '#go-start-nav' ),
            $goStartNaviA = $( '#go-start-navi---a' ),
            
            goStartNavActCss = 'go-start-nav--active',
            goStartNavInactCss = 'go-start-nav--inactive',
            
            aplgoStartNavActCss = 'apl--go-start-nav--active',
            aplgoStartNavInactCss = 'apl--go-start-nav--inactive',
            
            $colophonHeight = $('#colophon').height(),
            bodyOffsetCriteriaHeight,
            bodyOffsetSliceHeight,
            bodyOffsetMostHeight;
        
        $goStartNav.addClass( 'func--go-start-nav' );
        
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
            }, 600, 'linear', function() {
                location.hash = target;
            } );

            return false;
        } );
    } // Go to Start Nav
    
    initGoStart( $( '#go-start-nav' ) );
    
    
    
    
    
    // Main Menu | Main Nav - Main Header Aside
    function initMainMenu( $cp ) {
        
        if ( ! aplApplicatorMainMenuCss.length ) {
			return;
		}
        
        $cp.addClass( 'main-menu' );
        
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
            
            $mainMenuCtrl,
            $mainMenuTogBtn,
            $mainMenuTogBtnL,
            $mainMenuTogBtnLword;
        
        // Build Markup
        ( function() {
            
            mainMenuTogBtnLwordMu = $( '<span />', {
                'class': 'word show-hide-main-menu---word',
                'text': aplDataMainMenu.mainMenuHideL
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
                'title': aplDataMainMenu.mainMenuHideL
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
                'text': aplDataMainMenu.mainMenuCtrlH
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
            
            console.log( 'main-menu-ctrl abcdefghij' );
            
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
                 'title': aplDataMainMenu.mainMenuHideL
            } );
            
            $mainMenuTogBtnLword.text( aplDataMainMenu.mainMenuHideL );
            $mainMenuTogBtnL.append( $mainMenuTogBtnHideIco );
            $mainMenuTogBtnShowIco.remove();
            console.log( 'activate' );
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
                 'title': aplDataMainMenu.mainMenuShowL
            } );
            
            $mainMenuTogBtnLword.text( aplDataMainMenu.mainMenuShowL );
            $mainMenuTogBtnL.append( $mainMenuTogBtnShowIco );
            $mainMenuTogBtnHideIco.remove();
            console.log( 'deactivate' );
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
                console.log( '$mainMenuTogBtn toggle focus' );
            } );
        }() );
        
        // Deactivate upon interaction outside specified elements
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            if ( $cp.hasClass( mainMenuActCss ) && ( ! $( e.target ).closest( $mainMenuCtrl ).length && ! $( e.target ).closest( $mainMenuCtCr ).length ) ) {
                mainMenuDeactivate();
                console.log( 'Outside click' );
            }
        } );

        // Deactivate upon presseing ESC Key
        $window.load( function () {
            $( document ).on( 'keyup.applicator', function ( e ) {
                if ( $cp.hasClass( mainMenuActCss ) && e.keyCode == 27 ) {
                    mainMenuDeactivate();
                    console.log( 'ESC' );
                }
            } );
        } );
        
    } // Main Menu | Main Nav - Main Header Aside

    initMainMenu( $( '#main-nav--main-header-aside' ) );
    
    
    
    
    
    // Arbitrary Nav | Search
    ( function() {
        
        if ( ! $aplApplicatorArbitNavCss.length ) {
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
    
    function initArbitNav( $cp ) {
        
        if ( ! $aplApplicatorArbitNavCss.length ) {
			return;
		}
        
        console.log( 'Arbirary Nav Created' );
        
        var $arbitNavFunc,
            
            arbitNavCtrlMu,
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
            
            arbitNavInputEmpCss = 'arbitrary-nav-input--empty',
            arbitNavInputPopCss = 'arbitrary-nav-input--populated',
            
            $arbitNavTogCtrlSearchIco = $( aplDataArbitNav.arbitNavTogCtrlSearchIco ),
            $arbitNavTogCtrlDismissIco = $( aplDataArbitNav.arbitNavTogCtrlDismissIco ),
            
            $arbitNavSearchIco = $( aplDataArbitNav.arbitNavSearchIco ),
            $arbitNavDismissIco = $( aplDataArbitNav.arbitNavDismissIco ),
            
            $arbitNavCtrlH = aplDataArbitNav.arbitNavCtrlH,
            $arbitNavShowL = aplDataArbitNav.arbitNavShowL,
            $arbitNavHideL = aplDataArbitNav.arbitNavHideL,
            
            $arbitNavCtrl,
            
            $arbitNavTogBtn,
            $arbitNavTogBtnL,
            $arbitNavTogBtnLword,
            
            $arbitNavSubmitAxnBl,
            $arbitNavResetAxnBl,
            
            $arbitNavInput,
            $arbitNavResetBtn;
        
        // Build Markup
        ( function() {
            
            arbitNavTogBtnLwordMu = $( '<span />', {
                'class': 'word show-hide-arbitrary-nav---word',
                'text': $arbitNavHideL
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
                'title': $arbitNavHideL
            } ).append( arbitNavTogBtnLmu );
            
            // Object
            arbitNavTogObjMu = $( '<div />', {
                'class': 'obj toggle arbitrary-nav-toggle',
                'data-name': 'Search Toggle'
            } ).append( arbitNavTogBtnMu );
            
            // Containers
            arbitNavCtrlMu = $( '<div />', {
                'class': 'ctrl arbitrary-nav-ctrl',
                'data-name': 'Search Control'
            } ).append( $( '<div />', {
                'class': 'cr arbitrary-nav-ctrl---cr'
            } ) );
            
            arbitNavCtrlHmu = $( '<div />', {
                'class': 'h arbitrary-nav-ctrl---h'
            } ).append( $( '<span />', {
                'class': 'h_l arbitrary-nav-ctrl---h_l',
                'text': $arbitNavCtrlH
            } ) );
            
            arbitNavCtrlCtMu = $( '<div />', {
                'class': 'ct arbitrary-nav-ctrl---ct'
            } ).append( $( '<div />', {
                'class': 'ct_cr arbitrary-nav-ctrl---ct_cr'
            } ) );
            
            $cp
            .find( $( '.search---hr_cr' ) )
                .append( arbitNavCtrlMu )
            .find( $( '.arbitrary-nav-ctrl---cr' ) )
                .append( arbitNavCtrlHmu )
                .append( arbitNavCtrlCtMu )
            .find( $( '.arbitrary-nav-ctrl---ct_cr' ) )
                .append( arbitNavTogObjMu );
            
            console.log( 'arbitrary-nav-ctrl a' );
            
        }() );
        
        $arbitNavCtrl = $cp.find( '.arbitrary-nav-ctrl' );
        
        $arbitNavCtCr = $cp.find( '.search---ct' );
        $arbitNavTogBtn = $( '#arbitrary-nav-tog---b' );
        $arbitNavTogBtnL = $arbitNavTogBtn.find( $( '.arbitrary-nav-tog---b_l' ) );
        $arbitNavTogBtnLword = $arbitNavTogBtn.find( $( '.show-hide-arbitrary-nav---word' ) );
        
        $arbitNavInput = $cp.find( '.search-term-crt-inp--input-text' );
        $arbitNavResetBtn = $cp.find( '.search-reset-axn---b' );
        
        // Activate
        function arbitNavActivate() {
            $cp
                .addClass( arbitNavActCss )
                .removeClass( arbitNavInactCss );
            $html
                .addClass( aplArbitNavActCss )
                .removeClass( aplArbitNavInactCss );
            
            $arbitNavTogBtn.attr( {
                 'aria-expanded': 'true',
                 'title': $arbitNavHideL
            } );
            
            $arbitNavTogBtnLword.text( $arbitNavHideL );
            $arbitNavTogBtnL.append( $arbitNavTogCtrlDismissIco );
            $arbitNavTogCtrlSearchIco.remove();
            
            // Focus on input and select content if any
            $arbitNavInput.focus().select();
            
            console.log( 'activate' );
        }
        
        // Deactivate
        function arbitNavDeactivate() {
            $cp
                .addClass( arbitNavInactCss )
                .removeClass( arbitNavActCss );
            $html
                .addClass( aplArbitNavInactCss )
                .removeClass( aplArbitNavActCss );
            
            $arbitNavTogBtn.attr( {
                 'aria-expanded': 'false',
                 'title': $arbitNavShowL
            } );
            
            $arbitNavTogBtnLword.text( $arbitNavShowL );
            $arbitNavTogBtnL.append( $arbitNavTogCtrlSearchIco );
            $arbitNavTogCtrlDismissIco.remove();
            console.log( 'deactivate' );
        }
        
        // Initialize
        arbitNavDeactivate();
        
        // Toggle
        function arbitNavToggle() {
            if ( $cp.hasClass( arbitNavActCss ) ) {
                arbitNavDeactivate();
            } else if ( $cp.hasClass( arbitNavInactCss ) ) {
                arbitNavActivate();
            }
        }
        
        // Input Status
        function arbitNavInputStatus() {
            
            // Empty Input
            if ( $arbitNavInput.val() == '' ) {
                $cp.addClass( arbitNavInputEmpCss );
                $cp.removeClass( arbitNavInputPopCss );
                console.log( 'Input Empty' );
            }

            // Populated Input (as displayed by default in the input in Search Results page)
            if ( ! $arbitNavInput.val() == '' ) {
                $cp.addClass( arbitNavInputPopCss );
                $cp.removeClass( arbitNavInputEmpCss );
                console.log( 'Input Populated' );
            }
        }
        
        // Initialize
        arbitNavInputStatus();
        
        // Clicks
        ( function() {
            
            $arbitNavTogBtn.on( 'click.applicator', function( e ) {
                e.preventDefault();
                arbitNavToggle();
                console.log( '$arbitNavTogBtn toggle' );
            } );
            
            $arbitNavResetBtn.on( 'click.applicator', function( e ) {
                e.preventDefault();
                $arbitNavInput.val( '' ).focus();
                arbitNavInputStatus();
                console.log( 'Input Reset' );
            } );
            
        }() );
        
        // Upon entering content in input
        $arbitNavInput.on( 'keypress.applicator input.applicator', function() {
            arbitNavInputStatus();
        } );
        
        // Deactivate upon interaction outside specified elements
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            if ( $cp.hasClass( arbitNavActCss ) && ( ! $( e.target ).closest( $arbitNavCtrl ).length && ! $( e.target ).closest( $arbitNavCtCr ).length ) ) {
                arbitNavDeactivate();
                console.log( 'Outside click' );
            }
        } );

        // Deactivate upon presseing ESC Key
        $window.load( function () {
            $( document ).on( 'keyup.applicator', function ( e ) {
                if ( $cp.hasClass( arbitNavActCss ) && e.keyCode == 27 ) {
                    arbitNavDeactivate();
                    console.log( 'ESC' );
                }
            } );
        } );
        
        // Add Icons to Buttons
        $arbitNavSearchFormAxns = $cp.find( '.search-form-axns' );
        $arbitNavSearchBl = $arbitNavSearchFormAxns.find( '.search-submit-axn---b_l' );
        $arbitNavResetBl = $arbitNavSearchFormAxns.find( '.search-reset-axn---b_l' );
        $arbitNavSearchBl.append( $arbitNavSearchIco );
        $arbitNavResetBl.append( $arbitNavDismissIco );
        
    } // Arbitrary Nav | Search

    initArbitNav( $( '#arbitrary-nav' ) );
    
    
    
    
    
    // Sub-Nav | 
    function initSubNav( $cp ) {
        
        if ( ! $html.hasClass( aplApplicatorSubNavCss ) ) {
			return;
		}
        
        console.log( 'Sub-Nav Enter Gate' );
        
        var $subNavFunc,
            
            subNavTogObjMu,
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
            console.log( 'Has $subNavParentItems' );
            $cp.addClass( 'func--sub-nav' );
        }
        
        $subNavFunc = $( '.func--sub-nav' );
        
        // Build Markup
        ( function() {
            
            subNavTogBtnLwordMu = $( '<span />', {
                'class': 'word show-hide-sub-nav---word',
                'text': aplDataSubNav.subNavTogBtnHideL
            } );
            
            subNavTogBtnLmu = $( '<span />', {
                'class': 'b_l sub-nav-tog---b_l'
            } )
                .append( subNavTogBtnLwordMu )
                .clone().append( $subNavTogBtnIco );
            
            // Button
            subNavTogBtnMu = $( '<button />', {
                'class': 'b sub-nav-tog---b',
                'title': aplDataSubNav.subNavHideL
            } ).append( subNavTogBtnLmu );
            
            // Object
            subNavTogObjMu = $( '<div />', {
                'class': 'obj toggle sub-nav-toggle',
                'data-name': 'Sub-Nav Toggle'
            } ).append( subNavTogBtnMu );
            
            $cp
            .find( $subNavGrp )
                .before( subNavTogObjMu );
            
            console.log( 'Sub-Nav Markup Attached and Created' );
            
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
                 'title': aplDataSubNav.subNavTogBtnHideL
            } );
            
            _this.find( $subNavShowHideWord ).text( $subNavTogBtnHideL );
            
            console.log( 'subNavActivate' );
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
                 'title': aplDataSubNav.subNavTogBtnShowL
            } );
            
            _this.find( $subNavShowHideWord ).text( $subNavTogBtnShowL );
            
            console.log( 'subNavDeactivate' );
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
                    'title': aplDataSubNav.subNavTogBtnShowL
                } );
                
                _this.find( $subNavShowHideWord ).text( $subNavTogBtnShowL );
                
                console.log( '$subNavParentItems Deactivated' );
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
                     'title': aplDataSubNav.subNavTogBtnShowL
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
                     'title': aplDataSubNav.subNavTogBtnHideL
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
                    console.log( 'subNavActivate click' );
                } else if ( $subNavParent.hasClass( subNavActCss ) ) {
                    subNavDeactivate.apply( this );
                    console.log( 'subNavDeactivate click' );
                }
                
                // Deactivate Siblings
                _this.closest( $subNavParentItems ).siblings()
                    .addClass( subNavInactCss )
                    .removeClass( subNavActCss );
                console.log( '$subNavParentItems siblings Deactivated' );
            } );
        }() );
        
        // Deactivate upon interaction outside specified elements
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            if ( $html.hasClass( aplSubNavActCss ) && ! $( e.target ).closest( $subNavParentItems ).length && ! $( e.target ).length ) {
                subNavAllDeactivate();
                console.log( 'subNavAllDeactivate Outside Click' );
            }
        } );
    }
    
    initSubNav( $( '#main-nav' ) );
    initSubNav( $( '.widget_nav_menu' ) );
    /*
    
    initSubNav( $( '.widget_pages' ) );
    */

})( jQuery );