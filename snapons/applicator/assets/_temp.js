// ------------------------- Go to Start
    function initGoStart( component ) {
        
        var currentPos = $window.scrollTop(),
            goStartCp = component.closest( '.go-start' ),
            
            goStartActiveClass = 'go-start--active',
            goStartInactiveClass = 'go-start--inactive',
            
            
            aplGoStartActiveClass = 'applicator--go-start--active',
            aplGoStartInactiveClass = 'applicator--go-start--inactive';
        
        function goStartActivate() {
            goStartCp
                .addClass( goStartActiveClass )
                .removeClass( goStartInactiveClass );
            $html
                .addClass( aplGoStartActiveClass )
                .removeClass( aplGoStartInactiveClass );
        }
        
        function goStartDeactivate() {
            goStartCp
                .addClass( goStartInactiveClass )
                .removeClass( goStartActiveClass );
            $html
                .addClass( aplGoStartInactiveClass )
                .removeClass( aplGoStartActiveClass );
        }
        
        
        // Get document height (cross-browser)
        // http://james.padolsey.com/javascript/get-document-height-cross-browser/
        function getDocHeight() {
            var D = document;
            return Math.max(
                D.body.scrollHeight, D.documentElement.scrollHeight,
                D.body.offsetHeight, D.documentElement.offsetHeight,
                D.body.clientHeight, D.documentElement.clientHeight
            );
        }

        // Calculate distance of scroll from bottom    
        function scrollPosFromBottom( valueBottom ) {
            return $window.scrollTop() + $window.height() > getDocHeight() - valueBottom;
        }

        // Calculate distance of scroll from top    
        function scrollPosFromTop( valueTop ) {
            return $window.scrollTop() > valueTop;
        }
        
        // Activation based on scroll direction
        function goStartToggleOnScroll() {
            var scrollPos = $window.scrollTop();
            if ( scrollPos > currentPos ) {
                goStartDeactivate();
            } else {
                goStartActivate();
            }
            currentPos = scrollPos;
        }
        
        // Sets the different conditions for activation
        function goStartConditions() {

            var topBuffer = $window.height(),
                bottomBuffer = $window.height();

            // If scrolled past top buffer
            if ( scrollPosFromTop( topBuffer ) ) {
                goStartToggleOnScroll();
            } else {
                goStartDeactivate();
            }

            // If scrolled within bottom buffer
            if ( scrollPosFromBottom( bottomBuffer ) ) {
                goStartActivate();
            }

            // Deactivate if whole page is too short for the top and bottom buffer
            if ( topBuffer + bottomBuffer > getDocHeight() ) {
                goStartDeactivate();
            }
        }
        goStartConditions();

        // Action
        component.click( function() {
            goStartDeactivate();
        } );

        // Debounce
        var goStartDebounce = debounce( function () {
            goStartConditions();
        }, applicatorDebounceTimeout );

        window.addEventListener( 'scroll', goStartDebounce );
        
    }
    initGoStart( $( '#go-start--a' ) );