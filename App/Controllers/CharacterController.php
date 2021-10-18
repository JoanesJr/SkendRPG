<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class CharacterController extends Action {

    public function index() {
        $this->validateLogin();
        $user = Container::getModel('Usuario');
        $user->__set('id', $_SESSION['id']);
        $this->view->user = $user->getUser();

        $character = Container::getModel('Personagem');
        $character->__set('id_usuario', $_SESSION['id']);
        $this->view->numberCharacter = $character->getNumberCharacter();
        
        
        $this->render('index', 'home');
    }

    public function createCharacter() {
        $this->validateLogin();
        if ($this->validate()) {
            $character = Container::getModel('Personagem');
            $character->__set('id_usuario', $_SESSION['id']);
            $this->view->numberCharacter = $character->getNumberCharacter();
            $character = Container::getModel('Personagem');
            $name_img = $this->nameImg('img_character');
    
             $character->__set('id_usuario', $_SESSION['id']);
             $character->__set('nome', $_POST['name']);
             $character->__set('classe', $_POST['class']);
             $character->__set('idade', $_POST['age']);
             $character->__set('vida', $_POST['life']);
             $character->__set('energia', $_POST['energy']);
             $character->__set('ca', $_POST['armor_class']);
             $character->__set('altura', $_POST['height']);
             $character->__set('cabelo', $_POST['color_hear']);
             $character->__set('personalidade', $_POST['personality']);
             $character->__set('detalhes', $_POST['details']);
             $character->__set('nome_atributo_1', $_POST['name_attribute_1']);
             $character->__set('nome_atributo_2', $_POST['name_attribute_2']);
             $character->__set('nome_atributo_3', $_POST['name_attribute_3']);
             $character->__set('nome_atributo_4', $_POST['name_attribute_4']);
             $character->__set('nome_atributo_5', $_POST['name_attribute_5']);
             $character->__set('nome_atributo_6', $_POST['name_attribute_6']);
             $character->__set('valor_atributo_1', $_POST['value_attribute_1']);
             $character->__set('valor_atributo_2', $_POST['value_attribute_2']);
             $character->__set('valor_atributo_3', $_POST['value_attribute_3']);
             $character->__set('valor_atributo_4', $_POST['value_attribute_4']);
             $character->__set('valor_atributo_5', $_POST['value_attribute_5']);
             $character->__set('valor_atributo_6', $_POST['value_attribute_6']);
             $character->__set('nome_recurso_1', $_POST['resource_1']);
             $character->__set('nome_recurso_2', $_POST['resource_2']);
             $character->__set('nome_recurso_3', $_POST['resource_3']);
             $character->__set('nome_recurso_4', $_POST['resource_4']);
             $character->__set('valor_recurso_1', $_POST['value_resource_1']);
             $character->__set('valor_recurso_2', $_POST['value_resource_2']);
             $character->__set('valor_recurso_3', $_POST['value_resource_3']);
             $character->__set('valor_recurso_4', $_POST['value_resource_4']);
             $character->__set('historia', $_POST['history']);
             $character->__set('imagem', $name_img);
             $character->__set('nivel', 1);
             $character->__set('experiencia', 1);
    
             if ($character->save()) {
                 header('Location: /app?success=2');
             }else {
                 header('Location: /make_character?error=3');
             }
         } else {
             header('Location: /make_character?error=true');
        }
    }

    public function editCharacter() {
        $this->validateLogin();
        if ($this->validate()) {
            $character = Container::getModel('Personagem');
            $character->__set('id_usuario', $_SESSION['id']);
            $character->__set('id', $_POST['id']);
            $this->view->numberCharacter = $character->getNumberCharacter();
    
            if(!empty($_FILES['image']['name'])) {
                $name_img = $this->nameImg('img_character');
            }else {
                $characterControlorImg = $character->getCharacter();
               $name_img = $characterControlorImg->imagem;
            }
            
            $character->__set('id_usuario', $_SESSION['id']);
            $character->__set('nome', $_POST['name']);
            $character->__set('classe', $_POST['class']);
            $character->__set('idade', $_POST['age']);
            $character->__set('vida', $_POST['life']);
            $character->__set('energia', $_POST['energy']);
            $character->__set('ca', $_POST['armor_class']);
            $character->__set('altura', $_POST['height']);
            $character->__set('cabelo', $_POST['color_hear']);
            $character->__set('personalidade', $_POST['personality']);
            $character->__set('detalhes', $_POST['details']);
            $character->__set('nome_atributo_1', $_POST['name_attribute_1']);
            $character->__set('nome_atributo_2', $_POST['name_attribute_2']);
            $character->__set('nome_atributo_3', $_POST['name_attribute_3']);
            $character->__set('nome_atributo_4', $_POST['name_attribute_4']);
            $character->__set('nome_atributo_5', $_POST['name_attribute_5']);
            $character->__set('nome_atributo_6', $_POST['name_attribute_6']);
            $character->__set('valor_atributo_1', $_POST['value_attribute_1']);
            $character->__set('valor_atributo_2', $_POST['value_attribute_2']);
            $character->__set('valor_atributo_3', $_POST['value_attribute_3']);
            $character->__set('valor_atributo_4', $_POST['value_attribute_4']);
            $character->__set('valor_atributo_5', $_POST['value_attribute_5']);
            $character->__set('valor_atributo_6', $_POST['value_attribute_6']);
            $character->__set('nome_recurso_1', $_POST['resource_1']);
            $character->__set('nome_recurso_2', $_POST['resource_2']);
            $character->__set('nome_recurso_3', $_POST['resource_3']);
            $character->__set('nome_recurso_4', $_POST['resource_4']);
            $character->__set('valor_recurso_1', $_POST['value_resource_1']);
            $character->__set('valor_recurso_2', $_POST['value_resource_2']);
            $character->__set('valor_recurso_3', $_POST['value_resource_3']);
            $character->__set('valor_recurso_4', $_POST['value_resource_4']);
            $character->__set('historia', $_POST['history']);
            $character->__set('imagem', $name_img);
            $character->__set('nivel', 1);
            $character->__set('experiencia', 1);
    
            if ($character->edit()) {
                header("Location: /character?id={$_POST['id']}&success=true");;
            }else {
                header("Location: /character?id={$_POST['id']}&error=true");
            }
        }else {
            header("Location: /character?id={$_POST['id']}&error=true");
        }
    }

    public function view() {
        $this->validateLogin();
        $character = Container::getModel('Personagem');
        $character->__set('id', $_GET['id']);
        $this->view->character = $character->getCharacter();
        $character->__set('id_usuario', $_SESSION['id']);
        $this->view->numberCharacter = $character->getNumberCharacter();
        $user = Container::getModel('Usuario');
        $user->__set('id', $_SESSION['id']);
        $this->view->user = $user->getUser();
        $habilitie = Container::getModel('Habilidade');
        $habilitie->__set('id_personagem', $_GET['id']);
        $this->view->habilities = $habilitie->getHabUser();
        $item = Container::getModel('Item');
        $item->__set('id_personagem', $_GET['id']);
        $this->view->itens = $item->getItemPersonagem();
      
        $this->render('view_character', 'home');
    }

    public function createHabilities() {
        $this->validateLogin();
        $user = Container::getModel('Usuario');
        $user->__set('id', $_SESSION['id']);
        $this->view->user = $user->getUser();

        $character = Container::getModel('Personagem');
        $character->__set('id_usuario', $_SESSION['id']);
        $this->view->numberCharacter = $character->getNumberCharacter();
        $this->render('create_habilities', 'home');
    }

    public function saveHabilities() {
        $this->validateLogin();
        if (empty($_POST['efect'])) {
            $_POST['efect'] = "Nenhum";
        }

        if (empty($_POST['cooldown'])) {
            $_POST['cooldown'] = 0;
        }

        if (empty($_POST['damage'])) {
            $_POST['damage'] = "0";
        }

        if (empty($_POST['cost'])) {
            $_POST['cost'] = 0;
        }
        $habilitie = Container::getModel('Habilidade');
        $habilitie->__set('id_personagem', $_POST['id_character']);
        $habilitie->__set('nome', $_POST['name']);
        $habilitie->__set('descricao', $_POST['description']);
        $habilitie->__set('efeito', $_POST['efect']);
        $habilitie->__set('dano', $_POST['damage']);
        $habilitie->__set('custo', $_POST['cost']);
        $habilitie->__set('cooldown', $_POST['cooldown']);
        $habilitie->salvar();

        header("Location: /character?id={$_POST['id_character']}");
    }

    public function deleteHabilitie() {
        $this->validateLogin();
        $habilitie = Container::getModel('Habilidade');
        $habilitie->__set('id', $_GET['id']);
        $id_personagem = $_GET['id_personagem'];
        $habilitie->excluir();
        header("Location: /character?id={$id_personagem}");
    }

    public function editHabilitie() {
        $this->validateLogin();
        $character = Container::getModel('Personagem');
        $character->__set('id', $_GET['id']);
        $this->view->character = $character->getCharacter();
        $character->__set('id_usuario', $_SESSION['id']);
        $this->view->numberCharacter = $character->getNumberCharacter();
        $user = Container::getModel('Usuario');
        $user->__set('id', $_SESSION['id']);
        $this->view->user = $user->getUser();
        $habilitie = Container::getModel('Habilidade');
        $habilitie->__set('id', $_GET['id']);
        $this->view->habilitie = $habilitie->getUnicHabUser();
        $this->render('view_habilitie', 'home');
    }

    public function updateHabilitie() {
        $this->validateLogin();
        if (empty($_POST['efect'])) {
            $_POST['efect'] = "Nenhum";
        }

        if (empty($_POST['cooldown'])) {
            $_POST['cooldown'] = 0;
        }

        if (empty($_POST['damage'])) {
            $_POST['damage'] = "0";
        }

        if (empty($_POST['cost'])) {
            $_POST['cost'] = 0;
        }
        $habilitie = Container::getModel('Habilidade');
        $habilitie->__set('id', $_GET['id']);
        $habilitie->__set('nome', $_POST['name']);
        $habilitie->__set('descricao', $_POST['description']);
        $habilitie->__set('efeito', $_POST['efect']);
        $habilitie->__set('dano', $_POST['damage']);
        $habilitie->__set('custo', $_POST['cost']);
        $habilitie->__set('cooldown', $_POST['cooldown']);
        $habilitie->editar();
        $id_personagem = $_GET['id_personagem'];
        header("Location: /character?id={$id_personagem}");
    }

    public function deleteCharacter() {
        $this->validateLogin();
        $character = Container::getModel('Personagem');
        $character->__set('id', $_GET['id']);
        $character->delete();
        header('Location: /app');
    }

    public function createItem() {
        $this->validateLogin();
        $user = Container::getModel('Usuario');
        $user->__set('id', $_SESSION['id']);
        $this->view->user = $user->getUser();

        $character = Container::getModel('Personagem');
        $character->__set('id_usuario', $_SESSION['id']);
        $this->view->numberCharacter = $character->getNumberCharacter();
        $this->render('create_item', 'home');
    }

    public function saveItem() {
        $this->validateLogin();
        if (empty($_POST['efect'])) {
            $_POST['efect'] = "Nenhum";
        }

        if (empty($_POST['damage'])) {
            $_POST['damage'] = "Nenhum";
        }

        if (empty($_POST['damage'])) {
            $_POST['damage'] = "0";
        }

        if (empty($_POST['ca'])) {
            $_POST['ca'] = "Nenhum";
        }
        $item = Container::getModel('Item');
        $item->__set('id_personagem', $_POST['id_character']);
        $item->__set('nome', $_POST['name']);
        $item->__set('descricao', $_POST['description']);
        $item->__set('efeito', $_POST['efect']);
        $item->__set('dano', $_POST['damage']);
        $item->__set('ca', $_POST['ca']);
        $item->salvar();

        header("Location: /character?id={$_POST['id_character']}");
    }

    public function deleteItem() {
        $this->validateLogin();
        $item = Container::getModel('Item');
        $item->__set('id', $_GET['id']);
        $id_personagem = $_GET['id_personagem'];
        $item->excluir();
        header("Location: /character?id={$id_personagem}");
    }

    public function editItem() {
        $this->validateLogin();
        $character = Container::getModel('Personagem');
        $character->__set('id', $_GET['id']);
        $this->view->character = $character->getCharacter();
        $character->__set('id_usuario', $_SESSION['id']);
        $this->view->numberCharacter = $character->getNumberCharacter();
        $user = Container::getModel('Usuario');
        $user->__set('id', $_SESSION['id']);
        $this->view->user = $user->getUser();
        $item = Container::getModel('Item');
        $item->__set('id', $_GET['id']);
        $this->view->item = $item->getItem();
        $this->render('view_item', 'home');
    }

    public function updateItem() {
        $this->validateLogin();
        if (empty($_POST['efect'])) {
            $_POST['efect'] = "Nenhum";
        }

        if (empty($_POST['damage'])) {
            $_POST['damage'] = "Nenhum";
        }

        if (empty($_POST['ca'])) {
            $_POST['ca'] = "Nenhum";
        }
        $item = Container::getModel('Item');
        $item->__set('id', $_GET['id']);
        $item->__set('nome', $_POST['name']);
        $item->__set('descricao', $_POST['description']);
        $item->__set('efeito', $_POST['efect']);
        $item->__set('dano', $_POST['damage']);
        $item->__set('ca', $_POST['ca']);
        $item->editar();
        $id_personagem = $_GET['id_personagem'];
        header("Location: /character?id={$id_personagem}");
    }

    public function validateInt($var) {
        if (filter_var($var, FILTER_VALIDATE_INT) || $var == 0) {
            return true;
        }

        return false;
    }

    public function validateVarchar($var) {
        if (filter_var($var, FILTER_SANITIZE_NUMBER_INT) != '') {
            return false;
        }
        
        return true;
    }

    public function validate() {
        foreach ($_POST as $post) {
            if ($post == '') {
                header('Location: /make_character?erro=null');
            }   
        }

        $int = array (
            'age' => $_POST['age'],
            'life' => $_POST['life'],
            'energy' => $_POST['energy'],
            'armor_class' => $_POST['armor_class'],
            'value_attribute_1' => $_POST['value_attribute_1'],
            'value_attribute_2' => $_POST['value_attribute_2'],
            'value_attribute_3' => $_POST['value_attribute_3'],
            'value_attribute_4' => $_POST['value_attribute_4'],
            'value_attribute_5' => $_POST['value_attribute_5'],
            'value_attribute_6' => $_POST['value_attribute_6'],
            'value_resource_1' => $_POST['value_resource_1'],
            'value_resource_2' => $_POST['value_resource_2'],
            'value_resource_3' => $_POST['value_resource_3'],
            'value_resource_4' => $_POST['value_resource_4']
        );

        $varchar = array (
            'name' => $_POST['name'],
            'class' => $_POST['class'],
            'color_hear' => $_POST['color_hear'],
            'personality' => $_POST['personality'],
            'details' => $_POST['details'],
            'name_attribute_1' => $_POST['name_attribute_1'],
            'name_attribute_2' => $_POST['name_attribute_2'],
            'name_attribute_3' => $_POST['name_attribute_3'],
            'name_attribute_4' => $_POST['name_attribute_4'],
            'name_attribute_5' => $_POST['name_attribute_5'],
            'name_attribute_6' => $_POST['name_attribute_6'],
            'resource_1' => $_POST['resource_1'],
            'resource_2' => $_POST['resource_2'],
            'resource_3' => $_POST['resource_3'],
            'resource_4' => $_POST['resource_4'],
        );

       foreach ($int as $integer) {
           if (!$this->validateInt($integer)) {
               return false;
           }

           return true;
       }

       foreach ($varchar as $char) {
           if (!$this->validateVarchar($char)) {
               return false;
           }
       }
       
       return true;
    }
    
    
}