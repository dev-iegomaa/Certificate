<?php

$content = file_get_contents('certificate.html');

if (isset($_POST['student'])) {
    $students = explode(',', $_POST['student']);
    $courses = explode(',', $_POST['course']);
    $scores = explode(',', $_POST['score']);
    for ($i = 0, $count = sizeof($students); $i < $count; $i++) {
        $certificate = fopen('certificate/' . $students[$i] . '.html', 'w');
        $contentToDelete = ['name', 'course', '10'];
        $contentToBe = [$students[$i], $courses[$i], $scores[$i]];
        $student_content = str_replace($contentToDelete, $contentToBe, $content);
        fwrite($certificate, $student_content);
    }
}