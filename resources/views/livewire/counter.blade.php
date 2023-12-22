<div>
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-10 mx-auto">
          <div class="lg:w-1/2 md:w-2/3 mx-auto">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <div class="flex flex-wrap -m-2">
                <div style="text-align: center">
                <button wire:click="increment">+</button>
                <h1>材料</h1>
              </div>
              <div style="text-align: center">
                <button wire:click="decrement">削除</button>
                <h1>材料</h1>
              </div>
              <div style="text-align: center">
                <button wire:click="stepIncrement">+</button>
                <h1>手順</h1>
              </div>
              <div style="text-align: center">
                <button wire:click="stepDecrement">手順の削除</button>
                <h1>手順</h1>
              </div>
              <form action="{{route('recipes.store')}}" method="post">
                @csrf
                <div class="p-2 w-full border-b-4">
                  <div class="relative">
                    <label for="name" class="leading-7 text-sm font-bold text-gray-600">レシピのタイトル</label>
                    <input type="text" id="name" name="name" placeholder="例：ナスとオクラの酢の物" class="hover:bg-yellow-100 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  </div>
                </div>
                <div class="p-2 w-full border-b-4">
                  <div class="relative">
                    <label for="url" class="leading-7 text-sm font-bold text-gray-600">参考URL</label>
                    <input type="url" id="url" name="url" placeholder="例：https://www.wwww/ ＊任意" class="hover:bg-yellow-100 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
                    <select name="review" class="w-full bg-gray-100 hover:bg-yellow-100 ">
                      <option>クリックして五段階で評価</option>
                      <option value="1"><span>★</span></option>
                      <option value="2"><span>★★</span></option>
                      <option value="3"><span>★★★</span></option>
                      <option value="4"><span>★★★★</span></option>
                      <option value="5"><span>★★★★★</span></option>
                    </select>
                  </div>
                </div>
                <div class="p-2 w-full border-b-4">
                  <div class="relative">
                    <label class="leading-7 text-sm font-bold text-gray-600">カテゴリー</label>
                    <select name="category_id" class="w-full bg-gray-100 hover:bg-yellow-100">
                      <option value="" selected disabled>タグを選択</option>
                        @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
                    </select>
                  
                  </div>
                </div>
                <div class="p-2 w-full border-b-4">
                  <div class="relative">
                    <label for="serving" class="leading-7 text-sm font-bold text-gray-600">何人前</label>
                    <input type="number" id="serving" name="serving" min="1" placeholder="数字のみを入力" class="hover:bg-yellow-100 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  </div>
                </div>
                <div class="p-2 w-full mt-4 border-b-4 mb-4">
                  <label for="name" class="leading-7 text-sm font-bold text-gray-600">材料と分量</label>
                  <div class="flex justify-around">
                    <div class="hover:bg-yellow-100 text-center w-1/2 mr-2 bg-yellow-300 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">材料・調味料</div>
                    <div class="hover:bg-yellow-100 text-center w-1/2 mr-2 bg-yellow-300 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">分量</div>
                </div>
                <div class="flex justify-around mt-4">
                  <input type="text" name="ingredients[1][name]" placeholder="例：ナス" class="hover:bg-yellow-100 w-1/2 mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  <input type="text" name="ingredients[1][quantity]" placeholder="例：1本" class="hover:bg-yellow-100 w-1/2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
              <div class="flex justify-around mt-2">
                  <input type="text" name="ingredients[2][name]" placeholder="例：味噌" class="hover:bg-yellow-100 w-1/2 mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  <input type="text" name="ingredients[2][quantity]" placeholder="例：大さじ2" class="hover:bg-yellow-100 w-1/2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
              @for ($i=3; $i<$count; $i++)
                <div class="flex justify-around mt-2" id="app">
                  <input type="text" name="ingredients[{{$i}}][name]" class="hover:bg-yellow-100 input1-container w-1/2 mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  <input type="text" name="ingredients[{{$i}}][quantity]" class="hover:bg-yellow-100 input2-container w-1/2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
              @endfor
                </div>
                <div class="flex flex-wrap">
                    <div class="p-2 w-1/3">
                        <div class="relative">
                          <label for="step1" class="font-bold leading-7 text-sm text-gray-600">手順1</label>
                          <textarea id="step1" name="step[1][process]" placeholder="手順を入力" class="hover:bg-yellow-100 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                          <input type="hidden" name="step[1][stepNumber]" value="1">
                        </div>
                      </div>
                      <div class="p-2 w-1/3">
                        <div class="relative">
                          <label for="step2" class="font-bold leading-7 text-sm text-gray-600">手順2</label>
                          <textarea id="step2" name="step[2][process]" class="hover:bg-yellow-100 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                          <input type="hidden" name="step[2][stepNumber]" value="2">
                        </div>
                      </div>
                      <div class="p-2 w-1/3">
                        <div class="relative">
                          <label for="step3" class="font-bold leading-7 text-sm text-gray-600">手順3</label>
                          <textarea id="step3" name="step[3][process]" class="hover:bg-yellow-100 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                          <input type="hidden" name="step[3][stepNumber]" value="3">
                        </div>
                      </div>
                  @for($j=4; $j<=$stepCount; $j++)
                  <div class="p-2 w-1/3">
                    <div class="relative">
                      <label for="step{{$j}}" class="font-bold leading-7 text-sm text-gray-600">手順{{$stepCount}}</label>
                      <textarea id="step{{$j}}" name="step[{{$j}}][process]" class="hover:bg-yellow-100 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                      <input type="hidden" name="step[{{$j}}][stepNumber]" value="{{$i}}">
                    </div>
                  </div>
                  
                  @endfor
                </div>
                  <div class="border-t-4 p-2 w-full">
                    <label for="point" class="font-bold leading-7 text-sm text-gray-600">コツ・ポイント</label>
                    <textarea id="point" name="point" placeholder="クリックしてコツやポイントを入力" class="hover:bg-yellow-100 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                  </div>
                <div class="p-2 w-full flex justify-between">
                  <a href="{{route('recipes.index')}}"><button type="button" class="shadow-lg bg-slate-500 hover:bg-slate-600 shadow-slate-500/50 text-white rounded px-2 py-1">戻る</button></a>
                  <button type="submit" class="shadow-lg bg-yellow-400 hover:bg-yellow-500 shadow-yellow-500/50 text-white rounded px-2 py-1">保存する</button>
                </div>
            </form>
            </div>
          </div>
        </div>
      </section>
</div>
