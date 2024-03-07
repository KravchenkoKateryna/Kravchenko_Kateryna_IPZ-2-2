<?php

namespace text;

class FileManager {
    public static $dir = 'text';

    public static function readFile($fileName) {
        $filePath = self::$dir . '/' . $fileName;
        if (file_exists($filePath)) {
            return file_get_contents($filePath);
        } else {
            return "Файл '$fileName' не існує.";
        }
    }

    public static function writeFile($fileName, $content) {
        $filePath = self::$dir . '/' . $fileName;
        file_put_contents($filePath, $content, FILE_APPEND);
        return "Дані успішно записані у файл '$fileName'.";
    }

    public static function clearFile($fileName) {
        $filePath = self::$dir . '/' . $fileName;
        file_put_contents($filePath, '');
        return "Вміст файлу '$fileName' очищено.";
    }
}

file_put_contents('file1.txt', 'Hello, ');
file_put_contents('file2.txt', 'World!');
file_put_contents('file3.txt', 'This is a test.');

echo FileManager::readFile('file1.txt') . "\n";
echo FileManager::readFile('file2.txt') . "\n";
echo FileManager::readFile('file3.txt') . "\n";

echo FileManager::writeFile('file1.txt', 'New content.') . "\n";

echo FileManager::readFile('file1.txt') . "\n";

echo FileManager::clearFile('file2.txt') . "\n";

echo FileManager::readFile('file2.txt') . "\n";