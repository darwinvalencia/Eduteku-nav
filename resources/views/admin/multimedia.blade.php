<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Multimedia</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/> <!--Replace with your tailwind.css once created-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal mt-12">

    @include('components.nav-header-dashboard')


<main>

    <div class="flex flex-col md:flex-row">
        @include('components.nav-dashboard')
        <section class="w-full">
            <div id="main" class="main-content mt-12 md:mt-2 pb-24 md:pb-5">

                <div class="bg-gray-100 pt-3">
                    <div class="rounded-tl-3xl bg-gradient-to-r from-gray-100 to-green-600 p-4 shadow text-2xl text-current">
                        <h1 class="font-bold pl-2">Multimedia</h1>
                    </div>
                </div>

                <div class="pt-10 py-10 px-10">
                    <button id="openModal" class="inline-flex items-center bg-green-500 border-0 py-1 px-3 focus:outline-none hover:bg-green-600 text-white rounded text-base mt-4 md:mt-0">Agregar Multimedia</button>
                </div>
                
                <div class="flex flex-wrap w-full py-20 px-12 lg:px-24 shadow-xl mb-24">
                    
                        <!--tablet-->
                        <div class="flex flex-col w-full">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                              <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                  <table
                                    class="min-w-full text-left text-sm font-light text-surface">
                                    <thead
                                      class="border-b border-neutral-200 font-medium">
                                      <tr>
                                        <th scope="col" class="px-6 py-4">#</th>
                                        <th scope="col" class="px-6 py-4">Nombre</th>
                                        <th scope="col" class="px-6 py-4">Estado</th>
                                        <th scope="col" class="px-6 py-4">Categoria</th>
                                        <th scope="col" class="px-6 py-4">Accion</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr class="border-b border-neutral-200">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">1</td>
                                        <td class="whitespace-nowrap px-6 py-4">Mark</td>
                                        <td class="whitespace-nowrap px-6 py-4">Mark</td>
                                        <td class="whitespace-nowrap px-6 py-4">Mark</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <button class="bg-red-400 text-white p-2 rounded"><i class="fa fa-trash"></i></button>
                                            <button class="bg-gray-400 text-white p-2 rounded"><i class="fa fa-pen"></i></button>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        <!--Modal-->
                        <div id="modal-component-container" class="hidden fixed inset-0">
                            <div class="modal-flex-container flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                <div class="modal-bg-container fixed inset-0 bg-gray-700 bg-opacity-75"></div>
                                <div class="modal-space-container hidden sm:inline-block sm:align-middle sm:h-screen"></div>

                                <div id="modal-container" class="modal-container inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all ms:my-8 sm:align-middle sm:max-w-lg w-full">
                                    <div class="modal-wrapper bg-white px-4 pt-5 pb-4 sm:p-6 sm:pd-4">
                                        <div class="modal-wrapper-flex sm:flex sm:item-start">
                                            <div class="modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-600 sm:mx-0 sm:h-10 sm:w-10"><i class="fa fa-layer-group fa-2x fa-inverse"></i></div>
                                            <div class="modal-content text-center mt-3 sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-lg font-medium text-gray-900">Agregar Multimedia</h3>
                                                <div class="modal-text">
                                                    <form>
                                                        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                                                        <div class="-mx-3 md:flex mb-6">
                                                              <div class="md:w-full px-3">
                                                                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                                                                  Nombre
                                                                </label>
                                                                <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="application-link" type="text" placeholder="Nombre">
                                                              </div>
                                                        </div>
                                                        <div class="-mx-3 md:flex mb-6">
                                                            <div class="md:w-full px-3">
                                                              <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                                                                Estado
                                                              </label>
                                                              <select class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="application-link" placeholder="Nombre">
                                                                <option value="">Selecciona una opción</option>
                                                                <option value="opcion1">Opción 1</option>
                                                                <option value="opcion2">Opción 2</option>
                                                                <option value="opcion3">Opción 3</option>
                                                              </select>                                                              
                                                            </div>
                                                      </div>
                                                      <div class="-mx-3 md:flex mb-6">
                                                        <div class="md:w-full px-3">
                                                          <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                                                            Categoria
                                                          </label>
                                                          <select class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="application-link" placeholder="Nombre">
                                                            <option value="">Selecciona una opción</option>
                                                            <option value="opcion1">Opción 1</option>
                                                            <option value="opcion2">Opción 2</option>
                                                            <option value="opcion3">Opción 3</option>
                                                          </select>                                                          
                                                        </div>
                                                  </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-actions bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <button id="closeModal" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-green-500 font-medium text-gray-50 hover:bg-gray-700 hover:text-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"><i class="fa fa-plus"></i>Agregar</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </section>
    </div>
</main>
<script>
    document.getElementById('openModal').addEventListener('click', function() {
    document.getElementById('modal-component-container').classList.remove('hidden');
});

document.getElementById('closeModal').addEventListener('click', function() {
    document.getElementById('modal-component-container').classList.add('hidden');
});

</script>
</body>
</html>