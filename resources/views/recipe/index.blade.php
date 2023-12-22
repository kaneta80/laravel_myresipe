<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            レシピ一覧
        </h2>
        <form method="get" action="{{route('recipes.index')}}">
        <div class="lg:flex lg:justify-around">
          <div class="lg:flex items-center">
            <div class="flex space-x-2 items-center">
              <div><input name="keyword" class="border border-gray-500 py-2" placeholder="キーワードを入力"></div>
              <div><button class="ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">検索する</button></div>
            </div>
            <div>
              <span>表示順</span>
              <select id="sort" name="sort" class="mr-2">
                <option value="{{\Constant::RECIPE_ORDER['review']}}"
                  @if (\Request::get('sort') === \Constant::RECIPE_ORDER['review'])
                    selected
                  @endif>評価順
                </option>  
                <option value="{{\Constant::RECIPE_ORDER['later']}}"
                  @if (\Request::get('sort') === \Constant::RECIPE_ORDER['later'])
                    selected
                  @endif>新しい順
                </option> 
                <option value="{{\Constant::RECIPE_ORDER['older']}}"
                  @if (\Request::get('sort') === \Constant::RECIPE_ORDER['older'])
                    selected
                  @endif>古い順
                </option> 
              </select>    
            </div>
          </div>
        </div>
        </form>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-4 mx-auto">
                          <div class="flex flex-col text-center w-full mb-10">
                            <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">レシピ一覧</h1>
                            @if (session('message'))
                              <p class="bg-green-200">{{session('message')}}</p>
                            @endif
                            
                          </div>
                          <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                             <form action="{{route('recipes.create')}}" method="get">
                            <div class="mbf-4 w-full flex justify-between items-center content-center">
                                <button class="shadow-lg bg-teal-500 shadow-teal-500/50 text-white rounded px-2 py-1">
                                  レシピ追加
                                </button>
                            </div>
                            </form>
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                              <thead>
                                <tr>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-lime-200 rounded-tl rounded-bl">ID</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-lime-200">レシピ名</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-lime-200">お気に入り</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-lime-200">削除</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($recipes as $recipe)
                                <tr>
                                  <td class="px-4 py-3 text-blue-400">
                                    <a href="{{ route('recipes.show', ['recipe' => $recipe->id]) }}">
                                        {{ $loop->iteration }}
                                    </a>
                                </td>
                                
                                  <td class="px-4 py-3">{{$recipe->name}}<span>分</span></td>
                                  <td class="px-4 py-3">
                                      <div class="flex">
                                        @for ($i=0; $i<$recipe->review; $i++)
                                          <div class="text-yellow-400">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                            <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                          </svg>
                                        </div>
                                        @endfor
                                      </div>
                                  </td>
                                  <form id="delete_{{$recipe->id}}" method="post" action="{{ route('recipes.destroy', ['recipe' => $recipe->id ] )}}">
                                    @csrf
                                    @method('delete')
                                    <td class="md:px-4 py-3">
                                      <a href="#" data-id="{{ $recipe->id }}" onclick="deletePost(this)" class="text-blue-400 hover:text-red-500 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                      </a>                        
                                    </td>
                                  </form>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                        {{$recipes->links()}}
                      </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script> 
  function deletePost(e) { 
  'use strict'; 
  if (confirm('本当に削除してもいいですか?')) { 
  document.getElementById('delete_' + e.dataset.id).submit(); 
  } 
  } 
  </script>
