<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function esUltimo(string $actual, string $ultimo): bool {
    if($actual !== $ultimo) {
        return true;
    } else {
        return false;
    }
} 

// Función que revisa que el usuario está autenticado
function isAuth() : void {
    if(!isset($_SESSION["login"])) {
        header("Location: /");
    }
}

function isAdmin() : void {
    if(!isset($_SESSION["admin"])) {
        header("Location: /");
    }
}