<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Client;

class ClientController extends Controller
{
	public function index()
	{
		$clients = Client::paginate(10);

		return view('pages.clients.list', compact('clients'));
    }
}
