<?php

  class Events extends Controller {

    public function __construct(){

      $this->eventModel = $this->model("Event");
      $this->userModel = $this->model("User");
      $this->matchModel = $this->model("Match");


      if(!isLoggedIn()){
        redirect('users/login');
      }
    }

    public function index(){

      $user = $_SESSION['User_ID'];
      $role = $this->userModel->getUserRole($user);

      $matches = $this->matchModel->getMatches($user, $role->Role_ID);

      $data = [
        "matches" => $matches
      ];
      $this->view('events/events', $data);
    }

    public function createEvent(){

      $user = $_SESSION['User_ID'];
      $role = $this->userModel->getUserRole($user);

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // If the user is a tourist
        if ($role->Role_ID === 1) {
          $data = [

          ];
    echo "role 1";
          // If the user is a buddy
        } else if ($role->Role_ID === 2){
          $data = [

          ];
          echo "role 2";
        }

        // $this->eventModel->createEvent($user, $data);

        // redirect("events");
        echo "event created";

      } else {
        // redirect("events");
        echo "No event";

      }

    }


}
?>
