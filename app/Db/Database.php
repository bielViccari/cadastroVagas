<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database{

  /**
   * host de conexao com o banco de dados
   * @var string
   */
 const HOST= "localhost";

 /**
  * nome do banco
  * @var string
  */
  const NAME="gv_vagas";

  /**
   * Usuario do banco
   * @var string
   */
  const USER="root";

  /**
   * senha de acesso ao bd
   * @var string
   */
  const PASS="";

  /**
   * Nome da tabela
   * @var string
   */
  private $table;

  /**
   * instancia de conexao com o bd
   * @var PDO
   */
  private $connection;

  /**
   * define a tabela e a instancia e conexao
   * @param string $table
   */

  public function __construct($table = null){
    $this->table = $table;
    $this->setConnection();
  }

  /**
   * Método responsavel por criar uma conexao com o BD
   */
  private function setConnection(){
try {
  $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
  $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  die('ERROR :' .$e->getMessage());
}
  }

  /**
   * metodo responsavel por executar queries dentro do banco de dados
   * @param string $query
   * @param array $params
   * @return PDOStatement
   */

  public function execute($query,$params = []){

    try {
      $statement = $this->connection->prepare($query);
      $statement->execute($params);
      return $statement;

    } catch(PDOException $e) {
      die('ERROR :' .$e->getMessage());
    }
  }


  /**
   * metodo responsavel por inserir dados no banco
   * @param array $values [field => value]
   * @return integer ID inserido
   */
  public function insert($values){
    //dados da query
    $fields = array_keys($values);
    $binds = array_pad([],count($fields), '?');
    
    //monta a query
    $query = ' INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';
  
    //executa o insert
    $this->execute($query,array_values($values));
    
    //retorna o ID inserido
    return $this->connection->lastInsertId();
  }

  /**
   * Método responsavel por fazer uma consulta no banco
   * @param string $where
   * @param string $order
   * @param string $limit
   * @param string $fields
   * @return PDOStatement
   */

  public function select($where = null, $order = null, $limit = null, $fields = '*'){

    //dados da query
    $where = strlen($where) ? 'WHERE '.$where : '';
    $order = strlen($order) ? 'ORDER BY '.$order : '';
    $limit = strlen($limit) ? 'LIMIT '.$limit : '';

    //MONTA A QUERY
    $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

    //executa a query
    return $this->execute($query);
  }

  /**
   * Método responsavel por executar atualizações no banco de dados
   * @param string $where
   * @param array $values [ field => value ]
   * @return boolean
   */

  public function update($where,$values){
 //dados da query
 $fields = array_keys($values);

    //monta a query
    $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields). '=? WHERE '.$where;

    //executar a query
    $this->execute($query,array_values($values));
  }

}

?>