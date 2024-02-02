<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-xwJ6f+kgvBy1j6TIaxTcYfl5PbQy4rW6AJW5u3N0sCvdkUOhZ1MTdzI4YdIIbJ3I3D1YMye2eSl5VnCwIw9b5Q==" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/app.css">
    <title>Document</title>
</head>
<body>
<!-- <div class="bg-white max-w-md w-full rounded-lg overflow-hidden shadow-md">
@foreach($destinations as $destination)
        <div class="p-6">
            <h2 class="font-bold text-xl mb-2">{{$destination->name}}</h2>
            <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget justo nec urna bibendum bibendum in quis velit.</p>
        </div>

        <div class="bg-gray-100 py-4 px-6 border-t border-gray-300">
            <span class="text-sm text-gray-600">Author: John Doe</span>
        </div>
    </div>
    @endforeach -->
    <header class="header sticky top-0 bg-white shadow-md flex items-center justify-between px-8 py-02">
        <!-- logo -->
        <h1 class="w-3/12">
            <a href="">
                <img src="../../../discoverworld/public/image/logadv.jpg" alt=""  height="50px" width="50px">
            </a>
        </h1>

        <!-- navigation -->
        <nav class="nav font-semibold text-lg">
            <ul class="flex items-center">
                <li class="p-4  cursor-pointer active">
                    <a href="#">Home</a>
                </li>
               
              
                <li class="p-4">
                    <a href="#">Recits</a>
                </li>

            </ul>
        </nav>
        <div class="justify-evenly">

          
        </div>
        <div class=" flex ">

        <form method="post">            
            <button name="logout" type="submit"><i class='bx bx-user-circle text-3xl'></i></button>
        </form>
        </a>
        </div>
        </div>
    </div>
    </header>
 

 
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>
<body class="bg-white font-family-karla">

    <!-- Top Bar Nav -->
  
   

    <!-- Text Header -->
  

    <!-- Topic Nav -->
    <nav class="w-full py-4 mt-12 " x-data="{ open: false }">
  

        <div class="block sm:hidden">
            <a
                href="#"
                class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
                @click="open = !open"
            >
                Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
  
        <div  :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            
      <button  type="submit" name="order" value="oldest"><i class="fas fa-sort-amount-down ml-4"></i></button>  
  <button  type="submit" name="order" value="latest"> <i   class="fas fa-sort-amount-up ml-4"></i></button> 
            <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
            @foreach($destinations as $destination)
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">{{$destination->name}}</a>
                @endforeach 
            </div>
        </div>
    </nav>
    <a href="{{ route('create') }}" class="bg-gray-200 text-white mt-5 ml-5 py-2 px-4 rounded">+ New Recit</a>

    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">

        @foreach($recit as $r)
    <article class="flex flex-col shadow my-4">
        <!-- Article Image -->
        @foreach($img as $i)
            @if($i->recit_id == $r->id) 
                <a href="#" class="hover:opacity-75">
                    <img src="{{ asset('storage/uploads/' . $i->url) }}" alt="" style="height: 60vh;"  width="500px" >
                </a>
            @endif
        @endforeach

        <div class="bg-white flex flex-col justify-start p-6">
            <a href="#" class="text-fuchsia-700 text-sm font-bold uppercase pb-4"></a>
            <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $r->title }}</a>
           
            <p class="pb-6">{{ $r->content }}</p>
            <a href="#" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
        </div>
    </article>
@endforeach


           
         

      

       
         
        </section>

        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

         

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
              
                <div class="grid grid-cols-3 gap-3">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=1">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=2">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=3">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=4">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=5">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=6">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=7">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=8">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=9">
                </div>
               
            </div>

        </aside>

    </div>
    <header class="w-full container mx-auto">

            <div class="flex justify-center  ">
    
      

        <!-- Carte 2 -->
        <div class="max-w-xs w-60 h-20 mx-4 bg-black text-white p-4  shadow-2xl "  style="background-color: #ff983f;">
            <h2 class="text-lg font-semibold mb-2">Recits </h2>
            <p>{{ $recit->count() }} Un</p>
        </div>

        <!-- Carte 3 -->
        <div class="max-w-xs w-60 h-20 mx-4 bg-black text-white p-4  shadow-2xl" style="background-color: #ff983f;">
            <h2 class="text-lg font-semibold mb-2">Images</h2>
            <p> {{ $img->count() }} Un</p>
        </div>
        <div class="max-w-xs w-60 h-20 mx-4 bg-black text-white p-4  shadow-2xl" style="background-color: #ff983f;">
            <h2 class="text-lg font-semibold mb-2">Destinations</h2>
            <p> {{ $destinations->count() }} Un</p>
        </div>
    </div>
        </div>
    </header>

    <footer class="w-full border-t bg-white mt-12 pb-12">
        
        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                <a href="#" class="uppercase px-3">About Us</a>
                <a href="#" class="uppercase px-3">Privacy Policy</a>
                <a href="#" class="uppercase px-3">Terms & Conditions</a>
                <a href="#" class="uppercase px-3">Contact Us</a>
            </div>
            <div class="uppercase pb-6">&copy; myblog.com</div>
        </div>
    </footer>

</body>
</html>
