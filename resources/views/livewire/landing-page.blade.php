<div class="w-screen h-screen bg-gray-300">
    <div class="flex items-center justify-between w-full h-16 px-8 text-3xl text-white uppercase bg-gray-700 border">
        <div>
            @php
                $words = explode(" ", config('app.name', 'Laravel') );
                $initials = null;
                foreach ($words as $w) {
                    $initials .= $w[0];
                }
                echo(strtoupper($initials));
            @endphp
        </div>
        <div class="flex gap-4 text-xl">
            <a href="{{ route('login') }}">
                Login
            </a>
            <a href="{{ route('register') }}">
                Register
            </a>
        </div>
    </div>
    <div class="flex w-full p-4">
        <div class="flex items-center justify-center w-1/3 p-16">
            <img src="{{ asset('statics/logo.png') }}" alt="Logo" class="w-2/3">
        </div>
        <div class="flex flex-col justify-center w-2/3 gap-4">
            <div class="px-16 text-4xl uppercase">
                {{ config('app.name', 'Laravel') }}
            </div>
            <div class="px-16 text-xl text-justify">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel aliquam lectus. Fusce tincidunt consequat justo, quis luctus ante tempus at. Morbi lobortis sagittis purus, quis semper mauris eleifend quis. Mauris ullamcorper leo nisl, volutpat varius enim sagittis ac. Vestibulum facilisis congue ligula, at sollicitudin urna venenatis quis. Donec in vehicula magna. Fusce cursus mi id nibh molestie, at pharetra sem pretium. Proin feugiat magna enim. Curabitur metus risus, mattis quis odio sed, porta rhoncus ante. Nulla suscipit congue sapien in aliquam. Nullam aliquam nisi sed aliquet tempus. Donec id viverra lorem. Etiam molestie diam nec mollis tristique. Cras iaculis, nunc quis tincidunt vulputate, ante arcu lacinia ligula, eu viverra diam diam in lorem. Praesent ornare sodales feugiat. Ut sagittis sagittis varius.
            </div>
        </div>
    </div>
    <div class="flex flex-row-reverse w-full py-10 mt-4 text-white bg-gray-500">
        <div class="flex items-center justify-center w-1/2 p-16">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.6365104487363!2d-122.08627838438142!3d37.422065579825144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fba02425dad8f%3A0x6c296c66619367e0!2sGoogleplex!5e0!3m2!1sen!2snp!4v1622735901604!5m2!1sen!2snp" class="w-full h-64" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="flex flex-col justify-center w-1/2 gap-4">
            <div class="px-16 text-xl text-justify">
                Quisque at enim in mauris posuere ornare. Nullam pretium, est et sagittis malesuada, diam libero molestie metus, sit amet feugiat justo mi in nisl. Phasellus ante sem, facilisis a justo id, tincidunt tempus leo. Proin risus augue, fringilla sit amet placerat id, vulputate id sem. Maecenas vitae venenatis tortor, non varius felis. Nullam a aliquet lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed justo urna. Pellentesque rhoncus sagittis quam, sed ullamcorper diam malesuada vel. Fusce sit amet nulla id ex hendrerit tristique ac id felis. Vestibulum dui leo, imperdiet sit amet magna sed, vulputate convallis elit. Donec leo massa, volutpat non elit a, vestibulum euismod tortor. Sed est ipsum, vehicula nec nunc eget, eleifend ultrices tortor. Maecenas sed condimentum urna. Morbi eu sollicitudin libero. Nullam scelerisque vulputate neque vitae convallis.
            </div>
        </div>
    </div>
    {{-- <div class="flex flex-col items-center justify-center w-screen h-screen">
        <img src="{{ asset('statics/logo.jpeg') }}" alt="Logo" class="p-2 my-3">
        <a class="items-center px-8 py-2 font-semibold text-white transition duration-500 ease-in-out transform bg-blue-800 rounded-lg hover:bg-indigo-800 hover:text-blue-100 focus:ring focus:outline-none" href="{{ route('login') }}">Login</a>
    </div> --}}
</div>
