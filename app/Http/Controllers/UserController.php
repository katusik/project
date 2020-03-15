<?php

namespace App\Http\Controllers;

//use http\Client\Curl\User;
use App\Gender;
use Illuminate\Http\Request;
use Auth;
use  Image;
use App\User;
use App\Account;
use App\Http\Requests\UserRequest;


use PhpParser\Node\Expr\New_;

use function Composer\Autoload\includeFile;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $account = [];
        $birthday = null;

        if (isset($user->account->id)) {
            $account = Account::find($user->account->id);
            $birthday = date('d-m-Y', strtotime($user->account->birthday));
        }

        return view('page.account.account', compact('user', 'account', 'birthday'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $gender = Gender::all();
        $birthday = '';

        if (isset($user->account->id)) {
            $account = Account::find($user->account->id);
            $birthday = strtotime($user->account->birthday);
            foreach ($gender as $gen) {
                if ($account->gender_id == $gen->id) {
                    $gen->checked = true;
                }
            }
        }

        return view('page.account.edit', compact('user', 'gender', 'birthday'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);

        $user->update($request->all());

        if (($user->account()->count())) {

            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $filename = $avatar->getClientOriginalName();
                Image::make($avatar->getRealPath())->resize(300, 300)->save(public_path('/uploads/avatars/'.$filename));

                $user->account()->update(['avatar' => $filename]);
            }

            if ($request->input('day') && $request->input('month') && $request->input('year')) {

                $birthday = $request->input('year').'-'.$request->input('month').'-'.$request->input('day');
                $request->merge([
                    'birthday' => $birthday,
                ]);

                $this->validate($request, [
                    'birthday' => 'date'
                ]);
            }

            $user->account()->update($request->only([
                'last_name',
                'gender_id',
                'birthday'
            ]));

        } else {
            $filename = null;

            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $filename = $avatar->getClientOriginalName();
                Image::make($avatar->getRealPath())->resize(300, 300)->save(public_path('/uploads/avatars/'.$filename));
            }
            $birthday = $request->input('year').'-'.$request->input('month').'-'.$request->input('day');
            $request->merge([
                'birthday' => $birthday,
            ]);

            $this->validate($request, [
                'birthday' => 'date'
            ]);

            $last_name = $request->input('last_name');
            $gender = $request->input('gender_id');

            $user->account()->create([
                'avatar'    => $filename,
                'last_name' => $last_name,
                'gender_id' => $gender,
                'birthday'  => $birthday
            ]);
        }

        return redirect()->route('profile.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

    }

    public function destroyAvatar($id)
    {
        $user = User::find($id);
        if (isset($user->account->avatar)) {

            $filename = $user->account->avatar;
            //            $avatar = Image::make(public_path('/uploads/avatars/'.$filename));
            //            $avatar->destroy();
            $filename = null;
            $user->account()->update(['avatar' => $filename]);
        }
        return redirect()->back();


    }


}
