<?php

namespace App\adms\Controllers;

/**
 * Controller da página listar usuarios
 * @author Kevin <kevinalencar2019@gmail.com>
 * 
 * 
 */



 if(!defined('C8L6K7E')){
    header("Location: /");
   die ("ERRO: Pagina não encontrada!<br>");

}
class ListUsers
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para VIEW */
    private array|string|null $data;

    public function index()
    {
        $listUsers = new \App\adms\Models\AdmsListUsers();
        $listUsers->listUsers();
        if($listUsers->getResult()){
            $this->data['listUsers'] = $listUsers->getResultBd(); 
           /*   var_dump($this->data['listUsers']);  */
        }else{
            $this->data['listUsers'] = [];
        }

        

        $loadView = new \Core\ConfigView("adms/Views/users/listUsers", $this->data);
        $loadView->loadView();
    }
}
