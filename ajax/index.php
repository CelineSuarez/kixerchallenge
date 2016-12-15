<?php

header('Content-type: application/json');

// $fpath = 'https://docs.google.com/spreadsheets/d/1B5dLfCzVWaS7zr_uqnULiCUNNOx3PssbAkII_m8eIcU/pub?output=csv';
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$csvFile = $request->file;
echo $csvFile;

function parseCsv($file, $delimiter){
  $handle = fopen($file, 'r');
  if($handle !== FALSE){
    while (($line = fgetcsv($handle, 4000, $delimiter, '"')) !== FALSE) {
      //$line is an array of the csv elements
      for ($j = 0; $j < count($lineArray); $j++) {
        $arr[$i][$j] = $lineArray[$j];
      }
      $i++;
    }
    fclose($handle);
  }
  return $arr;
}

$data = parseCsv($csvFile, ",")

// function csvToArray($file, $delimiter) {
//   if (($handle = fopen($file, 'r')) !== FALSE) {
//     $i = 0;
//     while (($lineArray = fgetcsv($handle, 4000, $delimiter, '"')) !== FALSE) {
//       for ($j = 0; $j < count($lineArray); $j++) {
//         $arr[$i][$j] = $lineArray[$j];
//       }
//       $i++;
//     }
//     fclose($handle);
//   }
//   return $arr;
// }
// // Do it
// $data = csvToArray($feed, ',');
// // Set number of elements (minus 1 because we shift off the first row)
// $count = count($data) - 1;
//
// //Use first row for names
// $labels = array_shift($data);
// foreach ($labels as $label) {
//   $keys[] = $label;
// }
// // Add Ids, just in case we want them later
// $keys[] = 'id';
// for ($i = 0; $i < $count; $i++) {
//   $data[$i][] = $i;
// }
//
// // Bring it all together
// for ($j = 0; $j < $count; $j++) {
//   $d = array_combine($keys, $data[$j]);
//   $newArray[$j] = $d;
// }
// Print it out as JSON
// echo json_encode($newArray);
?>
