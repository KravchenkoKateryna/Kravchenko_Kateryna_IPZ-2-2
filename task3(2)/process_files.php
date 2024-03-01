<?php
$file1 = 'file1.txt';
$file2 = 'file2.txt';
$fileOnlyInFirst = 'fileOnlyInFirst.txt';
$fileInBoth = 'fileInBoth.txt';
$fileMoreThanTwoTimes = 'fileMoreThanTwoTimes.txt';

$contentFile1 = file_get_contents($file1);
$contentFile2 = file_get_contents($file2);
$linesOnlyInFirst = array_diff(explode(' ', $contentFile1), explode(' ', $contentFile2));

$linesInBoth = array_intersect(explode(' ', $contentFile1), explode(' ', $contentFile2));

$wordsInFile1 = array_count_values(explode(' ', $contentFile1));
$wordsInFile2 = array_count_values(explode(' ', $contentFile2));
$commonWordsMoreThanTwoTimes = array_keys(array_intersect_key($wordsInFile1, $wordsInFile2));

file_put_contents($fileOnlyInFirst, implode(' ', $linesOnlyInFirst));
file_put_contents($fileInBoth, implode(' ', $linesInBoth));
file_put_contents($fileMoreThanTwoTimes, implode(' ', $commonWordsMoreThanTwoTimes));

echo "Файли були створені успішно.";
?>
