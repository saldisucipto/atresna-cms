<?php

namespace App\Http\Controllers\FrontPages;

use App\Http\Controllers\Controller;
use App\Http\Utils\AnalisisPengunjung;
use App\Http\Utils\Meta;
use App\Models\CompanyInfo;
use App\Models\MetaSite;

class FrontPagesControlller extends Controller
{
    // Home Index Page
    public function index()
    {
        $companyInfo = CompanyInfo::where('id', 1)->get(['company_name', 'company_favicon', 'company_slogan', 'company_logo', 'company_address', 'company_email', 'company_phone'])->first();
        AnalisisPengunjung::recordVisitor($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], url()->current());
        $metaDataSite = MetaSite::where("id", 1)->get(["meta_title", "meta_description", "meta_keyword"])->first();
        $metaSite = new Meta($metaDataSite->meta_title, $metaDataSite->meta_description, $companyInfo->company_logo, $metaDataSite->meta_keyword);
        return view('index', ['title' => $metaSite->getTitle(), 'companyInfo' => $companyInfo,]);
    }
}
