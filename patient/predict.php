<?php
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    $fever = isset( $_POST[ 'fever' ] ) ? 1 : 0;
    $cough = isset( $_POST[ 'cough' ] ) ? 1 : 0;
    $headache = isset( $_POST[ 'headache' ] ) ? 1 : 0;
    $fatigue = isset( $_POST[ 'fatigue' ] ) ? 1 : 0;

    // Prepare data for AI model
    $data = json_encode( [
        'fever' => $fever,
        'cough' => $cough,
        'headache' => $headache,
        'fatigue' => $fatigue
    ] );

    // Call Flask API
    $ch = curl_init( 'http://127.0.0.1:5000/predict' );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_POST, true );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, [ 'Content-Type: application/json' ] );

    $response = curl_exec( $ch );
    curl_close( $ch );

    $result = json_decode( $response, true );

    // Return JSON response instead of redirecting
    echo json_encode( [
        'predicted_disease' => $result[ 'predicted_disease' ]
    ] );
}
?>