<x-app-layout>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{ __($title) }}
    </h2>


    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-400 dark:text-gray-400">
                        <th class="px-4 py-3 bg-gray-400" rowspan="2">ENTITY</th>
                        {{-- <th class="px-4 py-3">Administrator</th> --}}
                        <th class="px-4 py-3 border text-center text-white" colspan="3">Beneficiary Claim Form</th>
                        <th class="px-4 py-3 border text-center text-white" colspan="3">Death Certificate Affidavit</th>
                        <th class="px-4 py-3 border text-center text-white" colspan="3">Renunciation Form</th>
                        <th class="px-4 py-3 border text-center text-white" colspan="3">Affidavit and Release of Bond</th>
                    </tr>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        
                        <th class="px-4 py-3 border">Date Mailed</th>
                        <th class="px-4 py-3 border">Date Received</th>
                        <th class="px-4 py-3 border">Comment</th>

                        <th class="px-4 py-3 border-2 bg-gray-400 text-white">Date Mailed</th>
                        <th class="px-4 py-3 border-2 bg-gray-400 text-white">Date Received</th>
                        <th class="px-4 py-3 border-2 bg-gray-400 text-white">Comment</th>

                        <th class="px-4 py-3 border">Date Mailed</th>
                        <th class="px-4 py-3 border">Date Received</th>
                        <th class="px-4 py-3 border">Comment</th>

                        <th class="px-4 py-3 border bg-gray-400 text-white">Date Mailed</th>
                        <th class="px-4 py-3 border bg-gray-400 text-white">Date Received</th>
                        <th class="px-4 py-3 border bg-gray-400 text-white">Comment</th>
                        
                    </tr>
                </thead>
                <tbody class="">

                    @foreach ($rows as $row)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 bg-gray-400">
                                {{ $row->name }}
                            </td>

                            <td class="px-4 py-3 text-sm border">
                                
                            </td>
                            <td class="px-4 py-3 text-xs border">
                                
                            </td>
                            <td class="px-4 py-3 text-sm border">
                                
                            </td>


                            <td class="px-4 py-3 text-sm border bg-gray-400 text-white">
                                
                            </td>
                            <td class="px-4 py-3 text-sm border bg-gray-400 text-white">
                                
                            </td>
                            <td class="px-4 py-3 text-sm border bg-gray-400 text-white">
                                
                            </td>


                            <td class="px-4 py-3 text-sm border">
                                
                            </td>
                            <td class="px-4 py-3 text-xs border">
                                
                            </td>
                            <td class="px-4 py-3 text-sm border">
                                
                            </td>


                            <td class="px-4 py-3 text-sm border bg-gray-400 text-white">
                                
                            </td>
                            <td class="px-4 py-3 text-sm border bg-gray-400 text-white">
                                
                            </td>
                            <td class="px-4 py-3 text-sm border bg-gray-400 text-white">
                                
                            </td>
                        </tr>

                    @endforeach


                </tbody>
            </table>

            

        </div>
        <div class="p-2">

            {{ $rows->links() }}

        </div>


    </div>

</x-app-layout>
