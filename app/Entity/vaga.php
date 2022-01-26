<?php

namespace App\Entity;

use App\Db\Database;
use\PDO;
class Vaga{

  
/** 
 *indentificador único das vagas
 * @var integer
*/

public $id;

/**  
*Titulo da vaga
* @var string
*/
public $titulo;


/**  
*descricao da vaga
*  @var string
*/
public $descricao;

 /**
  *define se a vaga está ativa
  *@var string(s/n)
  */ 
public $ativo;

/**
 * data de publicação da vaga
 * @var string
 */
public $data;


/**
 * metodo responsavel por cadastrar uma nova vaga no banco
 * @return boolean
 */

public function cadastrar() {
  //define a data
  $this->data = date('Y-m-d H:i:s');

  //inserir a vaga no banco
  $obDatabase = new Database('vagas');
  $this->id = $obDatabase->insert([
 'titulo' => $this->titulo,
 'descricao' => $this->descricao,
 'ativo' => $this->ativo,
 'data' => $this->data
  ]);
  
 
 return true;
  //retornar sucesso
}

/**
 * Método responsavel para pegas as vagas do BD
 * @param string $where
 * @param string $order
 * @param string $limit
 * @return array
 */

 /**
  * Método responsavel por atualizar a vaga no banco
  *@return boolean
  */

  public function atualizar(){
    return (new Database('vagas'))->update('id = '.$this->id,[
      'titulo' => $this->titulo,
 'descricao' => $this->descricao,
 'ativo' => $this->ativo,
 'data' => $this->data
    ]);
  }

public static function getVagas($where =null,$order = null,$limit = null){

  return(new Database('vagas') )->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);

}

/**
 * Método responsavel por buscar uma vaga com base em seu ID
 * @param integer $id
 * @return Vaga
 */

 public static function getVaga($id){
   return (new Database('vagas'))->select('id = '. $id)
  ->fetchObject(self::class);
 }
}
?>