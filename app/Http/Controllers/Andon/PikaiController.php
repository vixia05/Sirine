<?php

namespace App\Http\Controllers\Andon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pengiriman_pikai;
use App\Models\pcht;
use App\Models\mmea;
use Carbon\Carbon;
use Auth;

class PikaiController extends Controller
{


// ** --------------------------------- Start Section Index Pita Cukai --------------------------------- */

    public function index()
    {

    // ** Start Fungsi Status PCHT */
        $today = carbon::today();
        $now = pcht::whereMonth('tgl_obc','=',$today);
        $order_pcht = pcht::whereMonth('tgl_obc','=',$today)
                        ->get()
                        ->unique('no_obc')
                        ->sum('qty_pesan');

        // ** Sum Total Pcht */

            $bb_pcht = $now->sum('total_bb');
            $kemas_pcht = $now->sum('kemas');
            $rencet_pcht = $now->sum('rencet');
            $cetak_pcht = $now->sum('jml_cetak');
            $verif_pcht = $now->sum('baik_verifikasi') + $now->sum('rusak_verifikasi');

        // ** ---------------------- */

        // ** Persentase PCHT */
            if($bb_pcht != 0 || $rencet_pcht != 0 || $kemas_pcht != 0 || $order_pcht != 0 || $cetak_pcht != 0 || $verif_pcht != 0)
            {
                $progres_bb = $bb_pcht / $rencet_pcht * 100;
                $progres_kemas = $kemas_pcht / $order_pcht * 100;
                $progres_cetak = $cetak_pcht / $rencet_pcht * 100;
                $progres_verif = $verif_pcht / $rencet_pcht * 100;
            }
            else
            {
                $progres_bb = 100;
                $progres_kemas = 100;
                $progres_cetak = 100;
                $progres_verif = 100;

            }

        // ** ---------------------- */

    // ** End Fungsi Status PCHT */

    // ** ---------------------------------------------------- */

    // ** Start Fungsi Status MMEA & HPTL */

        $now = mmea::whereMonth('tgl_obc','=',$today);
        $order_mmea = mmea::whereMonth('tgl_obc','=',$today)
                        ->get()
                        ->unique('no_obc')
                        ->sum('qty_pesan');

        // ** Sum Total MMEA & HPTL */

            $bb_mmea = $now->sum('total_bb');
            $kemas_mmea = $now->sum('kemas');
            $rencet_mmea = $now->sum('rencet');
            $cetak_mmea = $now->sum('jml_cetak');
            $verif_mmea = $now->sum('baik_verifikasi') + $now->sum('rusak_verifikasi');

        // ** ---------------------- */

        // ** Persentase MMEA & HPTL */

        if($bb_mmea != 0 || $rencet_mmea != 0 || $kemas_mmea != 0 || $order_mmea != 0 || $cetak_mmea != 0 || $verif_mmea != 0)
        {
            $progres_bb_mmea = $bb_mmea / $rencet_mmea * 100;
            $progres_kemas_mmea = $kemas_mmea / $order_mmea * 100;
            $progres_cetak_mmea = $cetak_mmea / $rencet_mmea * 100;
            $progres_verif_mmea = $verif_mmea / $rencet_mmea * 100;
        }
        else
        {
            $progres_bb_mmea = 100;
            $progres_kemas_mmea = 100;
            $progres_cetak_mmea = 100;
            $progres_verif_mmea = 100;

        }
        // ** ---------------------- */

    // ** End Fungsi Status MMEA & HPTL */

    // ** --------------------------------------------------------- */


    $sumd7p = pcht::whereDate('tgl_verifikasi','=',$today->subdays(0))->sum('rencet');
    $sumd6p = pcht::whereDate('tgl_verifikasi','=',$today->subdays())->sum('rencet');
    $sumd5p = pcht::whereDate('tgl_verifikasi','=',$today->subdays())->sum('rencet');
    $sumd4p = pcht::whereDate('tgl_verifikasi','=',$today->subdays())->sum('rencet');
    $sumd3p = pcht::whereDate('tgl_verifikasi','=',$today->subdays())->sum('rencet');
    $sumd2p = pcht::whereDate('tgl_verifikasi','=',$today->subdays())->sum('rencet');
    $sumd1p = pcht::whereDate('tgl_verifikasi','=',$today->subdays())->sum('rencet');

    // $test = ;
        //  dd($order_pcht);

        return view('andon.pita-cukai.dashboard',[  'bb_pcht' => $bb_pcht,
                                                    'cetak_pcht' => $cetak_pcht,
                                                    'verif_pcht' => $verif_pcht,
                                                    'kemas_pcht' => $kemas_pcht,
                                                    'rencet_pcht' => $rencet_pcht,
                                                    'progres_bb' => $progres_bb,
                                                    'progres_kemas' => $progres_kemas,
                                                    'progres_cetak' => $progres_cetak,
                                                    'progres_verif' => $progres_verif,
                                                    'bb_mmea' => $bb_mmea,
                                                    'cetak_mmea' => $cetak_mmea,
                                                    'verif_mmea' => $verif_mmea,
                                                    'kemas_mmea' => $kemas_mmea,
                                                    'rencet_mmea' => $rencet_mmea,
                                                    'progres_bb_mmea' => $progres_bb_mmea,
                                                    'progres_kemas_mmea' => $progres_kemas_mmea,
                                                    'progres_cetak_mmea' => $progres_cetak_mmea,
                                                    'progres_verif_mmea' => $progres_verif_mmea,
                                                 ]);
    }

//** --------------------------------- End Section Index Pita Cukai --------------------------------- */


// ** --------------------------------- Start Section Verifikasi Pita Cukai --------------------------------- */

