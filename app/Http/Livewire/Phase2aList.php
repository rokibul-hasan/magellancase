<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Phase2a;
use Livewire\Component;
use Livewire\WithPagination;

class Phase2aList extends Component
{
    use WithPagination;

    public $editPhaseIndex = null;
    public $phase = [];


    public function editPhase($index)
    {
        $this->editPhaseIndex = $index;
    }

    public function cancelPhase($index)
    {
        $this->editPhaseIndex = null;
    }


    public function savePhase($index)
    {
        

        if ($this->phase) {

            foreach ($this->phase as $key => $row) {

                                
                $phase = Phase2a::firstOrCreate(['user_id' => $key]);                

                foreach ($row as $k => $r) {
                    $phase->{$k} = $r;
                }

                $phase->updated_by = auth()->user()->id;

                $phase->save();

                if($phase->status == 'complete'){

                    if($phase->case_number == null){
                        $phase->status = 'pending';
                        $phase->save();
                        session()->flash('message','<span class="bg-red-200 flex p-2 my-2 border rounded">Please Set Case Number</span>');
                    }else{
                        Phase2a::create([
                            'case_number' => $phase->case_number,
                            'user_id' => $phase->user_id,
                            'updated_by' => auth()->user()->id
                        ]);
                    }
                }


            }
        }

        

        $this->editPhaseIndex = null;
    }
    
    public function render()
    {

       

        $data = User::with('phase2a')
            ->whereHas('phase2a',function($q){
                return $q->where('status','pending');
            })
            ->where('isAdmin', 'no')
            ->orderBy('id', 'desc')
            ->paginate(25);

            
        
        return view('livewire.phase2a-list',[
            'rows' => $data
        ]);
    }
}

