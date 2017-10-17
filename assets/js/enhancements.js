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
        $applicatorComments = $html.closest( '.applicator--comments' ),
        $applicatorPageNav = $html.closest( '.applicator--page-nav' ),
        
        $mainHrAsEnabled = $html.closest( '.main-header-aside--enabled' ),
        
        showHideTxtCss = 'show-hide---txt',
        showHideTxtLabelCss = 'show-hide---l',
        
        funcTerm = 'func',
        funcName,
        
        tabKeyActCss = 'tab-key--active',
        tabKeyInactCss = 'tab-key--inactive',
        
        $page = $( '#page' ),
        
        pageHeight,
        
        $webProductContainer = $page.find( '.wbp---cr' ),
        $webProductCopyright = $( '#copyright' ),
        copyrightHeight = $webProductCopyright.height(),
        pageShortCss = 'page--short',
        pageLongCss = 'page--long',
        
        $aplWildcard = $( '#applicator-wildcard' ),
        $aplWildcardCr = $aplWildcard.find( '.applicator-wildcard---cr' ),
        overlayTerm = 'overlay',
        overlayMu;
    
    
    
    
    
    // Remove Empty Containers
    function initRemoveEmpty( $elem ) {
        $( $elem ).each( function() {
            var $this = $( this );

            if ( $this.html().replace(/\s|&nbsp;/g, '' ).length == 0 ) {
                $this.remove();
            }
        } );
    }
        
    
    
    
    
    
    /* ------------------------- Overlay ------------------------- */
    function overlayActivate( funcName ) {
        
        overlayMu = $( '<div />', {
            'class': overlayTerm + ' ' + overlayTerm + '--' + funcName,
            'role' : 'presentation'
        } );
        
        $aplWildcardCr.append( overlayMu );
        
    }
    
    
    
    
    
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
            aplGoCtNavActCss = 'applicator--go-content-nav--active',
            aplGoCtNavInactCss = 'applicator--go-content-nav--inactive';
        
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
        

        // Deactivate via keyboard ESC key
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
            
            aplgoStartNavActCss = 'applicator--go-start-nav--active',
            aplgoStartNavInactCss = 'applicator--go-start-nav--inactive',
            
            $goStartNavArrowIco = aplDataGoStartNav.goStartNavArrowIco,
            
            $goStartNaviAL,
            
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
        
        function goStartNav() {
            
            bodyOffsetCriteriaHeight = document.body.offsetHeight / 2;
            bodyOffsetHeight = document.body.offsetHeight;
            
            if ( ( window.innerHeight ) <= ( bodyOffsetCriteriaHeight ) ) {

                // http://stackoverflow.com/a/40370876
                $window.scroll( function() {
                    
                    if ( ( ( window.innerHeight + window.pageYOffset ) >= ( bodyOffsetHeight / 4 ) ) && ( ! window.pageYOffset == 0 ) ) {
                        
                        goStartNavActivate();
                    
                    }
                    else if ( ( ( window.innerHeight + window.pageYOffset ) < ( bodyOffsetHeight / 4 ) ) || ( window.pageYOffset == 0 ) ) {
                        
                        goStartNavDeactivate();
                    
                    }
                    
                } );
            }
        }
        goStartNav();
        
        new ResizeSensor( $page, function() {
            goStartNav();
        } );
        
    
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
    
    
    
    
    
    /* ------------------------ Main Menu ------------------------ */
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
            aplMainMenuActCss = 'applicator--main-menu--active',
            aplMainMenuInactCss = 'applicator--main-menu--inactive',
            
            $mainMenuTogBtnHideIco = $( aplDataMainMenu.mainMenuHideIco ),
            $mainMenuTogBtnShowIco = $( aplDataMainMenu.mainMenuShowIco ),
            
            $mainMenuShowL = aplDataMainMenu.mainMenuShowL,
            $mainMenuHideL = aplDataMainMenu.mainMenuHideL,
            
            $mainHrAsH,
            $mainHrAsCt,
            
            $mainMenuTog,
            
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
                var $this = $( this );
                e.preventDefault();
                mainMenuToggle();
                $window.scrollTop( $this.position().top );
            } );
        }() );
            
        
        
        // Find if a Child Element Has Focus
        // http://ub4.underblob.com/find-if-a-child-element-has-focus/
        $cp.on( 'focusout.applicator', function() {
            var $this = $( this );
            setTimeout( function() {
                var hasFocus = !! ( $this.find( ':focus' ).length > 0 );
                if ( ! hasFocus ) {
                    mainMenuDeactivate();
                }
            }, 10 );
        } );
        
        
        // Deactivate via external click
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            if ( $cp.hasClass( mainMenuActCss ) && ( ! $( e.target ).closest( $mainMenuTog ).length ) && ( ! $( e.target ).closest( $mainHrAsCt ).length ) ) {
                mainMenuDeactivate();
            }
        } );
          

        // Deactivate via keyboard ESC key
        $window.load( function() {
            $document.on( 'keyup.applicator', function ( e ) {
                if ( $cp.hasClass( mainMenuActCss ) && e.keyCode == 27 ) {
                    mainMenuDeactivate();
                }
            } );
        } );
        
    }
    initMainMenu( $( '#main-header-aside' ) );
    
    
    
    
    
    /* ------------------------ Comments ------------------------ */
    function initComments( $cp ) {
        
        
        // Don't proceed if Applicator Comments CSS Class name isn't found
        if ( ! $applicatorComments.length ) {
            return;
        }

        
        // Functionality Name
        funcName = 'comments-func';

        
        // Variables
        var commentsToggleObjectMU,
            commentsToggleButtonMU,
            commentsToggleButtonLabelMU,
            commentsToggleButtonTextLabelMU,
            
            $comments = $( '#comments' ),
            
            $commentModuleH,
            $commentModuleCT,
            $commentsCountAction,
            $commentsToggleButton,
            $commentsToggleButtonTextLabel,
            
            $commentsCount,
            
            $commentsShowL = aplDataComments.commentsShowL,
            $commentsHideL = aplDataComments.commentsHideL,
            
            aplCommentsOnCSS = 'applicator--comments--active',
            aplCommentsOffCSS = 'applicator--comments--inactive',
            
            commentsOnCSS = 'comments--active',
            commentsOffCSS = 'comments--inactive'
        ;

        
        // Add CSS Class names to Component
        $cp.addClass( funcTerm + ' ' + funcName );

        
        // Build Markup
        ( function() {
            
            var commentsToggleTerm = 'comments-toggle';

            // Text Label
            commentsToggleButtonTextLabelMU = $( '<span />', {
                'class': 'l' + ' ' + showHideTxtLabelCss,
                'text': $commentsHideL
            } );

            // Button Label
            commentsToggleButtonLabelMU = $( '<span />', {
                'class': 'b_l' + ' ' + commentsToggleTerm + '---b_l'
            } )
                .append( commentsToggleButtonTextLabelMU );

            // Button
            commentsToggleButtonMU = $( '<button />', {
                'id' : commentsToggleTerm + '---b',
                'class': 'b' + ' ' + commentsToggleTerm + '---b',
                'title': $commentsHideL
            } ).append( commentsToggleButtonLabelMU );

            // Object
            commentsToggleObjectMU = $( '<div />', {
                'class': 'obj toggle' + ' ' + commentsToggleTerm,
                'data-name': 'Comments Toggle OBJ'
            } ).append( commentsToggleButtonMU );

        }() );
        
        
        // Define existing elements
        $commentModuleH = $cp.find( '.comment-md---h' );
        $commentModuleCT = $cp.find( '.comment-md---ct' );
        $commentsCountAction = $( '.comments-actions-snippet' ).find( '.comments-count-axn---a' );

        
        // Insert Markup
        $commentModuleH.after( commentsToggleObjectMU );
        
        
        // Define elements after inserting the markup
        $commentsToggleButton = $( '#comments-toggle---b' );
        $commentsToggleButtonTextLabel = $commentsToggleButton.find( '.show-hide---l' );
        
        // To insert beside the button label
        $commentsCount = $( '#comments-header-aside' ).find( '.comments-count---txt' );
        $commentsCount.clone().insertAfter( $commentsToggleButtonTextLabel );
        
        
        // Activate Comments
        function commentsActivate() {
            
            $cp
                .addClass( commentsOnCSS )
                .removeClass( commentsOffCSS );
            
            $html
                .addClass( aplCommentsOnCSS )
                .removeClass( aplCommentsOffCSS );
            
            $commentsToggleButton.attr( {
                 'aria-expanded': 'true',
                 'title': $commentsHideL
                
            } );
            
            // Swap text label and icon
            $commentsToggleButtonTextLabel.text( $commentsHideL );
            
            // Mimic Target
            $window.scrollTop( $comments.position().top );
        }
        
        
        // Deactivate Comments
        function commentsDeactivate() {
            
            $cp
                .addClass( commentsOffCSS )
                .removeClass( commentsOnCSS );
            
            $html
                .addClass( aplCommentsOffCSS )
                .removeClass( aplCommentsOnCSS );
            
            $commentsToggleButton.attr( {
                 'aria-expanded': 'false',
                 'title': $commentsShowL
                
            } );
            
            // Swap text label and icon
            $commentsToggleButtonTextLabel.text( $commentsShowL );
        }
        
        // Initialize Deactivate
        commentsDeactivate();
        
        
        // Toggle
        function commentsToggle() {
            
            if ( $cp.hasClass( commentsOffCSS ) ) {
                
                commentsActivate();
                location.hash = '#comments';
            
            }
            else if ( $cp.hasClass( commentsOnCSS ) ) {
                
                commentsDeactivate();
                location.hash = '';
            }
        }
        
        
        // Button Clicks
        ( function() {
            
            $commentsToggleButton.on( 'click.applicator', function( e ) {
                e.preventDefault();
                
                commentsToggle();
            } );
        
        }() );
        
        
        // Link Clicks
        ( function() {
            
            $commentsCountAction.on( 'click.applicator', function() {
                commentsActivate();
            } );
        
        }() );
        
        
        $document.ready( function () {
            
            if ( window.location.hash.indexOf( '#comment' ) !== -1 ) {
                commentsActivate();
            }
        
        } );
        
        
        /*
        // Deactivate via external click
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            
            if ( $cp.hasClass( commentsOnCSS ) && ( ! $( e.target ).closest( $commentsToggleButton ).length && ! $( e.target ).closest( $commentModuleCT ).length && ! $( e.target ).closest( $commentsCountAction ).length ) ) {
                commentsDeactivate();
            }
        
        } );

        
        // Deactivate via keyboard ESC key
        $window.load( function() {
            
            $document.on( 'keyup.applicator', function ( e ) {
                
                if ( $cp.hasClass( commentsOnCSS ) && e.keyCode == 27 ) {
                    commentsDeactivate();
                }
                
            } );
        
        } );
        */

    }
    initComments( $( '#comment-md' ) );
    
    
    
    
    
    /* ------------------------ Main Search ------------------------ */
    ( function() {
        
        if ( ! $aplApplicatorMainSearch.length ) {
			return;
		}
        
        $( '#main-actions' )
            .find( $( '.main-actions---ct_cr' ) )
                .children( '.search:first, .widget_search:first' )
                    .attr( 'id', 'main-search' );
    }() );
    
    function initMainSearch( $cp ) {
        
        if ( ! $aplApplicatorMainSearch.length ) {
			return;
		}
        
        funcName = 'main-search-func';
        
        $cp.addClass( funcTerm + ' ' + funcName );
        
        var mainSearchTogObjMu,
            mainSearchTogBtnMu,
            mainSearchTogBtnLmu,
            mainSearchTogBtnLTxtMu,
            
            mainSearchActCss = 'main-search--active',
            mainSearchInactCss = 'main-search--inactive',
            aplmainSearchActCss = 'applicator--main-search--active',
            aplmainSearchInactCss = 'applicator--main-search--inactive',
            
            mainSearchInputEmpCss = 'main-search-input--empty',
            mainSearchInputPopCss = 'main-search-input--populated',
            
            $mainSearchTogSearchIco = $( aplDataMainSearch.mainSearchTogCtrlSearchIco ),
            $mainSearchTogDismissIco = $( aplDataMainSearch.mainSearchTogDismissIco ),
            
            $mainSearchSearchIco = $( aplDataMainSearch.mainSearchSearchIco ),
            $mainSearchDismissIco = $( aplDataMainSearch.mainSearchDismissIco ),
            
            $mainSearchShowL = aplDataMainSearch.mainSearchShowL,
            $mainSearchHideL = aplDataMainSearch.mainSearchHideL,
            
            $mainSearchH,
            $mainSearchCt,
            
            $mainSearchTog,
            $mainSearchTogBtn,
            $mainSearchTogBtnL,
            $mainSearchTogBtnLTxt,
            
            $mainSearchFormAxns,
            $mainSearchBL,
            $mainSearchResetBL,
            
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
                var $this = $( this );
                e.preventDefault();
                
                $window.scrollTop( $this.position().top );
                mainSearchToggle();
            } );
            
            $mainSearchResetBtn.on( 'click.applicator', function( e ) {
                var $this = $( this );
                e.preventDefault();
                
                $window.scrollTop( $this.position().top );
                $mainSearchInput.val( '' ).focus();
                mainSearchInputStatus();
            } );
            
        }() );
        
        $cp.on( 'focusout.applicator', function() {
            var $this = $( this );
            setTimeout( function() {
                var hasFocus = !! ( $this.find( ':focus' ).length > 0 );
                if ( ! hasFocus ) {
                    mainSearchDeactivate();
                }
            }, 10 );
        } );
        
        // Upon entering content in input
        $mainSearchInput.on( 'keypress.applicator input.applicator', function() {
            mainSearchInputStatus();
        } );
        
        // Deactivate via external click
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            if ( $cp.hasClass( mainSearchActCss ) && ( ! $( e.target ).closest( $mainSearchTog ).length && ! $( e.target ).closest( $mainSearchCt ).length ) ) {
                mainSearchDeactivate();
            }
        } );

        // Deactivate via keyboard ESC key
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
    initMainSearch( $( '#main-search' ) );
    
    
    
    
    
    // Sub-Nav for Main Menu, Widget Menu, Widget Pages
    function initSubNav( $cp ) {
        
        if ( ! $aplApplicatorSubNav.length ) {
			return;
		}
        
        
        var subNavTogObjMu,
            subNavTogBtnMu,
            subNavTogBtnLmu,
            subNavTogBtnLTxtMu,
            
            mainNavCSS = 'main-nav',
            
            subNavActCss = 'sub-nav--active',
            subNavInactCss = 'sub-nav--inactive',
            
            subNavOthersActiveCSS = 'sub-nav--others--active',
            subNavOthersInactiveCSS = 'sub-nav--others--inactive',
            
            navHoverActiveCss = 'nav-hover--active',
            navHoverInactiveCss = 'nav-hover--inactive',
            aplSubNavActCss = 'applicator--sub-nav--active',
            aplSubNavInactCss = 'applicator--sub-nav--inactive',
            
            $navParentItems = $( '.page_item, .menu-item' ),
            
            $mainNavItem = $cp.find( $navParentItems ),
            
            $subNavParentItems = $( '.page_item_has_children, .menu-item-has-children' ),
            $subNavGrp = $( '.page_item_has_children > .children, .menu-item-has-children > .sub-menu' ),
            
            $subNavParent,
            
            $subNavTogBtn,
            
            $subNavShowHideTxt,
            
            $navParent,
            
            $subNavTogBtnIco = $( aplDataSubNav.subNavTogBtnIco ),
            
            $subNavTogBtnShowL = aplDataSubNav.subNavTogBtnShowL,
            $subNavTogBtnHideL = aplDataSubNav.subNavTogBtnHideL;
        
        
        if ( $cp.has( $subNavParentItems ) ) {
            
            funcName = 'sub-nav-func';
            
            $cp.addClass( funcTerm + ' ' + funcName );
        
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
            var $this = $( this );
            
            $subNavParent = $this.closest( $subNavParentItems );
            
            $subNavParent
                .addClass( subNavActCss )
                .removeClass( subNavInactCss );
            $html
                .addClass( aplSubNavActCss )
                .removeClass( aplSubNavInactCss );
            
            $this.attr( {
                 'aria-expanded': 'true',
                 'title': $subNavTogBtnHideL
            } );
            
            $this.find( $subNavShowHideTxt ).text( $subNavTogBtnHideL );
        }
        
        
        // Hover Activate
        function navHoverActivate() {
            var $this = $( this );
            $this.closest( $navParentItems )
                .addClass( navHoverActiveCss )
                .removeClass( navHoverInactiveCss );
        }
        
        
        // Hover Deactivate
        function navHoverDeactivate() {
            var $this = $( this );
            $this.closest( $navParentItems )
                .addClass( navHoverInactiveCss )
                .removeClass( navHoverActiveCss );
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
            var $this = $( this );
            $subNavParent = $this.closest( $subNavParentItems );
            
            $subNavParent
                .addClass( subNavInactCss )
                .removeClass( subNavActCss );
            
            htmlSubNavDeactivate();
            
            $this.attr( {
                 'aria-expanded': 'false',
                 'title': $subNavTogBtnShowL
            } );
            
            $this.find( $subNavShowHideTxt ).text( $subNavTogBtnShowL );
        }
        
        
        // Deactivate all Sub-Nav
        function subNavAllDeactivate() {
            
            $cp.find( $subNavParentItems ).each( function() {
                var $this = $( this );
                $subNavParentItems
                    .addClass( subNavInactCss )
                    .removeClass( subNavActCss );
                
                htmlSubNavDeactivate();
                
                $subNavTogBtn.attr( {
                    'aria-expanded': 'false',
                    'title': $subNavTogBtnShowL
                } );
                
                $this.find( $subNavShowHideTxt ).text( $subNavTogBtnShowL );
            } );
            
            
            
            $cp.find( $navParentItems ).each( function() {
                var $this = $( this );
                $this
                    .addClass( subNavOthersInactiveCSS )
                    .removeClass( subNavOthersActiveCSS );
            } );
        }
        
        // Initiate
        subNavAllDeactivate();
        
        
        // Deactivate Siblings
        function siblingsDeactivate() {
            
            var $this = $( this );
            
            $this.closest( $subNavParentItems ).siblings()
                .addClass( subNavInactCss )
                .removeClass( subNavActCss );
        }
        
        
        // Activate Sub-Nav Siblings
        function subNavSiblingsActivate() {
            
            var $this = $( this );
            
            $navParent = $this.closest( $navParentItems );
            
            $this.closest( $navParent ).nextAll()
                .addClass( subNavOthersInactiveCSS )
                .removeClass( subNavOthersActiveCSS );
        }
        
        
        // Deactivate Sub-Nav Siblings
        function subNavSiblingsDeactivate() {
            
            var $this = $( this );
            
            $navParent = $this.closest( $navParentItems );
            
            $this.closest( $navParent ).nextAll()
                .addClass( subNavOthersActiveCSS )
                .removeClass( subNavOthersInactiveCSS );
        }
        
        
        // Click
        ( function() {
            
            $subNavTogBtn.on( 'click.applicator', function( e ) {
                
                var $this = $( this );
                
                e.preventDefault();
                
                $subNavParent = $this.closest( $subNavParentItems );
                
                if ( $subNavParent.hasClass( subNavInactCss ) ) {
                    
                    subNavActivate.apply( this );
                    
                    if ( $cp.hasClass( mainNavCSS ) ) {
                        subNavSiblingsDeactivate.apply( this );
                    }
                    
                }
                
                else if ( $subNavParent.hasClass( subNavActCss ) ) {
                    
                    subNavDeactivate.apply( this );
                    
                    if ( $cp.hasClass( mainNavCSS ) ) {
                        subNavSiblingsActivate.apply( this );
                    }
                }
                
                if ( $cp.hasClass( mainNavCSS ) ) {
                    siblingsDeactivate.apply( this );
                }
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
        
        
        // Deactivate via external click
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            if ( $html.hasClass( aplSubNavActCss ) && ! $( e.target ).closest( $subNavParentItems ).length && ! $( e.target ).is( 'a' ).length ) {
                subNavAllDeactivate();
            }
        } );
        
        
        // Deactivate via keyboard ESC key
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
    
    
    
    
    
    // ------------------------- Form Validation
    ( function() {
        
        var forms = $( '#commentform' ),
            validityNoteContainerGenericElementLabelL,
            validityNoteContainerGenericElementLabel,
            validityNoteContainerGenericElement,
            validityNoteContainer,
            validityNote;
        
        for ( var i = 0; i < forms.length; i++ ) {
            forms[i].noValidate = true;

            forms[i].addEventListener( 'submit', function( event ) {

                //Prevent submission if checkValidity on the form returns false.
                if ( ! event.target.checkValidity() ) {
                    event.preventDefault();

                    //$('#commentform :input:visible[required="required"]').each( function () {
                    $('#commentform :input:visible').each( function () {
                        
                        var $this = $( this );

                        $this.closest( '.cr' )
                            .find( '.validity-note' ).remove();

                        if ( this.validity.valid ) {
                            
                            $this.closest( '.cp' )
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

                            $this.focus();

                            $this.closest( '.cp' )
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
    
    
    
    
    
    /* ------------------------- Page Nav ------------------------- */
    ( function() {
        
        
        if ( ! $applicatorPageNav.length ) {
			return;
		}
        
        
        // Variables
        var $content = $( '#content' ),
            $pageNav = $content.find( '.page-nav' ),
            $pageNavGroup = $pageNav.find( 'ul' ),
            
            $pageNavItem = $pageNav.find( 'li' ),
            $pageNavItemChild = $pageNav.find( 'li > *' ),
            $adjacentNavi = $pageNav.find( 'li:has( .adjacent-navi---a_l )' ),
            $pageNavi = $pageNav.find( 'li:has( a )' ),
            
            $prevPageNaviLabel,
            $nextPageNaviLabel,
            
            $prevPageNavi,
            $nextPageNavi,
            $pageNavArrowIco = aplDataPageNav.pageNavArrowIco;
        
        funcName = 'page-nav-func';
            
        $pageNav.addClass( funcTerm + ' ' + funcName );
        $pageNavGroup.addClass( 'grp page-nav---grp' );
        
        // Generic Page Nav Item
        $pageNavItem.each( function() {
            
            var $this = $( this );
            
            $this.addClass( 'li item obj' );
        
        } );
        
        // Adjacent Nav Item
        $adjacentNavi.each( function() {
            
            var $this = $( this );
            
            $this
                .addClass( 'adjacent-navi' )
                .find( 'a' ).addClass( 'adjacent-nav---a' );
            
        } );
        
        $pageNavItemChild.each( function() {
            
            var $this = $( this );

            if ( $this.hasClass( 'prev' ) ) {
                $this.closest( $pageNavItem ).addClass( 'prev-page-navi' );
            }

            if ( $this.hasClass( 'next' ) ) {
                $this.closest( $pageNavItem ).addClass( 'next-page-navi' );
            }

            if ( $this.hasClass( 'dots' ) ) {
                $this.closest( $pageNavItem ).addClass( 'ellipsis--delimiter' );
            }

            if ( $this.hasClass( 'current' ) ) {
                $this.closest( $pageNavItem ).addClass( 'page-navi--current' );
            }
        } );
        
        // Page Nav Item
        $pageNavi.each( function() {
            
            var $this = $( this );
            
            $this.closest( 'li' ).addClass( 'page-navi' );
            
        } );
        
        $pageNavGroup.not( ':has( .next-page-navi )' ).addClass( 'page-nav--no-next' );
        $pageNavGroup.not( ':has( .prev-page-navi )' ).addClass( 'page-nav--no-prev' );
        
        // Define created elements
        $prevPageNavi = $pageNav.find( '.prev-page-navi' );
        $prevPageNaviLabel = $prevPageNavi.find( '.adjacent-navi---a_l' );
        $nextPageNavi = $pageNav.find( '.next-page-navi' );
        $nextPageNaviLabel = $nextPageNavi.find( '.adjacent-navi---a_l' );
        
        
        // Add Icons
        $prevPageNaviLabel.append( $pageNavArrowIco );
        $nextPageNaviLabel.append( $pageNavArrowIco );
        
    } )();
    
    
    
    
    
    /* ------------------------ DOM Ready ------------------------ */
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
        $document.on( 'touchmove.applicator click.applicator', function () {

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

                postContent = '.post-content---ct_cr > *',
                postContentCtCrCss = '.post-content---ct_cr',

                alignedTerm = 'aligned',

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

            
            $( '.post-content---ct_cr > img' ).each(function() {
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
            $( '.data-format--img, .excerpt-link, .post-password-form label' )
                .contents()
                .filter( function() {

                    // Get only the text nodes
                    return this.nodeType === 3;
                } )
                .wrap( '<span class="span text-node"></span>' );
            
            // ------------ Wrap text nodes in <p>
            $( '.post-content---ct_cr' )
                .contents()
                .filter( function() {

                    // Get only the text nodes
                    return this.nodeType === 3;
                } )
                .wrap( '<p class="p text-node"></p>' );
            
            
            initRemoveEmpty( $( '.text-node' ) );

         } )();
    } );
    
    initRemoveEmpty( $( '.post-content---ct_cr > *' ) );
    initRemoveEmpty( $( '.main-navi---a' ) );
    initRemoveEmpty( $( '.menu-item' ) );
    
    
    
        
    
    /* ------------------------ DOM Ready and Images Loaded ------------------------ */
    $window.load( function() {
        
        
        // Remove Window Unloaded
        $html
            .addClass( 'window--loaded' )
            .removeClass( 'window--unloaded' );
        
        
        // If Main Description is visually-hidden
        ( function() {
            
            if ( ! $( '.main-description' ).length ) {
                return;
            }
            
            if ( $( '.main-description' ).css( 'width' ) == '1px' ) {
                $html
                    .addClass( 'main-description--empty' )
                    .removeClass( 'main-description--populated' );
            }
            else {
                $html
                    .addClass( 'main-description--populated' )
                    .removeClass( 'main-description--empty' );
            }
        }() );
        
        
        // Page Length
        ( function() {

            if ( $webProductCopyright.css( 'display' ) == 'none' ) {
                return;
            }
            
            function pageHeightCSS() {
                
                pageHeight = $page.height();

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
            
            
            new ResizeSensor( $page, function() {
                pageHeightCSS();
            } );
        
        }() );
    } );

})( jQuery );