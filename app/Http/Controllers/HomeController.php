<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $carouselItems = [
            [
                'title' => 'Modern House',
                'description' => 'Desain rumah modern sangat bagus',
                'image' => 'https://picsum.photos/600/400?random=1',
            ],
            [
                'title' => 'Classic House',
                'description' => 'Desain rumah klasik yang elegan',
                'image' => 'https://picsum.photos/600/400?random=2',
            ],
            [
                'title' => 'Luxury House',
                'description' => 'Desain rumah mewah dan modern',
                'image' => 'https://picsum.photos/600/400?random=3',
            ]
        ];

        // Dummy data for recommendations (replace with DB query)
        $recommendations = collect([
            [
                'id' => 1,
                'title' => 'Desain 1',
                'image' => 'https://picsum.photos/300/200?random=4',
            ],
            [
                'id' => 2,
                'title' => 'Desain 2',
                'image' => 'https://picsum.photos/300/200?random=5',
            ],
            [
                'id' => 3,
                'title' => 'Desain 3',
                'image' => 'https://picsum.photos/300/200?random=6',
            ]
        ]);

        // Dummy data for Why Choose Us section
        $whyChooseUs = [
            [
                'icon' => 'https://picsum.photos/50/50?random=1',
                'title' => 'Quality Service',
                'description' => 'We provide high-quality services to meet your expectations.'
            ],
            [
                'icon' => 'https://picsum.photos/50/50?random=2',
                'title' => 'Professional Team',
                'description' => 'Our team consists of experienced professionals.'
            ],
            [
                'icon' => 'https://picsum.photos/50/50?random=3',
                'title' => 'Affordable Pricing',
                'description' => 'We offer competitive pricing without compromising on quality.'
            ],
            [
                'icon' => 'https://picsum.photos/50/50?random=4',
                'title' => '24/7 Support',
                'description' => 'We are available round the clock to assist you.'
            ]
        ];

        // Dummy data for Design Packages section
        $designPackages = [
            [
                'id' => 1,
                'title' => 'Design Package 1',
                'image' => 'https://picsum.photos/300/200?random=1'
            ],
            [
                'id' => 2,
                'title' => 'Design Package 2',
                'image' => 'https://picsum.photos/300/200?random=2'
            ],
            [
                'id' => 3,
                'title' => 'Design Package 3',
                'image' => 'https://picsum.photos/300/200?random=3'
            ],
            [
                'id' => 4,
                'title' => 'Design Package 4',
                'image' => 'https://picsum.photos/300/200?random=4'
            ],
            [
                'id' => 5,
                'title' => 'Design Package 5',
                'image' => 'https://picsum.photos/300/200?random=5'
            ],
            [
                'id' => 6,
                'title' => 'Design Package 6',
                'image' => 'https://picsum.photos/300/200?random=6'
            ]
        ];

        // Dummy data for Layanan Kamisection
        $layananKami = [
            [
                'icon' => 'https://picsum.photos/50/50?random=1',
                'title' => 'Desain 3D Siap Pakai'
            ],
            [
                'icon' => 'https://picsum.photos/50/50?random=2',
                'title' => 'Rancangan Biaya Terbaru'
            ],
            [
                'icon' => 'https://picsum.photos/50/50?random=3',
                'title' => 'Desain 3D Siap Pakai'
            ],
            [
                'icon' => 'https://picsum.photos/50/50?random=4',
                'title' => 'Rancangan Biaya Terbaru'
            ],
            [
                'icon' => 'https://picsum.photos/50/50?random=5',
                'title' => 'Desain 3D Siap Pakai'
            ],
            [
                'icon' => 'https://picsum.photos/50/50?random=6',
                'title' => 'Rancangan Biaya Terbaru'
            ]
        ];

        // Dummy data for Latest Projects section
        $latestProjects = [
            [
                'id' => 1,
                'title' => 'Project 1',
                'image' => 'https://picsum.photos/300/200?random=7'
            ],
            [
                'id' => 2,
                'title' => 'Project 2',
                'image' => 'https://picsum.photos/300/200?random=8'
            ],
            [
                'id' => 3,
                'title' => 'Project 3',
                'image' => 'https://picsum.photos/300/200?random=9'
            ],
            [
                'id' => 4,
                'title' => 'Project 4',
                'image' => 'https://picsum.photos/300/200?random=10'
            ],
            [
                'id' => 5,
                'title' => 'Project 5',
                'image' => 'https://picsum.photos/300/200?random=11'
            ],
            [
                'id' => 6,
                'title' => 'Project 6',
                'image' => 'https://picsum.photos/300/200?random=12'
            ]
        ];

        $testimonials = [
            [
                'name' => 'John Doe',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in orci eget dui tincidunt vehicula a ac ligula.',
                'image' => 'https://picsum.photos/200/150?random=1'
            ],
            [
                'name' => 'Jane Smith',
                'text' => 'Quisque vitae dignissim orci. nec rhoncus metus. Proin et tincidunt enim, ut ornare quam.',
                'image' => 'https://picsum.photos/200/150?random=2'
            ],
            [
                'name' => 'Alice Brown',
                'text' => 'Suspendisse eu magna mollis, consectetur dui eu, vehicula erat.',
                'image' => 'https://picsum.photos/200/150?random=3'
            ]
        ];

        $faqs = [
            ['question' => 'Lorem ipsum dolor sit amet?', 'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['question' => 'Lorem ipsum dolor sit amet?', 'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['question' => 'Lorem ipsum dolor sit amet?', 'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['question' => 'Lorem ipsum dolor sit amet?', 'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['question' => 'Lorem ipsum dolor sit amet?', 'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['question' => 'Lorem ipsum dolor sit amet?', 'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['question' => 'Lorem ipsum dolor sit amet?', 'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['question' => 'Lorem ipsum dolor sit amet?', 'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            // Add more FAQ items as needed
        ];

        return view('home.index', compact('carouselItems', 'recommendations', 'whyChooseUs', 'designPackages', 'layananKami', 'latestProjects', 'testimonials', 'faqs'));
    }

    public function catalog()
    {
        $packages = [
            [
                'image' => 'images/sample.png',
                'title' => 'Paket A',
            ],
            [
                'image' => 'images/sample.png',
                'title' => 'Paket B',
            ],
            [
                'image' => 'images/sample.png',
                'title' => 'Paket C',
            ],
            [
                'image' => 'images/sample.png',
                'title' => 'Paket D',
            ],
            [
                'image' => 'images/sample.png',
                'title' => 'Paket D',
            ],
            [
                'image' => 'images/sample.png',
                'title' => 'Paket D',
            ],
            [
                'image' => 'images/sample.png',
                'title' => 'Paket D',
            ],
            [
                'image' => 'images/sample.png',
                'title' => 'Paket D',
            ],
        ];

        $designs = [
            [
                'image' => 'images/sample.png',
                'title' => 'Desain 1',
                'price' => 999999999,
            ],
            [
                'image' => 'images/sample.png',
                'title' => 'Desain 2',
                'price' => 799999999,
            ],
            [
                'image' => 'images/sample.png',
                'title' => 'Desain 3',
                'price' => 599999999,
            ],
            [
                'image' => 'images/sample.png',
                'title' => 'Desain 4',
                'price' => 399999999,
            ],
            [
                'image' => 'images/sample.png',
                'title' => 'Desain 4',
                'price' => 399999999,
            ],
            [
                'image' => 'images/sample.png',
                'title' => 'Desain 4',
                'price' => 399999999,
            ],
        ];

        return view('home.catalog', compact('packages', 'designs'));
    }

    public function portofolio()
    {
        $portfolios = [
            [
                'image' => '/images/sample.png',
                'title' => 'Rumah Pak Fulan',
                'description' => 'Description for Rumah Pak Fulan.'
            ],
            [
                'image' => '/images/sample.png',
                'title' => 'Design Pak Hendra',
                'description' => 'Description for Design Pak Hendra.'
            ],
            [
                'image' => '/images/sample.png',
                'title' => 'Villa Cinta',
                'description' => 'Description for Villa Cinta.'
            ],
            [
                'image' => '/images/sample.png',
                'title' => 'Taman Hijau',
                'description' => 'Description for Taman Hijau.'
            ],
        ];

        return view('home.portofolio', compact('portfolios'));
    }

    public function contact()
    {
        $contactInfo = [
            'address' => 'JL. Mr. Wilopo, RT.02/RW.03, Rw. III, Doplang, Kec. Purworejo, Kabupaten Purworejo, Jawa Tengah 54114',
            'phone' => '(+62)123456789',
            'email' => 'abcdefg@mail.com',
        ];

        return view('home.contact', compact('contactInfo'));
    }
}
