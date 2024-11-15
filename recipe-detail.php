


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Detail</title>
    <link rel="stylesheet" href="recipe-detail.css">
</head>
<body>
    
    <h1 id="recipeName"></h1>

    <div class="container">
        <div class="overview">
            <img id="recipeImage" alt="Recipe Image" width="300">
            <p id="description"></p>
        </div>
        <div class="instruction">
            <div>
                <h3>Ingredients</h3>
                <ul id="ingredientsList"></ul>
            </div>
            <div>
                <h3>Directions</h3>
                <ol id="directionsList"></ol>
            </div>
        </div>
    </div>

    <script src="recipe-detail.js"></script>
</body>
</html>
