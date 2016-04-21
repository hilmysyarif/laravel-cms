<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Validator;

class ProfileController extends FrontendController
{
    /**
     * Show personal data.
     *
     * @return \Illuminate\Http\Response
     */
    public function personalShow()
    {
        return view('profile.personal');
    }

    /**
     * Save personal data.
     *
     * @param Request $request
     * @return Response
     */
    public function personalSave(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email'.Auth::user()->id,
        ];

        $messages = [
            'name.required' => 'Введите Ваше имя',
            'email.required' => 'Укажите свой email',
            'email.unique' => 'Пользователь с таким email уже зарегистрирован',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails())
        {
            $this->throwValidationException($request, $validator);
        }

        $item = Auth::user();

        $item->update($request->all());

        return redirect(route('profile.personal'))->with('status', 'Ваши данные обновлены');
    }

    public function passwordShow()
    {
        return view('profile.password');
    }

    public function passwordSave(Request $request)
    {
        $rules = [
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ];

        $validator = Validator::make($request->all(), $rules);

        $validator->after(function($validator) use ($request)
        {
            if ( ! Hash::check($request->get('old_password'), Auth::user()->getAuthPassword()))
            {
                $validator->errors()->add('old_password', 'Старый пароль неверный');
            }
        });

        if ($validator->fails())
        {
            $this->throwValidationException($request, $validator);
        }

        Auth::user()->update(['password' => bcrypt($request->get('password'))]);

        return redirect(route('profile.password'))->with('status', 'Ваш пароль изменен');
    }

    public function avatarShow()
    {
        return view('profile.avatar');
    }

    public function avatarSave(Request $request)
    {
        // TODO: Сохранение аватара

        return redirect(route('profile.avatar'))->with('status', 'Ваш аватар изменен');
    }

    public function orders()
    {
        return view('profile.orders');
    }
}
