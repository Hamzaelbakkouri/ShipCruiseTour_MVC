<?php

class cruiseController extends Controller
{
    private $cruiseModel;
    private $bookingModel;
    private $type_roomModel;
    private $roomModel;
    private $reservationModel;
    private $portModel;
    private $shipModel;

    public function __construct()
    {
        $this->cruiseModel = $this->model('cruise');
        $this->bookingModel = $this->model('booking');
        $this->type_roomModel = $this->model('RoomTypes');
        $this->roomModel = $this->model('Room');
        $this->reservationModel = $this->model('reservation');
        $this->shipModel = $this->model('ship');
        $this->portModel = $this->model('port');
    }

    public function Admin()
    {
        if (isset($_SESSION['Id'])) {
            # code...
            $cruises = $this->cruiseModel->getCruises();


            if ($cruises) {
                $data = [
                    'cruises' => $cruises
                ];
                $this->view('Admin', $data);
            } else {
                echo ('cruise not found');
            }
        }
    }

    public function delete_cruise($id)
    {
        $this->cruiseModel->deletecruise($id);
        return $this->Admin();
    }


    public function add_cruise()
    {
        if (isset($_SESSION['Id'])) {
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $ship = $_POST['ship'];
                $price = $_POST['price'];
                $picture = $_POST['picture'];
                $nights = $_POST['nights'];
                $ports = $_POST['ports'];
                $Date = $_POST['Date'];
                $trajet = $_POST['trajet'];

                $this->cruiseModel->insertCruise($name, $ship, $price, $picture, $nights, $ports, $Date, $trajet);
                return $this->Admin();
            } else {
                redirect('pages/add_cruise');
            }
        }
    }

    public function getTraject($id)
    {
        $traject = $this->cruiseModel->gettrajet($id);
        $trajet = [
            'places' => $traject
        ];

        echo json_encode($trajet);
        die;
    }

    public function booking()
    {
        $cards = $this->cruiseModel->getCruises();
        $param = $cards[0]->ID_cruise;
        $trajet = $this->cruiseModel->gettrajet($param);

        $navires = $this->shipModel->getship();
        $port = $this->portModel->getport();
        $data = [
            'cards' => $cards,
            'navires' => $navires,
            'ports' => $port,
            'trajet' => $trajet
        ];
        $this->view('booking', $data);
    }

    public function reservation()
    {
        if (isset($_SESSION['Id'])) {
            if (isset($_POST['submit'])) {

                $ID_cruise = (int)$_POST['id_cruise'];
                $Price = (float)$_POST['Price'];

                $id_roomType_price = $_POST['id_roomType_price'];
                $roomTypeArray = explode(' ', $id_roomType_price);

                $id_type_room = (int)$roomTypeArray[0];
                $price_room = (float)$roomTypeArray[1];

                $price_reservation = (float)$Price + (float)$price_room;

                $this->roomModel->insertRoomTypes($id_type_room);
                $room = $this->roomModel->getRoom($id_type_room);
                $id_Room = $room->id;
                $ID_user = $_SESSION['Id'];

                $this->reservationModel->insertReservation($ID_user, $price_reservation, $id_Room, $ID_cruise);

                $this->book_now($ID_cruise);
            } else {
                $this->view('booking');
            }
        }
    }

    public function ticket()
    {
        if (isset($_SESSION['Id'])) {
            # code...
            $ID_user = $_SESSION['Id'];

            $reservation = $this->reservationModel->getreservationByUserID($ID_user);

            $data = [

                'reservations' => $reservation
            ];


            $this->view('ticket', $data);
        }
    }

    public function book_now($id)
    {
        if (isset($_SESSION['Id'])) {
            # code...
            $ID_user = $_SESSION['Id'];
            $reservation = $this->reservationModel->getreservationByUserID($ID_user);

            $data = [
                // 'cruise'=> $cruise,
                'reservations' => $reservation

            ];

            $this->view('ticket', $data);
        }
    }


    public function order($id)
    {
        if (isset($_SESSION['Id'])) {
            # code...
            $cruise = $this->cruiseModel->getCruise($id);
            $room_type = $this->type_roomModel->getRoomTypes();
            $port = $this->portModel->getports();
            $trajet = $this->cruiseModel->gettrajet($id);
            $data = [
                'cruise' => $cruise,
                'roomType' => $room_type,
                'trajet' => $trajet,
                'ports' => $port
            ];

            $this->view('book_now', $data);
        }
    }



    public function getPort()
    {
        if (isset($_SESSION['role']) == 0) {
            $port = $this->portModel->getport();
            return $port;
        }
    }



    public function delete_ticket($id)
    {
        if (isset($_SESSION['Id'])) {

            $reservation = $this->reservationModel->getreservations($id);
            $cruise = $this->cruiseModel->getCruise($reservation->ID_cruise);
            $date = $cruise->start_date;
            $dateArray = explode('-', $date);
            $month = $dateArray[1];
            $day = $dateArray[2];

            $current_month = date('m');
            $current_day = date('d');

            $result = $day - $current_day;
            if ($month == $current_month && $result > 2) {
                $this->bookingModel->deleteBooking($id);
            } elseif ($month > $current_month) {
                $this->bookingModel->deleteBooking($id);
            } else {
                echo 'You can not delete reservation';
                redirectTime('cruiseController/ticket');
                exit;
            }
            redirect('cruiseController/ticket');
        }
    }

    // //filter by month 
    // function filterbymonth(){
    //     if($_SERVER['REQUEST_METHOD']=='POST'){
    //         $month=$_POST['month'];
    //         $data=$this->cruiseModel->filterbymonth($month);
    //         echo json_encode($data);
    //     }
    // }

    // //filter by port 
    // function filterbyport(){
    //     if($_SERVER['REQUEST_METHOD']=='POST'){
    //         $port=$_POST['port'];
    //         $data=$this->cruiseModel->filterbyport($port);
    //         echo json_encode($data);
    //     }
    // }

    // //filter by navire 
    // function filterbynavire(){
    //     if($_SERVER['REQUEST_METHOD']=='POST'){
    //         $navire=$_POST['navire'];
    //         $data=$this->cruiseModel->filterbynavire($navire);
    //         echo json_encode($data);
    //     }
    // }

    public function filtre()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $ship = $_POST['ship'];
            $portDe = $_POST['startPort'];
            $date = $_POST['date'];

            // var_dump($ship,$portDe,$date);
            // die;
            if ($ship != 0) {
                $sqlNav = 'ship =' . $ship;
            } else {
                $sqlNav = '';
            }

            if ($portDe != 0) {
                $sqlportDe = 'start_port =' . $portDe;
            } else {
                $sqlportDe = '';
            }

            if ($date != '' && !empty($date)) {
                $sqldate = 'MONTH(start_date) ="' . $date . '"';
            } else {
                $sqldate = '';
            }

            $sqlArray = [
                '0' => $sqlNav,
                '1' => $sqlportDe,
                '2' => $sqldate
            ];
            $sqlArrayNotEmpty = [];
            for ($i = 0; $i < count($sqlArray); $i++) {
                if ($sqlArray[$i] != '') {
                    array_push($sqlArrayNotEmpty, $sqlArray[$i]);
                }
            }

            $sql = '';
            if (count($sqlArrayNotEmpty) == 0) {
                $sql = '';
            }
            if (count($sqlArrayNotEmpty) == 1) {
                $sql = $sqlArrayNotEmpty[0];
            }
            if (count($sqlArrayNotEmpty) == 2) {
                $sql = $sqlArrayNotEmpty[0] . ' AND ' . $sqlArrayNotEmpty[1];
            }
            if (count($sqlArrayNotEmpty) == 3) {
                $sql = $sqlArrayNotEmpty[0] . ' AND ' . $sqlArrayNotEmpty[1] . ' AND ' . $sqlArrayNotEmpty[2];
            }

            $cruises = $this->cruiseModel->search($sql);
            $ports = $this->portModel->getport();
            $navires = $this->shipModel->getship();
            if ($cruises) {
                $data = [
                    'cards' => $cruises,
                    'ports' => $ports,
                    'navires' => $navires
                ];
                $this->view('booking', $data);
            } else {
                require_once "../App/views/include/navbar.php";
                echo ('<p class="NotFound  text-white text-lg">Cruise Not Found</p>');
                require_once "../App/views/include/footer.php";
            }
        } else {
            $cruises = $this->cruiseModel->getCruises();
            $ports = $this->portModel->getport();
            $navires = $this->shipModel->getship();
            if ($cruises) {
                $data = [
                    'cards' => $cruises,
                    'ports' => $ports,
                    'navires' => $navires
                ];
                $this->view('booking', $data);
            } else {
                require_once "include/navbar.php";
                echo ('<p class="NotFound text-white text-lg">Cruise Not Found</p>');
                require_once "include/footer.php";
            }
        }
    }
}
