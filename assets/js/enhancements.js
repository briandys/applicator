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
        $webProductContainer = $webProduct.find( '.web-product---cr' ),
        
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
        
            
        $mainSearch,
        
        $goStartNaviA = $( '#go-start-navi---a' ),
        
        viewGranularityDetailClassName = 'view-granularity--detail',
        viewGranularityDetailClassSelector = '.view-granularity--detail';
    
    
    
    
    
    // ------------------------------------ HTML_OK Component Markup
    var htmlOkFn = {
        
        cp: function( $cp, $name, $css )
        {
                
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
                'class': 'mn_cr ' + $cp + '---mn_cr'
            } );

            ctMU = $( '<div />', {
                'class': 'mn ' + $cp + '---mn'
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
        },
        
        
        buttonObj: function( $obj, $name, $label, $icon, $css )
        {

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
    };
    
    
    
    
    
    
    // ------------------------------------ Transition Here and There
    
    var transitionFn,
        hereTerm = 'here',
        thereTerm = 'there',
        transitionEnd = 'transitionend.applicator webkitTransitionEnd.applicator oTransitionEnd.applicator otransitionend.applicator';


    transitionFn = {
        
        
        // Entrance CSS
        hereCSS: function( $elem )
        {
            $elem
                .addClass( hereTerm )
                .removeClass( thereTerm );
        },

        
        // Exit CSS
        thereCSS: function( $elem )
        {
            $elem
                .addClass( thereTerm )
                .removeClass( hereTerm );
        },

        
        // Entrance
        here: function( $elem, $property, $target )
        {
            $elem.on( transitionEnd, function() {
                if ( event.propertyName == $property )
                {
                    transitionFn.hereCSS( $target );
                }
            } );
        },

        
        // Exit
        there: function( $elem, $property, $target )
        {
            if ( $target.hasClass( hereTerm ) ) {

                $elem.on( transitionEnd, function() {
                    if ( event.propertyName == $property )
                    {
                        transitionFn.thereCSS( $target );
                    }
                } );
            }
        }
    };
    
    
    
    
    
    
    
    
    
    
    
    
    // ------------------------------------ Cycle Tabbing
    // https://stackoverflow.com/a/21811463
    
    var cycleTabbingFn = {
        
        // On
        tabOn: function( $cp ) {

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
        },

        // Off
        tabOff: function( $cp ) {
            var inputs = $cp.find( 'a, button, input, object, select, textarea' ).filter( ':visible' ),
                firstInput = inputs.first(),
                lastInput = inputs.last();

            lastInput.off( 'keydown.applicator' );
            firstInput.off( 'keydown.applicator' );
        }
        
    };
    
    
    
    
    
    
    
    // ------------------------------------ Generic Functions
    
    var genericFn = {
        
        
        // Remove Empty Elements
        removeEmptyElements: function( $elem ) {
            $( $elem ).each( function() {
                var $this = $( this );

                if ( $this.html().replace(/\s|&nbsp;/g, '' ).length == 0 ) {
                    $this.remove();
                }
            } );
        },
        
        
        // Wrap Text Nodes
        wrapTextNode: function( $elem ) {
                
            var $textNodeMU = $( '<span />', { 'class': 'text-node' } );

            // https://stackoverflow.com/a/18727318
            $elem.contents().filter( function() {

                // Get only the text nodes
                return this.nodeType === 3;
            } ).wrap( $textNodeMU );

        },
        
        
        // Remove Hash
        // https://stackoverflow.com/a/5298684
        removeHash: function() { 
            window.history.pushState( '', document.title, window.location.pathname );
        },
        
        
        // Overlay Activate
        overlayActivate: function( funcName ) {

            overlayMu = $( '<div />', {
                'id'   : overlayTerm + '--' + funcName,
                'class': overlayTerm + ' ' + overlayTerm + '--' + funcName,
                'role' : 'presentation'
            } );

            $aplWildcardCr.append( overlayMu );

        },
        
        hiddenElements: function( $elem, $onCSS, $offCSS )
        {
            if ( $elem.css( 'margin' ) == '-1px' || $elem.is( ':hidden' ) )
            {
                $body
                    .addClass( $offCSS )
                    .removeClass( $onCSS );
            }
            else
            {   
                $body
                    .addClass( $onCSS )
                    .removeClass( $offCSS );
            }
        }
    };
    
    
    
    
    
    // ------------------------------------ Comments
    function applicatorComments( $cp ) {
        
        
        // Gatekeeper
        if ( ! $body.closest( viewGranularityDetailClassSelector ) && ! $applicatorComments.length ) {
            return;
        }
        
        
        // Initialization
        ( function() {
            
            funcName = 'comments-feature';
            
            $cp
                .addClass( funcTerm )
                .addClass( funcName );
        }() );

        
        // Variables
        var commentsToggleObjectMU,
            commentsToggleButtonMU,
            commentsToggleButtonLabelMU,
            commentsToggleButtonTextLabelMU,
            commentsToggleButtonTextLabelTxtMU,
            
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
            commentsOffCSS = 'comments--inactive',
            
            commentsFn;

        
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
        
        
        commentsFn = {
            
            
            // Comments On
            on: function() {

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
            },
            
            
            // Comments Off
            off: function() {

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
            },
            
            
            // Comments Scroll Top
            scrollTop: function() {
            
                var $comments = $( '#comments' );

                if ( $comments.length ) {
                    $window.scrollTop( $comments.offset().top );
                }
            },
            
            
            // Toggle from generated button clicks
            toggle: function() {

                if ( $cp.hasClass( commentsOffCSS ) ) {
                    commentsFn.on();
                    commentsFn.scrollTop();
                    cycleTabbingFn.tabOn( $cp ); 
                }

                else if ( $cp.hasClass( commentsOnCSS ) ) {
                    commentsFn.off();
                    genericFn.removeHash();
                    cycleTabbingFn.tabOff( $cp );
                }
            }
            
        };    
        commentsFn.off();
        
        
        // Clicking links starting with #comment must activate Comment Module
        ( function() {
            
            var $commentModule = $( '#comment-md' );
            
            if ( $commentModule.length )
            {
                $( 'a[href*="#comment"]' ).on( 'click.applicator', function() {
                    if ( $cp.hasClass( commentsOffCSS ) )
                    {
                        commentsFn.on();
                    }
                } );
            }
            
        }() );
        
        
        if ( $( '.comments-actions-snippet' ).hasClass( 'comments--empty' ) ) {
            commentsFn.on();
        }
        
        
        // Button Clicks
        $commentsToggleButton.on( 'click.applicator', function( e ) {
            e.preventDefault();
            commentsFn.toggle();
        } );
        
        
        // Hash
        $document.ready( function () {
            
            // Activate Comments if URL activated has #comment
            // https://stackoverflow.com/a/19889034
            if ( window.location.hash ) {
                if ( window.location.hash.indexOf( 'comment' ) != -1 && $cp.hasClass( commentsOffCSS ) ) {
                    commentsFn.on();
                }
            }
        
        } );

    }
    applicatorComments( $( '#comment-md' ) );
    
    
    
    
    
    
    // ------------------------------------ Go to Content Nav
    function applicatorGoContentNav( $cp ) {
        
        
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

            genericFn.overlayActivate( funcName );
            
        }() );
        
        
        // Defining elements
        ( function() {
            
            $goContentNavOverlay = $( '#overlay--' + funcName );
            
        }() );
        
        
        var goContentNavFn = {
            
            // On
            on: function() {
                $cp
                    .addClass( goCtNavActCss )
                    .removeClass( goCtNavInactCss );
                $html
                    .addClass( aplGoCtNavActCss )
                    .removeClass( aplGoCtNavInactCss );
            },


            // Off
            off: function() {
                $cp
                    .addClass( goCtNavInactCss )
                    .removeClass( goCtNavActCss );
                $html
                    .addClass( aplGoCtNavInactCss )
                    .removeClass( aplGoCtNavActCss );
            }
        };
        goContentNavFn.off();
        
        
        
        
        // Focus In > Activate
        ( function() {
            
            $goCtNaviA.on( 'focusin.applicator', function() {
                goContentNavFn.on();
            } );
            
        }() );
        
        
        // // Focus Out > Deactivate
        ( function() {
            
            $goCtNaviA.on( 'focusout.applicator', function() {
                goContentNavFn.off();
            } );
            
        }() );
        
        
        // // Focus Out > Deactivate
        ( function() {
            
            $( '#go-ct-navi---a' ).on( 'click.applicator', function() {
                $( '#go-ct-navi---a' ).blur();
            } );
            
        }() );
        
        
        // Deactivate via keyboard ESC key
        $window.load( function() {
            $document.on( 'keyup.applicator', function ( e ) {
                if ( $cp.hasClass( goCtNavActCss ) && e.keyCode == 27 ) {
                    goContentNavFn.off();
                }
            } );
        } );
        
        
        // Click Overlay
        $goContentNavOverlay.on( 'click.applicator', function( e ) {
            e.preventDefault();
            goContentNavFn.off();
        } );
    }
    applicatorGoContentNav( $( '#go-content-nav' ) );

    
    
    
    
    
    // ------------------------------------ Main Menu
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
            $mainHeaderAsideWidgetGroup,
            
            mainMenuFn;
        
        
        // Initializing
        ( function() {
            funcName = 'main-menu-func';

            $cp
                .addClass( funcName )
                .addClass( funcTerm );

            genericFn.overlayActivate( funcName );
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
            
            $mainHrAsH = $cp.find( $( '.main-header-aside---h' ) );
            $mainHeaderAsideCtCr = $cp.find( $( '.main-header-aside---mn_cr' ) );
            
            // Toggle
            $mainHrAsH.after(
                htmlOkFn.buttonObj(
                    'main-menu-toggle',
                    'Main Menu Toggle',
                    $mainMenuShowL,
                    $mainMenuTogBtnShowIco,
                    'toggle'
                )
            );
            
            // Dismiss
            $mainHeaderAsideCtCr.prepend(
                htmlOkFn.buttonObj(
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
        
            $mainHrAsCt = $cp.find( '.main-header-aside---mn' );
            $mainMenuOverlay = $( '#overlay--' + funcName );

            $mainMenuTog = $cp.find( '.main-menu-toggle' );
            $mainMenuTogBtn = $( '#main-menu-toggle---b' );
            $mainMenuToggleLabelText = $mainMenuTogBtn.find( '.show-hide---txt' );

            $mainMenuDismissButton = $( '#main-menu-dismiss---b' );
            
        }() );
        
        
        // Functions
        mainMenuFn = {
            
            // On
            menuOn: function()
            {
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

                cycleTabbingFn.tabOn( $mainHeaderAsideCtCr );
            },


            // Activate and TransHere
            menuOnTransHere: function()
            {

                if ( $cp.hasClass( mainMenuInactCss ) ) {
                    mainMenuFn.menuOn();
                }

                transitionFn.here( $mainHrAsCt, 'transform', $cp );
                transitionFn.here( $mainHrAsCt, 'transform', $mainMenuOverlay );
            },


            // Deactivate
            menuOff: function()
            {
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

                cycleTabbingFn.tabOff( $mainHeaderAsideCtCr );
            },
        
            
            // Deactivate and TransThere
            menuOffTransHere: function()
            {
                if ( $cp.hasClass( mainMenuActCss ) )
                {
                    mainMenuFn.menuOff();
                    transitionFn.there( $mainHrAsCt, 'transform', $cp );
                    transitionFn.there( $mainHrAsCt, 'transform', $mainMenuOverlay );
                }
            },


            // Toggle
            menuToggle: function()
            {
                if ( $cp.hasClass( mainMenuInactCss ) )
                {
                    mainMenuFn.menuOnTransHere();
                    $mainHeaderAsideWidgetGroup.scrollTop( 0 );
                }
                else if ( $cp.hasClass( mainMenuActCss ) )
                {
                    mainMenuFn.menuOffTransHere();
                }
            }
            
        };
        mainMenuFn.menuOff();
        
        
        // Click Toggle Button
        ( function() {
            $mainMenuTogBtn.on( 'click.applicator', function( e ) {
                e.preventDefault();
                mainMenuFn.menuToggle();
            } );
        }() );
        
        
        // Click Dismiss Button
        ( function() {
            $mainMenuDismissButton.on( 'click.applicator', function( e ) {
                e.preventDefault();
                mainMenuFn.menuOffTransHere();
            } );
        }() );
        
        
        // Deactivate via external click
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            if ( ! $( e.target ).closest( $mainMenuTog ).length && ! $( e.target ).closest( $mainHrAsCt ).length ) {
                mainMenuFn.menuOffTransHere();
            }
        } );
          

        // Deactivate via keyboard ESC key
        $window.load( function() {
            $document.on( 'keyup.applicator', function ( e ) {
                if ( e.keyCode == 27 ) {
                    mainMenuFn.menuOffTransHere();
                }
            } );
        } );
        
        
        // Click Overlay
        $mainMenuOverlay.on( 'click.applicator', function( e ) {
            e.preventDefault();
            mainMenuFn.menuOffTransHere();
        } );
        
    }
    applicatorMainMenu( $( '#main-header-aside' ) );
    
    
    
    
    
    
    
    
    
    
    
    // ------------------------------------ Main Search
    ( function() {
        
        if ( ! $aplApplicatorMainSearch.length ) {
			return;
		}
        
        $mainActions
            .find( $( '.main-actions-aside---mn_cr' ) )
                .children( '.search:first, .widget_search:first' )
                    .attr( 'id', 'main-search' );
    }() );
    
    function applicatorMainSearch( $cp ) {
        
        $mainSearch = $( '#main-search' );
        
        if ( ! $aplApplicatorMainSearch.length ) {
			return;
		}
        
        if ( ! $mainSearch.length ) {
            $html.removeClass( applicatorMainSearchTerm );
			return;
		}
        
        
        // Initializing
        ( function() {
            
            funcName = 'main-search-func';
        
            $cp.addClass( funcTerm + ' ' + funcName );

            genericFn.overlayActivate( funcName );
            
        }() );
        
        
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
            $mainSearchResetBtn,
            
            $mainSearchTextInput,
            $mainSearchOverlay;
        
        
        // Create the toggle button
        ( function() {
            
            $mainSearchH = $cp.find( $( '.search---h' ) );
            
            $mainSearchH.after(
                htmlOkFn.buttonObj(
                    'main-search-toggle',
                    'Main Search Toggle',
                    $mainSearchHideL,
                    $mainSearchTogDismissIco,
                    'toggle'
                )
            );
        }() );
        
        $mainSearchCt = $cp.find( '.search---mn' );
        
        $mainSearchTog = $cp.find( '.main-search-toggle' );
        $mainSearchTogBtn = $( '#main-search-toggle---b' );
        $mainSearchTogBtnL = $mainSearchTogBtn.find( $( '.main-search-toggle---b_l' ) );
        $mainSearchTogBtnLTxt = $mainSearchTogBtn.find( $( '.show-hide---txt' ) );
        
        $mainSearchInput = $cp.find( '.search-term-crt-search---input-text' );
        $mainSearchResetBtn = $cp.find( '.search-form-reset-axn---b' );
        
        $mainSearchTextInput = $cp.find( '.search-term-crt-search-text-input' ),
        $mainSearchOverlay = $( '#overlay--' + funcName ),
        
        // Add Icons to Buttons
        $mainSearchFormAxns = $cp.find( '.search-form-axns' );
        $mainSearchBL = $mainSearchFormAxns.find( '.search-form-search-axn---b_l' );
        $mainSearchResetBL = $mainSearchFormAxns.find( '.search-form-reset-axn---b_l' );
        $mainSearchBL.append( $mainSearchSearchIco );
        $mainSearchResetBL.append( $mainSearchDismissIco );
        
        
        var mainSearchFn = {
            
            // On
            on: function() {
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

                cycleTabbingFn.tabOn( $cp );

                // Focus on input and select content if any
                $mainSearchInput.focus().select();
            },
            
            
            // Deactivate
            off: function() {
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

                cycleTabbingFn.tabOff( $cp );
            },
            
            
            onTransHere: function()
            {
                if ( $cp.hasClass( mainSearchInactCss ) ) {
                    mainSearchFn.on();
                }
                transitionFn.here( $mainSearchTextInput, 'opacity', $mainSearchOverlay );
            },
            
            
            offTransThere: function()
            {
                if ( $cp.hasClass( mainSearchActCss ) ) {
                    mainSearchFn.off();
                }
                transitionFn.there( $mainSearchTextInput, 'opacity', $mainSearchOverlay );
            },
            
            
            // Toggle
            toggle: function() {
                if ( $cp.hasClass( mainSearchInactCss ) ) {
                    mainSearchFn.onTransHere();
                }
                else if ( $cp.hasClass( mainSearchActCss ) ) {
                    mainSearchFn.offTransThere();
                }
            },
            
            
            // Input Status
            inputStatus: function() {

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
            
        };
        mainSearchFn.off();
        mainSearchFn.inputStatus();
        
        
        // Clicks
        ( function() {
            
            $mainSearchTogBtn.on( 'click.applicator', function( e ) {
                e.preventDefault();
                
                mainSearchFn.toggle();
            } );
            
            $mainSearchResetBtn.on( 'click.applicator', function( e ) {
                e.preventDefault();
                
                $mainSearchInput.val( '' ).focus();
                mainSearchFn.inputStatus();
            } );
            
        }() );
        
        
        // Upon entering content in input
        $mainSearchInput.on( 'keypress.applicator input.applicator', function() {
            mainSearchFn.inputStatus();
            cycleTabbingFn.tabOff( $cp );
        } );
        
        // Deactivate via external click
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            if ( $cp.hasClass( mainSearchActCss ) && ( ! $( e.target ).closest( $mainSearchTog ).length && ! $( e.target ).closest( $mainSearchCt ).length ) ) {
                mainSearchFn.offTransThere();
            }
        } );

        // Deactivate via keyboard ESC key
        $window.load( function() {
            $document.on( 'keyup.applicator', function ( e ) {
                if ( $cp.hasClass( mainSearchActCss ) && e.keyCode == 27 ) {
                    mainSearchFn.offTransThere();
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
                    mainSearchFn.offTransThere();
                }
            }, 10 );
        } );
        
    }
    applicatorMainSearch( $( '#main-search' ) );
    
    
    
    
    
    // ------------------------------------ Main Actions
    function applicatorMainActions() {
        
        var $mainActionsWidgetItems = $mainActions.find( '.main-actions-aside---mn_cr > .widget:not( .main-search-func )' );
        
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
            $mainActionsWidgetsWidgetGroup,
            
            mainActionsFn;
        
        
        // Create Main Actions Widgets
        ( function() {

            $mainActionsWidgetsMU = htmlOkFn.cp(
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
            $mainActionsWidgetsCt = $mainActionsWidgets.find( '.main-actions-widgets---mn' );
            $mainActionsWidgetsCtCr = $mainActionsWidgets.find( '.main-actions-widgets---mn_cr' );
            $mainActionsWidgetsH = $mainActionsWidgets.find( '.main-actions-widgets---h' );
            $mainActionsWidgetsWidgetGroup = $mainActionsWidgets.find( '.main-actions-widgets---widget-grp' );
            
        }() );
        
        
        // Initializing
        ( function() {
            
            funcName = 'main-actions-widgets-func';
            
            $mainActionsWidgets
                .addClass( funcTerm )
                .addClass( funcName );
            
            genericFn.overlayActivate( funcName );
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
                htmlOkFn.buttonObj(
                    'main-actions-widgets-toggle',
                    'Main Actions Widgets Toggle',
                    $mainActionsWidgetsToggleLabel,
                    $mainActionsWidgetsToggleIcon,
                    'toggle'
                )
            );

            // Create Dismiss Button
            $mainActionsWidgetsCtCr.prepend(
                htmlOkFn.buttonObj(
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
        
        
        // Functions
        mainActionsFn = {
            
            // Activate
            widgetsOn: function() {
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

                cycleTabbingFn.tabOn( $mainActionsWidgetsCtCr );
            },


            // Deactivate
            widgetsOff: function() {
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

                cycleTabbingFn.tabOff( $mainActionsWidgetsCtCr );
            },


            // Toggle
            widgetsToggle: function()
            {
                if ( $mainActionsWidgets.hasClass( mainActionsWidgetsOffCSS ) )
                {
                    mainActionsFn.widgetsOn();
                    transitionFn.here( $mainActionsWidgetsCt, 'opacity', $mainActionsWidgets );
                    $mainActionsWidgetsWidgetGroup.scrollTop( 0 );
                }
                else if ( $mainActionsWidgets.hasClass( mainActionsWidgetsOnCSS ) )
                {
                    mainActionsFn.widgetsOff();
                    transitionFn.there( $mainActionsWidgetsCt, 'opacity', $mainActionsWidgets );
                }
            }
            
        };
        mainActionsFn.widgetsOff();

        
        // Toggle Click
        ( function() {
            $mainActionsWidgetsToggleButton.on( 'click.applicator', function( e ) {
                e.preventDefault();
                mainActionsFn.widgetsToggle();
            } );
        }() );


        // Dismiss Click
        ( function() {
            $mainActionsWidgetsDismissButton.on( 'click.applicator', function( e ) {
                e.preventDefault();
                mainActionsFn.widgetsOff();
                transitionFn.there( $mainActionsWidgetsCt, 'opacity', $mainActionsWidgets );
            } );
        }() );


        // Deactivate via external click
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            if ( $mainActionsWidgets.hasClass( mainActionsWidgetsOnCSS ) && ( ! $( e.target ).closest( $mainActionsWidgetsToggle ).length ) && ( ! $( e.target ).closest( $mainActionsWidgetsCt ).length ) ) {
                
                mainActionsFn.widgetsOff();
                
                transitionFn.there( $mainActionsWidgetsCt, 'opacity', $mainActionsWidgets );
            
            }
        } );


        // Deactivate via keyboard ESC key
        $window.load( function() {
            $document.on( 'keyup.applicator', function ( e ) {
                if ( $mainActionsWidgets.hasClass( mainActionsWidgetsOnCSS ) && e.keyCode == 27 ) {
                    
                    mainActionsFn.widgetsOff();
                    
                    transitionFn.there( $mainActionsWidgetsCt, 'opacity', $mainActionsWidgets );
                
                }
            } );
        } );
        
    }
    applicatorMainActions();
    
    
    
    
    // ------------------------------------ Sub-Nav
    function applicatorSubNav( $cp ) {
        
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
            $subNavTogBtnHideL = applicatorDataSubNav.subNavTogBtnHideL,
            
            subNavFn;
        
        
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
        
        
        // Functions
        subNavFn = {
            
            // On
            on: function()
            {
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
            },
            
            
            // Hover On
            hoverOn: function()
            {
                var $this = $( this );
                $this.closest( $navParentItems )
                    .addClass( navHoverActiveCss )
                    .removeClass( navHoverInactiveCss );
            },
            
            
            // Hover Off
            hoverOff: function()
            {
                var $this = $( this );
                $this.closest( $navParentItems )
                    .addClass( navHoverInactiveCss )
                    .removeClass( navHoverActiveCss );
            },
            
            
            // HTML Nav Off
            htmlOff: function()
            {
                if ( ! $subNavParentItems.hasClass( subNavActCss ) ) {
                    $html
                        .addClass( aplSubNavInactCss )
                        .removeClass( aplSubNavActCss );
                }
            },
            
            
            // Nav Off
            off: function()
            {
                var $this = $( this );
                $subNavParent = $this.closest( $subNavParentItems );

                $subNavParent
                    .addClass( subNavInactCss )
                    .removeClass( subNavActCss );

                subNavFn.htmlOff();

                $this.attr( {
                     'aria-expanded': 'false',
                     'title': $subNavTogBtnShowL
                } );

                $this.find( $subNavShowHideTxt ).text( $subNavTogBtnShowL );
            },
            
            
            // Deactivate all Sub-Nav
            allOff: function()
            {

                $cp.find( $subNavParentItems ).each( function() {
                    var $this = $( this );
                    $subNavParentItems
                        .addClass( subNavInactCss )
                        .removeClass( subNavActCss );

                    subNavFn.htmlOff();

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
            },
            
            
            // Deactivate Siblings
            siblingsOff: function()
            {
                var $this = $( this );

                $this.closest( $subNavParentItems ).siblings()
                    .addClass( subNavInactCss )
                    .removeClass( subNavActCss );
            },
            
            
            // Activate Sub-Nav Siblings
            subNavSiblingsOn: function()
            {
                var $this = $( this );

                $navParent = $this.closest( $navParentItems );

                $this.closest( $navParent ).nextAll()
                    .addClass( subNavOthersInactiveCSS )
                    .removeClass( subNavOthersActiveCSS );
            },
            
            
            // Deactivate Sub-Nav Siblings
            subNavSiblingsOff: function()
            {

                var $this = $( this );

                $navParent = $this.closest( $navParentItems );

                $this.closest( $navParent ).nextAll()
                    .addClass( subNavOthersActiveCSS )
                    .removeClass( subNavOthersInactiveCSS );
            }
        };
        subNavFn.allOff();
        
        
        // Click
        ( function() {
            
            $subNavTogBtn.on( 'click.applicator', function( e ) {
                
                var $this = $( this );
                
                e.preventDefault();
                
                $subNavParent = $this.closest( $subNavParentItems );
                
                if ( $subNavParent.hasClass( subNavInactCss ) )
                {
                    
                    subNavFn.on.apply( this );
                    
                    if ( $cp.hasClass( mainNavCSS ) ) {
                        subNavFn.subNavSiblingsOff.apply( this );
                    }
                    
                }
                
                else if ( $subNavParent.hasClass( subNavActCss ) )
                {
                    
                    subNavFn.off.apply( this );
                    
                    if ( $cp.hasClass( mainNavCSS ) )
                    {
                        subNavFn.subNavSiblingsOn.apply( this );
                    }
                }
                
                if ( $cp.hasClass( mainNavCSS ) )
                {
                    subNavFn.siblingsOff.apply( this );
                }
            } );
            
        }() );
        
        // Hover
        ( function() {
            
            $( $mainNavItem ).hover( function () {
                subNavFn.hoverOn.apply( this );
            }, function() {
                subNavFn.hoverOff.apply( this );
            } );
        
        }() );
        
        
        // Deactivate via external click
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            if ( $html.hasClass( aplSubNavActCss ) && ! $( e.target ).closest( $subNavParentItems ).length && ! $( e.target ).is( 'a' ).length ) {
                subNavFn.allOff();
            }
        } );
        
        
        // Deactivate via keyboard ESC key
        $window.load( function() {
            $document.on( 'keyup.applicator', function ( e ) {
                if ( $html.hasClass( aplSubNavActCss ) && e.keyCode == 27 ) {
                    subNavFn.allOff();
                }
            } );
        } );
        
    }
    applicatorSubNav( $( '#main-nav' ) );
    applicatorSubNav( $( '.widget_nav_menu' ) );
    applicatorSubNav( $( '.widget_pages' ) );
    
    
    
    
    
    // ------------------------------------ Form Validation
    ( function() {
        
        var forms = $( '#commentform' ),
            validityNoteContainerGenericElementLabelL,
            validityNoteContainerGenericElementLabel,
            validityNoteContainerGenericElement,
            validityNoteContainer,
            validityNote;
        
        for ( var i = 0; i < forms.length; i++ )
        {
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
    
    
    
    
    
    // ------------------------------------ Page Nav
    ( function() {
        
        
        if ( ! $applicatorPageNav.length ) {
			return;
		}
        
        
        // Variables
        var $mainContent = $( '#main-content' ),
            $pageNav = $mainContent.find( '.page-nav' ),
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
    
    
    
    
    
    // ------------------------------------------------------------------------ DOM Ready
    
    
    $document.ready( function() {
        
        
        // ------------------------------------ DOM Ready / Unready
        ( function() {

            $html
                .addClass( 'dom--ready' )
                .removeClass( 'dom--unready' );

        }() );
        
        
        
        
        
        // ------------------------------------ Breadcrumbs
        // inc/tags/breadcrumbs.php

        ( function() {

            if ( ! $body.hasClass( 'breadcrumbs---a8r_f' ) )
            {
                return;
            }

            var $breadcrumbsNaviAncestor = $( '.breadcrumbs-navi--ancestor' ),
                $breadcrumbsChildLink = $breadcrumbsNaviAncestor.find( '.breadcrumbs-navi---a' ),
                $breadcrumbsIco = $( applicatorDataBreadcrumbs.breadcrumbsIco );

            $breadcrumbsChildLink.after( $breadcrumbsIco );

        } )();
        
        
        
        
        
        // ------------------------------------ Calendar
        
        ( function() {
            
            $( '.widget_calendar td:has( a )' ).each( function() {
                $( this ).addClass( 'widget-calendar-active-date' );
            } );
            
            genericFn.wrapTextNode( $( '.widget_calendar td, .widget_calendar th' ) );

        }() );
        
        
        
        
        
        // ------------------------------------ Alias for WP Admin Bar
        ( function() {
            
            if ( $body.hasClass( 'admin-bar' ) ) {
                $( '#wpadminbar' ).addClass( 'wpadminbar' );
            }
            
        }() );
    
    
    
    
    
        // ------------------------------------ Remove Empty Elements
        ( function() {
            
            genericFn.removeEmptyElements( $( '.post-content--main > *' ) );
            genericFn.removeEmptyElements( $( '.main-navi---a' ) );
            genericFn.removeEmptyElements( $( '.menu-item' ) );
            
        }() );
        
        
        
        
        
        // ------------------------------------ Data Format
        ( function() {

            // Variables
            var dataFormatCss = '.data-format',
                dataFormatTerm = 'data-format',
                dataFormatPrefixCss = 'data-format--',

                dataFormatImage = dataFormatPrefixCss + 'img',

                postContent = '.post-content--main > *',
                postContentChild = '.post-content--main > *',
                postContentCtCrCss = '.post-content--main',

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

            
            $( '.post-content--main > img' ).each(function() {
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

            $( postContentCtCrCss + ' ' + '> code' ).each(function() {
                var $this = $( this );
                $this.wrap( dataFormatInlineCpMu )
                    .closest( dataFormatCss )
                        .addClass( dataFormatPrefixCss + 'code' );
            });


            // ------------ <table>
            $( '.post-content--main > *:has( table ), .comment-content---mn_cr > *:has( table )' ).each(function() {
                var $this = $( this ),
                    $table = $this.find( 'table' );

                $table.wrap( dataFormatBlockCpMu )
                    .closest( dataFormatCss )
                        .addClass( dataFormatPrefixCss + 'table' );
            });


            // ------------ <select>
            $( '.widget-content---mn_cr select' ).each(function() {
                var $this = $( this );

                $this.wrap( dataFormatBlockCpMu )
                    .closest( dataFormatCss )
                        .addClass( dataFormatPrefixCss + 'select' );
            });

            $( postContentCtCrCss + ' ' + '> table, .comment-content---mn_cr > table' ).each(function() {
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
            $( '.post-content--main > *:has( iframe )' ).each( function() {
                var $this = $( this );
                $this.addClass( 'data-format data-format--iframe' );
            } );
            
            $( '.post-content--main > iframe' ).each( function() {
                var $this = $( this );
                $this.wrap( dataFormatInlineCpMu )
                    .closest( 'data-format' )
                        .addClass( 'data-format--iframe' );
            } );
            
            
            // ------------ <embed>
            $( '.post-content--main > *:has( embed )' ).each( function() {
                var $this = $( this );
                $this.addClass( 'data-format data-format--embed' );
            } );
            
            $( '.post-content--main > embed' ).each( function() {
                var $this = $( this );
                $this.wrap( dataFormatInlineCpMu )
                    .closest( 'data-format' )
                        .addClass( 'data-format--embed' );
            } );

         } )();
        
        
        
        
        
        
        
        
        
        
        
        // ------------------------------------ Wrap in Text Nodes
        ( function() {
            genericFn.wrapTextNode( $( '.data-format--img' ) );
            genericFn.wrapTextNode( $( '.post-password-form label' ) );
            genericFn.wrapTextNode( $( '.post-content--main' ) );
            genericFn.wrapTextNode( $( '.wp-caption-text' ) );
            genericFn.wrapTextNode( $( '.custom-html-widget' ) );
            
            genericFn.removeEmptyElements( $( '.text-node' ) );
        }() );
        
        
        
        
        
        // ------------------------------------ Main Logo
        ( function(){
            
            // Gatekeeper
            ( function(){
                
                if ( ! $( '#main-logo' ).length ) {

                    $body
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
        
        
        
        
        
        // ------------------------------------ If Main Description is Empty
        ( function() {
            
            
            var $mainDescription = $( '.main-description' ),
                $mainDescriptionL = $mainDescription.find( '.main-desc---l' ),
                mainDescriptionCSS = 'main-description',
                descOnCSS = mainDescriptionCSS + '--' + 'populated',
                descOffCSS = mainDescriptionCSS + '--' + 'empty';
            
            
            new ResizeSensor( $webProduct, function() {
                
                genericFn.hiddenElements( $mainDescription, descOnCSS, descOffCSS );
            
                if ( ! $( $mainDescriptionL ).length || $mainDescription.html().replace(/\s|&nbsp;/g, '' ).length == 0 ) {
                    $body
                        .addClass( descOffCSS )
                        .removeClass( descOnCSS );
                }
            } );
            
        
        }() );
        
        
        
        
        
        // ------------------------------------ If Main Description is visually-hidden
        ( function() {
            
            var $mainNavAnchor = $mainNav.find( 'a' );
            
            $mainNavAnchor.each( function() {
                
                var $this = $( this );
                
                if ( $this.attr( 'href' ) == '#' ) {
                    $this.addClass( 'main-navi--hash---a' );
                }
                
            } );
        
        }() );
        
        
        
        
        
        // ------------------------------------ Add Anchor to Content Headings
        ( function( $id ) {
            
            if ( ! $body.hasClass( viewGranularityDetailClassName ) ) {
                return;
            }
            
            var $postContentCtCr = $( '.post-content--main' ),
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
        
        
        
        
        
        // ------------------------------------ Video Fluid Widths
        // https://css-tricks.com/NetMag/FluidWidthVideo/demo.php
        ( function() {

            var $videos = $( 'iframe[src*="//player.vimeo.com"], iframe[src*="//www.youtube.com"], iframe[src*="//www.facebook.com"], embed[src*="//v.wordpress.com"], object, embed' ),
                $container = $( '.post-content--main' ),
                $containerChild = $( '.post-content--main > *' );
            
            
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
        
        
        
        
        
        // ------------------------------------ Table Enhancements
        
        // Table Highlights
        ( function() {
            
            var $postContent = $( '.post-content--main' ),
                $cell = $postContent.find( 'td, th:not( thead th )' ),
                $row = $postContent.find( 'tr:not( thead tr )' ),
                $theadCell = $postContent.find( 'thead th' ),
                $theadRow = $postContent.find( 'thead tr' ),
                $colGroup = $postContent.find( 'colgroup' ),
                cellOnCSS = 'cell--clicked',
                cellOffCSS = 'cell--unclicked',
                rowOnCSS = 'row--clicked',
                rowOffCSS = 'row--unclicked',
                colOnCSS = 'column--clicked',
                colOffCSS = 'column--unclicked',
                tableClicksFn;
            
            
            tableClicksFn = {
                
                // Cell On
                cellOn: function()
                {
                    var $this = $( this );

                    $this
                        .addClass( cellOnCSS )
                        .removeClass( cellOffCSS );
                },


                // Cell Off
                cellOff: function()
                {
                    var $this = $( this );

                    $this
                        .addClass( cellOffCSS )
                        .removeClass( cellOnCSS );
                },


                // Cell Toggle
                cellToggle: function()
                {
                    var $this = $( this );

                    if ( $this.hasClass( cellOffCSS ) )
                    {
                        tableClicksFn.cellOn.apply( $this );
                    }
                    else if ( $this.hasClass( cellOnCSS ) )
                    {
                        tableClicksFn.cellOff.apply( $this );
                    }
                },
                
                
                // Row On
                rowOn: function()
                {
                    var $this = $( this );

                    $this
                        .addClass( rowOnCSS )
                        .removeClass( rowOffCSS );
                },
                
                
                // Row Off
                rowOff: function()
                {
                    var $this = $( this );

                    $this
                        .addClass( rowOffCSS )
                        .removeClass( rowOnCSS );
                },
                
                
                // Row Toggle
                rowToggle: function()
                {
                    var $this = $( this );

                    if ( $this.hasClass( rowOffCSS ) )
                    {
                        tableClicksFn.rowOn.apply( $this );
                        tableClicksFn.cellOn.apply( $this.children() );
                    }
                    else if ( $this.hasClass( rowOnCSS ) )
                    {
                        tableClicksFn.rowOff.apply( $this );
                        tableClicksFn.cellOff.apply( $this.children() );
                    }
                },
                
                
                // Colummn On
                colOn: function()
                {
                    var $this = $( this );

                    $this
                        .addClass( colOnCSS )
                        .removeClass( colOffCSS );
                },
                
                
                // Column Off
                colOff: function()
                {
                    var $this = $( this );

                    $this
                        .addClass( colOffCSS )
                        .removeClass( colOnCSS );
                },
                
                
                // Column Toggle
                colToggle: function()
                {
                    var $this = $( this );

                    if ( $this.hasClass( colOffCSS ) )
                    {
                        tableClicksFn.colOn.apply( $this );
                    }
                    else if ( $this.hasClass( colOnCSS ) )
                    {
                        tableClicksFn.colOff.apply( $this );
                    }
                }
            };
            
            
            // Priming Rows
            $row.each( function() {
                var $this = $( this );
                tableClicksFn.rowOff.apply( $this );
            } );
            
            
            // Priming Column Groups
            $colGroup.each( function() {
                var $this = $( this );
                tableClicksFn.colOff.apply( $this );
            } );
            
            
            $cell.each( function() {
                
                var $this = $( this );
                
                tableClicksFn.cellOff.apply( this );
                
                // Cell
                $this.on( 'click.applicator', function() {
                    
                    var $this = $( this );
                    
                    tableClicksFn.cellToggle.apply( $this );
                } );
                
                // Row
                $this.on( 'dblclick.applicator', function() {
                    
                    var $this = $( this );
                    
                    tableClicksFn.rowToggle.apply( $this.closest( $row ) );
                } );
            } );
            
            
            // Table Head
            $theadCell.each( function() {
                
                var $this = $( this );
                
                
                $this.on( 'dblclick.applicator', function() {
                    
                    var $this = $( this ),
                        dataCellName = $this.data( 'cell-name' );
                    
                    $.each( $( 'colgroup'), function() {
                        
                        var $this = $( this );
                        
                        if ( $this.data( 'colgroup-name' ) == dataCellName )
                        {
                            tableClicksFn.colToggle.apply( $this );
                        }
                        
                    } );
                } );
            
            } );
            

            // External Click for Cells
            $document.on( 'touchmove.applicator click.applicator', function ( e ) {
                if ( $cell.hasClass( cellOnCSS ) && ! $( e.target ).closest( $( 'td' ) ).length && ! $( e.target ).closest( $( 'th:not( thead th )' ) ).length ) {
                    tableClicksFn.cellOff.apply( $cell );
                    tableClicksFn.rowOff.apply( $cell.closest( $row ) );
                }
            } );
            

            // External Click for Column Groups
            $document.on( 'touchmove.applicator click.applicator', function ( e ) {
                if ( $colGroup.hasClass( colOnCSS ) && ! $( e.target ).closest( $( 'table' ) ).length ) {
                    tableClicksFn.colOff.apply( $colGroup );
                }
            } );
            
        }() );
        
    
    } );
    // ------------------------------------ End DOM Ready ------------------------------------ //
    
    
    
        
    
    // ------------------------- DOM Ready and Images Loaded ------------------------- //
    $window.load( function() {
        
        
        // ------------------------- Remove Window Unloaded
        ( function(){
            
            $html
                .addClass( 'window--loaded' )
                .removeClass( 'window--unloaded' );
            
        }() );
    
    
    
    
    
        // ------------------------- Go to Start Nav
        function goStartNavInit( $cp ) {

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
                $goStartNaviAL,
                goStartNavFn;
            
            
            // Functions
            goStartNavFn = {
                
                navOn: function()
                {
                    $cp
                        .addClass( goStartNavActCss )
                        .removeClass( goStartNavInactCss );
                    $html
                        .addClass( aplgoStartNavActCss )
                        .removeClass( aplgoStartNavInactCss );
                },

                navOff: function()
                {
                    $cp
                        .addClass( goStartNavInactCss )
                        .removeClass( goStartNavActCss );
                    $html
                        .addClass( aplgoStartNavInactCss )
                        .removeClass( aplgoStartNavActCss );
                },
                

                pageCriteria: function()
                {   
                    var documentHeight = document.body.offsetHeight,
                        windowHeight = window.innerHeight,
                        windowHeightCriteria = windowHeight * 2,
                        pageCriteriaFn;

                    if ( documentHeight > windowHeightCriteria )
                    {
                        pageCriteriaFn = {
                            navOnCriteriaCheck: function()
                            {
                                if ( $cp.hasClass( goStartNavInactCss ) && ( ( windowHeight + window.pageYOffset ) >= documentHeight ) )
                                {
                                    goStartNavFn.navOn();
                                }
                            }
                        }
                        pageCriteriaFn.navOnCriteriaCheck();


                        $window.scrolled( function() {

                            pageCriteriaFn.navOnCriteriaCheck();

                            if ( $cp.hasClass( goStartNavActCss ) && window.pageYOffset == 0 )
                            {
                                goStartNavFn.navOff();
                            }
                        } );
                    }
                }
            };
            goStartNavFn.navOff();
            goStartNavFn.pageCriteria();

            
            // Focus In, On
            $goStartNaviA.on( 'focusin.applicator', function() {
                goStartNavFn.navOn();
            } );


            // Focus Out, Off
            $goStartNaviA.on( 'focusout.applicator', function() {
                goStartNavFn.navOff();
            } );


            // Click, Off
            $goStartNaviA.on( 'click.applicator', function() {
                goStartNavFn.navOff();
            } );


            // Add Icon to Button
            $goStartNaviAL = $goStartNaviA.find( '.go-start-navi---a_l' );
            $goStartNaviAL.append( $goStartNavArrowIco );


            // Resize Sensor
            new ResizeSensor( $html, function() {
                goStartNavFn.pageCriteria();
            } );
        }

        goStartNavInit( $( '#go-start-nav' ) );
        
        
        
        
        
        // ------------------------- Page Length
        ( function() {

            if ( ! $webProductCopyright.length || $webProductCopyright.css( 'margin' ) == '-1px' || $webProductCopyright.is( ':hidden' ) )
            {
                return;
            }
            
            var pageLengthFn;
            
            
            // Functions
            pageLengthFn = {
                
                heightCSS: function() {
                    
                    var pageHeight = $webProduct.height();

                    if ( ( pageHeight ) <= ( window.innerHeight ) )
                    {
                        $html
                            .addClass( pageShortCss )
                            .removeClass( pageLongCss );

                        $webProductContainer
                            .css( 'padding-bottom', copyrightHeight + 'px' );
                    }
                    else
                    {
                        $html
                            .addClass( pageLongCss )
                            .removeClass( pageShortCss );

                        $webProductContainer
                            .css( 'padding-bottom', '' )
                            .removeAttr( 'style' );
                    }
                }
                
            };
            pageLengthFn.heightCSS();
            
            
            new ResizeSensor( $webProduct, function() {
                pageLengthFn.heightCSS();
            } );
        
        }() );
        
        
        
        
        
        // ------------------------------------ Secondary Content
        ( function() {
            
            var $mainContentAside = $( '.main-content-aside' );

            if ( $mainContentAside.css( 'margin' ) == '-1px' || $mainContentAside.is( ':hidden' ) )
            {
                $body
                    .addClass( 'main-content-aside--disabled' )
                    .removeClass( 'main-content-aside--enabled' );
            }
        }() );
    
    
    } );
    // ------------------------------------ End DOM Ready and Images Loaded ------------------------------------ //
    
    
    
    
    
    // ------------------------------------ Avoid tabbing on Visually Hidden elements
    // https://stackoverflow.com/q/2239567
    ( function() {

        $( 'a:not( #go-ct-navi---a ), button' ).each( function() {
            var $this = $( this );

            if ( $this.parents().filter( function() { return $( this ).css( 'margin' ) == '-1px'; } ).eq( 0 ).css( 'margin' ) ) {
                $this.attr( 'tabindex', -1 );
            }
            
        } );

    }() );
    
    
    
    
    
    // ------------------------------------ Tab Key
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


} )( jQuery );