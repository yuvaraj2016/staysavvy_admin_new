<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SoapsyncController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Http $client)
    {

        $this->client = $client;
    }


    public function index(Request $request, $page = 1)
    {
        //

        $token = session()->get('token');
        try {

            $call = Http::withToken($token)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/property?page=' . $page);

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        } catch (\Exception $e) {
            //buy a beer


        }
        $property = $response['data'];
        $pagination = $response['meta']['pagination'];

        $lastpage = $pagination['total_pages'];


        try {

            $call = Http::withToken($token)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/PropertyCount');

            $response = json_decode($call->getBody()->getContents(), true);
        } catch (\Exception $e) {
        }
        $prop_count = $response['data'];




        return view('properties_list', compact('property', 'pagination', 'lastpage', 'prop_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $token = session()->get('token');

        try {

            $call = Http::withToken($token)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/confTax');

            $response = json_decode($call->getBody()->getContents(), true);
        } catch (\Exception $e) {
        }


        $tax = $response['data'];

        try {

            $call = Http::withToken($token)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/confAmenity');

            $response = json_decode($call->getBody()->getContents(), true);
        } catch (\Exception $e) {
        }
        $amenity = $response['data'];


        try {

            $call = Http::withToken($token)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/confPropertyMgmtSystem');

            $response = json_decode($call->getBody()->getContents(), true);
        } catch (\Exception $e) {
        }
        $pms = $response['data'];

        try {

            $call = Http::withToken($token)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/confCentralResSystem');

            $response = json_decode($call->getBody()->getContents(), true);
        } catch (\Exception $e) {
        }
        $crs = $response['data'];

        try {

            $call = Http::withToken($token)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/confStatus');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        } catch (\Exception $e) {
            //buy a beer


        }
        $statuses = $response['data'];

        try {

            $call = Http::withToken($token)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/confHostType');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        } catch (\Exception $e) {
            //buy a beer


        }
        $host = $response['data'];

        try {

            $call = Http::withToken($token)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/confPropertyType');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        } catch (\Exception $e) {
            //buy a beer


        }
        $property_type = $response['data'];



        try {

            $call = Http::withToken($token)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/confRoomType');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        } catch (\Exception $e) {
            //buy a beer


        }
        $confRoomType = $response['data'];
        try {

            $call = Http::withToken($token)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/confAmenity');

            $response = json_decode($call->getBody()->getContents(), true);
        } catch (\Exception $e) {
        }
        $amenity = $response['data'];

        try {

            $call = Http::withToken($token)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/confCoolthing');

            $response = json_decode($call->getBody()->getContents(), true);
        } catch (\Exception $e) {
        }
        $Coolthing = $response['data'];
        try {

            $call = Http::withToken($token)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/vendors_list');

            $response = json_decode($call->getBody()->getContents(), true);
        } catch (\Exception $e) {
        }
        $vendors = $response['data'];

        if (session()->has('success')) {
            session()->forget('success');
        }
        return view(
            'create_gust_properties',
            compact(
                'tax',
                'amenity',
                'statuses',
                'host',
                'property_type',
                'pms',
                'crs',
                'confRoomType',
                'amenity',
                'Coolthing',
                'vendors'
            )
        );

        //    return view('create_property');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $session = session()->get('token');
        $guestresponse = Http::withToken($session)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->post(
            config('global.url') . 'api/hotelDetails',
            [
                "requestor_id" => $request->requestor_id,
                "type" => $request->type,
                "password" => $request->password,
                "name" => $request->name,
                "bc_primary" => $request->bc_primary,
                "bc_type" => $request->bc_type,
                "company_code" => $request->company_code,
                "company_name" => $request->company_name,
                "hotel_code" => $request->hotel_code,
                "hotel_name" => $request->hotel_name,
            ]
        );

        // return $request->all();
        if ($guestresponse->status() === 200) {
            //  return $guestresponse->json();
            $propty_name =  $guestresponse['data']['OTA_HotelDescriptiveInfoRS'][0]['HotelDescriptiveContents'][0]['HotelDescriptiveContent'][0]['HotelName'];
            // return $propty_name;
            $latitude = $guestresponse['data']['OTA_HotelDescriptiveInfoRS'][0]['HotelDescriptiveContents'][0]['HotelDescriptiveContent'][0]['HotelInfo'][0]['Position'][0]['Latitude'];
            // return $latitude;

            $Longitude = $guestresponse['data']['OTA_HotelDescriptiveInfoRS'][0]['HotelDescriptiveContents'][0]['HotelDescriptiveContent'][0]['HotelInfo'][0]['Position'][0]['Longitude'];
            // return $Longitude;
            $city = $guestresponse['data']['OTA_HotelDescriptiveInfoRS'][0]['HotelDescriptiveContents'][0]['HotelDescriptiveContent'][0]['ContactInfos'][0]['ContactInfo'][0]['Address'][0]['CityName'][0];
            // return $city;
            $postalcode = $guestresponse['data']['OTA_HotelDescriptiveInfoRS'][0]['HotelDescriptiveContents'][0]['HotelDescriptiveContent'][0]['ContactInfos'][0]['ContactInfo'][0]['Address'][0]['PostalCode'][0];
            // return $postalcode;
            $CountryName = $guestresponse['data']['OTA_HotelDescriptiveInfoRS'][0]['HotelDescriptiveContents'][0]['HotelDescriptiveContent'][0]['ContactInfos'][0]['ContactInfo'][0]['Address'][0]['CountryName'][0];
            // return $CountryName;
            $StreetNmbr = $guestresponse['data']['OTA_HotelDescriptiveInfoRS'][0]['HotelDescriptiveContents'][0]['HotelDescriptiveContent'][0]['ContactInfos'][0]['ContactInfo'][0]['Address'][0]['StreetNmbr'][0];
            // return $StreetNmbr;
            $AddressLine = $guestresponse['data']['OTA_HotelDescriptiveInfoRS'][0]['HotelDescriptiveContents'][0]['HotelDescriptiveContent'][0]['ContactInfos'][0]['ContactInfo'][0]['Address'][0]['AddressLine'][0];
            // return $AddressLine;

            $address = $AddressLine . "," . $StreetNmbr . "," . $CountryName . "," . $city . "," . $postalcode;
            //  return $guestresponse;

            $conpolycy = $guestresponse['data']['OTA_HotelDescriptiveInfoRS'][0]['HotelDescriptiveContents'][0]['HotelDescriptiveContent'][0]['Policies'][0]['Policy'][0];
            // $roomcode= $roomdetails['data'];
            // return $conpolycy;

        } else {


            // return "fgf";
            return redirect()->route('gustproperty.create')->with('error', $guestresponse['message']);
        }



        // $session = session()->get('token');



        $fileext = '';
        $filename = '';
        $taxes = '';
        $amenities = '';
        $coolthings = '';

        foreach ($request->taxes as $tax) {

            $taxes .= $tax . ",";
        }

        foreach ($request->amenities as $amenity) {

            $amenities .= $amenity . ",";
        }

        foreach ($request->coolthings as $coolthink) {

            $coolthings .= $coolthink . ",";
        }

        $taxes = rtrim($taxes, ",");

        $amenities = rtrim($amenities, ",");

        $coolthings = rtrim($coolthings, ",");

        // return $amenities;
        // return $request->all();
        if ($request->file('file') !== null) {

            $files = $request->file('file');
            $response = Http::withToken($session);


            // return $request->amenities;
            foreach ($files as $k => $ufile) {
                $filename = fopen($ufile, 'r');
                $fileext = $ufile->getClientOriginalName();
                $response = $response->attach('file[' . $k . ']', $filename, $fileext);
            }
            $response = $response->withHeaders(['Accept' => 'application/vnd.api.v1+json'])->post(
                config('global.url') . '/api/property',
                [
                    [
                        'name' => 'name',
                        'contents' => $request->name
                    ],
                    [
                        'name' => 'address',
                        'contents' => $address
                    ],
                    // [
                    //     'name' => 'location',
                    //     'contents' => $request->location
                    // ],
                    [
                        'name' => 'host_type_id',
                        'contents' => $request->host_type_id
                    ],
                    [
                        'name' => 'property_mgmt_system_id',
                        'contents' => $request->property_mgmt_system_id
                    ],

                    [
                        'name' => 'central_res_system_id',
                        'contents' => $request->central_res_system_id
                    ],

                    [
                        'name' => 'property_type_id',
                        'contents' => $request->property_type_id
                    ],

                    [
                        'name' => 'general_description',
                        'contents' => $request->general_description
                    ],

                    [
                        'name' => 'what_we_offer',
                        'contents' => $request->what_we_offer
                    ],

                    [
                        'name' => 'room_start_price',
                        'contents' => $request->room_start_price
                    ],
                    [
                        'name' => 'status_id',
                        'contents' => $request->status_id
                    ],
                    [
                        'name' => 'taxes[]',
                        'contents' => $taxes
                    ],
                    [
                        'name' => 'amenities[]',
                        'contents' => $amenities
                    ],
                    [
                        'name' => 'coolthings[]',
                        'contents' => $coolthings
                    ],
                    [
                        'name' => 'vendor_id',
                        'contents' => $request->vendor_id
                    ],
                    [
                        'name' => 'latitude',
                        'contents' => $latitude
                    ],
                    [
                        'name' => 'longitude',
                        'contents' => $Longitude
                    ],
                    [
                        'name' => 'city',
                        'contents' => $city
                    ],
                    [
                        'name' => 'postalcode',
                        'contents' => $postalcode
                    ],
                    [
                        'name' => 'gl_requestor_id',
                        'contents' => $request->requestor_id
                    ],
                    [
                        'name' => 'gl_type',
                        'contents' => $request->type
                    ],

                    [
                        'name' => 'gl_password',
                        'contents' => $request->password
                    ],
                    [
                        'name' => 'gl_name',
                        'contents' => $request->name
                    ],

                    [
                        'name' => 'gl_bc_primary',
                        'contents' => $request->bc_primary
                    ],
                    [
                        'name' => 'gl_bc_type',
                        'contents' => $request->bc_type
                    ],

                    [
                        'name' => 'gl_company_code',
                        'contents' => $request->company_code
                    ],
                    [
                        'name' => 'gl_company_name',
                        'contents' => $request->company_name
                    ],

                    [
                        'name' => 'gl_hotel_code',
                        'contents' => $request->hotel_code
                    ],
                    [
                        'name' => 'gl_hotel_name',
                        'contents' => $request->hotel_name
                    ],



                ]
            );
        }


        if ($response->status() === 201) {
            // dd($response);
            $property_id = $response->json()['id'];
            // return  $property_id;
            try {

                $roomresponse = Http::withToken($session)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->post(
                    config('global.url') . 'api/roomDetails',
                    [
                        "primary_lang_id" => $request->primary_lang_id,
                        "summary_only" => $request->summary_only,
                        "requested_currency" => $request->requested_currency,
                        "requestor_id" => $request->requestor_id,
                        "type" => $request->type,
                        "password" => $request->password,
                        "name" => $request->name,
                        "bc_primary" => $request->bc_primary,
                        "bc_type" => $request->bc_type,
                        "company_code" => $request->company_code,
                        "company_name" => $request->company_name,
                        "hotel_code" => $request->hotel_code,
                        "hotel_name" => $request->hotel_name,
                    ]
                );
                //  return $response;
            } catch (\Exception $e) {
                //buy a beer


            }
            // return $roomresponse;
            $roomdetails = $roomresponse['data'];
            // return $roomdetails;


            $roomRequestData = $roomdetails['OTA_HotelAvailRS'][0]['RoomStays'][0]['RoomStay'][0]['RoomTypes'][0]['RoomType'];
            $roomRatePlans = $roomdetails['OTA_HotelAvailRS'][0]['RoomStays'][0]['RoomStay'][0]['RatePlans'][0]['RatePlan'];
            $finalArray = array();
            $i = 0;
            foreach ($roomRequestData as $roomItem) {
                $roomDescription = '';
                foreach ($roomItem['RoomDescription'] as $roomDescItem) {
                    $roomDescription = $roomDescItem['Name'];
                }

                // $maxOccupancy = '';
                // foreach ($roomItem['Occupancy'] as $occupancy) {
                //     $maxOccupancy = $occupancy['MaxOccupancy'];
                // }


                $roomtyperesponse = Http::withToken($session)->withHeaders(
                    ['Accept' => 'application/vnd.api.v1+json']
                )->post(
                    config('global.url') . 'api/confRoomType',
                    [

                        "property_id" => $property_id,
                        "name" => $roomDescription,
                        "code" => $roomItem['RoomTypeCode'],
                        "description" => $roomItem['RoomViewCode'],
                        "status_id" => 1


                    ]
                );
                $id = basename($roomtyperesponse->header('Location'));
                // return $id;
                $roomtyperesponse = Http::withToken($session)->withHeaders(
                    ['Accept' => 'application/vnd.api.v1+json']
                )->post(
                    config('global.url') . 'api/room',
                    [

                        "property_id" => $property_id,
                        "room_type_id" => $id,
                        "no_of_rooms" => $roomItem['NumberOfUnits'],
                        "available_rooms" => $roomItem['NumberOfUnits'],
                        "max_adults" => $roomItem['Occupancy'][0]['MaxOccupancy'],
                        "max_occupancy" => $roomItem['Occupancy'][0]['MaxOccupancy'],
                        "max_children" => $roomItem['Occupancy'][0]['MaxOccupancy'],
                        "room_location" => $roomItem['RoomViewCode'],
                        "status_id" => 1,

                        "url" => $roomItem['AdditionalDetails'][0]['AdditionalDetail'][0]['DetailDescription'][0]['URL'][0],
                        "amount" => 100,
                        "gl_room_type_code" => $roomItem['RoomTypeCode'],
                        "gl_rate_plan_code" => $roomRatePlans[$i]['RatePlanCode'],

                    ]
                );
                $i++;
            }
            //             foreach( $conpolycy as $key => $value )
            // {
            //     dd($key);
            // }
            foreach ($conpolycy as $key => $value) {
                $description = '';
                if ($key === 'CheckoutCharges') {
                    foreach ($value as $policyItemkey => $policyItemValue) {
                        // dd($policyItemValue);
                        $description = $policyItemValue['CheckoutCharge'][0]['Amount'];
                    }
                } else if ($key === 'PolicyInfo') {
                    foreach ($value as $policyItemkey => $policyItemValue) {
                        foreach ($policyItemValue as $policyItem1key => $policyItem1Value) {
                            if ($policyItem1key === 'CheckInTime' || $policyItem1key === 'CheckOutTime' || $policyItem1key === 'MaxChildAge')
                                $description .= $policyItem1key . '_' .   $policyItem1Value . ',';
                            else if ($policyItem1key === 'Description'){
                                $description .=  $policyItem1Value[0]['Text'][0];
                            }
                        }
                    }
                } else if ($key === 'PetsPolicies') {
                    foreach ($value as $policyItemkeys => $policyItemValue) {
                        $description ='Non Refundable Fee'.':'.$policyItemValue['PetsPolicy'][0]['NonRefundableFee'];
                        $description .=  ',' .$policyItemValue['PetsPolicy'][0]['Description'][0]['Text'][0];
                        

                    }
                    // dd( $description);
                } else if ($key === 'CancelPolicy') {
                    foreach ($value as $policyItemkeys => $policyItemValue) {
                        $description =$policyItemValue['CancelPenalty'][0]['Deadline'][0]['OffsetUnitMultiplier'] .' '.$policyItemValue['CancelPenalty'][0]['Deadline'][0]['OffsetTimeUnit'] .' '.$policyItemValue['CancelPenalty'][0]['Deadline'][0]['OffsetDropTime'];
                        $description .=  ',' .$policyItemValue['CancelPenalty'][0]['PenaltyDescription'][0]['Text'][0];

                    }
                    // dd( $description);
                }else if ($key === 'GuaranteePaymentPolicy') {
                    foreach ($value as $policyItemkeys => $policyItemValue) {
                        $description =$policyItemValue['GuaranteePayment'][0]['Description'][0]['Text'][0];
                        // $description .=  ',' .$policyItemValue['CancelPenalty'][0]['Description'][0]['Text'][0];

                    }
                    // dd( $description);
                }
                
                // dd($con);
                $policiesresponse = Http::withToken($session)->withHeaders(
                    ['Accept' => 'application/vnd.api.v1+json']
                )->post(
                    config('global.url') . 'api/confPolicy',
                    [

                        "name" => $key,

                        "status_id" => 1


                    ]
                );
                $id = basename($policiesresponse->header('Location'));
                // return $id;

                $policyArray = array();
                $policyObj['property_id'] = $property_id;
                $policyObj['policy_id'] = $id;
                $policyObj['description'] = $description;
                array_push($policyArray, $policyObj);


                $plyresponse = Http::withToken($session)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->post(
                    config('global.url') . 'api/policy',
                    [

                        'policy' => $policyArray

                    ]
                );
                // return $plyresponse;

            }



            return redirect()->route('gustproperty.create')->with('success', 'Imported Successfully!');
        } else {
            return $response;

            $request->flash();

            return redirect()->route('gustproperty.create')->with('error', $response['errors']);
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
        $token = session()->get('token');
        try {

            $call = Http::withToken($token)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/property/' . $id);

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        } catch (\Exception $e) {
            //buy a beer


        }
        $properties = $response['data'];

        // return $properties;

        return view(
            'view_properties_list',
            compact(
                'properties'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $session = session()->get('token');



        try {

            $call = Http::withToken($session)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/confTax');

            $response = json_decode($call->getBody()->getContents(), true);
        } catch (\Exception $e) {
        }
        $tax = $response['data'];

        try {

            $call = Http::withToken($session)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/confAmenity');

            $response = json_decode($call->getBody()->getContents(), true);
        } catch (\Exception $e) {
        }
        $amenity = $response['data'];

        try {

            $call = Http::withToken($session)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/confPropertyMgmtSystem');

            $response = json_decode($call->getBody()->getContents(), true);
        } catch (\Exception $e) {
        }
        $pms = $response['data'];

        try {

            $call = Http::withToken($session)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/confCentralResSystem');

            $response = json_decode($call->getBody()->getContents(), true);
        } catch (\Exception $e) {
        }
        $crs = $response['data'];


        try {

            $call = Http::withToken($session)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/confStatus');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        } catch (\Exception $e) {
            //buy a beer


        }
        $statuses = $response['data'];

        try {

            $call = Http::withToken($session)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/confHostType');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        } catch (\Exception $e) {
            //buy a beer


        }
        $host = $response['data'];

        try {

            $call = Http::withToken($session)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/confPropertyType');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        } catch (\Exception $e) {
            //buy a beer


        }
        $property_type = $response['data'];


        try {

            $call = Http::withToken($session)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/confCoolthing');

            $response = json_decode($call->getBody()->getContents(), true);
            //  return $response;
        } catch (\Exception $e) {
            //buy a beer


        }
        $Coolthing = $response['data'];
        try {

            $call = Http::withToken($session)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/vendors_list');

            $response = json_decode($call->getBody()->getContents(), true);
        } catch (\Exception $e) {
        }
        $vendors = $response['data'];



        $response = Http::withToken($session)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->get(config('global.url') . '/api/property/' . $id);





        if ($response->ok()) {

            $properties =   $response->json()['data'];
            $str_arr = explode(",", $properties['location']);
            $str_arr1 = explode(",", $properties['location']);
            // $latitude= $str_arr[0];
            // $longitud= $str_arr[1];
            $properties['latitude'] = $str_arr1[0];
            $properties['longitude'] = $str_arr[1];
            //    return $str_arr1;

            return view('edit_properties', compact(
                'properties',
                'tax',
                'amenity',
                'statuses',
                'host',
                'property_type',
                'pms',
                'crs',
                'Coolthing',
                'vendors'
            ));
        }
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
        $session = session()->get('token');

        $str_arr = $request->latitude;
        $str_arr1 = $request->longitude;

        $taxes = '';
        $amenities = '';
        $coolthings = '';

        foreach ($request->taxes as $tax) {

            $taxes .= $tax . ",";
        }

        foreach ($request->amenities as $amenity) {

            $amenities .= $amenity . ",";
        }

        foreach ($request->coolthings as $coolthink) {

            $coolthings .= $coolthink . ",";
        }

        $taxes = rtrim($taxes, ",");
        // return  $taxes;
        $amenities = rtrim($amenities, ",");
        //  return  $amenities;
        $coolthings = rtrim($coolthings, ",");

        $response = Http::withToken($session)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->post(
            config('global.url') . '/api/property/' . $id,

            [
                "_method" => 'PUT',

                "name" => $request->name,
                "address" => $request->address,
                "location" => $request->location,
                "host_type_id" => $request->host_type_id,
                "property_mgmt_system_id" => $request->property_mgmt_system_id,
                "central_res_system_id" => $request->central_res_system_id,
                "property_type_id" => $request->property_type_id,
                "general_description" => $request->general_description,
                "what_we_offer" => $request->what_we_offer,
                "room_start_price" => $request->room_start_price,
                "status_id" => $request->status_id,


                "city" => $request->city,
                "postalcode" => $request->postalcode,

                "latitude" => $str_arr,
                "longitude" => $str_arr1,

                "taxes" => $taxes,
                "vendor_id" => $request->vendor_id,
                "amenities" => $amenities,
                "coolthings" => $coolthings

            ]

        );
        //   return $response;

        // if ($response->headers()['Content-Type'][0] == "text/html; charset=UTF-8") {
        //     return redirect()->route('home');
        // }
        if ($response->status() === 200) {
            return redirect()->back()->with('success', 'Properties Updated Successfully!');
        } else if ($response->status() === 403) {
            return redirect()->back()->with('error', 'You have created property already. You can create only one property through vendor account!');
        } else {
            // return $response['errors'];
            return redirect()->back()->with('error', $response->json()['errors']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = session()->get('token');

        $response = Http::withToken($session)->withHeaders(['Accept' => 'application/vnd.api.v1+json', 'Content-Type' => 'application/json'])->delete(config('global.url') . 'api/property/' . $id);

        if ($response->status() == 204) {

            return redirect()->route('properties.index')->with('success', 'Properties Deleted Sucessfully !..');
        } else {


            return redirect()->route('properties.index')->with('error', $response->json()['message']);
        }
    }
}
