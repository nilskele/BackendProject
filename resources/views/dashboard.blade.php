@extends('layouts.fullwidth')

@section('content')
<script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
<style>
   body {
            font-family: 'Roboto', sans-serif;
        }
        .slider-nav button {
            transition: all 0.3s ease;
        }
        .slider-nav button.active {
            color: #1D4ED8;
            border-bottom: 2px solid #1D4ED8;
        }

       
    
    .slider-content {
        display: none;
    }

   
    .slider-content.active {
        display: block;
    }


  </style>

  

<div class="bg-white shadow-md rounded-lg p-6 mb-8 flex items-center space-x-6">
    
    <div class="w-32 h-32 rounded-full overflow-hidden">
        @if ($user && $user->profile_image)
            <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" class="w-32 h-32 rounded-full object-cover">
        @else
            <p>No profile image available</p>
        @endif
    </div>

    
    <div>
        <h3 class="text-3xl font-semibold text-gray-800">{{ $user->name }}</h3>
        <p class="text-gray-600 mt-2">{{ $user->bio }}</p>

        
        <p class="mt-3 text-sm text-gray-500">
            {{ $user->is_admin ? 'Admin' : 'User' }}
        </p>
    </div>
</div>

    
    @if ($isOwner)
    <div class="flex justify-end mb-4">
        <button 
            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700" 
            onclick="document.getElementById('add-post-modal').classList.remove('hidden')">
            Add Post
        </button>
    </div>
</div>

    <div id="add-post-modal" class="hidden z-10	 fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full">
        <h2 class="text-lg font-semibold mb-4">Add New Post</h2>
        <form method="POST" action="{{ route('dashboard.store') }}" enctype="multipart/form-data" class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
        <div>
            <label for="title" class="block font-medium">Title</label>
            <input type="text" id="title" name="title" class="w-full mt-1 border rounded-md p-2" required>
        </div>

        <div>
            <label for="location" class="block font-medium">Location</label>
            <input type="text" id="location" name="location" class="w-full mt-1 border rounded-md p-2" required>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
        <div>
            <label for="text" class="block font-medium">Text</label>
            <textarea id="text" name="text" class="w-full mt-1 border rounded-md p-2" required></textarea>
        </div>

        <div>
            <label for="image" class="block font-medium">Image</label>
            <input type="file" id="image" name="image" class="w-full mt-1">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
        <div>
            <label for="begin_date" class="block font-medium">Begin Date</label>
            <input type="date" id="begin_date" name="begin_date" class="w-full mt-1 border rounded-md p-2" required>
        </div>

        <div>
            <label for="end_date" class="block font-medium">End Date</label>
            <input type="date" id="end_date" name="end_date" class="w-full mt-1 border rounded-md p-2" required>
        </div>
    </div>

    <div class="mb-4">
        <label for="categories" class="block font-medium">Categories</label>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 mt-2">
            @foreach($categories as $category)
                <div class="flex items-center">
                    <input type="checkbox" 
                           id="category_{{ $category->id }}" 
                           name="categories[]" 
                           value="{{ $category->id }}" 
                           class="mr-2">
                    <label for="category_{{ $category->id }}" class="text-sm">{{ $category->name }}</label>
                </div>
            @endforeach
        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-700">Save</button>
        <button type="button" 
                class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-700 ml-2"
                onclick="hideAddPostModal()">
            Cancel
        </button>
    </div>
</form>



            @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 mb-6 rounded-md">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
@endif

    

<div class="container mx-auto p-4">
<div class="slider-nav flex justify-around mb-4">
    <button class="text-gray-600 py-2 px-4 focus:outline-none" id="ongoingBtn">Ongoing Liquidations</button>
    <button class="text-gray-600 py-2 px-4 focus:outline-none" id="upcomingBtn">Upcoming Liquidations</button>
    <button class="text-gray-600 py-2 px-4 focus:outline-none" id="pastBtn">Past Liquidations</button>
