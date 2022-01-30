<?php
class MovieLists extends Controller {
    public function __construct() {
        $this->movieListModel = $this->model('Movielist');
        $this->movieModel = $this->model('Movie');
    }

    public function index2() {
        $movielists = $this->movieListModel->findAllLists();

        $data = [
            'movielists' => $movielists
        ];

        $this->view('movielists/index', $data);
    }
    public function index() {

        $movielists = $this->movieListModel->findListById();

       
  if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/users/login");
        }
        else {
            $data = [
                'movielists' => $movielists,
                'id' => '',
                'uid' => '',
                'mid' => '',
                'movie' => '',
                'title' => '',
                'body' => '',
                'titleError' => '',
                'bodyError' => ''
            ];
            
          
    
            $this->view('movielists/index', $data);
        }

        

   

    }
    public function addmovie($movieid) {

        if(isset($_SESSION['user_id'])) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                if($this->movieListModel->checkForDupe($movieid)) {
                        header("Location: " . URLROOT . "/movielists");
                } else {
                    $movies = $this->movieModel->findAllMovies();
                    $data = [
                        'movies' => $movies,
                        'addError' => 'Cant add the movie twice to your watchlist'
                    ];
                    $this->view('movies/index', $data);

                }
            }
        }
        else {
            header("Location: " . URLROOT . "/movies");
        }
     
    }
    
    public function delfromlist($id) {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            if($this->movieListModel->deleteMovieFromList($id)) {
                    header("Location: " . URLROOT . "/movielists");
            } else {
               die('Something went wrong!');
            }
        }
    }
}

   
    


