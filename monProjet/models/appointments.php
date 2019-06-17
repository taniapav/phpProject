<?php
class appointments extends database{
  public $id = 0;
  public $dateHour = '';
  public $id_users = 0;


  public function __construct() {
    parent::__construct();
  }

public function addAppointements(){
  $query = 'INSERT INTO `p13r_appointments` (`dateHour`, `id_users`) '
  . 'VALUE (:dateHour, :id_users)';
  $queryExecute = $this->db->prepare($query);
  $queryExecute->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
  $queryExecute->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
  return $queryExecute->execute();

  /**
   * Méthode permettant de vérifier que la plage horaire est libre.
   * Retour possible : false -> la requête ne s'est pas exécutée.
   *                   0     -> la plage horaire est disponible.
   *                   1     -> la plage horaire est prise.
   * @return boolean
   */
}

public function checkFreeAppointments(){
//On créé une variable de type booléen.
$isOk = false;
$query = 'SELECT COUNT(`id`) AS `isFree` FROM `p13r_appointments` WHERE `dateHour` = :dateHour';
$queryExecute = $this->db->prepare($query);
$queryExecute->bindValue('dateHour', $this->dateHour, PDO::PARAM_STR);
//Si ma méthode (ici $queryExecute)->execute() = true
if ($queryExecute->execute()) {
 $result = $queryExecute->fetch(PDO::FETCH_OBJ);
 $isOk = $result->isFree;
 }
 return $isOk;
}

public function getAppointmentsList(){

  $query = 'SELECT `a`.`id`, DATE_FORMAT(`a`.`dateHour`, \'%d/%m/%Y %H:%i\' ) AS `dateHour`, UPPER(`u`.`lastname`) AS `lastname`, `u`.`firstname`, DATE_FORMAT(`u`.`birthdate`, \'%d/%m/%Y\') AS `birthdate`, `u`.`phone`, `u`.`id` AS `userId` '
          . 'FROM `p13r_appointments` AS `a` '
          . 'INNER JOIN `p13r_users` AS `u` ON `a`.`id_users` = `u`.`id` '
          . 'ORDER BY `dateHour`';
 $queryExecute = $this->db->query($query);

 return $queryExecute->fetchAll(PDO::FETCH_OBJ);

}

public function getAppointment() {

   $query = 'SELECT `a`.`id`, `a`.`dateHour`, UPPER(`u`.`lastname`) AS `lastname`, `u`.`firstname`, DATE_FORMAT(`u`.`birthdate`, \'%d/%m/%Y\') AS `birthdate`, `u`.`phone`, `u`.`mail`, `id_users` '
           . 'FROM `p13r_appointments` AS `a` '
           . 'INNER JOIN `p13r_users` AS `u` ON `a`.`id_users` = `u`.`id` '
           . 'WHERE `a`.`id` = :id ';

   $queryExecute = $this->db->prepare($query);
   $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
   $queryExecute->execute();
   return $queryExecute->fetch(PDO::FETCH_OBJ);
}
public function modifyAppointment(){

  $query = 'UPDATE `p13r_appointments` SET `dateHour` = :dateHour WHERE `id` = :id ';
  $queryExecute = $this->db->prepare($query);
  $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
  $queryExecute->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
  return $queryExecute->execute();
}

public function getAppointmentListUsers() {
   $query= 'SELECT DATE_FORMAT(`dateHour`, \'%d/%m/%Y\') AS date, DATE_FORMAT(`dateHour`, \'%H%i\') AS `hour` '
           . 'FROM `p13r_appointments` '
           . 'WHERE `id_users` = :id_users';
   $queryExecute= $this->db->prepare($query);
   $queryExecute->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
   $queryExecute->execute();
   return $queryExecute->fetchAll(PDO::FETCH_OBJ);
}

public function deleteAppointment(){

  $query = 'DELETE FROM `p13r_appointments` WHERE `id` = :id ';
  $queryExecute = $this->db->prepare($query);
  $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
  return $queryExecute->execute();
}

public function __destruct() {
  $this->db = NULL;
}

}
?>
