<?php
  class Pages extends Controller{
    public function __construct(){
     
    }

    // Load Homepage
    public function index(){
      // If logged in, redirect to posts
     
      // Load homepage/index view
      $this->view('pages/index');
    }

    public function about(){

      // Load about view
      $this->view('pages/about');
    }
    public function login(){
  
      $this->view('pages/login');
    }
    public function loginadmin(){
  
      $this->view('pages/loginadmin');
    }
    public function dashboard(){
  
      $this->view('pages/dashboard');
    }
    public function register(){
  
      $this->view('pages/register');
    }
    public function cruise(){
  
      $this->view('pages/cruise');
    }
  }
  