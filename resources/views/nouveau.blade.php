<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($etudiant->name)}} {{__($formation->name)}} {{__($niveau->libelle) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex border border-blue-900" style="height: 450px;">
    
                <div class="flex flex-col items-center w-2/5 p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                    <form method="POST" action="{{ route('nouveaupost') }}">
                        @if(Session::get('success'))
                            <div class="text-green-600 font-sans">
                            {{ Session::get('success') }}
                            </div>
                        @endif
                        @if(Session::get('fail'))
                            <div class="text-red-600 font-sans">
                            {{ Session::get('fail') }}
                            </div>
                        @endif
                        @csrf
                        <div>
                            <x-label for="montant" value="{{ __('Montant') }}" />
                            <x-input id="montant" class="block mt-1 w-full" type="number" name="montant" :value="old('montant')" required autofocus autocomplete="montant" />
                        </div>

                        <div class="mt-4">
                            {{-- <x-label for="phone" value="{{ __('Numéro') }}" /> --}}
                            <input type="hidden" name="phone" id="phone" value="{{$etudiant->phone}}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" readonly>
                        </div>

                        <div class="mt-4">
                            <select name="type" id="type" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" value="{{ old('type') }}">
                                <option value="">Type</option>
                                <option value="Scolarité">Scolarité</option>
                                <option value="Inscription">Inscription</option>
                            </select>
                        </div>

                        <div class="mt-4 flex flex-auto">
                            <input type="radio" id="paiementChoice1" name="modePaiement" value="Espéce" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" checked onchange="masquer()">
                            <label for="paiementChoice1" class="mx-3 block font-medium text-sm text-gray-700 dark:text-gray-300">Espéce</label>
                            <input type="radio" id="paiementChoice2" name="modePaiement" value="Chéque" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" onchange="affiche()">
                            <label for="paiementChoice2" class="mx-3 block font-medium text-sm text-gray-700 dark:text-gray-300">Chéque</label>
                        </div>

                        <div class="mt-4 flex flex-col">
                            <x-label for="detail1" id="num" value="{{ __('Numéro chéque') }}" class="hidden"/>
                            <input type="hidden" name="detail1" id="detail1" value="{{ old('detail1') }}" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" required>
                            <x-label for="detail2" id="bank" value="{{ __('Bank') }}" class="hidden"/>
                            <input type="hidden" name="detail2" id="detail2" value="{{ old('detail2') }}" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <input type="hidden" name="code" id="" value="{{$niveau->code}}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" readonly>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Valider') }}
                            </x-button>
                        </div>
                    </form>
                </div>
                <script>
        
                    function affiche() {
                        document.getElementById("detail1").type = "number";    
                        document.getElementById("num").className = "block font-medium text-sm text-gray-700 dark:text-gray-300";
                        document.getElementById("detail2").type = "text";    
                        document.getElementById("bank").className = "block font-medium text-sm text-gray-700 dark:text-gray-300";
                    }

                    function masquer() {
                        document.getElementById("detail1").type = "hidden";    
                        document.getElementById("num").className = "hidden";
                        document.getElementById("detail2").type = "hidden";    
                        document.getElementById("bank").className = "hidden";
                    }

                </script>
                <div class="w-3/5 p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-l border-white dark:border-gray-700" style="overflow: auto;">
                    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white text-center">Historiques de paiement</h1>
                    
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                          <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden flex flex-col items-center justify-center">
                              <table class="min-w-full">
                                <thead class="border-b">
                                  <tr>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">
                                      #
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">
                                      Date
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">
                                      Mens
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">
                                      Montant
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @if ($paiements != NULL)                                     
                                    @foreach ($paiements as $paiement) 
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
                                        </tr>
                                    @endforeach
                                  <tr class="border-b transition duration-300 ease-in-out">
                                    <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">TOTAL</td>             
                                    <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                        {{$total}}
                                    </td>
                                  </tr>
                                  <tr class="border-b transition duration-300 ease-in-out">
                                    <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">RESTANT</td>             
                                    <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                        {{945000-$total}}
                                    </td>
                                  </tr> 
                                  @endif
                                </tbody>
                              </table>
                              <div class="flex items-center justify-center mt-4">
                                <x-button class="ml-4">
                                    {{ __('Imprimer le reçu') }}
                                </x-button>
                            </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>