(function( $ ) {
    
    var searchComponent = $( '.search' );
    
    function initSearch( component ) {
        
        // Create markup
        var searchToggle = $( '<div />', { 'class': 'cp search-toggle', 'data-name': 'Search Toggle' } )
                .append( $( '<div />', { 'class': 'search-toggle--cr' } ) ),
            
            searchToggleAction = $( '<button />', { 'class': 'b a search-toggle--a' } )
                .append( $( '<span />', { 'class': 'search-toggle--a-l', 'text': applicatorSearchLabel.searchShowLabel } ) ),
            
            searchActive = 'search--active',
            searchInactive = 'search--inactive';
        
        
        component.find( '#search-form' ).before( searchToggle );
        component.find( '.search-toggle--cr' ).append( searchToggleAction );
        
        // Set Defaults
        component.addClass( searchInactive );
        
        // Deactivate Search Form
        $( function() {
            var _this = $( this );
            if ( searchComponent.hasClass( searchInactive ) ) {
                _this.find( '.search-toggle--a' ).attr( 'aria-expanded', 'false' );
            }
        } );
        
        // Click Function
        component.find( '.search-toggle--a' ).click( function( e ) {
            var _this = $( this ),
                searchToggleLabel = _this.find( '.search-toggle--a-l' );
            
            e.preventDefault();
            
            _this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
            searchToggleLabel.text( searchToggleLabel.text() === applicatorSearchLabel.searchShowLabel ? applicatorSearchLabel.searchHideLabel : applicatorSearchLabel.searchShowLabel );
            
            _this.closest( '#search' )
                .toggleClass( searchActive )
                .toggleClass( searchInactive );
            
            // Focus on Input
            if ( searchComponent.hasClass( searchActive ) ) {
                _this.closest( '.search-toggle' )
                    .siblings( '.search-form' )
                    .find( '.search-term--input--text' ).focus();
            }
        } );
        
        // Reset Action
        component.find( '.search-form-reset--a' ).click( function() {
            var _this = $( this );
            
            // Focus on Input
            _this.closest( '.search-form' )
                .find( '.search-term--input--text' ).focus();
        } );
        
    }
    
    initSearch( searchComponent );
    

})( jQuery );