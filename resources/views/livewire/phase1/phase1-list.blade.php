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
                      <th class="px-4 py-3 border text-center text-white" colspan="3">Beneficiary Claim Form</th>
                      <th class="px-4 py-3 border text-center text-white" colspan="3">Death Certificate Affidavit</th>
                      <th class="px-4 py-3 border text-center text-white" colspan="3">Renunciation Form</th>
                      <th class="px-4 py-3 border text-center text-white" colspan="3">Affidavit and Release of Bond</th>
                      <th class="px-4 py-3 border text-center text-white" colspan="3"></th>

                  </tr>
                  <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                      <th class="px-4 py-3 border">Action</th>
                      <th class="px-4 py-3 border">Case Number</th>
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
                      <th class="px-4 py-3 border bg-gray-400 text-white">Probated Estate</th>
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

                          

                              @if ($editPhase1Index === $row->id)
                                
                                  <x-button wire:click.prevent="savePhase1({{ $row->id }})"><i
                                          class="fa fa-check"></i></x-button>
                                  <x-button wire:click.prevent="cancelPhase1({{ $row->id }})"><i
                                          class="fa fa-times"></i></x-button>
                              @else

                              <a href="#" wire:click.prevent="editPhase1({{$row->id}})"><i class="fa fa-edit"></i></a>

                                  {{-- <x-button wire:click.prevent="editPhase1({{ $row->id }})"><i
                                          class="fa fa-edit"></i></x-button> --}}
                              @endif
                          </td>

                          <td class="whitespace-nowrap px-4 py-3 text-sm border relative">

                              @if ($editPhase1Index === $row->id)
                                  {{ $row->phase1->case_number }}<br>
                                  <input wire:model.lazy="phase1.{{ $row->id }}.case_number" type="text"
                                      placeholder="Case Number" class="p-1">
                              @else
                                  {{ $row->phase1->case_number }}
                              @endif
                          </td>

                          <td class="whitespace-nowrap px-4 py-3 text-sm border relative">

                              @if ($editPhase1Index === $row->id)
                                  @if ($row->phase1)
                                      {{ $row->phase1->claim_form_maild_date }} <br>
                                  @endif
                                  <x-datepicker wire:model.lazy="phase1.{{ $row->id }}.claim_form_maild_date"
                                      class="border" />
                              @else
                                  @if ($row->phase1)
                                      {{ $row->phase1->claim_form_maild_date }}
                                  @endif
                              @endif
                          </td>
                          <td class="whitespace-nowrap px-4 py-3 text-xs border">

                              @if ($editPhase1Index === $row->id)
                                  @if ($row->phase1)
                                      {{ $row->phase1->claim_form_receive_date }}<br>
                                  @endif
                                  <x-datepicker wire:model.lazy="phase1.{{ $row->id }}.claim_form_receive_date"
                                      class="border" />
                              @else
                                  @if ($row->phase1)
                                      {{ $row->phase1->claim_form_receive_date }}
                                  @endif
                              @endif
                          </td>
                          <td class="whitespace-nowrap w-48 px-4 py-3 text-sm border">
                              @if ($row->phase1)
                                  {{ $row->phase1->claim_comment }}<br>
                              @endif
                              @if ($editPhase1Index === $row->id)
                                  <textarea wire:model.lazy="phase1.{{ $row->id }}.claim_comment"
                                      class="border p-1"></textarea>
                              @else
                                  @if ($row->phase1)
                                      {{ $row->phase1->claim_comment }}
                                  @endif
                              @endif
                          </td>


                          <td class="whitespace-nowrap px-4 py-3 text-sm border bg-gray-400 text-white">
                              @if ($editPhase1Index === $row->id)
                                  @if ($row->phase1)
                                      {{ $row->phase1->affidavit_form_maild_date }}<br>
                                  @endif
                                  <x-datepicker wire:model.lazy="phase1.{{ $row->id }}.affidavit_form_maild_date"
                                      class="border" />
                              @else
                                  @if ($row->phase1)
                                      {{ $row->phase1->affidavit_form_maild_date }}
                                  @endif
                              @endif
                          </td>
                          <td class="whitespace-nowrap px-4 py-3 text-sm border bg-gray-400 text-white">
                              @if ($editPhase1Index === $row->id)
                                  @if ($row->phase1)
                                      {{ $row->phase1->affidavit_form_receive_date }}<br>
                                  @endif
                                  <x-datepicker
                                      wire:model.lazy="phase1.{{ $row->id }}.affidavit_form_receive_date"
                                      class="border" />
                              @else
                                  @if ($row->phase1)
                                      {{ $row->phase1->affidavit_form_receive_date }}
                                  @endif
                              @endif
                          </td>
                          <td class="whitespace-nowrap px-4 py-3 text-sm border bg-gray-400 text-white">
                              @if ($editPhase1Index === $row->id)
                                  @if ($row->phase1)
                                      {{ $row->phase1->affidavit_comment }}<br>
                                  @endif
                                  <textarea wire:model.lazy="phase1.{{ $row->id }}.affidavit_comment"
                                      class="border p-1"></textarea>
                              @else
                                  @if ($row->phase1)
                                      {{ $row->phase1->affidavit_comment }}
                                  @endif
                              @endif
                          </td>


                          <td class="whitespace-nowrap px-4 py-3 text-sm border">
                              @if ($editPhase1Index === $row->id)
                                  @if ($row->phase1)
                                      {{ $row->phase1->renunciation_form_maild_date }}<br>
                                  @endif
                                  <x-datepicker
                                      wire:model.lazy="phase1.{{ $row->id }}.renunciation_form_maild_date"
                                      class="border" />
                              @else
                                  @if ($row->phase1)
                                      {{ $row->phase1->renunciation_form_maild_date }}
                                  @endif
                              @endif
                          </td>
                          <td class="whitespace-nowrap px-4 py-3 text-xs border">
                              @if ($editPhase1Index === $row->id)
                                  @if ($row->phase1)
                                      {{ $row->phase1->renunciation_form_receive_date }}<br>
                                  @endif
                                  <x-datepicker
                                      wire:model.lazy="phase1.{{ $row->id }}.renunciation_form_receive_date"
                                      class="border" />
                              @else
                                  @if ($row->phase1)
                                      {{ $row->phase1->renunciation_form_receive_date }}
                                  @endif
                              @endif
                          </td>
                          <td class="whitespace-nowrap px-4 py-3 text-sm border">
                              @if ($editPhase1Index === $row->id)
                                  @if ($row->phase1)
                                      {{ $row->phase1->renunciation_comment }}<br>
                                  @endif
                                  <textarea wire:model.lazy="phase1.{{ $row->id }}.renunciation_comment"
                                      class="border p-1"></textarea>
                              @else
                                  @if ($row->phase1)
                                      {{ $row->phase1->renunciation_comment }}
                                  @endif
                              @endif
                          </td>


                          <td class="whitespace-nowrap px-4 py-3 text-sm border bg-gray-400 text-white">
                              @if ($editPhase1Index === $row->id)
                                  @if ($row->phase1)
                                      {{ $row->phase1->release_of_bond_maild_date }}<br>
                                  @endif
                                  <x-datepicker wire:model.lazy="phase1.{{ $row->id }}.release_of_bond_maild_date"
                                      class="border" />
                              @else
                                  @if ($row->phase1)
                                      {{ $row->phase1->release_of_bond_maild_date }}
                                  @endif
                              @endif
                          </td>
                          <td class="whitespace-nowrap px-4 py-3 text-sm border text-white">
                              @if ($editPhase1Index === $row->id)
                                  @if ($row->phase1)
                                      {{ $row->phase1->release_of_bond_receive_date }}<br>
                                  @endif
                                  <x-datepicker
                                      wire:model.lazy="phase1.{{ $row->id }}.release_of_bond_receive_date"
                                      class="border" />
                              @else
                                  @if ($row->phase1)
                                      {{ $row->phase1->release_of_bond_receive_date }}
                                  @endif
                              @endif
                          </td>
                          <td class="whitespace-nowrap px-4 py-3 text-sm border bg-gray-400 text-white">
                              @if ($editPhase1Index === $row->id)
                                  @if ($row->phase1)
                                      {{ $row->phase1->release_of_bond_comment }}<br>
                                  @endif
                                  <textarea wire:model.lazy="phase1.{{ $row->id }}.release_of_bond_comment"
                                      class="border p-1"></textarea>
                              @else
                                  @if ($row->phase1)
                                      {{ $row->phase1->release_of_bond_comment }}
                                  @endif
                              @endif
                          </td>
                          <td class="whitespace-nowrap px-4 py-3 text-sm border">
                              @if ($editPhase1Index === $row->id)
                                  <label class="flex m-0 p-0 line-highlight-0">
                                      <input value="none" type="radio"
                                      name="probated_estate" class="p-1 w-4"
                                      wire:model.lazy="phase1.{{ $row->id }}.probated_estate">
                                      <p class="pt-1">None</p>
                                  </label>
                                  <label class="flex m-0 p-0 line-highlight-0">
                                      <input value="no" type="radio"
                                      name="probated_estate" class="p-1 w-4"
                                      wire:model.lazy="phase1.{{ $row->id }}.probated_estate">
                                      <p class="pt-1">No</p> 
                                  </label>
                                  <label class="flex m-0 p-0 line-highlight-0">
                                      <input value="yes" type="radio"
                                      name="probated_estate" class="p-1 w-4"
                                      wire:model.lazy="phase1.{{ $row->id }}.probated_estate">
                                      <p class="pt-1">Yes</p> 
                                  </label>


                              @else
                                  @if ($row->phase1)
                                      {{ $row->phase1->probated_estate }}
                                  @endif
                              @endif
                          </td>

                          <td class="whitespace-nowrap px-4 py-3 text-sm border bg-gray-400">
                            @if ($editPhase1Index === $row->id)

                            <label class="block">Select Status</label>
                            <select wire:model="phase1.{{ $row->id }}.status">
                                <option value="pending" >Pending</option>
                                <option value="complete" >Complete</option>
                            </select>
                                

                            @else
                                @if ($row->phase1)
                                    {{ $row->phase1->status }}
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
