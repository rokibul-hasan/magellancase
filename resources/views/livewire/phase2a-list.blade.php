<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <x-wireloading />

    @if (session()->has('message'))
        {!! session('message') !!}
    @endif

    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-400 dark:text-gray-400">
                    <th class="px-4 py-3 bg-gray-400" rowspan="2">ENTITY</th>
                    {{-- <th class="px-4 py-3">Administrator</th> --}}
                    <th></th>
                    <th></th>
                    <th class="px-4 py-3 border text-center text-white" colspan="3">Deth Certificate</th>
                    <th class="px-4 py-3 border text-center text-white" colspan="3">Petition for Probate</th>
                    <th class="px-4 py-3 border text-center text-white" colspan="3">Swearing In</th>
                    <th class="px-4 py-3 border text-center text-white" colspan="3">Short Certificate</th>
                    <th class="px-4 py-3 border text-center text-white" colspan="3">Recovery Claim Package</th>
                    <th class="px-4 py-3 border text-center text-white" colspan="3"></th>
                    

                </tr>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                    <th class="px-4 py-3 border">Action</th>
                    <th class="px-4 py-3 border">Case Number</th>
                    <th class="px-4 py-3 border">Orderd</th>
                    <th class="px-4 py-3 border">Received</th>
                    <th class="px-4 py-3 border">Comments</th>

                    <th class="px-4 py-3 border-2 bg-gray-400 text-white">Submitted</th>
                    <th class="px-4 py-3 border-2 bg-gray-400 text-white">Approved</th>
                    <th class="px-4 py-3 border-2 bg-gray-400 text-white">Comments</th>

                    <th class="px-4 py-3 border">Scheduled</th>
                    <th class="px-4 py-3 border">Completed</th>
                    <th class="px-4 py-3 border">Comments</th>

                    <th class="px-4 py-3 border bg-gray-400 text-white">Ordered</th>
                    <th class="px-4 py-3 border bg-gray-400 text-white">Received</th>
                    <th class="px-4 py-3 border bg-gray-400 text-white">Comments</th>

                    <th class="px-4 py-3 border">Mailed</th>
                    <th class="px-4 py-3 border">Received</th>
                    <th class="px-4 py-3 border">Comments</th>

                    <th class="px-4 py-3 border bg-gray-400 text-white">Status</th>


                </tr>
            </thead>
            <tbody class="inlineTableBorder">

                @foreach ($rows as $row)                

                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 bg-gray-400">
                            {{ $row->name }} ({{ $row->id }})
                        </td>
                        <td class="text-center border">
                            @if ($editPhaseIndex === $row->id)
                              
                                <x-button wire:click.prevent="savePhase({{ $row->id }})"><i
                                        class="fa fa-check"></i></x-button>
                                <x-button wire:click.prevent="cancelPhase({{ $row->id }})"><i
                                        class="fa fa-times"></i></x-button>
                            @else

                            <a href="#" wire:click.prevent="editPhase({{$row->id}})"><i class="fa fa-edit"></i></a>

                                {{-- <x-button wire:click.prevent="editPhase1({{ $row->id }})"><i
                                        class="fa fa-edit"></i></x-button> --}}
                            @endif
                        </td>

                        <td class="whitespace-nowrap px-4 py-3 text-sm border relative">

                            @if ($editPhaseIndex === $row->id)
                                {{ $row->phase2a->case_number }}<br>
                                <input wire:model.lazy="phase.{{ $row->id }}.case_number" type="text"
                                    placeholder="Case Number" class="p-1">
                            @else
                                {{ $row->phase2a->case_number }}
                            @endif
                        </td>

                        <td class="whitespace-nowrap px-4 py-3 text-sm border relative">

                            @if ($editPhaseIndex === $row->id)
                                @if ($row->phase2a)
                                    {{ dformat($row->phase2a->deth_certificate_ordered) }} <br>
                                @endif
                                <x-datepicker wire:model.lazy="phase.{{ $row->id }}.deth_certificate_ordered"
                                    class="border" />
                            @else
                                @if ($row->phase2a)
                                    {{ dformat($row->phase2a->deth_certificate_ordered) }}
                                @endif
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 text-xs border">

                            @if ($editPhaseIndex === $row->id)
                                @if ($row->phase2a)
                                    {{ dformat($row->phase2a->deth_certificate_received) }}<br>
                                @endif
                                <x-datepicker wire:model.lazy="phase.{{ $row->id }}.deth_certificate_received"
                                    class="border" />
                            @else
                                @if ($row->phase2a)
                                    {{ dformat($row->phase2a->deth_certificate_received) }}
                                @endif
                            @endif
                        </td>
                        <td class="whitespace-nowrap w-48 px-4 py-3 text-sm border">
                            @if ($row->phase2a)
                                {{ $row->phase2a->deth_certificate_comments }}<br>
                            @endif
                            @if ($editPhaseIndex === $row->id)
                                <textarea wire:model.lazy="phase.{{ $row->id }}.deth_certificate_comments"
                                    class="border p-1"></textarea>
                            @else
                                @if ($row->phase2a)
                                    {{ $row->phase2a->deth_certificate_comments }}
                                @endif
                            @endif
                        </td>


                        <td class="whitespace-nowrap px-4 py-3 text-sm border bg-gray-400 text-white">
                            @if ($editPhaseIndex === $row->id)
                                @if ($row->phase2a)
                                    {{ dformat($row->phase2a->petition_submited) }}<br>
                                @endif
                                <x-datepicker wire:model.lazy="phase.{{ $row->id }}.petition_submited"
                                    class="border" />
                            @else
                                @if ($row->phase2a)
                                    {{ dformat($row->phase2a->petition_submited) }}
                                @endif
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm border bg-gray-400 text-white">
                            @if ($editPhaseIndex === $row->id)
                                @if ($row->phase2a)
                                    {{ dformat($row->phase2a->petition_approved) }}<br>
                                @endif
                                <x-datepicker
                                    wire:model.lazy="phase.{{ $row->id }}.petition_approved"
                                    class="border" />
                            @else
                                @if ($row->phase2a)
                                    {{ dformat($row->phase2a->petition_approved) }}
                                @endif
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm border bg-gray-400 text-white">
                            @if ($editPhaseIndex === $row->id)
                                @if ($row->phase2a)
                                    {{ $row->phase2a->petition_comments }}<br>
                                @endif
                                <textarea wire:model.lazy="phase.{{ $row->id }}.petition_comments"
                                    class="border p-1"></textarea>
                            @else
                                @if ($row->phase2a)
                                    {{ $row->phase2a->petition_comments }}
                                @endif
                            @endif
                        </td>


                        <td class="whitespace-nowrap px-4 py-3 text-sm border">
                            @if ($editPhaseIndex === $row->id)
                                @if ($row->phase2a)
                                    {{ dformat($row->phase2a->swearing_scheduled) }}<br>
                                @endif
                                <x-datepicker
                                    wire:model.lazy="phase.{{ $row->id }}.swearing_scheduled"
                                    class="border" />
                            @else
                                @if ($row->phase2a)
                                    {{ dformat($row->phase2a->swearing_scheduled) }}
                                @endif
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 text-xs border">
                            @if ($editPhaseIndex === $row->id)
                                @if ($row->phase2a)
                                    {{ dformat($row->phase2a->swearing_completed) }}<br>
                                @endif
                                <x-datepicker
                                    wire:model.lazy="phase.{{ $row->id }}.swearing_completed"
                                    class="border" />
                            @else
                                @if ($row->phase2a)
                                    {{ dformat($row->phase2a->swearing_completed) }}
                                @endif
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm border">
                            @if ($editPhaseIndex === $row->id)
                                @if ($row->phase2a)
                                    {{ $row->phase2a->swearing_comments }}<br>
                                @endif
                                <textarea wire:model.lazy="phase.{{ $row->id }}.swearing_comments"
                                    class="border p-1"></textarea>
                            @else
                                @if ($row->phase2a)
                                    {{ $row->phase2a->swearing_comments }}
                                @endif
                            @endif
                        </td>


                        <td class="whitespace-nowrap px-4 py-3 text-sm border bg-gray-400 text-white">
                            @if ($editPhaseIndex === $row->id)
                                @if ($row->phase2a)
                                    {{ dformat($row->phase2a->short_certificate_orderd) }}<br>
                                @endif
                                <x-datepicker wire:model.lazy="phase.{{ $row->id }}.short_certificate_orderd"
                                    class="border" />
                            @else
                                @if ($row->phase2a)
                                    {{ dformat($row->phase2a->short_certificate_orderd) }}
                                @endif
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm border bg-gray-400 text-white">
                            @if ($editPhaseIndex === $row->id)
                                @if ($row->phase2a)
                                    {{ dformat($row->phase2a->short_certificate_received) }}<br>
                                @endif
                                <x-datepicker
                                    wire:model.lazy="phase.{{ $row->id }}.short_certificate_received"
                                    class="border" />
                            @else
                                @if ($row->phase2a)
                                    {{ dformat($row->phase2a->short_certificate_received) }}
                                @endif
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm border bg-gray-400 text-white">
                            @if ($editPhaseIndex === $row->id)
                                @if ($row->phase2a)
                                    {{ $row->phase2a->short_certificate_chomments }}<br>
                                @endif
                                <textarea wire:model.lazy="phase.{{ $row->id }}.short_certificate_chomments"
                                    class="border p-1"></textarea>
                            @else
                                @if ($row->phase2a)
                                    {{ $row->phase2a->short_certificate_chomments }}
                                @endif
                            @endif
                        </td>



                        <td class="whitespace-nowrap px-4 py-3 text-sm border">
                            @if ($editPhaseIndex === $row->id)
                                @if ($row->phase2a)
                                    {{ dformat($row->phase2a->recovery_claim_package_mailed) }}<br>
                                @endif
                                <x-datepicker wire:model.lazy="phase.{{ $row->id }}.recovery_claim_package_mailed"
                                    class="border" />
                            @else
                                @if ($row->phase2a)
                                    {{ dformat($row->phase2a->recovery_claim_package_mailed) }}
                                @endif
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm border">
                            @if ($editPhaseIndex === $row->id)
                                @if ($row->phase2a)
                                    {{ dformat($row->phase2a->recovery_claim_package_returned) }}<br>
                                @endif
                                <x-datepicker
                                    wire:model.lazy="phase.{{ $row->id }}.recovery_claim_package_returned"
                                    class="border" />
                            @else
                                @if ($row->phase2a)
                                    {{ dformat($row->phase2a->recovery_claim_package_returned) }}
                                @endif
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm border ">
                            @if ($editPhaseIndex === $row->id)
                                @if ($row->phase2a)
                                    {{ $row->phase2a->recovery_claim_package_comments }}<br>
                                @endif
                                <textarea wire:model.lazy="phase.{{ $row->id }}.recovery_claim_package_comments"
                                    class="border p-1"></textarea>
                            @else
                                @if ($row->phase2a)
                                    {{ $row->phase2a->recovery_claim_package_comments }}
                                @endif
                            @endif
                        </td>


                        <td class="whitespace-nowrap px-4 py-3 text-sm border bg-gray-400">
                          @if ($editPhaseIndex === $row->id)

                          <label class="block">Select Status</label>
                          <select wire:model="phase.{{ $row->id }}.status">
                              <option value="pending" >Pending</option>
                              <option value="complete" >Complete</option>
                          </select>
                              

                          @else
                              @if ($row->phase2a)
                                  <span class="text-white">{{ $row->phase2a->status }}</span>
                              @endif
                          @endif
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
