<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InvoiceController extends Controller
{
    
    public function __construct(Http $client)
    {
        
        $this->client = $client;
    }

    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    public function getAdminInvoice(Request $request,$page = 1)
    {
        $token = session()->get('token');
        try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property?page='.$page);

            $response = json_decode($call->getBody()->getContents(), true);
         
        }catch (\Exception $e){
            //buy a beer


        }
        
        $properties = $response['data'];
        $pagination = $response['meta']['pagination'];

        $lastpage = $pagination['total_pages'];

           

        return view('admin_invoice_list', compact('properties', 'pagination','lastpage'));


    }

// newly added column on 04.03.2021
    public function getAdminsettlement(Request $request,$page = 1)
    {
        $token = session()->get('token');
        try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confCharity?page='.$page);

            $response = json_decode($call->getBody()->getContents(), true);
         
        }catch (\Exception $e){
            //buy a beer


        }
        $configcharity = $response['data'];
        $pagination = $response['meta']['pagination'];

        $lastpage = $pagination['total_pages'];

           

        return view('admin_settlement_list', compact('configcharity', 'pagination','lastpage'));


    }
// end of newly added column

    public function getAdminMonthlyInvoice(Request $request,$page = 1)
    {
        $token = session()->get('token');

     

        $property_id = $request->property_id;
        
        $year = $request->year;

        try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/vendorInvoice?page='.$page.'&property_id='.$property_id.'&year='.$year);

            $response = json_decode($call->getBody()->getContents(), true);
         
        }catch (\Exception $e){
            //buy a beer


        }
        $veninvoices = $response['data'];

        // return $veninvoices;
        
        $pagination = $response['meta']['pagination'];

        $lastpage = $pagination['total_pages'];
        
        $pagetype = "GetMonthlyInvoice";

           

        return view('admin_monthly_invoice_list', compact('veninvoices', 'pagination','lastpage','pagetype'));


    }



// newly added column on 04.03.2021


public function getsettlement(Request $request,$page = 1)
{
    $token = session()->get('token');

    $conf_charity_id = $request->conf_charity_id;
    
    $year = $request->year;

    try{

        $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/charitySettlement?page='.$page.'&conf_charity_id='.$conf_charity_id.'&year='.$year);

        $response = json_decode($call->getBody()->getContents(), true);
     
    }catch (\Exception $e){
        //buy a beer


    }
    $charitysettlement = $response['data'];

    //  return $charitysettlement;
    
    $pagination = $response['meta']['pagination'];

    $lastpage = $pagination['total_pages'];

       

    return view('charity_settlement_list', compact('charitysettlement', 'pagination','lastpage'));


}



