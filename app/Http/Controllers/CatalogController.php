<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function showPackage($id)
    {
        $package = (object) [
            'id' => $id,
            'title' => 'Modern Minimalis',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in orci eget dui tincidunt vehicula a ac ligula. Quisque vitae dignissim orci.',
            'images' => [
                (object) ['url' => 'https://picsum.photos/300/200?random=1'],
                (object) ['url' => 'https://picsum.photos/300/200?random=2'],
                (object) ['url' => 'https://picsum.photos/300/200?random=3'],
                (object) ['url' => 'https://picsum.photos/300/200?random=4']
            ],
            'price' => 999999999
        ];
        return view('catalog.package-detail', compact('package'));
    }

    public function showDesign($id)
    {
        $design = (object) [
            'id' => $id,
            'title' => 'Rumah Kontemporer',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in orci eget dui tincidunt vehicula a ac ligula.',
            'images' => [
                (object) ['url' => 'https://picsum.photos/300/200?random=1'],
                (object) ['url' => 'https://picsum.photos/300/200?random=2'],
                (object) ['url' => 'https://picsum.photos/300/200?random=3'],
                (object) ['url' => 'https://picsum.photos/300/200?random=4']
            ],
            'price' => 850000000
        ];
        return view('catalog.design-detail', compact('design'));
    }
}
