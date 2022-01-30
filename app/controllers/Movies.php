<?php
class Movies extends Controller {
    public function __construct() {
        $this->movieModel = $this->model('Movie');
    }
    public function top() {
        $movies = $this->movieModel->findAllMovies();
        
        $data = [
           
            'movies' => $movies,
            'addError' => ''
        ];

        $this->view('movies/top', $data);
    }

    public function index() {
        $movies = $this->movieModel->findRandomMovies();
            $i = 0;
            $newarray = array();
            foreach($movies as $v) 
            {
            
                $v->imdbRating = '0';
                $v->Metascore = '0';
                $v->Rated = '0';
                $newarray[] = $v;
            }
        $data = [
           
            'movies' => $movies,
            'addError' => ''
        ];

        $this->view('movies/index', $data);
    }
    public function fetch() {
        $movies = $this->movieModel->findTopMovies();
        $i = 0;
        $newarray = array();
        foreach($movies as $v) 
        {
            $movie_array = $this->useApi($v);
        
            $v->Rated =  $movie_array['Rated'];
            $v->imdbRating =  $movie_array['imdbRating'];
            $v->Metascore = $movie_array['Metascore'];
            $newarray[] = $v;
        }
        $data = [
       
        'movies' => $newarray,
        'addError' => ''
         ];

         $this->view('movies/index', $data);
    }
    public function useApi($m) {
        $apikey = "&apikey=3316c99c";
        $omdburl = "http://www.omdbapi.com/?t=";
        $newmovtit = str_replace(' ', '+', $m->title);
        $full_url = ($omdburl . $newmovtit . $apikey);
        $movie_json = file_get_contents($full_url);
        $movie_array = json_decode($movie_json, true);   
        return $movie_array;

    }

    public function show($id) {

        $row = $this->movieModel->findMovieById($id);


        $this->view('movies/show', $row);
        
    }

    
    public function list() {
        $movies = $this->movieModel->findAllMovies();

        $data = [
            'movies' => $movies,
            
        ];

        $this->view('movies/list', $data);
    }
    public function creating() {
        $this->view('movies/create');
    }
    //create funct
    public function create() {
        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/movies");
        }

        $data = [
            'title' => '',
            'description' => '',
            'categorie' => '',
            'trailer' => '',
            'runtime' => '',
            'image' => '',
            'releasedate' => '',
            'titleError' => '',
            'descriptionError' => '',
            'categorieError' => '',
            'trailerError' => '',
            'runtimeEror' => '',
            'imageError' => '',
            'releasedateError' => '',
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {


            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

           
            $uploaddir = 'img/';
            $uploadfile = $uploaddir . basename($_FILES['image']['name']);
        
  
        
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                echo "File is valid, and was successfully uploaded.\n";
            } else {
                echo "Upload failed";
            }

        
            $data = [
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'categorie' => trim($_POST['categorie']),
                'trailer' => trim($_POST['trailer']),
                'runtime' => trim($_POST['runtime']),
                'image' =>  basename($_FILES['image']['name']),
                'releasedate' => trim($_POST['releasedate']),
                'titleError' => '',
                'descriptionError' => '',
                'categorieError' => '',
                'trailerError' => '',
                'runtimeError' => '',
                'imageError' => '',
                'releasedateError' => '',
            ];
            if(empty($data['title'])) {
                $data['titleError'] = 'The title of a post cannot be empty';
            }

            if(empty($data['description'])) {
                $data['descriptionError'] = 'The description of a post cannot be empty';
            }

            if (empty($data['titleError']) && empty($data['bodyError'])) {
                if ($this->movieModel->addMovie($data)) {
                    header("Location: " . URLROOT . "/movies");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('movies/create', $data);
            }
        }

        $this->view('movies/create', $data);
    }




    public function update($id) {
        $movie = $this->movieModel->findMovieById($id);

        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/movies");
        }
        
   
 


        $data = [
            'movie' => $movie,
            'title' => '',
            'description' => '',
            'categorie' => '',
            'trailer' => '',
            'runtime' => '',
            'image' => '',
            'releasedate' => '',
            'img_check' => '',
            'titleError' => '',
            'descriptionError' => '',
            'categorieError' => '',
            'trailerError' => '',
            'runtimeErorr' => '',
            'imageError' => '',
            'releasedateError' => '',
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $uploaddir = 'img/';
                $uploadfile = $uploaddir . basename($_FILES['image']['name']);
                
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                echo "File is valid, and was successfully uploaded.\n";
            } else {
                echo "Upload failed";
            }
    
            $data = [
                'id' => $id,
                'movie' => $movie,
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'categorie' => trim($_POST['categorie']),
                'trailer' => trim($_POST['trailer']),
                'runtime' => trim($_POST['runtime']),
                'image' =>  basename($_FILES['image']['name']),
                'releasedate' => trim($_POST['releasedate']),
                'img_check' => trim($_POST['img_check']),
                'titleError' => '',
                'descriptionError' => '',
                'categorieError' => '',
                'trailerError' => '',
                'runtimeErorr' => '',
                'imageError' => '',
                'releasedateError' => '',
            ];
            if(empty($data['title'])) {
                $data['titleError'] = 'The title of a post cannot be empty';
            }

            if(empty($data['description'])) {
                $data['descriptionError'] = 'The description of a post cannot be empty';
            }

            if (empty($data['titleError']) && empty($data['bodyError'])) {
                if ($this->movieModel->updateMovie($data)) {
                    header("Location: " . URLROOT . "/movies");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('movies/update', $data);
            }
        }
        $this->view('movies/update', $data);
    }

    public function delete($id) {

        $movie = $this->movieModel->findMovieById($id);

        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/movies");
        } elseif($post->user_id != $_SESSION['user_id']){
            header("Location: " . URLROOT . "/movies");
        }

        $data = [
            'movie' => $movie,
            'title' => '',
            'body' => '',
            'titleError' => '',
            'bodyError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->movieModel->deleteMovie($id)) {
                    header("Location: " . URLROOT . "/movies");
            } else {
               die('Something went wrong!');
            }
        }
    }
}

