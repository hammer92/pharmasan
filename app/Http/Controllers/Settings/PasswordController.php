<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;

class PasswordController extends AppBaseController
{
    /**
     * Update the user's password.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ]);

        $request->user()->update([
            'password' => bcrypt($request->password),
        ]);
        return $this->sendSuccess('contrasena actualizada');
    }
}
