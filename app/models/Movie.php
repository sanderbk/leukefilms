<?php
class Movie {


    private $db;

    public function __construct() {
        $this->db = new Database;
    }
    //get all movies in db
    public function findAllMovies() {
        $stmt = $this->db->query('SELECT * FROM movies');
        $results = $this->db->resultSet();
        
        return $results;
    }
     //get all movies in db
     public function findRandomMovies() {
        $this->db->query('SELECT * FROM movies ORDER BY RAND() LIMIT 10;');  
        $results = $this->db->resultSet();

        return $results;
    }
        //get all movies in db
        public function findTopMovies() {
            $this->db->query('SELECT * FROM movies ORDER BY id LIMIT 10;');  
            $results = $this->db->resultSet();
            return $results;
        }
    
     //get movie by id
    public function findMovieById($id) {
        $this->db->query('SELECT * FROM movies WHERE id = :id');

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }
    //delete movie by id
    public function deleteMovie($id) {
        $this->db->query('DELETE FROM movies WHERE id = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    //add movie with form data
    public function addMovie($data) {
        $this->db->query('INSERT INTO movies (title, description, categorie, trailer, runtime, image, releasedate) VALUES (:title, :description, :categorie, :trailer, :runtime, :image, :releasedate)');
       foreach ($data as $key => $value) {
         if(!strpos($key, 'Error')) {
            echo $key;
            echo $value;
            $safe_value = mysql_real_escape_string($value);
            $this->db->bind(':'.$key, $safe_value);
         }
        
       }
        // $this->db->bind(':title', $data['title']);
        // $this->db->bind(':description', $data['description']);
        // $this->db->bind(':categorie', $data['categorie']);
        // $this->db->bind(':trailer', $data['trailer']);
        // $this->db->bind(':runtime', $data['runtime']);
        // $this->db->bind(':image', $data['image']);
        // $this->db->bind(':releasedate', $data['releasedate']);
        

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function updateMovie($data) {
        if($data['img_check']) {
            $this->db->query('UPDATE movies SET title = :title, description = :description, categorie = :categorie, trailer = :trailer, runtime = :runtime, image = :image, releasedate = :releasedate    WHERE id = :id');
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':categorie', $data['categorie']);
            $this->db->bind(':trailer', $data['trailer']);
            $this->db->bind(':runtime', $data['runtime']);
            $this->db->bind(':image', $data['image']);
            $this->db->bind(':releasedate', $data['releasedate']);
        }
        else {
            $this->db->query('UPDATE movies SET title = :title, description = :description, categorie = :categorie, trailer = :trailer, runtime = :runtime, releasedate = :releasedate    WHERE id = :id');
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':categorie', $data['categorie']);
            $this->db->bind(':trailer', $data['trailer']);
            $this->db->bind(':runtime', $data['runtime']);
            $this->db->bind(':releasedate', $data['releasedate']);
        }

      

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>