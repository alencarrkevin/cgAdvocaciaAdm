<?php

namespace Core;
if(!defined('C8L6K7E')){
    header("Location: /");
   die ("ERRO: Pagina não encontrada!<br>");
}

/**
 * Configurações básicas do site.
 *
 * @author Kevin <kevinalencar2019@gmail.com>
 */

abstract class Config
{
    /**
     * Possui as constantes com as configurações.
     * Configurações de endereço do projeto.
     * Página principal do projeto.
     * Credenciais de acesso ao banco de dados
     * E-mail do administrador.
     * dependencias da coneção com o banco de dados 
     * @return void
     */
    protected function configAdm(): void
    {
        define('URL', 'http://localhost/celke/');
        define('URLADM', 'http://localhost/celke/adm/');

        define('CONTROLLER', 'Login');
        define('METODO', 'index');
        define('CONTROLLERERRO', 'Login');

        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', '');
        define('DBNAME', 'celke');
        define('PORT', 3306);

        define('EMAILADM', 'kevinalencar2019@gmail.com.');
    }
}
