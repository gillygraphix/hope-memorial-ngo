@extends('layouts.app')

@section('content')

{{-- ============================================================ --}}
{{-- PHP LOGIC: KUSOMA PICHA AUTOMATICALLY KUTOKA KWENYE MAFOLDA --}}
{{-- ============================================================ --}}
@php
    $categories = [
        'clinical' => 'Clinical Work',
        'community' => 'Community Outreach',
        'training' => 'Training',
        'events' => 'Events',
        'team' => 'Team'
    ];
    
    $galleryImages = [];
    
    foreach($categories as $folder => $label) {
        $path = public_path('images/gallery/' . $folder);
        // Kama folda lipo, soma picha zote ndani yake
        if(\Illuminate\Support\Facades\File::exists($path)) {
            $files = \Illuminate\Support\Facades\File::files($path);
            foreach($files as $file) {
                $ext = strtolower($file->getExtension());
                // Hakikisha ni picha pekee
                if(in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    $galleryImages[] = [
                        'url' => asset('images/gallery/' . $folder . '/' . $file->getFilename()),
                        'category' => $folder,
                        'label' => $label,
                        'filename' => $file->getFilename()
                    ];
                }
            }
        }
    }
    
    // Changanya picha kidogo (optional) ili 'All' iwe na muonekano mzuri
    shuffle($galleryImages);
@endphp

