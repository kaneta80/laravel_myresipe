<div>
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-10 mx-auto">
          <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <x-errorMessage/>
            <div class="flex flex-wrap -m-2">
              <x-counter/>
              <form action="{{route('recipes.update', ['recipe'=>$recipe->id])}}" method="post">
                @csrf
                @method('put')
                <div class="p-2 w-full border-b-4">
                  <div class="relative">
                    <label for="name" class="leading-7 text-sm font-bold text-gray-600">レシピのタイトル</label>
                    <input type="text" id="name" name="name" value="{{$recipe->name}}" class="hover:bg-yellow-100 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  </div>
                </div>
                <div class="p-2 w-full border-b-4">
                  <div class="relative">
                    <label for="url" class="leading-7 text-sm font-bold text-gray-600">参考URL</label>
                    <input type="url" id="url" name="url" value="{{$recipe->url}}" class="hover:bg-yellow-100 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  </div>
                </div>
                {{-- <div class="p-2 w-full border-b-4">
                    <div class="relative">
                      <label for="latestDate" class="leading-7 text-sm font-bold text-gray-600">作った日付</label>
                      <input type="date" id="latestDate" name="url" placeholder="登録しておくと通知が受けられる" class="hover:bg-yellow-100 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                  </div> --}}
                <div class="p-2 w-full border-b-4">
                  <div class="relative">
                    <label class="leading-7 text-sm font-bold text-gray-600">評価</label>
                    <select name="review" class="w-full bg-gray-100 hover:bg-yellow-100">
                      <option value="{{$recipe->review}}" disabled>クリックして五段階で評価を変更</option>
                      <option value="1" {{ $recipe->review == 1 ? 'selected' : '' }}>★</option>
                      <option value="2" {{ $recipe->review == 2 ? 'selected' : '' }}>★★</option>
                      <option value="3" {{ $recipe->review == 3 ? 'selected' : '' }}>★★★</option>
                      <option value="4" {{ $recipe->review == 4 ? 'selected' : '' }}>★★★★</option>
                      <option value="5" {{ $recipe->review == 5 ? 'selected' : '' }}>★★★★★</option>
                  </select>
                  
                  </div>
                </div>
                <div class="p-2 w-full border-b-4">
                  <div class="relative">
                    <label class="leading-7 text-sm font-bold text-gray-600">カテゴリー</label>
                    <select name="category_id" class="w-full bg-gray-100 hover:bg-yellow-100">
                      <option value="{{ $recipe->category->id }}">{{$recipe->category->category}}</option>
                        @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
                    </select>
                  
                  </div>
                </div>
                <div class="p-2 w-full border-b-4">
                  <div class="relative">
                    <label for="serving" class="leading-7 text-sm font-bold text-gray-600">何人前</label>
                    <input type="number" id="serving" name="serving" min="1" value="{{$recipe->serving}}" placeholder="数字のみを入力" class="hover:bg-yellow-100 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  </div>
                </div>
                <div class="p-2 w-full mt-4 border-b-4 mb-4">
                  <label for="name" class="leading-7 text-sm font-bold text-gray-600">材料と分量</label>
                  <div class="flex justify-around">
                    <div class="text-center w-1/2 mr-2 bg-yellow-300 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">材料・調味料</div>
                    <div class="text-center w-1/2 mr-2 bg-yellow-300 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">分量</div>
                </div>
                @foreach ($recipe->ingredients as $ingredient)
                    <div class="flex justify-around mt-4">
                        <input type="text" name="ingredients[{{ $loop->iteration }}][name]" value="{{ $ingredient->name }}" class="hover:bg-yellow-100 w-1/2 mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        <input type="text" name="ingredients[{{ $loop->iteration }}][quantity]" value="{{ $ingredient->pivot->quantity }}" class="hover:bg-yellow-100 w-1/2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                @endforeach

                @for ($i=$ingredientSum; $i<=$count; $i++)
                <div class="flex justify-around mt-2" id="app">
                  <input type="text" name="ingredients[{{$i}}][name]" class="hover:bg-yellow-100 input1-container w-1/2 mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  <input type="text" name="ingredients[{{$i}}][quantity]" class="hover:bg-yellow-100 input2-container w-1/2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
              @endfor
                </div>
                <div class="flex flex-wrap">
                 @foreach ($steps as $step)
                   <div class="p-2 w-1/3">
                        <div class="relative">
                          <label for="steps{{$loop->iteration}}" class="font-bold leading-7 text-sm text-gray-600">手順{{$loop->iteration}}</label>
                          <textarea id="steps{{$loop->iteration}}" name="steps[{{$loop->iteration}}][process]" placeholder="手順を入力" class="hover:bg-yellow-100 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{$step->step}}</textarea>
                        </div>
                      </div>
                 @endforeach
                 @for($j=$processCount+1; $j<=$stepCount; $j++)
                 <div class="p-2 w-1/3">
                   <div class="relative">
                     <label for="step{{$j}}" class="font-bold leading-7 text-sm text-gray-600">手順{{$stepCount}}</label>
                     <textarea id="steps{{$j}}" name="steps[{{$j}}][process]" class="hover:bg-yellow-100 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                     <input type="hidden" name="steps[{{$j}}][stepNumber]" value="{{$j}}">
                   </div>
                 </div>
                 
                 @endfor  
                </div>
                  <div class="border-t-4 p-2 w-full">
                    <label for="point" class="font-bold leading-7 text-sm text-gray-600">コツ・ポイント</label>
                    <textarea id="point" name="point" placeholder="クリックしてコツやポイントを入力" class="hover:bg-yellow-100 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{$recipe->point}}</textarea>
                  </div>
                <div class="p-2 w-full flex justify-between">
                  <a href="{{route('recipes.index')}}"><button type="button" class="shadow-lg bg-slate-500 hover:bg-slate-600 shadow-slate-500/50 text-white rounded px-2 py-1">戻る</button></a>
                  <button type="submit" class="shadow-lg bg-yellow-400 hover:bg-yellow-500 shadow-yellow-500/50 text-white rounded px-2 py-1">更新する</button>
                </div>
            </form>
            </div>
          </div>
        </div>
      </section>
</div>
