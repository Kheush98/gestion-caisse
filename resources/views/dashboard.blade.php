<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg border border-blue-600">
                {{-- <x-welcome /> --}}
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    {{-- <x-application-logo class="block h-12 w-auto" /> --}}
                
                    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white text-center">
                        Mes Transactions
                    </h1>
                    <table class="min-w-full">
                        <thead class="border-b">
                            <tr>
                              <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-center">
                                #
                              </th>
                              <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-center">
                                Date
                              </th>
                              <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-center">
                                Mens
                              </th>
                              <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-center">
                                Montant
                              </th>
                              <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-center">
                                Etudiant
                              </th>
                              <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-center">
                                Département
                              </th>
                              <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-center">
                                Formation
                              </th>
                              <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-center">
                                Niveau
                              </th>
                              <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-center">
                                Téléphone
                              </th>
                            </tr>
                          </thead>
                    </table>
                </div>
                
                <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 lg:gap-8 p-6 lg:p-8" style="overflow: auto; height:300px;">
                    <table class="min-w-full">
                          <tbody>
                            @if ($paiements != NULL)                   
                                @foreach ($paiements as $paiement)
                                    @foreach ($paiement->etudiant->formations as $formation)
                                        
                                    <tr class="border-b transition duration-300 ease-in-out">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                        {{$paiement->id}}
                                    </td>
                                    <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                        {{$paiement->date}}
                                    </td>
                                    <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                        {{$paiement->type}}
                                    </td>
                                    <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                        {{$paiement->montant}}
                                    </td>
                                    <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                        {{$paiement->etudiant->name}}
                                    </td>
                                    <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                        {{$formation->departement->name}}
                                    </td>
                                    <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                        {{$formation->name}}
                                    </td>
                                    <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                        {{$paiement->niveau->libelle}}
                                    </td>
                                    <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                        {{$paiement->etudiant_phone}}
                                    </td>
                                    </tr>
                                    @endforeach 
                                @endforeach
                            @endif
                          </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 content-center">
            <form action="{{ route('nouveau') }}" method="GET">
                @csrf
                <div>
                    <x-label for="phone" value="{{ __('Numéro Etudiant') }}" />
                    <x-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required autofocus autocomplete="username" />  
                </div> 
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-600">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif  
                <div class="mt-6">
                    <x-button class="">
                        {{ __('Valider') }}
                    </x-button>
                </div> 
            </form>          
        </div>
    </div>
</x-app-layout>