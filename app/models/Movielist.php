<?php
class Movielist {

    private $db;

    public function __construct() {
        $this->db = new Database;
       // $this->load->library('session');
    }
    //get all movies in db
    public function findAllLists() {
        $this->db->query('SELECT * FROM movielist');

        $results = $this->db->resultSet();

        return $results;
    }
     //get movie by id

    public function findListById() {

        $uid = $_SESSION['user_id'];
        
        $this->db->query('SELECT ml.id, ml.uid, ml.mid, m.title, m.description, m.categorie, m.image, m.runtime FROM movielist ml JOIN movies m on m.id=ml.mid WHERE ml.uid = :uid');

        // $this->db->query(' SELECT * FROM movielist JOIN movies on movies.id=movielist.mid WHERE movielist.uid = :uid');


        $this->db->bind(':uid', $uid);

        $results = $this->db->resultSet();

        return $results;
    }

    public function checkForDupe($movieid) {
        $uid = $_SESSION['user_id'];
        $this->db->query('SELECT COUNT(*) FROM movielist where mid = :mid AND uid = :uid');
        $this->db->bind(':mid', $movieid);
         $this->db->bind(':uid', $uid);
         $this->db->execute();


        $int = $this->db->fetchColumn();
      
        if($int == 0) {
            $this->addMovieToList($movieid);
            return true;
            
        }
        else {
            return false;
        }
      
    }

    public function addMovieToList($movieid) {
        $uid = $_SESSION['user_id'];
        $this->db->query("INSERT INTO movielist (mid, uid) VALUES ($movieid, $uid)");
        $this->db->bind(':id', $id);
        
       
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
      
        
    }
    //delete movie by id
    public function deleteMovieFromList($id) {
        $this->db->query('DELETE FROM movielist WHERE id = :id');

        $this->db->bind(':id', $id);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // //add movie with form data
    // public function addMovie($data) {
    //     $this->db->query('INSERT INTO movies (title, description, categorie, trailer, runtime, image, releasedate) VALUES (:title, :description, :categorie, :trailer, :runtime, :image, :releasedate)');

      
    //     $this->db->bind(':title', $data['title']);
    //     $this->db->bind(':description', $data['description']);
    //     $this->db->bind(':categorie', $data['categorie']);
    //     $this->db->bind(':trailer', $data['trailer']);
    //     $this->db->bind(':runtime', $data['runtime']);
    //     $this->db->bind(':image', $data['image']);
    //     $this->db->bind(':releasedate', $data['releasedate']);
        

    //     if ($this->db->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}
?>