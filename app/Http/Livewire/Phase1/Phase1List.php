<?php

namespace App\Http\Livewire\Phase1;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Phase1;
use App\Models\Phase2a;
use Livewire\Component;
use Livewire\WithPagination;

class Phase1List extends Component
{
    use WithPagination;

    public $editPhase1Index = null;
    public $phase1 = [];

    public $claim_form_maild_date = ''; 



    public function render()
    {
        $data = User::with('phase1')
            ->whereHas('phase1',function($q){
                return $q->where('status','pending');
            })
            ->where('isAdmin', 'no')
            ->orderBy('id', 'desc')
            ->paginate(25);

        // dd($data);

        return view('livewire.phase1.phase1-list', [
            'rows' => $data
        ]);
    }


    public function editPhase1($index)
    {
        $this->editPhase1Index = $index;
    }

    public function cancelPhase1($index)
    {
        $this->editPhase1Index = null;
    }

    protected $rules = [
        'phase1.*.case_number' => ['required']
    ];


    public function savePhase1($index)
    {
        

        if ($this->phase1) {

            foreach ($this->phase1 as $key => $row) {

                // dd($key);

                $phase1 = Phase1::firstOrCreate(['user_id' => $key]);

                
                foreach ($row as $k => $r) {
                    $phase1->{$k} = $r;
                }

                $phase1->updated_by = auth()->user()->id;

                $phase1->save();

                if($phase1->status == 'complete'){

                    if($phase1->case_number == null){
                        $phase1->status = 'pending';
                        $phase1->save();
                        session()->flash('message','<span class="bg-red-200 flex p-2 my-2 border rounded">Please Set Case Number</span>');
                    }else{
                        Phase2a::create([
                            'case_number' => $phase1->case_number,
                            'user_id' => $phase1->user_id,
                            'updated_by' => auth()->user()->id
                        ]);
                    }

                }



                // Phase1::updateOrCreate(
                //     [
                //         'user_id' =>  $key
                //     ],
                //     [
                //         'claim_form_maild_date' => Carbon::parse($row['claim_form_maild_date'])
                //     ]
                // );
            }
        }

        

        $this->editPhase1Index = null;
    }
}
