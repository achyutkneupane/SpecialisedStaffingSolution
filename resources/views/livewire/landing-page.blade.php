<div class="w-screen h-screen bg-blue-100">
    <div class="flex items-center justify-between w-full h-16 px-8 text-3xl text-white uppercase bg-blue-800 border">
        <div class="text-xl">
            <a href="{{ route('landingPage') }}">{{ config('app.name') }}</a>
        </div>
        <div class="flex gap-4 text-xl">
            <a href="{{ route('login') }}">
                Login
            </a>
            <a href="{{ route('register') }}">
                Register
            </a>
            <a href="{{ route('contactUs') }}">
                Contact Us
            </a>
        </div>
    </div>
    <div class="flex w-full p-2">
        <div class="flex items-center justify-center w-1/3 p-8">
            <img src="{{ asset('statics/logo.png') }}" alt="Logo" class="w-2/3">
        </div>
        <div class="flex flex-col justify-center w-2/3 gap-4">
            <div class="px-16 text-4xl text-blue-800 uppercase">
                {{ config('app.name', 'Laravel') }}
            </div>
            <div class="px-8 text-xl text-justify">
                At Specialised Solutions Group, we help businesses thrive. We provide the experienced staff you need, when you need them. We also offer a full range of cleaning services for hospitality venues, events, offices, shopping centres and strata buildings. And we connect you with quality suppliers of foodstuffs, beverages, tableware and kitchen items for your hospitality business.
            </div>
        </div>
    </div>
    <div class="flex flex-row-reverse justify-center w-full py-8 mt-4 ">
        <div class="flex flex-col justify-center w-2/3 gap-4">
            <div class="flex flex-row gap-8 px-8 text-xl text-justify">
                <div class="w-full p-4 text-blue-800 bg-white border border-blue-800 rounded-xl">
                    <div class="mb-2 text-4xl text-center">Our company</div>
                    <div>Specialised Solutions Group is established in 2010—is a dynamic Sydney-based company that provides tailored staffing solutions and other quality services to clients in the hospitality industry.</div>
                </div>
                <div class="w-full p-4 text-blue-800 bg-white border border-blue-800 rounded-xl">
                    <div class="mb-2 text-4xl text-center">Our vision</div>
                    <div>Our vision is to make Specialised  Solutions Group a leading provider of integrated personnel, cleaning and supply solutions to hospitality, event and other businesses.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-row-reverse justify-center w-full py-8 text-white bg-blue-800">
        <div class="flex flex-col justify-center w-4/5 gap-4">
            <div class="flex flex-row-reverse gap-8 px-8 text-xl text-justify">
                <div class="flex items-center justify-center w-1/2">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d106002.83625376855!2d151.205811!3d-33.874491!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfca0bcd01cf2ef3e!2sSpecialised%20Staffing%20Solutions!5e0!3m2!1sen!2sin!4v1622997287434!5m2!1sen!2sin" width="600" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="flex flex-col items-start justify-end w-1/2">
                    <div class="mb-6 text-3xl uppercase">About Us</div>
                    <div class="text-2xl">Specialised Staffing Solutions Pvt. Ltd</div>
                    <div class="text-xl">Suite 607, Level 6</div>
                    <div class="text-xl">97-99 Bathurst Street</div>
                    <div class="text-xl">Sydney NSW 2000</div>
                    <a class="text-xl font-bold underline" href="{{ route('contactUs') }}">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</div>
