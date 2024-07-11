<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        $addressParts = explode(', ', $user->address);

        if (count($addressParts) === 4) {
        $specific_addressName = $addressParts[0];
        $wardName = $addressParts[1];
        $districtName = $addressParts[2];
        $provinceName = $addressParts[3];

        $province = Province::where('full_name', $provinceName)->first();
        $district = District::where('full_name', $districtName)->first();
        $ward = Ward::where('full_name', $wardName)->first();

        $provinceId = $province->code;
        $districtId = $district->code;
        $wardId = $ward->code;
        }else {
            $provinceId = null;
            $districtId = null;
            $wardId = null;
            $specific_addressName = null;
        }

        // dd($provinceId);

        return view('profile.edit', [
            'user' => $user,
            'provinceId' => $provinceId,
            'wardId' => $wardId,
            'districtId' => $districtId,
            'specific_addressName' => $specific_addressName
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $birthday = new \DateTime($request->input('birthday'));
        $today = new \DateTime();
        $age = $today->diff($birthday)->y;

        if ($age < 3) {
            return redirect()->back()->withErrors(['age' => 'You must be at least 3 years old to make a purchase.'])->withInput();
        }

        $provinceId = $request->input('province');
        $districtId = $request->input('district');
        $wardId = $request->input('ward');
        $specific_address = $request->input('specific_address');

        $province = Province::find($provinceId);
        $district = District::find($districtId);
        $ward = Ward::find($wardId);

        $address = $specific_address . ', '. $ward->full_name . ', ' . $district->full_name . ', ' . $province->full_name;

        $updateData = [
            'name_user' => $request->input('name_user'),
            'email' => $request->input('email'),
            'birthday' => $birthday->format('Y-m-d'),
            'address' => $address,
            'age' => $age,
        ];

        // dd($updateData);
        $request->user()->update($updateData);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
