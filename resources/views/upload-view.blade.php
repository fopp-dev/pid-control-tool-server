   
  <x-app-layout>
  <div class="container mx-auto">
    <br />
    <h1 class="text-center text-2xl">Bot Uploading</h1>
    <br />

    <div class="bg-white rounded-lg shadow-lg w-full h-full">
      <div class="bg-gray-200 rounded-t-lg shadow-sm mb-2">
        <h3 class="leading-tight text-2xl text-gray-800 p-2">Select Bot Files</h3>
      </div>
      <div class="px-4 py-2">
        <form id="dropzoneForm" class="dropzone" action="{{ route('uploadFile')}}" enctype="multipart/form-data">
          @csrf
        </form>
        <div class="flex justify-center">
          <button type="button" class="bg-teal-500 text-gray-100 rounded hover:bg-teal-400 px-4 py-2 focus:outline-none" id="submit-all">Upload</button>
        </div>
      </div>
    </div>
    <br />
    <div class="bg-white rounded-lg shadow-lg w-full h-full">
      <div class="bg-gray-200 rounded-t-lg shadow-sm mb-2">
        <h3 class="leading-tight text-2xl text-gray-800 p-2">Uploaded Bot Files</h3>
      </div>
      <div class="grid grid-cols-12 h-auto p-3" id="uploaded_file">
      
      </div>
    </div>
  </div>
  </x-app-layout>

