function mode()
{
    window.location = "admin.php?type=" + $(event.target).attr('value');
}