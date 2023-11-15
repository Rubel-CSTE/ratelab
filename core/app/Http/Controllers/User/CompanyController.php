<?php

namespace App\Http\Controllers\User;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;


class CompanyController extends Controller
{

    public function index()
    {
        $pageTitle = "My Companies";
        $companies = Company::where('user_id', auth()->id())->withAvg('reviews', 'rating')
            ->withCount('reviews')->latest()->paginate(getPaginate());
        return view($this->activeTemplate . 'user.company.index', compact('pageTitle', 'companies'));
    }

    public function create()
    {
        $categories = Category::where('status', Status::ENABLE)->orderBy('name')->get();
        $pageTitle  = 'Add New Company';
        return view($this->activeTemplate . 'user.company.form', compact('pageTitle', 'categories'));
    }

    public function edit($id)
    {
        $pageTitle  = 'Edit Company';
        $company    = Company::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $categories = Category::orderBy('name')->where('status', Status::ENABLE)->get();
        return view($this->activeTemplate . 'user.company.edit', compact('pageTitle', 'categories', 'company'));
    }


    public function store(Request $request, $id = 0)
    {

        $this->validation($request, $id, 'nullable');

        if ($id) {
            $company = Company::findOrFail($id);
            $notification = 'Company updated successfully';
        } else {
            $company = new Company();
            $notification = 'Company added successfully';
        }
        $this->saveCompany($company, $request);
        $notify[] = ['success', $notification];

        return to_route('user.company.edit', $company->id)->withNotify($notify);
    }



    protected function validation($request, $id = 0, $imgValidation = 'required')
    {
        if($id){
            $imgValidation = 'nullable';
        }
        $request->validate(
            [
                'name'          => 'required|string|max:40|unique:companies,name,' . $id,
                'category'      => 'required|integer|exists:categories,id|gt:0',
                'image'         => [$imgValidation, 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
                'url'           => 'required|url',
                'email'         => 'required|email|unique:companies,email,' . $id,
                'address'       => 'required|string',
                'description'   => 'required|string',
                'tags'          => 'required|array|min:1',
                'tags.*'        => 'string|max:40',
            ]
        );
    }
    protected function saveCompany($company, $request)
    {

        if ($request->hasFile('image')) {
            try {
                $oldImage = $company->image;
                $filename = fileUploader($request->image, getFilePath('company'), null, $oldImage);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload company image'];
                return back()->withNotify($notify);
            }
        } else {
            $filename = $company->image;
        }
        $company->image  = $filename;

        $company->category_id = $request->category;
        $company->user_id     = auth()->id();
        $company->name        = $request->name;
        $company->url         = $request->url;
        $company->email       = $request->email;
        $company->address     = $request->address;
        $company->description = $request->description;
        $company->tags        = $request->tags;
        $company->status      = Status::PENDING;
        $company->save();
    }


}
