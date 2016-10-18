<?
$data = array();
    //check with your logic
    if (true) {
        $error = false;
        $files = array();

        $uploaddir = 'uploads';
        foreach ($_FILES as $file) {
            if (move_uploaded_file($file['tmp_name'], '/uploads/' . basename( $file['name']))) {
                $files[] = $uploaddir . $file['name'];
            } else {
                $error = true;
            }
        }
        $data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
    } else {
        $data = array('success' => 'NO FILES ARE SENT','formData' => $_REQUEST);
    }

    echo json_encode($data);
}
?>