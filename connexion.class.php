<?php
class connexion
{

   /* Instance de la classe SPDO
   *
   * @var SPDO
   * @access private
   */ 
  private $PDOInstance = null;

     /**
   * Instance de la classe SPDO
   *
   * @var SPDO
   * @access private
   * @static
   */ 
  private static $instance = null;
 
  /**
   * Constante: nom d'utilisateur de la bdd
   *
   * @var string
   */
  const DEFAULT_SQL_USER = 'root';
 
  /**
   * Constante: hôte de la bdd
   *
   * @var string
   */
  const DEFAULT_SQL_HOST = 'localhost';
 
  /**
   * Constante: hôte de la bdd
   *
   * @var string
   */
  const DEFAULT_SQL_PASS = 'azerty';
 
  /**
   * Constante: nom de la bdd
   *
   * @var string
   */
  const DEFAULT_SQL_DTB = 'sport';
 
  /**
   * Constructeur
   *
   * @param void
   * @return void
   * @see PDO::__construct()
   */ 
  public function __construct()
  {
      $this->PDOInstance = new PDO('mysql:dbname='.self::DEFAULT_SQL_DTB.';host='.self::DEFAULT_SQL_HOST,self::DEFAULT_SQL_USER ,self::DEFAULT_SQL_PASS);
  }

  public static function getInstance()
  {  
    if(is_null(self::$instance))
    {
      self::$instance = new connexion();
    }
    return self::$instance;
  }

    public function query($query)
  {
    return $this->PDOInstance->query($query);
  }

  public function prepare($query){
    return $this->PDOInstance->prepare($query);
  }

}

?>