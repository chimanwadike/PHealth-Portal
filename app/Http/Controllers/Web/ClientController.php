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
            $this->clients = Client::get();
		}elseif(auth()->user()->hasRole('facility')){
            $this->clients = auth()->user()->uploaded_clients->get();
		}

        return view('pages.clients.list', ['clients' => $this->clients]);
    }

    public function filter_clients(Request $request){
        $clients = null;

        if(auth()->user()->hasRole(['admin', 'coordinator'])){
            $this->clients = Client::get();
        }elseif(auth()->user()->hasRole('facility')){
            $this->clients = auth()->user()->uploaded_clients->get();
        }

        if ($request->state != null)
            $this->clients = $this->clients->Where('client_state_code', $request->state);
        if ($request->lga != null)
            $this->clients = $this->clients->Where('client_lga_code', $request->lga);
        if ($request->sex != null)
            $this->clients = $this->clients->Where('sex', $request->sex);
        if ($request->result != null)
            $this->clients = $this->clients->Where('current_result', $request->result);



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
