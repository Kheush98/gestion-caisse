<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg border border-blue-900">
                {{-- <x-welcome /> --}}
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    {{-- <x-application-logo class="block h-12 w-auto" /> --}}
                
                    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white text-center">
                        Mes Transactions
                    </h1>
                </div>
                
                <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 lg:gap-8 p-6 lg:p-8" style="overflow: auto; height:300px;">
                    <table class="">
                        <thead class="border-b">
                            <tr>
                              {{-- <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-center">
                                #
                              </th> --}}
                              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                Date
                              </th>
                              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                Mens
                              </th>
                              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                Montant
                              </th>
                              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                Etudiant
                              </th>
                              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                Département
                              </th>
                              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                Formation
                              </th>
                              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                Niveau
                              </th>
                              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                Téléphone
                              </th>
                              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                Mode
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            @if ($paiements != NULL)                   
                                @foreach ($paiements as $paiement)
                                    @foreach ($paiement->etudiant->formations as $formation)
                                        
                                    <tr class="border-b transition duration-300 ease-in-out">
                                    {{-- <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                        {{$paiement->id}}
                                    </td> --}}
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
                                    <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                        {{$paiement->modePaiement}}
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col items-center">
            <form action="{{ route('nouveau') }}" method="GET" style="display: none">
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
                <div class="mt-4 flex items-center justify-center">
                    <x-button class="">
                        {{ __('Valider') }}
                    </x-button>
                </div> 
            </form>
            <div class="text-sm w-full border-b border-white text-white mt-8 flex items-center justify-center font-bold">
                Nouveau paiement
            </div>
            <button>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
            </svg>
        </button>                        
        </div>
    </div>
</x-app-layout>