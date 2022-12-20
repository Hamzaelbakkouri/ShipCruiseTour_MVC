<?php
class disconnect {
    function disconnect(){
        session_destroy();
        header("location: login");
    }
}
?>