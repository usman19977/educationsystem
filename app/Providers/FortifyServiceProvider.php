<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::loginView(function () {
            return view('frontend.auth.login');
        });
        Fortify::authenticateUsing(function ($request) {
            $user = User::where('email', $request->email)->first();

            if (
                $user &&
                Hash::check($request->password, $user->password)
            ) {
                return $user;
            }
        });
        Fortify::registerView(function () {
            return view('frontend.auth.signup');
        });
        Fortify::requestPasswordResetLinkView(function () {
            return view('frontend.auth.forget-password');
        });

        Fortify::resetPasswordView(function ($request) {
            return view(
                'frontend.auth.reset-password',
                ['request' => $request]
            );
        });
        Fortify::verifyEmailView(function () {
            return view('frontend.auth.verify-email');
        });
        Fortify::confirmPasswordView(function () {
            return view('frontend.auth.password-confrim');
        });
        Fortify::twoFactorChallengeView(function () {
            return view('frontend.auth.two-factor-challenge');
        });
    }
}
