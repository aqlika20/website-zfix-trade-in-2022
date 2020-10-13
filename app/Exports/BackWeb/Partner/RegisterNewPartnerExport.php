<?php

namespace App\Exports\BackWeb\Partner;

use App\BackWeb\Partner\GenerateVoucher;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;

class RegisterNewPartnerExport implements FromView, ShouldAutoSize, WithTitle
{

    use Exportable;

    public function forParam(int $id, int $status)
    {
        $this->id = $id;
        $this->status = $status;

        return $this;
    }

    public function title(): string
    {
        if ($this->status == 0) {
            $statusSheet = 'In-Active';
        }
        else if ($this->status == 1) {
            $statusSheet = 'Sold';
        }
        else if ($this->status == 2) {
            $statusSheet = 'Active';
        }
        return $statusSheet;
    }

    public function view(): View
    {
        $vouchers = GenerateVoucher::where(['partners_id' => $this->id, 'status' => $this->status])->get();

        return view('layout.export._excel_voucher', [
            'vouchers_data' => $vouchers
        ]);
    }

}
