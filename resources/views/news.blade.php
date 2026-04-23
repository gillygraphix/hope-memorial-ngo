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
        {{-- Badilisha hapa kuweka picha yako. Mfano: src="{{ asset('images/news-bg.jpg') }}" --}}
        <img src="{{ asset('images/news-bg.jpg') }}"
             alt="News Background" 
             class="w-full h-full object-cover">
             
        {{-- Gradient Overlay: Giza kushoto ili maneno yasomeke, uwazi kulia picha ionekane --}}
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-sky-950/80 to-transparent"></div>
    </div>
    {{-- ------------------------------------------------------------ --}}

    {{-- Background Pattern --}}
    <div class="absolute inset-0 opacity-10 z-10 pointer-events-none">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle, #ffffff 1px, transparent 1px); background-size: 40px 40px;"></div>
    </div>
    
    <div class="absolute top-0 right-0 w-96 h-96 bg-sky-500/10 rounded-full blur-3xl pointer-events-none z-10"></div>
    
    {{-- Content Container --}}
    <div class="container mx-auto px-4 max-w-7xl relative z-20">
        <div class="max-w-3xl">
            <p class="text-[11px] font-black uppercase tracking-[0.3em] text-orange-400 mb-4 drop-shadow-md">Stay Informed</p>
            <h1 class="text-5xl sm:text-7xl font-black tracking-normal leading-snug mb-6 drop-shadow-lg">
                Latest News &<br>
                <span class="text-sky-400">Updates</span>
            </h1>
            <p class="text-sky-100 text-xl font-light leading-relaxed drop-shadow-md">
                Stay updated with our community outreach programs, health campaigns, and medical camps across the region.
            </p>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- NEWS & EVENTS CONTENT --}}
{{-- ============================================================ --}}
<section class="py-28 bg-white">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="flex flex-col lg:flex-row gap-12">
            
            {{-- LATEST NEWS (Left Side) --}}
            <div class="lg:w-2/3">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    
                    {{-- News Item 1 --}}
                    <div class="group bg-white rounded-[2.5rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-500">
                        <div class="relative h-60 overflow-hidden">
                            {{-- Picha ya Habari 1: src="{{ asset('images/news-1.jpg') }}" --}}
                            <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?q=80&w=600" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            <span class="absolute top-6 left-6 bg-sky-600 text-white text-[10px] font-bold px-4 py-1.5 rounded-full uppercase tracking-widest shadow-lg">Outreach</span>
                        </div>
                        <div class="p-8">
                            <p class="text-[10px] text-slate-400 font-bold mb-3 uppercase tracking-widest">April 10, 2026</p>
                            <h3 class="text-xl font-bold text-slate-800 mb-4 group-hover:text-sky-600 transition">Launching Anaemia Awareness in Rural Arusha</h3>
                            <p class="text-sm text-slate-500 leading-relaxed mb-6">The Spark Foundation officially kicked off its community health education session focused on reducing anaemia among expectant mothers...</p>
                            <a href="#" class="text-sky-600 font-bold text-sm inline-flex items-center group-hover:translate-x-2 transition">Read Full Story <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></a>
                        </div>
                    </div>

                    {{-- News Item 2 --}}
                    <div class="group bg-white rounded-[2.5rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-500">
                        <div class="relative h-60 overflow-hidden">
                            {{-- Picha ya Habari 2: src="{{ asset('images/news-2.jpg') }}" --}}
                            <img src="https://images.unsplash.com/photo-1516574187841-cb9cc2ca948b?q=80&w=600" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            <span class="absolute top-6 left-6 bg-orange-500 text-white text-[10px] font-bold px-4 py-1.5 rounded-full uppercase tracking-widest shadow-lg">Medical Camp</span>
                        </div>
                        <div class="p-8">
                            <p class="text-[10px] text-slate-400 font-bold mb-3 uppercase tracking-widest">March 22, 2026</p>
                            <h3 class="text-xl font-bold text-slate-800 mb-4 group-hover:text-orange-500 transition">Free Antenatal Screening Week Results</h3>
                            <p class="text-sm text-slate-500 leading-relaxed mb-6">Over 200 mothers were screened at Hope Memorial Dispensary during our successful free medical camp week last month...</p>
                            <a href="#" class="text-orange-500 font-bold text-sm inline-flex items-center group-hover:translate-x-2 transition">Read Full Story <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></a>
                        </div>
                    </div>

                </div>
            </div>

            {{-- UPCOMING EVENTS (Right Side Sidebar) --}}
            <div class="lg:w-1/3">
                <div class="bg-slate-50 rounded-[2.5rem] p-8 lg:p-10 sticky top-28 border border-slate-100">
                    <h4 class="text-xl font-black text-slate-800 mb-8 uppercase tracking-tight">Upcoming <span class="text-sky-600">Events</span></h4>
                    
                    <div class="space-y-6">
                        
                        {{-- Event Item 1 with Image --}}
                        <div class="group cursor-pointer bg-white rounded-2xl p-3 border border-slate-100 shadow-sm hover:shadow-md transition-all flex gap-4 items-center">
                            <div class="w-20 h-20 rounded-xl overflow-hidden relative shrink-0">
                                {{-- Picha ya Tukio 1: src="{{ asset('images/event-1.jpg') }}" --}}
                                <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?q=80&w=200" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                <div class="absolute inset-0 bg-sky-900/40 flex flex-col items-center justify-center text-white">
                                    <span class="text-lg font-black leading-snug">25</span>
                                    <span class="text-[9px] font-bold uppercase tracking-widest">Apr</span>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h5 class="text-sm font-bold text-slate-800 leading-tight mb-2 group-hover:text-sky-600 transition">World Health Day Seminar</h5>
                                <p class="text-[11px] font-bold text-slate-500 uppercase tracking-widest">📍 Spark Foundation Hall</p>
                            </div>
                        </div>

                        {{-- Event Item 2 with Image --}}
                        <div class="group cursor-pointer bg-white rounded-2xl p-3 border border-slate-100 shadow-sm hover:shadow-md transition-all flex gap-4 items-center">
                            <div class="w-20 h-20 rounded-xl overflow-hidden relative shrink-0">
                                {{-- Picha ya Tukio 2: src="{{ asset('images/event-2.jpg') }}" --}}
                                <img src="https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?q=80&w=200" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                <div class="absolute inset-0 bg-orange-600/40 flex flex-col items-center justify-center text-white">
                                    <span class="text-lg font-black leading-snug">05</span>
                                    <span class="text-[9px] font-bold uppercase tracking-widest">May</span>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h5 class="text-sm font-bold text-slate-800 leading-tight mb-2 group-hover:text-orange-500 transition">Maternal Health Outreach</h5>
                                <p class="text-[11px] font-bold text-slate-500 uppercase tracking-widest">📍 Moshono Community</p>
                            </div>
                        </div>

                    </div>

                    {{-- Volunteer CTA --}}
                    <div class="mt-10 p-8 bg-sky-900 rounded-3xl text-white relative overflow-hidden">
                        <div class="absolute -right-4 -top-4 w-24 h-24 bg-sky-500/20 rounded-full blur-xl"></div>
                        <div class="relative z-10 text-center">
                            <h5 class="font-bold text-lg mb-2">Be a Volunteer</h5>
                            <p class="text-xs text-sky-200/80 mb-6 font-light leading-relaxed">Join our team on our next outreach campaign and make a real difference.</p>
                            <a href="/contact" class="block bg-orange-500 text-white text-xs font-bold py-3.5 rounded-xl hover:bg-orange-400 transition shadow-lg uppercase tracking-widest">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection