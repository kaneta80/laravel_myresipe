<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            レシピ詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="p-2 w-full border-b-4">
                        <div class="relative">
                          <label for="name" class="leading-7 text-sm font-bold text-gray-600">レシピのタイトル</label>
                          <div type="text" id="name" name="name" placeholder="例：ナスとオクラの酢の物" class="border-b-2 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$recipe->name}}</div>
                        </div>
                      </div>
                      <div class="p-2 w-full border-b-4">
                        <div class="relative">
                          <label for="url" class="leading-7 text-sm font-bold text-gray-600">参考URL</label>
                          <a href="{{$recipe->url}}">
                            <div class="border-b-2 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$recipe->url}}</div>
                          </a>
                        </div>
                      </div>
                      {{-- <div class="p-2 w-full border-b-4">
                          <div class="relative">
                            <label for="latestDate" class="leading-7 text-sm font-bold text-gray-600">作った日付</label>
                            <div type="date" id="latestDate" name="url" placeholder="登録しておくと通知が受けられる" class="hover:bg-yellow-100 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          </div>
                        </div> --}}
                      <div class="p-2 w-full border-b-4">
                        <div class="relative">
                          <label class="leading-7 text-sm font-bold text-gray-600">評価</label>
                          <div class="flex border-b-2 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @for ($i=0; $i<$recipe->review; $i++)
                                <div class="text-yellow-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            @endfor
                          </div>
                        </div>
                      </div>
                      <div class="p-2 w-full border-b-4">
                        <div class="relative">
                          <label class="leading-7 text-sm font-bold text-gray-600">カテゴリー</label>
                          <div class="">
                            {{$recipe->category->category}}
                          </div>
                        </div>
                      </div>
                      {{-- <div class="p-2 w-full border-b-4">
                        <div class="relative">
                          <label for="serving" class="leading-7 text-sm font-bold text-gray-600">何人前</label>
                          <div class="rounded border-b-2 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        {{$recipe->serving}}<span>人前</span>
                        </div>
                        </div>
                      </div>
                       --}}
                         <div class="p-2 w-full mt-4 border-b-4 mb-4">
                        <label for="name" class="leading-7 text-sm font-bold text-gray-600">材料と分量 <span></span> ({{$recipe->serving}}<span>人前</span>)</label>
                        <div class="flex justify-around">
                          <div class="text-center w-1/2 mr-2 bg-yellow-100 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">材料・調味料</div>
                          <div class="text-center w-1/2 mr-2 bg-yellow-100 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">分量</div>
                      </div> 
                    @foreach ($ingredientInformation as $recipeIngredient)  
                      <div class="flex justify-around mt-4 text-center">
                        <div class= "w-1/2 border-b-2 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$recipeIngredient['ingredientName']}}</div>
                        <div class=" w-1/2 border-b-2 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$recipeIngredient['ingredientQuantity']}}</div>
                      </div>
                    @endforeach
                      </div>
                      
                      <div class="flex flex-wrap">
                          @foreach ($process as $step)
                          <div class="p-2 w-1/3">
                                <div class="relative">
                                    <label class="font-bold leading-7 text-sm text-gray-600">手順{{$step['stepNumber']}}</label>
                                    <div class="border-2 rounded focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{$step['step']}}</div>
                                </div>
                            </div>
                          @endforeach
                      </div>
                      
                        <div class="border-t-4 p-2 w-full">
                          <label for="point" class="font-bold leading-7 text-sm text-gray-600">コツ・ポイント</label>
                          <div class="rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{$recipe->point}}</div>
                        </div>
                      <div class="p-2 w-full flex justify-between">
                        <a href="{{route('recipes.index')}}"><button type="button" class="shadow-lg bg-slate-500 hover:bg-slate-600 shadow-slate-500/50 text-white rounded px-2 py-1">戻る</button></a>
                        <a href="{{route('recipes.edit', ['recipe'=>$recipe->id])}}">
                          <button class="shadow-lg bg-yellow-400 hover:bg-yellow-500 shadow-yellow-500/50 text-white rounded px-2 py-1">編集する</button>
                        </a>  
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
