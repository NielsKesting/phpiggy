<?php

declare(strict_types=1);

function dumpAndDie(mixed $value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function escape(mixed $value): string {
    return htmlspecialchars((string) $value);
}
