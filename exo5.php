<?php
spl_autoload_register();

use App\Views\Question;
use App\Views\Page;

$pageContent = '';

$q1 = new Question([
    'number' => 1,
    'question' => "Créer une classe permettant de gérer l'affichage d'un template HTML en lisant un fichier grace à la fonction file_get_contents(). ",
    'answer' => ''
]);
$pageContent .= $q1->getHtml();

$q2 = new Question([
    'number' => 2,
    'question' => "Créer une classe permettant de gérer l'affichage des pages de ce mini-site.",
    'answer' => ''
]);
$pageContent .= $q2->getHtml();

$q3 = new Question([
    'number' => 3,
    'question' => "Créer une classe permettant de gérer le menu de navigation de ce site.",
    'answer' => ''
]);
$pageContent .= $q3->getHtml();

$q4 = new Question([
    'number' => 4,
    'question' => "Créer une classe permettant de gérer l'affichage des questions sur ce site.",
    'answer' => ''
]);
$pageContent .= $q4->getHtml();

$view = new Page([
    'title' => 'POO - Des vues',
    'headerTitle' => 'POO - Des vues',
    'content' => $pageContent
]);

$view->display();