@extends('layouts.plantilla')


@section('title','Teams '. $team->name)

@section('content')

<h1 class="text-center text-2xl mt-20 font-bold">Welcome team {{$team->name}}</h1>
<p class="text-center mt-2">´{{$team->bio}}</p>






<div class="flex justify-center mt-16">
    <a href="{{route('teams.index')}}"> <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-4">
        Go back to Teams
  </button></a>
    <a href="{{route('games.create',$team->id)}}">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-4">
            Create Match
      </button>      
    </a>
    <a href="{{route('teams.edit',$team)}}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-4">
        Edit Team
  </button></a>
    <form action="{{route('teams.destroy',$team)}}" method="POST">
        @csrf
        @method ('delete')
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" type="submit">eliminar</button>
        
    </form>
    </div>



<section class="container px-40 mx-auto"> 
    <div class="flex items-center gap-x-3">
        <h2 class="text-lg font-medium text-gray-800 dark:text-white">Matches</h2>
    </div>   

    <div class="flex flex-col mt-6 ">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-2">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <div class="flex items-center gap-x-3">
                                        <span>Opponent</span>
                                    </div>
                                </th>

                                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <div class="flex items-center gap-x-3">
                                        <span>City/Stadium</span>
                                    </div>
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <div class="flex items-center gap-x-3">
                                        <span>Match Date</span>
                                    </div>
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Status</th>

                                {{-- <th scope="col" class="relative py-3.5 px-4">
                                    <span class="sr-only">Edit</span>
                                </th> --}}
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            @foreach ($team->games as $game)
                                
                                                    
                            <tr>
                                <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                    <div class="inline-flex items-center gap-x-3">
                                        <div class="flex items-center gap-x-2">
                                            <div>
                                                <h2 class="font-medium text-gray-800 dark:text-white ">{{$game->other_team}}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </td> 
                                <td class="px-12 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                    <div class="inline-flex items-center px-3 py-1 ">
                                    {{-- <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60 dark:bg-gray-800"> --}}

                                        {{-- <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> --}}
                                        <span class="h-1.5 w-1.5 "></span>


                                        <h2 class="text-sm font-normal">{{$game->city}}</h2>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ date('Y-m-d', strtotime($game->game_date)) }}</td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{$game->status}}</td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                    <div class="flex items-center gap-x-6">
                                        <form action="{{route('games.destroy',$game->id)}}" method="POST">
                                            @csrf

                                            @method ('delete')                                          
                                            
                                      
                                        <button type="submit" class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>                                        
                                        </button>
                                        </form>
                                        <td class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none"><a href="{{ route('games.edit',$game->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg></a>
                                        </td>
                                    </div>
                                </td>
                            </tr>
                            @endforeach   
                           
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- esto es el paginate --}}
    {{-- <div class="flex items-center justify-between my-6 ">
        <a href="#" class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
            </svg>

            <span>
                previous
            </span>
        </a>

        <div class="items-center hidden lg:flex gap-x-3">
            <a href="#" class="px-2 py-1 text-sm text-blue-500 rounded-md dark:bg-gray-800 bg-blue-100/60">1</a>
            <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">2</a>
            <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">3</a>
            <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">...</a>
            <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">12</a>
            <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">13</a>
            <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">14</a>
        </div>

        <a href="#" class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
            <span>
                Next
            </span>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
            </svg>
        </a>
    </div> --}}
</section>

@endsection