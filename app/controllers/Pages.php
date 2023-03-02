

<?php


class Pages extends Controller
{
    public $User;
    public $portModel;
    public $shipModel;
    public function __construct()
    {
        $this->portModel = $this->model('port');
        $this->shipModel = $this->model('ship');
        $this->User = $this->model('user');
    }

    public function home()
    {
        $this->view('home');
    }

    
    public function home2()
    {
        $this->view('home2');
    }

    


    public function booking()
    {
        $this->view('booking');
    }


    public function add()
    {
        $port = $this->portModel->getport();
        $ship = $this->shipModel->getship();
        $data = [
            'port' => $port,
            'ship'=>$ship
        ];
        $this->view('add', $data);
    }


    public function Admin()
    {
        $this->view('Admin');
    }

    public function ticket()
    {
        $this->view('ticket');
    }


    public function edite()
    {
        $this->view('edite');
    }


    public function login()
    {
        $this->view('login');
    }

    public function register()
    {
        $this->view('register');
    }
    public function book_now()
    {
        $this->view('book_now');
    }



    public function index()
    {
        echo 'hey';
    }
}
