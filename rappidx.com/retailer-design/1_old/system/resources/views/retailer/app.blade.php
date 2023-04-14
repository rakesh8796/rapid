@include("retailer/layouts/header")

<body>
  
  
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      @include("retailer/layouts/navbar")
      @include("retailer/layouts/sidebar")
      <!-- Main Content -->
      @section("retailer")

      @show
      
      @include("retailer/layouts/footer")