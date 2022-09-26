<?php

namespace App\Modules\Page\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Page\Models\Page;

class PageController extends Controller
{
    public function index($key)
    {
        $data['page'] = Page:: whereKey($key)->first();
        $data['key'] = $this->pageName($key);
        return view("Page::frontend.index",$data);
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
