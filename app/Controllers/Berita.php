<?php

namespace App\Controllers;

class Berita extends BaseController
{
    public function index(): string
    {
          $data['news'] = [
            [
                'title'    => 'Global Climate Summit Reaches Historic Agreement on Carbon Reduction',
                'excerpt'  => 'World leaders have agreed to a groundbreaking framework that commits nations to reducing carbon emissions by 60% before 2035, marking a pivotal moment in environmental policy.',
                'image'    => base_url('uploads/news/climate-summit.jpg'),
                'category' => 'Environment',
                'author'   => 'Sarah Mitchell',
                'date'     => 'Feb 9, 2026',
            ],
            [
                'title'    => 'Tech Giants Unveil Next-Gen AI Processors at Annual Conference',
                'excerpt'  => 'The latest generation of AI-dedicated chips promise 10x performance improvements while consuming significantly less energy than their predecessors.',
                'image'    => base_url('uploads/news/ai-processors.jpg'),
                'category' => 'Technology',
                'author'   => 'David Chen',
                'date'     => 'Feb 8, 2026',
            ],
            [
                'title'    => 'New Study Reveals Benefits of Urban Green Spaces on Mental Health',
                'excerpt'  => 'Researchers found that residents living near parks and green corridors reported 40% lower levels of stress and anxiety compared to those in densely built areas.',
                'image'    => base_url('uploads/news/green-spaces.jpg'),
                'category' => 'Health',
                'author'   => 'Emily Nguyen',
                'date'     => 'Feb 7, 2026',
            ],
            [
                'title'    => 'International Space Station Celebrates 30 Years of Continuous Operation',
                'excerpt'  => 'The ISS marks three decades of uninterrupted habitation, having hosted over 300 astronauts from 20 countries and enabling thousands of scientific experiments.',
                'image'    => base_url('uploads/news/iss.jpg'),
                'category' => 'Science',
                'author'   => 'Marcus Rivera',
                'date'     => 'Feb 6, 2026',
            ],
            [
                'title'    => 'Major Infrastructure Bill Passes, Funding Public Transit Overhaul',
                'excerpt'  => 'A landmark bill allocating $200 billion for public transportation modernization has been signed into law, promising faster and more accessible transit networks.',
                'image'    => base_url('uploads/news/transit.jpg'),
                'category' => 'Politics',
                'author'   => 'Angela Torres',
                'date'     => 'Feb 5, 2026',
            ],
            [
                'title'    => 'Breakthrough in Renewable Energy Storage Could Transform the Grid',
                'excerpt'  => 'Scientists announce a new solid-state battery design capable of storing solar and wind energy for up to 30 days, addressing a key challenge in renewable energy adoption.',
                'image'    => base_url('uploads/news/energy.jpg'),
                'category' => 'Energy',
                'author'   => 'James Kowalski',
                'date'     => 'Feb 4, 2026',
            ],
        ];
        return view('berita', $data);
    }
    public function details(): string
    {
        return view('welcome_message');
    }
}
