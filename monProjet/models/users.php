<?php

class users extends database {

  public $id = 0;
  public $gender = '';
  public $lastname = '';
  public $firstname = '';
  public $birthdate = '1970-01-01';
  public $phone = '';
  public $mail = '';
  public $password = '';
  public $login = '';
  public $idGroupe = '';
  
  /*
   * 
   */

  public function __construct() {
    parent::__construct();
  }

  /**
   * Méthode me permettant d'ajouter un utilisateur
   * @return bool
   */
  public function addUsers() {
    $query = 'INSERT INTO `p13r_users` (`gender`, `lastname`, `firstname`, `birthdate`, `phone`, `mail`, `password`, `login`, `id_userRoles`) '
            . 'VALUES (:gender, :lastname, :firstname, :birthdate, :phone, :mail, :password, :login, :idGroupe)';
    $queryExecute = $this->db->prepare($query);

    $queryExecute->bindValue(':gender', $this->gender, PDO::PARAM_STR);
    $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
    $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
    $queryExecute->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
    $queryExecute->bindValue(':phone', $this->phone, PDO::PARAM_STR);
    $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
    $queryExecute->bindValue(':password', $this->password, PDO::PARAM_STR);
    $queryExecute->bindValue(':login', $this->login, PDO::PARAM_STR);
    $queryExecute->bindValue(':idGroupe', $this->idGroupe, PDO::PARAM_INT);

    return $queryExecute->execute();
  }

  public function deleteUsers() {
    $query = 'DELETE FROM `p13r_users` WHERE `id` = :id';
    $queryExecute = $this->db->prepare($query);
    $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
    return $queryExecute->execute();
  }

  public function getUsersList() {

    $query = 'SELECT  `id`, UPPER(`lastname`) AS `lastname`, `firstname`, DATE_FORMAT(`birthdate`, \'%d/%m/%Y\') AS `birthdate`, `phone`, `mail`, FLOOR(DATEDIFF(NOW(), `birthdate`)/365) AS `age` '
            . 'FROM `p13r_users` '
            . 'WHERE `id_userRoles` = 3';
    //$this->db->query($query) me permet d'executer ma requête (query($query)) dans ma base de données ($this->db)
    $queryExecute = $this->db->query($query);
    /*
     * fetchAll me permet de récupérer tous les résultats en objet (PDO::FETCH_OBJ)
     * Attention : fetchAll récupère un tableau de résultats
     */
    return $queryExecute->fetchAll(PDO::FETCH_OBJ);
  }

  public function getProfList() {

    $query = 'SELECT  `id`, UPPER(`lastname`) AS `lastname`, `firstname`, DATE_FORMAT(`birthdate`, \'%d/%m/%Y\') AS `birthdate`, `phone`, `mail`, FLOOR(DATEDIFF(NOW(), `birthdate`)/365) AS `age` '
            . 'FROM `p13r_users` '
            . 'WHERE `id_userRoles` = 2';
//$this->db->query($query) me permet d'executer ma requête (query($query)) dans ma base de données ($this->db)
    $queryExecute = $this->db->query($query);
    /*
     * fetchAll me permet de récupérer tous les résultats en objet (PDO::FETCH_OBJ)
     * Attention : fetchAll récupère un tableau de résultats
     */
    return $queryExecute->fetchAll(PDO::FETCH_OBJ);
  }

  public function getUsersProfil() {

    $query = 'SELECT `id`, UPPER(`lastname`) AS `lastname`, `firstname`, `birthdate`, `phone`, `mail`, FLOOR(DATEDIFF(NOW(), `birthdate`)/365) AS `age` '
            . 'FROM `p13r_users` '
            . 'WHERE `id` = :id ';
    $queryExecute = $this->db->prepare($query);
    $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
    $queryExecute->execute();
    return $queryExecute->fetch(PDO::FETCH_OBJ);
  }

  public function modifyUsers() {

    $query = 'UPDATE `p13r_users` SET `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `phone` = :phone, `mail` = :mail '
            . 'WHERE `id` = :id';

    $queryExecute = $this->db->prepare($query);
    $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
    $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
    $queryExecute->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
    $queryExecute->bindValue(':phone', $this->phone, PDO::PARAM_STR);
    $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
    $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
    return $queryExecute->execute();
  }

  public function checkUsersMail() {
    $query = 'SELECT COUNT(`id`) as `number` '
            . 'FROM `p13r_users` '
            . 'WHERE `mail` = :mail';
    $queryExecute = $this->db->prepare($query);
    $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
    $queryExecute->execute();
    return $queryExecute->fetch(PDO::FETCH_OBJ);
  }

  public function checkUsersLogin() {
    $query = 'SELECT COUNT(`id`) as `number` '
            . 'FROM `p13r_users` '
            . 'WHERE `login` = :login';
    $queryExecute = $this->db->prepare($query);
    $queryExecute->bindValue(':login', $this->login, PDO::PARAM_STR);
    $queryExecute->execute();
    return $queryExecute->fetch(PDO::FETCH_OBJ);
  }

  /**
   * Méthode permettant de récupérer le hash du mot de passe, on pourra le
   * comparer à celui tapé lors de la connexion
   * @return object
   */
  public function getHashByMail() {
    $query = 'SELECT `password` '
            . 'FROM `p13r_users` '
            . 'WHERE `mail` = :mail';
    $queryExecute = $this->db->prepare($query);
    $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
    $queryExecute->execute();
    return $queryExecute->fetch(PDO::FETCH_OBJ);
  }

  public function getUsersByMail() {
    $query = 'SELECT `id`, `id_userRoles` '
            . 'FROM `p13r_users` '
            . 'WHERE `mail` = :mail';
    $queryExecute = $this->db->prepare($query);
    $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
    $queryExecute->execute();
    return $queryExecute->fetch(PDO::FETCH_OBJ);
  }

  public function __destruct() {
    $this->db = NULL;
  }

}

?>
