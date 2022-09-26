<?php

namespace App\Libraries;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ACL
{
    public static function hasUserModificationRight($userType, $right, $id)
    {
        try {
            $userId = CommonFunction::getUserId();
            if ($userType == '1x101')
                return true;

            if ($userId == $id)
                return true;

            return false;
        } catch (\Exception $e) {
            dd(CommonFunction::showErrorPublic($e->getMessage()));
            return false;
        }
    }

    public static function getAccessRight($module, $right = '', $id = null)
    {
        $accessRight = '';
        if (Auth::user()) {
            $user_type = Auth::user()->user_type;
        } else {
            die('You are not authorized user or your session has been expired!');
        }
        switch ($module) {
            case 'AuthorCategory':
                if ($user_type == '1x101') {
                    $accessRight = '-A-V-E-D-';
                }
                break;

            case 'Author':
                if ($user_type == '1x101') {
                    $accessRight = '-A-V-E-D-';
                }
                break;

            case 'Article':
                if ($user_type == '1x101') {
                    $accessRight = '-V-D-';
                }elseif($user_type == '3x303'){
                    $accessRight = '-A-E-V-D-';
                }else{
                    $accessRight = '-V-';
                }
                break;
            case 'generalRequisition':
                if ($user_type == '1x101') {
                    $accessRight = '-V-E-D-';
                }else if(in_array($user_type, ['18x881','18x883'])){
                    $accessRight = '-A-V-E-D-';
                }else if (in_array($user_type, ['18x882'])) {
                    $accessRight = '-A-V-E-D-UP-';
                }
                break;
            case 'Dashboard':
                if ($user_type == '1x101') {
                    $accessRight = '-A-V-E-D-';
                } elseif ($user_type == '3x303') {
                    $accessRight = '-V-';
                } elseif ($user_type == '2x202') {
                    $accessRight = '-V-';
                }
                break;

            case 'User':
                if ($user_type == '1x101') {
                    $accessRight = '-A-V-E-D-';
                } else if ($user_type == '2x202') {
                    $accessRight = '-A-V-E-D-';
                } else if ($user_type == '3x303') {
                    $accessRight = '-A-V-E-D-';
                }
                if ($right == "SPU") {
                    if (ACL::hasUserModificationRight($user_type, $right, $id))
                        return true;
                }

                break;
            default:
                $accessRight = '';
        }
        if ($right != '') {
            if (strpos($accessRight, $right) === false) {
                return false;
            } else {
                return true;
            }
        } else {
            return $accessRight;
        }
    }

    public static function isAllowed($accessMode, $right)
    {
        if (strpos($accessMode, $right) === false) {
            return false;
        } else {
            return true;
        }
    }

    /*     * **********************************End of Class****************************************** */
}