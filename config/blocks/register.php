<?php
    global $the_theme;

    $the_theme->register_block([
        'name' => 'intro-copy',
        'title' => 'Introductory Copy',
        'description' => 'Insert various factoids into your page.',
        'icon' => 'portfolio',
    ]);

    $the_theme->register_block([
        'name' => 'about-overview',
        'title' => 'About Overview',
        'description' => 'Insert an overview of your company into your page.',
        'icon' => 'nametag',
    ]);

    $the_theme->register_block([
        'name' => 'contact-us',
        'title' => 'Contact Us',
        'description' => 'Insert a contact form into your page.',
        'icon' => 'email-alt',
    ]);

    $the_theme->register_block([
        'name' => 'cta-cards',
        'title' => 'CTA Cards',
        'description' => 'Insert up to three cards which link to another section of your site.',
        'icon' => 'admin-links',
    ]);

    $the_theme->register_block([
        'name' => 'image-with-text',
        'title' => 'Image with Text',
        'description' => 'Insert an image and editorialized content into your page.',
        'icon' => 'align-pull-left',
    ]);

    $the_theme->register_block([
        'name' => 'statistic',
        'title' => 'Statistic',
        'description' => 'Insert a statistic into your page.',
        'icon' => 'chart-pie',
    ]);

    $the_theme->register_block([
        'name' => 'cta-banner',
        'title' => 'CTA Banner',
        'description' => 'Insert a banner containing a CTA into your page.',
        'icon' => 'megaphone',
    ]);

    $the_theme->register_block([
        'name' => 'contact-info',
        'title' => 'Contact Information',
        'description' => 'Insert your contact information into your page.',
        'icon' => 'whatsapp',
    ]);

    $the_theme->register_block([
        'name' => 'agent-listing',
        'title' => 'Agent Listing',
        'description' => 'Insert your agents into your page.',
        'icon' => 'businessman',
        'assets' => [
            ['script' => 'AgentDetailModal', 'dependencies' => ['jquery']]
        ]
    ]);

    $the_theme->register_block([
        'name' => 'tabbed-content',
        'title' => 'Tabbed Content',
        'description' => 'Insert a group of tabbed content onto your page.',
        'icon' => 'category',
        'assets' => [
            ['style' => 'https://unpkg.com/swiper@6.8.1/swiper-bundle.min.css'],
            ['script' => 'TabbedContent']
        ]
    ]);

    $the_theme->register_block([
        'name' => 'featured-listings',
        'title' => 'Properties',
        'description' => 'Insert a collection of properties onto your page.',
        'icon' => 'admin-multisite',
        'assets' => [
            ['style' => 'https://unpkg.com/swiper@6.8.1/swiper-bundle.min.css'],
            ['script' => 'FeaturedListings'],
            ['script' => 'FeaturedListingsModal', 'dependencies' => ['jquery']]
        ]
    ]);

    // $the_theme->register_block([
    //     'name' => 'sold-homes',
    //     'title' => 'Sold Homes',
    //     'description' => 'Insert a collection of sold homes onto your page.',
    //     'icon' => 'tag',
    //     'assets' => [
    //         ['style' => 'sold-homes'],
    //         ['style' => 'https://unpkg.com/swiper@6.8.1/swiper-bundle.min.css'],
    //         ['script' => 'SoldHomes'],
    //     ]
    // ]);

    $the_theme->register_block([
        'name' => 'areas-of-expertise',
        'title' => 'Areas of Expertise',
        'description' => 'Insert your areas of expertise onto your page.',
        'icon' => 'location-alt',
        'assets' => [
            ['style' => 'https://unpkg.com/swiper@6.8.1/swiper-bundle.min.css'],
            ['script' => 'AreasOfExpertise'],
        ]
    ]);

    $the_theme->register_block([
        'name' => 'reviews',
        'title' => 'Reviews',
        'description' => 'Insert your reviews onto your page.',
        'icon' => 'star-filled',
        'assets' => [
            ['style' => 'https://unpkg.com/swiper@6.8.1/swiper-bundle.min.css'],
            ['script' => 'Reviews'],
        ]
    ]);
?>
