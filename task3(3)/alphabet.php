<?php
$filename = 'words.txt';

$words = file_get_contents($filename);
$wordsArray = explode(' ', $words);

sort($wordsArray);

file_put_contents($filename, implode(' ', $wordsArray));

echo "Слова в файлі '$filename' були впорядковані за алфавітом.";

?>
