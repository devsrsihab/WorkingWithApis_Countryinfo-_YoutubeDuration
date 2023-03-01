<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CountryController extends Controller
{
    public function getCountries(Request $request)
    {
        $url            = 'https://restcountries.com/v2/all';
        $data           = file_get_contents($url);
        $countries      = json_decode($data, true);
        $countryName    = array_column($countries,'capital');
        $countryArea    = array_column($countries,'area');
        $countryBordersArr = array_column($countries,'borders');

        // dd($countryBorders);
        $countryData  = array_map(function ($country,$countryName,$countryArea,$countryBordersArr) {
            return [
                'name'          => $country['name'],
                'capital'       => $countryName,
                'subregion'     => $country['subregion'],
                'alpha2Code'    => $country['alpha2Code'],
                'flags'         => $country['flags']['svg'],
                'nativeName'    => $country['nativeName'],
                // 'currencies' => $country['currencies'],
                // 'languages'  => $country['languages'],
                'population'    => $country['population'],
                'area'          => $countryArea,
                // 'borders'       => $countryBordersArr,
                'independent'   => $country['independent'],
            ];
        }, $countries,$countryName,$countryArea,$countryBordersArr);


        return view('country.index', compact('countryData'));
 }


//  pagination
// public function countryPaginate(Request $request)
// {
//     $url                = 'https://restcountries.com/v2/all';
//     $data               = file_get_contents($url);
//     $data['countries']          = collect(json_decode($data, true));

//     // $perPage            = $request->query('perPage', 10);    
//     // $countryNames       = $countries->pluck('name')->toArray();
//     // $countriesPaginated = new LengthAwarePaginator(
//     //     array_slice($countryNames, $perPage * ($request->query('page', 1) - 1), $perPage),
//     //     count($countryNames),
//     //     $perPage,
//     //     null,
//     //     ['path'         => $request->url()]
//     // );

//     return view('country.paginate', $data);
// }


}
