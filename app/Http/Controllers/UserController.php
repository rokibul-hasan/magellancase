<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\User;
use App\Models\UsersInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
        $title = 'User List';

        return view('users.index', compact('users', 'title'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create', [
            'title' => 'Create User'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => '',
            'phone1' => '',
            'phone2' => '',
            'comment' => '',
        ]);

        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'isAdmin' => $request->isAdmin
            ]);

            UsersInfo::create([
                'user_id' => $user->id,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zipcode,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'comment' => $request->comment
            ]);

            DB::commit();
            Toastr::success('User Created Successfully', 'success');
            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);

            DB::rollBack();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', [
            'title' => 'Show Details',
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('users.edit', [
            'title' => 'Edite User Details',
            'user' => User::with('userinfo')->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'city' => 'required',
            'state' => 'required',
            'zipcode' => '',
            'phone1' => '',
            'phone2' => '',
            'comment' => '',
        ]);



        DB::beginTransaction();

        try {

            $user = User::find($user->id);
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->password != null) {
                $user->password = $request->password;
            }
            $user->isAdmin = $request->isAdmin;
            $user->save();


            UsersInfo::updateOrCreate(
                [
                    'user_id' => $user->id
                ],
                [
                    'address' => $request->address,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zip' => $request->zipcode,
                    'phone1' => $request->phone1,
                    'phone2' => $request->phone2,
                    'comment' => $request->comment
                ]
            );

            DB::commit();
            Toastr::success('User Update Successfully', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);

            DB::rollBack();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function userlist(Request $request)
    {
        $data = [];
       
        $query = User::select('id',DB::raw("CONCAT(name,' - ',email) as name"));

        if ($request->has('q')) {
            $search = $request->q;
            $data = $query->where('name', 'LIKE', "%$search%")
                    ->get();
        } else {
            $data = $query->take(20)->get();
        }



        return response()->json($data);
    }
}
