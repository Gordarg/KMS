$.when(
    $.getScript( "js/jquery-ui.js" ),
    $.getScript( "js/sjfb-html-generator.js" ),
    $.Deferred(function( deferred ){
        $( deferred.resolve );
    })
).done(function(){
    generateForm();
});