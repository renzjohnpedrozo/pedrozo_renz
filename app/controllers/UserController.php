<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->library('pagination'); 
        $this->call->library('auth');  

        // ✅ Require login for all
        if (!$this->auth->is_logged_in()) {
            redirect('auth/login');
            exit;
        }
    }

    // 👁️ Both admin and user can access this (view only)
    public function index()
    {
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $q = isset($_GET['q']) ? trim($_GET['q']) : '';

        $records_per_page = 5;
        $result = $this->UserModel->page($q, $records_per_page, $page);

        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);

        $this->pagination->initialize(
            $result['total_rows'], 
            $records_per_page, 
            $page, 
            'users?q='.$q
        );

        $data = [
            'users' => $result['records'],
            'page'  => $this->pagination->paginate(),
            'q'     => $q
        ];

        $data['auth'] = $this->auth; // 🔹 Pass auth object to view
        $this->call->view('user/view', $data);

    }

    // 🛠️ Admin only
    public function create()
    {
        if ($this->auth->has_role('user')) {
            echo 'Access denied!';
            exit;
        }

        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $email = $this->io->post('email');

            $data = [
                'username' => $username,
                'email' => $email
            ];
            $this->UserModel->insert($data);
            redirect('/');
        } else {
            $this->call->view('user/create'); 
        }
    }

    // 🛠️ Admin only
    public function update($id)
    {
        if ($this->auth->has_role('user')) {
            echo 'Access denied!';
            exit;
        }

        $data['user'] = $this->UserModel->find($id);
        if ($this->io->method() == 'post') {
            $data = [
                'username' => $this->io->post('username'),
                'email' => $this->io->post('email')
            ];
            $this->UserModel->update($id, $data);
            redirect('/');
        } else {
            $this->call->view('user/update', $data);
        }
    }

    // 🗑️ Admin only
    public function delete($id)
    {
        if ($this->auth->has_role('user')) {
            echo 'Access denied!';
            exit;
        }

        $this->UserModel->delete($id);
        redirect('/');
    }
}