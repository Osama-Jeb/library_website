<div>

    <div>
        <p class="text-center text-4xl mb-6">My Collection:</p>
    </div>
    <div class="flex items-center justify-center">
        <div class="grid grid-cols-2 gap-4">
            @forelse ($this->ownedBooks() as $book)
                <x-book-card wire:key='card-{{ $book->id }}' :$book />
            @empty
        </div>
        <div class="animate-pulse">
            <svg width="250px" height="250px" viewBox="0 -19.5 180 180" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0)">
                    <path
                        d="M156.96 0.381836C159.703 0.684628 162.453 0.940059 165.189 1.29938C174.067 2.46897 178.4 7.35699 178.83 16.3608C179.613 32.7597 178.758 49.1215 178.153 65.5031C177.744 76.5557 178.271 87.6408 178.214 98.7102C178.178 105.346 178.177 112.016 177.538 118.61C176.171 132.687 168.11 140.015 153.925 140.475C149.274 140.626 144.611 140.461 139.954 140.44C127.761 140.383 115.569 140.324 103.376 140.264C83.8624 140.146 64.348 140.078 44.8358 139.814C41.0693 139.681 37.3232 139.199 33.6457 138.373C28.0149 137.228 23.9946 133.594 20.9075 128.976C17.6148 124.05 15.6283 118.483 14.1677 112.804C10.9202 100.179 7.82017 87.516 4.86753 74.8163C3.40959 68.5785 2.18252 62.2722 1.17079 55.9454C0.133106 49.4211 3.001 45.5278 9.50725 44.2984C13.3032 43.5837 17.1601 43.174 21.1513 42.6035C21.2648 42.0051 21.39 41.3765 21.5028 40.7456C22.1851 36.9353 24.3403 34.0877 27.9384 32.9337C32.3296 31.451 36.8466 30.3729 41.4335 29.7128C61.6267 27.1436 81.9388 27.6772 102.229 27.8143C103.225 27.8214 104.222 27.7963 105.216 27.7496C105.41 27.7405 105.595 27.5612 105.858 27.4215C105.858 24.9465 105.8 22.4288 105.874 19.9149C105.955 17.1508 106.03 14.3763 106.333 11.631C107.006 5.53678 109.317 2.90655 115.492 2.12682C121.308 1.39258 127.2 1.24432 133.063 0.886297C136.59 0.670573 140.122 0.546877 143.652 0.381836H156.96ZM10.2674 52.2879C10.3446 53.949 10.5047 55.6056 10.7473 57.2506C13.778 71.7253 16.7503 86.2139 19.9567 100.649C21.8535 109.52 25.16 118.029 29.7498 125.85C31.8122 129.313 34.756 131.057 38.7115 131.113C42.7974 131.172 46.8878 131.123 50.9762 131.118C71.7066 131.094 92.4368 131.073 113.167 131.053C121.591 131.053 130.015 131.151 138.439 131.21C144.204 131.249 149.968 131.34 155.732 131.323C158.527 131.388 161.266 130.53 163.527 128.884C166.608 126.577 167.134 124.006 165.3 120.622C164.646 119.468 164.054 118.281 163.524 117.066C158.466 104.815 153.224 92.6342 148.478 80.2646C145.684 72.8072 142.032 65.7006 137.597 59.0896C134.018 53.8316 129.267 50.2105 122.818 49.3392C119.097 48.7513 115.34 48.4317 111.575 48.3823C100.823 48.4882 90.0742 48.8599 79.3244 49.1374C60.4853 49.6227 41.6436 50.0409 22.8103 50.6647C18.7705 50.7986 14.7566 51.6856 10.2674 52.2879ZM167.659 102.702L168.317 102.673C168.317 101.353 168.391 100.029 168.306 98.7148C167.194 81.3341 167.86 63.9767 168.596 46.5979C169.002 36.9924 168.498 27.3419 168.227 17.7168C168.105 13.3543 167.458 12.893 163.104 12.4908C161.779 12.3686 160.449 12.2312 159.122 12.2312C146.483 12.2412 133.844 12.2729 121.206 12.3271C119.681 12.3349 118.158 12.6002 116.594 12.7497C116.594 16.6197 116.554 20.2431 116.609 23.8649C116.643 26.0741 116.966 28.2893 116.907 30.4927C116.803 34.3725 115.415 36.1186 111.6 36.9809C109.14 37.5954 106.619 37.9318 104.084 37.9841C92.1113 37.9334 80.1325 37.3991 68.1687 37.6401C58.2141 37.8429 48.2692 38.7973 38.3353 39.6186C35.7087 39.8357 32.9096 40.1554 30.3582 42.4855C30.8961 42.6011 31.4409 42.6817 31.9893 42.7266C47.6167 42.4377 63.244 42.1391 78.8711 41.8306C92.0555 41.5493 105.239 40.991 118.424 40.9442C128.434 40.9085 137.272 44.4093 143.452 52.5106C147.577 57.8452 151.15 63.585 154.118 69.6428C158.225 78.1912 161.451 87.1625 165.036 95.9585C165.946 98.195 166.787 100.454 167.659 102.702Z"
                        fill="#000000" />
                </g>
                <defs>
                    <clipPath id="clip0">
                        <rect width="179" height="141" fill="white" transform="translate(0.777344)" />
                    </clipPath>
                </defs>
            </svg>
        </div>
        @endforelse
    </div>
</div>
