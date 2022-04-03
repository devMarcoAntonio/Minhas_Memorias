<?php
#chamando classes padrão para manipulação de dados
use App\Core\controller;
use App\Core\Model;
use App\Auth;
use LDAP\Result;

class painel extends controller
{

    #Index padrão PAINEL
    public function index()
    {
           #verifica se o user está realemnte logado ($_SESSION['logado']==True?)
        Auth::CheckLogin();
        $this->view('painel/home',$data=['sty'=>"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css",'sty2'=>URL_BASE."/css/painel_index.php"]);
    }
    public function logout()
    {
        Auth::logout();
    }
    public function perfil()
    {
        $dados=$this->model('user');
        $result=$dados->get_all_info_user();
        
        
        $this->view('painel/perfil',$data=['sty' =>"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css", 'sty2'=>URL_BASE."/css/editar.php"],$result);  
    }
    public function editar()
    {
        $dados=$this->model('user');
        $result=$dados->get_all_info_user();
        $this->view('painel/editar',$data=['sty' =>"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css",'sty2'=>URL_BASE."/css/editar.php"],$result);  
    }
    public function editar_save()
    {
        if(isset($_POST['name']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['genero']) && !empty($_POST['resume'])  )
        {
          echo "foi"  ;
        }
        else
        {
            $stmt=$this->model('user');
            echo "Erro ao atualizar";
        }
    }
}
    
    