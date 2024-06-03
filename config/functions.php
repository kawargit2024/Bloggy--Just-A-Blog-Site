<?php
function getStatus($status){ 

	$data = [
     '0' => 'Inactive',
     '1' => 'Active',
	];
  return $data[$status];

}

function getStatusColor($status){ 

    $data = [
     '0' => 'danger',
     '1' => 'success',
    ];
  return $data[$status];

}





    //  Explain the code in details //
    //
    // $data = [ ... ]: This line creates an associative array named $data. An associative array maps keys to values.
    //                    Here, the keys are numeric strings ('0' and '1') representing the status codes
    //
    // return $data[$status];: This line returns the value associated with the key $status from the $data array.