</div>


    <div class="slider-content" id="ongoing" style="">
   
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @if(isset($posts) && $posts->isNotEmpty())
            @foreach ($posts->where('begin_date', '<=', now())->where('end_date', '>=', now()) as $post)
            <div class="bg-white p-4 rounded shadow">
                <img alt="Image of a past liquidation item 1" class="w-full h-48 object-cover rounded mb-4" height="200" src="{{ asset('storage/' . $post->image) }}" width="300"/>
                <p style="margin-bottom: 10px; color: #555;">Categories:</p>
        <div style="display: flex; flex-wrap: wrap; gap: 10px;">
            @forelse ($post->categories as $category)
                <span style="
                    display: inline-block;
                    padding: 8px 12px;
                    border: 2px solid #4CAF50;
                    
                    font-size: 0.9rem;
                    
                    text-align: center;
                    background-color: #f9fff9;
                ">
                    {{ $category->name }}
                </span>
            @empty
                <span style="
                    display: inline-block;
                    padding: 8px 12px;
                    border: 2px solid #f44336;
                    
                    font-size: 0.9rem;
                    
                    text-align: center;
                    background-color: #fff5f5;
                ">
                    No categories assigned
                </span>
            @endforelse
        </div>
                <h2 class="break-words overflow-hidden text-xl font-bold mb-2">
                {{ $post->title }}
                </h2>
                <p class="break-words overflow-hidden text-gray-600">
                {{ $post->text }}
                </p>
                <p class="break-words overflow-hidden text-sm text-gray-500">{{ $post->location }}</p>
                <p class="text-sm text-gray-500">
                                    From: {{ $post->begin_date ? $post->begin_date->format('M d, Y') : 'N/A' }} 
                                    To: {{ $post->end_date ? $post->end_date->format('M d, Y') : 'N/A' }}                    
                </p>
                @if (auth()->id() === $post->user_id)
    <div class="mt-4">
        <form action="{{ route('dashboard.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-700">
                Delete Post
            </button>
        </form>
    </div>
    @endif
            </div>
            @endforeach
            @else
    <p>No posts available</p>
    @endif
        </div>
        
   </div>
   <div class="slider-content" id="upcoming" style="">
   
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @if(isset($posts) && $posts->isNotEmpty())
            @foreach ($posts->where('begin_date', '>', now()) as $post)

            <div class="bg-white p-4 rounded shadow">
                <img alt="Image of a past liquidation item 1" class="w-full h-48 object-cover rounded mb-4" height="200" src="{{ asset('storage/' . $post->image) }}" width="300"/>
                <div style="display: flex; flex-wrap: wrap; gap: 10px;">
            @forelse ($post->categories as $category)
                <span style="
                    display: inline-block;
                    padding: 8px 12px;
                    border: 2px solid #4CAF50;
                    
                    font-size: 0.9rem;
                    
                    text-align: center;
                    background-color: #f9fff9;
                ">
                    {{ $category->name }}
                </span>
            @empty
                <span style="
                    display: inline-block;
                    padding: 8px 12px;
                    border: 2px solid #f44336;
                    
                    font-size: 0.9rem;
                    
                    text-align: center;
                    background-color: #fff5f5;
                ">
                    No categories assigned
                </span>
            @endforelse
        </div>
                <h2 class="break-words overflow-hidden text-xl font-bold mb-2 ">
                {{ $post->title }}
                </h2>
                <p class="break-words overflow-hidden text-gray-600">
                {{ $post->text }}
                </p>
                <p class=" break-words overflow-hidden text-sm text-gray-500">{{ $post->location }}</p>
                <p class="text-sm text-gray-500">
                                    From: {{ $post->begin_date ? $post->begin_date->format('M d, Y') : 'N/A' }} 
                                    To: {{ $post->end_date ? $post->end_date->format('M d, Y') : 'N/A' }}                    
                </p>
                @if (auth()->id() === $post->user_id)
    <div class="mt-4">
        <form action="{{ route('dashboard.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-700">
                Delete Post
            </button>
        </form>
    </div>
    @endif
            </div>

            @endforeach
            @else
            <p>No posts available</p>
            @endif
        </div>
        
   </div>
   <div class="slider-content" id="past" style="">
   
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @if(isset($posts) && $posts->isNotEmpty())
            @foreach ($posts->where('end_date', '<', now()) as $post)

            <div class="bg-white p-4 rounded shadow">
                <img alt="Image of a past liquidation item 1" class="w-full h-48 object-cover rounded mb-4" height="200" src="{{ asset('storage/' . $post->image) }}" width="300"/>
                <div style="display: flex; flex-wrap: wrap; gap: 10px;">
            @forelse ($post->categories as $category)
                <span style="
                    display: inline-block;
                    padding: 8px 12px;
                    border: 2px solid #4CAF50;
                    
                    font-size: 0.9rem;
                    
                    text-align: center;
                    background-color: #f9fff9;
                ">
                    {{ $category->name }}
                </span>
            @empty
                <span style="
                    display: inline-block;
                    padding: 8px 12px;
                    border: 2px solid #f44336;
                    
                    font-size: 0.9rem;
                    
                    text-align: center;
                    background-color: #fff5f5;
                ">
                    No categories assigned
                </span>
            @endforelse
        </div>
                <h2 class="break-words overflow-hidden text-xl font-bold mb-2">
                {{ $post->title }}
                </h2>
                <p class="break-words overflow-hidden text-gray-600">
                {{ $post->text }}
                </p>
                <p class="break-words overflow-hidden text-sm text-gray-500">{{ $post->location }}</p>
                <p class="text-sm text-gray-500">
                                    From: {{ $post->begin_date ? $post->begin_date->format('M d, Y') : 'N/A' }} 
                                    To: {{ $post->end_date ? $post->end_date->format('M d, Y') : 'N/A' }}                    
                </p>
                @if (auth()->id() === $post->user_id)
    <div class="mt-4">
        <form action="{{ route('dashboard.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-700">
                Delete Post
            </button>
        </form>
    </div>
    @endif
            </div>
            @endforeach
            @else
            <p>No posts available</p>
            @endif
        </div>
        
        
   </div>
   
</div>
<script>
    function hideAddPostModal() {
    const modal = document.getElementById('add-post-modal');
    modal.classList.add('hidden');
}
document.addEventListener('DOMContentLoaded', function () {
    const buttons = {
        ongoing: document.getElementById('ongoingBtn'),
        upcoming: document.getElementById('upcomingBtn'),
        past: document.getElementById('pastBtn'),
    };

    const sections = {
        ongoing: document.getElementById('ongoing'),
        upcoming: document.getElementById('upcoming'),
        past: document.getElementById('past'),
    };

    function switchSection(sectionToShow) {
        Object.keys(sections).forEach((key) => {
            sections[key].classList.remove('active');
            buttons[key].style.color = ''; 
            buttons[key].style.borderBottom = ''; 
        });

        
        sections[sectionToShow].classList.add('active');
        buttons[sectionToShow].style.color = '#1D4ED8'; 
        buttons[sectionToShow].style.borderBottom = '2px solid #1D4ED8'; 
    }

    buttons.ongoing.addEventListener('click', () => switchSection('ongoing'));
    buttons.upcoming.addEventListener('click', () => switchSection('upcoming'));
    buttons.past.addEventListener('click', () => switchSection('past'));

    switchSection('ongoing');
});
</script>



@endsection
