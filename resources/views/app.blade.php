<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite('resources/js/app.js')
    @routes
    @vite('resources/css/app.css')
    @inertiaHead
  </head>
  <body class="bg-gray-50">
    @inertia

    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
  </body>
</html>