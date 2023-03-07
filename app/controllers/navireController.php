
<?php
class navireController extends Controller
{

    public $navireModel;

    public function __construct()
    {
        $this->navireModel = $this->model('ship');
    }

    public function add_navire()
    {
        if (isset($_POST['submit'])) {
            $name = $_POST['ship'];
            $room = $_POST['room'];
            $places = $_POST['places'];

            $this->navireModel->insertship($name, $room, $places);
            return $this->admin_ships();
        } else {
            $this->view('add_port');
        }
    }

    public function admin_ships()
    {
        $ships = $this->navireModel->getship();
        if ($ships) {
            $data = [
                'ships' => $ships
            ];

            $this->view('admin_ships', $data);
        } else {
            echo ('not found');
        }
    }

    public function delete_ship($id)
    {
        $this->navireModel->delete_ship($id);
        return $this->admin_ships();
    }
}
