<?php
function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    // transliterate
    $text = vn_to_str($text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    // trim
    $text = trim($text, '-');
    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);
    // lowercase
    $text = strtolower($text);
    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}

function vn_to_str($str)
{
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd' => 'đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D' => 'Đ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );
    foreach ($unicode as $nonUnicode => $uni) {
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    $str = str_replace(' ', '_', $str);
    return $str;
}

if (!function_exists('type_project')) {
    function type_project($status = null)
    {
        $leadstatus = [
            1 => __('project.apartment'),
            2 => __('project.villa'),
            3 => __('project.residential'),
        ];
        if ($status === null) return $leadstatus;
        foreach ($leadstatus as $key => $item) {
            if ($key == $status) {
                $result = $item;
            }
        }
        return $result;
    }
}

if (!function_exists('status_project')) {
    function status_project($status = null)
    {
        $leadstatus = [
            1 => __('project.new'),
            2 => __('project.on_sale'),
            3 => __('project.accomplished'),
            4 => __('project.pending'),
            5 => __('project.close_investment')
        ];
        if ($status === null) return $leadstatus;
        foreach ($leadstatus as $key => $item) {
            if ($key == $status) {
                $result = $item;
            }
        }
        return $result;
    }
}

function number_format_vn($number)
{
    return number_format($number, 0, ',', '.');
}

function hide_phone($phone, $role = "")
{
    $result = str_replace(substr($phone, 4, 4), stars($phone), $phone);
    if ($role != "") {
        return $phone;
    } else {
        return $result;
    }
}

function stars($phone)
{
    $times = strlen(trim(substr($phone, 4, 4)));
    $star = '';
    for ($i = 0; $i < $times; $i++) {
        $star .= '*';
    }
    return $star;
}

function encode($string, $key)
{
    $encode = openssl_encrypt($string, "AES-256-ECB", $key);
    return $encode;
}

function decode($string, $key)
{
    $decode = openssl_decrypt($string, "AES-256-ECB", $key);
    return $decode;
}

function random_string($end)
{
    $random = substr(strtoupper(md5(mt_rand())), 0, $end);
    return $random;
}

if (!function_exists('status_bill')) {
    function status_bill($status = null)
    {
        $leadstatus = [
            'new' => __('project.new'),
            'pending' => __('project.pending'),
            'success' => __('project.success'),
            'warning' => __('project.warning'),
            'fail' => __('project.fail'),
        ];
        if ($status === null) return $leadstatus;
        foreach ($leadstatus as $key => $item) {
            if ($key == $status) {
                $result = $item;
            }
        }
        return $result;
    }
}

function check_undefined($value)
{
    if ($value) {
        if ($value !== "undefined") {
            return $value;
        } else {
            return "";
        }
    } else {
        return "";
    }
}


if (!function_exists('status_contract')) {
    function status_contract($status = null)
    {
        $leadstatus = [
            1 => __('project.effect'),
            2 => __('project.expire'),
        ];
        if ($status === null) return $leadstatus;
        foreach ($leadstatus as $key => $item) {
            if ($key == $status) {
                $result = $item;
            }
        }
        return $result;
    }
}

if (!function_exists('status_transaction')) {
    function status_transaction($status = null)
    {
        $leadstatus = [
            1 => __('project.new'),
            4 => __('project.pending'),
            2 => __('project.success'),
            5 => __('project.warning'),
            3 => __('project.fail'),
        ];
        if ($status === null) return $leadstatus;
        foreach ($leadstatus as $key => $item) {
            if ($key == $status) {
                $result = $item;
            }
        }
        return $result;
    }
}

if (!function_exists('type_method')) {
    function type_method($status = null)
    {
        $leadstatus = [
            1 => __('project.investment'),
            2 => __('project.expiration'),
        ];
        if ($status === null) return $leadstatus;
        foreach ($leadstatus as $key => $item) {
            if ($key == $status) {
                $result = $item;
            }
        }
        return $result;
    }
}

if (!function_exists('color_status_contract')) {
    function color_status_contract($status = null)
    {
        $leadstatus = [
            1 => 'bg-success',
            2 => 'bg-danger',
        ];
        if ($status === null) return $leadstatus;
        foreach ($leadstatus as $key => $item) {
            if ($key == $status) {
                $result = $item;
            }
        }
        return $result;
    }
}

if (!function_exists('color_status_transaction')) {
    function color_status_transaction($status = null)
    {
        $leadstatus = [
            1 => 'bg-secondary',
            4 => 'bg-danger',
            2 => 'bg-success',
            5 => 'bg-warning',
            3 => 'bg-danger',
        ];
        if ($status === null) return $leadstatus;
        foreach ($leadstatus as $key => $item) {
            if ($key == $status) {
                $result = $item;
            }
        }
        return $result;
    }
}
