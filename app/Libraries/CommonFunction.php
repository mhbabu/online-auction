<?php

namespace App\Libraries;


use App\Modules\Product\Models\Product;
use App\Modules\Product\Models\ProductCategory;
use App\Modules\Settings\Models\Appearance;
use App\Modules\Settings\Models\Photo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommonFunction {

    /**
     * @param Carbon|string $updated_at
     * @param string $updated_by
     * @return string
     * @internal param $Users->id /string $updated_by
     */
    public static function showAuditLog($updated_at = '', $updated_by = '') {
        $update_was = 'Unknown';
        if ($updated_at && $updated_at > '0') {
            $update_was = Carbon::createFromFormat('Y-m-d H:i:s', $updated_at)->diffForHumans();
        }

        $user_name = 'Unknown';
        if ($updated_by) {
            $name = User::where('id', $updated_by)->first();
            if ($name) {
                $user_name = $name->user_full_name;
            }
        }
        return '<span class="help-block">Last updated : <i>' . $update_was . '</i> by <b>' . $user_name . '</b></span>';
    }

    public static function getUserId() {

        if (Auth::user()) {
            return Auth::user()->id;
        } else {
            return 0;
        }
    }

    public static function getUserType() {

        if (Auth::user()) {
            return Auth::user()->user_type;
        } else {
            dd('Invalid User Type');
        }
    }


    public static function getAllProductCategories(){
        return ProductCategory::where('status', 1)->where('is_archive', 0)->get();
    }

    public static function getUpcomingProducts(){
        return self::productInfo()
            ->where('products.category_id', 2)
            ->where('products.sold_status', 0)
            ->orderBy('products.id', 'desc')
            ->take(3)
            ->get([
                'products.*', 'photos.path as photo_path'
            ]);
    }


    public static function convertUTF8($string) {
        $string = preg_replace('/u([0-9a-fA-F]+)/', '&#x$1;', $string);
        return html_entity_decode($string, ENT_COMPAT, 'UTF-8');
    }

    public static function isAdmin() {
        $user_type = Auth::user()->user_type;
        /*
         * 1x101 for System Admin
         */
        if ($user_type == '1x101')
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function convert2Bangla($eng_number) {
        $eng = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $ban = ['à§¦', 'à§§', 'à§¨', 'à§©', 'à§ª', 'à§«', 'à§¬', 'à§­', 'à§®', 'à§¯'];
        return str_replace($eng, $ban, $eng_number);
    }

    public static function convert2English($ban_number) {
        $eng = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $ban = ['à§¦', 'à§§', 'à§¨', 'à§©', 'à§ª', 'à§«', 'à§¬', 'à§­', 'à§®', 'à§¯'];
        return str_replace($ban, $eng, $ban_number);
    }

    public static function generateTrackingID($prefix, $id) {
        $prefix = strtoupper($prefix);
        $str = $id . date('Y') . mt_rand(0, 9);
        if ($prefix == 'M' || $prefix == 'N') {
            if (strlen($str) > 12) {
                $str = substr($str, strlen($str) - 12);
            }
        } elseif ($prefix == 'G') {
            if (strlen($str) > 10) {
                $str = substr($str, strlen($str) - 10);
            }
        } elseif ($prefix == 'T') {
            if (strlen($str) > 12) {
                $str = substr($str, strlen($str) - 12);
            }
        } else {
            if (strlen($str) > 14) {
                $str = substr($str, strlen($str) - 14);
            }
        }
        return $prefix . dechex($str);
    }


    public static function setCompanyInfo(){

        $companyInfo = Appearance::leftJoin('users','users.id','=','appearance.created_by')
            ->where('appearance.status',1)
            ->where('appearance.is_archive',0)
            ->where('users.user_type','1x101')
            ->first([
                'appearance.*',
                'users.user_type'
            ]);

        $data = [
            'company_name'          => $companyInfo->name ?? env('APP_NAME','IESZONE'),
            'company_admin_name'    => $companyInfo->admin_name ?? 'Shariful Islam Raju',
            'company_description'   => $companyInfo->description ?? null,
            'company_logo'          => $companyInfo->logo ?? null,
            'company_website'       => $companyInfo->website ?? null,
            'company_address'       => $companyInfo->address ?? null,
            'company_email'         => $companyInfo->email ?? null,
            'company_phone'         => $companyInfo->phone ?? null,
            'facebook_link'         => $companyInfo->facebook ?? 'https://www.facebook.com',
            'twitter_link'          => $companyInfo->twitter ?? 'https://www.twitter.com',
            'instagram_link'        => $companyInfo->instagram ?? 'https://www.instagram.com',
            'linkedin_link'         => $companyInfo->linkedin ?? 'https://www.linkedin.com',
            'pinterest_link'        => $companyInfo->pinterest ?? null,
            'google_plus_link'      => $companyInfo->google_plus ?? null,
            'youtube_link'          => $companyInfo->youtube ?? null,
            'web_mail_link'         => 'https://mail.google.com/mail/u/0/',
        ];
        Session::put('company', $data);
    }


    public static function productInfo(){

        return Product::leftJoin('photos',function ($query){
            $query->on('photos.reference_id','=','products.id');
            $query->where('photos.reference_type','=','product');
            $query->where('photos.status',1);
            $query->where('photos.is_archive',0);
        })
            ->leftJoin('product_categories', 'product_categories.id', '=', 'products.category_id');
    }

    public static function topProductList(){
        return Product::leftJoin('photos',function ($query){
            $query->on('photos.reference_id','=','products.id');
            $query->where('photos.reference_type','=','product');
            $query->where('photos.status','=',1);
            $query->where('photos.is_archive','=',0);
        })
            ->where('products.status',1)
            ->where('products.is_archive',0)
            ->take(9)
            ->groupBy('products.id')
            ->orderBy('products.total_view','desc')
            ->get([
                'products.*',
                'photos.path as photo_path'
            ]);
    }

    public static function getSingleProductInfo($slug){
        return self::productInfo()
            ->where('products.slug', $slug)
            ->first([
                'products.*',
                'product_categories.id as product_category_id',
                'product_categories.name as product_category_name',
                'photos.path as photo_path'
            ]);
    }

    public static function getSingleProductPhotos($productId){
        return Photo::where('photos.reference_type', '=', 'product')
            ->where('reference_id', $productId)
            ->where('is_archive', '=', 0)
            ->get();
    }

    /*     * ****************************End of Class***************************** */
}