    public function verifikasi()
    {

    // ** Start Fungsi Verifikasi PCHT */
        $today = Carbon::today();

        // ** Verifikasi Harian PCHT */

            $now_pcht = pcht::where('tgl_verifikasi','=',carbon::today());

            // ** Sum PCHT Harian */

                $inschiet_pcht = 0;
                $rencet_pcht = $now_pcht->sum('rencet');
                $baik_pcht = $now_pcht->sum('baik_verifikasi');
                $rusak_pcht = $now_pcht->sum('rusak_verifikasi');

                    if($baik_pcht > 0 || $rusak_pcht > 0 )
                    {
                        $inschiet_pcht = $rusak_pcht / $baik_pcht * 100;
                    }
                    else
                    {
                        $inschiet_pcht = 0;
                    }

        // ** Verifikasi Bulanan PCHT */

            $month_pcht = pcht::whereMonth('tgl_obc','=',$today)
                            ->whereYear('tgl_obc','=',$today);

            // ** Sum PCHT Bulanan */

                $inschiet_pcht_month = 0;
                $rencet_pcht_month = $month_pcht->sum('rencet');
                $baik_pcht_month = $month_pcht->sum('baik_verifikasi');
                $rusak_pcht_month = $month_pcht->sum('rusak_verifikasi');
                $sisa_pcht_month = $rencet_pcht_month - ($baik_pcht_month + $rusak_pcht_month);

                    if($baik_pcht_month > 0 || $rusak_pcht_month > 0 )
                    {
                        $inschiet_pcht_month = $rusak_pcht_month / $baik_pcht_month * 100;
                    }
                    else
                    {
                        $inschiet_pcht = 0;
                    }

        // ** Start Chart Verifikasi PCHT */
            // ** Tanggal Chart //
                $day = Carbon::now();
                $day1 = pcht::whereDay('tgl_verifikasi','=',$day);
                $day2 = pcht::whereDay('tgl_verifikasi','=',$day->subday());
                $day3 = pcht::whereDay('tgl_verifikasi','=',$day->subday());
                $day4 = pcht::whereDay('tgl_verifikasi','=',$day->subday());
                $day5 = pcht::whereDay('tgl_verifikasi','=',$day->subday());
                $day6 = pcht::whereDay('tgl_verifikasi','=',$day->subday());
                $day7 = pcht::whereDay('tgl_verifikasi','=',$day->subday());

            //** Rencet Dalam Seminggu */
                $renpd1 = $day1->sum('rencet');
                $renpd2 = $day2->sum('rencet');
                $renpd3 = $day3->sum('rencet');
                $renpd4 = $day4->sum('rencet');
                $renpd5 = $day5->sum('rencet');
                $renpd6 = $day6->sum('rencet');
                $renpd7 = $day7->sum('rencet');

            //** Inschiet Dalam Seminggu */
                if($renpd1 > 0)
                    {$inscpd1 = $day1->sum('rusak_verifikasi') / $day1->sum('baik_verifikasi') * 100;}
                else
                    {$inscpd1 = 0;}
                if($renpd2 > 0)
                    {$inscpd2 = $day2->sum('rusak_verifikasi') / $day2->sum('baik_verifikasi') * 100;}
                else
                    {$inscpd2 = 0;}
                if($renpd3 > 0)
                    {$inscpd3 = $day3->sum('rusak_verifikasi') / $day3->sum('baik_verifikasi') * 100;}
                else
                    {$inscpd3 = 0;}
                if($renpd4 > 0)
                    {$inscpd4 = $day4->sum('rusak_verifikasi') / $day4->sum('baik_verifikasi') * 100;}
                else
                    {$inscpd4 = 0;}
                if($renpd5 > 0)
                    {$inscpd5 = $day5->sum('rusak_verifikasi') / $day5->sum('baik_verifikasi') * 100;}
                else
                    {$inscpd5 = 0;}
                if($renpd6 > 0)
                    {$inscpd6 = $day6->sum('rusak_verifikasi') / $day6->sum('baik_verifikasi') * 100;}
                else
                    {$inscpd6 = 0;}
                if($renpd7 > 0)
                    {$inscpd7 = $day7->sum('rusak_verifikasi') / $day7->sum('baik_verifikasi') * 100;}
                else
                    {$inscpd7 = 0;}


            $sum_chp = [$renpd7,$renpd6,$renpd5,$renpd4,$renpd3,$renpd2,$renpd1]; // Sum Harian Untuk Chart

            $inschiet_chp = [number_format($inscpd7,2),
                             number_format($inscpd6,2),
                             number_format($inscpd5,2),
                             number_format($inscpd4,2),
                             number_format($inscpd3,2),
                             number_format($inscpd2,2),
                             number_format($inscpd1,2)]; // Persentase Inschiet harian

        // ** End Chart Verifikasi PCHT */

        //** WIP Siap Periksa PCHT */
            $wip = $month_pcht->whereDate('tgl_verifikasi','=','1970-01-01')->get();

            $wip_pcht = $wip->sum('jml_cetak');

            $wip_p = $wip->where('jenis','=','P')
                        ->sum('jml_cetak');

            $wip_np = $wip->where('jenis','=','NP')
                         ->sum('jml_cetak');

    // ** End Fungsi Verifikasi PCHT */

    // ** -------------------------------------------------------------- */

    // ** Start Fungsi Verifikasi MMEA */

        //** Verifikasi Harian MMEA & HPTL */

            $now_mmea = mmea::where('tgl_verifikasi','=',carbon::today());

            // ** Sum MMEA */

                $inschiet_mmea = 0;
                $rencet_mmea = $now_mmea->sum('rencet');
                $baik_mmea = $now_mmea->sum('baik_verifikasi');
                $rusak_mmea = $now_mmea->sum('rusak_verifikasi');

                    if($baik_mmea > 0 || $rusak_mmea > 0 )
                    {
                        $inschiet_mmea = $rusak_mmea / $baik_mmea * 100;
                    }
                    else
                    {
                        $inschiet_mmea = 0;
                    }

        // ** Verifikasi Bulanan MMEA & HPTL */

            $month_mmea = mmea::whereMonth('tgl_obc','=', $today)
                            ->whereYear('tgl_obc','=',$today);

            // ** Sum MMEA & HPTL Bulanan */

                $inschiet_mmea_month = 0;
                $rencet_mmea_month = $month_mmea->sum('rencet');
                $baik_mmea_month = $month_mmea->sum('baik_verifikasi');
                $rusak_mmea_month = $month_mmea->sum('rusak_verifikasi');
                $sisa_mmea_month = $rencet_mmea_month - ($baik_mmea_month + $rusak_mmea_month);

                    if($baik_mmea_month > 0 || $rusak_mmea_month > 0 )
                    {
                        $inschiet_mmea_month = $rusak_mmea_month / $baik_mmea_month * 100;
                    }
                    else
                    {
                        $inschiet_mmea_month = 0;
                    }

        // ** Chart Verifikasi MMEA & HPTL */


            $d7m = $day->subdays(-6)->toDate()->format('d-M');
            $d6m = $day->subdays()->toDate()->format('d-M');
            $d5m = $day->subdays()->toDate()->format('d-M');
            $d4m = $day->subdays()->toDate()->format('d-M');
            $d3m = $day->subdays()->toDate()->format('d-M');
            $d2m = $day->subdays()->toDate()->format('d-M');
            $d1m = $day->subdays()->toDate()->format('d-M');

            $date_chm = [$d1m,$d2m,$d3m,$d4m,$d5m,$d6m,$d7m]; // label tanggal chart

            $sumd7m = mmea::whereDate('tgl_verifikasi','=',$day->subdays(-6))->sum('rencet');
            $sumd6m = mmea::whereDate('tgl_verifikasi','=',$day->subdays())->sum('rencet');
            $sumd5m = mmea::whereDate('tgl_verifikasi','=',$day->subdays())->sum('rencet');
            $sumd4m = mmea::whereDate('tgl_verifikasi','=',$day->subdays())->sum('rencet');
            $sumd3m = mmea::whereDate('tgl_verifikasi','=',$day->subdays())->sum('rencet');
            $sumd2m = mmea::whereDate('tgl_verifikasi','=',$day->subdays())->sum('rencet');
            $sumd1m = mmea::whereDate('tgl_verifikasi','=',$day->subdays())->sum('rencet');

            $sum_chm = [$sumd1m,$sumd2m,$sumd3m,$sumd4m,$sumd5m,$sumd6m,$sumd7m];

        //** WIP Siap Periksa MMEA */
            $wip = $month_mmea->whereDate('tgl_verifikasi','=','1970-01-01')->get();

            $wip_mmhp = $wip->sum('jml_cetak');

            $wip_mmea = $wip->where('jenis','=','P')
                        ->sum('jml_cetak');

            $wip_hptl = $wip->where('jenis','=','NP')
                         ->sum('jml_cetak');

    // ** End Fungsi Verifikasi MMEA */

    //  dump($wip_np);

    // ** --------------------------------------------------------- */
        return view('andon.pita-cukai.verifikasi',[
                                                    'wip_p' => $wip_p,
                                                    'wip_np' => $wip_np,
                                                    'wip_pcht' => $wip_pcht,
                                                    'wip_mmea' => $wip_mmea,
                                                    'wip_hptl' => $wip_hptl,
                                                    'wip_mmhp' => $wip_mmhp,
                                                    'sum_chm' => $sum_chm,
                                                    'sum_chp' => $sum_chp,
                                                    'date_chm' => $date_chm,
                                                    'baik_pcht' => $baik_pcht,
                                                    'baik_mmea' => $baik_mmea,
                                                    'rusak_pcht' => $rusak_pcht,
                                                    'rusak_mmea' => $rusak_mmea,
                                                    'rencet_pcht' => $rencet_pcht,
                                                    'rencet_mmea' => $rencet_mmea,
                                                    'inschiet_chp' => $inschiet_chp,
                                                    'inschiet_pcht' => $inschiet_pcht,
                                                    'inschiet_mmea' => $inschiet_mmea,
                                                    'sisa_pcht_month' => $sisa_pcht_month,
                                                    'sisa_mmea_month' => $sisa_mmea_month,
                                                    'baik_pcht_month' => $baik_pcht_month,
                                                    'baik_mmea_month' => $baik_mmea_month,
                                                    'rusak_pcht_month' => $rusak_pcht_month,
                                                    'rusak_mmea_month' => $rusak_mmea_month,
                                                    'rencet_pcht_month' => $rencet_pcht_month,
                                                    'rencet_mmea_month' => $rencet_mmea_month,
                                                    'inschiet_pcht_month' => $inschiet_pcht_month,
                                                    'inschiet_mmea_month' => $inschiet_mmea_month,
        ]);
    }

//** --------------------------------- End Section Verifikasi --------------------------------- */

// ** --------------------------------- Start Section Cetak Pita Cukai --------------------------------- */
    public function cetak()
    {
        $day    = Carbon::now();
        $startM = new carbon('first day of month');
        $endM   = new carbon('last day of month');

        $totalRenPC   = pcht::whereBetween('tgl_obc',array($startM,$endM))->sum('rencet');
        dd($endM);

        return view('andon.pita-cukai.cetak',[
            'totalRenPc' => $totalRenPC,
        ]);
    }

//** --------------------------------- End Section Cerak Pita Cukai --------------------------------- */

// ** --------------------------------- Start Section Khazanah Akhir Pita Cukai --------------------------------- */
    public function khazkhir()
    {
        // ** Date */
            $day = Carbon::today();

        // ** Start Function Kemas */
            //** Kemas PCHT */
                $kemas_pcht = pcht::whereDate('tgl_kemas','=',$day)->sum('kemas');

                $kemas_np = pcht::where('jenis','=','np')
                                ->whereDate('tgl_kemas','=',$day)
                                ->sum('kemas');

                $kemas_p = pcht::where('jenis','=','p')
                                ->whereDate('tgl_kemas','=',$day)
                                ->sum('kemas');

            //** Kemas MMEA & HPTL */
                $kemas_mmhp = mmea::whereDate('tgl_kemas','=',$day)->sum('kemas');

                $kemas_mmea = mmea::whereDate('tgl_kemas','=',$day)
                                ->where('jenis','=','P')
                                ->sum('kemas');

                $kemas_hptl = mmea::where('jenis','=','NP')
                                ->whereDate('tgl_kemas','=',$day)
                                ->sum('kemas');

        //** Start Function Pengiriman Pita Cukai */

            $kirim = pengiriman_pikai::where('tgl_kirim','=',$day);
            $kirim_month = pengiriman_pikai::whereMonth('tgl_kirim','=',$day);

            //** Pengiriman PCHT */

                $kirim_p = $kirim->sum('kirim_p');      // Sum Kirim Harian Personal
                $kirim_np = $kirim->sum('kirim_np');    // Sum Kirim Harian Non-Personal
                $kirim_pcht = $kirim_p + $kirim_np;     // Total Kirim Harian Pita Cukai Hasil Tembakau

                $kirim_pM = $kirim_month->sum('kirim_p');   // Sum Kirim Bulanan Personal
                $kirim_npM = $kirim_month->sum('kirim_np'); // Sum Kirim Bulanan Non-Personal
                $kirim_pchtM = $kirim_pM + $kirim_npM;      // Total Kirim Bulanan Pita Cukai Hasil Tembakau

            //** Pengiriman MMEA & HPTL */

                $kirim_mmea = $kirim->sum('kirim_mmea'); // Sum Kirim Harian MMEA
                $kirim_hptl = $kirim->sum('kirim_hptl'); // Sum Kirim Harian HPTL
                $kirim_mmhp = $kirim_mmea + $kirim_hptl; // Total Kirim Harian MMEA & HPTL

                $kirim_mmeaM = $kirim_month->sum('kirim_mmea'); // Sum Kirim Bulanan MMEA
                $kirim_hptlM = $kirim_month->sum('kirim_hptl'); // Sum Kirim Bulanan HPTL
                $kirim_mmhpM = $kirim_mmeaM + $kirim_hptlM;     // Sum Kirim Bulanan MMEA & HPTL


        //** Start Function Total Order */
            //** Total Order PCHT */

                $pcht = pcht::whereMonth('tgl_obc','=',$day)
                            ->get()
                            ->unique('no_obc'); // Get Data Bulanan

                $pesanan_pcht = $pcht->sum('qty_pesan');    // Sum Total Order PCHT

                $order_p = $pcht->where('jenis','=','P')    // Sum Order P
                                ->sum('qty_pesan');

                $order_np = $pcht->where('jenis','=','NP')  // Sum Order NP
                                ->sum('qty_pesan');

                //** Total Order MMEA & HPTL */
                $mmea = mmea::whereMonth('tgl_obc','=',6)
                            ->whereYear('tgl_obc',2022)
                            ->get()
                            ->unique('no_obc');

                $pesanan_mmea = $mmea->sum('qty_pesan');      // Sum Total Order MMEA & HPTL

                $order_mmea = $mmea->where('jenis','=','P')   // Sum Order MMEA
                                ->sum('qty_pesan');

                $order_hptl = $mmea->where('jenis','=','NP')   // Sum Order HPTL
                                ->sum('qty_pesan');

            //** Progress Order PCHT */
                // Sisa Order Personal
                $sisa_personal = $kirim_pM - $order_p ;

                    if($kirim_pM < 1)
                     {
                        $persentase_personal = 0;
                     }
                    else
                     {
                        $persentase_personal = $kirim_pM / $order_p * 100;
                     }
                    // Sisa Order Non Personal
                    $sisa_npersonal = $kirim_npM - $order_np ;

                    if($kirim_npM < 1)
                     {
                        $persentase_npersonal = 0;
                     }
                    else
                     {
                        $persentase_npersonal = $kirim_npM / $order_np * 100;
                     }

                    //** Progress Order MMEA */
                    $sisa_mmea = $kirim_mmeaM - $pesanan_mmea;

                    if($kirim_mmeaM < 1)
                     {
                        $persentase_mmea = 0;
                     }
                    else
                     {
                        $persentase_mmea = $kirim_mmeaM / $pesanan_mmea * 100;
                     }

                //** Komposisi Pengiriman PCHT */
                  //** Komposisi Pengiriman Personal */
                    if(number_format($order_p - $kirim_pM + $kirim_p) < 600000 )
                        {
                            $komp_p = $kirim_p - 200000;
                        }
                    else
                        {
                            $komp_p = 0;
                        }

                  //** Komposisi Pengiriman Non - Personal */
                    if(number_format($order_np - $kirim_npM + $kirim_np) < 1680000 )
                        {
                            $komp_np = $kirim_np - 560000;
                        }
                    else
                        {
                            $komp_np = 0;
                        }

                  // Persentase Komposisi Kirim Personal

                    if($kirim_p > 0 && $komp_p != 0)
                      {
                          $prog_p = ($kirim_p / 200000) * 100;
                      }

                    else
                      {
                          $prog_p = 0;
                      }

                  // Persentase Komposisi Kirim Non - Personal

                    if($kirim_np > 0 && $komp_np != 0)
                      {
                          $prog_np = ($kirim_np / 560000) * 100;
                      }
                    else
                      {
                          $prog_np = 0;
                      }

                //** Komposisi Pengiriman MMEA */

                    if(number_format($order_mmea - $kirim_mmhpM + $kirim_mmhp) < 39000 )
                        {
                            $komp_mmea = $kirim_mmhp - 13000;
                        }
                    else
                        {
                            $komp_mmhp = 0;
                        }

                    // Persentase Komposisi Kirim MMEA

                        if($kirim_mmhp > 0 && $komp_mmea != 0)
                            {
                                $prog_mmea = ($kirim_mmhp / 13000) * 100;
                            }

                        else
                            {
                                $prog_mmea = 0;
                            }
        // dd($komp_np);
        return view('andon.pita-cukai.khazkhir',[
                                                 'day' => $day,
                                                 'order_p' => $order_p,
                                                 'kemas_p' => $kemas_p,
                                                 'kirim_p' => $kirim_p,
                                                 'order_np' => $order_np,
                                                 'kemas_np' => $kemas_np,
                                                 'kirim_np' => $kirim_np,
                                                 'kirim_pM' => $kirim_pM,
                                                 'kirim_npM' => $kirim_npM,
                                                 'sisa_mmea' => $sisa_mmea,
                                                 'kemas_pcht' => $kemas_pcht,
                                                 'kemas_mmhp' => $kemas_mmhp,
                                                 'kirim_mmhp' => $kirim_mmhp,
                                                 'kirim_pcht' => $kirim_pcht,
                                                 'order_mmea' => $order_mmea,
                                                 'kemas_mmea' => $kemas_mmea,
                                                 'kirim_mmea' => $kirim_mmea,
                                                 'order_hptl' => $order_hptl,
                                                 'kemas_hptl' => $kemas_hptl,
                                                 'kirim_hptl' => $kirim_hptl,
                                                 'kirim_pchtM' => $kirim_pchtM,
                                                 'kirim_mmhpM' => $kirim_mmhpM,
                                                 'kirim_mmeaM' => $kirim_mmeaM,
                                                 'kirim_hptlM' => $kirim_hptlM,
                                                 'pesanan_pcht' => $pesanan_pcht,
                                                 'pesanan_mmea' => $pesanan_mmea,
                                                 'progress_mmea' => $prog_mmea,
                                                 'komposisi_mmea' => $komp_mmea,
                                                 'progress_personal' => $prog_p,
                                                 'komposisi_personal' => $komp_p,
                                                 'progress_npersonal' => $prog_np,
                                                 'komposisi_npersonal' => $komp_np,
                                                 'sisa_personal' => $sisa_personal,
                                                 'sisa_npersonal' => $sisa_npersonal,
                                                 'persentase_mmea' => $persentase_mmea,
                                                 'persentase_personal' => $persentase_personal,
                                                 'persentase_npersonal' => $persentase_npersonal,
        ]);
    }

//** --------------------------------- End Section Cetak Pita Cukai --------------------------------- */
}
