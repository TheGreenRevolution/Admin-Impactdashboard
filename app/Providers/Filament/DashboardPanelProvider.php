<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\CO2Impact;
use App\Filament\Widgets\InsightValueCreated;
use App\Filament\Widgets\StatsOverview;
use Filament\Forms\Components\FileUpload;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

//FILAMENT BREEZY
use Jeffgreco13\FilamentBreezy\BreezyCore;

class DashboardPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('dashboard')
            ->path('dashboard')
            ->login()
            //FILAMENT BREEZY
            ->plugin(
                BreezyCore::make()
                    ->myProfile(
                        shouldRegisterUserMenu: true, // Sets the 'account' link in the panel User Menu (default = true)
                        shouldRegisterNavigation: false, // Adds a main navigation item for the My Profile page (default = false)
                        navigationGroup: 'Settings', // Sets the navigation group for the My Profile page (default = null)
                        hasAvatars: true, // Enables the avatar upload form component (default = false)
                        slug: 'my-profile' // Sets the slug for the profile page (default = 'my-profile')
                    )
                    //FOR THE FILEUPLOAD TO WORK FOR IMAGE PREVIEW, MAKE SURE TO UPDATE .ENV FILE VARIABLE: APP_URL=http://127.0.0.1:8000
                    ->avatarUploadComponent(fn () => FileUpload::make('avatar_url')->disk('public')->directory('profile-avatars'))

                    //ENABLE THE TWOFACTORAUTHENTICATION
                    ->enableTwoFactorAuthentication(
                        force: true, // force the user to enable 2FA before they can use the application (default = false=>disables the feature)
                    )
                    //ENABLE SANCTUM TOKENS
                    ->enableSanctumTokens(
                        permissions: ['my', 'custom', 'permissions'], // optional, customize the permissions (default = ["create", "view", "update", "delete"])
                    )
            )
            ->colors([
                'primary' => Color::Amber,
            ])
            ->brandName('The Green Revolution')
            ->brandLogo(asset('img/logo.jpg'))
            ->brandLogoHeight('4rem')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                StatsOverview::class,
                CO2Impact::class,
                InsightValueCreated::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
