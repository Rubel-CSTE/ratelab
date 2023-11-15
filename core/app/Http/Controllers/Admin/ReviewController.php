<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Company;

class ReviewController extends Controller
{
    public function index()
    {
        $pageTitle = 'All Reviews';
        $reviews   = Review::orderBy('id','DESC')->with('user', 'company')->searchable(['review', 'rating', 'user:username', 'company:name'])->paginate(getPaginate());
        return view('admin.review.index', compact('pageTitle', 'reviews'));
    }

    public function delete($id, $companyId)
    {
        $review  = Review::where('id', $id)->where('company_id', $companyId)->firstOrFail();
        $company = Company::find($companyId);
        $review->delete();

        $reviews = Review::where('company_id', $company->id)->get(['rating']);
        $company->avg_rating = 0;
        if ($reviews->count()) {
            $company->avg_rating = $reviews->sum('rating')  / $reviews->count();
        }
        $company->save();
        $notify[] = ['success', 'Review deleted successfully'];
        return back()->withNotify($notify);
    }
}
