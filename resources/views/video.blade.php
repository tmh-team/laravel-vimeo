<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vimeo Video</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container mx-auto">
        <div class="lg:flex lg:space-x-10 lg:p-10">
            <div class="lg:w-1/2">
                <div class="bg-gray-50 shadow rounded mx-auto p-10">
                    @if($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="bg-red-200 p-2 my-2">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form action="/" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="title" placeholder="Title" class="border w-full p-3 mt-5">
            
                        <textarea name="description" placeholder="Description" class="border w-full p-3 mt-5"></textarea>
            
                        <input type="file" name="video" class="mt-5 w-full">
            
                        <button type="submit" class="mt-5 bg-blue-500 hover:bg-blue-600 px-4 py-2 text-white rounded shadow">Upload</button>
                    </form>
                </div>
            </div>
            <div class="lg:w-1/2 space-y-5">
                @foreach ($videos as $video)
                    <div class="border p-5">{{ $video->vimeo_video_id }}</div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>