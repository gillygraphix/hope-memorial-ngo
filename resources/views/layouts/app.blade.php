<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Hope Memorial Spark Foundation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: #f8fafc; 
            color: #334155; 
            overflow-x: hidden; 
            width: 100%;
        }
        .hashtag { font-variant: small-caps; font-weight: 600; color: #0284c7; }
        
        /* FOOTER PATTERN */
        .ngo-custom-footer {
            background-color: #0f172a; 
            background-image: url('/images/pattern.png'); 
            background-repeat: repeat;
            background-size: 600px auto; 
            position: relative;
            animation: pattern-scroll 50s linear infinite;
        }

        @keyframes pattern-scroll {
            0% { background-position: 0 0; }
            100% { background-position: 0 600px; }
        }

        .footer-overlay {
            background: linear-gradient(to bottom, rgba(15, 23, 42, 0.99), rgba(15, 23, 42, 0.95));
        }

        @keyframes spark-glow {
            0%, 100% { opacity: 1; transform: scale(1); text-shadow: 0 0 0px rgba(14, 165, 233, 0); }
            50% { opacity: 0.8; transform: scale(1.05); text-shadow: 0 0 10px rgba(14, 165, 233, 0.6); }
        }
        .animate-spark { animation: spark-glow 3s infinite ease-in-out; }
        
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        /* Custom Animation Curve for Apple-like feel */
        .apple-spring {
            transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
        }
    </style>
</head>
<body class="antialiased selection:bg-orange-400 selection:text-white">

    {{-- TOP BAR --}}
    <div class="bg-sky-950 text-sky-100 text-[10px] font-bold py-2.5 px-4 tracking-[0.1em] border-b border-white/5 uppercase overflow-hidden relative z-[60]">
        <div class="container mx-auto flex flex-col sm:flex-row justify-between items-center max-w-7xl gap-2">
            <div class="flex space-x-6 items-center">
                <span class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3.5 h-3.5 text-orange-400 mr-2 shrink-0">
                        <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                    </svg>
                    Arusha, Tanzania
                </span>
                <span class="hidden sm:flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3.5 h-3.5 text-orange-400 mr-2 shrink-0">
                        <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z" clip-rule="evenodd" />
                    </svg>
                    +255 700 000 000
                </span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="/dispensary" class="hover:text-orange-400 transition">Clinical Portal</a>
                <span class="text-sky-800"></span>
            </div>
        </div>
    </div>

    {{-- MAIN HEADER --}}
    <header class="bg-white/95 backdrop-blur-md border-b border-sky-100 sticky top-0 z-50 shadow-sm relative">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between max-w-7xl relative z-20">
            
            {{-- LOGO --}}
            <a href="/" class="flex items-center group shrink-0">
                <img src="{{ asset('images/logo.png') }}" 
                     alt="Hope Memorial Spark Foundation Logo" 
                     class="h-12 sm:h-14 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
            </a>
            
            {{-- DESKTOP NAVIGATION --}}
            <nav class="hidden lg:flex items-center space-x-2">
                @php 
                    $navItems = [
                        '/' => 'Home',
                        'foundation' => 'Foundation',
                        'projects' => 'Projects',
                        'dispensary' => 'Clinical',
                        'donate' => 'Donate', /* Nimerudisha Donate hapa */
                        'news' => 'Updates',
                        'gallery' => 'Gallery',
                        'contact' => 'Contact',
                    ];
                @endphp

                @foreach($navItems as $url => $label)
                    <a href="{{ $url == '/' ? '/' : '/'.$url }}" 
                       class="px-4 py-2 text-[11px] font-bold uppercase tracking-widest transition-colors duration-300 rounded-full {{ request()->is($url == '/' ? '/' : $url) ? 'bg-sky-50 text-sky-600' : 'text-slate-500 hover:text-sky-600 hover:bg-slate-50' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </nav>
            
            <div class="flex items-center space-x-4">
                {{-- DESKTOP DONATE BUTTON --}}
                <div class="hidden lg:block">
                    <a href="/donate" class="bg-orange-500 text-white font-black text-[11px] uppercase tracking-widest px-8 py-3.5 rounded-full hover:bg-slate-800 transition duration-300 shadow-lg shadow-orange-500/20">
                        Support Us
                    </a>
                </div>

                {{-- MORPHING HAMBURGER BUTTON (Mobile) --}}
                <button id="menu-toggle" class="lg:hidden relative w-10 h-10 flex items-center justify-center text-slate-700 hover:text-sky-600 focus:outline-none transition-colors group">
                    <div class="relative w-6 h-[18px] flex flex-col justify-between overflow-hidden">
                        <span id="line-1" class="w-full h-0.5 bg-current rounded-full transition-all duration-300 origin-left"></span>
                        <span id="line-2" class="w-full h-0.5 bg-current rounded-full transition-all duration-300"></span>
                        <span id="line-3" class="w-full h-0.5 bg-current rounded-full transition-all duration-300 origin-left"></span>
                    </div>
                </button>
            </div>
        </div>

        {{-- APPLE-STYLE FLOATING MOBILE MENU --}}
        <div id="mobile-menu-wrapper" class="absolute top-[110%] left-4 right-4 z-10 opacity-0 scale-95 -translate-y-4 pointer-events-none transition-all duration-500 apple-spring invisible">
            
            <nav class="bg-white/90 backdrop-blur-2xl border border-white/60 shadow-[0_20px_50px_-12px_rgba(0,0,0,0.15)] rounded-3xl p-5 overflow-hidden">
                <ul class="flex flex-col space-y-1">
                    @foreach($navItems as $url => $label)
                        <li>
                            <a href="{{ $url == '/' ? '/' : '/'.$url }}" 
                               class="block px-5 py-3.5 text-[12px] font-black uppercase tracking-widest rounded-2xl transition-all duration-300 {{ request()->is($url == '/' ? '/' : $url) ? 'bg-sky-50 text-sky-600' : 'text-slate-600 hover:bg-slate-50 hover:text-sky-600 hover:translate-x-1' }}">
                                {{ $label }}
                            </a>
                        </li>
                    @endforeach
                    <li class="pt-4 mt-2 border-t border-slate-100"> 
                        <a href="/donate" class="flex items-center justify-center bg-orange-500 text-white font-black text-[12px] uppercase tracking-widest py-4 rounded-2xl shadow-lg shadow-orange-500/20 active:scale-95 transition-transform">
                            Support Our Mission
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    {{-- MAIN CONTENT --}}
    <main class="min-h-[70vh] w-full relative z-0">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="ngo-custom-footer text-slate-400 pt-24 pb-12 border-t-8 border-orange-500 relative w-full overflow-hidden">
        <div class="absolute inset-0 footer-overlay pointer-events-none"></div>

        <div class="container mx-auto px-4 max-w-7xl relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-16 mb-24">
                
                <div class="space-y-6">
                    <h4 class="text-white text-lg font-black tracking-normal uppercase">HOPE <span class="text-sky-500">MEMORIAL</span></h4>
                    <p class="text-sm leading-relaxed font-light text-slate-300/80">
                        Improving maternal and child health through community-led solutions and professional clinical support in Tanzania.
                    </p>
                    <div class="flex items-center space-x-3">
                        <span class="w-2.5 h-2.5 bg-green-500 rounded-full animate-pulse shadow-[0_0_10px_rgba(34,197,94,0.8)]"></span>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-white">Impact Mission Active</span>
                    </div>
                </div>

                <div>
                    <h4 class="text-white font-bold uppercase text-[11px] tracking-[0.2em] mb-8 border-l-4 border-sky-500 pl-4">Focus Areas</h4>
                    <ul class="space-y-4 text-xs font-bold uppercase tracking-[0.15em] text-slate-300">
                        <li><a href="/projects" class="hover:text-sky-400 transition-colors">Anaemia Reduction</a></li>
                        <li><a href="/projects" class="hover:text-sky-400 transition-colors">Safe Delivery Initiative</a></li>
                        <li><a href="/projects" class="hover:text-sky-400 transition-colors">Maternal Education</a></li>
                        <li><a href="/projects" class="hover:text-sky-400 transition-colors">Community Nutrition</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold uppercase text-[11px] tracking-[0.2em] mb-8 border-l-4 border-orange-500 pl-4">Contact Info</h4>
                    <ul class="space-y-6 text-sm text-slate-300">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-orange-500 mr-4 mt-0.5 shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            <span>Moshono, Arusha, Tanzania</span>
                        </li>
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-orange-500 mr-4 shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                            <span>info@hopememorial.org</span>
                        </li>
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-orange-500 mr-4 shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-2.896-1.596-5.48-4.18-7.076-7.076l1.293-.97c.362-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                            <span class="font-bold text-white">+255 700 000 000</span>
                        </li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold uppercase text-[11px] tracking-[0.2em] mb-8 border-l-4 border-sky-500 pl-4">Support Us</h4>
                    <p class="text-[10px] mb-6 uppercase tracking-widest text-slate-500 font-bold">Join our mission today.</p>
                    <div class="flex flex-col space-y-4">
                        <input type="email" placeholder="EMAIL ADDRESS" class="bg-white/5 border border-white/10 rounded-xl px-5 py-3.5 text-xs font-bold tracking-widest focus:ring-1 focus:ring-sky-500 outline-none text-white transition-all">
                        <button class="bg-sky-600 hover:bg-sky-700 text-white font-black py-4 rounded-xl transition text-[10px] uppercase tracking-[0.25em]">Subscribe</button>
                    </div>
                </div>
            </div>

            <div class="border-t border-white/5 pt-12 flex flex-col md:flex-row justify-between items-center text-[10px] font-bold uppercase tracking-[0.25em] gap-4">
                <p class="text-slate-500">© 2026 Hope Memorial Spark Foundation. All rights reserved</p>
            </div>
        </div>
    </footer>

    {{-- APPLE-STYLE MENU LOGIC --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('menu-toggle');
            const menuWrapper = document.getElementById('mobile-menu-wrapper');
            
            // Mistari ya icon
            const line1 = document.getElementById('line-1');
            const line2 = document.getElementById('line-2');
            const line3 = document.getElementById('line-3');

            let isMenuOpen = false;

            btn.addEventListener('click', function() {
                isMenuOpen = !isMenuOpen;

                if (isMenuOpen) {
                    // 1. Animate Icon kuwa "X"
                    line1.classList.add('rotate-45', 'translate-x-[2px]', '-translate-y-[1px]');
                    line2.classList.add('opacity-0', 'translate-x-2'); // Inasogea kulia na kupotea
                    line3.classList.add('-rotate-45', 'translate-x-[2px]', 'translate-y-[1px]');

                    // 2. Onyesha Menu kwa style ya scale/spring
                    menuWrapper.classList.remove('invisible', 'opacity-0', 'scale-95', '-translate-y-4', 'pointer-events-none');
                    menuWrapper.classList.add('opacity-100', 'scale-100', 'translate-y-0', 'pointer-events-auto');
                } else {
                    // 1. Rudisha Icon kuwa mistari 3
                    line1.classList.remove('rotate-45', 'translate-x-[2px]', '-translate-y-[1px]');
                    line2.classList.remove('opacity-0', 'translate-x-2');
                    line3.classList.remove('-rotate-45', 'translate-x-[2px]', 'translate-y-[1px]');

                    // 2. Ficha Menu kwa style ya scale
                    menuWrapper.classList.remove('opacity-100', 'scale-100', 'translate-y-0', 'pointer-events-auto');
                    menuWrapper.classList.add('opacity-0', 'scale-95', '-translate-y-4', 'pointer-events-none');
                    
                    // Ngoja animation iishe ndio uifanye invisible (ili isiharibu transition)
                    setTimeout(() => {
                        if(!isMenuOpen) menuWrapper.classList.add('invisible');
                    }, 500);
                }
            });
        });
    </script>
</body>
</html>