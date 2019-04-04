<?php

class Job
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  //Get all jobs
  public function getAllJobs()
  {
    $this->db->query("select jobs.*, categories.name as cname from jobs inner join categories on jobs.category_id = categories.id order by post_date desc");

    //Assing Result set
    $results = $this->db->resultSet();
    return $results;
  }
}
