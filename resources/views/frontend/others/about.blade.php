<x-guest-layout>

    <div class="flex items-center justify-center h-[80vh]">
        <div class="p-10">

            <div class="grid grid-cols-2 gap-3">
                <div class="flex justify-center flex-col">
                    <p class="text-3xl underline mb-2">About Alexandria: </p>
                    <p class="text-[16px] font-normal">
                        Welcome to Alexandria Archives, a digital tribute to the Great Library of Alexandria. Dive into
                        a curated collection spanning arts, sciences, philosophy, and history, seamlessly blending
                        ancient wisdom with modern innovation. Journey through our virtual shelves to connect with the
                        intellectual legacy of scholars and embrace a timeless pursuit of knowledge.
                        <br> <br>
                        At Alexandria Archives, we believe in the transformative power of information. Join us in this
                        digital sanctuary where the echoes of ancient wisdom resonate, guiding you through corridors of
                        enlightenment. Explore, learn, and discover a space where the past converges with the future,
                        and knowledge knows no bounds.
                    </p>
                </div>
                <div class="grid grid-cols-3 gap-2">
                    @for ($i = 0; $i < 9; $i++)
                        @if ($i % 2 == 0)
                            <div class="flex items-center justify-center">
                                <img src="https://picsum.photos/200?random={{ $i }}" class="w-[40%]">
                            </div>
                        @else
                            <img src="https://picsum.photos/200?random={{ $i }}" class="w-[80%]">
                        @endif
                    @endfor
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
