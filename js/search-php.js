var startchar = $('input[name=Q]').val().charAt(0);
if (startchar === "#" || startchar === "@") {
    $('.example').hide();
}