<div class="w-screen h-screen bg-blue-100">
    <div class="flex items-center justify-between w-full h-16 px-8 text-3xl text-white uppercase bg-blue-800 border">
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
            <div class="px-16 text-4xl text-blue-800 uppercase">
                {{ config('app.name', 'Laravel') }}
            </div>
            <div class="px-16 text-xl text-justify">
                At Specialised Solutions Group, we help businesses thrive. We provide the experienced staff you need, when you need them. We also offer a full range of cleaning services for hospitality venues, events, offices, shopping centres and strata buildings. And we connect you with quality suppliers of foodstuffs, beverages, tableware and kitchen items for your hospitality business.
            </div>
        </div>
    </div>
    <div class="flex flex-row-reverse w-full py-2 mt-4 text-white bg-white">
        <div class="flex items-center justify-center w-1/2">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d106002.83625376855!2d151.205811!3d-33.874491!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfca0bcd01cf2ef3e!2sSpecialised%20Staffing%20Solutions!5e0!3m2!1sen!2sin!4v1622997287434!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="flex flex-col justify-center w-1/2 gap-4">
            <div class="flex flex-row gap-8 px-8 text-xl text-justify">
                <div class="w-full p-4 bg-blue-500 rounded-xl">
                    <div class="mb-2 text-4xl text-center">Our company</div>
                    <div>Specialised Solutions Group is established in 2010—is a dynamic Sydney-based company that provides tailored staffing solutions and other quality services to clients in the hospitality industry.</div>
                </div>
                <div class="w-full p-4 bg-blue-700 rounded-xl">
                    <div class="mb-2 text-4xl text-center">Our vision</div>
                    <div>Our vision is to make Specialised  Solutions Group a leading provider of integrated personnel, cleaning and supply solutions to hospitality, event and other businesses.</div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="flex flex-col items-center justify-center w-screen h-screen">
        <img src="{{ asset('statics/logo.jpeg') }}" alt="Logo" class="p-2 my-3">
        <a class="items-center px-8 py-2 font-semibold text-white transition duration-500 ease-in-out transform bg-blue-800 rounded-lg hover:bg-indigo-800 hover:text-blue-100 focus:ring focus:outline-none" href="{{ route('login') }}">Login</a>
    </div> --}}
</div>
