<?php

function alamat_website()
{
    echo base_url();
}

function rupiah($angka)
{
    return "Rp " . number_format($angka,0,',','.');
}