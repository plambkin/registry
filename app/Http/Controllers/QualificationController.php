<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class QualificationController extends Controller
{

    public function getRecord(Request $request)
    {
        $email = $request->input('email');
        $institute = $request->input('institute');

        Log::alert($email);
        Log::alert($institute);


        Log::alert("Email is " . $email);
        Log::alert("Institute is " . $institute);


        $user = DB::table('qualifications')
            ->where('email','=',$email)
            ->where('institute','=',$institute)
            ->first();
        Log::alert("entering the getRecord method");
        Log::alert($email);


        // Need to write code for when record not found and return

        if (!$user) {
            Log::alert('Entered $user as Null');
            return response()->json('Record not Found', 422);
        }

        return response()->json($this->buildRecord($user),200);

    }

    public function updateClicks()
    {
        //Get the current number of clicks and increment it

        DB::table('analytics')->increment('clicks');

        $clicks = DB::table('analytics')->value('clicks');

        Log::alert("Just incremented the clicks to $clicks");

        return response()->json(200);

    }

    private function buildRecord($user)
    {
        return [
            'fName'=>$user->fname,
            'lName'=>$user->lname,
            'course'=>$user->course1,
            'course1Text'=>$user->course1text,
            'wambastatus'=>$user->wambastatus,
            'completion'=>$user->completion
        ];
    }


    public function testRetrieveRecord()
    {
        Log::alert('In testRetrieveRecord()');

        return view('welcome');
    }


    public function testdb(Request $request)
    {
        $email = $request->input('email');
        $user = DB::table('records')->where('email', $email)->first();
        Log::alert("entering the testdb method");
        Log::alert(['email'=>$user->email,
            'fName'=>$user->fname,
            'lName'=>$user->lname]);

    }
}
