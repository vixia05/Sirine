<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\dataPcht;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class UpdatePcht implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            // dd($row);
            dataPcht::updateOrCreate(
                [ 'no_obc' => $row['no_obc'],'no_po' => (int)$row['no_po']],
                [
                'jenis'         => $row['perso_non_perso'],
                'seri'          => (int)$row['seri'],
                'tgl_obc'       =>  Date::excelToDateTimeObject($row['tgl_obc']),
                'tgl_jtempo'    =>  Date::excelToDateTimeObject($row['tgl_jtempo']),
                'tgl_pakai_bb'  =>  Date::excelToDateTimeObject($row['tgl_pakai_bb']),
                'tgl_cetak'     =>  Date::excelToDateTimeObject($row['tgl_cetak']),
                'tgl_verifikasi'=>  Date::excelToDateTimeObject($row['tgl_verifikasi']),
                'tgl_kemas'     =>  Date::excelToDateTimeObject($row['tanggal_kemas']),
                'qty_pesan'     => (int)$row['qty_pesan'],
                'rencet'        => $row['rencet'],
                'jml_bb'        => $row['jml_bb_lk'],
                'jml_cd'        => $row['jlm_cd_lk'],
                'total_bb'      => $row['total_bb_lk'],
                'jml_cetak'     => $row['jml_cetak'],
                'baik_verifikasi'   => $row['baik_verifikasi'],
                'rusak_verifikasi'  => $row['rusak_verifikasi'],
                'baik_hcts'     => $row['hasil_baik_dijadikan_hcts'],
                'total_hcts'    => $row['total_hcts'],
                'kemas'         => $row['kemas'],
                'kirim'         => (int)$row['kirim'],
            ]);
        }

        return redirect()->back();
    }

     /**
     * @return int
     */
    public function headingRow(): int
    {
        return 1;
    }
}
