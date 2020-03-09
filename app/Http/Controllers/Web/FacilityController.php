<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Facility;
use App\Model\State;
use Illuminate\Validation\Rule;

class FacilityController extends Controller
{
	public function index()
	{
        if(auth()->user()->hasRole('admin')){
            $facilities = Facility::paginate(10);

            return view('pages.facilities.list', compact('facilities'));
        }else{
            abort(403);
        }
    }

    public function create()
	{
        if(auth()->user()->hasRole('admin')){
            $states = State::all();

            return view('pages.facilities.create', compact('states'));
        }else{
            abort(403);
        }
    }

    public function store(Request $request)
    {
        if(auth()->user()->hasRole('admin')){
            $rules = [
                'state_code' => "required",
                'lga_code' => "required",
                'name' => "required|unique:facilities,name",
                'code' => "required",
                'contact_person_name' => "required",
                'contact_person_phone' => "required|phone:AUTO,NG",
            ];

            $customMessages = [
                'state_code.required' => 'Please select a state.',
                'lga_code.required' => 'Please select a LGA.',
                'name.required' => 'Please provide the facility name.',
                'name.unique' => 'Facility name already exist.',
                'code.required' => 'Please provide the facility code.',
                'contact_person_name.required' => 'Please provide the facility contact person\'s name.',
                'contact_person_phone.required' => 'Please provide the facility contact person\'s phone.',
                'contact_person_phone.phone' => 'Please provide a valid contact person\'s phone number.',
            ];

            $this->validate($request, $rules, $customMessages); 

            Facility::create([
                'state_code' => $request->state_code,
                'lga_code' => $request->lga_code,
                'name' => $request->name,
                'code' => $request->code,
                'contact_person_name' => $request->contact_person_name,
                'contact_person_phone' => $request->contact_person_phone,
                'created_by' => auth()->user()->id,
            ]);

            notify()->success("Successfully uploaded!");

            return redirect()->route("facilities.index");
        }else{
            abort(403);
        }
    }

    public function destroy(Facility $facility)
    {
        if(auth()->user()->hasRole('admin')){
            if($facility->clients->count() > 0){
                notify()->warning("Facility already have clients, cannot be deleted!");
            }else{
                $facility->delete();

                notify()->success("Successfully Deleted!");
            }

            return redirect()->route("facilities.index");
        }else{
            abort(403);
        }
    }

    public function edit(Facility $facility)
    {
        if(auth()->user()->hasRole('admin')){
            $states = State::all();

            return view('pages.facilities.edit', compact('facility', 'states'));
        }else{
            abort(403);
        }
    }

    public function update(Request $request, Facility $facility)
    {
        if(auth()->user()->hasRole('admin')){
            $rules = [
                'state_code' => "required",
                'lga_code' => "required",
                'name' => [
                    'required',
                    Rule::unique('facilities')->ignore($facility->id),
                ],
                'code' => "required",
                'contact_person_name' => "required",
                'contact_person_phone' => "required|phone:AUTO,NG",
            ];

            $customMessages = [
                'state_code.required' => 'Please select a state.',
                'lga_code.required' => 'Please select a LGA.',
                'name.required' => 'Please provide the facility name.',
                'name.unique' => 'Facility name already exist.',
                'code.required' => 'Please provide the facility code.',
                'contact_person_name.required' => 'Please provide the facility contact person\'s name.',
                'contact_person_phone.required' => 'Please provide the facility contact person\'s phone.',
                'contact_person_phone.phone' => 'Please provide a valid contact person\'s phone number.',
            ];

            $this->validate($request, $rules, $customMessages); 

            $facility->update([
                'state_code' => $request->state_code,
                'lga_code' => $request->lga_code,
                'name' => $request->name,
                'code' => $request->code,
                'contact_person_name' => $request->contact_person_name,
                'contact_person_phone' => $request->contact_person_phone,
            ]);

            notify()->success("Successfully updated!");

            return redirect()->route("facilities.index");
        }else{
            abort(403);
        }
    }
}
