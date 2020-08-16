<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RendezvousController extends Controller
{
    public function add()
    {
        return view('rendezvous.add');
    }
    public function getAll()
    {
        return view('rendezvous.liste');
    }
    public function edit($id)
    {
        return view('rendezvous.edit');
    }
    public function update()
    {
        return $this->getAll();
    }
    public function delete($id)
    {
        return $this->getAll();
    }
}
