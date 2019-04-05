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

  public function getByCategory($category)
  {
    $this->db->query("select jobs.*, categories.name as cname from jobs inner join categories on jobs.category_id = categories.id where jobs.category_id = $category order by post_date desc");

    //Assing Result set
    $results = $this->db->resultSet();
    return $results;
  }

  public function getCategory($category_id)
  {
    $this->db->query("select * from categories where id = :category_id");
    $this->db->bind(':category_id', $category_id);
    $row = $this->db->single();

    return $row;
  }

  //get Job
  public function getJob($id)
  {
    $this->db->query("select * from jobs where id = :job_id");
    $this->db->bind(':job_id', $id);
    $row = $this->db->single();

    return $row;
  }

  //create job

  public function create($data)
  {
    //Insert query
    $this->db->query("insert into jobs(category_id,job_title,comapny,description,location,salary,contact_user,contact_email) values (:category_id,:job_title,:company,:description,:location,:salary,:contact_user,:contact_email)");

    //Bind data
    $this->db->bind(':category_id', $data['category_id']);
    $this->db->bind(':job_title', $data['job_title']);
    $this->db->bind(':company', $data['company']);
    $this->db->bind(':description', $data['description']);
    $this->db->bind(':location', $data['location']);
    $this->db->bind(':salary', $data['salary']);
    $this->db->bind(':contact_user', $data['contact_user']);
    $this->db->bind(':contact_email', $data['contact_email']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
