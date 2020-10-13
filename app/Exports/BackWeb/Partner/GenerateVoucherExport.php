<?php

namespace App\Exports\BackWeb\Partner;

use App\BackWeb\Partner\GenerateVoucher;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;

class GenerateVoucherExport implements FromView, ShouldAutoSize, WithTitle
{

    use Exportable;

    public function forParam(int $id, string $created_at)
    {
        $this->id = $id;
        $this->created_at = $created_at;

        return $this;
    }

    public function title(): string
    {
        return 'In-Active';
    }

    public function view(): View
    {
        $vouchers = GenerateVoucher::where(['partners_id' => $this->id, 'created_at' => $this->created_at])->get();

        return view('layout.export._excel_voucher', [
            'vouchers_data' => $vouchers
        ]);
    }

}
