<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Company;
use App\Models\ComapanyMember;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Carbon\Carbon;


class CompanyController extends Controller
{
    protected $response = ["type" => "warning", "message" => "CompanyController", "status" => false];

    public function __construct()
    {
        View::addLocation(resource_path("views/rell/layout/company"));
    }

    public function check(Request $request){

        $company = new Company;
        $company->name = $request->companyNameData;
        $company->owner = Auth::user()->id;
        $company->company_key = Str::random(8);
        $company->token = Str::random(45);
        $company->secret_key = Str::random(45);
        $company->plan = $request->PlanIdData;
        $company->period = $request->PeriodData;
        $company->price = $request->PriceData;
        $company->status = 1;
        
        if($company->save()){
            $inv = new Invoice;
            $inv->user = Auth::user()->id;
            $inv->company = $company->id;
            $inv->total = $request->PriceData;
            $inv->discount_rate = 0;
            $inv->discount_total = $request->PriceData;
            $inv->tax = 18;
            $inv->tax_total = ($request->PriceData * 18) / 100;
            $inv->sub_total = $request->PriceData + ($request->PriceData * 18) / 100;
            $inv->status = 1;
            $inv->last_payment = Carbon::now()->addDays(5);
            Notification::info("Yeni Şirket Oluşturuldu", Auth::user()->id, '/company/'.$company->id);
            if($inv->save()){
                $item = new InvoiceItem;
                $item->invoice = $inv->id;
                $item->type = 1;
                $item->item = $request->PlanIdData;
                $item->price = $request->PriceData;
                $item->period = $request->PeriodData;

                if($item->save()){
                    $this->response['status'] = true;
                    Notification::info("Yeni Fatura Oluşturuldu", Auth::user()->id, '/invoice/detail/'.$inv->id);
                }
            }
        }
        
        return $this->response;
    }
}
