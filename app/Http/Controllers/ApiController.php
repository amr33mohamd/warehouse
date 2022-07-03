<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;
use function Symfony\Component\VarDumper\Dumper\esc;

class ApiController extends Controller
{
    public function new_orders(Request $request)
    {
        $orders = \App\Models\Order::where('status','waiting')->get();
        $starting_point = Setting::where('name','starting_point')->first();
        if($orders->count() > 0){
            $order = $orders->first();
            $direction = (($order->Storage_unit->x) > $starting_point->x) ? 'r' : 'l';
            if($order->type == "add"){
                return
                    [
                        'orders'=>$orders->count(),
                        'type'=>$order->type,
                        'x'=>abs($order->Storage_unit->x -$starting_point->x),
                        'y'=>$order->Storage_unit->y - 1,
                        'direction'=>$direction,
                        'id'=>$order->id

                    ];
            }
            else{
                $direction = (($order->Storage_unit->x) > $starting_point->x) ? 'r' : 'l';
                return
                    [
                        'orders'=>$orders->count(),
                        'type'=>$order->type,
                        'x'=>abs($order->Product->storage_unit->x -$starting_point->x),
                        'y'=>$order->Product->storage_unit->y - 1,
                        'direction'=>$direction,
                        'id'=>$order->id
                    ];
            }

        }
        else{
            return
                [
                    'orders'=>0,
                ];
        }
    }
    public function change_order_status(Request $request)
    {
        $order = Order::where('id',$request->id)->update(
            ['status'=>$request->status]
        );
        if($order) {
            return [
                'status'=>'success'
            ];
        }
        else {
            return [
                'status'=>'failed'
            ];
    }

    }
}
