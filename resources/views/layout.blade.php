<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Portofolio</title>
</head>
<body>

  <!-- Navbar -->
  <x-navbar></x-navbar>

<!-- Section Home -->
<div id="profile" class="mt-5">
  <x-profile :profile="$profile"></x-profile>
</div>

  
  <!-- Section Portofolio -->
  <div id="portofolios">
    <x-portofolios :portofolios="$portofolios"></x-portofolios>
    </div>

  <!-- Section Blog -->
  <div id="blogs">
    <x-blogs :blogs="$blogs"></x-blogs>
  </div>
  

  <!-- Section Contact -->
  <div id="contact">  
    <x-socialmedias :socialmedias="$socialmedias"></x-socialmedias>
  </div>

</body>
</html>
