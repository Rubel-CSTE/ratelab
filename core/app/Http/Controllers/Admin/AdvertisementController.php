<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;

class AdvertisementController extends Controller
{
    public function index()
    {
        $pageTitle      = 'All Advertisement';
        $advertisements = Advertisement::latest()->searchable(['type', 'size'])->paginate(getPaginate());
        return view('admin.advertisement.index', compact('pageTitle', 'advertisements'));
    }

    public function store(Request $request, $id = 0)
    {

        $this->validation($request);

        //==========validation for request image ===============
        if ($request->type == 'image' && $request->hasFile('image')) {
            $this->imageValidation($request, 'nullable');
        }

        if ($id) {
            $advertisement = Advertisement::findOrFail($id);
            $advertisement->status = $request->status ? Status::ENABLE : Status::DISABLE;
            $value = $advertisement->value; //imageOrScript
            $notification = 'Advertisement updated successfully';
        } else {
            $advertisement = new Advertisement();
            $advertisement->type = $request->type;
            $advertisement->size = $request->size;
            $notification = 'Advertisement added successfully';
        }

        //========upload image if request has ================
        if ($request->hasFile('image')) {
            try {
                $oldImage = $advertisement->type == 'image' ? $advertisement->value : null;
                $value = fileUploader($request->image, getFilePath('advertisement'), null, $oldImage);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload advertisement image'];
                return back()->withNotify($notify);
            }
        }

        if ($request->type == "script") {
            $value = $request->script;
        }

        $advertisement->value = $value;
        $advertisement->redirect_url = $request->redirect_url;
        $advertisement->save();
        $notify[] = ['success', $notification];

        return back()->withNotify($notify);
    }

    protected  function validation(Request $request)
    {
        $request->validate([
            'type'         => 'required|in:image,script',
            'size'         => 'required|in:728x90,300x600,300x250',
            'redirect_url' => 'required_if:type,image',
            'script'       => 'required_if:type,script',
        ]);
    }

    public function imageValidation($request, $isRequired = 'required')
    {
        $size = explode('x', $request->size);
        $request->validate([
            'image'  => [$isRequired, new FileTypeValidate(['jpeg', 'jpg', 'png', 'gif']), 'dimensions:width=' . $size[0] . ',height=' . $size[1]],
        ]);
    }
}
