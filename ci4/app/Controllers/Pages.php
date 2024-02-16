<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
    public function index()
    {
        return $this->renderPage('home');
    }

    public function view($page = 'home')
    {
        return $this->renderPage($page);
    }

    public function about($page = 'about')
    {
        return $this->renderPage($page);
    }

    private function renderPage($page)
    {
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($page);
        }

        $data = [
            'title' => ucfirst($page),
            'content' => view('pages/' . $page)
        ];

        return view('templates/header', $data)
            . view('templates/container', $data)
            . view('templates/footer');
    }
}
