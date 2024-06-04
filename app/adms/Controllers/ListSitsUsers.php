<?php

namespace App\adms\Controllers;

if (!defined('C8L6K7E')) {
    header("Location: /");
    die("Erro: Página não encontrada<br>");
}

/**
 * Controller listar situação usuário
 * @author Kevin <kevinalencar2019@gmail.com>
 */
class ListSitsUsers
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para VIEW */
    private array|string|null $data;

    /**
     * Método listar situação usuário.
     * 
     * Instancia a MODELS responsável em buscar os registros no banco de dados.
     * Se encontrar registro no banco de dados envia para VIEW.
     * Senão enviar o array de dados vazio.
     *
     * @return void
     */
    public function index(): void
    {
        $listSitsUsers = new \App\adms\Models\AdmsListSitsUsers();
        $listSitsUsers->listSitsUsers();
        if ($listSitsUsers->getResult()) {
            $this->data['listSitsUsers'] = $listSitsUsers->getResultBd();
        } else {
            $this->data['listSitsUsers'] = [];
        }

        $loadView = new \Core\ConfigView("adms/Views/sitsUser/listSitUser", $this->data);
        $loadView->loadView();
    }
}
