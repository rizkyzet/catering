<?php

function customTanggal($date, $date_format)
{
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);
}

function customImagePath($image_name)
{
    return public_path('folder_kamu/sub_folder_kamu/' . $image_name);
}

function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
