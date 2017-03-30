(function( $ ) {
    
    var $html = $( document.documentElement );
    
    
    
    
    // ------------------------- DOM Ready
    $( document ).ready( function() {
		$html.addClass( 'dom--ready' ).removeClass( 'dom--unready' );
	});
    
    
    
    
    // ------------------------- Go to Content
    function initGoContent( component ) {
        
        var goContentAction = $( '#go-content--a' ),
            goContentActiveClass = 'go-content--active',
            goContentInactiveClass = 'go-content--inactive',
            aplGoContentActiveClass = 'applicator--go-content--active',
            aplGoContentInactiveClass = 'applicator--go-content--inactive';
        
        $html.addClass( aplGoContentInactiveClass );
        component.addClass( goContentInactiveClass );
        
        goContentAction.on( 'focusin.applicator', function () {
            component.addClass( goContentActiveClass );
            component.removeClass( goContentInactiveClass );
            $html.addClass( aplGoContentActiveClass );
            $html.removeClass( aplGoContentInactiveClass );
        } );

        goContentAction.on( 'focusout.applicator', function () {
            component.addClass( goContentInactiveClass );
            component.removeClass( goContentActiveClass );
            $html.addClass( aplGoContentInactiveClass );
            $html.removeClass( aplGoContentActiveClass );
        } );
        
    }
    initGoContent( $( '#go-content' ) );
    
    
    
    
    // ------------------------- Navigation
    function initNav( component ) {
        
        // Create the markup of Sub-Nav Toggle
        var subnavToggle = $( '<div />', { 'class': 'cp sub-nav-toggle', 'data-name': 'Sub-Nav Toggle' } )
                .append( $( '<div />', { 'class': 'sub-nav-toggle--cr' } ) ),
            
            subnavToggleAction = $( '<button />', { 'class': 'b a sub-nav-toggle--a' } )
                .append( $( '<span />', { 'class': 'sub-nav-toggle--a-l' } ) ),
            
            subnavToggleActionLabel = $( '<span />', { 'class': 'sub-nav-toggle--a--word--l', 'text': applicatorSubnavLabel.subnavShowLabel } ),
            
            subNavActive = 'sub-nav--active',
            subNavInactive = 'sub-nav--inactive';
        
        
        
        component.find( '.page_item_has_children > a, .menu-item-has-children > a' ).after( subnavToggle );
        
        component.find( '.sub-nav-toggle--cr' ).append( subnavToggleAction );
        
        component.find( '.sub-nav-toggle--a-l' )
            .append( subnavToggleActionLabel )
            .append( ' ' )
            .append( applicatorSubnavLabel.subnavIcon );
        
        
        
        // Set Default State of Sub-Nav Toggle
        component.find( '.page_item_has_children, .menu-item-has-children' ).addClass( subNavInactive );
        
        
        // Deactivate Sub-Nav
        component.find( '.page_item_has_children, .menu-item-has-children' ).each( function() {
            var _this = $( this );
            if ( _this.hasClass( subNavInactive ) ) {
                _this.find( '.sub-nav-toggle--a' ).attr( 'aria-expanded', 'false' );
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
            
            // The Sub-Nav Toggle Component
            _this.closest( '.page_item, .menu-item' )
                .toggleClass( subNavActive )
                .toggleClass( subNavInactive );
        } );
        
    }
    initNav( $( '#main-nav' ) );
    initNav( $( '.widget_nav_menu' ) );
    

})( jQuery );