<?php

namespace App\Controllers;
use App\Models\GuestModel;

class ContactController extends BaseController
{
    public function index()
    {
        return view('contact_form');
    }

    public function processForm()
    {
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $message = $this->request->getPost('message');

        $nameErr = $emailErr = $messageErr = "";

        if (empty($name)) {
            $nameErr = "Name is required";
        } else {
            $name = $this->testInput($name);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed!";
            }
        }

        if (empty($email)) {
            $emailErr = "Email is required";
        } else {
            $email = $this->testInput($email);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format!";
            }
        }

        if (empty($message)) {
            $messageErr = "Message is required! Come on. Say something!";
        } else {
            $message = $this->testInput($message);
        }

        $data = [
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'nameErr' => $nameErr,
            'emailErr' => $emailErr,
            'messageErr' => $messageErr,
        ];

        if ($nameErr || $emailErr || $messageErr) {
            return view('templates/header', $data)
            . view('pages/fail', $data)
            . view('templates/footer');
        } else {
            $model = model(GuestModel::class);

            $model->save([
                'name' => $data['name'],
                'email'  => $data['email'],
                'message'  => $data['message'],
            ]);
    
            return view('templates/header', $data)
            . view('pages/success', $data)
            . view('templates/footer');
        }
       
        // return view('templates/header', $data) . view('pages/success', $data)
        // . view('templates/footer');
    }

    
    private function testInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
