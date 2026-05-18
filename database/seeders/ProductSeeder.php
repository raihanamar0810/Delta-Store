<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $products = [
        // ── ML ──────────────────────────────────────────
        ['name' => 'Weekly Day Pass ML',    'category' => 'ml', 'price' => 27500],
        ['name' => 'Weekly Day Pass x2 ML', 'category' => 'ml', 'price' => 55000],
        ['name' => 'Weekly Day Pass x3 ML', 'category' => 'ml', 'price' => 82500],
        ['name' => 'Weekly Day Pass x4 ML', 'category' => 'ml', 'price' => 110000],
        ['name' => 'Weekly Day Pass x5 ML', 'category' => 'ml', 'price' => 137500],
        ['name' => 'Starlight Basic ML',    'category' => 'ml', 'price' => 37000],
        ['name' => 'Starlight Premium ML',  'category' => 'ml', 'price' => 76000],
        ['name' => '88 Diamond ML',         'category' => 'ml', 'price' => 23409],
        ['name' => '100 Diamond ML',        'category' => 'ml', 'price' => 25546],
        ['name' => '518 Diamond ML',        'category' => 'ml', 'price' => 132276],
        ['name' => '5 Diamond ML',          'category' => 'ml', 'price' => 1581],
        ['name' => '12 Diamond ML',         'category' => 'ml', 'price' => 3526],
        ['name' => '19 Diamond ML',         'category' => 'ml', 'price' => 5000],
        ['name' => '22 Diamond ML',         'category' => 'ml', 'price' => 5760],
        ['name' => '28 Diamond ML',         'category' => 'ml', 'price' => 7234],
        ['name' => '33 Diamond ML',         'category' => 'ml', 'price' => 9243],
        ['name' => '74 Diamond ML',         'category' => 'ml', 'price' => 19000],
        ['name' => '86 Diamond ML',         'category' => 'ml', 'price' => 21378],
        ['name' => '110 Diamond ML',        'category' => 'ml', 'price' => 28789],
        ['name' => '153 Diamond ML',        'category' => 'ml', 'price' => 39796],
        ['name' => '167 Diamond ML',        'category' => 'ml', 'price' => 43432],
        ['name' => '172 Diamond ML',        'category' => 'ml', 'price' => 44390],
        ['name' => '284 Diamond ML',        'category' => 'ml', 'price' => 73578],
        ['name' => '305 Diamond ML',        'category' => 'ml', 'price' => 79189],
        ['name' => '344 Diamond ML',        'category' => 'ml', 'price' => 88375],
        ['name' => '568 Diamond ML',        'category' => 'ml', 'price' => 152358],
        ['name' => '706 Diamond ML',        'category' => 'ml', 'price' => 175590],
        ['name' => '738 Diamond ML',        'category' => 'ml', 'price' => 185804],
        ['name' => '1050 Diamond ML',       'category' => 'ml', 'price' => 258590],
        ['name' => '1159 Diamond ML',       'category' => 'ml', 'price' => 286876],
        ['name' => '1220 Diamond ML',       'category' => 'ml', 'price' => 301721],
        ['name' => '2380 Diamond ML',       'category' => 'ml', 'price' => 564890],
        ['name' => '3688 Diamond ML',       'category' => 'ml', 'price' => 887409],
        ['name' => '4830 Diamond ML',       'category' => 'ml', 'price' => 1140567],
        ['name' => '7502 Diamond ML',       'category' => 'ml', 'price' => 1772009],
        ['name' => '8040 Diamond ML',       'category' => 'ml', 'price' => 1883984],
        ['name' => '8850 Diamond ML',       'category' => 'ml', 'price' => 2074769],
        ['name' => '16080 Diamond ML',      'category' => 'ml', 'price' => 3762615],
        ['name' => '20100 Diamond ML',      'category' => 'ml', 'price' => 4702717],
        ['name' => '27864 Diamond ML',      'category' => 'ml', 'price' => 6535092],

        // ── NETFLIX ─────────────────────────────────────
        ['name' => '1u1p Netflix',          'category' => 'netflix', 'price' => 27000],
        ['name' => '1u2p Netflix',          'category' => 'netflix', 'price' => 17000],
        ['name' => 'Private Netflix 720p',  'category' => 'netflix', 'price' => 125000],

        // ── SPOTIFY ─────────────────────────────────────
        ['name' => 'IndPlan Spotify',       'category' => 'spotify', 'price' => 21000],
        ['name' => 'Famplan Spotify',       'category' => 'spotify', 'price' => 17500],

        // ── CAPCUT ──────────────────────────────────────
        ['name' => 'Sharing Capcut',        'category' => 'capcut', 'price' => 10000],
        ['name' => 'Private Capcut',        'category' => 'capcut', 'price' => 23000],

        // ── YOUTUBE ─────────────────────────────────────
        ['name' => 'Family Plan Youtube',   'category' => 'youtube', 'price' => 5000],
        ['name' => 'Famhead Plan Youtube',  'category' => 'youtube', 'price' => 11000],

        // ── ALIGHT MOTION ───────────────────────────────
        ['name' => 'Private Alight Motion', 'category' => 'alight', 'price' => 5000],

        // ── TIKTOK ──────────────────────────────────────
        ['name' => '100 Followers TikTok',  'category' => 'tiktok', 'price' => 8000],
        ['name' => '200 Followers TikTok',  'category' => 'tiktok', 'price' => 16000],
        ['name' => '300 Followers TikTok',  'category' => 'tiktok', 'price' => 22000],
        ['name' => '400 Followers TikTok',  'category' => 'tiktok', 'price' => 28000],
        ['name' => '500 Followers TikTok',  'category' => 'tiktok', 'price' => 34000],
        ['name' => '1000 Followers TikTok', 'category' => 'tiktok', 'price' => 60000],
        ['name' => '100 Like TikTok',       'category' => 'tiktok', 'price' => 1000],
        ['name' => '200 Like TikTok',       'category' => 'tiktok', 'price' => 1500],
        ['name' => '300 Like TikTok',       'category' => 'tiktok', 'price' => 2000],
        ['name' => '400 Like TikTok',       'category' => 'tiktok', 'price' => 2500],
        ['name' => '500 Like TikTok',       'category' => 'tiktok', 'price' => 3000],
        ['name' => '1000 Like TikTok',      'category' => 'tiktok', 'price' => 3500],
        ['name' => '1000 View TikTok',      'category' => 'tiktok', 'price' => 2100],
        ['name' => '2000 View TikTok',      'category' => 'tiktok', 'price' => 3500],
        ['name' => '3000 View TikTok',      'category' => 'tiktok', 'price' => 5200],
        ['name' => '4000 View TikTok',      'category' => 'tiktok', 'price' => 6600],
        ['name' => '5000 View TikTok',      'category' => 'tiktok', 'price' => 8200],

        // ── FREE FIRE ────────────────────────────────────
        ['name' => 'Weekly Membership FF',  'category' => 'ff', 'price' => 28340],
        ['name' => 'Monthly Membership FF', 'category' => 'ff', 'price' => 84278],
        ['name' => '5 Diamond FF',          'category' => 'ff', 'price' => 989],
        ['name' => '12 Diamond FF',         'category' => 'ff', 'price' => 1897],
        ['name' => '20 Diamond FF',         'category' => 'ff', 'price' => 3550],
        ['name' => '30 Diamond FF',         'category' => 'ff', 'price' => 5189],
        ['name' => '40 Diamond FF',         'category' => 'ff', 'price' => 6600],
        ['name' => '55 Diamond FF',         'category' => 'ff', 'price' => 7570],
        ['name' => '60 Diamond FF',         'category' => 'ff', 'price' => 8407],
        ['name' => '70 Diamond FF',         'category' => 'ff', 'price' => 9076],
        ['name' => '80 Diamond FF',         'category' => 'ff', 'price' => 10879],
        ['name' => '90 Diamond FF',         'category' => 'ff', 'price' => 12389],
        ['name' => '100 Diamond FF',        'category' => 'ff', 'price' => 12987],
        ['name' => '120 Diamond FF',        'category' => 'ff', 'price' => 16245],
        ['name' => '130 Diamond FF',        'category' => 'ff', 'price' => 17245],
        ['name' => '140 Diamond FF',        'category' => 'ff', 'price' => 18240],
        ['name' => '150 Diamond FF',        'category' => 'ff', 'price' => 19635],
        ['name' => '170 Diamond FF',        'category' => 'ff', 'price' => 22078],
        ['name' => '190 Diamond FF',        'category' => 'ff', 'price' => 24389],
        ['name' => '200 Diamond FF',        'category' => 'ff', 'price' => 25899],
        ['name' => '250 Diamond FF',        'category' => 'ff', 'price' => 32489],
        ['name' => '260 Diamond FF',        'category' => 'ff', 'price' => 34389],
        ['name' => '355 Diamond FF',        'category' => 'ff', 'price' => 44243],
        ['name' => '360 Diamond FF',        'category' => 'ff', 'price' => 45089],
        ['name' => '375 Diamond FF',        'category' => 'ff', 'price' => 47590],
        ['name' => '405 Diamond FF',        'category' => 'ff', 'price' => 50906],
        ['name' => '425 Diamond FF',        'category' => 'ff', 'price' => 52998],
        ['name' => '455 Diamond FF',        'category' => 'ff', 'price' => 57000],
        ['name' => '495 Diamond FF',        'category' => 'ff', 'price' => 61765],
        ['name' => '510 Diamond FF',        'category' => 'ff', 'price' => 63467],
        ['name' => '515 Diamond FF',        'category' => 'ff', 'price' => 64897],
        ['name' => '545 Diamond FF',        'category' => 'ff', 'price' => 68498],
        ['name' => '600 Diamond FF',        'category' => 'ff', 'price' => 75290],
        ['name' => '635 Diamond FF',        'category' => 'ff', 'price' => 79488],
        ['name' => '720 Diamond FF',        'category' => 'ff', 'price' => 87356],
        ['name' => '740 Diamond FF',        'category' => 'ff', 'price' => 92278],
        ['name' => '770 Diamond FF',        'category' => 'ff', 'price' => 94589],
        ['name' => '790 Diamond FF',        'category' => 'ff', 'price' => 99000],
        ['name' => '860 Diamond FF',        'category' => 'ff', 'price' => 105128],
        ['name' => '930 Diamond FF',        'category' => 'ff', 'price' => 118578],
        ['name' => '1050 Diamond FF',       'category' => 'ff', 'price' => 129589],
        ['name' => '1075 Diamond FF',       'category' => 'ff', 'price' => 136487],
        ['name' => '1200 Diamond FF',       'category' => 'ff', 'price' => 144478],
        ['name' => '1220 Diamond FF',       'category' => 'ff', 'price' => 301721],
        ['name' => '1440 Diamond FF',       'category' => 'ff', 'price' => 178578],
        ['name' => '2140 Diamond FF',       'category' => 'ff', 'price' => 265000],
        ['name' => '2720 Diamond FF',       'category' => 'ff', 'price' => 339000],
        ['name' => '3640 Diamond FF',       'category' => 'ff', 'price' => 439356],
        ['name' => '4000 Diamond FF',       'category' => 'ff', 'price' => 486980],
        ['name' => '7290 Diamond FF',       'category' => 'ff', 'price' => 893255],
        ['name' => '73100 Diamond FF',      'category' => 'ff', 'price' => 8200000],
    ];

    foreach ($products as $product) {
        \App\Models\Product::create($product);
    }
}
}
