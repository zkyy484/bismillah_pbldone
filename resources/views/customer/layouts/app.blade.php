<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nazarch Studio')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Serif:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#40342A',
                        secondary: '#F97316',
                        light: '#F2F0EB',
                        dark: '#000000',
                        gray: '#666',
                    },
                    fontFamily: {
                        serif: ['Serif', 'serif'],
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    boxShadow: {
                        custom: '0 4px 10px rgba(0, 0, 0, 0.1)',
                        card: '0 8px 24px rgba(0, 0, 0, 0.08)',
                    },
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer utilities {
            .stacked-shadow {
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            }
            .text-shadow {
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            }
        }
    </style>
    @stack('styles')
</head>
<body class="font-poppins bg-light text-dark">
    @include('customer.layouts.header')
    
    <main>
        @yield('content')
    </main>
    
    @include('customer.layouts.footer')
    
    @stack('scripts')
</body>
</html>