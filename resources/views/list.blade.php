<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Leads') }}
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden overflow-x-auto shadow-xl sm:rounded-lg">
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 ">
          
        <form action="/leads" class=" w-full flex md:flex-nowrap flex-wrap">
                    <input type="text" class="rounded font-thin bg-gray-50 text-black w-full md:w-1/3  my-2" name="s" value="{{ Request::get('s') }}" placeholder="Search">

                    <select class="rounded font-thin bg-gray-50 text-black w-full md:w-1/3  my-2" name="e" id="">
                        <option value="">All</option>
                        @foreach($event as $e)
                            <option
                                value="{{$e}}"
                                @if ($e === Request::get('e'))
                                    selected
                                @endif
                                >{{$e}}</option>
                        @endforeach
                    </select>

                    <button class="rounded font-thin bg-indigo-500 text-white w-full md:w-1/3  py-2 my-2" type="submit">
                        Search
                    </button>
                </form>

        <div class="min-w-screen flex">
            <div class="mt-4">
                Total: {{$leads->total()}} leads
            </div>
        </div>

        <div class="overflow-x-auto">
            <div class="mt-8 min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
              <div class="w-full">
                <div class="bg-white shadow-md rounded md:overflow-hidden overflow-x-scroll">
                  <table class=" w-full table-auto">
                    <thead>
                      <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">id</th>
                        <th class="py-3 px-6 text-center">Name</th>
                        <!-- <th class="py-3 px-6 text-center">Email</th> -->
                        <th class="py-3 px-6 text-center">Phone</th>
                        <th class="py-3 px-6 text-center">Migrate To</th>
                        <th class="py-3 px-6 text-center">Event</th>
                        <th class="py-3 px-6 text-center">Occupation</th>
                      </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                    @foreach($leads as $lead)
        
                      <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">
                          <div class="flex items-center">
                            {{$lead->id}}
                        </td>
                        <td class="py-3 px-6 text-center">
                        {{$lead->firstName}} {{$lead->lastName}}
                        </td>
                        <!-- <td class="py-3 px-6 text-center">
                        {{$lead->email}}
                        </td> -->
                        <td class="py-3 px-6 text-center">
                        {{$lead->phone}}
                        </td>
                        <td class="py-3 px-6 text-center">
                        {{$lead->migrateTo}}
                        </td>
                        <td class="py-3 px-6 text-center">
                        {{$lead->event}}
                        </td>
                        <td class="py-3 px-6 text-center">
                        {{$lead->occupation}}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="mt-8">
                  {{ $leads->appends([
                        's' => Request::get('s'),
                        'e' => Request::get('e'),
                    ])->links() }}
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