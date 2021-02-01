<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// sub domain routes:
Route::domain('{username}.civ.ie')->group(function () {
    Route::get('/', 'ResumeController@userResume');
});

Auth::routes(['verify' => true]);

// public routes
Route::get('/preview/{theme_id}/{slug?}', 'ResumeController@themePreview'); // resume preview
Route::get('/preview-by-code/{theme_code}', 'ResumeController@themePreviewByCode'); // resume preview by code
Route::post('/resume/send-message','ResumeController@sendResumeMessage')->name('send.resume.message');

Route::get('/api/docs', 'HomeController@docs'); // API Docs
Route::get('/api/docs/{any}', 'HomeController@docs'); // API Docs


Route::get('/hire-me/updated','ResumeController@hireModalTest');
Route::get('/hire-me/updated/no-payment','ResumeController@hireModalTestNoPayment');


// Test theme preview
Route::get('/preview-theme-pdf-by-code/{themeCode}/{username}/{version?}', 'ResumeController@downloadPDFResume');

Route::middleware('page-cache')->get('/', 'HomeController@welcome')->name('home');
Route::middleware('page-cache')->get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::middleware('page-cache')->get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/pricing', 'HomeController@pricing')->name('pricing');
Route::get('/faq','HomeController@faq')->name('faq');
Route::get('/privacy', 'HomeController@privacy')->name('privacy');
Route::get('/terms', 'HomeController@terms')->name('terms');



// social sites register & login:
Route::post('/simple-register', 'Auth\SocialSitesRegisterController@simpleRegister')->name('simple.register');
Route::get('/register/github', 'Auth\SocialSitesRegisterController@redirectToGitHubProvider')->name('client.github.register');
Route::get('/register/github/callback', 'Auth\SocialSitesRegisterController@handleGitHubProviderCallback')->name('client.github.callback');
Route::get('/register/facebook', 'Auth\SocialSitesRegisterController@redirectToFaceBookProvider')->name('client.facebook.register');
Route::get('/register/facebook/callback', 'Auth\SocialSitesRegisterController@handleFaceBookProviderCallback')->name('client.facebook.callback');
Route::get('/register/instagram', 'Auth\SocialSitesRegisterController@redirectToInstagramProvider')->name('client.instagram.register');
Route::get('/register/instagram/callback', 'Auth\SocialSitesRegisterController@handleInstagramProviderCallback')->name('client.instagram.callback');
Route::get('/register/google', 'Auth\SocialSitesRegisterController@redirectToGoogleProvider')->name('client.google.register');
Route::get('/register/google/callback', 'Auth\SocialSitesRegisterController@handleGoogleProviderCallback')->name('client.google.callback');
Route::get('/register/linkedin', 'Auth\SocialSitesRegisterController@redirectToLinkedinProvider')->name('client.linkedin.register');
Route::get('/register/linkedin/callback', 'Auth\SocialSitesRegisterController@handleLinkedinProviderCallback')->name('client.linkedin.callback');
Route::post('/validate-username', 'Auth\SocialSitesRegisterController@validateUsername')->name('username.validate');

// spotify:
Route::get('/redirect/spotify', 'Social\SpotifyController@redirectToSpotifyProvider')->name('client.github.register');
Route::get('/spotify/callback', 'Social\SpotifyController@handleSpotifyProviderCallback')->name('client.github.callback');


// resume builder main routes.
Route::get('/resume-builder/{any?}', 'ResumeBuilderController@index')->name('resume.builder.main');
Route::get('/resume-builder/edit/{any?}', 'ResumeBuilderController@index')->name('resume.builder.edit');
Route::get('/resume-builder/edit/projects/new', 'ResumeBuilderController@index')->name('resume.builder.edit');
Route::post('/resume-builder/import/pdf', 'ImportsController@extractTextFromPDF')->name('pdf.import.submit');
Route::post('/resume-builder/import/docx', 'ImportsController@extractTextFromDocx')->name('docx.import');
Route::get('/resume-builder/import/behance/{behanceUsername}', 'ImportsController@getDataFromBehance')->name('behance.import');


// subscription routes
Route::get('/subscribe', 'Billing\StripeForAgentsController@subscribePage')->name('subscribe.page');
Route::post('/subscribe', 'Billing\StripeForAgentsController@subscribeStripe')->name('subscribe.stripe');
Route::get('/subscription', 'Billing\StripeForAgentsController@index')->name('subscription');
Route::get('/subscription/cancel', 'Billing\StripeForAgentsController@cancel')->name('subscription.cancel');
Route::get('/subscription/success', 'Billing\StripeForAgentsController@subscriptionSuccess')->name('subscription.success');

