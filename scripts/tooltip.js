// TODO


(function( $ )
 {
    $.fn.tooltip = function( options ) {
        
        var defaults = {
            position        : 'top',
            offset          : 5,
            arrowWidth      : 10, // Not customizable yet.
            backgroundColor : '',
            parent          : 'body'
        };
        
        var settings = $.extend( {}, defaults, options );
 
        this.each(function(i, el)
        {
            var $tooltip,
                $el = $(el),
                ttOffset = settings.arrowWidth + settings.offset;
            
            $(this).hover(function()
            {
                $tooltip = $('<span></span>').addClass('tooltip').html( $(this).data('tt') );
                var $arrow   = $('<span></span>').addClass('tt-arrow');
                $(settings.parent).append( $tooltip.append($arrow) ).show();
                
                // Position.
                if ( settings.position == 'top' ) {
                    $tooltip.addClass('tt-t').css('top', $el.offset().top - $tooltip.outerHeight() - ttOffset )
                                             .css('left', $el.offset().left + $el.outerWidth()/2 - $tooltip.outerWidth()/2 );
                }
                else if ( settings.position == 'right' ) {
                    $tooltip.addClass('tt-r').css('top', $el.offset().top + $el.outerHeight()/2 - $tooltip.outerHeight()/2 )
                                             .css('left', $el.offset().left + $el.outerWidth() + ttOffset );
                }
                else if ( settings.position == 'bottom' ) {
                    $tooltip.addClass('tt-b').css('top', $el.offset().top + $el.outerHeight() + ttOffset )
                                             .css('left', $el.offset().left + $el.outerWidth()/2 - $tooltip.outerWidth()/2 );
                }
                else if ( settings.position == 'left' ) {
                    $tooltip.addClass('tt-l').css('top', $el.offset().top + $el.outerHeight()/2 - $tooltip.outerHeight()/2 )
                                             .css('left', $el.offset().left - $tooltip.outerWidth() - ttOffset );
                }
                
                // Color.
                if (settings.backgroundColor) {
                    $tooltip.css('background-color', settings.backgroundColor);
                    switch(settings.position) {
                        case 'top'    : $arrow.css('border-top-color', settings.backgroundColor); break;
                        case 'right'  : $arrow.css('border-right-color', settings.backgroundColor); break;
                        case 'bottom' : $arrow.css('border-bottom-color', settings.backgroundColor); break;
                        case 'left'   : $arrow.css('border-left-color', settings.backgroundColor);
                    }
                }
            },
            function() {
                $tooltip.remove();
            });
        });
        
        return this;
    };
}( jQuery ));