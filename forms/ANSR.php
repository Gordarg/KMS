if (isset($_POST))
{
    // $form_data = json_decode(file_get_contents('php://input'));
    echo json_encode($_POST);
    exit;
    foreach ($form_data as $key => $value) {
        $field[$value->name] = $value->value;
    }
    echo $form_data;
    $formID = $field['formID'];
    $formFields = json_encode($field['formFields']);
    echo $formFields;
}