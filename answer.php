
<?php
/* TODO: $_POST['body'] = x */
// TODO: convert all other fields except post model fields to json and insert as body */
// $_POST['body'] = 'Hello';
// echo $_POST['body'] ;
echo json_encode($_POST);
// include ('forms/submit.php');


/*
if (isset($_POST))
{
    $form_data = json_decode(file_get_contents('php://input'));
    exit;
    foreach ($form_data as $key => $value) {
        $field[$value->name] = $value->value;
    }
    echo $form_data;
    $formID = $field['formID'];
    $formFields = json_encode($field['formFields']);
    echo $formFields;
}