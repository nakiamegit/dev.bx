<?php
function testDirectoryStatus($nameDirectory)
{
    if($nameDirectory === '.'){
        echo 'Вы указали текущую директорию!';
    }elseif ($nameDirectory === '..'){
        echo 'Вы указали родительскую директорию!';
    }elseif (file_exists($nameDirectory)){
        echo 'Директория "' . $nameDirectory . '" существует!';
    }else {
        echo 'Директория не существует!';
    }
}