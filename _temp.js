// ------------------------- Form Validation
    ( function() {
    
    $commentFormNote = aplDataCommentFormNote.commentFormNote;
        
        var forms = $( '#commentform' );
        
        for ( var i = 0; i < forms.length; i++ ) {
            forms[i].noValidate = true;

            forms[i].addEventListener( 'submit', function( event ) {

                //Prevent submission if checkValidity on the form returns false.
                if ( ! event.target.checkValidity() ) {
                    event.preventDefault();

                    //$('#commentform :input:visible[required="required"]').each( function () {
                    $('#commentform :input:visible').each( function () {
                        
                        var _this = $( this ),
                            $validityNote = $( '.validity-note' ),
                            validityNoteTerm = 'validity-note',
                            creationInvalidCSS = 'creation--invalid',
                            creationValidCSS = 'creation--valid';
                        
                        if ( this.validity.valid ) {

                            _this.closest( '.cp' )
                                .removeClass( creationInvalidCSS )
                                .addClass( creationValidCSS );

                            _this.closest( '.cr' )
                                .find( $validityNote ).remove();
                        }

                        if ( ! this.validity.valid ) {

                            validityNoteContainerGenericElementLabel = $( '<div />', {
                                'class': 'g_l '+ validityNoteTerm +'---g_l',
                                'html': '<p>' + this.validationMessage + '</p>'
                            } );

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
                                .addClass( creationInvalidCSS )
                                .find( '.cr' )
                                    .remove( validityNote )
                                    .append( validityNote );

                            return false;
                        }
                    } );

                    return;
                }
            }, false);
        }
    
    } )();




// ------------------------- Form Validation
    ( function() {
    
    $commentFormNote = aplDataCommentFormNote.commentFormNote;
        
        var forms = $( '#commentform' );
        
        for ( var i = 0; i < forms.length; i++ ) {
            forms[i].noValidate = true;

            forms[i].addEventListener( 'submit', function( event ) {

                //Prevent submission if checkValidity on the form returns false.
                if ( ! event.target.checkValidity() ) {
                    event.preventDefault();

                    //$('#commentform :input:visible[required="required"]').each( function () {
                    $('#commentform :input').each( function () {
                        
                        var _this = $( this );

                        _this.closest( '.cp' )
                            .removeClass( 'creation--invalid' )
                            .addClass( 'creation--valid' );

                        _this.closest( '.cr' )
                            .find( '.validity-note' ).remove();

                        if ( ! this.validity.valid ) {

                            var validityNoteTerm = 'validity-note';

                            validityNoteContainerGenericElementLabel = $( '<div />', {
                                'class': 'g_l '+ validityNoteTerm +'---g_l',
                                'html': '<p>' + this.validationMessage + '</p>'
                            } );

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