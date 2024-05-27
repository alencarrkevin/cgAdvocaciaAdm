<?php

namespace App\adms\Models\helper;

/**
 * Classe genérica para converter o slug
 *
 * @author Kevin
 */
class AdmsSlug
{
    /** @var string $text Recebe o texto que deve ser convertido para slug */
    private string $text;
     /** @var array $format Recebe o array de caracteres especiais que devem ser substituido */
     private array $format;
    
   
    public function slug(string $text): string|null
    {
        $this->text = $text;

        

        $this->text = $text;
        $this->format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:,\\\'<>°ºª';
        $this->format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr-----------------------------------------------------------------------------------------------';
       
        $this->text = strtr($this->text, $this->format['a'], $this->format['b']);
        //substitui o espaço em branco por "-"
        $this->text = str_replace(" ", "-", $this->text);
        $this->text = str_replace(array('-----', '----', '---','--'), '-', $this->text);
        //deixar tudo p/minusculo
        $this->text = strtolower($this->text);

        //retornar os paramentros
        
        return $this->text;


    }

}
