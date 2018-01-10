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

/*
function mode(){

    switch($(event.target).attr('value'))
    {
        case "FILE":
            window.location = "admin.php?type=FILE";
            break;
        case "SURV":
            window.location = "admin.php?type=SURV";
            break;
        case "ARTL":
            window.location = "admin.php?type=ARTL";
            break;
        case "QUST":
            window.location = "admin.php?type=QUST";
            break;
        case "ANSR":
            window.location = "admin.php?type=ANSR";
            break;
        case "COMT":
            window.location = "admin.php?type=COMT";
            break;
        case "POST":
            window.location = "admin.php?type=POST";
            break;
            
        default:
            break;
    }
    
}
*/
function mode()
{
    window.location = "admin.php?type=" + $(event.target).attr('value');
}