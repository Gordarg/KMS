var modal = document.getElementById('edit');

$('<button id="close">⨯</button>').prependTo(modal);

var btn = document.getElementById("changepass");
var close = document.getElementById("close");

btn.onclick = function () {
    modal.style.display = "block";
    event.preventDefault();
}
close.onclick = function () {
    modal.style.display = "none";
    event.preventDefault();
}
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";

    }
}

$("section div div.answers").each(function() {
    $('<button id="close">⨯</button>').prependTo($(this));
});

$('section > div').click(function(event){
    var target = $( event.target );
    // if ( target.is( "div" ) ) {
    //    target.children().toggle();
        target.find('.answers').show();
    // }
});
$('section div div.answers button').click(function(event){
    var target = $( event.target );
    target.parent().hide();
});