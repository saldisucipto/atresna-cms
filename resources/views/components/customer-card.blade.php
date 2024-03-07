<section class=" w-full relative text-gray-900 p-3">
    <div class="max-w-screen-lg mx-auto py-5 flex flex-col gap-10 ">
        <div>
            <h2 class="text-left text-3xl text-primary font-semibold">We are trusted</h2>
            <span class="text-left text-sm italic text-primary font-semibold">Our Customer</span>
        </div>
        <div class="grid grid-cols-5 hape:grid-cols-2 grid-flow-row ">
            @foreach ($customer as $item)
                <div class="bg-slate-50 hover:drop-shadow hover:bg-slate-100  overflow-hidden ">
                    <div class="text-primary flex flex-col justify-start h-full ">
                        <div class=" h-40">
                            <img class=" object-cover h-full w-full "
                                src="/storage/img/customer/{{ $item->customer_logo }}" alt="">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</section>
