<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Page;
use App\Models\Review;
use App\Models\Company;
use App\Models\Category;
use App\Models\Frontend;
use App\Models\Language;
use App\Constants\Status;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\SupportTicket;
use App\Models\SupportMessage;
use App\Models\AdminNotification;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    public function index()
    {
        $pageTitle = 'Home';
        $sections = Page::where('tempname', $this->activeTemplate)->where('slug', '/')->first();
        return view($this->activeTemplate . 'home', compact('pageTitle', 'sections'));
    }

    public function pages($slug)
    {
        $page = Page::where('tempname', $this->activeTemplate)->where('slug', $slug)->firstOrFail();
        $pageTitle = $page->name;
        $sections = $page->secs;
        return view($this->activeTemplate . 'pages', compact('pageTitle', 'sections'));
    }


    public function contact()
    {
        $pageTitle = "Contact Us";
        $sections = Page::where('tempname', $this->activeTemplate)->where('slug', 'contact')->first();
        return view($this->activeTemplate . 'contact', compact('pageTitle', 'sections'));
    }


    public function contactSubmit(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required|string|max:255',
            'message' => 'required',
        ]);

        if (!verifyCaptcha()) {
            $notify[] = ['error', 'Invalid captcha provided'];
            return back()->withNotify($notify);
        }

        $request->session()->regenerateToken();

        $random = getNumber();

        $ticket = new SupportTicket();
        $ticket->user_id = auth()->id() ?? 0;
        $ticket->name = $request->name;
        $ticket->email = $request->email;
        $ticket->priority = 2;


        $ticket->ticket = $random;
        $ticket->subject = $request->subject;
        $ticket->last_reply = Carbon::now();
        $ticket->status = Status::TICKET_OPEN;
        $ticket->save();

        $adminNotification = new AdminNotification();
        $adminNotification->user_id = auth()->user() ? auth()->user()->id : 0;
        $adminNotification->title = 'A new support ticket has opened ';
        $adminNotification->click_url = urlPath('admin.ticket.view', $ticket->id);
        $adminNotification->save();

        $message = new SupportMessage();
        $message->support_ticket_id = $ticket->id;
        $message->message = $request->message;
        $message->save();

        $notify[] = ['success', 'Ticket created successfully!'];

        return to_route('ticket.view', [$ticket->ticket])->withNotify($notify);
    }

    public function policyPages($slug, $id)
    {
        $policy    = Frontend::where('id', $id)->where('data_keys', 'policy_pages.element')->firstOrFail();
        $pageTitle = $policy->data_values->title;
        return view($this->activeTemplate . 'policy', compact('policy', 'pageTitle'));
    }

    public function changeLanguage($lang = null)
    {
        $language = Language::where('code', $lang)->first();
        if (!$language) $lang = 'en';
        session()->put('lang', $lang);
        return back();
    }


    public function blogs()
    {
        $pageTitle = 'Blogs';
        $blogs     = Frontend::where('data_keys', 'blog.element')->latest()->paginate(getPaginate());
        $latest    = Frontend::latest()->where('data_keys', 'blog.element')->limit(10)->get();
        $sections  = Page::where('tempname', $this->activeTemplate)->where('slug', 'blog')->first();
        return view($this->activeTemplate . 'blog', compact('pageTitle', 'blogs', 'latest', 'sections'));
    }

    public function blogDetails($slug, $id)
    {
        $blog        = Frontend::where('id', $id)->where('data_keys', 'blog.element')->firstOrFail();
        $pageTitle   = "Blog Details";
        $latestPosts = Frontend::latest()->where('data_keys', 'blog.element')->where('id', '!=', $id)->limit(10)->get();

        $seoContents['keywords']           = $blog->meta_keywords ?? [];
        $seoContents['social_title']       = $blog->data_values->title;
        $seoContents['description']        = strLimit(strip_tags($blog->data_values->description), 150);
        $seoContents['social_description'] = strLimit(strip_tags($blog->data_values->description_nic), 150);
        $seoContents['image']              = getImage('assets/images/frontend/blog/' . @$blog->data_values->image, '830x460');
        $seoContents['image_size']         = '830x460';
        return view($this->activeTemplate . 'blog_details', compact('blog', 'pageTitle', 'latestPosts', 'seoContents'));
    }


    public function cookieAccept()
    {
        $general = gs();
        Cookie::queue('gdpr_cookie', $general->site_name, 43200);
    }

    public function cookiePolicy()
    {
        $pageTitle = 'Cookie Policy';
        $cookie = Frontend::where('data_keys', 'cookie.data')->first();
        return view($this->activeTemplate . 'cookie', compact('pageTitle', 'cookie'));
    }

    public function placeholderImage($size = null)
    {
        $imgWidth = explode('x', $size)[0];
        $imgHeight = explode('x', $size)[1];
        $text = $imgWidth . '×' . $imgHeight;
        $fontFile = realpath('assets/font/RobotoMono-Regular.ttf');
        $fontSize = round(($imgWidth - 50) / 8);
        if ($fontSize <= 9) {
            $fontSize = 9;
        }
        if ($imgHeight < 100 && $fontSize > 30) {
            $fontSize = 30;
        }

        $image     = imagecreatetruecolor($imgWidth, $imgHeight);
        $colorFill = imagecolorallocate($image, 100, 100, 100);
        $bgFill    = imagecolorallocate($image, 175, 175, 175);
        imagefill($image, 0, 0, $bgFill);
        $textBox = imagettfbbox($fontSize, 0, $fontFile, $text);
        $textWidth  = abs($textBox[4] - $textBox[0]);
        $textHeight = abs($textBox[5] - $textBox[1]);
        $textX      = ($imgWidth - $textWidth) / 2;
        $textY      = ($imgHeight + $textHeight) / 2;
        header('Content-Type: image/jpeg');
        imagettftext($image, $fontSize, 0, $textX, $textY, $colorFill, $fontFile, $text);
        imagejpeg($image);
        imagedestroy($image);
    }

    public function categoryCompany($id)
    {
        $pageTitle      = keyToTitle(last(request()->segments())) . ' Companies';
        $categoryId = $id;
        $companies      = Company::approved()->where('category_id', $id)->withAvg('reviews', 'rating')
            ->withCount('reviews')->with('category')->latest()->paginate(getPaginate());
        $categories     = Category::where('status', Status::ENABLE)->where('id', $id)->with('company')->whereHas('company')->get();
        return view($this->activeTemplate . 'company.index', compact('pageTitle', 'companies', 'categories', 'categoryId'));
    }


    public function searchFromBanner(Request $request)
    {
        $pageTitle = "Search Companies";
        $categories = Category::where('status', Status::ENABLE)->with('company')->whereHas('company', function ($q) {
            $q->approved();
        })->get();

        $companies = Company::approved()->with('category')->where('name', 'like', "%$request->search%")
            ->orWhereJsonContains('tags', $request->search)
            ->orWhereHas('category', function ($q) use ($request) {
                $q->where('name', $request->search);
            })->latest()->withAvg('reviews', 'rating')->withCount('reviews')->paginate(getPaginate());

        return view($this->activeTemplate . 'company.index', compact('pageTitle', 'categories', 'companies'));
    }

    public function companies()
    {
        $companies      = Company::approved()->withAvg('reviews', 'rating')->withCount('reviews')->with('category')->latest()->paginate(getPaginate());
        $categories     = Category::where('status', Status::ENABLE)->with('company')->whereHas('company', function ($q) {
            $q->approved();
        })->get();
        $pageTitle      = 'All Companies';
        return view($this->activeTemplate . 'company.index', compact('pageTitle', 'companies', 'categories'));
    }


    public function filterCompanies(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id'   => 'nullable|exists:categories,id',
            'rating'        => 'nullable|min:1|max:5',
            'review_time'   => 'nullable|integer',
            'reg_start'     => 'nullable|integer',
            'reg_end'       => 'nullable|integer'
        ]);

        $query = Company::approved()->with('category')->withAvg('reviews', 'rating')->withCount('reviews');

        if ($request->search_key) {
            $query = $query->where('name', 'like', "%$request->search_key%")->orWhere('tags', 'like', "%$request->search_key%")->orWhereHas('category', function ($q) use ($request) {
                $q->where('name', $request->search_key);
            });
        }

        if ($request->category_id) {
            $query = $query->where('category_id', $request->category_id);
        }

        if ($request->rating) {
            $query = $query->whereBetween('avg_rating', [$request->rating - 1 + .1, $request->rating]);
        }

        if ($request->review_time) {
            $startMonth = now()->subMonths($request->review);
            $endMonth =  now();

            $query = $query->whereHas('reviews', function ($q) use ($startMonth, $endMonth) {
                $q->whereBetween('created_at', [$startMonth, $endMonth]);
            });
        }

        if ($request->reg_start && $request->reg_end) {
            $start = now()->subYear($request->reg_end);
            $end   = now()->subYear($request->reg_start);
            $query = $query->whereBetween('created_at', [$start, $end]);
        } elseif ($request->reg_end) {
            $start = now()->subYear($request->reg_end);
            $end   = now();
            $query = $query->whereBetween('created_at', [$start, $end]);
        } elseif ($request->reg_start) {
            $year = now()->subYear($request->reg_start);
            $query = $query->whereDate('created_at', '<', $year);
        } else {
            $query = $query;
        }

        $companies  = $query->latest()->with('category')->paginate(getPaginate());

        $categories   = Category::where('status', Status::ENABLE)->with('company')->whereHas('company', function ($q) {
            $q->approved();
        })->get();

        return view($this->activeTemplate . 'company.companies', compact('categories', 'companies'));
    }


    public function companyDetails(Request $request, $id, $slug)
    {
        $pageTitle = 'Company Details';
        $company   = Company::approved()->where('id', $id)->withAvg('reviews', 'rating')->withCount('reviews')->firstOrFail();

        $reviews     = Review::where('user_id', '!=', auth()->id())->with('user', 'company')->where('company_id', $id)->latest()->paginate(getPaginate(5));
        $myReview    = Review::where('user_id', auth()->id())->where('company_id', $id)->latest()->first();

        return view($this->activeTemplate . 'company.details', compact('pageTitle', 'company', 'reviews', 'myReview'));
    }




    public function review(Request $request, $id)
    {
        $request->validate(
            [
                'rating' => 'required|integer|min:1|max:5',
                'review' => 'required|string',
            ]
        );
        $company = Company::approved()->findOrFail($id);
        $review = Review::where('company_id', $id)->where('user_id', auth()->id())->first();
        if (!$review) {
            $review = new Review();
        }
        $review->rating  = $request->rating;
        $review->review  = $request->review;
        $review->user_id = auth()->id();
        $review->company_id = $id;
        $review->save();

        $reviews = Review::where('company_id', $id)->get();
        $company->avg_rating = $reviews->sum('rating') / $reviews->count();
        $company->save();
        $notify[] = ['success', 'Thanks for your review'];
        return back()->withNotify($notify);
    }


    public function companyRating($id)
    {
        header("Access-Control-Allow-Origin: *");
        $id   = Crypt::decrypt($id);
        $info = Company::where('id', $id)->where('status', 1)->withAvg('reviews', 'rating')->withCount('reviews')->first();
        return response()->json([
            'rating'  => $info->avg_rating,
            'outOf'   => ' (' . $info->reviews_count . ' Ratings)',
            'success' => true,
        ]);
    }


    public function addClick($id)
    {
        $advertisement = Advertisement::find($id);

        if ($advertisement) {
            $advertisement->click += 1;
            $advertisement->save();
        }
        return response()->json([
            'success' => true,
            'data' => $advertisement
        ]);
    }

    public function maintenance()
    {
        $pageTitle = 'Maintenance Mode';
        $general = gs();
        if ($general->maintenance_mode == Status::DISABLE) {
            return to_route('home');
        }
        $maintenance = Frontend::where('data_keys', 'maintenance.data')->first();
        return view($this->activeTemplate . 'maintenance', compact('pageTitle', 'maintenance'));
    }
}
