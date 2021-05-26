<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Support\Facades\Password;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new User();
        if (request('name')) {
            $data = $data->where('name', 'LIKE', '%'.request('title').'%');
        }
        if (request('email')) {
            $data = $data->where('email', 'LIKE', '%'.request('email').'%');
        }
        $data = $data->latest()->paginate(config('pagination.page_size'));

        return view('users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UsersRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['password'] = '';
        $user = User::create($data);

        $token = Password::getRepository()->create($user);
        $user->notify(new NewUserNotification($token));

        return redirect('/users')->with(['msg' => trans('global.added'), 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::findOrFail($id);

        return view('users.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);

        return view('users.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UsersRequest $request
     * @param  User         $user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, User $user)
    {
        $data = $request->only('name');
        $user->fill($data);
        $user->save();

        return redirect('/users')->with(['msg' => trans('global.updated'), 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
