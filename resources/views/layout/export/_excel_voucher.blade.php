
<!--begin: Datatable-->
<table class="datatable datatable-borderless">
<thead>
<tr>
    <th style="font-weight:bold">#</th>
    <th style="font-weight:bold">Name</th>
    <th style="font-weight:bold">Voucher Key</th>
    <th style="font-weight:bold">Serial Number</th>
    <th style="font-weight:bold">Type</th>
</tr>
</thead>
<tbody>
@php
    $num = 0
@endphp
@foreach ($vouchers_data as $voucher)
<tr>
    <td>{{ $num+=1 }}</td>
    <td>{{ $voucher->partners->users->name }}</td>
    <td>{{ $voucher->voucher_key }}</td>
    <td>{{ $voucher->serial_number }}</td>
    <td>{{ $voucher->type }}</td>
</tr>
@endforeach
</tbody>
</table>
<!--end: Datatable-->
                                                