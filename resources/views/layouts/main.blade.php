<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page_title', 'Home') | {{ config('app.name', 'Ozana WatchLists') }} - A easy way to remind what you want to watch and when</title>

    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
  </head>

  <body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
      <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
        <ul class="flex flex-col md:flex-row items-center">
          <li>
            <a href="#">
              <svg data-v-423bf9ae="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 386 90" class="w-32"><!----><!----><!----><g data-v-423bf9ae="" id="8c4acabd-d7de-4ecc-8eb6-074e4a9bf389" fill="white" transform="matrix(6.116208284037474,0,0,6.116208284037474,143.76093593846423,-7.201836771000515)"><path d="M9.44 8.51C9.44 9.59 9.05 10.52 8.29 11.28C7.52 12.05 6.60 12.43 5.52 12.43C4.44 12.43 3.52 12.05 2.76 11.28C1.99 10.52 1.61 9.59 1.61 8.51C1.61 7.44 1.99 6.52 2.76 5.75C3.52 4.99 4.44 4.61 5.52 4.61C6.60 4.61 7.52 4.99 8.29 5.75C9.05 6.52 9.44 7.44 9.44 8.51ZM10.42 8.51C10.42 7.84 10.29 7.21 10.03 6.61C9.77 6.01 9.42 5.49 8.98 5.05C8.54 4.62 8.02 4.27 7.42 4.01C6.82 3.75 6.19 3.63 5.52 3.63C4.84 3.63 4.21 3.75 3.62 4.01C3.03 4.27 2.51 4.62 2.06 5.05C1.62 5.49 1.27 6.01 1.02 6.61C0.76 7.21 0.63 7.84 0.63 8.51C0.63 9.18 0.76 9.82 1.02 10.42C1.27 11.01 1.62 11.53 2.06 11.98C2.51 12.42 3.03 12.77 3.62 13.03C4.21 13.28 4.84 13.41 5.52 13.41C6.19 13.41 6.82 13.28 7.42 13.03C8.02 12.77 8.54 12.42 8.98 11.98C9.42 11.53 9.77 11.01 10.03 10.42C10.29 9.82 10.42 9.18 10.42 8.51ZM11.19 13.30L17.28 13.30L17.28 12.39L13.06 12.39L17.09 7.14L11.42 7.14L11.42 8.05L15.22 8.05ZM23.37 10.22C23.37 10.82 23.16 11.34 22.74 11.79C22.33 12.24 21.81 12.46 21.20 12.46C20.58 12.46 20.07 12.24 19.65 11.79C19.23 11.34 19.03 10.82 19.03 10.22C19.03 9.62 19.23 9.10 19.65 8.65C20.07 8.20 20.58 7.98 21.20 7.98C21.81 7.98 22.33 8.20 22.74 8.65C23.16 9.10 23.37 9.62 23.37 10.22ZM24.35 13.30L24.35 7.14L23.37 7.14L23.37 8.19C23.31 8.12 23.25 8.05 23.19 7.98C22.61 7.33 21.89 7.00 21.04 7.00C20.19 7.00 19.47 7.33 18.89 7.98C18.33 8.61 18.05 9.36 18.05 10.22C18.05 11.08 18.33 11.83 18.89 12.46C19.47 13.11 20.19 13.44 21.04 13.44C21.89 13.44 22.61 13.11 23.19 12.46C23.25 12.39 23.31 12.32 23.37 12.25L23.37 13.30ZM30.70 13.30L31.68 13.30L31.68 9.45C31.68 8.74 31.50 8.16 31.12 7.72C30.94 7.50 30.71 7.33 30.44 7.20C30.17 7.08 29.81 7.01 29.37 7.01C28.93 7.01 28.55 7.13 28.21 7.36C27.89 7.57 27.63 7.85 27.43 8.20L27.43 7.14L26.45 7.14L26.45 13.30L27.43 13.30L27.43 10.72C27.43 9.94 27.57 9.32 27.87 8.86C28.03 8.60 28.24 8.39 28.50 8.23C28.77 8.07 29.11 7.99 29.53 7.99C29.95 7.99 30.25 8.14 30.43 8.42C30.61 8.71 30.70 9.05 30.70 9.45ZM38.47 10.22C38.47 10.82 38.26 11.34 37.85 11.79C37.43 12.24 36.92 12.46 36.30 12.46C35.69 12.46 35.17 12.24 34.75 11.79C34.34 11.34 34.13 10.82 34.13 10.22C34.13 9.62 34.34 9.10 34.75 8.65C35.17 8.20 35.69 7.98 36.30 7.98C36.92 7.98 37.43 8.20 37.85 8.65C38.26 9.10 38.47 9.62 38.47 10.22ZM39.45 13.30L39.45 7.14L38.47 7.14L38.47 8.19C38.42 8.12 38.36 8.05 38.30 7.98C37.72 7.33 37.00 7.00 36.15 7.00C35.30 7.00 34.58 7.33 34.00 7.98C33.43 8.61 33.15 9.36 33.15 10.22C33.15 11.08 33.43 11.83 34.00 12.46C34.58 13.11 35.30 13.44 36.15 13.44C37.00 13.44 37.72 13.11 38.30 12.46C38.36 12.39 38.42 12.32 38.47 12.25L38.47 13.30Z"></path></g><!----><g data-v-423bf9ae="" id="7e561a6e-ec3d-4a60-b056-268846ba9057" transform="matrix(1.7964072403413156,0,0,1.7964072403413156,-0.2052738914649268,-18.680838615915093)" stroke="none" fill="white"><path d="M70.2 10.9H22.8c-.6 0-1.1.4-1.3 1L8.8 59.4c-.2.8.4 1.6 1.3 1.6h47.4c.6 0 1.1-.4 1.3-1l12.7-47.5c.2-.8-.4-1.6-1.3-1.6zM19.6 53.1l-1 3.7c-.2.6-.7 1-1.3 1h-3.6c-.9 0-1.5-.8-1.3-1.6l1-3.7c.2-.6.7-1 1.3-1h3.6c.9-.1 1.6.7 1.3 1.6zm15.6-34.2l1-3.7c.2-.6.7-1 1.3-1h3.6c.9 0 1.5.8 1.3 1.6l-1 3.7c-.2.6-.7 1-1.3 1h-3.6c-.9.1-1.6-.7-1.3-1.6zm-12.8 0l1-3.7c.2-.6.7-1 1.3-1h3.6c.9 0 1.5.8 1.3 1.6l-1 3.7c-.2.6-.7 1-1.3 1h-3.6c-.9.1-1.5-.7-1.3-1.6zm10 34.2l-1 3.7c-.2.6-.7 1-1.3 1h-3.6c-.9 0-1.5-.8-1.3-1.6l1-3.7c.2-.6.7-1 1.3-1h3.6c.9-.1 1.5.7 1.3 1.6zm12.7 0l-1 3.7c-.2.6-.7 1-1.3 1h-3.6c-.9 0-1.5-.8-1.3-1.6l1-3.7c.2-.6.7-1 1.3-1h3.6c.9-.1 1.5.7 1.3 1.6zm.5-15.9l-11.7 9.3c-1.4 1.1-3 .3-2.6-1.2l5-18.5c.4-1.5 2.5-2.3 3.2-1.2l6.8 9.3c.5.6.2 1.6-.7 2.3zm2.3-18.3l1-3.7c.2-.6.7-1 1.3-1h3.6c.9 0 1.5.8 1.3 1.6l-1 3.7c-.2.6-.7 1-1.3 1h-3.6c-.9.1-1.6-.7-1.3-1.6zm9.9 34.2l-1 3.7c-.2.6-.7 1-1.3 1h-3.6c-.9 0-1.5-.8-1.3-1.6l1-3.7c.2-.6.7-1 1.3-1h3.6c.9-.1 1.5.7 1.3 1.6zm10-37.2l-1 3.7c-.2.6-.7 1-1.3 1h-3.6c-.9 0-1.5-.8-1.3-1.6l1-3.7c.2-.6.7-1 1.3-1h3.6c.9-.1 1.5.7 1.3 1.6zM3.2 24.1h9.4c1 0 1.7-.8 1.7-1.7 0-1-.8-1.7-1.7-1.7H3.2c-1 0-1.7.8-1.7 1.7 0 1 .8 1.7 1.7 1.7zM2.2 33.2h7.4c1 0 1.7-.8 1.7-1.7 0-1-.8-1.7-1.7-1.7H2.2c-1 0-1.7.8-1.7 1.7 0 .9.8 1.7 1.7 1.7zM8.4 38.8H3.2c-1 0-1.7.8-1.7 1.7 0 1 .8 1.7 1.7 1.7h5.2c1 0 1.7-.8 1.7-1.7 0-.9-.8-1.7-1.7-1.7zM5 47.9H2.2c-1 0-1.7.8-1.7 1.7 0 1 .8 1.7 1.7 1.7H5c1 0 1.7-.8 1.7-1.7 0-1-.7-1.7-1.7-1.7z"></path></g><!----></svg>
            </a>
          </li>
          <li class="md:ml-16 mt-3 md:mt-0">
            <a href="#" class="hover:text-gray-300">Movies</a>
          </li>
          <li class="md:ml-6 mt-3 md:mt-0">
            <a href="#" class="hover:text-gray-300">TV Shows</a>
          </li>
          <li class="md:ml-6 mt-3 md:mt-0">
            <a href="#" class="hover:text-gray-300">Channels</a>
          </li>
        </ul>
        {{-- Search bar --}}
        <div class="flex flex-col md:flex-row items-center">
          <div class="relative mt-3 md:mt-0">
            <input type="text" name="search" class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" placeholder="Search...">
            <div class="absolute top-0">
              <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 24 24">
                <path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/></svg>
            </div>
          </div>

          <div class="md:ml-4 mt-3 md:mt-0">
            <a href="#">
              <img src="/img/avatar.jpg"  alt="avatar" class="rounded-full w-8 h-8">
            </a>
          </div>

        </div>
      </div>
      </nav>

    @yield('content')

  </body>
</html>