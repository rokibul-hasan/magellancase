<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Phase1;
use Livewire\Component;
use App\Models\UsersInfo;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class UserCreate extends Component
{

    public $name;
    public $email;
    public $password;
    public $address;
    public $city;
    public $state;
    public $zipcode;
    public $phone1;
    public $phone2;
    public $isAdmin;
    public $comment;


    protected $rules  = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        'city' => 'required',
        'state' => 'required',
        'zipcode' => '',
        'phone1' => '',
        'phone2' => '',
        'comment' => '',
    ];

    public function submitForm()
    {    

        $this->validate();

            DB::beginTransaction();
        try {
            
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'isAdmin' => $this->isAdmin
            ]);
    
            
            UsersInfo::create([
                'user_id' => $user->id,
                'address' => $this->address,
                'city' => $this->city,
                'state' => $this->state,
                'zip' => $this->zipcode,
                'phone1' => $this->phone1,
                'phone2' => $this->phone2,
                'comment' => $this->comment
            ]);

            Phase1::create([
                'user_id' => $user->id
            ]);

            DB::commit();
            $this->resetForm();
            session()->flash('message', '<span class="bg-green-100 border border-green-400 p-2 my-2 block">User Created Successfully</span>');

            Toastr::success('Successfully Created','success');

        } catch (\Throwable $th) {
            

            DB::rollBack();
            session()->flash('message', 'something is wrong!!');
        }
        


    }

    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->address = '';
        $this->city = '';
        $this->state = '';
        $this->zipcode = '';
        $this->phone1 = '';
        $this->phone2 = '';
        $this->isAdmin = '';
        $this->comment = '';
    }

    public function render()
    {
        return view('livewire.user-create');
    }
}
