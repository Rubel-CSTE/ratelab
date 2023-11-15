<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Review;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        $pageTitle   = 'Dashboard';
        $reviews     = auth()->user()->reviews()->with('company')->latest()->paginate(getPaginate());
        
         if(!$reviews->count()) {
            return to_route('user.profile.setting');
        }
        return view($this->activeTemplate . 'user.dashboard', compact('pageTitle', 'reviews'));
    }


    public function updateReview(Request $request)
    {

        $request->validate(
            [
                'rating' => 'nullable|integer|min:1|max:5',
                'review' => 'required|string',
            ]
        );

        $review = Review::where('id', $request->id)->where('user_id', auth()->id())->firstOrFail();

        $review->rating = $request->rating ?? $review->rating;
        $review->review = $request->review;
        $review->save();

        $company = Company::where('id', $review->company_id)->first();
        $reviews = Review::where('company_id', $company->id)->get(['rating']);

        $company->avg_rating = $reviews->sum('rating') / $reviews->count();
        $company->save();

        $notify[] = ['success', 'Updated review successfully'];
        return back()->withNotify($notify);
    }


    public function deleteReview(Request $request)
    {
        $review     = Review::where('id', $request->id)->where('user_id', auth()->id())->firstOrFail();
        $company    = Company::find($review->company_id);
        $review->delete();
        $reviews = Review::where('company_id', $company->id)->get(['rating']);
        $company->avg_rating = 0;
        if ($reviews->count()) {
            $company->avg_rating = $reviews->sum('rating')  / $reviews->count();
        }
        $company->save();
        $notify[] = ['success', 'Deleted review successfully'];
        return back()->withNotify($notify);
    }



   

    public function attachmentDownload($fileHash)
    {
        $filePath = decrypt($fileHash);
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $general = gs();
        $title = slug($general->site_name).'- attachments.'.$extension;
        $mimetype = mime_content_type($filePath);
        header('Content-Disposition: attachment; filename="' . $title);
        header("Content-Type: " . $mimetype);
        return readfile($filePath);
    }

    public function userData()
    {
        $user = auth()->user();
        if ($user->profile_complete == 1) {
            return to_route('user.home');
        }
        $pageTitle = 'User Data';
        return view($this->activeTemplate.'user.user_data', compact('pageTitle','user'));
    }

    public function userDataSubmit(Request $request)
    {
        $user = auth()->user();
        if ($user->profile_complete == 1) {
            return to_route('user.home');
        }
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
        ]);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->address = [
            'country'=>@$user->address->country,
            'address'=>$request->address,
            'state'=>$request->state,
            'zip'=>$request->zip,
            'city'=>$request->city,
        ];
        $user->profile_complete = 1;
        $user->save();

        $notify[] = ['success','Registration process completed successfully'];
        return to_route('user.home')->withNotify($notify);

    }

}
