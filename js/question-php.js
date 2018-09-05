$.when(
    $.getScript( "js/jquery-ui.js" ),
    $.getScript( "js/select2.js" ),
    $.getScript( "js/sjfb-builder.js" ),
    $.Deferred(function( deferred ){
        $( deferred.resolve );
    })
).done(function(){
    $('select').select2();
});