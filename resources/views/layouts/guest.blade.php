<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'سوق تعز الالكتروني' }}</title>

    <!-- Fonts -->

    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

    <!-- Styles -->
    @livewireStyles
    <style>
        :root {
            --light: #edf2f9;
            --dark: #152e4d;
            --darker: #12263f;

            --color-red: #dc2626;
            --color-green: #16a34a;
            --color-blue: #2563eb;
            --color-cyan: #0891b2;
            --color-teal: #0d9488;
            --color-fuchsia: #c026d3;
            --color-orange: #ea580c;
            --color-yellow: #ca8a04;
            --color-violet: #7c3aed;
        }

        [x-cloak] {
            display: none;
        }

        .dark .dark\:text-light {
            color: var(--light);
        }

        .dark .dark\:bg-dark {
            background-color: var(--dark);
        }

        .dark .dark\:bg-darker {
            background-color: var(--darker);
        }

        .dark .dark\:text-gray-300 {
            color: #D1D5DB;
        }

        .dark .dark\:text-blue-500 {
            color: #3B82F6;
        }

        .dark .dark\:text-blue-100 {
            color: #DBEAFE;
        }

        .dark .dark\:hover\:text-light:hover {
            color: var(--light);
        }

        .dark .dark\:border-blue-800 {
            border-color: #1e40af;
        }

        .dark .dark\:border-blue-700 {
            border-color: #1D4ED8;
        }

        .dark .dark\:bg-blue-600 {
            background-color: #2563eb;
        }

        .dark .dark\:hover\:bg-blue-600:hover {
            background-color: #2563eb;
        }

        .hover\:overflow-y-auto:hover {
            overflow-y: auto;
        }
    </style>
    
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('magiczoom/style.css') }}">
    <link rel="stylesheet" href="{{ asset('magiczoom/magiczoom.css') }}">
    <!-- Scripts -->
    @wireUiScripts
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('magiczoom/script.js') }}"></script>
    <script src="{{ asset('magiczoom/magiczoom.js') }}"></script>
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
</head>

<body>
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');" :class="{ 'dark': isDark }">
        <x-navbar></x-navbar>
        <div x-ref="loading"
            class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-opacity-40 transform duration-700 bg-gray-400">
            <div
                class="inline-block w-16 h-24 
            border-t-4 
            border-t-gray-50   
            rounded-full 
            animate-spin
            ">
            </div>
        </div>
        <div class="dark:bg-slate-700 bg-gray-100 min-h-screen dark:text-gray-200">
            <div class="font-sans text-gray-900 dark:text-gray-50">
                {{ $slot }}
            </div>
            <x-dialog />
        </div>
    </div>
    <x-notifications />
    @livewireScripts
    <script>
        const setup = () => {
            const getTheme = () => {
                if (window.localStorage.getItem('dark')) {
                    return JSON.parse(window.localStorage.getItem('dark'))
                }
                return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
            }

            const setTheme = (value) => {
                window.localStorage.setItem('dark', value)
            }

            return {
                loading: true,
                isDark: getTheme(),
                toggleTheme() {
                    this.isDark = !this.isDark
                    setTheme(this.isDark)
                },
                setLightTheme() {
                    this.isDark = false
                    setTheme(this.isDark)
                },
                setDarkTheme() {
                    this.isDark = true
                    setTheme(this.isDark)
                },
                isSettingsPanelOpen: false,
                openSettingsPanel() {
                    this.isSettingsPanelOpen = true
                    this.$nextTick(() => {
                        this.$refs.settingsPanel.focus()
                    })
                },
                isNotificationsPanelOpen: false,
                openNotificationsPanel() {
                    this.isNotificationsPanelOpen = true
                    this.$nextTick(() => {
                        this.$refs.notificationsPanel.focus()
                    })
                },
                isSearchPanelOpen: false,
                openSearchPanel() {
                    this.isSearchPanelOpen = true
                    this.$nextTick(() => {
                        this.$refs.searchInput.focus()
                    })
                },
                isMobileSubMenuOpen: false,
                openMobileSubMenu() {
                    this.isMobileSubMenuOpen = true
                    this.$nextTick(() => {
                        this.$refs.mobileSubMenu.focus()
                    })
                },
                isMobileMainMenuOpen: false,
                openMobileMainMenu() {
                    this.isMobileMainMenuOpen = true
                    this.$nextTick(() => {
                        this.$refs.mobileMainMenu.focus()
                    })
                },
            }
        }
    </script>
</body>

</html>