{{-- ============================================================ --}}
{{-- PAGE HERO --}}
{{-- ============================================================ --}}
<section class="relative bg-sky-950 text-white overflow-hidden flex items-center min-h-[50vh] py-28">
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/gallery-bg.jpg') }}" 
             alt="Gallery Background" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-sky-950/80 to-transparent"></div>
    </div>

    <div class="absolute inset-0 opacity-10 z-10 pointer-events-none">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle, #ffffff 1px, transparent 1px); background-size: 40px 40px;"></div>
    </div>
    
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
{{-- GALLERY GRID & FILTERS (MASONRY 4 COLUMNS) --}}
{{-- ============================================================ --}}
<section class="py-28 bg-white min-h-[60vh]">
    <div class="container mx-auto px-4 max-w-7xl">

        {{-- Filter Tabs --}}
        <div class="flex flex-wrap justify-center sm:justify-start gap-3 mb-12" id="gallery-filters">
            <button data-filter="all" class="filter-btn active text-[11px] font-black uppercase tracking-widest px-6 py-3 rounded-full border bg-sky-600 text-white border-sky-600 shadow-md transition-all duration-200">
                All
            </button>
            @foreach($categories as $key => $label)
            <button data-filter="{{ $key }}" class="filter-btn text-[11px] font-black uppercase tracking-widest px-6 py-3 rounded-full border bg-white text-slate-500 border-slate-200 hover:border-sky-300 hover:text-sky-600 transition-all duration-200">
                {{ $label }}
            </button>
            @endforeach
        </div>

        {{-- Gallery Images --}}
        @if(count($galleryImages) > 0)
            {{-- Hapa tumeweka columns-4 kwa kioo kikubwa, columns-3 kwa kati, na columns-2 kwa simu --}}
            <div class="columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4" id="gallery-grid">
                @foreach($galleryImages as $image)
                <div class="gallery-item break-inside-avoid relative overflow-hidden rounded-2xl cursor-pointer bg-slate-100 shadow-sm hover:shadow-lg transition-all duration-500 transform scale-100 group" 
                     data-category="{{ $image['category'] }}"
                     data-url="{{ $image['url'] }}"
                     data-filename="{{ $image['filename'] }}"
                     data-label="{{ $image['label'] }}"
                     onclick="openLightbox(this)">
                    
                    {{-- Picha hazilazimishwi kuwa mraba, zinafuata urefu wake wa asili --}}
                    <img src="{{ $image['url'] }}" 
                         alt="{{ $image['label'] }}" 
                         class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-700" 
                         loading="lazy">
                    
                    {{-- Hover Overlay yenye Icon ya Ku-zoom --}}
                    <div class="absolute inset-0 bg-sky-950/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[2px]">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white border border-white/50">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                        </div>
                    </div>
                    
                    {{-- Category Tag kwenye kona --}}
                    <div class="absolute bottom-4 left-4 pointer-events-none">
                        <span class="bg-slate-900/80 backdrop-blur-sm text-white text-[9px] font-black px-3 py-1.5 rounded-full uppercase tracking-widest shadow-md">
                            {{ $image['label'] }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>

        @else
            {{-- Empty State (Ikikosa picha kwenye mafolda) --}}
            <div class="text-center py-20 space-y-6 bg-slate-50 rounded-3xl border border-slate-100">
                <div class="flex justify-center text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                </div>
                <h3 class="text-3xl font-black text-slate-700 tracking-normal leading-snug">Gallery Coming Soon</h3>
                <p class="text-slate-500 max-w-md mx-auto leading-relaxed text-lg font-light">
                    Photos and visual stories from our programs, clinical work, and community outreach 
                    will be shared here.
                </p>
            </div>
        @endif

    </div>
</section>

{{-- ============================================================ --}}
{{-- LIGHTBOX MODAL (Picha Ikifunguliwa na Navigation) --}}
{{-- ============================================================ --}}
<div id="lightbox" class="fixed inset-0 z-[100] bg-slate-950/95 backdrop-blur-md hidden opacity-0 transition-opacity duration-300 flex-col items-center justify-center p-4 sm:p-8">
    
    {{-- Close Button (X ya Juu) --}}
    <button onclick="closeLightbox()" class="absolute top-6 right-6 text-slate-400 hover:text-white transition-colors bg-white/10 hover:bg-white/20 p-3 rounded-full backdrop-blur-md z-50">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>

    {{-- Previous Button --}}
    <button onclick="prevImage(event)" class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 text-white/70 hover:text-white bg-slate-900/50 hover:bg-sky-600 p-3 sm:p-4 rounded-full backdrop-blur-md transition-all z-50 shadow-lg">
        <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
    </button>

    {{-- Next Button --}}
    <button onclick="nextImage(event)" class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 text-white/70 hover:text-white bg-slate-900/50 hover:bg-sky-600 p-3 sm:p-4 rounded-full backdrop-blur-md transition-all z-50 shadow-lg">
        <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
    </button>

    {{-- Main Image Display --}}
    <div class="relative max-w-5xl w-full flex flex-col items-center mt-8">
        <img id="lightbox-img" src="" alt="Gallery Image" class="max-h-[60vh] md:max-h-[75vh] w-auto max-w-full object-contain rounded-xl shadow-2xl shadow-sky-900/20 mb-8 border border-white/10 transition-opacity duration-200">
        
        {{-- Actions Container --}}
        <div class="flex flex-wrap items-center justify-center gap-4 w-full px-12">
            
            {{-- Button ya Kurudi --}}
            <button onclick="closeLightbox()" class="flex items-center bg-slate-800 hover:bg-slate-700 text-white font-black text-[11px] uppercase tracking-widest px-6 py-3.5 rounded-full transition duration-300 border border-slate-700">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back
            </button>
            
            {{-- Label inaonekana Desktop tu --}}
            <span id="lightbox-label" class="hidden sm:inline-block text-sky-300 text-[10px] font-black uppercase tracking-widest bg-sky-900/50 border border-sky-800 px-5 py-3.5 rounded-full shadow-inner"></span>
            
            {{-- Download Button --}}
            <a id="download-btn" href="" download class="flex items-center bg-orange-500 hover:bg-orange-600 text-white font-black text-[11px] uppercase tracking-widest px-6 py-3.5 rounded-full transition duration-300 shadow-lg shadow-orange-500/20">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                Download Image
            </a>
            
        </div>
    </div>
</div>

{{-- ============================================================ --}}
{{-- JAVASCRIPT KWA AJILI YA FILTERS NA LIGHTBOX --}}
{{-- ============================================================ --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- 1. FILTERING LOGIC ---
        const filterBtns = document.querySelectorAll('.filter-btn');
        const galleryItems = document.querySelectorAll('.gallery-item');

        const activeClasses = ['bg-sky-600', 'text-white', 'border-sky-600', 'shadow-md', 'active'];
        const inactiveClasses = ['bg-white', 'text-slate-500', 'border-slate-200', 'hover:border-sky-300', 'hover:text-sky-600'];

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                filterBtns.forEach(b => {
                    b.classList.remove(...activeClasses);
                    b.classList.add(...inactiveClasses);
                });
                
                btn.classList.remove(...inactiveClasses);
                btn.classList.add(...activeClasses);

                const filterValue = btn.getAttribute('data-filter');

                galleryItems.forEach(item => {
                    if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                        item.style.display = 'block';
                        setTimeout(() => {
                            item.classList.remove('scale-95', 'opacity-0');
                            item.classList.add('scale-100', 'opacity-100');
                        }, 50);
                    } else {
                        item.classList.remove('scale-100', 'opacity-100');
                        item.classList.add('scale-95', 'opacity-0');
                        setTimeout(() => {
                            item.style.display = 'none';
                        }, 300);
                    }
                });
            });
        });

        // --- 2. LIGHTBOX & SLIDER LOGIC ---
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        const lightboxLabel = document.getElementById('lightbox-label');
        const downloadBtn = document.getElementById('download-btn');
        
        let currentVisibleItems = [];
        let currentIndex = 0;

        // Kufungua Lightbox
        window.openLightbox = function(element) {
            // Chukua picha zote zinazoonekana sasa hivi kulingana na filter
            currentVisibleItems = Array.from(document.querySelectorAll('.gallery-item')).filter(item => item.style.display !== 'none');
            
            // Tafuta hii picha tuliyobonyeza ni ya ngapi kwenye list
            currentIndex = currentVisibleItems.indexOf(element);

            updateLightboxContent();

            lightbox.classList.remove('hidden');
            setTimeout(() => {
                lightbox.classList.remove('opacity-0');
                lightbox.classList.add('opacity-100', 'flex');
            }, 10);
            
            document.body.style.overflow = 'hidden'; 
        }

        // Ku-update taarifa zinazoonekana ndani ya Lightbox
        function updateLightboxContent() {
            if(currentVisibleItems.length === 0) return;
            
            const item = currentVisibleItems[currentIndex];
            
            // Weka effect kidogo picha inapobadilika
            lightboxImg.style.opacity = '0.5';
            
            setTimeout(() => {
                lightboxImg.src = item.dataset.url;
                lightboxLabel.textContent = item.dataset.label;
                downloadBtn.href = item.dataset.url;
                downloadBtn.download = item.dataset.filename;
                lightboxImg.style.opacity = '1';
            }, 150);
        }

        // Kwenda Picha Inayofuata (Next)
        window.nextImage = function(e) {
            if(e) e.stopPropagation();
            currentIndex = (currentIndex + 1) % currentVisibleItems.length;
            updateLightboxContent();
        }

        // Kurudi Picha Iliyopita (Previous)
        window.prevImage = function(e) {
            if(e) e.stopPropagation();
            currentIndex = (currentIndex - 1 + currentVisibleItems.length) % currentVisibleItems.length;
            updateLightboxContent();
        }

        // Kufunga Lightbox
        window.closeLightbox = function() {
            lightbox.classList.remove('opacity-100');
            lightbox.classList.add('opacity-0');
            
            setTimeout(() => {
                lightbox.classList.add('hidden');
                lightbox.classList.remove('flex');
                lightboxImg.src = '';
            }, 300);
            
            document.body.style.overflow = 'auto'; 
        }

        // Funga ukiclick pembeni ya picha
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) closeLightbox();
        });

        // Kutumia Keyboard Buttons (Escape, Left, Right)
        document.addEventListener('keydown', (e) => {
            if (lightbox.classList.contains('hidden')) return;
            
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowRight') nextImage();
            if (e.key === 'ArrowLeft') prevImage();
        });
    });
</script>

@endsection