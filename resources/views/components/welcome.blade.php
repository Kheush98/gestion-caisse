<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    {{-- <x-application-logo class="block h-12 w-auto" /> --}}

    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white text-center">
        Mes Transactions
    </h1>
</div>

<div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 lg:gap-8 p-6 lg:p-8">
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
              Etudiant
            </th>
            <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">
              Département
            </th>
            <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">
              Formation
            </th>
            <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">
              Niveau
            </th>
            <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">
              Téléphone
            </th>
          </tr>
          <tbody>
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
              <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                  {{$paiement->etudiant->name}}
              </td>
              <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                  {{$paiement->etudiant->formations->departement->name}}
              </td>
              <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                  {{$paiement->etudiant->formations->name}}
              </td>
              <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                  {{$paiement->niveau->libelle}}
              </td>
              <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                  {{$paiement->etudiant_phone}}
              </td>
            </tr>
            @endforeach
          </tbody>
        </thead>
    </table>
</div>
