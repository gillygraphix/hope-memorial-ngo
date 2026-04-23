@extends('layouts.app')

@section('content')

{{-- ============================================================ --}}
{{-- PAGE HERO --}}
{{-- ============================================================ --}}
<section class="relative bg-sky-950 text-white overflow-hidden flex items-center min-h-[50vh] py-28">
    
    {{-- ------------------------------------------------------------ --}}
    {{-- BACKGROUND IMAGE LAYER --}}
    {{-- ------------------------------------------------------------ --}}
    <div class="absolute inset-0 z-0">
        {{-- Badilisha hapa kuweka picha yako. Mfano: src="{{ asset('images/gallery-bg.jpg') }}" --}}
        <img src="{{ asset('images/gallery-bg.jpg') }}" 
             alt="Gallery Background" 
             class="w-full h-full object-cover">
             
        {{-- Gradient Overlay: Giza kushoto ili maneno yasomeke, uwazi kulia picha ionekane --}}
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-sky-950/80 to-transparent"></div>
    </div>
    {{-- ------------------------------------------------------------ --}}

    {{-- Background Pattern --}}
    <div class="absolute inset-0 opacity-10 z-10 pointer-events-none">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle, #ffffff 1px, transparent 1px); background-size: 40px 40px;"></div>
    </div>
    
    {{-- Content Container --}}
    <div class="container mx-auto px-4 max-w-7xl relative z-20">
        <div class="max-w-3xl">
            <p class="text-[11px] font-black uppercase tracking-[0.3em] text-orange-400 mb-4 drop-shadow-md">Visual Stories</p>
            <h1 class="text-5xl sm:text-7xl font-black tracking-normal leading-snug mb-6 drop-shadow-lg">
                Our<br>
                <span class="text-sky-400">Gallery</span>
            </h1>
            <p class="text-sky-100 text-xl font-light leading-relaxed drop-shadow-md">
                Moments from our outreach, clinical work, community programs, and the faces 
                behind the impact of Hope Memorial Spark Foundation.
            </p>
        </div>
    </div>
</section>


{{-- ============================================================ --}}
{{-- GALLERY GRID --}}
{{-- ============================================================ --}}
<section class="py-28 bg-white">
    <div class="container mx-auto px-4 max-w-7xl">

        {{-- Filter Tabs (optional, for future use) --}}
        <div class="flex flex-wrap gap-3 mb-12">
            @php
                $categories = ['All', 'Clinical Work', 'Community Outreach', 'Training', 'Events', 'Team'];
            @endphp
            @foreach($categories as $cat)
            <button class="text-[11px] font-black uppercase tracking-widest px-6 py-3 rounded-full border {{ $loop->first ? 'bg-sky-600 text-white border-sky-600 shadow-md' : 'bg-white text-slate-500 border-slate-200 hover:border-sky-300 hover:text-sky-600' }} transition-all duration-200">
                {{ $cat }}
            </button>
            @endforeach
        </div>

        {{-- Gallery Images --}}
        @if(isset($images) && count($images) > 0)
            <div class="columns-1 sm:columns-2 lg:columns-3 gap-6 space-y-6">
                @foreach($images as $image)
                <div class="break-inside-avoid group relative overflow-hidden rounded-2xl cursor-pointer bg-slate-100 shadow-sm hover:shadow-lg transition-shadow duration-300">
                    <img
                        src="{{ $image->url }}"
                        alt="{{ $image->caption ?? 'Hope Memorial Spark Foundation' }}"
                        class="w-full object-cover group-hover:scale-105 transition-transform duration-500"
                        loading="lazy"
                    >
                    @if($image->caption)
                    <div class="absolute inset-0 bg-gradient-to-t from-sky-950/90 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <p class="text-white font-bold text-sm leading-relaxed">{{ $image->caption }}</p>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>

        @else
            {{-- Empty State --}}
            <div class="text-center py-20 space-y-6 bg-slate-50 rounded-3xl border border-slate-100">
                <div class="flex justify-center text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                </div>
                <h3 class="text-3xl font-black text-slate-700 tracking-normal leading-snug">Gallery Coming Soon</h3>
                <p class="text-slate-500 max-w-md mx-auto leading-relaxed text-lg font-light">
                    Photos and visual stories from our programs, clinical work, and community outreach 
                    will be shared here. Check back soon.
                </p>

                {{-- Placeholder Grid for visual appeal --}}
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mt-12 max-w-4xl mx-auto px-6">
                    @php
                        $placeholders = [
                            ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />', 'label' => 'Antenatal Care'],
                            ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />', 'label' => 'The Dispensary'],
                            ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />', 'label' => 'Postnatal Support'],
                            ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />', 'label' => 'Mobile Clinics'],
                            ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 01-1.44-4.282m3.102.069a18.03 18.03 0 01-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 018.835 2.535M10.34 6.66a23.847 23.847 0 008.835-2.535m0 0A23.74 23.74 0 0018.795 3m.38 1.125a23.91 23.91 0 011.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 001.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 010 3.46" />', 'label' => 'Community Outreach'],
                            ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />', 'label' => 'CHW Training'],
                            ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />', 'label' => 'Our Team'],
                            ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />', 'label' => 'Monduli District'],
                        ];
                    @endphp
                    @foreach($placeholders as $ph)
                    <div class="aspect-square bg-white border border-dashed border-slate-200 rounded-2xl flex flex-col items-center justify-center space-y-4 hover:border-sky-300 hover:bg-sky-50 transition-all duration-300 shadow-sm">
                        <div class="text-sky-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                {!! $ph['icon'] !!}
                            </svg>
                        </div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 text-center px-2">{{ $ph['label'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</section>


{{-- ============================================================ --}}
{{-- SUBMIT PHOTOS CTA (if applicable) --}}
{{-- ============================================================ --}}
<section class="py-24 bg-sky-950 text-white border-t border-sky-900">
    <div class="container mx-auto px-4 max-w-4xl text-center">
        <p class="text-[11px] font-black uppercase tracking-[0.3em] text-orange-400 mb-4">Share Your Story</p>
        <h2 class="text-4xl font-black tracking-normal leading-snug mb-6">Have Photos From Our Programs?</h2>
        <p class="text-sky-300 mb-10 leading-relaxed text-lg font-light">
            If you are a community partner, health worker, or program participant with photos to share, 
            we would love to feature your story here.
        </p>
        <a href="/contact" class="inline-flex items-center bg-orange-500 hover:bg-orange-600 text-white font-black text-[12px] uppercase tracking-widest px-10 py-5 rounded-full transition duration-300 shadow-xl shadow-orange-500/30">
            Contact Us
            <svg class="ml-3 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>
</section>

@endsection