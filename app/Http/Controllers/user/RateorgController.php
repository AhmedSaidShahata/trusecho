<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Rateorg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateorgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $value_rate = $request->input('valueRate');

       $org_id = $request->input('orgId');

        $user = Auth::user()->id;

        $user_is_exist =Rateorg::where('user_id', '=', $user)->where('org_id', '=',$org_id)->get()->count();

        $rate = new Rateorg();

        if ($user_is_exist == 0) {

            $rate->value_rate = $value_rate;

            $rate->user_id = $user;

            $rate->org_id = (int)$org_id;

            $rate->save();
        } else {
           Rateorg::where(['user_id' => $user,'org_id' =>$org_id])->update(array('value_rate' => $value_rate));
        }

        $count_rate_of_book =Rateorg::where('org_id', '=',$org_id)->get()->count();

        $sum_values_rate =Rateorg::where('org_id', '=',$org_id)->get()->avg('value_rate');


        $decimal_total_rate = substr($sum_values_rate, 0, 3);

        $integer_total_rate = substr($sum_values_rate, 0, 1);

        $is_desimal = $decimal_total_rate - $integer_total_rate;

        if ($request->ajax()) {

            for ($i = 1; $i <= $integer_total_rate; $i++) {

                echo '<i  data-value="' . $i . '" class="fas fa-star rate-org fa-2x"></i>';
            }

            if ($is_desimal >= .3 and $is_desimal <= 8) {

                echo '<i  data-value="' . $i . '" class="fas rate-org fa-star-half-alt fa-2x"></i>';

                for ($i =  $integer_total_rate + 2; $i <= 5; $i++) {

                    echo '<i  data-value="' . $i . '" class="far rate-org fa-star fa-2x"></i>';
                }
            } else {

                for ($i =  $integer_total_rate + 1; $i <= 5; $i++) {

                    echo '<i  data-value="' . $i . '" class="far rate-org fa-star fa-2x"></i>';
                }
            }



            echo '<div class="rate_div"> total rated is <span class="rate_numbers"> ' . $decimal_total_rate . '</span>  from  <span class="rate_numbers" > ' . $count_rate_of_book . '</span> Users </div>';

            return;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
