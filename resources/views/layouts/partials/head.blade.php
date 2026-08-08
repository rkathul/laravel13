<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>@yield('title', 'Admin') | {{ config('app.name', 'L13') }}</title>

{{-- Theme init (prevents flash of incorrect theme) --}}
<script>
  (() => {
    'use strict';
    const root = document.documentElement;
    if (root.getAttribute('data-lte-color-mode') === 'off') {
      return;
    }
    const STORAGE_KEY = 'lte-theme';
    let stored = null;
    try {
      stored = localStorage.getItem(STORAGE_KEY);
    } catch {
      // localStorage may be unavailable
    }
    const authored = root.getAttribute('data-bs-theme');
    let resolved = 'light';
    if (stored === 'dark' || stored === 'light') {
      resolved = stored;
    } else if (authored === 'dark' || authored === 'light') {
      resolved = authored;
    } else if (globalThis.matchMedia('(prefers-color-scheme: dark)').matches) {
      resolved = 'dark';
    }
    root.setAttribute('data-bs-theme', resolved);
    root.style.colorScheme = resolved;
    if (resolved !== authored) {
      root.setAttribute('data-lte-theme-resolved', '');
    }
  })();
</script>

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
<meta name="color-scheme" content="light dark" />
<meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
<meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
<meta name="supported-color-schemes" content="light dark" />

<link rel="preload" href="{{ asset('adminlte/css/adminlte.css') }}" as="style" />

<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
  integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
  crossorigin="anonymous"
  media="print"
  onload="this.media = 'all'"
/>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
  crossorigin="anonymous"
/>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
  crossorigin="anonymous"
/>
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
  integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>
<link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.css') }}" />

@stack('styles')
