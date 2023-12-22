{{-- @if ($recipe->review === 1)
    <option>★</option>
@elseif ($recipe->review === 2) 
    <option>★★</option>
@elseif ($recipe->review === 3) 
    <option>★★★</option>
@elseif ($recipe->review === 4)
    <option>★★★★</option>
@elseif ($recipe->review === 5)   
    <option>★★★★★</option>
@endif --}}

@if ($recipe->review === 1)
    ★
@elseif ($recipe->review === 2) 
    ★★
@elseif ($recipe->review === 3) 
    ★★★
@elseif ($recipe->review === 4)
    ★★★★
@elseif ($recipe->review === 5)   
    ★★★★★
@endif