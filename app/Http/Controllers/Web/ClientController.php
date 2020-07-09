<?php

namespace App\Http\Controllers\Web;

use App\Exports\DataExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Client;
use App\Model\Facility;
use App\User;
use App\Model\State;
use App\Model\Lga;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends Controller
{
	public function index()
	{
	    $clients = null;

		if(auth()->user()->hasRole(['admin', 'coordinator'])){
            $this->clients = Client::paginate(10);
		}elseif(auth()->user()->hasRole('facility')){
            $this->clients = auth()->user()->uploaded_clients->paginate(10);
		}

        return view('pages.clients.list', ['clients' => $this->clients]);
    }

    public function show(Client $client)
	{
		if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordinator')){
			return view('pages.clients.profile', compact('client'));
		}else{
            abort(403);
        }
    }

    public function export_clients(Request $request){
        // validate request
        $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        return (new DataExport($request->start_date, $request->end_date, 0))->download('clients_line_list.xlsx');
    }
}
