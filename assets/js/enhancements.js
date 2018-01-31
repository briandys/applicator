( function( $ ) {
    
    var $html = $( document.documentElement ),
        $document = $( document ),
        $window = $( window ),
        $body = $( document.body ),
        
        $htmlBody = $( 'html, body' ),
        
        // Functionalities
        $applicatorComments = $html.closest( '.applicator--comments' ),
        $aplApplicatorGoCtNav = $html.closest( '.applicator--go-content-nav' ),
        $aplApplicatorGoStartNav = $html.closest( '.applicator--go-start-nav' ),
        $aplApplicatorMainActionsWidgets = $html.closest( '.applicator--main-actions-widgets' ),
        $aplApplicatorMainMenu = $html.closest( '.applicator--main-menu' ),
        $aplApplicatorMainSearch = $html.closest( '.applicator--main-search' ),
        $applicatorPageNav = $html.closest( '.applicator--page-nav' ),
        $aplApplicatorSubNav = $html.closest( '.applicator--sub-nav' ),
        
        showHideTxtCss = 'show-hide---txt',
        showHideTxtLabelCss = 'show-hide---l',
        
        funcTerm = 'func',
        funcName,
        
        tabKeyActCss = 'tab-key--active',
        tabKeyInactCss = 'tab-key--inactive',
        
        $webProduct = $( '#web-product' ),
        $webProductContainer = $webProduct.find( '.wbp---cr' ),
        
        pageHeight,
        
        $webProductCopyright = $( '#copyright' ),
        copyrightHeight = $webProductCopyright.height(),
        pageShortCss = 'page--short',
        pageLongCss = 'page--long',
        
        applicatorMainSearchTerm = 'applicator--main-search',
        aplApplicatorMainActionsWidgetsTerm = 'applicator--main-actions-widgets',
        
        $aplWildcard = $( '#applicator-wildcard' ),
        $aplWildcardCr = $aplWildcard.find( '.applicator-wildcard---cr' ),
        overlayTerm = 'overlay',
        overlayMu,
        
        $mainActions = $( '#main-actions' ),
        
        $mainNav = $( '#main-nav' ),
        $navParentItems = $( '.page_item, .menu-item' ),
        
        mainContentAsideEnabled = 'main-content-aside--enabled',
        mainContentAsideDisabled = 'main-content-aside--disabled',
        $secondaryContent = $( '.secondary-content' ),
            
        $mainSearch,
        
        $goStartNaviA = $( '#go-start-navi---a' ),
        
        scrollMsFactor = 300,
        scrollTime;
    
    
    
    
    
    /* ------------------------ HTML_OK Component Markup ------------------------ */
    function htmlokCP( $cp, $name, $css ) {
                
        var cpMU,
            crMU,
            hrMU,
            hrCrMU,
            hMU,
            hLMU,
            ctMU,
            ctCrMU;

        // Content Markup
        ctCrMU = $( '<div />', {
            'class': 'ct_cr ' + $cp + '---ct_cr'
        } );

        ctMU = $( '<div />', {
            'class': 'ct ' + $cp + '---ct'
        } )
            .append( ctCrMU);
        
        // Header Markup
        hLMU = $( '<span />', {
            'class': 'h_l ' + $cp + '---h_l'
        } )
        .text( $name );
        
        hMU = $( '<div />', {
            'class': 'h ' + $cp + '---h'
        } )
            .append( hLMU);
        
        hrCrMU = $( '<div />', {
            'class': 'hr_cr ' + $cp + '---hr_cr'
        } )
            .append( hMU);

        hrMU = $( '<div />', {
            'class': 'hr ' + $cp + '---hr'
        } )
            .append( hrCrMU);

        // Container Markup
        crMU = $( '<div />', {
            'class': 'cr ' + $cp + '---cr'
        } )
            .append( hrMU)
            .append( ctMU);
        
        // Component Markup
        cpMU = $( '<div />', {
            'id': $cp,
            'class': 'cp ' + $css + ' ' + $cp,
            'data-name': $name + ' ' + 'CP'
        } )
            .append( crMU );

        return cpMU;
    }
    
    
    
    
    
    /* ------------------------ HTML_OK Button Object Markup ------------------------ */
    function htmlokButtonOBJ( $obj, $name, $label, $icon, $css ) {
        
        var toggleObjMU,
            toggleButtonObjMU,
            toggleButtonLabelObjMU,
            toggleButtonTextLabelObjMU,
            toggleButtonLabelTextObjMU;
        
        toggleButtonLabelTextObjMU = $( '<span />', {
            'class': 'txt ' + showHideTxtCss,
            'text': $label
        } );

        toggleButtonTextLabelObjMU = $( '<span />', {
            'class': 'l ' + $obj + '---l'
        } )
            .append( toggleButtonLabelTextObjMU );

        toggleButtonLabelObjMU = $( '<span />', {
            'class': 'b_l ' + $obj + '---b_l'
        } )
            .append( toggleButtonTextLabelObjMU )
            .append( $icon );

        // Button
        toggleButtonObjMU = $( '<button />', {
            'id' : $obj + '---b',
            'class': 'b ' + $obj + '---b',
            'title': $label
        } )
            .append( toggleButtonLabelObjMU );

        // Object
        toggleObjMU = $( '<div />', {
            'class': 'obj ' + $css + ' ' + $obj,
            'data-name': $name + ' OBJ'
        } )
            .append( toggleButtonObjMU );
        
        return toggleObjMU;
        
    }
    
    
    
    
    
    /* ------------------------ Transition Here and There ------------------------ */
    
    // Variables
    var hereTerm = 'here',
        thereTerm = 'there',
        transitionEnd = 'transitionend.applicator webkitTransitionEnd.applicator oTransitionEnd.applicator otransitionend.applicator';
    
    
    // Transition Entrance
    function transHereCSS( $elem ) {
        $elem
            .addClass( hereTerm )
            .removeClass( thereTerm );
    }
    
    // Transition Exit
    function transThereCSS( $elem ) {
        $elem
            .addClass( thereTerm )
            .removeClass( hereTerm );
    }
    
    function transHere( $elem, $property, $target ) {
        
        $elem.on( transitionEnd, function() {
            if ( event.propertyName == $property ) {
                transHereCSS( $target );
            }
        } );
        
    }
    
    function transThere( $elem, $property, $target ) {
        
        if ( $target.hasClass( hereTerm ) ) {
        
            $elem.on( transitionEnd, function() {
                if ( event.propertyName == $property ) {
                    transThereCSS( $target );
                }
            } );

        }
    
    }
    
    
    
    
    
    
    
    /* ------------------------ Remove Hash ------------------------ */
    // https://stackoverflow.com/a/5298684
    function removeHash() { 
        window.history.pushState( '', document.title, window.location.pathname );
    }
        
    
    
    
    
    
    /* ------------------------- Overlay ------------------------- */
    function overlayActivate( funcName ) {
        
        overlayMu = $( '<div />', {
            'id'   : overlayTerm + '--' + funcName,
            'class': overlayTerm + ' ' + overlayTerm + '--' + funcName,
            'role' : 'presentation'
        } );
        
        $aplWildcardCr.append( overlayMu );
        
    }
    
    
    
    
    
    /* ------------------------- Cycle Tabbing ------------------------- */
    // https://stackoverflow.com/a/21811463
    
    // Tabbing On
    function cycleTabbingOn( $cp ) {

        var inputs = $cp.find( 'a, button, input, object, select, textarea' ).filter( ':visible' ),
            firstInput = inputs.first(),
            lastInput = inputs.last();

        // Set focus on first input
        firstInput.focus();

        // Redirect last tabbing to first input
        lastInput.on( 'keydown.applicator', function( e ) {
            if ( e.which === 9 && !e.shiftKey ) {
                e.preventDefault();
                firstInput.focus();
            }
        } );

        // Redirect first shift tabbing to last input
        firstInput.on( 'keydown.applicator', function( e ) {
            if ( e.which === 9 && e.shiftKey ) {
                e.preventDefault();
                lastInput.focus();
            }
        } );
    }
    
    // Tabbing Off
    function cycleTabbingOff( $cp ) {
        var inputs = $cp.find( 'a, button, input, object, select, textarea' ).filter( ':visible' ),
            firstInput = inputs.first(),
            lastInput = inputs.last();
        
        lastInput.off( 'keydown.applicator' );
        firstInput.off( 'keydown.applicator' );
    }
    
    
    
    
    
    /* ------------------------ Remove Empty Containers ------------------------ */
    function initRemoveEmpty( $elem ) {
        $( $elem ).each( function() {
            var $this = $( this );

            if ( $this.html().replace(/\s|&nbsp;/g, '' ).length == 0 ) {
                $this.remove();
            }
        } );
    }
    
    
    
    
    
    /* ------------------------ Wrap Text Nodes ------------------------ */
    function wrapTextNode( $elem ) {
                
        var $textNodeMU = $( '<span />', { 'class': 'text-node' } );

        // https://stackoverflow.com/a/18727318
        $elem.contents().filter( function() {

            // Get only the text nodes
            return this.nodeType === 3;
        } ).wrap( $textNodeMU );

    }
    
    
    
    
    
    // ------------------------- Go to Content Nav
    function initGoContentNav( $cp ) {
        
        
        // Gatekeeper
        ( function() {
            
            if ( ! $aplApplicatorGoCtNav.length ) {
                return;
            }
            
        }() );
        
        
        // Variables
        var $goCtNaviA = $( '#go-ct-navi---a' ),
            
            goCtNavActCss = 'go-content-nav--active',
            goCtNavInactCss = 'go-content-nav--inactive',
            aplGoCtNavActCss = 'applicator--go-content-nav--active',
            aplGoCtNavInactCss = 'applicator--go-content-nav--inactive',
            $goContentNavOverlay;
        
        
        // Initializing
        ( function() {
            
            funcName = 'go-content-nav-func';
        
            $cp
                .addClass( funcName )
                .addClass( funcTerm );

            overlayActivate( funcName );
            
        }() );
        
        
        // Defining elements
        ( function() {
            
            $goContentNavOverlay = $( '#overlay--' + funcName );
            
        }() );
        
        
        // On
        function goCtNavActivate() {
            $cp
                .addClass( goCtNavActCss )
                .removeClass( goCtNavInactCss );
            $html
                .addClass( aplGoCtNavActCss )
                .removeClass( aplGoCtNavInactCss );
        }
        
        
        // Off
        function goCtNavDeactivate() {
            $cp
                .addClass( goCtNavInactCss )
                .removeClass( goCtNavActCss );
            $html
                .addClass( aplGoCtNavInactCss )
                .removeClass( aplGoCtNavActCss );
        }
        goCtNavDeactivate();
        
        
        // Focus In > Activate
        ( function() {
            
            $goCtNaviA.on( 'focusin.applicator', function() {
                goCtNavActivate();
            } );
            
        }() );
        
        
        // // Focus Out > Deactivate
        ( function() {
            
            $goCtNaviA.on( 'focusout.applicator', function() {
                goCtNavDeactivate();
            } );
            
        }() );
        
        
        // // Focus Out > Deactivate
        ( function() {
            
            $( '#go-ct-navi---a' ).on( 'click.applicator', function() {
                $( '#go-ct-navi---a' ).blur();
            } );
            
        }() );
        
        
        // Deactivate via keyboard ESC key
        ( function() {
            $window.load( function() {
                $document.on( 'keyup.applicator', function ( e ) {
                    if ( $cp.hasClass( goCtNavActCss ) && e.keyCode == 27 ) {
                        goCtNavDeactivate();
                    }
                } );
            } );
            
        }() );
        
        
        // Click Overlay
        ( function() {
            $goContentNavOverlay.on( 'click.applicator', function( e ) {
                e.preventDefault();
                goCtNavDeactivate();
            } );
        }() );
    }
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
        
        var goStartNavActCss = 'go-start-nav--active',
            goStartNavInactCss = 'go-start-nav--inactive',
            
            aplgoStartNavActCss = 'applicator--go-start-nav--active',
            aplgoStartNavInactCss = 'applicator--go-start-nav--inactive',
            
            $goStartNavArrowIco = applicatorDataGoStartNav.goStartNavArrowIco,
            
            $goStartNaviAL;
        
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
        goStartNavDeactivate();
        
        
        function goStartNav()
        {   
            var documentHeight = document.body.offsetHeight,
                windowHeight = window.innerHeight,
                windowHeightCriteria = windowHeight * 2;
            
            if ( documentHeight > windowHeightCriteria )
            {   
                $window.scrolled( function() {
                    
                    if ( $cp.hasClass( goStartNavInactCss ) && ( ( windowHeight + window.pageYOffset ) >= documentHeight ) )
                    {
                        goStartNavActivate();
                    }
                    
                    if ( $cp.hasClass( goStartNavActCss ) && window.pageYOffset == 0 )
                    {
                        goStartNavDeactivate();
                    }
                } );
            }
        }
        goStartNav();
        
        
        // Focus In > Activate
        $goStartNaviA.on( 'focusin.applicator', function() {
            goStartNavActivate();
        } );

        
        // Focus Out > Deactivate
        $goStartNaviA.on( 'focusout.applicator', function() {
            goStartNavDeactivate();
        } );

        
        // Click > Deactivate
        $goStartNaviA.on( 'click.applicator', function() {
            goStartNavDeactivate();
        } );
        
        
        // Add Icon to Button
        $goStartNaviAL = $goStartNaviA.find( '.go-start-navi---a_l' );
        $goStartNaviAL.append( $goStartNavArrowIco );
        
        
        // Resize Sensor
        new ResizeSensor( $html, function() {
            goStartNav();
        } );
    }
    
    initGoStartNav( $( '#go-start-nav' ) );

    
    
    
    
    
    /* ------------------------ Main Menu ------------------------ */
    function applicatorMainMenu( $cp ) {
        
        
        // Gatekeeper
        ( function() {
            
            if ( ! $aplApplicatorMainMenu.length ) {
                return;
            }
        
        }() );
        
        
        // Variables
        var $mainMenuWidgetItems,
            
            mainMenuActCss = 'main-menu--active',
            mainMenuInactCss = 'main-menu--inactive',
            aplMainMenuActCss = 'applicator--main-menu--active',
            aplMainMenuInactCss = 'applicator--main-menu--inactive',
            
            $mainMenuTogBtnHideIco = $( applicatorDataMainMenu.mainMenuHideIco ),
            $mainMenuTogBtnShowIco = $( applicatorDataMainMenu.mainMenuShowIco ),
            
            $mainMenuShowL = applicatorDataMainMenu.mainMenuShowL,
            $mainMenuHideL = applicatorDataMainMenu.mainMenuHideL,
            
            $mainHrAsH,
            $mainHrAsCt,
            $mainHeaderAsideCtCr,
            
            $mainMenuTog,
            
            $mainMenuTogBtn,
            $mainMenuToggleLabelText,
            
            $mainMenuDismissButton,
            
            $mainMenuOverlay,
            
            $mainHeaderAsideWidgetGroupMU,
            $mainHeaderAsideWidgetGroup;
        
        
        // Initializing
        ( function() {
            funcName = 'main-menu-func';

            $cp
                .addClass( funcName )
                .addClass( funcTerm );

            overlayActivate( funcName );
        }() );
        
        
        // Create Widget Items Container
        ( function() {
            
            $mainMenuWidgetItems = $cp.find( '.widget' );
            
            $mainHeaderAsideWidgetGroupMU = $( '<div />', {
                'class': 'grp widget-grp main-header-aside---widget-grp'
            } );
            
            // Wrap in markup
            $mainMenuWidgetItems
                .wrapAll( $mainHeaderAsideWidgetGroupMU );
            
            $mainHeaderAsideWidgetGroup = $cp.find( '.main-header-aside---widget-grp' );
            
        }() );
        
        
        // Create the Control Buttons
        ( function() {
            
            $mainHrAsH = $cp.find( $( '.main-hr-aside---h' ) );
            $mainHeaderAsideCtCr = $cp.find( $( '.main-hr-aside---ct_cr' ) );
            
            // Toggle
            $mainHrAsH.after(
                htmlokButtonOBJ(
                    'main-menu-toggle',
                    'Main Menu Toggle',
                    $mainMenuShowL,
                    $mainMenuTogBtnShowIco,
                    'toggle'
                )
            );
            
            // Dismiss
            $mainHeaderAsideCtCr.prepend(
                htmlokButtonOBJ(
                    'main-menu-dismiss',
                    'Main Menu Dismiss',
                    $mainMenuHideL,
                    $mainMenuTogBtnHideIco,
                    'dismiss'
                )
            );
        }() );
        
        
        // Defining elements
        ( function() {
        
            $mainHrAsCt = $cp.find( '.main-hr-aside---ct' );
            $mainMenuOverlay = $( '#overlay--' + funcName );

            $mainMenuTog = $cp.find( '.main-menu-toggle' );
            $mainMenuTogBtn = $( '#main-menu-toggle---b' );
            $mainMenuToggleLabelText = $mainMenuTogBtn.find( '.show-hide---txt' );

            $mainMenuDismissButton = $( '#main-menu-dismiss---b' );
            
        }() );
        
        
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
            
            $mainMenuToggleLabelText.text( $mainMenuHideL );
            
            cycleTabbingOn( $mainHeaderAsideCtCr );
        }
        
        
        // Activate and TransHere
        function mainMenuOntransHereCSS() {
            
            if ( $cp.hasClass( mainMenuInactCss ) ) {
                mainMenuActivate();
            }
            
            transHere( $mainHrAsCt, 'transform', $cp );
            transHere( $mainHrAsCt, 'transform', $mainMenuOverlay );
            
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
            
            $mainMenuToggleLabelText.text( $mainMenuShowL );
            
            cycleTabbingOff( $mainHeaderAsideCtCr );
        }
        mainMenuDeactivate();
        
        
        // Deactivate and TransThere
        function mainMenuOfftransThereCSS() {
            
            if ( $cp.hasClass( mainMenuActCss ) ) {
            
                mainMenuDeactivate();
                
                transThere( $mainHrAsCt, 'transform', $cp );
                transThere( $mainHrAsCt, 'transform', $mainMenuOverlay );
            
            }
        }
        
        
        // Toggle
        function mainMenuToggle() {
            
            if ( $cp.hasClass( mainMenuInactCss ) ) {
                mainMenuOntransHereCSS();
                $mainHeaderAsideWidgetGroup.scrollTop( 0 );
            }
            
            else if ( $cp.hasClass( mainMenuActCss ) ) {
                mainMenuOfftransThereCSS();
            }
        }
        
        
        // Click Toggle Button
        ( function() {
            $mainMenuTogBtn.on( 'click.applicator', function( e ) {
                e.preventDefault();
                mainMenuToggle();
            } );
        }() );
        
        
        // Click Dismiss Button
        ( function() {
            $mainMenuDismissButton.on( 'click.applicator', function( e ) {
                e.preventDefault();
                mainMenuOfftransThereCSS();
            } );
        }() );
        
        
        // Deactivate via external click
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            if ( ! $( e.target ).closest( $mainMenuTog ).length && ! $( e.target ).closest( $mainHrAsCt ).length ) {
                mainMenuOfftransThereCSS();
            }
        } );
          

        // Deactivate via keyboard ESC key
        $window.load( function() {
            $document.on( 'keyup.applicator', function ( e ) {
                if ( e.keyCode == 27 ) {
                    mainMenuOfftransThereCSS();
                }
            } );
        } );
        
        
        // Click Overlay
        ( function() {
            $mainMenuOverlay.on( 'click.applicator', function( e ) {
                e.preventDefault();
                mainMenuOfftransThereCSS();
            } );
        }() );
        
    }
    applicatorMainMenu( $( '#main-header-aside' ) );
    
    
    
    
    
    /* ------------------------ Comments ------------------------ */
    function applicatorComments( $cp ) {
        
        
        // Proceed only if Detail View and the Applicator CSS class name is present
        if ( ! $html.closest( '.view-granularity--detail' ) && ! $applicatorComments.length ) {
            return;
        }

        
        // Variables
        var commentsToggleObjectMU,
            commentsToggleButtonMU,
            commentsToggleButtonLabelMU,
            commentsToggleButtonTextLabelMU,
            commentsToggleButtonTextLabelTxtMU,
            
            $comments,
            
            $commentModuleH,
            $commentsToggleButton,
            $commentsToggleButtonTextLabel,
            $commentsToggleButtonTextLabelTxt,
            
            $commentsCount,
            
            $commentsShowL = applicatorDataComments.commentsShowL,
            $commentsHideL = applicatorDataComments.commentsHideL,
            $commentsDismissIco = $( applicatorDataComments.commentsDismissIco ),
            
            aplCommentsOnCSS = 'applicator--comments--active',
            aplCommentsOffCSS = 'applicator--comments--inactive',
            
            commentsOnCSS = 'comments--active',
            commentsOffCSS = 'comments--inactive'
        ;
        
        
        // Initializing
        ( function() {
            
            funcName = 'comments-func';
            
            $cp
                .addClass( funcTerm )
                .addClass( funcName );
        }() );

        
        // Build Markup
        ( function() {
            
            var commentsToggleTerm = 'comments-toggle';
            
            commentsToggleButtonTextLabelTxtMU = $( '<span />', {
                'class': 'txt ' + showHideTxtCss,
                'text': $commentsHideL
            } );

            // Text Label
            commentsToggleButtonTextLabelMU = $( '<span />', {
                'class': 'l' + ' ' + showHideTxtLabelCss
            } )
                .append( commentsToggleButtonTextLabelTxtMU );

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
        $commentsCountAction = $( '.comments-actions-snippet' ).find( '.comments-count-axn---a' );

        
        // Insert Markup
        $commentModuleH.after( commentsToggleObjectMU );
        
        
        // Define elements after inserting the markup
        $commentsToggleButton = $( '#comments-toggle---b' );
        $commentsToggleButtonTextLabel = $commentsToggleButton.find( '.show-hide---l' );
        $commentsToggleButtonTextLabelTxt = $commentsToggleButton.find( '.show-hide---txt' );
        
        // To insert beside the button label
        $commentsCount = $( '#comments-header-aside' ).find( '.comments-count---txt' );
        $commentsCount.clone().insertAfter( $commentsToggleButtonTextLabelTxt );
        
        
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
            $commentsToggleButtonTextLabelTxt.text( $commentsHideL );
            $commentsToggleButtonTextLabel.append( $commentsDismissIco );
        }
        
        
        function commentsScrollTop() {
            
            $comments = $( '#comments' );
            
            if ( ! $comments.length ) {
                return;
            }
            
            scrollTime = 300;

            $('html,body').stop().animate( {
                scrollTop: $comments.offset().top
            }, scrollTime, 'easeInOutCirc', function() {
                window.location.hash = '#comments';
            } );
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
            $commentsToggleButtonTextLabelTxt.text( $commentsShowL );
            $commentsDismissIco.remove();
        }        
        // Initialize Deactivate
        commentsDeactivate();
        
        
        // Toggle from generated button clicks
        function commentsToggle() {
            
            if ( $cp.hasClass( commentsOffCSS ) ) {
                commentsActivate();
                commentsScrollTop();
                cycleTabbingOn( $cp ); 
            }
            
            else if ( $cp.hasClass( commentsOnCSS ) ) {
                commentsDeactivate();
                removeHash();
                cycleTabbingOff( $cp );
            }
        }
        
        if ( $( '.comments-actions-snippet' ).hasClass( 'comments--empty' ) ) {
            commentsActivate();
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
            
            var $commentModule = $( '#comment-md' );
            
            if ( ! $commentModule.length ) {
                return;
            }
            
            $( 'a[href*="#comment"]' ).on( 'click.applicator', function() {
                
                if ( $cp.hasClass( commentsOffCSS ) ) {
                    commentsActivate();
                    
                    var href = $.attr( this, 'href' );
                    
                    scrollTime = 3000;

                    $htmlBody.stop().animate( {
                        scrollTop: $( href ).offset().top
                    }, scrollTime, 'easeInOutCirc', function() {
                        window.location.hash = href;
                    } );

                    return false;
                    
                }
            } );
        }() );
        
        
        // Hash
        $document.ready( function () {
            
            // Activate Comments if URL activated has #comment
            // https://stackoverflow.com/a/19889034
            if ( window.location.hash ) {
                if ( window.location.hash.indexOf( 'comment' ) != -1 && $cp.hasClass( commentsOffCSS ) ) {
                    commentsActivate();
                }
            }
        
        } );

    }
    applicatorComments( $( '#comment-md' ) );
    
    
    
    
    
    /* ------------------------ Main Search ------------------------ */
    ( function() {
        
        if ( ! $aplApplicatorMainSearch.length ) {
			return;
		}
        
        $mainActions
            .find( $( '.main-actions-aside---ct_cr' ) )
                .children( '.search:first, .widget_search:first' )
                    .attr( 'id', 'main-search' );
    }() );
    
    function initMainSearch( $cp ) {
        
        $mainSearch = $( '#main-search' );
        
        if ( ! $aplApplicatorMainSearch.length ) {
			return;
		}
        
        if ( ! $mainSearch.length ) {
            $html.removeClass( applicatorMainSearchTerm );
			return;
		}
        
        funcName = 'main-search-func';
        
        $cp.addClass( funcTerm + ' ' + funcName );
        
        var mainSearchActCss = 'main-search--active',
            mainSearchInactCss = 'main-search--inactive',
            aplmainSearchActCss = 'applicator--main-search--active',
            aplmainSearchInactCss = 'applicator--main-search--inactive',
            
            mainSearchInputEmpCss = 'main-search-input--empty',
            mainSearchInputPopCss = 'main-search-input--populated',
            
            $mainSearchTogSearchIco = $( applicatorDataMainSearch.mainSearchTogCtrlSearchIco ),
            $mainSearchTogDismissIco = $( applicatorDataMainSearch.mainSearchTogDismissIco ),
            
            $mainSearchSearchIco = $( applicatorDataMainSearch.mainSearchSearchIco ),
            $mainSearchDismissIco = $( applicatorDataMainSearch.mainSearchDismissIco ),
            
            $mainSearchShowL = applicatorDataMainSearch.mainSearchShowL,
            $mainSearchHideL = applicatorDataMainSearch.mainSearchHideL,
            
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
        
        
        // Create the toggle button
        ( function() {
            
            $mainSearchH = $cp.find( $( '.search---h' ) );
            
            $mainSearchH.after(
                htmlokButtonOBJ(
                    'main-search-toggle',
                    'Main Search Toggle',
                    $mainSearchHideL,
                    $mainSearchTogDismissIco,
                    'toggle'
                )
            );
        }() );
        
        $mainSearchCt = $cp.find( '.search---ct' );
        
        $mainSearchTog = $cp.find( '.main-search-toggle' );
        $mainSearchTogBtn = $( '#main-search-toggle---b' );
        $mainSearchTogBtnL = $mainSearchTogBtn.find( $( '.main-search-toggle---b_l' ) );
        $mainSearchTogBtnLTxt = $mainSearchTogBtn.find( $( '.show-hide---txt' ) );
        
        $mainSearchInput = $cp.find( '.search-term-crt-search---input-text' );
        $mainSearchResetBtn = $cp.find( '.search-form-reset-axn---b' );
        
        // Add Icons to Buttons
        $mainSearchFormAxns = $cp.find( '.search-form-axns' );
        $mainSearchBL = $mainSearchFormAxns.find( '.search-form-search-axn---b_l' );
        $mainSearchResetBL = $mainSearchFormAxns.find( '.search-form-reset-axn---b_l' );
        $mainSearchBL.append( $mainSearchSearchIco );
        $mainSearchResetBL.append( $mainSearchDismissIco );
        
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
            
            cycleTabbingOn( $cp );
            
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
            
            cycleTabbingOff( $cp );
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
                $cp
                    .addClass( mainSearchInputEmpCss )
                    .removeClass( mainSearchInputPopCss );
            }

            // Populated Input (as displayed by default in the input in Search Results page)
            else if ( ! $mainSearchInput.val() == '' ) {
                $cp
                    .addClass( mainSearchInputPopCss )
                    .removeClass( mainSearchInputEmpCss );
            }
        }
        mainSearchInputStatus();
        
        // Clicks
        ( function() {
            
            $mainSearchTogBtn.on( 'click.applicator', function( e ) {
                e.preventDefault();
                
                mainSearchToggle();
            } );
            
            $mainSearchResetBtn.on( 'click.applicator', function( e ) {
                e.preventDefault();
                
                $mainSearchInput.val( '' ).focus();
                mainSearchInputStatus();
            } );
            
        }() );
        
        
        // Upon entering content in input
        $mainSearchInput.on( 'keypress.applicator input.applicator', function() {
            mainSearchInputStatus();
            cycleTabbingOff( $cp );
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
            
        
        // Find if a Child Element Has Focus
        // Deactivate if no focus is present and if user is Tab key is active
        // http://ub4.underblob.com/find-if-a-child-element-has-focus/
        $cp.on( 'focusout.applicator', function() {
            var $this = $( this );
            setTimeout( function() {
                var hasFocus = !! ( $this.find( ':focus' ).length > 0 );
                if ( $html.hasClass( tabKeyActCss ) && ! hasFocus ) {
                    mainSearchDeactivate();
                }
            }, 10 );
        } );
        
    }
    initMainSearch( $( '#main-search' ) );
    
    
    
    
    
    /* ------------------------ Main Actions ------------------------ */
    function initMainActions() {
        
        
        var $mainActionsWidgetItems = $mainActions.find( '.main-actions-aside---ct_cr > .widget:not( .main-search-func )' );
        
        // Gatekeeper
        ( function() {
            if ( ! $mainActionsWidgetItems.length ) {
                $html.removeClass( aplApplicatorMainActionsWidgetsTerm );
                return;
            }

            if ( ! $aplApplicatorMainActionsWidgets.length ) {
                return;
            }
        }() );
        
        
        // Variables
        var $mainActionsWidgetsMU,
            $mainActionsWidgets,
            $mainActionsWidgetsCt,
            $mainActionsWidgetsCtCr,
            $mainActionsWidgetsH,

            $mainActionsWidgetsToggleShowLabel = applicatorDataMainActionsWidgets.mainActionsWidgetsShowLabel,
            $mainActionsWidgetsToggleHideLabel = applicatorDataMainActionsWidgets.mainActionsWidgetsHideLabel,
            $mainActionsWidgetsToggleLabel = applicatorDataMainActionsWidgets.mainActionsWidgetsToggleLabel,
            $mainActionsWidgetsToggleIcon = $( applicatorDataMainActionsWidgets.mainActionsWidgetsToggleIcon ),
            $mainActionsWidgetsToggleHideIcon = $( applicatorDataMainActionsWidgets.mainActionsWidgetsHideIcon ),

            $mainActionsWidgetsToggle,
            $mainActionsWidgetsToggleButton,
            $mainActionsWidgetsDismissButton,
            $mainActionsWidgetsToggleButtonLabelText,

            mainActionsWidgetsOnCSS = 'main-actions-widgets--active',
            mainActionsWidgetsOffCSS = 'main-actions-widgets--inactive',
            aplMainActionsWidgetsOnCSS = 'applicator--main-actions-widgets--active',
            aplMainActionsWidgetsOffCSS = 'applicator--main-actions-widgets--inactive',

            $mainActionsWidgetsWidgetGroupMU,
            $mainActionsWidgetsWidgetGroup;
        
        
        // Create Main Actions Widgets
        ( function() {

            $mainActionsWidgetsMU = htmlokCP(
                'main-actions-widgets',
                'Main Actions Widgets',
                'aside'
            );

            // Wrap in markup
            $mainActionsWidgetItems
                .wrapAll( $mainActionsWidgetsMU );
            
            
            $mainActionsWidgetsWidgetGroupMU = $( '<div />', {
                'class': 'grp widget-grp main-actions-widgets---widget-grp'
            } );

            // Wrap in markup
            $mainActionsWidgetItems
                .wrapAll( $mainActionsWidgetsWidgetGroupMU );

            
        
        }() );
        
        
        // Define initial elements
        ( function() {
            
            $mainSearch = $( '#main-search' );
            $mainActionsWidgets = $( '#main-actions-widgets' );
            $mainActionsWidgetsCt = $mainActionsWidgets.find( '.main-actions-widgets---ct' );
            $mainActionsWidgetsCtCr = $mainActionsWidgets.find( '.main-actions-widgets---ct_cr' );
            $mainActionsWidgetsH = $mainActionsWidgets.find( '.main-actions-widgets---h' );
            $mainActionsWidgetsWidgetGroup = $mainActionsWidgets.find( '.main-actions-widgets---widget-grp' );
            
        }() );
        
        
        // Initializing
        ( function() {
            
            funcName = 'main-actions-widgets-func';
            
            $mainActionsWidgets
                .addClass( funcTerm )
                .addClass( funcName );
            
            overlayActivate( funcName );
        }() );
        
        
        // Move to content markup
        ( function() {
            
            $mainActionsWidgetsWidgetGroup
                .appendTo( $mainActionsWidgetsCtCr );
            
        }() );
        
        
        // Create the Control Buttons
        ( function() {
            
            // Create Toggle Button
            $mainActionsWidgetsH.after(
                htmlokButtonOBJ(
                    'main-actions-widgets-toggle',
                    'Main Actions Widgets Toggle',
                    $mainActionsWidgetsToggleLabel,
                    $mainActionsWidgetsToggleIcon,
                    'toggle'
                )
            );

            // Create Dismiss Button
            $mainActionsWidgetsCtCr.prepend(
                htmlokButtonOBJ(
                    'main-actions-widgets-dismiss',
                    'Main Actions Widgets Dismiss',
                    $mainActionsWidgetsToggleHideLabel,
                    $mainActionsWidgetsToggleHideIcon,
                    'dismiss'
                )
            );

            // Define toggle elements
            $mainActionsWidgetsToggle = $mainActionsWidgets.find( '.main-actions-widgets-toggle' );
            $mainActionsWidgetsToggleButton = $( '#main-actions-widgets-toggle---b' );
            $mainActionsWidgetsDismissButton = $( '#main-actions-widgets-dismiss---b' );
            $mainActionsWidgetsToggleButtonLabelText = $mainActionsWidgetsToggleButton.find( '.show-hide---txt' );
            
        }() );


        // Activate
        function mainActionsWidgetsActivate() {
            $mainActionsWidgets
                .addClass( mainActionsWidgetsOnCSS )
                .removeClass( mainActionsWidgetsOffCSS );

            $html
                .addClass( aplMainActionsWidgetsOnCSS )
                .removeClass( aplMainActionsWidgetsOffCSS );

            $mainActionsWidgetsToggleButton.attr( {
                 'aria-expanded': 'true',
                 'title': $mainActionsWidgetsToggleHideLabel
            } );

            $mainActionsWidgetsToggleButtonLabelText.text( $mainActionsWidgetsToggleHideLabel );

            cycleTabbingOn( $mainActionsWidgetsCtCr );
        }


        // Deactivate
        function mainActionsWidgetsDeactivate() {
            $mainActionsWidgets
                .addClass( mainActionsWidgetsOffCSS )
                .removeClass( mainActionsWidgetsOnCSS );

            $html
                .addClass( aplMainActionsWidgetsOffCSS )
                .removeClass( aplMainActionsWidgetsOnCSS );

            $mainActionsWidgetsToggleButton.attr( {
                 'aria-expanded': 'false',
                 'title': $mainActionsWidgetsToggleShowLabel
            } );

            $mainActionsWidgetsToggleButtonLabelText.text( $mainActionsWidgetsToggleShowLabel );

            cycleTabbingOff( $mainActionsWidgetsCtCr );
        }
        mainActionsWidgetsDeactivate();


        // Toggle
        function mainActionsWidgetsToggle() {

            if ( $mainActionsWidgets.hasClass( mainActionsWidgetsOffCSS ) ) {
                
                mainActionsWidgetsActivate();
                
                transHere( $mainActionsWidgetsCt, 'opacity', $mainActionsWidgets );
                
                $mainActionsWidgetsWidgetGroup.scrollTop( 0 );
            
            }
            else if ( $mainActionsWidgets.hasClass( mainActionsWidgetsOnCSS ) ) {
                
                mainActionsWidgetsDeactivate();
                
                transThere( $mainActionsWidgetsCt, 'opacity', $mainActionsWidgets );
            
            }
        }


        // Toggle Click
        ( function() {
            $mainActionsWidgetsToggleButton.on( 'click.applicator', function( e ) {
                e.preventDefault();
                mainActionsWidgetsToggle();
            } );
        }() );


        // Dismiss Click
        ( function() {
            $mainActionsWidgetsDismissButton.on( 'click.applicator', function( e ) {
                
                e.preventDefault();
                
                mainActionsWidgetsDeactivate();
                
                transThere( $mainActionsWidgetsCt, 'opacity', $mainActionsWidgets );
            
            } );
        }() );


        // Deactivate via external click
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            if ( $mainActionsWidgets.hasClass( mainActionsWidgetsOnCSS ) && ( ! $( e.target ).closest( $mainActionsWidgetsToggle ).length ) && ( ! $( e.target ).closest( $mainActionsWidgetsCt ).length ) ) {
                
                mainActionsWidgetsDeactivate();
                
                transThere( $mainActionsWidgetsCt, 'opacity', $mainActionsWidgets );
            
            }
        } );


        // Deactivate via keyboard ESC key
        $window.load( function() {
            $document.on( 'keyup.applicator', function ( e ) {
                if ( $mainActionsWidgets.hasClass( mainActionsWidgetsOnCSS ) && e.keyCode == 27 ) {
                    
                    mainActionsWidgetsDeactivate();
                    
                    transThere( $mainActionsWidgetsCt, 'opacity', $mainActionsWidgets );
                
                }
            } );
        } );
        
    }
    initMainActions();
    
    
    
    
    /* ------------------------ Sub-Nav ------------------------ */
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
            
            $mainNavItem = $cp.find( $navParentItems ),
            
            $subNavParentItems = $( '.page_item_has_children, .menu-item-has-children' ),
            $subNavGrp = $( '.page_item_has_children > .children, .menu-item-has-children > .sub-menu' ),
            
            $subNavParent,
            
            $subNavTogBtn,
            
            $subNavShowHideTxt,
            
            $navParent,
            
            $subNavTogBtnIco = $( applicatorDataSubNav.subNavTogBtnIco ),
            
            $subNavTogBtnShowL = applicatorDataSubNav.subNavTogBtnShowL,
            $subNavTogBtnHideL = applicatorDataSubNav.subNavTogBtnHideL;
        
        
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
            $pageNavArrowIco = applicatorDataPageNav.pageNavArrowIco;
        
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
    
    
    
    
    
    /* ------------------------ Breadcrumbs ------------------------ */
    var $breadcrumbsNaviAncestor = $( '.breadcrumbs-navi--ancestor' ),
        $breadcrumbsLink = $breadcrumbsNaviAncestor.find( '.breadcrumbs-navi---a' ),
        $breadcrumbsIco = $( applicatorDataBreadcrumbs.breadcrumbsIco );
    
    $breadcrumbsLink.after( $breadcrumbsIco );
    
    
    
    
    
    /* ------------------------ DOM Ready ------------------------ */
    $document.ready( function() {
        
        
        /* ------------------------ Alias for WP Admin Bar ------------------------ */
        ( function() {
            
            if ( $body.hasClass( 'admin-bar' ) ) {
                $( '#wpadminbar' ).addClass( 'wpadminbar' );
            }
            
        }() );
    
    
    
    
    
        /* ------------------------ Remove Empty Elements ------------------------ */
        ( function() {
            
            initRemoveEmpty( $( '.post-content---ct_cr > *' ) );
            initRemoveEmpty( $( '.main-navi---a' ) );
            initRemoveEmpty( $( '.menu-item' ) );
            
        }() );
        
        
        
        
        
        /* ------------------------ Data Format ------------------------ */
        ( function() {

            // Variables
            var dataFormatCss = '.data-format',
                dataFormatTerm = 'data-format',
                dataFormatPrefixCss = 'data-format--',

                dataFormatImage = dataFormatPrefixCss + 'img',

                postContent = '.post-content---ct_cr > *',
                postContentChild = '.post-content---ct_cr > *',
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


            // ------------ <img>
            $( postContentChild + ':has( img )' )
                .addClass( dataFormatTerm + ' ' + dataFormatImage );

            $( postContentChild + ':has( img.alignnone )' )
                .addClass( dataFormatTerm + ' ' + dataFormatImage + ' ' + dataFormatImage + '--not-' + alignedTerm );

            $( postContentChild + ':has( img.alignleft )' )
                .addClass( dataFormatTerm + ' ' + dataFormatImage + ' ' + dataFormatImage + '--left-' + alignedTerm );

            $( postContentChild + ':has( img.alignright )' )
                .addClass( dataFormatTerm + ' ' + dataFormatImage + ' ' + dataFormatImage + '--right-' + alignedTerm );

            $( postContentChild + ':has( img.aligncenter )' )
                .addClass( dataFormatTerm + ' ' + dataFormatImage + ' ' + dataFormatImage + '--center-' + alignedTerm );

            
            $( '.post-content---ct_cr > img' ).each(function() {
                var $this = $( this );
                $this.wrap( dataFormatInlineCpMu )
                    .closest( dataFormatCss )
                        .addClass( dataFormatPrefixCss + 'img' );
            });


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


            /*
            // ------------ <code>
            $( postContentCtCrCss + ' ' + '> *:has( code )' ).each(function() {
                var $this = $( this ),
                    $code = $this.find( 'code' );

                $code.wrap( dataFormatInlineCpMu )
                    .closest( dataFormatCss )
                        .addClass( dataFormatPrefixCss + 'code' );
            });
            */

            $( postContentCtCrCss + ' ' + '> code' ).each(function() {
                var $this = $( this );
                $this.wrap( dataFormatInlineCpMu )
                    .closest( dataFormatCss )
                        .addClass( dataFormatPrefixCss + 'code' );
            });


            // ------------ <table>
            $( '.post-content---ct_cr > *:has( table ), .comment-content---ct_cr > *:has( table )' ).each(function() {
                var $this = $( this ),
                    $table = $this.find( 'table' );

                $table.wrap( dataFormatBlockCpMu )
                    .closest( dataFormatCss )
                        .addClass( dataFormatPrefixCss + 'table' );
            });

            $( postContentCtCrCss + ' ' + '> table, .comment-content---ct_cr > table' ).each(function() {
                var $this = $( this );
                $this.wrap( dataFormatBlockCpMu )
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
            $( '.post-content---ct_cr > *:has( iframe )' ).each( function() {
                var $this = $( this );
                $this.addClass( 'data-format data-format--iframe' );
            } );
            
            $( '.post-content---ct_cr > iframe' ).each( function() {
                var $this = $( this );
                $this.wrap( dataFormatInlineCpMu )
                    .closest( 'data-format' )
                        .addClass( 'data-format--iframe' );
            } );
            
            
            // ------------ <embed>
            $( '.post-content---ct_cr > *:has( embed )' ).each( function() {
                var $this = $( this );
                $this.addClass( 'data-format data-format--embed' );
            } );
            
            $( '.post-content---ct_cr > embed' ).each( function() {
                var $this = $( this );
                $this.wrap( dataFormatInlineCpMu )
                    .closest( 'data-format' )
                        .addClass( 'data-format--embed' );
            } );
            

         } )();
        
        
        
        
        
        /* ------------------------ Calendar ------------------------ */
        ( function(){
            
            wrapTextNode( $( '.widget_calendar td, .widget_calendar th' ) );
            
            $( '.widget_calendar tbody td:has( a )' ).each( function() {

                $( this ).addClass( 'widget-calendar-active-date' );

            } );

        }() );
        
        
        
        
        
        /* ------------------------ Wrap in Text Nodes ------------------------ */
        ( function(){
            
            
            wrapTextNode( $( '.data-format--img, .excerpt-link, .post-password-form label' ) );
            wrapTextNode( $( '.post-content---ct_cr' ) );
            wrapTextNode( $( '.wp-caption-text' ) );
            
            wrapTextNode( $( '.custom-html-widget' ) );
            
            initRemoveEmpty( $( '.text-node' ) );
            
        }() );
        
        
        
        
        
        /* ------------------------ Main Logo ------------------------ */
        ( function(){
            
            // Gatekeeper
            ( function(){
                
                if ( ! $( '#main-logo' ).length ) {

                    $html
                        .removeClass( 'main-logo--enabled' )
                        .addClass( 'main-logo--disabled' );

                    return;
                }
            
            }() );
        
            
            // Variables
            var $mainLogoWidth = $( '.main-logo' ).width(),
                $mainLogoHeight = $( '.main-logo' ).height(),
                $mainName = $( '.main-logo--enabled .main-name' ),
                $mainDescription = $( '.main-logo--enabled .main-description' ),
                $rootFontSize = $( ':root' ).css( 'font-size' ),
                $mainLogoWidthRem = ( ( $mainLogoWidth / parseInt( $rootFontSize ) ) + .5 ) + 'rem';
            
            // If logo is not square, compute its width
            ( function() {
                
                if ( $mainLogoWidth !== $mainLogoHeight ) {
                    $mainName.css( 'margin-left', $mainLogoWidthRem );
                    $mainDescription.css( 'margin-left', $mainLogoWidthRem );
                }
            
            }() );
            
        }() );
        
        
        
        
        
        /* ------------------------ If Main Description is visually-hidden ------------------------ */
        ( function() {
            
            if ( ! $( '.main-desc---l' ).length || $( '.main-description' ).html().replace(/\s|&nbsp;/g, '' ).length == 0 ) {
                
                $html
                    .addClass( 'main-description--empty' )
                    .removeClass( 'main-description--populated' );
                
                return;
            }
        
        }() );
        
        
        
        
        
        /* ------------------------ If Main Description is visually-hidden ------------------------ */
        ( function() {
            
            var $mainNavAnchor = $mainNav.find( 'a' );
            
            $mainNavAnchor.each( function() {
                
                var $this = $( this );
                
                if ( $this.attr( 'href' ) == '#' ) {
                    $this.addClass( 'main-navi--hash---a' );
                }
                
            } );
        
        }() );
        
        
        
        
        
        /* ------------------------ Add Anchor to Content Headings ------------------------ */
        
        ( function( $id ) {
            
            if ( ! $html.hasClass( 'view-granularity--detail' ) ) {
                return;
            }
            
            var $postContentCtCr = $( '.post-content---ct_cr' ),
                $postContentHeadings = $postContentCtCr.children( 'h1:not([id]), h2:not([id]), h3:not([id]), h4:not([id]), h5:not([id]), h6:not([id])' ),
                $postContentHeadingsID = $postContentCtCr.children( 'h1[id], h2[id], h3[id], h4[id], h5[id], h6[id]' ),
                headingAnchoredCSS = 'identified-heading',
                seen = {};
            
            
            // Look for headings with ID and add class
            $.each( $postContentHeadingsID, function() {
                
                var $this = $( this );
                    
                if ( $this.has( 'a' ) )
                {
                    $this
                        .attr( {
                            'class': headingAnchoredCSS
                        } );
                }
            } );
            
            
            // Look for headings without ID
            // https://stackoverflow.com/a/18727318
            // https://api.jquery.com/contents/
            $.each( $postContentHeadings, function( index ) {
                
                var $this = $( this ),
                    $txt = $this.text(),
                    $sectionNumber;
                
                
                // Check for duplicate text content
                // https://stackoverflow.com/a/2822974/4038774
                if ( seen[$txt] ) {
                    $sectionNumber = '-' + ( index + 1 );
                }
                else {
                    seen[$txt] = true;
                    $sectionNumber = '';
                }
                
                // The ID Attribute
                $id = 's-' + sanitizeTitle( $txt ) + $sectionNumber;
                
                $this
                    .attr( {
                        'id': $id,
                        'class': headingAnchoredCSS
                    } )
                    .contents().filter( function() {
                        return this.nodeType !== 1;
                    } ).wrap( $( '<a/>', { 'href': '#' + $id + '', 'class': headingAnchoredCSS + '---a'  } ) );
            } );
        
        }() );
        
        
        
        
        
        /* ------------------------ Video Fluid Widths ------------------------ */
        // https://css-tricks.com/NetMag/FluidWidthVideo/demo.php
        ( function() {

            var $videos = $( 'iframe[src*="//player.vimeo.com"], iframe[src*="//www.youtube.com"], iframe[src*="//www.facebook.com"], embed[src*="//v.wordpress.com"], object, embed' ),
                $container = $( '.post-content---ct_cr' ),
                $containerChild = $( '.post-content---ct_cr > *' );
            
            
            // Add Data Aspect Ratio
            $videos.each( function() {
                $( this )
                    .attr( 'data-aspect-ratio', this.height / this.width )
                    .removeAttr( 'width' )
                    .removeAttr( 'height' )
                    .closest( $containerChild ).addClass( 'data-format--video' );
            } );

            
            // Define New Width and Height
            $( window ).resize( function() {
                var newWidth = $container.width(),
                    $hdVideos = $( 'iframe[data-aspect-ratio], embed[data-aspect-ratio]' );
            
                $videos.each(function() {
                    var $this = $( this );
                    
                    $this
                        .width( newWidth )
                        .height( newWidth * $this.attr( 'data-aspect-ratio' ) );
                } );
                
                // Define HD Videos
                $hdVideos.each( function() {
                    var $this = $( this );

                    if ( $this.attr( 'data-aspect-ratio' ) >= '0.5' && $this.attr( 'data-aspect-ratio' ) <= '0.6' ) {
                        $this.closest( $containerChild ).addClass( 'data-format--video--hd' );
                    }

                } );

            } ).resize();

        }() );
        
    
    } );
    /* ------------------------ End DOM Ready ------------------------ */
    
    
    
        
    
    /* ------------------------ DOM Ready and Images Loaded ------------------------ */
    $window.load( function() {
        
        
        /* ------------------------ Remove Window Unloaded ------------------------ */
        ( function(){
            
            $html
                .addClass( 'window--loaded' )
                .removeClass( 'window--unloaded' );
            
        }() );
        
        
        
        
        
        /* ------------------------ Page Length ------------------------ */
        ( function() {

            if ( ! $webProductCopyright.length || $webProductCopyright.css( 'margin' ) == '-1px' || $webProductCopyright.is( ':hidden' ) ) {
                return;
            }
            
            function pageHeightCSS() {
                
                pageHeight = $webProduct.height();

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
            
            
            new ResizeSensor( $html, function() {
                pageHeightCSS();
            } );
        
        }() );
        
        
        
        
        
        /* ------------------------ Secondary Content ------------------------ */
        ( function() {

            if ( $secondaryContent.css( 'margin' ) == '-1px' || $secondaryContent.is( ':hidden' ) ) {
                $html
                    .addClass( mainContentAsideDisabled )
                    .removeClass( mainContentAsideEnabled );
            }
        
        }() );
    
    
    } );
    /* ------------------------ End DOM Ready and Images Loaded ------------------------ */
    
    
    
    
    
    /* ------------------------ Remove DOM Unready CSS ------------------------ */
    ( function(){
        
        $html
            .addClass( 'dom--ready' )
            .removeClass( 'dom--unready' );
        
    }() );
    
    
    
    
    
    /* ------------------------ Avoid tabbing on Visually Hidden elements ------------------------ */
    // https://stackoverflow.com/q/2239567
    ( function() {

        $( 'a:not( #go-ct-navi---a ), button' ).each( function() {
            var $this = $( this );

            if ( $this.parents().filter( function() { return $( this ).css( 'margin' ) == '-1px'; } ).eq( 0 ).css( 'margin' ) ) {
                $this.attr( 'tabindex', -1 );
            }
            
        } );

    }() );
    
    
    
    
    
    /* ------------------------ Tab Key ------------------------ */
    ( function(){
        
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
        
    }() );
    
    
    
    
    
    /* ------------------------ Smooth Scrolling ------------------------ */
    // https://stackoverflow.com/a/7717572
    ( function() {
        
        $window.scrolled( function() {
            
            $( 'a[href^="#"]:not( #go-start-navi---a ):not( a[href*="#comment"] )' ).on( 'click.applicator', function() {
                var href = $.attr( this, 'href' ),
                    pageYOffset = window.pageYOffset,
                    innerHeight = window.innerHeight,
                    howManyPagesOffset = pageYOffset / innerHeight;

                scrollTime = howManyPagesOffset * scrollMsFactor;

                $htmlBody.stop().animate( {
                    scrollTop: $( href ).offset().top
                }, scrollTime, 'easeInOutCirc', function() {
                    window.location.hash = href;                
                } );

                return false;
            } );
                
            
            $goStartNaviA.on( 'click.applicator', function() {

                var href = $.attr( this, 'href' ),
                    pageYOffset = window.pageYOffset,
                    innerHeight = window.innerHeight,
                    howManyPagesOffset = pageYOffset / innerHeight;
                
                scrollTime = howManyPagesOffset * scrollMsFactor;
                
                // If offset is greater than 4 pages, turbo speed
                if ( howManyPagesOffset > 4 ) {
                    scrollTime = 300;
                }

                $htmlBody.stop().animate( {
                    scrollTop: $( href ).offset().top
                }, scrollTime, 'easeInOutCirc', function() {
                    window.location.hash = href;                
                } );

                return false;
            } );
        
        } );
    
    }() );

} )( jQuery );