<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use \stdClass;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dasboard()
    {
        $data = new stdClass();
        $data->order = 101;
        //chart đơn hàng
        $data->orders = [34,65,46,68,49,61,42,44,78,52,63,67];
        $data->earn = 102;
        //chart thu nhập
        $data->earns = [89.25,98.58,68.74,108.87,77.54,84.03,51.24,28.57,92.57,42.36,88.51,36.57];
        $data->refund = 103;
        //chart hoàn trả
        $data->refunds = [8,12,7,17,21,11,5,9,7,29,12,35];
        //chart lượt view
        $data->views = [20,40,40];

        // dd($entries);
        return view('admin.dashboard', ['data' => $data]);
    }
}
