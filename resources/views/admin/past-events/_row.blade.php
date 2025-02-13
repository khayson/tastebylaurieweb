<tr>
    <td class="px-6 py-4 whitespace-nowrap">
        @if($event->cover_image)
            <img src="{{ $event->cover_image }}" alt="{{ $event->title }}" class="h-20 w-32 object-cover rounded-lg">
        @else
            <div class="h-20 w-32 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                <span class="text-gray-400 dark:text-gray-500">No image</span>
            </div>
        @endif
    </td>
    <td class="px-6 py-4">
        <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $event->title }}</div>
        <div class="text-sm text-gray-500 dark:text-gray-400 mt-1 line-clamp-2">
            {{ $event->description }}
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
        {{ $event->location }}
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
        {{ $event->event_date->format('M d, Y') }}
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
        <button onclick="viewPastEvent({{ $event->id }})"
                class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300">
            View
        </button>
        <button onclick="openPastEventModal({{ $event->id }})"
                class="text-primary-600 dark:text-primary-400 hover:text-primary-900 dark:hover:text-primary-300">
            Edit
        </button>
        <button onclick="deletePastEvent({{ $event->id }})"
                class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">
            Delete
        </button>
    </td>
</tr>
