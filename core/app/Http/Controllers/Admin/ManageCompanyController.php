<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class ManageCompanyController extends Controller
{

    public function index($userId = 0)
    {
        $segments  = request()->segments();
        $type      = end($segments);
        $pageTitle = keyToTitle($type) . ' Companies';
        $companies = Company::latest();

        if ($type != 'all' && !$userId) {
            $companies =  $companies->$type();
        }

        if ($userId) {
            $companies = $companies->where('user_id', $userId);
            $pageTitle = User::where('id', $userId)->first()->fullname . ' Companies';
        }

        $companies = $companies->with('user', 'category')->searchable(['name', 'email', 'url', 'user:username', 'category:name'])->paginate(getPaginate());
        return view('admin.company.index', compact('pageTitle', 'companies'));
    }


    public function details($id)
    {
        $company = Company::where('id', $id)->with('user', 'category')->firstOrFail();

        if ($company->status == Status::APPROVED) {
            $status = 'Approved';
        } elseif ($company->status == Status::PENDING) {
            $status = 'Pending';
        } elseif ($company->status == Status::REJECTED) {
            $status = 'Rejected';
        }

        $pageTitle = $status . ' ' . 'Company of ' . keyToTitle($company->user->fullname);
        return view('admin.company.details', compact('pageTitle', 'company'));
    }

    public function status(Request $request, $id)
    {

        $request->validate(['status' => 'required|integer']);

        $company = Company::where('id', $id)->with('user')->firstOrFail();


        if ($request->status == Status::APPROVED) {
            $notification = "Company has been approved successfully";
            $general = gs();
            notify($company->user, 'COMPANY_APPROVE', [
                'name'     => $company->name,
                'site'     => $general->site_name,
                'feedback' => $company->admin_feedback,
            ]);
        } else {
            $notification = "Company has been rejected successfully";
            $general = gs();
            notify($company->user, 'COMPANY_REJECT', [
                'name'     => $company->name,
                'site'     => $general->site_name,
                'feedback' => $company->admin_feedback,
            ]);
        }
        $company->status = $request->status;
        $company->admin_feedback = $request->details;
        $company->save();

        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }
}
