<?php

namespace App\adms\Controllers;

/**
 * Controller da página sair
 * @author Kevin <kevinalencar2019@gmail.com>
 */
class Logout
{

    /**
     * Destruir as sessões do usuário logado
     * 
     * @return void
     */
    public function index(): void
    {
        unset($_SESSION['user_id'], $_SESSION['user_name'], $_SESSION['user_nickname'], $_SESSION['user_email'], $_SESSION['user_image']);
        $_SESSION['msg'] = "<p style='color: green;'>Logout realizado com sucesso!</p>";
        $urlRedirect = URLADM . "login/index";
        header("Location: $urlRedirect");
    }
}
