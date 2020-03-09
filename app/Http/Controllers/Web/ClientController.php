<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Client;

class ClientController extends Controller
{
	public function index()
	{
		if(auth()->user()->hasRole('admin')){
			$clients = Client::paginate(10);

			return view('pages.clients.list', compact('clients'));
		}elseif(auth()->user()->hasRole('coordinator')){
			$clients = Client::paginate(10);

			return view('pages.clients.list', compact('clients'));
		}elseif(auth()->user()->hasRole('facility')){
			$clients = Client::paginate(10);

			return view('pages.clients.list', compact('clients'));
		}else{
            abort(403);
        }
    }
}
