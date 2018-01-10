/*

TODO

create a better user experience by show/hide fields based on userselected type.

*/

/*
$('input:radio').change(function(event) {
    var checkboxID = $(event.target).attr('id');
    alert(checkboxID);
  });
*/

function mode(){

    switch($(event.target).attr('value'))
    {
        case "FILE":
        alert('hi');
            break;
        case "SURV":
            break;
        case "ARTL":
            break;
        case "QUST":
            break;
        case "ANSR":
            break;
        case "COMT":
            break;
        case "POST":
            break;
            
        default:
            break;
    }
    
}