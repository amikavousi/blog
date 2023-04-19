<div class="relative lg:inline-flex bg-gray-100 rounded-xl">
    <div x-data="{show: false}" @click.away="show = false">
        <button @click="show = !show"
                class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{isset($currentCategory) ? $currentCategory->title : "Category"}}

            <x-PostApp-icon name="down-arrow" />


        </button>
        <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-50 overflow-auto max-h-52" style="display: none">
            @if(isset($currentCategory))
                <a href="{{route('posts.all')}}"
                   class="block text-left px-3 text-sm hover:bg-gray-300 focus:bg-gray-300 " style="color: red">
                    All
                </a>
            @endif
            @foreach($categories as $category)
                <a href="{{route('category.posts', $category->slug)}}"
                   class="block text-left px-3 text-sm hover:bg-gray-300 focus:bg-gray-300
                            {{isset($current_category) && $current_category->is($category) ? "bg-blue-300" : ''}}
                       ">
                    {{ ucwords($category->title)}}
                </a>
            @endforeach
        </div>
    </div>
</div>
