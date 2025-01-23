<?php

namespace Database\Seeders;

use App\Services\UrlService;
use Illuminate\Database\Seeder;

class UrlSeeder extends Seeder
{
    protected $popularUrls = [
        // Search Engines
        'https://www.google.com',
        'https://www.bing.com',
        'https://www.yahoo.com',
        'https://duckduckgo.com',
        'https://www.baidu.com',
        'https://www.yandex.com',

        // Social Media
        'https://www.facebook.com',
        'https://www.instagram.com',
        'https://www.twitter.com',
        'https://www.linkedin.com',
        'https://www.pinterest.com',
        'https://www.snapchat.com',
        'https://www.tiktok.com',
        'https://www.reddit.com',
        'https://www.tumblr.com',

        // News
        'https://www.cnn.com',
        'https://www.bbc.com',
        'https://www.nytimes.com',
        'https://www.theguardian.com',
        'https://www.washingtonpost.com',
        'https://www.huffpost.com',
        'https://www.nbcnews.com',
        'https://www.aljazeera.com',
        'https://www.reuters.com',

        // E-commerce
        'https://www.amazon.com',
        'https://www.ebay.com',
        'https://www.alibaba.com',
        'https://www.etsy.com',
        'https://www.walmart.com',
        'https://www.target.com',
        'https://www.bestbuy.com',
        'https://www.flipkart.com',
        'https://www.shopify.com',

        // Entertainment
        'https://www.netflix.com',
        'https://www.youtube.com',
        'https://www.spotify.com',
        'https://www.hulu.com',
        'https://www.disneyplus.com',
        'https://www.twitch.tv',
        'https://www.crunchyroll.com',
        'https://www.vimeo.com',
        'https://www.imdb.com',
        'https://www.rottentomatoes.com',

        // Education
        'https://www.wikipedia.org',
        'https://www.khanacademy.org',
        'https://www.coursera.org',
        'https://www.udemy.com',
        'https://www.edx.org',
        'https://www.duolingo.com',
        'https://www.stackoverflow.com',
        'https://www.medium.com',

        // Technology
        'https://www.github.com',
        'https://www.gitlab.com',
        'https://www.bitbucket.org',
        'https://www.apple.com',
        'https://www.microsoft.com',
        'https://www.android.com',
        'https://www.adobe.com',
        'https://www.slack.com',
        'https://www.zoom.us',
        'https://www.notion.so',

        // Travel
        'https://www.booking.com',
        'https://www.expedia.com',
        'https://www.airbnb.com',
        'https://www.trivago.com',
        'https://www.skyscanner.net',
        'https://www.kayak.com',
        'https://www.uber.com',
        'https://www.lyft.com',
        'https://www.tripadvisor.com',

        // Food and Recipes
        'https://www.allrecipes.com',
        'https://www.yummly.com',
        'https://www.foodnetwork.com',
        'https://www.epicurious.com',
        'https://www.bonappetit.com',

        // Health and Fitness
        'https://www.webmd.com',
        'https://www.mayoclinic.org',
        'https://www.healthline.com',
        'https://www.bodybuilding.com',
        'https://www.fitbit.com',
        'https://www.myfitnesspal.com',
        'https://www.nike.com',
        'https://www.adidas.com',

        // Finance
        'https://www.paypal.com',
        'https://www.stripe.com',
        'https://www.robinhood.com',
        'https://www.coinbase.com',
        'https://www.nasdaq.com',
        'https://www.forbes.com',
        'https://www.bloomberg.com',

        // Weather
        'https://www.weather.com',
        'https://www.accuweather.com',
        'https://www.timeanddate.com',
        'https://www.noaa.gov',

        // Job Portals
        'https://www.indeed.com',
        'https://www.monster.com',
        'https://www.glassdoor.com',
        'https://www.naukri.com',
        'https://www.linkedin.com/jobs',
        'https://www.simplyhired.com',

        // Forums
        'https://www.quora.com',
        'https://www.reddit.com',
        'https://www.deviantart.com',
        'https://www.producthunt.com',
        'https://www.dribbble.com',
        'https://www.behance.net',

        // Tools and Utilities
        'https://www.canva.com',
        'https://www.pixabay.com',
        'https://www.pexels.com',
        'https://www.shutterstock.com',
        'https://www.speedtest.net',
        'https://www.archive.org',
        'https://www.wolframalpha.com',
        'https://www.bitly.com',
        'https://www.tinyurl.com',

        // Government
        'https://www.usa.gov',
        'https://www.nasa.gov',
        'https://www.cdc.gov',
        'https://www.fbi.gov',

        // Children's Resources
        'https://www.pbskids.org',
        'https://www.coolmathgames.com',
        'https://www.brainpop.com',
        'https://www.funbrain.com',

        // Additional General Sites
        'https://www.medium.com',
        'https://www.zillow.com',
        'https://www.realtor.com',
        'https://www.nextdoor.com',
        'https://www.goodreads.com',
        'https://www.last.fm',
        'https://www.soundcloud.com',
        'https://www.ted.com',
        'https://www.slack.com',
        'https://www.trello.com',
        'https://www.docker.com',
        'https://www.postman.com',
        'https://www.selenium.dev',
        'https://www.jenkins.io',
        'https://www.apache.org',
        'https://www.nginx.com',
        'https://www.cloudflare.com',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $urlService = resolve(UrlService::class);
        foreach ($this->popularUrls as $url) {
            $urlService->shortenUrl($url);
        }
    }
}
