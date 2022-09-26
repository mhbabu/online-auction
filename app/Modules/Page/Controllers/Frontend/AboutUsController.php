<?php

namespace App\Modules\Page\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Page\Models\AboutUs;
use App\Modules\Page\Models\Page;

class AboutUsController extends Controller
{
    public function index()
    {
		$key = 'about-us';
        $data['about'] = Page:: whereKey($key)->where('status', 1)->first();
        return view("Page::frontend.about-us", $data);
    }

    public function pageName($key)
    {
        switch ($key)
        {
            case 'terms-and-conditions':
              return "Terms & Conditions";

            case 'privacy-policy':
              return "Privacy Policy";

            default:
              return null;
          }
    }
}
