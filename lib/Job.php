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

  public function getCategories()
  {
    $this->db->query("select * from categories");

    //Assing Result set
    $results = $this->db->resultSet();
    return $results;
  }

  public function getByCategory($category){
    $this->db->query("select jobs.*, categories.name as cname from jobs inner join categories on jobs.category_id = categories.id where jobs.category_id = $category order by post_date desc");

    //Assing Result set
    $results = $this->db->resultSet();
    return $results;
  }

  public function getCategory($category_id){
    $this->db->query("select * from categories where id = :category_id");
    $this->db->bind(':category_id', $category_id);
    $row = $this->db->single();

    return $row;
  }
}
