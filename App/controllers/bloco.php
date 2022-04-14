<?php
#chamando classes padrão para manipulação de dados
use App\Core\controller;
use App\Core\Model;
use App\Auth;
use App\components_html;
use App\components\html_components;
use LDAP\Result;

class bloco extends controller
{
    public function index()
    {
        
        //logica para trazer as informações do banco
       $model_bloco=$this->model('bloco_model');
      $result= $model_bloco->get_all_notepads_for_user();

        //view
        $this->view('blocos/ver_blocos_de_notas',$data=['sty'=>"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"],$result); 
    }
}