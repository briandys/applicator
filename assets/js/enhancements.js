( function( $ ) {
    
    var $document = $( document ),
        $window = $( window ),
        $html = $( document.documentElement ),
        $body = $( document.body ),
        
        $webProduct = $( '#web-product' ),
        $go_to_content_nav_item_a = $( '#go-ct-navi---a' ),
        
        feature_class,
        a8r_feature_class,
        a8r_f_class = 'a8r_f',
        a8r_feature_suffix_class = '--' + a8r_f_class,
        
        show_hide_text_class = 'show-hide---txt',
        show_hide_label_class = 'show-hide---l',
        
        tab_key_active_class = 'tab-key--active',
        tab_key_inactive_class = 'tab-key--inactive',
        
        view_granularity_detail_class = 'view-granularity--detail',
        
        
        
        $aplApplicatorGoCtNav = $html.closest( '.applicator--go-content-nav' ),
        $aplApplicatorGoStartNav = $html.closest( '.applicator--go-start-nav' ),
        
        $aplApplicatorMainMenu = $html.closest( '.applicator--main-menu' ),
        
        $applicatorPageNav = $html.closest( '.applicator--page-nav' ),
        $aplApplicatorSubNav = $html.closest( '.applicator--sub-nav' ),
        
        
        
        funcTerm = 'func',
        funcName,
        
        
        
        $aplWildcard = $( '#applicator-wildcard' ),
        $aplWildcardCr = $aplWildcard.find( '.applicator-wildcard---cr' ),
        overlayTerm = 'overlay',
        overlayMu,
        
        $mainActions = $( '#main-actions' ),
        
        $mainNav = $( '#main-nav' ),
        $navParentItems = $( '.page_item, .menu-item' ),
        
            
        $mainSearch,
        
        $goStartNaviA = $( '#go-start-navi---a' );
        
        
    
    
    
    
    
    /**
     * HTML_OK
     *
     * @package WordPress\Applicator\JS\Functions
     *
     * @version 1.0
     */
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
                'class': 'mn_cr' + ' ' + $cp + '---mn_cr' + ' ' + $cp + '--main',
                'data-main-name': $name + ' ' + 'MN'
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
                'class': 'h ' + $cp + '---h',
                'aria-hidden': 'true'
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
                'class': 'txt ' + show_hide_text_class,
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
    
    
    
    
    
    /**
     * Here and There Transition
     *
     * @package WordPress\Applicator\JS\Functions
     *
     * @version 1.0
     */
    var here_class = 'here',
        there_class = 'there',
        transition_end_event = 'transitionend.applicator webkitTransitionEnd.applicator oTransitionEnd.applicator otransitionend.applicator';


    var transitionFn = {
        
        hereClass: function( $elem )
        {
            $elem
                .addClass( here_class )
                .removeClass( there_class );
        },
        
        thereClass: function( $elem )
        {
            $elem
                .addClass( there_class )
                .removeClass( here_class );
        },

        here: function( $elem, $property, $target )
        {
            $elem.on( transition_end_event, function() {
                if ( event.propertyName == $property )
                {
                    transitionFn.hereClass( $target );
                }
            } );
        },

        there: function( $elem, $property, $target )
        {
            if ( $target.hasClass( here_class ) ) {

                $elem.on( transition_end_event, function() {
                    if ( event.propertyName == $property )
                    {
                        transitionFn.thereClass( $target );
                    }
                } );
            }
        }
    };
    
    
    
    
    
    /**
     * Tab Cycle
     *
     * @package WordPress\Applicator\JS\Functions
     *
     * @version 1.0
     *
     * @link https://stackoverflow.com/a/21811463
     */
    var tabCycleFn = {
        
        on: function( $elem )
        {
            var inputs = $elem.find( 'a, button, input, object, select, textarea' ).filter( ':visible' ),
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

        off: function( $elem )
        {
            var inputs = $elem.find( 'a, button, input, object, select, textarea' ).filter( ':visible' ),
                firstInput = inputs.first(),
                lastInput = inputs.last();

            lastInput.off( 'keydown.applicator' );
            firstInput.off( 'keydown.applicator' );
        }
        
    };
    
    
    
    
    
    
    
    /**
     * Applicator Functions
     */
    var fn = {
        
        /**
         * Remove Empty Elements
         */
        removeEmptyElements: function( $elem )
        {
            $( $elem ).each( function() {
                var $this = $( this );

                if ( $this.html().replace(/\s|&nbsp;/g, '' ).length == 0 )
                {
                    $this.remove();
                }
            } );
        },
        
        
        /**
         * Wrap Text Nodes
         *
         * @package WordPress\Applicator\JS\Function
         *
         * @version 1.0
         *
         * @link https://stackoverflow.com/a/18727318
         */
        wrapTextNode: function( $elem )
        {       
            var $textNodeMU = $( '<span />', { 'class': 'text-node' } );

            $elem.contents().filter( function() {
                return this.nodeType === 3;
            } ).wrap( $textNodeMU );

        },
        
        
        /**
         * Remove Hash
         *
         * @package WordPress\Applicator\JS\Function
         *
         * @version 1.0
         *
         * @link https://stackoverflow.com/a/5298684
         */
        removeHash: function()
        { 
            window.history.pushState( '', document.title, window.location.pathname );
        },
        
        
        /**
         * Overlay Activate
         *
         * @package WordPress\Applicator\JS\Function
         *
         * @version 1.0
         */
        overlayOn: function( funcName )
        {
            overlayMu = $( '<div />', {
                'id'   : overlayTerm + '--' + funcName,
                'class': overlayTerm + ' ' + overlayTerm + '--' + funcName,
                'role' : 'presentation'
            } );

            $aplWildcardCr.append( overlayMu );

        },
        
        
        /**
         * Hidden Elements
         *
         * @package WordPress\Applicator\JS\Function
         *
         * @version 1.0
         */
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
        },
        
        
        /**
         * Is Hidden
         *
         * @package WordPress\Applicator\JS\Function
         *
         * @version 1.0
         */
        isHidden: function( $elem )
        {
            if ( ! $elem.length || $elem.css( 'margin' ) == '-1px' || $elem.is( ':hidden' ) )
            {
                return true;
            }
        }
    };
    
    
    
    
    
    /**
     * Comments Enhancements
     *
     * @package WordPress\Applicator\JS\Feature
     *
     * @version 1.0
     */
    
    function applicatorComments( $elem ) {
        
        // Gatekeeper
        if ( ! $body.hasClass( view_granularity_detail_class ) && ! $body.hasClass( 'comments---a8r_f' ) ) {
            return;
        }
        
        
        // Header
        ( function() {
            a8r_feature_class = 'comments' + a8r_feature_suffix_class;
            
            $elem
                .addClass( a8r_f_class )
                .addClass( a8r_feature_class );    
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
            
            comments_active_class = 'comments--active',
            comments_inactive_class = 'comments--inactive',
            
            comments_active_gs_class = 'comments--active---gs',
            comments_inactive_gs_class = 'comments--inactive---gs',
            
            commentsFn;

        
        // Build Markup
        ( function() {
            
            var commentsToggleTerm = 'comments-toggle';
            
            commentsToggleButtonTextLabelTxtMU = $( '<span />', {
                'class': 'txt ' + show_hide_text_class,
                'text': $commentsHideL
            } );

            // Text Label
            commentsToggleButtonTextLabelMU = $( '<span />', {
                'class': 'l' + ' ' + show_hide_label_class
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
        $commentModuleH = $elem.find( '.comment-md---h' );
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

                $elem
                    .addClass( comments_active_class )
                    .removeClass( comments_inactive_class );

                $body
                    .addClass( comments_active_gs_class )
                    .removeClass( comments_inactive_gs_class );

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

                $elem
                    .addClass( comments_inactive_class )
                    .removeClass( comments_active_class );

                $body
                    .addClass( comments_inactive_gs_class )
                    .removeClass( comments_active_gs_class );

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

                if ( $elem.hasClass( comments_inactive_class ) ) {
                    commentsFn.on();
                    commentsFn.scrollTop();
                    tabCycleFn.on( $elem ); 
                }

                else if ( $elem.hasClass( comments_active_class ) ) {
                    commentsFn.off();
                    fn.removeHash();
                    tabCycleFn.off( $elem );
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
                    if ( $elem.hasClass( comments_inactive_class ) )
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
                if ( window.location.hash.indexOf( 'comment' ) != -1 && $elem.hasClass( comments_inactive_class ) ) {
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
        var goCtNavActCss = 'go-content-nav--active',
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

            fn.overlayOn( funcName );
            
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
        
        
        
        
        ( function() {
            
            $go_to_content_nav_item_a.on( 'focusin.applicator', function() {
                goContentNavFn.on();
            } );
            
            $go_to_content_nav_item_a.on( 'focusout.applicator', function() {
                goContentNavFn.off();
            } );
            
            $go_to_content_nav_item_a.on( 'click.applicator', function() {
                $( this ).blur();
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

            fn.overlayOn( funcName );
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

                tabCycleFn.on( $mainHeaderAsideCtCr );
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

                tabCycleFn.off( $mainHeaderAsideCtCr );
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
    
    
    
    
    
    
    
    
    
    
    
    /**
     * Main Search
     *
     * @package WordPress\Applicator\JS\Feature
     *
     * @version 1.0
     */
    ( function() {
        
        $mainActions
            .find( $( '.main-actions-aside--main' ) )
                .children( '.search:first, .widget_search:first' )
                    .attr( 'id', 'main-search' )
                    .attr( 'class', 'cp main-search' )
                    .attr( 'data-name', 'Main Search CP' );
    
    }() );
    
    
    function applicatorMainSearch( $elem ) {
        
        $mainSearch = $( '#main-search' );
        
        
        // Gatekeeper
        if ( ! $mainSearch.length ) {
            $body.removeClass( 'main-search---a8r_f' );
			return;
		}
        
        
        // Header
        ( function() {
            
            feature_class = 'main-search';
            
            a8r_feature_class = feature_class + a8r_feature_suffix_class;
        
            $elem
                .addClass( a8r_f_class )
                .addClass( a8r_feature_class ); 

            fn.overlayOn( 'main-search' );
            
        }() );
        
        
        // Variables
        var main_search_active_class = 'main-search--active',
            main_search_inactive_class = 'main-search--inactive',
            
            main_search_active_gs_class = 'main-search--active---gs',
            main_search_inactive_gs_class = 'main-search--inactive---gs',
            
            main_search_input_empty_class = 'main-search-input--empty',
            main_search_input_populated_class = 'main-search-input--populated',
            
            $main_search_toggle_search_icon = $( applicatorDataMainSearch.mainSearchTogCtrlSearchIco ),
            $main_search_toggle_dismiss_icon = $( applicatorDataMainSearch.mainSearchTogDismissIco ),
            
            $main_search_search_icon = $( applicatorDataMainSearch.mainSearchSearchIco ),
            $main_search_dismiss_icon = $( applicatorDataMainSearch.mainSearchDismissIco ),
            
            $main_search_show_label = applicatorDataMainSearch.mainSearchShowL,
            $main_search_hide_label = applicatorDataMainSearch.mainSearchHideL,
            
            
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
            
            var $mainSearchH;
            
            $mainSearchH = $elem.find( $( '.search---h' ) );
            
            $mainSearchH.after(
                htmlOkFn.buttonObj(
                    'main-search-toggle',
                    'Main Search Toggle',
                    $main_search_hide_label,
                    $main_search_toggle_dismiss_icon,
                    'toggle'
                )
            );
        }() );
        
        $mainSearchCt = $elem.find( '.search---mn' );
        
        $mainSearchTog = $elem.find( '.main-search-toggle' );
        $mainSearchTogBtn = $( '#main-search-toggle---b' );
        $mainSearchTogBtnL = $mainSearchTogBtn.find( $( '.main-search-toggle---b_l' ) );
        $mainSearchTogBtnLTxt = $mainSearchTogBtn.find( $( '.show-hide---txt' ) );
        
        $mainSearchInput = $elem.find( '.search-term-crt-search---input-text' );
        $mainSearchResetBtn = $elem.find( '.search-form-reset-axn---b' );
        
        $mainSearchTextInput = $elem.find( '.search-term-crt-search-text-input' ),
        $mainSearchOverlay = $( '#overlay--' + feature_class ),
        
        // Add Icons to Buttons
        $mainSearchFormAxns = $elem.find( '.search-form-axns' );
        $mainSearchBL = $mainSearchFormAxns.find( '.search-form-search-axn---b_l' );
        $mainSearchResetBL = $mainSearchFormAxns.find( '.search-form-reset-axn---b_l' );
        $mainSearchBL.append( $main_search_search_icon );
        $mainSearchResetBL.append( $main_search_dismiss_icon );
        
        
        var mainSearchFn = {
            
            // On
            on: function() {
                $elem
                    .addClass( main_search_active_class )
                    .removeClass( main_search_inactive_class );
                
                $body
                    .addClass( main_search_active_gs_class )
                    .removeClass( main_search_inactive_gs_class );

                $mainSearchTogBtn.attr( {
                     'aria-expanded': 'true',
                     'title': $main_search_hide_label
                } );

                $mainSearchTogBtnLTxt.text( $main_search_hide_label );
                $mainSearchTogBtnL.append( $main_search_toggle_dismiss_icon );
                $main_search_toggle_search_icon.remove();

                tabCycleFn.on( $elem );

                // Focus on input and select content if any
                $mainSearchInput.focus().select();
            },
            
            
            // Deactivate
            off: function() {
                $elem
                    .addClass( main_search_inactive_class )
                    .removeClass( main_search_active_class );
                
                $body
                    .addClass( main_search_inactive_gs_class )
                    .removeClass( main_search_active_gs_class );

                $mainSearchTogBtn.attr( {
                     'aria-expanded': 'false',
                     'title': $main_search_show_label
                } );

                $mainSearchTogBtnLTxt.text( $main_search_show_label );
                $mainSearchTogBtnL.append( $main_search_toggle_search_icon );
                $main_search_toggle_dismiss_icon.remove();

                tabCycleFn.off( $elem );
            },
            
            
            onTransHere: function()
            {
                if ( $elem.hasClass( main_search_inactive_class ) ) {
                    mainSearchFn.on();
                }
                transitionFn.here( $mainSearchTextInput, 'opacity', $mainSearchOverlay );
            },
            
            
            offTransThere: function()
            {
                if ( $elem.hasClass( main_search_active_class ) ) {
                    mainSearchFn.off();
                }
                transitionFn.there( $mainSearchTextInput, 'opacity', $mainSearchOverlay );
            },
            
            
            // Toggle
            toggle: function() {
                if ( $elem.hasClass( main_search_inactive_class ) ) {
                    mainSearchFn.onTransHere();
                }
                else if ( $elem.hasClass( main_search_active_class ) ) {
                    mainSearchFn.offTransThere();
                }
            },
            
            
            // Input Status
            inputStatus: function() {

                // Empty Input
                if ( $mainSearchInput.val() == '' ) {
                    $elem
                        .addClass( main_search_input_empty_class )
                        .removeClass( main_search_input_populated_class );
                }

                // Populated Input (as displayed by default in the input in Search Results page)
                else if ( ! $mainSearchInput.val() == '' ) {
                    $elem
                        .addClass( main_search_input_populated_class )
                        .removeClass( main_search_input_empty_class );
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
            tabCycleFn.off( $elem );
        } );
        
        // Deactivate via external click
        $document.on( 'touchmove.applicator click.applicator', function ( e ) {
            if ( $elem.hasClass( main_search_active_class ) && ( ! $( e.target ).closest( $mainSearchTog ).length && ! $( e.target ).closest( $mainSearchCt ).length ) ) {
                mainSearchFn.offTransThere();
            }
        } );

        // Deactivate via keyboard ESC key
        $window.load( function() {
            $document.on( 'keyup.applicator', function ( e ) {
                if ( $elem.hasClass( main_search_active_class ) && e.keyCode == 27 ) {
                    mainSearchFn.offTransThere();
                }
            } );
        } );
            
        
        // Find if a Child Element Has Focus
        // Deactivate if no focus is present and if user is Tab key is active
        // http://ub4.underblob.com/find-if-a-child-element-has-focus/
        $elem.on( 'focusout.applicator', function() {
            var $this = $( this );
            setTimeout( function() {
                var hasFocus = !! ( $this.find( ':focus' ).length > 0 );
                if ( $html.hasClass( tab_key_active_class ) && ! hasFocus ) {
                    mainSearchFn.offTransThere();
                }
            }, 10 );
        } );
        
    }
    applicatorMainSearch( $( '#main-search' ) );
    
    
    
    
    
    // ------------------------------------ Main Actions
    function applicatorMainActions() {
        
        var $mainActionsWidgetItems = $mainActions.find( '.main-actions-aside--main > .widget:not( .main-search )' );
        
        // Gatekeeper
        ( function() {
            if ( ! $mainActionsWidgetItems.length )
            {
                $html.removeClass( 'applicator--main-actions-widgets' );
                return;
            }

            if ( ! $html.closest( '.applicator--main-actions-widgets' ).length )
            {
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
            
            fn.overlayOn( funcName );
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

                tabCycleFn.on( $mainActionsWidgetsCtCr );
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

                tabCycleFn.off( $mainActionsWidgetsCtCr );
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
                'class': 'txt ' + show_hide_text_class,
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
        
        
        
        
        
        

        /**
         * Calendar Enhancements
         */
        
        ( function() {
            
            $( '.widget_calendar td:has( a )' ).each( function() {
                $( this ).addClass( 'widget-calendar-date--active' );
            } );
            
            fn.wrapTextNode( $( '.widget_calendar td, .widget_calendar th' ) );

        }() );
        
        
        
        
        
        // ------------------------------------ Alias for WP Admin Bar
        ( function() {
            
            if ( $body.hasClass( 'admin-bar' ) ) {
                $( '#wpadminbar' ).addClass( 'wpadminbar' );
            }
            
        }() );
    
    
    
    
    
        // ------------------------------------ Remove Empty Elements
        ( function() {
            
            fn.removeEmptyElements( $( '.post-content--main > *' ) );
            fn.removeEmptyElements( $( '.main-navi---a' ) );
            fn.removeEmptyElements( $( '.menu-item' ) );
            
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

                $this.addClass( 'select' + ' ' + dataFormatPrefixCss + 'select' );
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
            fn.wrapTextNode( $( '.data-format--img' ) );
            fn.wrapTextNode( $( '.post-password-form label' ) );
            fn.wrapTextNode( $( '.post-content--main' ) );
            fn.wrapTextNode( $( '.wp-caption-text' ) );
            fn.wrapTextNode( $( '.custom-html-widget' ) );
            
            fn.removeEmptyElements( $( '.text-node' ) );
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
                $mainDescriptionL = $mainDescription.find( '.main-description---l' ),
                mainDescriptionCSS = 'main-description',
                descOnCSS = mainDescriptionCSS + '--' + 'populated',
                descOffCSS = mainDescriptionCSS + '--' + 'empty';
            
            
            new ResizeSensor( $webProduct, function() {
                
                fn.hiddenElements( $mainDescription, descOnCSS, descOffCSS );
            
                if ( ! $( $mainDescriptionL ).length || $mainDescription.html().replace(/\s|&nbsp;/g, '' ).length == 0 ) {
                    $body
                        .addClass( descOffCSS )
                        .removeClass( descOnCSS );
                }
            } );
            
        
        }() );
        
        
        
        
        
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
            
            if ( ! $body.hasClass( view_granularity_detail_class ) ) {
                return;
            }
            
            var $postContentMain = $( '.post-content--main' ),
                $postContentHeadings = $postContentMain.find( 'h1:not([id]), h2:not([id]), h3:not([id]), h4:not([id]), h5:not([id]), h6:not([id])' ),
                $postContentHeadingsID = $postContentMain.find( 'h1[id], h2[id], h3[id], h4[id], h5[id], h6[id]' ),
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
        
        
        
        
        
        /**
         * View
         *
         * @package WordPress\Applicator\JS\Function
         *
         * @version 1.0
         */
        ( function() {
            
            var $web_product_copyright = $( '#copyright' ),
                web_product_copyright_height = $web_product_copyright.height(),
                page_short_class = 'page--short',
                page_long_class = 'page--long';
            
            if ( fn.isHidden( $web_product_copyright ) )
            {
                return;
            }
            
            var viewFn = {
                
                dimensionClass: function()
                {   
                    var pageHeight = $webProduct.height(),
                        $web_product_container = $webProduct.find( '.web-product---cr' );

                    if ( ( pageHeight ) <= ( window.innerHeight ) )
                    {
                        $html
                            .addClass( page_short_class )
                            .removeClass( page_long_class );

                        $web_product_container
                            .css( 'padding-bottom', web_product_copyright_height + 'px' );
                    }
                    else
                    {
                        $html
                            .addClass( page_long_class )
                            .removeClass( page_short_class );

                        $web_product_container
                            .css( 'padding-bottom', '' )
                            .removeAttr( 'style' );
                    }
                }
                
            };
            
            viewFn.dimensionClass();
            
            
            new ResizeSensor( $webProduct, function() {
                viewFn.dimensionClass();
            } );
        
        }() );
        
        
        
        
        
        /**
         * Main Content Aside
         *
         * @package WordPress\Applicator\JS\Function
         *
         * @version 1.0
         */
        ( function() {
            
            if ( fn.isHidden( $( '.main-content-aside' ) ) )
            {
                $body
                    .addClass( 'main-content-aside--disabled' )
                    .removeClass( 'main-content-aside--enabled' );
            }
        
        }() );
    
    
    } );
    // ------------------------------------ End DOM Ready and Images Loaded ------------------------------------ //
    
    
    
    
    
    /**
     * Avoid tabbing on Visually Hidden elements
     *
     * @package WordPress\Applicator\JS\Function
     *
     * @version 1.0
     *
     * @link https://stackoverflow.com/q/2239567
     */
    ( function() {

        $( 'a:not( #go-ct-navi---a ), button' ).each( function() {
            var $this = $( this );

            if ( $this.parents().filter( function() { return $( this ).css( 'margin' ) == '-1px'; } ).eq( 0 ).css( 'margin' ) )
            {
                $this.attr( 'tabindex', -1 );
            }
            
        } );

    }() );
    
    
    
    
    
    // ------------------------------------ Tab Key
    ( function(){
        
        // Initialize Tab Key CSS
        $html
            .addClass( tab_key_inactive_class )
            .removeClass( tab_key_active_class );


        // No Tab Key
        $document.on( 'keydown.applicator', function ( e ) {
            var keyCode = e.keyCode || e.which; 

            if ( $html.hasClass( tab_key_inactive_class ) && keyCode == 9 ) {
                $html
                    .addClass( tab_key_active_class )
                    .removeClass( tab_key_inactive_class );
              }
        } );


        // Tab Key - Deactivate upon any interaction
        $document.on( 'touchmove.applicator click.applicator', function () {

            if ( $html.hasClass( tab_key_active_class ) ) {
                $html
                    .addClass( tab_key_inactive_class )
                    .removeClass( tab_key_active_class );
            }
        } );
        
    }() );


} )( jQuery );