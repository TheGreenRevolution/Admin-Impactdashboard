<x-filament-widgets::widget>
    <x-filament::section icon="heroicon-o-clipboard-document-list">
        <x-slot name="heading">
            Projects in: Belgium
        </x-slot>
        <div class="w-full bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Image -->
            <div class="relative w-full">
                <img class="w-full h-48 object-cover" src="{{ asset('img/project-belgium.webp') }}" alt="Project Image">
                <!-- Overlay for navigation arrows -->
                <div class="absolute inset-0 flex items-center justify-between px-4">
                    <button class="bg-gray-600 bg-opacity-50 text-white p-1 rounded-full">‹</button>
                    <button class="bg-gray-600 bg-opacity-50 text-white p-1 rounded-full">›</button>
                </div>
            </div>

            <!-- Content -->
            <div class="p-4">
                <div class="flex flex-wrap justify-between">
                    <div class="w-1/2">
                        <h4 class="font-medium text-gray-600">CO2 eq. stored</h4>
                        <p class="font-semibold">73%</p>
                        <h4 class="font-medium text-gray-600">Economic value created</h4>
                        <p class="font-semibold">11,4%</p>
                    </div>
                    <div class="w-1/2">
                        <h4 class="font-medium text-gray-600">Energy & costs of ownership efficiency</h4>
                        <p class="font-semibold">73%</p>
                        <h4 class="font-medium text-gray-600">Biobased materials used</h4>
                        <p class="font-semibold">65%</p>
                    </div>
                </div>
            </div>

            <!-- Bottom Stats with Progress Bar -->
            <div class="p-4 border-t border-gray-200">
                <div class="flex justify-between items-center">
                    <span class="text-sm font-medium text-gray-600">Energy & costs of ownership efficiency</span>
                    <span class="font-bold">73%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                    <div class="bg-green-500 h-2 rounded-full" style="width: 73%;"></div>
                </div>
                <div class="mt-4">
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium text-gray-600">Biobased materials used</span>
                        <span class="font-bold">65%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                        <div class="bg-green-500 h-2 rounded-full" style="width: 65%;"></div>
                    </div>
                </div>
            </div>
        </div>

    </x-filament::section>
</x-filament-widgets::widget>