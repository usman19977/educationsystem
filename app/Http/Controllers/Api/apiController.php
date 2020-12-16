<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AdmitCard;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Downloads;
use App\Models\Admitcard as ModelsAdmitcard;
use App\Models\Criteria;
use App\Models\Download;
use App\Models\Page;
use App\Models\PressRelease;
use App\Models\Request as ModelsRequest;
use App\Models\School;
use App\Models\Shift;
use App\Models\Slider;
use App\Models\Subscriber;
use App\Models\Tender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use stdClass;

class apiController extends Controller
{
    //Authentication Methods
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        if ($validator->fails()) {


            return response()->json([
                'message' => 'Login Failed',
                'validation_messages' => $validator->errors(),
            ], 400);
        } else {


            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'message' => 'Username password incorrect'
                ], 401);
            }
            if ($user->email_verified_at == null) {
                return response()->json([
                    'message' => 'Verify your email first'
                ], 401);
            }
            if ($user->hasRole('Student')) {
                $token =  $user->createToken($request->device_name)->plainTextToken;
                return response()->json([
                    'message' => 'Login successfully',
                    '_token' => $token
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Only students are allowed'
                ], 401);
            }
        }
    }


    public function logout()
    {
        $user = request()->user(); //or Auth::user()
        // Revoke current user token
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        return response()->json([
            'message' => 'Logout successfully',

        ], 200);
    }

    public function  forget(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {


            return response()->json([
                'message' => 'Reset password failed',
                'validation_messages' => $validator->errors(),
            ], 400);
        } else {
            if (User::where('email', $request->email)->exists()) {
                Password::sendResetLink(['email' => $request->email]);
                return response()->json([
                    'message' => 'Reset Link Sent successfully',

                ], 200);
            } else {
                return response()->json([
                    'message' => 'User with this email not found',

                ], 404);
            }
        }
    }

    public function getbanners()
    {
        $sliders = Slider::select(['image'])->get();
        $sliders_withurl = [];
        foreach ($sliders as $key => $slider) {
            $sliderobj = new stdClass;
            $sliderobj->image  = 'http://sleepy-coast-04760.herokuapp.com/' . $slider->image;
            $sliders_withurl[] = $sliderobj;
        }
        return response()->json([
            'sliders' => $sliders_withurl,

        ], 200);
    }
    public function getStudentDetails()
    {

        $user = User::where(['id' => auth()->user()->id])->with(['students' => function ($query) {
            $query->with(['school', 'requests', 'admitcards', 'school']);
        }])->get();
        return response()->json($user, 200);
    }
    public function getCarierRequests()
    {
        $carier_requests = ModelsRequest::with(['school', 'criteria' => function ($query) {
            $query->with(['field' => function ($query) {
                $query->with(['carier']);
            }]);
        }])->whereHas('student', function ($query) {
            return $query->where('user_id', '=', auth()->user()->id);
        })->orderBy('created_at', 'desc')->get();
        return response()->json($carier_requests, 200);
    }

    public function getshifts()
    {
        $shifts = Shift::select(['name', 'id'])->get();
        $shiftfnfarray = [];
        foreach ($shifts as $key => $shift) {
            $shiftobj = new stdClass;
            $shiftobj->display = $shift['name'];
            $shiftobj->value = strval($shift['id']);
            $shiftfnfarray[] = $shiftobj;
        }

        return response()->json($shiftfnfarray, 200);
    }

    public function getcriterias()
    {
        $criterias = Criteria::select(['name', 'id'])->get();
        $criteriafnfarray = [];
        foreach ($criterias as $key => $criteria) {
            $criteriaobj = new stdClass;
            $criteriaobj->display = $criteria['name'];
            $criteriaobj->value = strval($criteria['id']);
            $criteriafnfarray[] = $criteriaobj;
        }

        return response()->json($criteriafnfarray, 200);
    }

    public function getcriteriasubjects(Request $request)
    {
        if ($request->criteria_id) {
            $criteria = Criteria::find($request->criteria_id);
            if ($criteria) {
                return response()->json($criteria->subjects, 200);
            } else {
                return response()->json(
                    ['message' => 'NOT FOUND',],
                    404
                );
            }
        } else {
            return response()->json(
                ['message' => 'NOT FOUND',],
                404
            );
        }
    }

    public function addCarierRequest(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'criteria' => 'required',
            'shift' => 'required',

        ]);

        if ($validator->fails()) {


            return response()->json([
                'message' => 'Unprocessable Entry',
                'validation_messages' => $validator->errors(),
            ], 400);
        } else {
            $shift = Shift::find($request->shift);
            $criteria = Criteria::find($request->criteria);


            if ($shift) {
                if ($criteria) {
                    $user = Auth::user();
                    $student = $user->students;
                    $school = $student->school;
                    $crequest =  ModelsRequest::create([

                        'school_id' => $school->id,
                        'shift_id' => $shift->id,
                        'criteria_id' => $criteria->id,
                        'student_id' => $student->id,

                    ]);
                    $subjects = $criteria->subjects;
                    $crequest->subjects()->attach($subjects);
                    return response()->json([
                        'message' => 'Carier Request Creared Successfully',

                    ], 200);
                } else {
                    return response()->json(
                        ['message' => 'NOT FOUND',],
                        404
                    );
                }
            } else {
                return response()->json(
                    ['message' => 'NOT FOUND',],
                    404
                );
            }
        }
    }

    public function getAdmitCards()
    {
        $admit_cards = ModelsAdmitcard::whereHas('student', function ($query) {
            return $query->where('user_id', '=', auth()->user()->id);
        })->orderBy('created_at', 'desc')->get();
        return response()->json($admit_cards, 200);
    }

    public function getAllPressReleases()
    {
        $press_releases = PressRelease::all();
        return response()->json($press_releases, 200);
    }

    public function getAllDownloads()
    {
        $downloads = Download::all();
        return response()->json($downloads, 200);
    }

    public function getAllTenders()
    {
        $tenders = Tender::all();
        return response()->json($tenders, 200);
    }
    public function getAllSchools()
    {
        $schools = School::all();
        return response()->json($schools, 200);
    }

    public function getCorrectionPage(Request $request)
    {

        // $validator = Validator::make($request->all(), [
        //     'slug' => 'required'

        // ]);

        // if ($validator->fails()) {


        //     return response()->json([
        //         'message' => 'Validations',
        //         'validation_messages' => $validator->errors(),
        //     ], 400);
        // } else {

        $content = Page::where(['slug' => $request->slug])->select(['content'])->get();
        return response()->json($content, 200);
        // }
    }

    public function addSubscriber(Request $request)
    {


        $validator = Validator::make($request->all(), [

            'email' => 'required|email|unique:subscribers',

        ]);


        if ($validator->fails()) {
            return response()->json([
                'message' => 'Unprocessable Entry',
                'validation_messages' => $validator->errors(),
            ], 400);
        } else {
            Subscriber::create([

                'email' => $request->email,


            ]);
            return response()->json([
                'message' => 'You are successfully subscribed',

            ], 200);
        }
    }
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:6',

        ]);

        if ($validator->fails()) {


            return response()->json([
                'message' => 'Validations',
                'validation_messages' => $validator->errors(),
            ], 400);
        } else {
            try {
                if ((Hash::check(request('old_password'), Auth::user()->password)) == false) {
                    return response()->json(
                        ['message' => 'Check your old password.'],
                        400
                    );
                } else if ((Hash::check(request('new_password'), Auth::user()->password)) == true) {

                    return response()->json(
                        ["message" => "Please enter a password which is not similar then current password."],
                        400
                    );
                } else {
                    User::where('id', auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
                    return response()->json([
                        'message' => 'You are good to go ',

                    ], 200);
                }
            } catch (\Exception $ex) {
                if (isset($ex->errorInfo[2])) {
                    $msg = $ex->errorInfo[2];
                } else {
                    $msg = $ex->getMessage();
                }
            }
        }
    }
}
