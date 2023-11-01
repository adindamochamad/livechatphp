<?php
defined('BASEPATH') or exit;

class ChatController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('my_model');
    }

    public function index()
    {
        $this->load->view('chat_view_user');
    }

    public function registeruser()
    {
        $this->load->model('my_model');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $type = 'user';
        $result = $this->my_model->registeruser($name, $email, $type);
    }

    public function insertchat()
    {
        $this->load->model('my_model');
        $user_id = '2';
        $ref_id = '1';
        $message = $this->input->post('message');
        $time = date('Y-m-d H:i:s');
        $result = $this->my_model->insertchat($message, $user_id, $ref_id, $time);
    }

    public function loadchat()
    {
        $this->load->model('my_model');
        $user_id = $_SESSION['user_id']; // Pastikan sesi user_id sudah di-set dengan benar
        $ref_id = $_SESSION['admin']; // Pastikan sesi admin sudah di-set dengan benar

        $chatMessages = $this->my_model->loadchat($user_id, $ref_id);

        echo json_encode($chatMessages);
    }
}
