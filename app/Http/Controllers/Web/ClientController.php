<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Client;
use App\Model\Facility;

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
			$clients = auth()->user()->uploaded_clients->paginate(10);

			return view('pages.clients.list', compact('clients'));
		}else{
            abort(403);
        }
    }

    public function clients_by_facility()
	{
		if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordinator')){
			$facilities = Facility::paginate(10);

			return view('pages.clients.list_by_facility', compact('facilities'));
		}else{
            abort(403);
        }
    }

    public function clients_by_facility_show(Facility $facility)
	{
		if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordinator')){
			$clients = $facility->clients->paginate(10);

			return view('pages.clients.list_by_facility_client', compact('clients', 'facility'));
		}else{
            abort(403);
        }
    }
}
