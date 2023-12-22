<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\ingredient;
use App\Models\step;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Models\category;
use App\Models\ingredient_recipe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $recipes = Recipe::where('user_id' , Auth::id())->paginate(15);
        // dd($recipes);

        // $category = category::where('category', $request->category)->paginate(15);
        $recipes = recipe::SearchKeyword($request->keyword)
        ->sortOrder($request->sort)
        ->paginate(15);

        return view('recipe.index', compact('recipes'));
    }

    /**sssssssssss
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::select('category', 'id')->get();

        return view('recipe.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecipeRequest $request)
    {
        // dd($request);
        $recipe = recipe::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'url' => $request->url,
            'review' => $request->review,
            'serving' => $request->serving,
            'point' => $request->point,
            'user_id' => Auth::id()
        ]);

        $ingredients = $request->ingredients;
        // dd($ingredients);
        foreach ($ingredients as $ingredient) {
            $ingredientModel = ingredient::create([
                'name' => $ingredient['name']
            ]);

            $recipe->ingredients()->attach($ingredientModel->id, ['quantity' => $ingredient['quantity']]);
        }

        
        foreach($request->step as $step){
            step::create([
                'step' => $step['process'],
                'step_number'=>$step['stepNumber'],
                'recipe_id'=>$recipe->id
            ]);
        
        }
        
        
        return redirect()->route('recipes.index')
            ->with('message', 'レシピを登録しました。');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        $ingredientInformation = [];
        foreach($recipe->ingredients as $ingredient){
            $ingredientName = $ingredient->name;
            $ingredientQuantity = $ingredient->pivot->quantity;
            array_push($ingredientInformation, [
                'ingredientName' => $ingredientName,
                'ingredientQuantity' => $ingredientQuantity
            ]);
        }
        
        $steps = step::where('recipe_id', $recipe->id)
        ->get();

        $process = [];
        foreach($steps as $step){
            $stepNumber = $step->step_number;
            $step = $step->step;
            array_push($process, [
                'stepNumber'=>$stepNumber,
                'step'=>$step
            ]);
        }
        
        // dd($process);
        return view('recipe.show', compact('recipe', 'ingredientInformation', 'process'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        $step= step::where('recipe_id', $id)->get();
        // $categories = category::select('category', 'id')->get();
        // dd($step, $recipe, $categories);
        return view('recipe.edit', compact('recipe', 'step'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecipeRequest $request, $id)
    {
        // dd($request);
        $recipe = recipe::findOrFail($id);
        $steps = step::where('recipe_id', $id)->first();
        $ingredient = ingredient::first();
        foreach($request->ingredients as $updateIngredient){
            $ingredient->name = $updateIngredient['name'];
            $ingredient->save();
            $recipe->ingredients()->syncWithoutDetaching([$ingredient->id => ['quantity' => $updateIngredient['quantity']]]);
        }

        foreach($request->steps as $step){
            $steps->step = $step['process'];
            if(!empty($step['stepNumber'])){
                $steps->step_number = $step['stepNumber'];
            }
            $steps->save();
        }

        $recipe->name = $request->name;
        $recipe->category_id = $request->category_id;
        $recipe->url = $request->url;
        $recipe->review = $request->review;
        $recipe->serving = $request->serving;
        $recipe->point = $request->point;
        $recipe->save();

        return redirect()->route('recipes.index')
        ->with('message', 'レシピを更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        recipe::findOrFail($id)->delete();
        return redirect()->route('dashboard');
    }
}
