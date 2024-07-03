<?php

namespace belajar\php\App\View;

class View
{

    public static function render(string $view, $model)
    {
        include __DIR__ . './../../../view/header.php';
        include __DIR__ . './../../../view/' . $view . '.php';
        include __DIR__ . './../../../view/footer.php';
    }

}