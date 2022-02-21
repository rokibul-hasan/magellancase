<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Phase1;
use Livewire\Component;
use App\Models\UsersInfo;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class UserList extends Component
{
    use WithPagination;

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
    public $userid;

    public $addFormHide = true;


    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->userid,
            'password' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => '',
            'phone1' => '',
            'phone2' => '',
            'comment' => '',
        ];
    }


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
                'user_id' => $user->id,
                'updated_by' => auth()->user()->id
            ]);

            DB::commit();
            $this->resetForm();
            session()->flash('message', '<span class="bg-green-100 border border-green-400 p-2 my-2 block">User Created Successfully</span>');
            $this->addFormHide = true;
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            session()->flash('message', '<span class="text-red p-1">something is wrong!!</span>');
        }
    }

    public function UserEdit($id)
    {
        $this->addFormHide = false;

        // $this->validate();

        $user = User::with('userinfo')->find($id);

        $this->name = $user->name;
        $this->email = $user->email;
        $this->address = $user->userinfo->address;
        $this->city = $user->userinfo->city;
        $this->state = $user->userinfo->state;
        $this->zipcode = $user->userinfo->zip;
        $this->phone1 = $user->userinfo->phone1;
        $this->phone2 = $user->userinfo->phone2;
        $this->isAdmin = $user->isAdmin;
        $this->comment = $user->userinfo->comment;
        $this->userid = $user->id;
    }

    public function updateForm()
    {

        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->userid,
            'city' => 'required',
            'state' => 'required',
            'zipcode' => '',
            'phone1' => '',
            'phone2' => '',
            'comment' => '',
        ]);

        DB::beginTransaction();
        try {


            $user = User::find($this->userid);

            $user->name = $this->name;
            $user->email = $this->email;
            $user->isAdmin = $this->isAdmin;

            if ($this->password) {
                $user->password = Hash::make($this->password);
            }

            $user->save();




            UsersInfo::where('user_id', $user->id)->update([
                'user_id' => $user->id,
                'address' => $this->address,
                'city' => $this->city,
                'state' => $this->state,
                'zip' => $this->zipcode,
                'phone1' => $this->phone1,
                'phone2' => $this->phone2,
                'comment' => $this->comment
            ]);


            DB::commit();
            // $this->resetForm();
            session()->flash('message', '<span id="flashMessage" class="bg-green-100 border border-green-400 p-2 my-2 block">User Updated Successfully</span>');
            $this->addFormHide = true;

        } catch (\Throwable $th) {

            dd($th);
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



    public function closeAddUser()
    {
        
        $this->addFormHide = true;
    }
    public function openAddUser()
    {
        $this->resetForm();
        $this->addFormHide = false;
    }


    public function render()
    {

        $users = User::paginate(5);
        $title = 'User List';

        return view('livewire.user-list', compact('users', 'title'));
    }
}
