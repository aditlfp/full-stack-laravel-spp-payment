<?php

use Illuminate\Support\Facades\Cache;

function toRupiah($angka)
{
    return "Rp.". number_format($angka, 0, ',',',');
}

function UploadImage($request, $NameFile)
{
    $file = $request->file($NameFile);
    $extensions = $file->getClientOriginalExtension();
    $rename = 'data' . time() . '.' . $extensions;
    $file->storeAs('images', $rename, 'public');

    return $rename;
}
