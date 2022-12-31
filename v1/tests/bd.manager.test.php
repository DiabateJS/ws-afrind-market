<?php
include_once "tests.interface.php";
include_once "../models/bd.manager.php";
include_once "../utils/util.php";

class BdManagerTest implements Test {

    public function isBdConnexionCorrect(){
        $bdManager = new BdManager();
        return $bdManager->hasError == false;
    }

    public function isExecuteQueryCorrect(){
        $bdManager = new BdManager();
        $sql_create = "create table test(id int, libelle varchar(20))";
        $sql_delete = "drop table test";
        $result_create = $bdManager->executeQuery($sql_create);
        $result_delete = $bdManager->executeQuery($sql_delete);
        return $result_create->hasError == false && $result_delete->hasError == false;
    }

    public function isExecutePreparedQueryCorrect(){
        $bdManager = new BdManager();
        $sql_create = "create table test(id int, libelle varchar(20))";
        $sql_prepared_query = "insert into test(id,libelle) value(:id, :libelle)";
        $dico = array("id" => 1, "libelle" => "test");
        $sql_delete = "drop table test";
        $result_create = $bdManager->executeQuery($sql_create);
        $result_insert = $bdManager->executePreparedQuery($sql_prepared_query, $dico);
        $result_delete = $bdManager->executeQuery($sql_delete);
        return $result_create->hasError == false && 
               $result_insert->hasError == false && 
               $result_delete->hasError == false;
    }

    public function isExecuteSelectCorrect(){
        $bdManager = new BdManager();
        $sql_create = "create table test(id int, libelle varchar(20))";
        $sql_prepared_query = "insert into test(id,libelle) value(:id, :libelle)";
        $dico = array("id" => 1, "libelle" => "test");
        $sql_select = "select id, libelle from test";
        $entete = array("id","libelle");
        $sql_delete = "drop table test";
        $result_create = $bdManager->executeQuery($sql_create);
        $result_insert = $bdManager->executePreparedQuery($sql_prepared_query, $dico);
        $result_select = $bdManager->executeSelect($sql_select,$entete);
        $result_delete = $bdManager->executeQuery($sql_delete);
        return $result_create->hasError == false && 
               $result_insert->hasError == false && 
               $result_select->hasError == false && 
               is_array($result_select->data) &&
               $result_delete->hasError == false;
    }

    public function isExecutePreparedSelectCorrect(){
        $bdManager = new BdManager();
        $sql_create = "create table test(id int, libelle varchar(20))";
        $sql_prepared_query = "insert into test(id,libelle) value(:id, :libelle)";
        $dico = array("id" => 1, "libelle" => "test");
        $sql_select = "select id, libelle from test where id = :id";
        $entete = array("id","libelle");
        $dico = array("id" => 1);
        $sql_delete = "drop table test";
        $result_create = $bdManager->executeQuery($sql_create);
        $result_insert = $bdManager->executePreparedQuery($sql_prepared_query, $dico);
        $result_prepared_select = $bdManager->executePreparedSelect($sql_select,$dico,$entete);
        $result_delete = $bdManager->executeQuery($sql_delete);
        return $result_create->hasError == false && 
               $result_insert->hasError == false && 
               $result_prepared_select->hasError == false && 
               is_array($result_prepared_select->data) &&
               $result_delete->hasError == false;
    }

    public function displayTests(){
        $code = "<h3>Test Bd Manager</h3>";
        $code .= "<table border=1>";
        $code .= "<thead>";
        $code .="<tr><th>Test Description</th><th>Resultat</th></tr>";
        $code .="</thead>";
        $code .="<tbody>";
        $code .="<tr>";
        $code .="<td>Should connexion to database is correct</td>";
        $code .="<td class='".Util::getClassFromBoolean($this->isBdConnexionCorrect())."'></td>";
        $code .="</tr>";
        $code .="<tr>";
        $code .="<td>Should execute query is correct</td>";
        $code .="<td class='".Util::getClassFromBoolean($this->isExecuteQueryCorrect())."'></td>";
        $code .="</tr>";
        $code .="<tr>";
        $code .="<td>Should execute prepared query is correct</td>";
        $code .="<td class='".Util::getClassFromBoolean($this->isExecutePreparedQueryCorrect())."'></td>";
        $code .="</tr>";
        $code .="<tr>";
        $code .="<td>Should execute select query is correct</td>";
        $code .="<td class='".Util::getClassFromBoolean($this->isExecuteSelectCorrect())."'></td>";
        $code .="</tr>";
        $code .="<tr>";
        $code .="<td>Should execute prepared select query is correct</td>";
        $code .="<td class='".Util::getClassFromBoolean($this->isExecutePreparedSelectCorrect())."'></td>";
        $code .="</tr>";
        $code .="</tbody>";
        return $code;
    }
}

?>