// ended newly added column










    public function getAdminMonthlyInvoiceDetails(Request $request,$page = 1)
    {
        $token = session()->get('token');

        $vendor_invoice_id = $request->vendor_invoice_id;
        
        try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/vendorInvoiceDetail?page='.$page.'&vendor_invoice_id='.$vendor_invoice_id);

            $response = json_decode($call->getBody()->getContents(), true);
         
        }catch (\Exception $e){
            //buy a beer


        }
        $invoices = $response['data'];

        //  return $invoices;
        
        $pagination = $response['meta']['pagination'];

        $lastpage = $pagination['total_pages'];

           

        return view('admin_monthly_invoice_details', compact('invoices', 'pagination','lastpage'));


    }

    public function getAdminCharityInvoice(Request $request,$page = 1)
    {
        $token = session()->get('token');

        $property_id = $request->property_id;
        
        $year = $request->year;

        try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/vendorCharityInvoice?page='.$page.'&property_id='.$property_id.'&year='.$year);

            $response = json_decode($call->getBody()->getContents(), true);
         
        }catch (\Exception $e){
            //buy a beer


        }
        $veninvoices = $response['data'];

        // return $veninvoices;
        
        $pagination = $response['meta']['pagination'];

        $lastpage = $pagination['total_pages'];

           

        return view('charity_monthly_invoice_list', compact('veninvoices', 'pagination','lastpage'));


    }


    public function createCharityMonthlyInvoice(Request $request)
    {
       
        $token = session()->get('token');

        $range = explode("-",$request->invmonth);

        $property_id = $request->property_id;

        $month =  ltrim($range[1], '0');

        
        
        $year = $range[0];

       

        $response = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'api/vendorCharityInvoice',

        [
            "property_id"=>$property_id,
            "month"=>$month,
            "year"=>$year,
                

        ]);
        
       
    if($response->status()===201 || $response->status()===200 ){
   
        return redirect('charity_monthly_invoice_list/1/'.$property_id."/".$year)->with('success', 'Monthly Vendor Charity Invoice Is Created Successfully');

    }

    else
    {

        if(isset($response['errors']))
        {
            return redirect()->back()->with('error',$response['errors']);
        }
        else if(isset($response['error']))
        {
            return redirect()->back()->with('error',$response['error']);
        }
        else if(isset($response['message']))
        {
            return redirect()->back()->with('error',$response['message']);
        }
    }
   
        

       


    }
    public function createAdminMonthlyInvoice(Request $request)
    {
       
        $token = session()->get('token');

        $range = explode("-",$request->invmonth);

        $property_id = $request->property_id;

        $month =  ltrim($range[1], '0');

        
        
        $year = $range[0];

       

        $response = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'api/vendorInvoice',

        [
            "property_id"=>$property_id,
            "month"=>$month,
            "year"=>$year,
                

        ]);
       
       
    if($response->status()===201 || $response->status()===200 ){
   
        return redirect('admin_monthly_invoice_list/1/'.$property_id."/".$year)->with('success', 'Monthly Vendor Invoice Is Created Successfully')->with('pagetype', 'createmoninv');

    }

    else
    {

        if(isset($response['errors']))
        {
            // return $response['errors'];
            return redirect()->back()->with('error',$response['errors']);
        }
        else if(isset($response['error']))
        {
            // return $response['error'];
            return redirect()->back()->with('error',$response['error']);
        }
        else if(isset($response['message']))
        {
            // return $response['message'];
            return redirect()->back()->with('error',$response['message']);
        }
    }
   
        

       


    }






    public function createcharitysettelement(Request $request)
    {
       
        $token = session()->get('token');

        $range = explode("-",$request->invmonth);

        $conf_charity_id = $request->conf_charity_id;

        $month =  ltrim($range[1], '0');

        
        
        $year = $range[0];

       

        $response = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'api/charitySettlement',

        [
            "conf_charity_id"=>$conf_charity_id,
            "month"=>$month,
            "year"=>$year,
                

        ]);
        
       
    if($response->status()===201 || $response->status()===200 ){
   
        return redirect('charity_settlement_list/1/'.$conf_charity_id."/".$year)->with('success', 'Charity Settlement Is Created Successfully');

    }

    else
    {

        if(isset($response['errors']))
        {
            return redirect()->back()->with('error',$response['errors']);
        }
        else if(isset($response['error']))
        {
            return redirect()->back()->with('error',$response['error']);
        }
        else if(isset($response['message']))
        {
            return redirect()->back()->with('error',$response['message']);
        }
    }
   
        

       


    }





    public function getCharityInvoice(Request $request,$page = 1)
    {
        $token = session()->get('token');
        try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property?page='.$page);

            $response = json_decode($call->getBody()->getContents(), true);
        //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
        $properties = $response['data'];
        $pagination = $response['meta']['pagination'];

        $lastpage = $pagination['total_pages'];

        
           

          return view('charity_invoice_list', compact('properties', 'pagination','lastpage'));
    }



    public function getVendorInvoice(Request $request,$page = 1)
    {
        $token = session()->get('token');
        try{

            $call = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/property?page='.$page);

            $response = json_decode($call->getBody()->getContents(), true);
        //  return $response;
        }catch (\Exception $e){
            //buy a beer


        }
        $properties = $response['data'];
        $pagination = $response['meta']['pagination'];

        $lastpage = $pagination['total_pages'];

        
           

          return view('vendor_invoice_list', compact('properties', 'pagination','lastpage'));
    }




// edit payment

public function vendorpay($id)
{
    $session = session()->get('token');
 

   

     try{

        $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confPaymentStatus');

        $response = json_decode($call->getBody()->getContents(), true);
          //return $response;
    }catch (\Exception $e){
        //buy a beer


    }
     $paymentstatus = $response['data'];

   
    $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/vendorInvoice/' . $id);

   
 
    

    if($response->ok()){

        $venpay =   $response->json()['data'];

          //return $venpay;

        return view('edit_vendor_payment', compact(
        'venpay','paymentstatus'
        ));
    }
}

// end of edit payment

// update vendor payment given below


public function update_vendor_pym(Request $request, $id)
{
    $session = session()->get('token');
    
    $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'/api/vendorInvoice/'.$id, 
    [
        "_method"=> 'PATCH',
     
        "payment_status_id"=>$request->payment_status_id
       
       
    ]
    
  );

    //  return $request->all();
 
    if($response->status()===200 || $response->status()===201 ){
        return redirect()->back()->with('success','Vendor Payment Updated Successfully!');
    }else{
         return $response;
        return redirect()->back()->with('error',$response->json()['message']);
    }

}






//End update vendor payment 

















// edit settlement payment

public function settlementpay($id)
{
    $session = session()->get('token');
 

   

     try{

        $call = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/confPaymentStatus');

        $response = json_decode($call->getBody()->getContents(), true);
          //return $response;
    }catch (\Exception $e){
        //buy a beer


    }
     $paymentstatus = $response['data'];

   
    $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') . '/api/charitySettlement/' . $id);

   
 
    

    if($response->ok()){

        $charitypay =   $response->json()['data'];

        //   return $charitypay;

        return view('edit_charityset_payment', compact(
        'charitypay','paymentstatus'
        ));
    }
}

// end of edit payment

// update settlement payment given below


public function update_charityset_pym(Request $request, $id)
{
    $session = session()->get('token');
    
    $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'/api/charitySettlement/'.$id, 
    [
        "_method"=> 'PATCH',
     
        "payment_status_id"=>$request->payment_status_id
       
       
    ]
    
  );

    //  return $request->all();
 
    if($response->status()===200 || $response->status()===201 ){
        return redirect()->back()->with('success','Charity Settlement Payment Updated Successfully!');
    }else{
         return $response;
        return redirect()->back()->with('error',$response->json()['message']);
    }

}






//End update vendor payment 


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
        //
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
