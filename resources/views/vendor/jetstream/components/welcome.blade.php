<div class="p-6 sm:px-20 bg-white border-b border-gray-200"> 
    <div class="grid grid-cols-3 gab-6">
        @foreach ($postsArr["data"] as $post )
            <article>
                {{ $post["name"] }}  
            </article>
            
        @endforeach
    </div>
</div>
 

