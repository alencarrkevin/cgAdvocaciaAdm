<?php

namespace App\adms\Models\helper;

if(!defined('C8L6K7E')){
    header("Location: /");
   die ("ERRO: Pagina não encontrada!<br>");

}


use PDO;
use PDOException;

/**
 * Classe gernérica para apagar registro no banco de dados
 *
 * @author Kevin
 */
class AdmsDelete extends AdmsConn
{
    private string $table;
    private string|null $terms;
    private array $value = [];
    private string|null|bool $result;
    private object $delete;
    private string $query;

    private object $conn;

    function getResult(): string|null|bool
    {
        return $this->result;
    }

    //atribuir os parãmetros aos atributos da classe
    //usar 'parse_str' para converter o parâmetro 'parseString' em array
    

    public function exeDelete(string $table, string|null $terms = null, string|null $parseString = null): void
    {
        $this->table = $table;
        $this->terms = $terms;

        parse_str($parseString, $this->value);

        $this->query = "DELETE FROM {$this->table} {$this->terms}";

        $this->exeInstruction();
    }

    private function exeInstruction(): void
    {
        
        $this->connection();
        try {
            $this->delete->execute($this->value);
            $this->result = true;
        } catch (PDOException $err) {
            $this->result = false;
        }
    }

    /**
     * Obtem a conexão com o banco de dados da classe pai "Conn".
     * Prepara uma instrução para execução e retorna um objeto de instrução.
     * 
     * @return void
     */
    private function connection(): void
    {
        $this->conn = $this->connectDb();
        $this->delete = $this->conn->prepare($this->query);
    //$this->delete = $this->conn->prepare($this->query);
    }
}
