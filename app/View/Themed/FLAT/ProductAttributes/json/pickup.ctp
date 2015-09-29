<?php 

$suggestions = array();
foreach ( $data['productAttr'] as $key => $value ) {
    $suggestions[] = array(
        'value' => $value['ProductAttribute']['value']
    );
}

echo json_encode($suggestions);


?>