<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight flex flex-wrap justify-between ">
      {{ __('Leads') }}

      @if(Auth::user()->type == 1 )
        <a href="{{ URL::full() }}?&print=yes" class="export w-full md:w-1/5 text-start md:text-end text-sm">Export all to csv</a>
      @endif
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden overflow-x-auto shadow-xl sm:rounded-lg">
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 ">
          
        <form action="/leads" class=" grid grid-cols-1 md:grid-cols-5 gap-4">
            <input type="text" class="md:col-span-5 w-full rounded font-thin bg-gray-50 text-black" name="s" value="{{ Request::get('s') }}" placeholder="Search">

            <select class="w-full rounded font-thin bg-gray-50 text-black" name="e" id="">
                <option value="">Events...</option>
                @foreach($event as $e)
                    <option
                        value="{{$e}}"
                        @if ($e === Request::get('e'))
                            selected
                        @endif
                        >{{$e}}</option>
                @endforeach
            </select>
            
            <select class="w-full rounded font-thin bg-gray-50 text-black" name="a" id="">
                <option value="">Academic...</option>
                @foreach($academic as $a)
                    <option
                        value="{{$a}}"
                        @if ($a === Request::get('a'))
                            selected
                        @endif
                        >{{$a}}</option>
                @endforeach
            </select>

            <select class="w-full rounded font-thin bg-gray-50 text-black" name="xp" id="">
                <option value="">XP...</option>
                @foreach($xp as $xp)
                    <option
                        value="{{$xp}}"
                        @if ($xp === Request::get('xp'))
                            selected
                        @endif
                        >{{$xp}}</option>
                @endforeach
            </select>

            <select class="w-full rounded font-thin bg-gray-50 text-black" name="refer" id="">
                <option value="">Refer...</option>
                @foreach($refer as $refer)
                    <option
                        value="{{$refer}}"
                        @if ($refer === Request::get('refer'))
                            selected
                        @endif
                        >{{$refer}}</option>
                @endforeach
            </select>

            <button class="w-full rounded font-thin bg-gray-50 text-black bg-indigo-500 text-white py-2" type="submit">
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
                        <th class="py-1 px-3 text-center">id</th>
                        <th class="py-1 px-3 text-center">Name</th>
                        <!-- <th class="py-1 px-3 text-center">Email</th> -->
                        <th class="py-1 px-3 text-center">Academic</th>
                        <th class="py-1 px-3 text-center">T. Exp.</th>
                        <th class="py-1 px-3 text-center">Event</th>
                        <th class="py-1 px-3 text-center">Refer</th>
                        <th class="py-1 px-3 text-center">Campaign</th>
                        <th class="py-1 px-3 text-center">Source</th>
                        <th class="py-1 px-3 text-center">Medium</th>
                        <th class="py-1 px-3 text-center">Term</th>
                        <th class="py-1 px-3 text-center">Occupation</th>
                      </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                    @foreach($leads as $lead)
        
                      <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-1 px-3 text-center">
                          <div class="flex items-center">
                            {{$lead->id}}
                        </td>
                        <td class="py-1 px-3 text-center">
                        {{$lead->firstName}}
                        </td>
                        <td class="py-1 px-3 text-center">
                        {{$lead->academicBackground}}
                        </td>
                        <td class="py-1 px-3 text-center">
                        {{$lead->timeExperience}}
                        </td>
                        <td class="py-1 px-3 text-center">
                        {{$lead->event}}
                        </td>
                        <td class="py-1 px-3 text-center">
                        {{$lead->refer}}
                        </td>
                        <td class="py-1 px-3 text-center">
                        {{$lead->utm}}
                        </td>
                        <td class="py-1 px-3 text-center">
                        {{$lead->source}}
                        </td>
                        <td class="py-1 px-3 text-center">
                        {{$lead->medium}}
                        </td>
                        <td class="py-1 px-3 text-center">
                        {{$lead->term}}
                        </td>
                        <td class="py-1 px-3 text-center">
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
                        'a' => Request::get('a'),
                        'xp' => Request::get('xp'),
                        'refer' => Request::get('refer'),
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