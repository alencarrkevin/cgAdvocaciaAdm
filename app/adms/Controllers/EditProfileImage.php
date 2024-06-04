<?php

namespace App\adms\Controllers;

if(!defined('C8L6K7E')){
    header("Location: /");
   die ("ERRO: Pagina não encontrada!<br>");

}

/**
 * Controller da página editar imagem do perfil
 * @author Kevin <kevinalencar2019@gmail.com>
 */
class EditProfileImage
{

    /** @var array|string|null $data Recebe os dados que devem ser enviados para VIEW */
    private array|string|null $data = [];


    /** @var array $dataForm Recebe os dados do formulario */
    private array|null $dataForm;
    //private array|null $dataForms;
    //private array|null $dataForm;

    /**
     * Instantiar a classe responsável em carregar a View e enviar os dados para View.
     * Quando o usuário clicar no botão "cadastrar" do formulário da página novo usuário. Acessa o IF e instância a classe "AdmsAddUsers" responsável em cadastrar o usuário no banco de dados.
     * Usuário cadastrado com sucesso, redireciona para a página listar registros.
     * senão, instacia a classe responsavel em carregar a view e enviar os dados para a view
     * @return void
     */
    public function index(): void
    {

        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($this->dataForm['SendEditProfImage'])) {
           $this->editProfImage();
        } else {
            $viewProfImg = new \App\adms\Models\AdmsEditProfileImage();
            $viewProfImg->viewProfile();
            if ($viewProfImg->getResult()) {
                $this->data['form'] = $viewProfImg->getResultBd();
                $this->viewEditProfImagem();
            } else {
                $urlRedirect = URLADM . "login/index";
                header("Location: $urlRedirect");
            }
            //se existe uma foto então mantenha ela até que seja alterada.
            //depois de slterada salve-a no banco de dados e redirecionar para a tela de edição
        }
    }

    /**
     * Instantiar a classe responsável em carregar a View e enviar os dados para View.
     * 
     */
    private function viewEditProfImagem(): void
    {
        $loadView = new \Core\ConfigView("adms/Views/users/editProfileImage", $this->data);
        $loadView->loadView();
    }

    private function editProfImage(): void
    {
        if (!empty($this->dataForm['SendEditProfImage'])) {
            unset($this->dataForm['SendEditProfImage']);
            $this->dataForm['new_image'] = $_FILES['new_image'] ? $_FILES['new_image'] : null;
            $editProfImg = new \App\adms\Models\AdmsEditProfileImage();
            $editProfImg->update($this->dataForm);
            if ($editProfImg->getResult()) {
                $urlRedirect = URLADM . "view-profile/index";
                header("Location: $urlRedirect");
            } else {
                $this->data['form'] = $this->dataForm;
                $this->viewEditProfImagem();
            }
        } else {
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Perfil não encontrado!</p>";
            $urlRedirect = URLADM . "login/index";
            header("Location: $urlRedirect");
        }
    }
}