// Stripe for clients:
Route::post('/custom-stripe-payment', 'Billing\StripeForClientsController@customStripePayments')->name('custom.stripe.payments');
Route::get('/client-subscription', 'Billing\StripeForClientsController@clientSubscription')->name('subscription');
Route::get('/hire-freelancer/success', 'Billing\StripeForClientsController@firstPaymentSuccess')->name('payment.success');
Route::get('/hire-freelancer/cancel', 'Billing\StripeForClientsController@firstPaymentFail')->name('payment.fail');

// Stripe direct user payments:
    // add connected accounts:
Route::post('/stripe/onboard-user', 'Billing\StripeAddConnectedAccounts@CreateOnBoardUser')->name('stripe.onboard.user');
Route::get('/stripe/onboard-user/refresh', 'Billing\StripeAddConnectedAccounts@refreshOnBoardUser')->name('stripe.onboard.user.refresh');
Route::get('/stripe/onboard-user/return', 'Billing\StripeAddConnectedAccounts@returnAfterConnect')->name('stripe.onboard.user.return');
Route::get('/add-account/success', 'Billing\StripeAddConnectedAccounts@addAccountSuccess')->name('account.added.success');
Route::get('/add-account/fail', 'Billing\StripeAddConnectedAccounts@addAccountFail')->name('account.added.fail');


    // direct payouts:
Route::post('/direct-stripe-payment', 'Billing\StripeDirectPayouts@directStripePayments')->name('stripe.checkout');
Route::get('/stripe-checkout', 'Billing\StripeDirectPayouts@stripeCheckout')->name('stripe.checkout');
    // paypal:
Route::post('/direct-paypal-payment', 'Billing\PayPalDirectPayouts@directPayPalPayments')->name('paypal.checkout');


// PayPal for clients:
Route::post('/custom-paypal-payment', 'Billing\PayPalForClientsController@customPayPalPayments')->name('custom.stripe.payments');
Route::get('/paypal/hire-freelancer/success', 'Billing\PayPalForClientsController@success')->name('paypal.clients.success');
Route::get('/paypal/hire-freelancer-regular/success', 'Billing\PayPalForClientsController@successRegular')->name('paypal..regular.clients.success');
Route::get('/paypal/hire-freelancer/cancel','Billing\PayPalForClientsController@cancel')->name('paypal.clients.cancel');
Route::get('/paypal/create-webhooks','Billing\PayPalForClientsController@createWebhooks')->name('paypal.create.webhooks');

// webhooks:
Route::post('/stripe/webhooks', 'Billing\StripeWebhooksController@handle')->name('stripe.webhooks');
Route::post('/paypal/webhooks', 'Billing\PayPalWebhooksController@handle')->name('paypal.webhooks');



// paypal
Route::get('/subscribe/create-paypal-plan/{plan_period}', 'Billing\PayPalForAgentsController@create_plan');
Route::get('/subscribe/paypal/monthly', 'Billing\PayPalForAgentsController@subscribePayPalMonthly')->name('paypal.redirect.monthly');
Route::get('/subscribe/paypal/yearly', 'Billing\PayPalForAgentsController@subscribePayPalYearly')->name('paypal.redirect.yearly');
Route::get('/subscribe/paypal/return', 'Billing\PayPalForAgentsController@paypalReturn')->name('paypal.return');


// client routes:
Route::group(['prefix' => 'client'], function () {
    Route::get('/', 'ClientsController@index')->name('client.dashboard');
});



// Admin routes
Route::group(['prefix' => 'workforce-admin'], function () {
    Route::get('/', 'AdminsController@index')->name('admin.dashboard');
    Route::get('/{any}', 'AdminsController@index')->name('admin.dashboard');
    Route::get('/{username}/resume-builder/', 'AdminsController@userFullEdit')->name('admin.user_edit');
    Route::get('/{username}/resume-builder/{any?}', 'AdminsController@userFullEdit')->name('admin.resume.builder.main');
    Route::get('/{username}/resume-builder/edit/{any?}', 'AdminsController@userFullEdit')->name('admin.resume.builder.edit');
    Route::get('/{username}/resume-builder/edit/projects/new', 'AdminsController@userFullEdit')->name('admin.resume.builder.edit');
    Route::get('/developer/api', 'APIController@APIClients')->name('create.api.client');
    Route::post('/send-mail', 'AdminsController@sendCustomEmail')->name('admin.custom.email');
    Route::get('/mail/preview', 'AdminsController@mailPreview')->name('admin.preview.email');
});

// public cv url
Route::get('/{username}/reference', 'ResumeController@externalReferencePage'); // external reference
Route::get('/{username}/{version?}', 'ResumeController@userResume'); // resume with real user data

// optimize all images

Route::get('/images/optimize/all', 'API\ProjectsController@optimizeAllProjectImages'); // resume with real user data
