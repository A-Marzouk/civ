<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 2/27/2020
 * Time: 10:13 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Promocode;
use App\ResumeLink;
use App\Subscription;
use App\Tab;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('validateUsername');
    }

    public function user(Request $request)
    {
        $user_id = $request->get('user_id') ;
        if($user_id){
            $id = $user_id;
        }
        else{
            $id = Auth::user()->id;
        }

        $user = User::find($id);

        if($user){
            $this->setDefaultTabs($user);
            $this->setDefaultResumeLink($user);
            // get user with updated relations:
            $user = User::withAllRelations($user->username, $user->resume_link_id);

            return response()->json($user, 200);
        }
        return response()->json(['Error' => "Something went wrong."], 404);
    }

    protected function setDefaultTabs($user){
        $userTabsTitles = $user->tabs->pluck('title')->all();

        $notCreatedTabs = array_diff(Tab::$defaultTabs, $userTabsTitles);

        $defaultTabs = [] ;

        foreach ($notCreatedTabs as $index => $tabTitle){
            $defaultTabs[] = [
                'user_id' => $user->id,
                'resume_link_id' => $user->defaultResumeLink->id,
                'order' => $index + 1,
                'is_public' => true,
                'title' => $tabTitle,
                'label' => ucwords(str_replace('_',' ', $tabTitle))
            ];
        }

        Tab::insert($defaultTabs);

    }

    protected function setDefaultResumeLink($user){
        if(isset($user->defaultResumeLink->id)){
            return true;
        }
        // default resume link
        $resumeLink = ResumeLink::create([
            'user_id' => $user->id,
            'url' => '',
            'title' => 'civ.ie/',
            'theme_id' => 1,
            'order' => 1,
            'is_public' => true
        ]);

        $user->update([
            'resume_link_id' => $resumeLink->id
        ]);
    }

    public function updateUserTheme(Request $request){

        $user = User::findOrFail($request->user_id);
        $currentResume = $user->defaultResumeLink;
        $currentResume->update(
            ['theme_id' => $request->theme_id]
        );

        return ['status' => 'success'];
    }

    public function updateUserDefaultResume(Request $request){

        $user = User::findOrFail($request->user_id);

        $user->update(
            ['resume_link_id' => $request->resume_link_id]
        );

        return ['status' => 'success'];
    }

    public function editAccountData(Request $request){
        $request->validate([
            'name' => 'sometimes|max:191|min:3',
            'email'     => 'sometimes|max:191|email',
            'password' => 'nullable|min:6|max:191|confirmed',
            'username' => 'required|alpha_dash|unique:users,username,'. $request['id'].',id',
        ]);


        $user = User::find($request->id);


        if (isset($request->username)) {
            $user->update([
                'username' => $request->username
            ]);
        }

        if (isset($request->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        if (isset($request->name)) {
            $user->update([
                'name' => $request->name
            ]);
        }

        if (isset($request->email) && $request->email !== null ) {
            $user->update([
                'email' => $request->email
            ]);
        }

        return $user;
    }

    public function updateLastActivity(Request $request){
        if (Auth::user()->hasRole('admin')){
            Auth::user()->updateLastActivity();
        }else{
            $user = User::find($request->user_id);
            $user->updateLastActivity();
            return ['status' => 'success'];
        }
    }

    public function applyPromoCode(Request $request){
        $promoCodeName = $request->promocode;
        $promCode = Promocode::where('name',$promoCodeName)->first();
        if($promCode){
            if($this->createFreeSubscription($promCode)){
                return  [ 'success' => 'Promo code applied', 'data' => $promCode];
            };
        }
        return [ 'error' => 'Not a valid promo code!'];
    }

    protected function createFreeSubscription($promCode){
        // check code:
        $activeCode = $promCode->is_active && !$this->isExpired($promCode);
        if(!$activeCode){
            return false;
        }
        // free period:
        $free_months = $int = (int) filter_var( $promCode->free_period, FILTER_SANITIZE_NUMBER_INT);
        return Subscription::create([
            'user_id' => auth()->user()->id,
            'payment_method' => 'Promo code',
            'sub_status' => 'active',
            'sub_frequency' => 'monthly',
            'expires_at' => Carbon::now()->addMonths($free_months)->toDateString(),
            'promocode_id' => $promCode->id,
        ]);
    }

    protected function isExpired($promCode){
        $expiring_date = Carbon::parse($promCode->expires_at);
        $todays_date   = Carbon::now();

        return $todays_date->gt($expiring_date);
    }

}
